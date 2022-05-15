<?php
$lastUrl = explode('/', $_SERVER['REQUEST_URI']);
$lastUrl = end($lastUrl);
?>

<nav class="nav">
    <h3 class="nav-logo">Printe</h3>
    <div class="nav-list-wrapper js-nav-list">
        <div>
            <img src="<?= BASEURL ?>/assets/icon/cross.svg" alt="Close Icon" class="nav-close-icon js-close-nav">
            <ul class="nav-list">
                <li class="nav-item"><a href="<?= BASEURL ?>/home">Home</a></li>
                <li class="nav-item"><a href="<?= BASEURL ?>/home#Products">Products</a></li>
                <?php
                if(isset($_SESSION['user'])) {
                    echo '<li class="nav-item"><a href="'.BASEURL.'/orders">Orders</a></li>';
                } else {
                    echo '<li class="nav-item"><a href="'.BASEURL.'/home#New">New</a></li>';
                }
                ?>
            </ul>
            <ul class="nav-list nav-list-right">
                <?php
                if (isset($_SESSION['user'])) {
                ?>
                    <li>
                        <h4>Hi <span class="js-user"><?= ucfirst($_SESSION['user']['Username']) ?></span> !</h4>
                    </li>
                    <li><a href="<?= BASEURL ?>/logout">Logout</a></li>
                    <?php
                    if ($lastUrl != 'cart') {
                    ?>
                        <li>
                            <a href="<?= BASEURL ?>/cart" class="nav-cart-icon">
                                <span class="nav-cart-orders js-cart-orders"></span>
                                <img src="<?= BASEURL ?>/assets/icon/cart.svg" alt="Cart Icon" />
                            </a>
                        </li>
                    <?php
                    }
                    ?>
                <?php
                } else {
                ?>
                    <li><a href="<?= BASEURL ?>/login">Sign In</a></li>
                    <li><a href="#">Sign Up</a></li>
                <?php
                }
                ?>
            </ul>
        </div>
    </div>
    <img src="<?= BASEURL ?>/assets/icon/hamburger.svg" alt="Open Icon" class="nav-burger-icon js-open-nav">
</nav>