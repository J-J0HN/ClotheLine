<?php
session_start();
require '../pdo.php';
require '../functions.php';
$mainClass='main';

if(isset($_GET['q'])){
    
    $products=findLike($pdo, 'product', 'prodname', $_GET['q']);
    
    $templateVars=[
        
        'products' => $products

    ];


}else{
    $_GET['q'] =false;
if(isset($_GET['subcatid'])){

    $category=find($pdo, 'category', 'catid', $_GET['f'])[0];
    $subcat=find($pdo, 'subcategory', 'subcatid', $_GET['subcatid'])[0];
    $title= "Clotheline - " . $category['name'] . ' ' . $subcat['name'];
    $products = findAnd($pdo, 'product', 'category', $_GET['f'], 'subcategory', $_GET['subcatid']);
    $templateVars=[
        'category'=>$category,
        'products'=>$products,
        'subcat'=>$subcat
    ];

}else{
    $category=find($pdo, 'category', 'catid', $_GET['f'])[0];
    $title= "Clotheline - " . $category['name'];
    $products = find($pdo, 'product', 'category', $_GET['f']);
    $templateVars=[
        'category'=>$category,
        'products'=>$products
    ];

}
}

if(isset($_GET['productsize']) || isset($_GET['productcolour']) || isset($_GET['productprice'])){
    $filter = '';
    $params = [];
    if(!empty($_GET['productprice'])){
        $filter .= ' AND prodprice <= :price';
        $params['prodprice'] = $_GET['productprice'];
    }
    if(!empty($_GET['productcolour'])){
        $filter .= ' AND prodColour = :colour';
        $params['prodColour'] = $_GET['productcolour'];
    }
    if(!empty($_GET['productsize'])){
        $filter .= ' AND prodSize = :size';
        $params['prodSize'] = $_GET['productsize'];
    }

    $products = findWithParams($pdo, 'product', $params);
    print_r($products);
    $title = 'filtered';

    $templateVars=[
        'products'=>$products
    ];
}


$output = loadTemplate('../templates/category.html.php',$templateVars);
require '../templates/mainTemp.html.php';

?>