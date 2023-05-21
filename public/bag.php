<?php
if(session_id() == '') {
    session_start();
    require '../pdo.php';
    require '../functions.php';
}
$mainClass='bag';
$title='My Bag';

if(isset($_POST['item'])){
    $item = $_POST['item'];
    if(empty($_SESSION['bag'])){
        $_SESSION['bag'][] = $_POST['item'];
    } else {
        for ($i = 0; $i < count($_SESSION['bag']); $i++){
            $bag_item = $_SESSION['bag'][$i];
            foreach ($item as $key => $value){
                if(strcmp($key, 'quantity') != 0){
                    if(strcmp($bag_item[$key], $item[$key]) == 0){
                        $duplicate = true;
                        $existItemIndex[] = $i;
                    } else {
                        $duplicate = false;
                        break;
                    }
                }
            }
            if($duplicate){
                $_SESSION['bag'][$i]['quantity'] += $item['quantity'];
                break;
            }
        }
        if(!$duplicate){
            $_SESSION['bag'][] = $_POST['item'];
        }
    }
}

if(!empty($_SESSION['bag'])){
    $message = '';
    //Display items in bag session
    for ($i = 0; $i < count($_SESSION['bag']); $i++){
        $bag[] = $_SESSION['bag'][$i];
    }
    
    for ($i = 0; $i < count($bag); $i++){
        $bag[$i]['name'] = find($pdo, 'product', 'prodid', $bag[$i]['prodid'])[0]['prodname'];
        $bag[$i]['price'] = find($pdo, 'product', 'prodid', $bag[$i]['prodid'])[0]['prodprice'];
        $bag[$i]['image'] = find($pdo, 'product', 'prodid', $bag[$i]['prodid'])[0]['prodimg'];
    }

    if (isset($_SESSION['LoggedIn'])){
        //Update and insert session items into bag item table
        //Display items in bag item table
    } else {
        //Not logged in
    }
} else {
    //No items added this session
    if(empty($bag)){
        $bag = [];
        $message = 'No items currently in bag';
    }
}

$subtotal = 0;
if(!empty($bag)){
    foreach($bag as $item){
        $subtotal += $item['price'] * $item['quantity'];
    }
}

$templateVars= [
    'bag' => $bag,
    'subtotal' => $subtotal,
    'message' => $message
];

$output = loadTemplate('../templates/bag.html.php',$templateVars);

require '../templates/mainTemp.html.php';
?>