<?php
/**
 * Created by PhpStorm.
 * User: VuThanhLong
 * Date: 11/7/2023
 * Time: 10:39 AM
 */
$uri = get_template_directory_uri();
$menu = wp_get_nav_menu_items('Menu Main');
$idregisster = getIdPage('register');
$idlogin = getIdPage('login');
$currentLogin = getLogin();
if ($currentLogin) {
    $delivery = getDelivery($currentLogin->id);
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta name="charset" content="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="Parabati">
    <meta property="og:title" content="" />
    <meta property="og:description" content="" />
    <meta property="og:url" content="" />
    <title>Taiyo Tourist</title>
    <link rel="shortcut icon" href="#" type="image/x-icon" />
    <link rel="stylesheet" href="<?= $uri?>/dist/css/jquery-ui.css">
    <link rel="stylesheet" href="<?= $uri?>/dist/lib/bootstrap/css/bootstrap.min.css">
    <link rel='stylesheet' href='<?= $uri?>/dist/lib/fancybox/jquery.fancybox.css' type='text/css' media='all' />
    <link rel="stylesheet" href="<?= $uri?>/dist/lib/swiper/swiper-bundle.min.css">
    <link rel="stylesheet" href="<?= $uri?>/dist/lib/slick/slick.css">
    <link rel="stylesheet" href="<?= $uri?>/dist/css/normalize.min.css">
    <link rel="stylesheet" href="<?= $uri?>/dist/css/aos.css">
    <link rel="stylesheet" href="<?= $uri?>/dist/css/style.css">
</head>

<body>
<header id="header" class="header">
    <div class="header-wrapper header-v2">
        <div class="header-desktop">
            <div class="header-inner">
                <div class="header-logo">
                    <a href="#">
                        <figure><img src="<?= $uri?>/dist/images/logo-1.png" alt="logo"></figure>
                    </a>
                </div>
                <div class="main-right">
                    <div class="main-menu">
                        <div class="menu-inner">
                            <?= menu($menu);?>
                        </div>
                    </div>
                    <div class="header-right">
                        <div class="search">
                            <div class="bnt-search"><button><img src="<?= $uri?>/dist/images/search-black.svg" alt="search"></button></div>
                        </div>
                        <div class="cart">
                            <div class="bnt-cart">
                                <button><img src="<?= $uri?>/dist/images/cart-2.svg" alt="cart"></button>
                                <div class="label"><span>3</span></div>
                            </div>
                        </div>
                        <div class="user">
                            <?php if (empty($currentLogin->email)) : ?>
                                <div class="n-login">
                                    <a href="<?= get_permalink($idregisster) ?>">Đăng ký</a>
                                    <span>/</span>
                                    <a href="<?= get_permalink($idlogin) ?>">Đăng nhập</a>
                                </div>
                            <?php else : ?>
                                <div class="y-login" style="display: block;">
                                    <div class="header-user">
                                        <div class="bnt-user">
                                            <figure><img src="<?= $currentLogin->avatar ?>" alt="user"></figure>
                                            <span><?= (!empty($currentLogin->email)) ? $currentLogin->email : '' ?></span>
                                        </div>
                                        <i class="fas fa-sort-down"></i>
                                    </div>
                                    <div class="drop-user">
                                        <?php if (empty($currentLogin->email)) : ?>
                                            <ul>
                                                <li><a href="<?= get_permalink($idregisster) ?>">Đăng ký</a></li>
                                                <li><a href="<?= get_permalink($idlogin) ?>">Đăng nhập</a></li>
                                            </ul>
                                        <?php else : ?>
                                            <ul>
                                                <li><a href="<?= get_permalink(getIdPage('dashbroad')) ?>">Thông tin cá nhân</a></li>
                                                <li><a href="#">Danh sác yêu thích</a></li>
                                                <li><a href="#">Quản lý đơn hàng</a></li>
                                            </ul>
                                            <a href="#" class="logout"><img src="<?= get_template_directory_uri(); ?>/dist/images/back.svg" alt="logout">Đăng xuất</a>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
