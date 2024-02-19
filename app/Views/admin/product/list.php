<?php
require_once './app/Views/admin/navbar.php';
?>
<div class="container card shadow border-0 mb-7">
    <div class="card-header">
        <h5 class="mb-0">Product of Machi</h5>
    </div>
    <div class="table-responsive">
        <table class="table table-hover table-nowrap text-center table-hover">
            <a href="<?= ROOT_PATH ?>product/create" class="btn btn-outline-success my-3  ">CREATE +</a>
            <thead class="thead-light">
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Category</th>
                    <th scope="col">Product Name</th>
                    <th scope="col">Price</th>
                    <th scope="col">Quantity</th>
                    <th scope="col">Origin</th>
                    <th scope="col">Image</th>
                    <th scope="col">Status</th>
                    <th scope="col">Action</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($products as $key => $item) : ?>

                    <tr>
                        <td><?= $key + 1 ?></td>
                        <td>
                            <?php if (isset($categories)) : ?>
                                <?php foreach ($categories as $category) : ?>
                                    <?php if ($category->id == $item->id_category) : ?>
                                        <a class="text-heading font-semibold" href="#">
                                            <?= $category->category_name ?>
                                        </a>

                                    <?php endif ?>
                                <?php endforeach ?>
                            <?php endif; ?>

                        </td>
                        <td>
                            <a class="text-heading font-semibold" href="#">
                                <?= $item->name ?>
                            </a>
                        </td>

                        <td>
                            <a class="text-heading font-semibold" href="#">
                                <?= $item->price ?>
                            </a>
                        </td>
                        <td>
                            <?= $item->quantity ?>
                        </td>
                        <td>
                            <?= $item->origin ?>
                        </td>
                        <td>
                            <img alt="..." src="<?= ROOT_PATH ?>images/<?= $item->images ?>" class="avatar avatar-sm rounded-circle me-2">

                        </td>

                        <td class="project-state">
                            <span class="badge <?= $item->status === 1 ? ' bg-success' : ' bg-danger' ?>">
                                <?= $item->status === 1  ? 'Activated' : 'Not activated' ?>
                            </span>
                        </td>
                        <td class="project-actions text-center">
                            <!-- <a class="btn btn-info btn-sm" href="<?= ROOT_PATH ?>product/detail?id=<?= $item->id ?>">
                                <i class="fa-solid fa-circle-info"></i>
                                View
                            </a> -->
                            <a class="btn btn-warning btn-sm" href="<?= ROOT_PATH ?>product/edit?id=<?= $item->id ?>">
                                <i class="fas fa-pencil-alt"></i>
                                Edit
                            </a>
                            <a class="btn btn-danger btn-sm" onclick="return del()" href="<?= ROOT_PATH ?>product/delete?id=<?= $item->id ?>">
                                <i class="fas fa-trash">
                                </i>
                                Delete
                            </a>
                        </td>
                    </tr>
                <?php endforeach; ?>

            </tbody>
        </table>
    </div>
    <div class="card-footer border-0 py-5">
        <span class="text-muted text-sm">Showing 10 items out of 250 results found</span>
    </div>
    <?php
    if ($message) : ?>

        <div class="toast-container position-fixed top-0 end-0 p-3">
            <div id="basicToast" class="toast" role="alert" aria-live="assertive" aria-atomic="true">
                <div class="toast-header bg-primary text-light">
                    <h5 class="my-0">Machi Shop</h5>
                </div>
                <div class="toast-body">
                    <?= $message ?>
                </div>
            </div>
        </div>
    <?php endif ?>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.2/js/bootstrap.bundle.min.js"></script>
<script>
    function del(name) {

        return confirm('Do you want to delete ? ', name)

    }
    document.addEventListener('DOMContentLoaded', function() {
        var toastElement = document.querySelector('#basicToast');
        var toast = new bootstrap.Toast(toastElement);
        setTimeout(function() {
            toast.show();
        }, 0);
    });
</script>
</body>

</html>