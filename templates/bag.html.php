<section class="bag-page">
    <section class="bag-items">
        <h2 class="bag-title">My Bag</h3>
        <hr>
        <p class="message"><?=$message?></p>
    <?php
    for ($i = 0; $i < count($bag); $i++){
        $item = $bag[$i];
        ?>
        <article class="bag-item">
            <img src="<?=$item['image']?>" alt="Image of <?=$item['name']?>" class="bag-img">
            <section class="bag-item-info">
                <h3 class="bag-item-name"><?=$item['name']?></h3>
                <p class="bag-item-details">Size: <?=$item['size']?> | Quantity: <?=$item['quantity']?></p>
                <a href="deleteInBag.php?id=<?=$item['prodid']?>&size=<?=$item['size']?>" class="item-remove">Remove</a>
            </section>
            <p class="bag-item-price"><strong>£<?=$item['price']?></strong></p>
        </article>
        <hr>
        <?php
    }
    ?>
    </section>
    <section class="bag-summary">
        <h2 class="bag-title">Order Summary</h2>
        <hr>
        <form action="" class="to-checkout">
            <section class="bag-summary-prices">
                <p class="bag-sub-total"><span>Subtotal:</span> <span>£<?=$subtotal?></span></p>
                <p class="bag-shipping"><span>Shipping:</span> <span><strong>FREE</strong></span></p>
                <p class="bag-location">Delivering to <strong>United Kingdom</strong></p>
            </section>
            <hr>
            <p class="bag-total-price"><span>Total:</span> <span><strong>£<?=$subtotal?></strong></span></p>
            <input type="submit" value="Checkout">
        </form>
    </section>
</section>