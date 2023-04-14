<div class="product-filter">
  <h2>Filter Products</h2>
  <form>
    <div class="form-group">
      <label for="size">Size:</label>
      <select id="size">
        <option value="">All sizes</option>
        <option value="S">S</option>
        <option value="M">M</option>
        <option value="L">L</option>
        <option value="XL">XL</option>
      </select>
    </div>
    <div class="form-group">
      <label for="color">Color:</label>
      <select id="color">
        <option value="">All colors</option>
        <option value="red">Red</option>
        <option value="green">Green</option>
        <option value="blue">Blue</option>
        <option value="yellow">Yellow</option>
      </select>
    </div>
    <div class="form-group">
      <label for="price">Price:</label>
      <input type="range" id="price" name="price" min="0" max="1000" value="500">
      <output for="price" id="price-value">$500</output>
    </div>
    <button type="submit">Filter</button>
  </form>
</div>


<h1><?=$category['name'];?> Products</h1>
