<?php
/* Template Name:  Thông tin đơn hàng */
global $wpdb;
$idOrder = xss(no_sql_injection($_GET['token']));
$currentLogin = getLogin();
$delivery = getDelivery($currentLogin->id);
$order = $wpdb->get_row("select * from tt_orders where id = '" . $idOrder . "'");
//pr($order);
$code_tour = get_field('code', $order->id_post);

$date = get_field('date', $order->id_post);
$time_tour = get_field('time_tour', $order->id_post);
$location_form = get_field('location_form', $order->id_post);
$location_to = get_field('location_to', $order->id_post);
$return_day = get_field('return_day', $order->id_post);
$price = get_field('price', $order->id_post);
$price_childen = get_field('price_childen', $order->id_post);
$vehicle = get_field('vehicle', $order->id_post);
$title = '';
if ($order->type_order == 'tour') {
    $title = 'Tourist';
}
if ($order->type_order == 'hotel') {
    $title = 'Khách sạn';
}
if ($order->type_order == 'combo') {
    $title = 'Combo';
}
$date_to = get_field('date', $order->id_post);
//$location_to = get_field('location_form', $order->id_post);
?>
<style>
    @media only screen and (min-width: 1200px) {
        .main-dashboard .dash-content .dash-main .bookroom-1 .more-book .col-left .section-item .right-text .room-info .text-right p {
            overflow: hidden;
            white-space: nowrap;
            text-overflow: ellipsis;
            width: 205px;
        }
    }

</style>
<style>
    #loading-overlay {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, 0.5);
        display: flex;
        justify-content: center;
        align-items: center;
        z-index: 9999;
    }

    .spinner {
        border: 4px solid #f3f3f3;
        border-top: 4px solid #3498db;
        border-radius: 50%;
        width: 40px;
        height: 40px;
        animation: spin 1s linear infinite;
    }

    @keyframes spin {
        0% {
            transform: rotate(0deg);
        }
        100% {
            transform: rotate(360deg);
        }
    }
</style>
<div id="loading-overlay">
    <div class="spinner"></div>
