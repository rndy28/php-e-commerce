<header>
    <div class="intro-container">
        <div class="intro">
            <h1>Get The Best Deals on Printer</h1>
            <a href="#Products" class="btn btn-shop">
                <span>shop now</span>
                <img src="<?= BASEURL ?>/assets/icon/arrow-right.svg" alt="" />
            </a>
        </div>
        <div class="intro-bg">
            <img src="<?= BASEURL ?>/assets/img/printer-illustration.svg" alt="Printer">
        </div>
    </div>
</header>

<section id="Products" class="products">
    <h2>Products</h2>
    <div class="products-list js-products-list">

        <?php
        foreach ($data['barang'] as $barang) {
        ?>
            <div class="card">
                <img src="<?= BASEURL ?>/assets/img/printer/<?= $barang['ThumbnailPrinter'] ?>" alt="Printer thumbnail" />
                <div class="card-content">
                    <h2 class="card-title"><?= $barang['NamaPrinter'] ?></h2>
                    <p class="card-description"><?= $barang['SpesifikasiPrinter'] ?></p>
                    <p class="card-product-price js-harga-printer"><?= $barang['HargaPrinter'] ?></p>
                    <a href="#" class="btn btn-add-product js-add-product" data-product-id="<?= $barang['IdPrinter'] ?>">Add To Cart</a>
                </div>
            </div>
        <?php
        }
        ?>

    </div>
</section>

<footer class="footer">
    <h3>rendyramadhan838@gmail.com</h3>
</footer>