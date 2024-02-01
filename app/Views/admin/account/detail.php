<?php
require_once './app/Views/admin/navbar.php';
?>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Details Account</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="index.php?act=">Home</a></li>
                        <li class="breadcrumb-item active">Details Account</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <div class="container-xl px-4 mt-4">
        <hr class="mt-0 mb-4">
        <form action="" method="post" enctype="multipart/form-data">
            <?php
            if (!empty($account)) {
            ?>
                <div class="row my-2">
                    <div class="col-6 my-2">
                        <a class="btn btn-outline-primary" href="javascript:void(0);" onclick="goBack()">Back</a>
                    </div>
                    <div class="col-6 my-2 d-flex justify-content-end">
                        <a class="btn btn-outline-primary" href="<?= ROOT_PATH ?>account/edit?id=<?= $account->id_user ?>">Edit
                            Profile</a>

                    </div>
                </div>

                <div class="row">
                    <div class="col-xl-4">
                        <div class="card mb-4 mb-xl-0">
                            <div class="card-header">Profile Picture</div>
                            <div class="card-body text-center">
                                <div class="card-body text-center">
                                    <div class="d-flex justify-content-center">
                                        <div class="img-account-wrapper">
                                            <img id="profile-image" class="img-account-profile rounded-circle" src="<?= ROOT_PATH ?>images/users/<?= $account->avatar ?>" alt="">
                                        </div>
                                    </div>
                                    <input type="hidden" name="anh_cu" value="<?= $account->avatar ?>">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-8">
                        <div class="card">
                            <div class="card">
                                <div class="card-header">Account Details</div>
                                <div class="card-body">
                                    <div class="row gx-3 mb-3">
                                        <div class="col-md-6">
                                            <label class="small mb-1" for="inputFirstName">User ID</label>
                                            <input class="form-control" id="inputFirstName" type="text" placeholder="" name="id" value="<?= $account->id_user ?>" readonly>
                                        </div>
                                        <div class="col-md-6">
                                            <label class="small mb-1" for="inputLastName">Username</label>
                                            <input class="form-control" id="inputLastName" type="text" placeholder="" name="ten_dang_nhap" value="<?= $account->username ?>" readonly>
                                        </div>
                                    </div>

                                    <div class="row gx-3 mb-3">
                                        <div class="col-md-6">
                                            <label class="small mb-1" for="inputFirstName">Full Name</label>
                                            <input class="form-control" id="inputFirstName" type="text" placeholder="" name="ho_ten" value="<?= $account->fullname ?>" readonly>
                                        </div>
                                        <div class="col-md-6">
                                            <label class="small mb-1" for="inputLastName">Phone</label>
                                            <input class="form-control" id="inputLastName" type="text" placeholder="" name="so_dien_thoai" value="<?= $account->phone ?>" readonly>
                                        </div>
                                    </div>
                                    <div class="row gx-3 mb-3">
                                        <div class="col-md-6">
                                            <label class="small mb-1" for="inputFirstName">Email</label>
                                            <input class="form-control" id="inputFirstName" type="text" placeholder="" name="email" value="<?= $account->email ?>" readonly>
                                        </div>
                                        <div class="col-md-6">
                                            <label class="small mb-1" for="inputLastName">Address</label>
                                            <input class="form-control" id="inputLastName" type="text" placeholder="" name="dia_chi" value="<?= $account->address ?>" readonly>
                                        </div>
                                    </div>

                                    <div class="row gx-3 mb-3">
                                        <div class="col-md-6">
                                            <label class="small mb-1" for="inputFirstName">Status</label>
                                            <input class="form-control" id="inputFirstName" type="text" placeholder="" name="trang_thai" value="<?= ($account->status == 1) ? 'Activated' : 'Not activated' ?>" readonly>
                                        </div>
                                        <div class="col-md-6">
                                            <label class="small mb-1" for="inputLastName">Birthday</label>
                                            <input class="form-control" id="inputLastName" type="text" placeholder="" name="dia_chi" value="<?= $account->birthday ?>" readonly>
                                        </div>
                                    </div>
                                    <div class="row gx-3 mb-3">
                                        <div class="col-md-6">
                                            <label class="small mb-1" for="inputFirstName">Role</label>
                                            <input class="form-control" id="inputFirstName" type="text" placeholder="" name="trang_thai" value="<?= ($account->status == 1) ? 'Admin' : 'Customer' ?>" readonly>
                                        </div>
                                        <div class="col-md-6">
                                            <label class="small mb-1" for="inputLastName">PassWord</label>
                                            <input class="form-control" id="inputLastName" type="text" placeholder="" name="dia_chi" value="<?= $account->birthday ?>" readonly>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php
            }
            ?>
        </form>
    </div>
    <!-- /.content -->
</div>

<style>
    .img-account-wrapper {
        width: 300px;
        height: 300px;
        overflow: hidden;
        margin: 0 auto;
        border-radius: 50%;
    }

    .img-account-profile {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }
</style>

<script>
    function goBack() {
        window.history.back();
    }
</script>