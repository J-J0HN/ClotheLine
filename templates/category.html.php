<div class="product-filter">
  <h2 class="filter-heading">Filter Products</h2>
  <form>
    <div class="form-group">
      <label for="size">Size:</label>
      <select id="size" name="product[size]">
        <option value="">All sizes</option>
        <option value="S">S</option>
        <option value="M">M</option>
        <option value="L">L</option>
        <option value="XL">XL</option>
      </select>
    </div>
    <div class="form-group">
      <label for="color">Color:</label>
      <select id="color" name="product[colour]">
        <option value="">All colours</option>
        <option value="red">Red</option>
        <option value="green">Green</option>
        <option value="blue">Blue</option>
        <option value="yellow">Yellow</option>
      </select>
    </div>
    <div class="form-group">
  <label for="price">Price:</label>
  <input type="range" id="price" name="product[price]" min="0" max="300" value="0" oninput="updatePriceValue(this.value)">
  <output for="price" id="price-value">$0</output>
</div>
    <button type="submit">Filter</button>
  </form>
</div>

<div class="products">
    <h1 class="category-name"><?=$category['name'] . isset($_GET['subcatid'])?$subcat['name'] :'';?> </h1>
    <?php
    foreach($products as $product){
        ?>
    <div class="single-product"> 
    <a href="product.php?id=<?=$product['prodid']?>"><img src="<?=$product['prodimg']?>" alt="<?=$product['prodname']?>" class="prodimage"></a>
    <h3 class="prodname"><?=$product['prodname']?></h3>
    <p class="prodprice">£<?=$product['prodprice']?></p>
    </div>
    <?
    }

?>
</div>
