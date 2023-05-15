<section class="product-page">
    <article class="product-card">
        <img class="product-card-img" src="/<?=$item['prodimg']?>" alt="Image of <?=$item['prodname']?>">
        <section class="product-info">
            <p class="product-category"><?=$item['category']?></p>
            <header class="product-header">
                <h3 class="product-title"><?=$item['prodname']?></h3>
                <p class="product-price">£<?=$item['prodprice']?></p>
            </header>
            <form class="product-card-inputs" action="bag.php" method="POST">
                <select name="item[size]" id="product-size">
                    <option value="">--Choose a size--</option>
                    <option value="XS" class="">Extra Small</option>
                    <option value="S"  class="">Small</option>
                    <option value="M"  class="">Medium</option>
                    <option value="L"  class="">Large</option>
                    <option value="XL"  class="">Extra Large</option>
                </select>
                <section class="product-quantity">
                    <label for="quantity"><strong>Quantity: </strong></label>
                    <input type="number" step="1" id="quantity" name="item[quantity]" min="1" max="10" value="1"/>
                </section>
                <input type="hidden" name="item[prodid]" value="<?=$item['prodid']?>">
                <input name="toBag" type="submit" value="Add To Bag">
            </form>
        </section>
    </article>
</section>