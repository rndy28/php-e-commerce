<?php
if (isset($_SESSION['checkout_success'])) {
    echo '<script type="text/javascript">
    alert("checkout success!!!");
    window.localStorage.clear();
    </script>';
    unset($_SESSION['checkout_success']);
}
?>

<div class="cart-container js-cart ">

    <div class="cart-empty-state">
        <img src="<?= BASEURL ?>/assets/img" alt="">
        <h1>Your cart is empty :(</h1>
        <a href="<?= BASEURL ?>/home#Products" class="btn btn-add-something">Add something</a>

    </div>

    <main class="cart-products-list ">
        <h2>My Cart.</h2>
        <div class="table table-orders-list">
            <div class="thead">
                <h4>Product</h4>
                <h4>Quantity</h4>
                <h4>Price</h4>
                <h4>Option</h4>
            </div>
            <div class="tbody js-orders-list">
            </div>
        </div>

        <div class="cart-footer">
            <a href="<?= BASEURL ?>/home#Products" class="btn-back">
                <img src="<?= BASEURL ?>/assets/icon/arrow-left.svg" alt="">
                <h3>Continue Shopping</h3>
            </a>
            <h3>
                <span>Total: </span>
                <span class="js-total-price"></span>
            </h3>
        </div>
    </main>
    <form action="<?=BASEURL?>/cart/checkout" method="POST" class="cart-payment-container">
    <input type="hidden" name="data">
        <h2>Payment Info.</h2>
        <div class="cart-payment-info cart-payment-method">
            <p>Payment Method:</p>
            <label class="radio-container">
                <h3 class="radio-text">Credit Card</h3>
                <input type="radio" name="radio" checked>
                <span class="checkmark"></span>
            </label>
            <label class="radio-container">
                <h3 class="radio-text">Paypal</h3>
                <input type="radio" name="radio">
                <span class="checkmark"></span>
            </label>
        </div>

        <div class="cart-payment-info cart-payment-name">
            <p>Name On Card:</p>
            <h3><?= ucfirst($_SESSION['user']['Username']) ?></h3>
        </div>


        <button type="submit" name="checkout" class="btn btn-checkout">Check out</button>
    </form>
</div>