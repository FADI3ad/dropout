<?php require_once __DIR__ . "/../admin/components/header.php"; ?>

<main id="main" class="main">

    <div class="pagetitle">
        <h1>Products</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/admin">Home</a></li>
                <li class="breadcrumb-item active">Products</li>
            </ol>
        </nav>
    </div>

    <section class="section">
        <div class="card">
            <div class="card-body">

                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h5 class="card-title mb-0">Products List</h5>

                    <button
                        class="btn btn-sm btn-primary"
                        data-bs-toggle="modal"
                        data-bs-target="#createProductModal">
                        <i class="bi bi-plus-lg"></i> Add Product
                    </button>
                </div>

                <table class="table table-hover align-middle datatable">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Title</th>
                            <th>Price</th>
                            <th>Sale %</th>
                            <th class="text-end">Actions</th>
                        </tr>
                    </thead>

                    <tbody>
                        
                        <?php foreach ($dataa[0] as $product): ?>
                            <tr>
                                <td><strong><?= $product->getId() ?></strong></td>
                                <td><?= $product->getTitle() ?></td>
                                <td><?= $product->getPrice() ?> EGP</td>
                                <td><?= $product->getSale() ?>%</td>

                                <td class="text-end">
                                    <div class="d-inline-flex gap-2">

                                        <!-- View -->
                                        <form action="/admin/product/show" method="GET">
                                            <input type="hidden" name="id" value="<?= $product->getId() ?>">
                                            <button class="btn btn-sm btn-outline-primary">
                                                <i class="bi bi-eye"></i>
                                            </button>
                                        </form>

                                        <!-- Delete -->
                                        <form action="/admin/product/delete" method="POST">
                                            <input type="hidden" name="id" value="<?= $product->getId() ?>">
                                            <button
                                                class="btn btn-sm btn-outline-danger"
                                                onclick="return confirm('Are you sure?')">
                                                <i class="bi bi-trash"></i>
                                            </button>
                                        </form>

                                    </div>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>

            </div>
        </div>
    </section>

</main>
<div class="modal fade" id="createProductModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">

            <form action="/admin/product/store" method="POST" enctype="multipart/form-data">

                <div class="modal-header">
                    <h5 class="modal-title">Create New Product</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>

                <div class="modal-body">

                    <!-- Title -->
                    <div class="mb-3">
                        <label class="form-label">Product Title</label>
                        <input
                            type="text"
                            name="title"
                            class="form-control"
                            required>
                    </div>

                    <!-- Description -->
                    <div class="mb-3">
                        <label class="form-label">Description</label>
                        <textarea
                            name="description"
                            class="form-control"
                            rows="3"></textarea>
                    </div>

                    <div class="row">
                        <!-- Price -->
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Price</label>
                            <input
                                type="number"
                                step="0.01"
                                name="price"
                                class="form-control"
                                required>
                        </div>

                        <!-- Sale -->
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Sale %</label>
                            <input
                                type="number"
                                step="0.01"
                                name="sale"
                                class="form-control"
                                value="0">
                        </div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Available Colors</label>
                        <select
                            name="colors"
                            class="form-select"
                            required>
                            <?php foreach ($dataa[1] as $color): ?>
                                <option value="<?= $color->getId() ?>">
                                    <?= $color->getName() ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                        <small class="text-muted">
                            Hold Ctrl (or Cmd) to select multiple colors
                        </small>
                    </div>

                    <!-- Images -->
                    <div class="mb-3">
                        <label class="form-label">Product Images</label>
                        <input
                            type="file"
                            name="image"
                            class="form-control"
                            accept="image/*">
                    </div>

                </div>

                <div class="modal-footer">
                    <button
                        type="button"
                        class="btn btn-sm btn-secondary"
                        data-bs-dismiss="modal">
                        Cancel
                    </button>
                    <button
                        type="submit"
                        class="btn btn-sm btn-primary">
                        Save Product
                    </button>
                </div>

            </form>

        </div>
    </div>
</div>

<?php require_once __DIR__ . "/../admin/components/footer.php"; ?>