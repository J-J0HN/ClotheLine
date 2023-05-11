<?php
    session_start();
    require '../pdo.php';
    require '../functions.php';
    $mainClass='product';

    if(isset($_GET['id'])){
        if (isset($_GET['id'])){
            $item = find($pdo, 'product', 'prodid', $_GET['id'])[0];
            $title = 'ClotheLine - ' . $item['prodname'];
        } 
    }

    if(empty($item['prodimg'])){
        $item['image'] = '';
    }

    $templateVars= [
        'item'=>$item,
    ];

    $output = loadTemplate('../templates/product.html.php',$templateVars);
    require '../templates/mainTemp.html.php';
?>