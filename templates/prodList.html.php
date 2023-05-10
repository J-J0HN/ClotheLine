<h1><a href="adminDash.php" class="adminBack">
    <i class="fa-solid fa-arrow-left-long" style="
        position: relative;
        right: 2em;
        display: flex;
        align-items: center;
    "></i>
</a>Products</h1>
<form action="admin.php" class='addCatButton'>
    <input type="submit" value="Add new product" name = "add" id="addCatBtn">
</form>

<div class="admin-products">
    <?php
    foreach($products as $product){
        ?>
    <div class="single-product-admin"> 
    <img src="<?=$product['prodimg']?>" alt="<?=$product['prodname']?>" class="prodimage">
    <h3 class="prodname"><?=$product['prodname']?></h3>
    <p class="prodprice">£<?=$product['prodprice']?></p>
    <a href="admin.php?id=<?=$product['prodid']?>"><p>Edit</p></a>
    </div>
    <?
    }

?>
</div>