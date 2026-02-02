<?php require_once __DIR__ . "/../admin/components/header.php"; ?>

<main id="main" class="main">

    <div class="pagetitle">
        <h1>Users</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/admin">Home</a></li>
                <li class="breadcrumb-item active">Users</li>
            </ol>
        </nav>
    </div>

    <section class="section">
        <div class="card">
            <div class="card-body">

                <h5 class="card-title">Users List</h5>

                <table class="table table-hover align-middle datatable">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Role</th>
                            <th>Created At</th>
                            <th class="text-end">Actions</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php foreach ($data as $user): ?>
                            <tr>
                                <td><strong><?= $user->getId() ?></strong></td>
                                <td><?= $user->getName() ?></td>
                                <td><?= $user->getEmail() ?></td>
                                <td>
                                    <span class="badge bg-secondary">
                                        <?=$user->getRole()?>
                                    </span>
                                </td>
                                <td><?= $user->getCreatedAt() ?></td>

                                <td class="text-end">
                                    <div class="d-inline-flex gap-2">

                                        <!-- View -->
                                        <form action="/admin/user/show" method="GET">
                                            <input type="hidden" name="id" value="<?= $user->getId() ?>">
                                            <button type="submit" class="btn btn-sm btn-outline-primary">
                                                <i class="bi bi-eye"></i>
                                            </button>
                                        </form>

                                        <!-- Delete -->
                                        <form action="/admin/user/delete" method="POST">
                                            <input type="hidden" name="id" value="<?= $user->getId() ?>">
                                            <button
                                                type="submit"
                                                class="btn btn-sm btn-outline-danger"
                                                onclick="return confirm('Are you sure you want to delete this user?')">
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

<?php require_once __DIR__ . "/../admin/components/footer.php"; ?>
