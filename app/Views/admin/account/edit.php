<?php
require_once './app/Views/admin/navbar.php';

?>
<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row my-1">
                <div class="col-sm-6">
                    <h1 class="text-success">Edit account</h1c>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="index.php?act=">Home</a></li>
                        <li class="breadcrumb-item active ">Edit account</li>
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
                <form action="<?= ROOT_PATH ?>account/edit?id=<?= $user->id_user ?>" method="post" enctype="multipart/form-data">
                    <div class="card mb-4">
                        <div class="card-header">Account Details</div>
                        <div class="card-body">
                            <form action="" method="post" enctype="multipart/form-data">
                                <div class="mb-3">
                                    <label class="small mb-1" for="inputFullName">Full Name</label>
                                    <input class="form-control" id="inputFullName" type="text" placeholder="Full Name" name="fullname" value="<?php if ($user) {
                                                                                                                                                    echo $user->fullname;
                                                                                                                                                } ?>">
                                </div>
                                <div class="mb-3">
                                    <label class="small mb-1" for="inputBirthday">Birthday</label>
                                    <input class="form-control" id="inputBirthday" type="text" placeholder="Birthday" name="birthday" value="<?php if ($user) {
                                                                                                                                                    echo $user->birthday;
                                                                                                                                                } ?>">
                                </div>

                                <div class="mb-3">
                                    <label class="small mb-1" for="inputAddress">Address</label>
                                    <input class="form-control" id="inputAddress" type="text" placeholder="Address" name="address" value="<?php if ($user) {
                                                                                                                                                echo $user->address;
                                                                                                                                            } ?>">
                                </div>
                                <div class="mb-3">
                                    <label class="small mb-1" for="inputEmail">Email</label>
                                    <input class="form-control" id="inputEmail" type="email" placeholder="Email address" name="email" value="<?php if ($user) {
                                                                                                                                                    echo $user->email;
                                                                                                                                                } ?>">
                                </div>
                                <div class="mb-3">
                                    <label class="small mb-1" for="inputAvatar">Avatar</label>
                                    <input class="form-control" id="inputAvatar" type="file" placeholder="Avatar" name="image">
                                </div>
                                <div class="old-image">
                                    <p class="mt-3">Old Image:</p>
                                    <?php if ($user && $user->avatar) : ?>
                                        <img src="<?= ROOT_PATH ?>images/users/<?= $user->avatar ?>" height="200" alt="Old image" width="200" class="">
                                    <?php endif; ?>
                                </div>
                                <div class="mb-3 form-group">
                                    <label class="small mb-1" for="inputEmailAddress">Role</label>
                                    <select name="role" class="form-control" required>
                                        <option value="">Choose a role</option>
                                        <option value="0" <?php if ($user->role === 0) echo 'selected' ?>>0</option>
                                        <option value="1" <?php if ($user->role === 1) echo 'selected' ?>>1</option>
                                    </select>
                                </div>

                                <div class="mb-3 form-group">
                                    <label class="small mb-1" for="inputEmailAddress">Status</label>
                                    <select name="status" class="form-control" required>
                                        <option value="">Choose a status</option>
                                        <option value="0" <?php if ($user->status === 0) echo 'selected' ?>>0</option>
                                        <option value="1" <?php if ($user->status === 1) echo 'selected' ?>>1</option>
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