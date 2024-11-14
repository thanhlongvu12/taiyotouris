<?php
/* Template Name: Giỏ hàng */
get_header("v2");
$currentLogin = getLogin();
//tour
$checkFavorite = $wpdb->get_results("SELECT * FROM `cart` where type_cart = 'taiyo_tour' and status_cart < 2 AND id_user = {$currentLogin->id} order by id desc");
//khach san
// $checkcart = $wpdb->get_results("SELECT * FROM `cart` where type_cart = 'khach_san' and status_cart < 2 AND id_user = {$currentLogin->id} order by id desc ");
// $checkFavorite = [];
// $checkcart = [];
?>
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

    .table-cart {
        display: none;
    }

    .table-cart.active {
        display: block;
    }
    .ticket-visa-1{
        padding-top: 50px;
    }
</style>
<!-- <div id="loading-overlay">
    <div class="spinner"></div>
</div> -->
<main id="shipping-cart" class="main-v2">
    <section class="ticket-visa-1">
        <div class="container">
            <div class="url-link"><a href="#">Trang chủ</a><span>/</span><a href="#" class="current">Giỏ hàng</a>
            </div>
        </div>
    </section>
    <section class="cart-1">
        <div class="container">
            <div class="content">
                <div class="title">
                    <ul>
                        <li class="tabs-chon current" data-class="tour"><i class="fal fa-globe"></i><a href="#">Tour</a>
                        </li>
                        <li class="tabs-chon " data-class="hotel"><i class="far fa-hotel"></i><a href="#">Khách sạn</a>
                        </li>
                    </ul>
                </div>
                <div class="table-cart tour active">
                    <strong class="dcart_tour">Số lượng: <?= count($checkFavorite) ?> Đơn hàng</strong>
                    <div class="table-list">
                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col"><input type="checkbox" name="" id="check_pay_all"></th>
                                <th scope="col">Tên tour</th>
                                <th scope="col">Thời gian</th>
                                <th scope="col">Giá vé người lớn</th>
                                <th scope="col">Giá vé trẻ em</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php foreach ($checkFavorite as $value):

                                $thumbnail_id = get_post_thumbnail_id($value->id_product);
                                $thumbnail_url = wp_get_attachment_image_src(attachment_id: $thumbnail_id);
                                ?>
                                <tr class="data_cart_<?= $value->id ?>">
                                    <td><input type="checkbox" name="" id=""
                                               class="check_pay check_pay_<?= $value->id ?>" <?= ($value->status_cart == 1) ? 'checked' : '' ?>
                                               data-id="<?= $value->id ?>"></td>
                                    <td>
                                        <div class="img-tour">
                                            <div class="img">
                                                <figure><img
                                                            src="<?= $thumbnail_url[0] ?>"
                                                            alt="tour"></figure>
                                            </div>
                                            <a href="<?= get_permalink($value->id_product) ?>"><?= get_the_title($value->id_product) ?></a>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="tour-time">
                                            <ul>
                                                <li><span>Ngày đi</span><strong><?= date('d', $value->start_date) ?>
                                                        tháng <?= date('m', $value->start_date) ?></strong></li>
                                                <li><span>Ngày về</span><strong>25 tháng 4</strong></li>
                                            </ul>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="tour-time">
                                            <ul>
                                                <li>
                                                    <span>X<?= $value->qty_adult ?></span><strong><?= money_check(get_field('price', $value->id_product)) ?>
                                                        đ</strong></li>
                                                <li>
                                                    <span>Tổng tiền</span><strong><?= money_check($value->qty_adult * get_field('price', $value->id_product)) ?>
                                                        đ</strong></li>
                                            </ul>
                                        </div>
                                    </td>
                                    <td>
                                        <button class="remove_cart" data-align="<?= $value->id ?>"><i
                                                    class="far fa-trash-alt"></i></button>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                            </tbody>
                        </table>
                        <div class="total total_t">
                            <div class="left">
                                <label for="">tất cả : <?= count($checkFavorite) ?> đơn hàng</label>
                            </div>
                            <?php
                            $dem = 0;
                            $tong = 0;
                            foreach ($checkFavorite as $value):
                                if ($value->status_cart == 1) {
                                    $dem++;
                                    $al = $value->qty_adult * get_field('price', $value->id_product);
                                    $al_child = $value->qty_child * get_field('price_childen', $value->id_product);
                                    $tong += ($al + $al_child);
                                }
                            endforeach;
                            ?>
                            <div class="right">
                                <div class="i-item">
                                    <p class="count_thanh"><strong>Tổng thanh toán</strong>(<?= $dem ?> đơn hàng):</p>
                                    <span class="sum_cart"><?= money_check($tong) ?> đ</span>
                                </div>
                                <button class="submit-cart" data-href="<?= home_url('thanh-toan-dat-tour') ?>">Thanh
                                    toán
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
    </section>
