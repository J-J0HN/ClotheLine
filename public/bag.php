<?php
if (session_id() == '') {
    session_start();
    require '../pdo.php';
    require '../functions.php';
}
$mainClass = 'bag';

if (isset($_POST['item'])) {
    $item = $_POST['item'];
    if (empty($_SESSION['bag'])) {
        $_SESSION['bag'][] = $_POST['item'];
    } else {
        $duplicate = false;
        $existItemIndex = array();

        foreach ($_SESSION['bag'] as $i => $bag_item) {
            foreach ($item as $key => $value) {
                if (strcmp($key, 'quantity') != 0) {
                    if (strcmp($bag_item[$key], $item[$key]) == 0) {
                        $duplicate = true;
                        $existItemIndex[] = $i;
                    } else {
                        $duplicate = false;
                        break;
                    }
                }
            }
            if ($duplicate) {
                $_SESSION['bag'][$i]['quantity'] += $item['quantity'];
                break;
            }
        }

        if (!$duplicate) {
            $_SESSION['bag'][] = $_POST['item'];
        }
    }
}

if (!empty($_SESSION['bag'])) {
    $message = '';
    $bag = array();

    // Display items in the bag session
    foreach ($_SESSION['bag'] as $bag_item) {
        $bag[] = $bag_item;
    }

    foreach ($bag as $i => $bag_item) {
        $product = find($pdo, 'product', 'prodid', $bag_item['prodid']);
        $bag[$i]['name'] = $product[0]['prodname'];
        $bag[$i]['price'] = $product[0]['prodprice'];
        $bag[$i]['image'] = $product[0]['prodimg'];
    }

    if (isset($_SESSION['LoggedIn'])) {
        // Update and insert session items into the bag item table
        foreach ($bag as $bag_item) {
            $prodid = $bag_item['prodid'];
            $quantity = $bag_item['quantity'];
            $name = $bag_item['name'];
            $price = $bag_item['price'];

            // Insert into the order table
            $sql = "INSERT INTO `order` (prodid, name, price, quantity) VALUES ('$prodid', '$name', '$price', '$quantity')";
            $pdo->exec($sql);
        }

        // Display items in the bag item table
        // ...

    } else {
        // Not logged in
    }
} else {
    // No items added this session
    if (empty($bag)) {
        $bag = [];
        $message = 'No items currently in the bag';
    }
}

$subtotal = 0;
if (!empty($bag)) {
    foreach ($bag as $item) {
        $subtotal += $item['price'] * $item['quantity'];
    }
}

$templateVars = [
    'bag' => $bag,
    'subtotal' => $subtotal,
    'message' => $message
];

$output = loadTemplate('../templates/bag.html.php', $templateVars);

require '../templates/mainTemp.html.php';
?>
