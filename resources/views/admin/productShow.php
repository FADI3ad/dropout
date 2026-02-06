<?php require_once __DIR__ . "/../admin/components/header.php" ?>

<main id="main" class="main">

    <div class="pagetitle">
        <h1>Product Details</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/admin">Home</a></li>
                <li class="breadcrumb-item"><a href="/admin/product">Products</a></li>
                <li class="breadcrumb-item active">Show</li>
            </ol>
        </nav>
    </div>

    <?php $product = $data; ?>

    <section class="section">
        <div class="card">
            <div class="card-body">

                <div class="row align-items-start">
                    <!-- Image -->
                    <div class="col-md-3 text-center">
                        <?php if ($product->getImage()): ?>
                            <img src="/images/<?= $product->getImage()->image_path ?>"
                                 alt="<?= $product->getTitle() ?>"
                                 class="product-image">
                        <?php else: ?>
                            <img src="/images/default.png"
                                 alt="No Image"
                                 class="product-image">
                        <?php endif; ?>
                    </div>

                    <!-- Details -->
                    <div class="col-md-9">
                        <h3 class="mb-3"><?= $product->getTitle() ?></h3>

                        <p class="text-muted">
                            <?= $product->getDescription() ?>
                        </p>

                        <ul class="list-group list-group-flush mb-3">
                            <li class="list-group-item">
                                <strong>Price:</strong> <?= $product->getPrice() ?> EGP
                            </li>

                            <li class="list-group-item">
                                <strong>Sale:</strong> <?= $product->getSale() ?> %
                            </li>

                            <?php if ($product->getSale() > 0): ?>
                                <li class="list-group-item">
                                    <strong>Price After Sale:</strong>
                                    <?= $product->getPrice() - ($product->getPrice() * $product->getSale() / 100) ?> EGP
                                </li>
                            <?php endif; ?>
                        </ul>

                        <div class="d-flex gap-2 mt-4">
                            <a href="/admin/product" class="btn btn-sm btn-secondary">
                                <i class="bi bi-arrow-left"></i> Back
                            </a>

                            <form action="/admin/product/delete" method="POST">
                                <input type="hidden" name="id" value="<?= $product->getId() ?>">
                                <button class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">
                                    <i class="bi bi-trash"></i> Delete
                                </button>
                            </form>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

</main>

<style>
    .product-image {
        max-width: 100%;
        height: auto;
        border-radius: 8px;
        box-shadow: 0 2px 8px rgba(0,0,0,0.2);
        object-fit: cover;
    }

    .col-md-3 {
        max-width: 400px; 
    }

    .card-body {
        padding: 20px;
    }

    .list-group-item {
        font-size: 14px;
        padding: 10px 15px;
    }

    @media (max-width: 768px) {
        .col-md-3, .col-md-9 {
            max-width: 100%;
        }
        .product-image {
            margin-bottom: 15px;
        }
    }
</style>

<?php require_once __DIR__ . "/../admin/components/footer.php" ?>