</div>
<main id="dashboard-1" class="dashboard">
    <input type="hidden" value="<?= $order->status ?>" id="status-order">
    <section class="main-dashboard">
        <?php get_header('dash'); ?>
        <div class="dash-content">
            <div class="dash-header">
                <div class="dash-inner">
                    <div class="header-left">
                        <a href="<?= home_url() ?>">Trang chủ</a>
                        <span>/</span>
                        <a href="<?= get_permalink(getIdPage('dashbroad')) ?>">Cá nhân</a>
                        <span>/</span>
                        <a href="<?= get_permalink(getIdPage('order-history')) ?>">Lịch sử đơn hàng</a>
                        <span>/</span>
                        <a href="<?= get_permalink($order->id_post) ?>"
                           class="current"><?= get_the_title($order->id_post) ?></a>
                    </div>
                    <div class="header-right">
                        <div class="bar-advand">
                            <div class="notification">
                                <button>
                                    <img src="<?= get_template_directory_uri(); ?>/dist/images/noti.svg" alt="cart">
                                    <span class=label>3</span>
                                </button>
                            </div>
                        </div>
                        <div class="user-right">
                            <div class="d-user">
                                <div class="img">
                                    <figure><img src="<?= $currentLogin->avatar ?>" alt="user"></figure>
                                </div>
                                <div class="info">
                                    <h2><?= (!empty($currentLogin->email)) ? $currentLogin->email : '' ?></h2>
                                    <i class="fas fa-caret-down"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="dash-main">
                <div class="bookroom-1">
                    <div class="process-book">
                        <div class="url-book"><a href="<?= get_permalink(getIdPage('order-history')) ?>"><i
                                    class="fal fa-arrow-left"></i></a>
                            <div class="sku-book"><strong>Mã đơn hàng:</strong><span><?= $order->order_code ?></span>
                            </div>
                        </div>
                        <div class="list-process">
                            <div class="pc-item <?= ($order->status <= 4) ? 'in-pro' : 'in-pro' ?>">
                                <div class="item">
                                    <div class="pc-img">
                                        <figure><img src="<?= get_template_directory_uri(); ?>/dist/images/pc-1.svg"
                                                     alt="process"></figure>
                                    </div>
                                    <div class="pc-text">
                                        <strong>Đơn hàng đã đặt</strong>
                                        <time><span><?= date('H:i d/m/Y', $order->time_order) ?></span></time>
                                    </div>
                                </div>
                            </div>
                            <div class="pc-item <?= ($order->status <= 4) ? 'in-pro' : '' ?>">
                                <div class="item">
                                    <div class="pc-img">
                                        <figure><img src="<?= get_template_directory_uri(); ?>/dist/images/pc-2.svg"
                                                     alt="process"></figure>
                                    </div>
                                    <?php if($order->status != 5): ?>
                                        <div class="pc-text">
                                            <strong>Chờ thanh toán</strong>
                                            <time><span><?= number_format($order->price_payment, 0, ",", ".") ?> VNĐ</span>
                                            </time>
                                        </div>
                                    <?php else: ?>
                                        <div class="pc-text">
                                            <strong>Hủy đơn hàng</strong>

                                        </div>
                                    <?php endif;?>
                                </div>
                            </div>
                            <style>
                                <?php if(($order->status >= 3 && $order->status <= 4)): ?>
                                .main-dashboard .dash-content .dash-main .bookroom-1 .process-book .list-process .pc-item:nth-child(2):before {
                                    background: var(--cl-red);
                                }
                                <?php  endif; ?>
                                <?php if(( $order->status == 4)): ?>
                                .main-dashboard .dash-content .dash-main .bookroom-1 .process-book .list-process .pc-item:before{
                                    background: var(--cl-red);
                                }

                                <?php  endif; ?>
                            </style>
                            <div class="pc-item <?= ($order->status >= 3 && $order->status <= 4) ? 'in-pro' : '' ?>"
                                 id="success-order">
                                <div class="item">
                                    <div class="pc-img">
                                        <figure><img
                                                src="<?= get_template_directory_uri(); ?>/dist/images/<?= ($order->status >= 3 && $order->status <= 4) ? 'emptywallettick.jpg' : 'pc-3.svg' ?>"
                                                alt="process"></figure>
                                    </div>
                                    <div class="pc-text">
                                        <strong>Thanh toán thành công</strong>
                                    </div>
                                </div>
                            </div>

                            <div class="pc-item <?= ($order->status == 4) ? 'in-pro' : '' ?>" id="review-comment">
                                <div class="item">
                                    <div class="pc-img">
                                        <figure><img
                                                src="<?= get_template_directory_uri(); ?>/dist/images/<?= ($order->status >= 3 && $order->status <= 4) ? 'clipboardtick.jpg' : 'pc-4.svg' ?>"
                                                alt=""></figure>
                                    </div>
                                    <div class="pc-text">
                                        <strong>Đánh giá</strong>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="more-book">
                        <div class="row">
                            <div class="col-xl-8 col-left">
                                <?php if (!empty($order->data) || $order->data != NULL) {
                                    foreach (json_decode($order->data) as $value):
                                        $checkInDate = new DateTime('@' . $value->start_date);
                                        $checkOutDate = new DateTime('@' . $value->end_date);

                                        // Tính số đêm giữa hai thời điểm
                                        $interval = $checkInDate->diff($checkOutDate);
                                        $numberOfNights = $interval->format('%a');

                                        // Lấy giá trị tuyệt đối của số đêm
                                        $numberOfNights = abs($numberOfNights);
                                        ?>
                                        <div class="section-item">
                                            <div class="left-img">
                                                <figure><img src="<?= get_the_post_thumbnail($value->id_post); ?>"
                                                             alt="blog"></figure>
                                            </div>
                                            <div class="right-text">
                                                <div class="hotel-title">
                                                    <h1><?= $title ?>: <?= get_the_title($value->id_post) ?></h1>
                                                </div>
                                                <div class="map"><i class="fas fa-map-marker-alt"></i>
                                                    <p><?= get_field('location', $value->id_post); ?></p>
                                                </div>
                                                <div class="room-info">
                                                    <?php
                                                    if ($order->type_order == 'tour') {
                                                        ?>
                                                        <div class="text-left">
                                                            <ul>
                                                                <li>
                                                                    <div class="left">
                                                                        <div class="item"><strong>Mã
                                                                                tour</strong><span><?= $order->order_code ?></span>
                                                                        </div>
                                                                    </div>
                                                                </li>
                                                                <li>
                                                                    <div class="left">
                                                                        <div class="item"><strong>Địa điểm khởi
                                                                                hành</strong><span><?= get_field('location_form', $value->id_post) ?></span>
                                                                        </div>
                                                                    </div>
                                                                </li>
                                                                <li>
                                                                    <div class="left">
                                                                        <div class="item"><strong>Ngày khởi
                                                                                hành</strong><span><?= date('d-m-Y', $value->start_date) ?></span>
                                                                        </div>
                                                                    </div>
                                                                </li>
                                                                <li>
                                                                    <div class="left">
                                                                        <div class="item"><strong>Từ
                                                                                ngày</strong><span><?= date('d-m-Y', $value->end_date) ?></span>
                                                                        </div>
                                                                    </div>
                                                                </li>
                                                                <li>
                                                                    <div class="left">
                                                                        <div class="item"><strong>Số
                                                                                khách</strong><span><?= $value->qty_adult ?> người lớn, <?= $value->qty_child ?> trẻ em</span>
                                                                        </div>
                                                                    </div>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                        <div class="text-right">
                                                            <ul>
                                                                <li>
                                                                    <strong><?= money_check($value->pirce_adult) ?>
                                                                        đ</strong><span>/người lớn</span></li>
                                                                <li>
                                                                    <strong><?= money_check($value->pirce_child) ?>
                                                                        đ</strong><span>/trẻ em</span></li>
                                                            </ul>
                                                            <p><?= (!empty(get_the_excerpt($value->id_post))) ? '*' : '' ?> <?= get_the_excerpt($value->id_post) ?></p>
                                                        </div>
                                                        <?php
                                                    }
                                                    if ($order->type_order == 'hotel') {
                                                        ?>
                                                        <div class="text-left">
                                                            <ul>
                                                                <li>
                                                                    <div class="left">
                                                                        <div class="item"><strong>Mã
                                                                                tour</strong><span><?= $order->order_code ?></span>
                                                                        </div>
                                                                    </div>
                                                                </li>
                                                                <li>
                                                                    <div class="left">
                                                                        <div class="item"><strong>Địa điểm khách sạn:</strong><span><?= get_field('location', $value->id_post) ?></span>
                                                                        </div>
                                                                    </div>
                                                                </li>
                                                                <li>
                                                                    <div class="left">
                                                                        <div class="item"><strong>Ngày nhận phòng</strong><span><?= date('d-m-Y', $value->start_date) ?></span>
                                                                        </div>
                                                                    </div>
                                                                </li>
                                                                <li>
                                                                    <div class="left">
                                                                        <div class="item"><strong>Ngày trả phòng</strong><span><?= date('d-m-Y', $value->end_date) ?></span>
                                                                        </div>
                                                                    </div>
                                                                </li>
                                                                <li>
                                                                    <div class="left">
                                                                        <div class="item"><strong>Loại phòng</strong><span><?= get_the_title($value->id_room) ?></span>
                                                                        </div>
                                                                    </div>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                        <div class="text-right">
                                                            <ul>
                                                                <li style="    gap: 5px">
                                                                    <strong><?= money_check($value->pirce_adult) ?>
                                                                        đ </strong> <span> x <?= $numberOfNights ?> đêm</span></li>
                                                            </ul>
                                                            <p><?= (!empty(get_the_excerpt($value->id_post))) ? '*' : '' ?> <?= get_the_excerpt($value->id_post) ?></p>
                                                        </div>
                                                        <?php
                                                    }
                                                    if ($order->type_order == 'combo') {
                                                        ?>
                                                        <div class="text-left">
                                                            <ul>
                                                                <li>
                                                                    <div class="left">
                                                                        <div class="item"><strong>Mã
                                                                                tour</strong><span><?= $order->order_code ?></span>
                                                                        </div>
                                                                    </div>
                                                                </li>
                                                                <li>
                                                                    <div class="left">
                                                                        <div class="item"><strong>Địa điểm khởi
                                                                                hành</strong><span><?= get_field('location_form', $value->id_post) ?></span>
                                                                        </div>
                                                                    </div>
                                                                </li>
                                                                <li>
                                                                    <div class="left">
                                                                        <div class="item"><strong>Ngày khởi
                                                                                hành</strong><span><?= date('d-m-Y', $value->start_date) ?></span>
                                                                        </div>
                                                                    </div>
                                                                </li>
                                                                <li>
                                                                    <div class="left">
                                                                        <div class="item"><strong>Từ
                                                                                ngày</strong><span><?= date('d-m-Y', $value->end_date) ?></span>
                                                                        </div>
                                                                    </div>
                                                                </li>
                                                                <li>
                                                                    <div class="left">
                                                                        <div class="item"><strong>Số
                                                                                khách</strong><span><?= $value->qty_adult ?> người lớn, <?= $value->qty_child ?> trẻ em</span>
                                                                        </div>
                                                                    </div>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                        <?php
                                                    }
                                                    ?>


                                                </div>
                                            </div>
                                        </div>
                                        <a href="<?= get_permalink($value->id_post) ?>">Thông tin chi tiết Tour <p>
                                                (Click
                                                vào để xem chi tiết lịch trình, chính sách, dịch vụ)</p></a>
                                    <?php endforeach;
                                } else {
                                    ?>
                                    <div class="section-item">
                                        <div class="left-img">
                                            <figure><img src="<?= get_the_post_thumbnail($order->id_post); ?>"
                                                         alt="blog"></figure>
                                        </div>
                                        <div class="right-text">
                                            <div class="hotel-title">
                                                <h1><?= $title ?>: <?= get_the_title($order->id_post) ?></h1>
                                            </div>
                                            <div class="map"><i class="fas fa-map-marker-alt"></i>
                                                <p><?= $location_to ?></p>
                                            </div>
                                            <div class="room-info">
                                                <div class="text-left">
                                                    <ul>
                                                        <li>
                                                            <div class="left">
                                                                <div class="item"><strong>Mã
                                                                        tour</strong><span><?= $order->order_code ?></span>
                                                                </div>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="left">
                                                                <div class="item"><strong>Địa điểm khởi
                                                                        hành</strong><span><?= $location_form ?></span>
                                                                </div>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="left">
                                                                <div class="item"><strong>Ngày khởi
                                                                        hành</strong><span><?= substr($order->date_go, 3, 2) ?> tháng <?= substr($order->date_go, 0, 2) ?>, <?= substr($order->date_go, 6) ?></span>
                                                                </div>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="left">
                                                                <div class="item"><strong>Từ
                                                                        ngày</strong><span><?= substr($date_to, 0, 2) ?> tháng <?= substr($date_to, 3, 2) ?>, <?= substr($date_to, 6) ?></span>
                                                                </div>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="left">
                                                                <div class="item"><strong>Số
                                                                        khách</strong><span><?= $order->number_adult ?> người lớn, <?= $order->number_child ?> trẻ em</span>
                                                                </div>
                                                            </div>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <div class="text-right">
                                                    <ul>
                                                        <li>
                                                            <strong><?= number_format($order->adult_price, 0, ",", ".") ?>
                                                                đ</strong><span>/người lớn</span></li>
                                                        <li>
                                                            <strong><?= number_format($order->child_price, 0, ",", ".") ?>
                                                                đ</strong><span>/trẻ em</span></li>
                                                    </ul>
                                                    <p><?= (!empty(get_the_excerpt($order->id_post))) ? '*' : '' ?> <?= get_the_excerpt($order->id_post) ?></p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <a href="<?= get_permalink($order->id_post) ?>">Thông tin chi tiết Tour <p>(Click
                                            vào để xem chi tiết lịch trình, chính sách, dịch vụ)</p></a>
                                <?php } ?>
                                <div class="section-item">
                                    <div class="pay">
                                        <div class="left"><strong>Thành tiền</strong>
                                            <p>(Giá đã bao gồm thuế phí)</p>
                                        </div>
                                        <div class="right">
                                            <strong><?= number_format($order->price_payment, 0, ",", ".") ?> đ</strong>
                                        </div>
                                    </div>
                                </div>
                                <div class="section-item">
                                    <div class="note">
                                        <p>Đơn hàng của bạn đã được tiếp nhận và chờ xử lý, vui lòng đợi nhân viên của
                                            Taiyo Tourist thực hiện xác minh và hướng dẫn thanh toán</p>
                                        <a href="#">Điều khoản sử dụng</a><span>và</span><a href="#">Chính sách bảo
                                            mật</a><span>của Taiyo Tourist</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-4 col-right">
                                <div class="form">
                                    <form action="">
                                        <div class="f-item">
                                            <label for="">Họ và tên</label>
                                            <input type="text" name="full_name" id="full_name"
                                                   value="<?= (!empty($delivery->fullname)) ? $delivery->fullname : "" ?>"
                                                   placeholder="Họ tên" readonly>
                                        </div>
                                        <div class="f-item">
                                            <h3>Giới tính</h3>
                                            <div class="f-check">
                                                <ul>
                                                    <li>
                                                        <label for="">Nam</label>
                                                        <input type="radio" name="gender" id="male" readonly
                                                               value="male" <?= (($currentLogin->gender == 'male') ? 'checked' : "") ?>>
                                                    </li>
                                                    <li>
                                                        <label for="">Nữ</label>
                                                        <input type="radio" name="gender" id="female" readonly
                                                               value="female" <?= (($currentLogin->gender == 'female') ? 'checked' : "") ?>>
                                                    </li>
                                                    <li>
                                                        <label for="">Khác</label>
                                                        <input type="radio" name="gender" id="other" readonly
                                                               value="other" <?= (($currentLogin->gender == 'other') ? 'checked' : "") ?>>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="f-item">
                                            <label for="">Số điện thoại</label>
                                            <input type="text" name="phonenumber" id="phonenumber"
                                                   value="<?= (!empty($currentLogin->phonenumber)) ? $currentLogin->phonenumber : "" ?>"
                                                   placeholder="Số điện thoại" readonly>
                                        </div>
                                        <div class="f-item">
                                            <label for="">Email</label>
                                            <input type="text" name="email" id="email"
                                                   value="<?= (!empty($currentLogin->email)) ? $currentLogin->email : "" ?>"
                                                   placeholder="Email" readonly>
                                        </div>
                                        <div class="f-item">
                                            <label for="">Ghi chú</label>
                                            <textarea readonly name="" id="" cols="30" rows="5"></textarea>
                                        </div>
                                        <?php
                                        if( $order->status < 3): ?>
                                            <button type="button" id="cancel-order">Hủy đơn hàng</button>
                                        <?php endif; ?>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>
