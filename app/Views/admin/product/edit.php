<?php
require_once './app/Views/admin/navbar.php';

?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row my-1">
                <div class="col-sm-6">
                    <h1 class="text-success">Create a new account</h1c>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="index.php?act=">Home</a></li>
                        <li class="breadcrumb-item active ">Create account</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <div class="container-xl px-4 mt-1">
        <hr class="mt-0 mb-4">
        <div class="row d-flex justify-content-center">
            <div class="col-xl-10">
                <!-- Account details card-->
                <div class='d-flex gap-3'>

                    <div class="row my-2">
                        <div class="col-6 my-2">
                            <a class="btn btn-outline-primary" href="javascript:void(0);" onclick="goBack()">Back</a>
                        </div>
                    </div>
                    <div class="row my-2 w-100">
                        <div class="col-6 my-2">
                            <a class="btn btn-outline-primary" href="<?= ROOT_PATH ?>admin/product" onclick="goBack()">Go to list</a>
                        </div>
                    </div>
                </div>
                <form action="<?= ROOT_PATH ?>product/edit" method="post" enctype="multipart/form-data">
                    <div class="card mb-4">
                        <div class="card-header">Account Details</div>
                        <div class="card-body">
                            <form action="" method="post" enctype="multipart/form-data">
                                <input type="hidden" name="id" value="<?= $product->id ?>">
                                <div class="mb-3">
                                    <label class="small mb-1" for="inputFirstName">Category</label>
                                    <select name="id_category" class="form-control" required>
                                        <option value="">Choose a category</option>
                                        <?php if (isset($categories)) : ?>
                                            <?php foreach ($categories as $category) : ?>
                                                <option value="<?= $category->id ?>" <?php if ($category->id == $product->id_category) echo 'selected'; ?>>
                                                    <?= $category->category_name ?>
                                                </option>
                                            <?php endforeach ?>
                                        <?php endif; ?>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label class="small mb-1" for="inputUsername">Product Name</label>
                                    <input class="form-control" id="inputUsername" type="text" placeholder="Product Name" name="name" value="<?= $product->name ?>">
                                </div>
                                <div class="row gx-3 mb-3">
                                    <div class="col-md-6">
                                        <label class="small mb-1" for="inputFirstName">Price</label>
                                        <input class="form-control" id="inputFirstName" type="text" placeholder="Price" name="price" value="<?= $product->price ?>">
                                    </div>
                                    <div class="col-md-6">
                                        <label class="small mb-1" for="inputLastName">Quantity</label>
                                        <input class="form-control" id="inputLastName" type="text" placeholder="Quantity" name="quantity" value="<?= $product->quantity ?>">
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <label class="small mb-1" for="inputEmailAddress">Origin</label>
                                    <input class="form-control" id="inputEmailAddress" type="text" placeholder="Origin" name="origin" value="<?= $product->origin ?>">
                                </div>
                                <div class="mb-3">
                                    <label class="small mb-1" for="inputAvatar">Image</label>
                                    <input class="form-control" id="inputAvatar" type="file" placeholder="Image" name="images">
                                </div>
                                <div class="old-image">
                                    <p class="mt-3">Old Image:</p>
                                    <?php if ($product && $product->images) : ?>
                                        <img src="<?= ROOT_PATH ?>images/<?= $product->images ?>" height="200" alt="Old image" width="200" class="">
                                    <?php endif; ?>
                                </div>

                                <div class="mb-3 form-group">
                                    <label class="small mb-1" for="inputEmailAddress">Status</label>
                                    <select name="status" class="form-control" required>
                                        <option value="">Choose a status</option>
                                        <option value="0" <?php if ($product->status === 0) echo 'selected' ?>>0</option>
                                        <option value="1" <?php if ($product->status === 1) echo 'selected' ?>>1</option>
                                    </select>
                                </div>
                                <input class="btn btn-primary" type="submit" value="Update">
                            </form>
                        </div>
                    </div>
                </form>
            </div>
        </div>
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
<script>
    function goBack() {
        window.history.back();
    }
    document.addEventListener('DOMContentLoaded', function() {
        var toastElement = document.querySelector('#basicToast');
        var toast = new bootstrap.Toast(toastElement);
        setTimeout(function() {
            toast.show();
        }, 0);
    });
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.2/js/bootstrap.bundle.min.js"></script>
</body>

</html>