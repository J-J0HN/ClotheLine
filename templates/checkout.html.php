<h2 class="checkout-title">Checkout</h2>
<<<<<<< HEAD
<section class="form-container">
    <form action="order_confirmation.php" method="post" class="loginform">
        <input type="hidden" name="totalPrice" value="<?=$pricetag?>">
            <h3 class="section-title">Delivery Details</h3>
            <label for="delivery_add_street">Street:</label>
            <input type="text" name="delivery_add_street" id="delivery_add_street" required>
            <label for="delivery_add_county">County:</label>
            <input type="text" name="delivery_add_county" id="delivery_add_county" required>
            <label for="delivery_add_postcode">Postcode:</label>
            <input type="text" name="delivery_add_postcode" id="delivery_add_postcode" required>
            <label for="delivery_add_country">Country:</label>
            <input type="text" name="delivery_add_country" id="delivery_add_country" required>
            <hr>
            <h3 class="section-title">Payment Details</h3>
            <label for="card_name">Cardholder Name:</label>
            <input type="text" name="card_name" id="card_name" required>
            <label for="card_number">Card Number:</label>
            <input type="text" name="card_number" id="card_number" required>
            <label for="card_exp_date">Card Expiration Date:</label>
            <input type="text" name="card_exp_date" id="card_exp_date" required>
            <label for="card_cvv">Card CVV:</label>
            <input type="text" name="card_cvv" id="card_cvv" required>
            <hr>
            <h3 class="section-title">Contact Details</h3>
            <label for="phone_number">Phone Number:</label>
            <input type="text" name="phone_number" id="phone_number" required>
        <input type="submit" value="Place Order" name="submit" class="checkout-btn">
    </form>
=======
<section class="checkout-page">
    <section class="form-container">
        <form action="checkout.php" method="post" class="loginform">
                <h3 class="section-title">Delivery Details</h3>
                <label for="delivery_add_street">Street:</label>
                <input type="text" name="delivery_add_street" id="delivery_add_street" required>
                <label for="delivery_add_county">County:</label>
                <input type="text" name="delivery_add_county" id="delivery_add_county" required>
                <label for="delivery_add_postcode">Postcode:</label>
                <input type="text" name="delivery_add_postcode" id="delivery_add_postcode" required>
                <label for="delivery_add_country">Country:</label>
                <input type="text" name="delivery_add_country" id="delivery_add_country" required>
                <hr>
                <h3 class="section-title">Payment Details</h3>
                <label for="card_name">Cardholder Name:</label>
                <input type="text" name="card_name" id="card_name" required>
                <label for="card_number">Card Number:</label>
                <input type="text" name="card_number" id="card_number" required>
                <label for="card_exp_date">Card Expiration Date:</label>
                <input type="text" name="card_exp_date" id="card_exp_date" required>
                <label for="card_cvv">Card CVV:</label>
                <input type="text" name="card_cvv" id="card_cvv" required>
                <hr>
                <h3 class="section-title">Contact Details</h3>
                <label for="phone_number">Phone Number:</label>
                <input type="text" name="phone_number" id="phone_number" required>
            <input type="submit" value="Place Order" class="checkout-btn">
        </form>
    </section>
    <section class=checkout-products>
        <h2>Items</h2>
        <section>
            <?php
            for ($i = 0; $i < count($bag); $i++){
                ?>
                <article class="checkout-product">
                    <h3><?=$bag[$i]['prodname']?></h3>
                    <img src="<?=$bag[$i]['prodimg']?>" alt="" class="checkout-img">
                    <p>Size: <?=$bag[$i]['size']?></p>
                    <p><strong>Price: £<?=$bag[$i]['prodprice']?></strong></p>
                </article>
                <?php
            } 
            ?>
        </section>
        <section>
            <p>Subtotal: £<strong><?=$subtotal?></strong></p>
            <p>Delivery: <strong>Free</strong></p>
            <hr>
            <h3>Total: £<?=$subtotal?></h3>
        </section>
    </section>
>>>>>>> 55fe1eec462d8f96d28a129da9b0bf102c3fddab
</section>
