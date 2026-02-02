<?php require_once __DIR__ . "/../admin/components/header.php" ?>

<main id="main" class="main">

    <div class="pagetitle">
        <h1>Contact Messages</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/admin">Home</a></li>
                <li class="breadcrumb-item active">Contact Messages</li>
            </ol>
        </nav>
    </div>

    <section class="section">
        <div class="card">
            <div class="card-body">

                <h5 class="card-title">Messages</h5>

                <table class="table table-hover align-middle datatable">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Message</th>
                            <th class="text-end">Action</th>
                        </tr>
                    </thead>

                    <tbody>

                        <?php foreach($data as $message):?>

                        <tr>
                            <td><strong><?=$message->getName()?></strong></td>
                            <td><?=$message->getEmail()?></td>
                            <td class="text-truncate" style="max-width: 300px;">
                                <?=$message->getMessage()?>
                            </td>
                            <td class="text-end">
                                <div class="d-inline-flex gap-2">

                                    <!-- View -->
                                    <form action="/admin/contacts/show" method="GET">
                                        <input type="hidden" name="id" value="1">
                                        <button type="submit" class="btn btn-sm btn-outline-primary">
                                            <i class="bi bi-eye"></i>
                                        </button>
                                    </form>

                                    <!-- Delete -->
                                    <form action="/admin/contact/delete" method="POST">
                                        <input type="hidden" name="id" value="<?= $message->getId()?>">
                                        <button
                                            type="submit"
                                            class="btn btn-sm btn-outline-danger"
                                            onclick="return confirm('Are you sure you want to delete this message?')">
                                            <i class="bi bi-trash"></i>
                                        </button>
                                    </form>

                                </div>
                            </td>
                        </tr>
                        <?php endforeach ?>



                    </tbody>
                </table>

            </div>
        </div>
    </section>

</main>

<?php require_once __DIR__ . "/../admin/components/footer.php" ?>
