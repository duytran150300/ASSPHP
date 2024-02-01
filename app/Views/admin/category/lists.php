<?php
require_once './app/Views/admin/navbar.php';
?>
<div class="card shadow border-0 mb-7">
    <div class="card-header">
        <h5 class="mb-0">Users</h5>
    </div>
    <div class="table-responsive">
        <table class="table table-hover table-nowrap text-center table-hover">
            <a href="<?= ROOT_PATH ?>category/create" class="btn btn-outline-success my-3  ">CREATE +</a>
            <thead class="thead-light">
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Name Category</th>
                    <th scope="col">Thumb Nail</th>
                    <th scope="col">Description</th>
                    <th scope="col">Status</th>
                    <th scope="col">Action</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($categories as $key => $item) : ?>

                    <tr>
                        <td><?= $key + 1 ?></td>
                        <td>

                            <a class="text-heading font-semibold" href="#">
                                <?= $item->category_name ?>
                            </a>
                        </td>

                        <td>
                            <a class="text-heading font-semibold" href="#">
                                <img alt="..." src="<?= ROOT_PATH ?>images/products/<?= $item->thumnail ?>" class="avatar avatar-xl rounded-circle me-2">
                            </a>
                        </td>
                        <td>

                            <a class="text-heading font-semibold" href="#">
                                <?= $item->description ?>
                            </a>
                        </td>
                        <td class="project-state">
                            <span class="badge <?= $item->status === 1 ? ' bg-success' : ' bg-danger' ?>">
                                <?= $item->status === 1  ? 'Activated' : 'Not activated' ?>
                            </span>
                        </td>
                        <td class="project-actions text-center">
                            <a class="btn btn-info btn-sm" href="<?= ROOT_PATH ?>category/detail?id=<?= $item->id ?>">
                                <i class="fa-solid fa-circle-info"></i>
                                View
                            </a>
                            <a class="btn btn-warning btn-sm" href="<?= ROOT_PATH ?>category/edit?id=<?= $item->id ?>">
                                <i class="fas fa-pencil-alt"></i>
                                Edit
                            </a>
                            <a class="btn btn-danger btn-sm" onclick="return del()" href="<?= ROOT_PATH ?>admin/category/delete?id=<?= $item->id ?>">
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
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.2/js/bootstrap.bundle.min.js"></script>
<script>
    function del(name) {

        return confirm('Do you want to delete ? ', name)

    }
</script>
</body>

</html>