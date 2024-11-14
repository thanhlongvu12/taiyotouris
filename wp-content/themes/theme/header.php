<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package theme
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
    <link rel="stylesheet" href="<?= get_template_directory_uri(); ?>/dist/lib/lightgallery/css/lightgallery.min.css">
    <link rel="stylesheet" href="<?= get_template_directory_uri(); ?>/dist/lib/lightgallery/css/lg-thumbnail.min.css">
</head>

<body>
<style>
    .divgif {
        position: fixed;
        width: 100%;
        height: 100%;
        z-index: 1100;
        display: none;
        background: #dedede;
        opacity: 0.5;
        top: 0;
    }

    body .follow.active {
        background: var(--cl-red) !important;
    }

    .iconloadgif {
        top: 0;
        right: 0;
        left: 0;
        bottom: 0;
        position: absolute;
        margin: auto;
        width: auto;
        height: auto;
    }

    .category-hotel-2__2 .content .main-content .col-right .hotel-item .desc .title .follow .active {
        color: #e54141;
    }

    .user .n-login{
        display: flex;
        align-items: center;
        gap: 10px;
        padding: 15px 30px;
        border-radius: 10px;
        background: var(--cl-red);
    }
    .drop-search{
        display: none;
        position: absolute;
        left: 0;
        padding-top: 10px;
    }

    .drop-search.onsearch {
        display: block;
        left: inherit;
        z-index: 1000;
    }

    .drop-search form{
        display: flex;
        align-items: center;
    }
    form input{
        border: 0;
        padding: 8px 25px;
        border-radius: 8px 0 0 8px;
        outline: 0;
        font-size: 14px;
        line-height: 20px;
        font-family: var(--f-body);
        font-weight: 400;
        color: var(--cl-black);
        height: 40px;
        width: 230px;
    }

    form button{
        border: 0;
        padding: 0;
        color: var(--cl-red);
        font-weight: 700;
        margin-left: -5px;
        width: 40px;
        height: 40px;
        background: var(--cl-white);
        border-radius: 0 8px 8px 0;
    }
</style>
<div class="divgif">
    <img class="iconloadgif" src="<?= $uri; ?>/dist/images/loading2.gif" alt="">
</div>
<header id="header" class="header">
    <div class="header-wrapper">
        <div class="header-desktop">
            <div class="header-inner">
                <div class="header-logo">
                    <a href="<?= get_permalink(getIdPage("homepage"))?>">
                        <figure><img src="<?= $uri?>/dist/images/logo.png" alt="logo"></figure>
                    </a>
                </div>
                <div class="main-right">
                    <div class="main-menu">
                        <?= menu($menu);?>
                    </div>
                    <div class="header-right">
                        <div class="search">
                            <div class="bnt-search">
                                <button>
                                    <img src="<?= $uri?>/dist/images/search.svg" alt="search">
                                </button>
                            </div>
                            <div class="drop-search">
                                <div class="search-inner">
                                    <form method="" action="/">
                                        <input type="search" id="input_search" name="s" placeholder="Tìm kiếm" required="required">
                                        <button><i class="fal fa-search"></i></button>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="cart">
                            <?php
                                if ($currentLogin) {
                                    $count = $wpdb->get_var("SELECT count(*) FROM `cart` where id_user = {$currentLogin->id} and status_cart < 2 ");
                                }else{
                                    $count = 0;
                                }
                            ?>
                            <a href="<?= get_permalink(getIdPage("cart"))?>">
                            <div class="bnt-cart">
                                <button><img src="<?= $uri?>/dist/images/cart.svg" alt="cart"></button>
                                <div class="label" style="<?= ($count == 0) ? 'display:none' : '' ?>"><span><?= $count ?></span></div>
                            </div>
                            </a>
                        </div>
                        <div class="user">
                            <?php if (empty($currentLogin->email)) : ?>
                                <div class="n-login">
                                    <a href="<?= get_permalink($idregisster) ?>" style="color: white">Đăng ký</a>
                                    <span>/</span>
                                    <a href="<?= get_permalink($idlogin) ?>" style="color: white">Đăng nhập</a>
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
<script>
    // Get the button and the drop-search div
    const searchButton = document.querySelector('.bnt-search');
    const dropSearch = document.querySelector('.drop-search');

    // Add a click event listener to the button
    searchButton.addEventListener('click', function() {
        // Toggle the 'active' class on the drop-search div
        dropSearch.classList.toggle('onsearch');
    });
</script>
