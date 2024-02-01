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
                <div class="row my-2">
                    <div class="col-6 my-2">
                        <a class="btn btn-outline-primary" href="javascript:void(0);" onclick="goBack()">Back</a>
                    </div>
                </div>
                <form action="<?= ROOT_PATH ?>category/edit?id=<?= $category->id ?>" method="post" enctype="multipart/form-data">
                    <div class="card mb-4">
                        <div class="card-header">Account Details</div>
                        <div class="card-body">
                            <form action="" method="post" enctype="multipart/form-data">
                                <div class="mb-3">
                                    <label class="small mb-1" for="inputUsername">Name Category</label>
                                    <input class="form-control" id="inputUsername" type="text" placeholder="Name Category" name="category_name" value="<?= $category->category_name ?>">
                                </div>
                                <div class="mb-3">
                                    <label class="small mb-1" for="inputAvatar">Thumb Nail</label>
                                    <input class="form-control" id="inputAvatar" type="file" placeholder="Thumb Nail" name="thumnail">
                                </div>
                                <div class="old-image">
                                    <p class="mt-3">Old Image:</p>
                                    <?php if ($category && $category->thumnail) : ?>
                                        <img src="<?= ROOT_PATH ?>images/products/<?= $category->thumnail ?>" height="200" alt="Old image" width="200" class="">
                                    <?php endif; ?>
                                </div>
                                <div class="mb-3">
                                    <label class="small mb-1" for="inputFirstName">Description</label>
                                    <input class="form-control" id="inputFirstName" type="text" placeholder="Description" name="description" value="<?= $category->description ?>">
                                </div>
                                <div class=" mb-3 form-group">
                                    <label class="small mb-1" for="inputEmailAddress">Status</label>
                                    <select name="status" class="form-control" required>
                                        <option value="">Choose a status</option>
                                        <option value="0" <?php if ($category->status === 0) echo 'selected' ?>>0</option>
                                        <option value="1" <?php if ($category->status === 1) echo 'selected' ?>>1</option>
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
</div>
<script>
    function goBack() {
        window.history.back();
    }
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.2/js/bootstrap.bundle.min.js"></script>
</body>

</html>