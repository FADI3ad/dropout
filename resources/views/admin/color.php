<?php require_once __DIR__ . "/../admin/components/header.php"; ?>

<main id="main" class="main">

    <div class="pagetitle">
        <h1>Colors</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/admin">Home</a></li>
                <li class="breadcrumb-item active">Colors</li>
            </ol>
        </nav>
    </div>

    <section class="section">
        <div class="card">
            <div class="card-body">

                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h5 class="card-title mb-0">Colors List</h5>

                    <!-- Create Button -->
                    <button
                        class="btn btn-sm btn-primary"
                        data-bs-toggle="modal"
                        data-bs-target="#createColorModal">
                        <i class="bi bi-plus-lg"></i> Add Color
                    </button>
                </div>

                <table class="table table-hover align-middle datatable">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Color Name</th>
                            <th class="text-end">Actions</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php foreach ($data as $color): ?>
                            <tr>
                                <td><strong><?= $color->getId() ?></strong></td>
                                <td><?= $color->getName() ?></td>

                                <td class="text-end">
                                    <div class="d-inline-flex gap-2">

                                        <!-- View -->
                                        <form action="/admin/color/show" method="GET">
                                            <input type="hidden" name="id" value="<?= $color->getId() ?>">
                                            <button type="submit" class="btn btn-sm btn-outline-primary">
                                                <i class="bi bi-eye"></i>
                                            </button>
                                        </form>

                                        <!-- Delete -->
                                        <form action="/admin/color/delete" method="POST">
                                            <input type="hidden" name="id" value="<?= $color->getId() ?>">
                                            <button
                                                type="submit"
                                                class="btn btn-sm btn-outline-danger"
                                                onclick="return confirm('Are you sure you want to delete this color?')">
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


<div class="modal fade" id="createColorModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">

            <form action="/admin/color/store" method="POST">

                <div class="modal-header">
                    <h5 class="modal-title">Create New Color</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>

                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label">Color Name</label>
                        <input
                            type="text"
                            name="name"
                            class="form-control"
                            placeholder="e.g. Red"
                            required>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-sm btn-secondary" data-bs-dismiss="modal">
                        Cancel
                    </button>
                    <button type="submit" class="btn btn-sm btn-primary">
                        Save
                    </button>
                </div>

            </form>

        </div>
    </div>
</div>

<?php require_once __DIR__ . "/../admin/components/footer.php"; ?>
