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
                            <a class="btn btn-outline-primary" href="<?= ROOT_PATH ?>admin/account" onclick="goBack()">Go to list</a>
                        </div>
                    </div>
                </div>
                <form action="<?= ROOT_PATH ?>account/create" method="post" enctype="multipart/form-data">
                    <div class="card mb-4">
                        <div class="card-header">Account Details</div>
                        <div class="card-body">
                            <form action="" method="post" enctype="multipart/form-data">
                                <div class="mb-3">
                                    <label class="small mb-1" for="inputUsername">Full Name</label>
                                    <input class="form-control" id="inputUsername" type="text" placeholder="Full Name" name="fullname" required>
                                </div>
                                <div class="row gx-3 mb-3">
                                    <div class="col-md-6">
                                        <label class="small mb-1" for="inputFirstName">Username</label>
                                        <input class="form-control" id="inputFirstName" type="text" placeholder="Username" name="username" required>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="small mb-1" for="inputLastName">Password</label>
                                        <input class="form-control" id="inputLastName" type="text" placeholder="Password" name="password" required>
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <label class="small mb-1" for="inputEmailAddress">Email address</label>
                                    <input class="form-control" id="inputEmailAddress" type="email" placeholder="Email address" name="email" required>
                                </div>
                                <div class="mb-3">
                                    <label class="small mb-1" for="inputAvatar">Avatar</label>
                                    <input class="form-control" id="inputAvatar" type="file" placeholder="Avatar" name="image" required>
                                </div>
                                <div class="mb-3 form-group">
                                    <label class="small mb-1" for="inputEmailAddress">Role</label>
                                    <select name="role" class="form-control" required>
                                        <option value="">Choose a role</option>
                                        <option value="0">0</option>
                                        <option value="1">1</option>
                                    </select>
                                </div>
                                <div class="mb-3 form-group">
                                    <label class="small mb-1" for="inputEmailAddress">Status</label>
                                    <select name="status" class="form-control" required>
                                        <option value="">Choose a status</option>
                                        <option value="0">0</option>
                                        <option value="1">1</option>
                                    </select>
                                </div>
                                <input class="btn btn-primary" type="submit" value="Create">
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