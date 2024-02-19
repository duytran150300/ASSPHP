<!DOCTYPE html>
<html lang="zxx">

<!-- Mirrored from htmldemo.hasthemes.com/hono/hono/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 06 Jan 2021 00:31:04 GMT -->
<!-- Added by HTTrack -->
<meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <title>HONO - Multi Purpose HTML Template</title>

    <!-- ::::::::::::::Favicon icon::::::::::::::-->
    <link rel="shortcut icon" href="assets/images/favicon.ico" type="image/png">

    <link rel="stylesheet" href="assets/css/vendor/vendor.min.css">
    <link rel="stylesheet" href="assets/css/plugins/plugins.min.css">
    <link rel="stylesheet" href="assets/css/style.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
</head>

<body>
    <!-- Start Header Area -->
    <header class="header-section d-none d-xl-block">
        <div class="header-wrapper">
            <div class="header-bottom header-bottom-color--golden section-fluid sticky-header sticky-color--golden">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12 d-flex align-items-center justify-content-between">
                            <!-- Start Header Logo -->
                            <div class="header-logo">
                                <div class="logo">
                                    <a href="/home"><img src="https://static.wixstatic.com/media/5992cf_f1109ccf527e4d8e9157749baeb5854f~mv2.png" alt=""></a>
                                </div>
                            </div>
                            <!-- End Header Logo -->

                            <!-- Start Header Main Menu -->
                            <div class="main-menu menu-color--black menu-hover-color--golden">
                                <nav>
                                    <ul>
                                        <li class="has-dropdown">
                                            <a class="active main-menu-link" href="index.html">Home </a>
                                        </li>
                                        <li class="has-dropdown has-megaitem">
                                            <a href="product-details-default.html">Shop <i class="fa fa-angle-down"></i></a>
                                            <!-- Mega Menu -->
                                            <div class="mega-menu">
                                                <ul class="mega-menu-inner">
                                                    <!-- Mega Menu Sub Link -->
                                                    <?php foreach ($categories as $key => $item) : ?>
                                                        <li class="mega-menu-item">
                                                            <a href="<?= ROOT_PATH ?>productsByCategory?id=<?= $item->id ?>" class="mega-menu-item-title"><?= $item->category_name ?></a>
                                                        </li>
                                                    <?php endforeach; ?>
                                                </ul>
                                                <div class="menu-banner">
                                                    <a href="#" class="menu-banner-link">
                                                        <img class="menu-banner-img" src="assets/images/banner/banner-style-3-img-1.jpg" alt="" style="height:200px">
                                                    </a>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="has-dropdown">
                                            <a href="<?= ROOT_PATH ?>blog">Blog </a>
                                            <!-- Sub Menu -->

                                        </li>
                                        <li class="has-dropdown">
                                            <a href="#">Pages </a>

                                        </li>
                                        <li>
                                            <a href="about-us.html">About Us</a>
                                        </li>
                                        <li>
                                            <a href="contact-us.html">Contact Us</a>
                                        </li>
                                    </ul>
                                </nav>
                            </div>
                            <!-- End Header Main Menu Start -->

                            <!-- Start Header Action Link -->
                            <ul class="header-action-link action-color--black action-hover-color--golden">
                                <li>
                                    <a href="#offcanvas-wishlish" class="offcanvas-toggle">
                                        <i class="icon-heart"></i>
                                        <span class="item-count">3</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#offcanvas-add-cart" class="offcanvas-toggle">
                                        <i class="icon-bag"></i>
                                        <span class="item-count">3</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#search">
                                        <i class="icon-magnifier"></i>
                                    </a>
                                </li>
                                <li>
                                    <?php if ($_SESSION) : ?>
                                        <div class="dropdown">
                                            <button class="btn  dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                                <img src="<?= ROOT_PATH ?>images/users/<?= $_SESSION['account']->avatar ?>" alt="" width="30" height="40" style="border-radius:50% ;">
                                            </button>
                                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                                <li><a class="dropdown-item" style="letter-spacing: 0px" href="<?= ROOT_PATH ?>account">My Account</a></li>
                                                <li><a class="dropdown-item" style="letter-spacing: 0px" href="<?= ROOT_PATH ?>login">Logout</a></li>
                                                <?php if ($_SESSION['account']->role === 1) : ?>
                                                    <li><a class="dropdown-item" style="letter-spacing: 0px" href="<?= ROOT_PATH ?>admin">Amdin</a></li>
                                                <?php endif ?>
                                            </ul>
                                        </div>l
                                    <?php else : ?>
                                        <div class="dropdown">
                                            <button class="btn  dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                                <i class="fa-solid fa-user fa-flip-horizontal fa-xl"></i>
                                            </button>
                                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                                <li><a class="dropdown-item" style="letter-spacing: 0px" href="<?= ROOT_PATH ?>login">Login</a></li>
                                                <li><a class="dropdown-item" style="letter-spacing: 0px" href="<?= ROOT_PATH ?>register">Register</a></li>

                                            </ul>
                                        </div>
                                    <?php endif ?>
                                </li>
                            </ul>
                            <!-- End Header Action Link -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>