<?php
get_footer('dash');
?>
<script>
    jQuery(document).ready(function ($) {
        var cms_adapter_ajax = function cms_adapter_ajax($param) {
            var beforeSend = $param.beforeSend || function() {};
            var complete = $param.complete || function() {}; //
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
            $("#loading-overlay").show();
        }

        // Hàm để tắt overlay
        function hideLoadingOverlay() {
            $("#loading-overlay").hide();
        }
        $('#cancel-order').on('click', function () {
            var data = '<?= $idOrder ?>';
            // Hiển thị thông báo SweetAlert2 để xác nhận xóa
            Swal.fire({
                title: 'Bạn có chắc chắn muốn hủy đơn hàng?',
                text: 'Hành động này không thể hoàn tác!',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Xác nhận',
                cancelButtonText: 'Hủy',
            }).then((result) => {
                // Nếu người dùng xác nhận xóa, thực hiện hành động xóa ở đây
                if (result.isConfirmed) {
                    // Gọi hàm xóa dữ liệu ở đây
                    performDelete(data);
                    // Sau khi xóa thành công, hiển thị thông báo thành công

                }
            });
        });
        function performDelete(id) {
            var $data = {
                'val': id,
                'action': 'cancel_order',
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
                    var dsa = JSON.parse(data);
                    if(dsa.status === 0) {
                        Swal.fire('Hủy đơn hàng thành công!', 'success');
                        setTimeout(function () {
                            location.reload(); // Load lại trang
                        }, 2000); // 3000 milliseconds = 3 giây
                    }
                }
            };
            cms_adapter_ajax($param);
        }
        // H
        var status = $('#status-order').val();
        console.log(status);
        if (status >= 3 && status <= 4) {
            $('#success-order:first-child:before').css({"background": "#e54141"});
        } else if (status == 4) {
            $('#review-comment:first-child:before').css({"background": "#e54141"});
        }

    });
</script>