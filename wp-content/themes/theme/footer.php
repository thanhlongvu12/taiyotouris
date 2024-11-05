<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package theme
 */
$uri = get_template_directory_uri();
?>
<footer id="footer" class="footer">
    <div class="footer-wrapper">
        <div class="container">
            <div class="footer-top">
                <div class="footer-inner">
                    <div class="row" style="align-items: center;">
                        <div class="col-md-5 col-left">
                            <div class="flogo">
                                <a href="#">
                                    <figure><img src="<?= $uri?>/dist/images/f-logo.png" alt="logo"></figure>
                                </a>
                            </div>
                        </div>
                        <div class="col-md-7 col-right">
                            <div class="social">
                                <div class="f-contact">
                                    <ul>
                                        <li>
                                            <a href="tel:3104372766">
                                                <div class="icon"><i class="fas fa-phone-alt"></i></div>
                                                <div class="info">
                                                    <span>Tel</span>
                                                    <strong>310-437-2766</strong>
                                                </div>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="mailto:info@taiyotourist.vn">
                                                <div class="icon"><i class="fas fa-envelope"></i></div>
                                                <div class="info">
                                                    <span>Mail</span>
                                                    <strong>info@taiyotourist.vn</strong>
                                                </div>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="list-social">
                                    <ul>
                                        <li><a href="#"><img src="<?= $uri?>/dist/images/fb.svg" alt="fb"></a></li>
                                        <li><a href="#"><img src="<?= $uri?>/dist/images/tt.svg" alt="fb"></a></li>
                                        <li><a href="#"><img src="<?= $uri?>/dist/images/ytb.svg" alt="fb"></a></li>
                                        <li><a href="#"><img src="<?= $uri?>/dist/images/insta.svg" alt="fb"></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="footer-midlle">
                <div class="footer-inner">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="text">
                                <div class="short">
                                    <p>Công ty Cổ phần Du lịch Taiyo (TaiyoTourist) là đơn vị chuyên tổ chức các tour du lịch trọn gói cũng như cung cấp đầy đủ các dịch vụ riêng lẻ đáp ứng mọi nhu cầu của khách hàng như: vé máy bay, phòng khách sạn, tổ chức hội nghị, hội thảo, sự kiện, xe đưa đón, dịch vụ Visa, ...</p>
                                    <a href="#">Read More</a>
                                </div>
                                <div class="label">
                                    <div class="i-babel">
                                        <figure><img src="<?= $uri?>/dist/images/label.png" alt="label"></figure>
                                    </div>
                                    <div class="i-babel">
                                        <figure><img src="<?= $uri?>/dist/images/label-1.png" alt="label"></figure>
                                    </div>
                                </div>
                                <p>© 2000-2021, All Rights Reserved</p>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="f-link">
                                <h2>Chính sách & quy định</h2>
                                <ul>
                                    <li><a href="#">Điều khoản và điều kiện</a></li>
                                    <li><a href="#">Quy định về thanh toán</a></li>
                                    <li><a href="#">Quy định về xác nhận thông tin đặt phòng</a></li>
                                    <li><a href="#">Chính sách về hủy đặt phòng và hoàn trả tiền</a></li>
                                    <li><a href="#">Chính sách bảo mật thông tin</a></li>
                                    <li><a href="#">Điều lệ bay quốc nội</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="f-link">
                                <h2>Khách hàng & đối tác</h2>
                                <ul>
                                    <li><a href="#">Giới thiệu</a></li>
                                    <li><a href="#">Liên hệ</a></li>
                                    <li><a href="#">Câu hỏi thường gặp</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="footer-bottom">
                <div class="footer-inner">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="f-item">
                                <a href="#">
                                    <div class="icon">
                                        <figure><img src="<?= $uri?>/dist/images/fb.svg" alt="fb"></figure>
                                    </div>
                                    <div class="info">
                                        <span>Trụ sở chính</span>
                                        <strong>Tòa nhà Taiyo, 97 Bạch Đằng, Hồng Bàng, Hải Phòng.</strong>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="f-item">
                                <a href="#">
                                    <div class="icon">
                                        <figure><img src="<?= $uri?>/dist/images/fb.svg" alt="fb"></figure>
                                    </div>
                                    <div class="info">
                                        <span>Chi nhánh Hà Nội</span>
                                        <strong>Tòa C2, Vinhomes D'Capitale, 119 Trần Duy Hưng, Cầu Giấy, Hà Nội.</strong>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="f-item">
                                <a href="#">
                                    <div class="icon">
                                        <figure><img src="<?= $uri?>/dist/images/fb.svg" alt="fb"></figure>
                                    </div>
                                    <div class="info">
                                        <span>Phòng vé  Taiyoticket</span>
                                        <strong>Tầng 1, Tòa nhà Taiyo, 97 Bạch Đằng, Hồng Bàng, Hải Phòng.</strong>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
<script src="<?= $uri?>/dist/lib/jquery/jquery.min.js"></script>
<script src="<?= $uri?>/dist/lib/jquery/jquery-ui.js"></script>
<script src="<?= $uri?>/dist/lib/swiper/swiper-bundle.min.js"></script>
<script type="text/javascript" src='<?= $uri?>/dist/lib/fancybox/jquery.fancybox.js'></script>
<script src="<?= get_template_directory_uri();  ?>/dist/lib/lightgallery/js/lightgallery.min.js"></script>
<script src="<?= get_template_directory_uri();  ?>/dist/lib/lightgallery/js/lg-thumbnail.min.js"></script>
<!-- <script src="<?= get_template_directory_uri();  ?>/dist/lib/lightgallery/css/lightgallery.min.css"></script> -->
<script src="<?= $uri?>/dist/lib/bootstrap/js/bootstrap.min.js"></script>
<script src="<?= $uri?>/dist/lib/slick/slick.min.js"></script>
<script src="<?= $uri?>/dist/js/aos.js"></script>
<script src="<?= $uri?>/dist/js/custom.js"></script>
<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.min.js"></script>
<script src="<?= get_template_directory_uri(); ?>/dist/js/sweetalert2.js"></script>
<script>
    $(document).ready(function () {
        var cms_adapter_ajax = function cms_adapter_ajax($param) {
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

        $('body').on('click','.follow', function() {
            var ajaxurl = "<?= admin_url('admin-ajax.php') ?>";
            event.stopPropagation(); // Ngăn chặn sự kiện tiếp tục lan truyền
            event.preventDefault(); // Ngăn chặn hành vi mặc định của thẻ <a>
            var id = $(this).data('id');
            var $data = {
                'productId': id,
                'action': 'userFavorite',
            };

            var $param = {
                'type': 'POST',
                'url': ajaxurl,
                'data': $data,
                'callback': function(data) {
                    var res = JSON.parse(data);
                    // console.log(res.type);
                    if(res.status >= 1){
                        Swal.fire({
                            icon: 'warning',
                            text: res.mess,
                            showConfirmButton: false,
                            timer: 3000,
                            footer: 'Bạn có thể đăng nhập <a style="margin: 0 5px;" href="<?= home_url('login') ?>"> tại đây</a>'
                        })
                    }else if(res.status === 0) {
                        if (res.type < 1) {
                            $('.follow_check_' + id).removeClass("active");
                        } else {
                            $('.follow_check_' + id).addClass("active");
                        }
                    }
                }
            };
            cms_adapter_ajax($param);
        })

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
</body>

</html>
