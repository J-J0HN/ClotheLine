<?php
session_start();
require '../pdo.php';
require '../functions.php';

if (!isset($_SESSION['login'])) {
    header('Location: login.php');
    exit();
}

if (isset($_SESSION['bag'])){
    $subtotal = 0;
    for ($i=0; $i < count($_SESSION['bag']); $i++){
        var_dump($_SESSION['bag'][$i]);
        $bag[$i] = find($pdo, 'product', 'prodid', $_SESSION['bag'][$i]['prodid'])[0];
        $subtotal += $bag[$i]['prodprice'];
    }
    echo $subtotal;

    $templateVars= [
        'bag' => $bag,
        'subtotal' => $subtotal
    ];
}

if (isset($_POST['delivery_add_street']) && isset($_POST['delivery_add_county']) && isset($_POST['delivery_add_postcode']) && isset($_POST['delivery_add_country']) && isset($_POST['card_name']) && isset($_POST['card_number']) && isset($_POST['card_exp_date']) && isset($_POST['card_cvv']) && isset($_POST['phone_number'])) {
    $delivery_add_street = $_POST['delivery_add_street'];
    $delivery_add_county = $_POST['delivery_add_county'];
    $delivery_add_postcode = $_POST['delivery_add_postcode'];
    $delivery_add_country = $_POST['delivery_add_country'];
    $card_name = $_POST['card_name'];
    $card_number = $_POST['card_number'];
    $card_exp_date = $_POST['card_exp_date'];
    $card_cvv = $_POST['card_cvv'];
    $phone_number = $_POST['phone_number'];

    $userid = $_SESSION['login'];

    $query = "INSERT INTO 'order' (prodid, delivery_add_street, delivery_add_county, delivery_add_postcode, delivery_add_country, price, quantity, card_name, card_number, card_exp_date, card_cvv, phone_number, billing_add_house_number, billing_add_street, billing_add_county, billing_add_postcode, billing_add_country, delivery_add_house_number, userid) VALUES ";

    foreach ($_SESSION['bag'] as $item) {
        $prodid = $item['prodid'];
        $price = $item['price'];
        $quantity = $item['quantity'];
        $billing_add_house_number = $item['billing_add_house_number'];
        $billing_add_street = $item['billing_add_street'];
        $billing_add_county = $item['billing_add_county'];
        $billing_add_postcode = $item['billing_add_postcode'];
        $billing_add_country = $item['billing_add_country'];
        $delivery_add_house_number = $item['delivery_add_house_number'];

        $query .= "('$prodid', '$delivery_add_street', '$delivery_add_county', '$delivery_add_postcode', '$delivery_add_country', '$price', '$quantity', '$card_name', '$card_number', '$card_exp_date', '$card_cvv', '$phone_number', '$billing_add_house_number', '$billing_add_street', '$billing_add_county', '$billing_add_postcode', '$billing_add_country', '$delivery_add_house_number', '$userid'),";
    }

    // Remove the trailing comma from the query
    $query = rtrim($query, ',');

    $result = $pdo->query($query);

    if ($result) {
        // Order placed successfully
        // Clear the session bag
        $_SESSION['bag'] = [];

        // Redirect to the order confirmation page
        header('Location: order_confirmation.php');
        exit();
    } else {
        // Error occurred while inserting the order details
        echo "An error occurred while placing the order.";
    }
} else {
    // Invalid form submission
    header('Location: checkout.html.php');
    exit();
}



$output = loadTemplate('../templates/checkout.html.php', $templateVars);

require '../templates/mainTemp.html.php';