<?php require_once __DIR__ . "/../components/header.php"; ?>

<!-- Products Page -->
<section class="pt-60 pb-60 gray-bg">
    <div class="container">

        <!-- Section Title -->
        <div class="row">
            <div class="col text-center">
                <div class="section-title">
                    <h2>Our Products</h2>
                    <p>Explore our wide range of products</p>
                </div>
            </div>
        </div>

        <!-- Products Grid -->
        <div class="row justify-content-center">

            <?php foreach ($data as $product): ?>
                <div class="col-xl-3 col-lg-4 col-md-4 col-sm-6 col-12">
                    <div class="single-tranding mb-30">
                        <a href="/product/show?id=<?= $product->getId() ?>">

                            <div class="tranding-pro-img">
                                <?php if ($product->getImage()): ?>
                                    <img src="/images/<?= $product->getImage()->image_path ?>"
                                        alt="<?= $product->getTitle() ?>">
                                <?php else: ?>
                                    <img src="/images/default.png" alt="No Image">
                                <?php endif; ?>
                            </div>

                            <div class="tranding-pro-title">
                                <h3><?= $product->getTitle() ?></h3>
                                <h4>Product</h4>
                            </div>

                            <div class="tranding-pro-price">
                                <div class="price_box">
                                    <span class="current_price">$50.00</span>
                                    <span class="old_price">$60.00</span>
                                </div>
                            </div>

                        </a>
                    </div>
                </div>
            <?php endforeach; ?>

        </div>
    </div>
</section>

<?php require_once __DIR__ . "/../components/footer.php"; ?>