</main>
<?php
get_footer();
?>

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
        var ajaxurl = "<?= admin_url('admin-ajax.php') ?>";
        function money_check(number) {
            return number.toLocaleString('en-US', {style: 'decimal', minimumFractionDigits: 0});
        }

        $('.submit-cart').on('click', function () {
            var url = $(this).data('href');
            if (url) {
                window.location.href = url;
            }
        });

        $("#loading-overlay").hide();

        // Hàm để hiển thị overlay
        function showLoadingOverlay() {
            $("#loading-overlay").show();
        }

        // Hàm để tắt overlay
        function hideLoadingOverlay() {
            $("#loading-overlay").hide();
        }

        $('.tabs-chon').on('click', function () {
            $('.tabs-chon').removeClass('current');
            var class_s = $(this).data('class');
            $(this).addClass('current');
            $('.table-cart').removeClass('active');
            $('.' + class_s).addClass('active');
        })


        $('.check_pay').on('click', function () {
            var id = $(this).data('id');
            var data = $(this).is(':checked') ? '1' : '0';
            var objData = {
                'id': id,
                'val': data,
                'type': 'tour',
                'action': 'check_cart',
            };
            var $param = {
                'type': 'POST',
                'url': ajaxurl,
                'data': objData,
                'beforeSend': function () {
                    showLoadingOverlay();
                },
                'complete': function () {
                    hideLoadingOverlay();
                },
                'callback': function (data) {
                    var res = JSON.parse(data);
                    console.log(res.data);
                    var tong = 0;
                    $('.check_pay').prop('checked', false);
                    $.each(res.data, function (index, value) {
                        $('.check_pay_' + value.id).prop('checked', true);
                        var nglon = parseInt(value.nguoilon) * parseInt(value.pirce_adult);
                        var trcon = parseInt(value.trecon) * parseInt(value.pirce_child);
                        tong += (nglon + trcon);
                    });
                    $('.count_thanh').html('<strong>Tổng thanh toán</strong>(' + res.data.length + ' đơn hàng):</p>');
                    $('.sum_cart').html(money_check(tong) + ' đ');
                    //if(res.status >= 1){
                    //    Swal.fire({
                    //        icon: 'warning',
                    //        text: res.mess,
                    //        showConfirmButton: false,
                    //        timer: 3000,
                    //        footer: 'Bạn có thể đăng nhập <a style="margin: 0 5px;" href="<?//= home_url('dang-nhap') ?>//"> tại đây</a>'
                    //    })
                    //}else if(res.status === 0) {
                    //    if (res.type < 1) {
                    //        $('.follow_check_' + id).removeClass("active");
                    //    } else {
                    //        $('.follow_check_' + id).addClass("active");
                    //    }
                    //}
                }
            };
            cms_adapter_ajax($param);
            var allChecked = true;
            $(".check_pay").each(function () {
                if (!$(this).prop("checked")) {
                    allChecked = false;
                    return false;
                }
            });
            $("#check_pay_all").prop("checked", allChecked);
        })
        $('#check_pay_all').on('click', function () {
            var data = $(this).is(':checked') ? '1' : '0';
            if ($(this).is(':checked')) {
                $(".check_pay").prop("checked", $(this).prop("checked"));
            } else {
                $(".check_pay").prop("checked", false);
            }
            var data = $(this).is(':checked') ? '1' : '0';

            var $data = {
                'id': '-1',
                'val': data,
                'type': 'tour',
                'action': 'check_cart',
            };
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
                    var res = JSON.parse(data);
                    console.log(res.data);
                    var tong = 0;
                    $('.check_pay').prop('checked', false);
                    $.each(res.data, function (index, value) {
                        $('.check_pay_' + value.id).prop('checked', true);
                        var nglon = parseInt(value.nguoilon) * parseInt(value.pirce_adult);
                        var trcon = parseInt(value.trecon) * parseInt(value.pirce_child);
                        tong += (nglon + trcon);
                    });
                    $('.count_thanh').html('<strong>Tổng thanh toán</strong>(' + res.data.length + ' đơn hàng):</p>');
                    $('.sum_cart').html(money_check(tong) + ' đ');
                    //if(res.status >= 1){
                    //    Swal.fire({
                    //        icon: 'warning',
                    //        text: res.mess,
                    //        showConfirmButton: false,
                    //        timer: 3000,
                    //        footer: 'Bạn có thể đăng nhập <a style="margin: 0 5px;" href="<?//= home_url('dang-nhap') ?>//"> tại đây</a>'
                    //    })
                    //}else if(res.status === 0) {
                    //    if (res.type < 1) {
                    //        $('.follow_check_' + id).removeClass("active");
                    //    } else {
                    //        $('.follow_check_' + id).addClass("active");
                    //    }
                    //}
                }
            };
            cms_adapter_ajax($param);
        })

        $('.check_pay_ht').on('click', function () {
            var id = $(this).data('id');
            var data = $(this).is(':checked') ? '1' : '0';

            var $data = {
                'id': id,
                'val': data,
                'type': 'hotel',
                'action': 'check_cart',
            };
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
                    var res = JSON.parse(data);
                    console.log(res.data);
                    var tong = 0;
                    $('.check_pay_ht').prop('checked', false);
                    $.each(res.data, function (index, value) {
                        $('.check_pay_ht_' + value.id).prop('checked', true);
                        var startDate = value.start_date; // Ví dụ: timestamp của ngày "2021-07-20"
                        var endDate = value.end_date;   // Ví dụ: timestamp của ngày "2021-07-26"


                        // Tính số mili giây giữa hai thời điểm
                        var timeDifference = Math.abs(parseInt(endDate) - parseInt(startDate));
                        console.log(timeDifference);
                        // Tính số ngày từ số mili giây (1 ngày = 24 giờ x 60 phút x 60 giây x 1000 mili giây)
                        var numberOfNights = Math.ceil(timeDifference / (60 * 60 * 24));
                        console.log(numberOfNights);
                        tong += (numberOfNights * parseInt(value.pirce_adult));
                    });
                    $('.count_thanh_ht').html('<strong>Tổng thanh toán</strong>(' + res.data.length + ' đơn hàng):</p>');
                    $('.sum_cart_ht').html(money_check(tong) + ' đ');
                    //if(res.status >= 1){
                    //    Swal.fire({
                    //        icon: 'warning',
                    //        text: res.mess,
                    //        showConfirmButton: false,
                    //        timer: 3000,
                    //        footer: 'Bạn có thể đăng nhập <a style="margin: 0 5px;" href="<?//= home_url('dang-nhap') ?>//"> tại đây</a>'
                    //    })
                    //}else if(res.status === 0) {
                    //    if (res.type < 1) {
                    //        $('.follow_check_' + id).removeClass("active");
                    //    } else {
                    //        $('.follow_check_' + id).addClass("active");
                    //    }
                    //}
                }
            };
            cms_adapter_ajax($param);
            var allChecked = true;
            $(".check_pay_ht").each(function () {
                if (!$(this).prop("checked")) {
                    allChecked = false;
                    return false;
                }
            });
            $("#check_pay_all_ht").prop("checked", allChecked);
        })
        $('#check_pay_all_ht').on('click', function () {
            var data = $(this).is(':checked') ? '1' : '0';
            if ($(this).is(':checked')) {
                $(".check_pay_ht").prop("checked", $(this).prop("checked"));
            } else {
                $(".check_pay_ht").prop("checked", false);
            }
            var data = $(this).is(':checked') ? '1' : '0';

            var $data = {
                'id': '-1',
                'val': data,
                'type': 'hotel',
                'action': 'check_cart',
            };
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
                    var res = JSON.parse(data);
                    console.log(res.data);
                    var tong = 0;
                    $('.check_pay_ht').prop('checked', false);
                    $.each(res.data, function (index, value) {
                        $('.check_pay_ht_' + value.id).prop('checked', true);
                        var startDate = value.start_date; // Ví dụ: timestamp của ngày "2021-07-20"
                        var endDate = value.end_date;   // Ví dụ: timestamp của ngày "2021-07-26"


                        // Tính số mili giây giữa hai thời điểm
                        var timeDifference = Math.abs(parseInt(endDate) - parseInt(startDate));
                        console.log(timeDifference);
                        // Tính số ngày từ số mili giây (1 ngày = 24 giờ x 60 phút x 60 giây x 1000 mili giây)
                        var numberOfNights = Math.ceil(timeDifference / (60 * 60 * 24));
                        console.log(numberOfNights);
                        tong += (numberOfNights * parseInt(value.pirce_adult));
                    });
                    $('.count_thanh_ht').html('<strong>Tổng thanh toán</strong>(' + res.data.length + ' đơn hàng):</p>');
                    $('.sum_cart_ht').html(money_check(tong) + ' đ');
                    //if(res.status >= 1){
                    //    Swal.fire({
                    //        icon: 'warning',
                    //        text: res.mess,
                    //        showConfirmButton: false,
                    //        timer: 3000,
                    //        footer: 'Bạn có thể đăng nhập <a style="margin: 0 5px;" href="<?//= home_url('dang-nhap') ?>//"> tại đây</a>'
                    //    })
                    //}else if(res.status === 0) {
                    //    if (res.type < 1) {
                    //        $('.follow_check_' + id).removeClass("active");
                    //    } else {
                    //        $('.follow_check_' + id).addClass("active");
                    //    }
                    //}
                }
            };
            cms_adapter_ajax($param);
        })

        $('.remove_cart').on('click', function () {
            var data = $(this).data('align');
            // Hiển thị thông báo SweetAlert2 để xác nhận xóa
            Swal.fire({
                title: 'Bạn có chắc chắn muốn xóa?',
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

        // Hàm thực hiện xóa dữ liệu (nếu bạn sử dụng Ajax để gửi yêu cầu xóa, bạn có thể thực hiện ở đây)
        function performDelete(id) {
            var $data = {
                'val': id,
                'action': 'delete_cart',
            };
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
                    var res = JSON.parse(data);
                    if (res.status === 0) {
                        $('.data_cart_' + id).remove();
                        if (res.count === 0) {
                            $('.label').hide();
                        }
                        $('.label span').html(res.count);
                        $('.total_t .left label').html('tất cả : ' + res.count_t + ' đơn hàng');
                        $('.total_h .left label').html('tất cả : ' + res.count_h + ' đơn hàng');
                        $('.dcart_tour').html('Số lượng : ' + res.count_t + ' đơn hàng');
                        $('.dcart_ht').html('Số lượng : ' + res.count_h + ' đơn hàng');
                    }


                    var dem = 0;
                    var tong = 0;
                    var dem_ht = 0;
                    var tong_ht = 0;
                    $('.check_pay').prop('checked', false);
                    $('.check_pay_ht').prop('checked', false);
                    $.each(res.data, function (index, value) {
                        $('.check_pay_' + value.id).prop('checked', true);
                        $('.check_pay_ht_' + value.id).prop('checked', true);
                        var nglon = parseInt(value.nguoilon) * parseInt(value.pirce_adult);
                        var trcon = parseInt(value.trecon) * parseInt(value.pirce_child);
                        tong += (nglon + trcon);
                        var startDate = value.start_date; // Ví dụ: timestamp của ngày "2021-07-20"
                        var endDate = value.end_date;   // Ví dụ: timestamp của ngày "2021-07-26"


                        // Tính số mili giây giữa hai thời điểm
                        var timeDifference = Math.abs(parseInt(endDate) - parseInt(startDate));
                        console.log(timeDifference);
                        // Tính số ngày từ số mili giây (1 ngày = 24 giờ x 60 phút x 60 giây x 1000 mili giây)
                        var numberOfNights = Math.ceil(timeDifference / (60 * 60 * 24));
                        console.log(numberOfNights);
                        tong_ht += (numberOfNights * parseInt(value.pirce_adult));
                        if(value.type_cart === 'khach_san'){
                            dem_ht++;
                        }else {
                            dem++;
                        }
                    });
                    $('.count_thanh').html('<strong>Tổng thanh toán</strong>(' + dem + ' đơn hàng):</p>');
                    $('.sum_cart').html(money_check(tong) + ' đ');
                    $('.count_thanh_ht').html('<strong>Tổng thanh toán</strong>(' + dem_ht + ' đơn hàng):</p>');
                    $('.sum_cart_ht').html(money_check(tong_ht) + ' đ');
                    //if(res.status >= 1){
                    //    Swal.fire({
                    //        icon: 'warning',
                    //        text: res.mess,
                    //        showConfirmButton: false,
                    //        timer: 3000,
                    //        footer: 'Bạn có thể đăng nhập <a style="margin: 0 5px;" href="<?//= home_url('dang-nhap') ?>//"> tại đây</a>'
                    //    })
                    //}else if(res.status === 0) {
                    //    if (res.type < 1) {
                    //        $('.follow_check_' + id).removeClass("active");
                    //    } else {
                    //        $('.follow_check_' + id).addClass("active");
                    //    }
                    //}
                    Swal.fire('Xóa thành công!', 'Dữ liệu đã được xóa.', 'success');
                }
            };
            cms_adapter_ajax($param);
        }
    })
</script>
