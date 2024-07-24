<?php
$dash= getIdPage('dashbroad');
//$replace_pasword= getIdPage('replace_pasword');
//$favorites_list= getIdPage('favorites_list');
$login= getIdPage('login');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta name="charset" content="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="Taiyo Tourist">
    <meta property="og:title" content="" />
    <meta property="og:description" content="" />
    <meta property="og:url" content="" />
    <title>Taiyo Tourist</title>
    <link rel="shortcut icon" href="#" type="image/x-icon" />
    <link rel="stylesheet" href="<?= get_template_directory_uri();  ?>/dist/lib/bootstrap/css/bootstrap.min.css">
    <link rel='stylesheet' href='<?= get_template_directory_uri();  ?>/dist/lib/fancybox/jquery.fancybox.css' type='text/css' media='all' />
    <link rel="stylesheet" href="<?= get_template_directory_uri();  ?>/dist/lib/swiper/swiper-bundle.min.css">
    <link rel="stylesheet" href="<?= get_template_directory_uri();  ?>/dist/lib/slick/slick.css">
    <link rel="stylesheet" href="<?= get_template_directory_uri();  ?>/dist/css/normalize.min.css">
    <link rel="stylesheet" href="<?= get_template_directory_uri();  ?>/dist/css/aos.css">
    <link rel="stylesheet" href="<?= get_template_directory_uri();  ?>/dist/css/style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

</head>
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
</style>
<body>
<div class="divgif">
    <img class="iconloadgif" src="<?= get_template_directory_uri() ?>/dist/images/loading2.gif" alt="">
</div>
<div class="dashboard-nav">
    <div class="dash-inner">
        <button class="close-nav"><i class="far fa-bars"></i></button>
        <div class="d-logo"><a href="<?= home_url() ?>">
                <figure><img src="<?= get_template_directory_uri(); ?>/dist/images/dash-logo.png" alt="logo"></figure>
            </a></div>
        <div class="d-content">
            <div class="d-item">
                <h2>Cá nhân</h2>
                <div class="list-item">
                    <ul>
                        <li><a href="<?= get_permalink(getIdPage('dashbroad')); ?>"><img src="<?= get_template_directory_uri(); ?>/dist/images/cn.svg" alt="user">Thông tin cá nhân</a></li>
                        <li><a href=""><img src="<?= get_template_directory_uri(); ?>/dist/images/pass.svg" alt="user">Đổi mật khẩu</a></li>
                    </ul>
                </div>
            </div>
            <div class="d-item">
                <h2>Đơn hàng</h2>
                <div class="list-item">
                    <ul>
                        <li><a href="<?= get_permalink(getIdPage('order-history'))?>"><img src="<?= get_template_directory_uri(); ?>/dist/images/history.svg"
                                                                                           alt="user">Lịch sử</a></li>
                    </ul>
                </div>
            </div>
            <div class="d-item">
                <h2>Yêu thích</h2>
                <div class="list-item">
                    <ul>
                        <li><a href=""><img src="<?= get_template_directory_uri(); ?>/dist/images/tour.svg" alt="user">Tour</a>
                        </li>
                        <li><a href=""><img src="<?= get_template_directory_uri(); ?>/dist/images/hotel.svg"
                                                                                         alt="user">Khách sạn</a></li>
                        <li><a href=""><img src="<?= get_template_directory_uri(); ?>/dist/images/combo.svg"
                                                                                         alt="user">Combo</a></li>
                    </ul>
                </div>
            </div>
            <div class="d-item logout">
                <h2>Đăng xuất</h2>
                <div class="list-item">
                    <ul>
                        <li class="logout"><a href="javascript:;"><img src="<?= get_template_directory_uri(); ?>/dist/images/logout.svg"
                                                                       alt="user">Đăng xuất</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function () {
        var cms_adapter_ajax_2 = function cms_adapter_ajax_2($param) {
            var beforeSend = $param.beforeSend || function () {
            };
            var complete = $param.complete || function () {
            }; //
            $.ajax({
                url: $param.url,
                type: $param.type,
                data: $param.data,
                beforeSend: beforeSend,
                async: true,
                success: $param.callback,
                complete: complete
            });
        };
        $("#loading-overlay").hide();

        // Hàm để hiển thị overlay
        function showLoadingOverlay() {
            $(".divgif").show();
        }

        // Hàm để tắt overlay
        function hideLoadingOverlay() {
            $(".divgif").hide();
        }

        $('.logout').on('click',function () {
            var $data = {
                'action': 'logout',
            };
            var ajaxurl = "<?= admin_url('admin-ajax.php') ?>";
            var $param = {
                'type': 'POST',
                'url': ajaxurl,
                'data': $data,
                'beforeSend': function () {
                    showLoadingOverlay();
                },
                'complete': function () {
                    hideLoadingOverlay();
                },
                'callback': function (data) {

                    window.location.href = '<?= home_url() ?>';
                }
            };
            cms_adapter_ajax_2($param);
        })
    });
</script>


