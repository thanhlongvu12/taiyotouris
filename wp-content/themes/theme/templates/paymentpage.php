<?php
/**
 * Created by PhpStorm.
 * User: VuThanhLong
 * Date: 11/9/2023
 * Time: 4:55 PM
 * Template Name: Payment Page
 */
$uri = get_template_directory_uri();
$obj = get_queried_object();

$member = $_GET['adult'];
$date = $_GET['date'];
$id_post = $_GET['id_tour'];

$price_tour = get_field('price', $id_post);
$return_day = get_field('return_day', $id_post);
$location = get_field('location', $id_post);
$time = get_field('time', $id_post);

$total_price = $member * $price_tour;
$currentLogin = getLogin();
$delivery = getDelivery($currentLogin->id);
get_header();
?>
<input type="hidden" name="id-post" id="id-post" value="<?= $id_post ?>">
<input type="hidden" name="title-post" id="title-post" value="<?= get_the_title($id_post) ?>">
<input type="hidden" name="date-go" id="date-go" value="<?= $date ?>">
<input type="hidden" name="code-order" id="code-order" value="0">
<input type="hidden" name="number-adult" id="number-adult" value="<?= $member ?>">
<input type="hidden" name="number-child" id="number-child" value="0">
<input type="hidden" name="price-adult" id="price-adult" value="<?= $price_tour ?>">
<input type="hidden" name="price-child" id="price-child" value="0">
<main id="book-room">
    <div class="nor-book"><i class="far fa-stopwatch"></i>Nếu quý khách hàng không thực hiện thanh toán đơn hàng tự động hủy sau 30:00</div>
    <section class="bookroom-1 bookroom-2">
        <div class="container">
            <div class="content">
                <div class="url-link">
                    <a href="#">Trang chủ</a><span>/</span><a href="#">Tour</a><span>/</span><a href="#" class="current">Xác nhận đơn hàng : <?= get_the_title($id_post) ?></a>
                </div>
                <div class="main-content">
                    <div class="row">
                        <div class="col-md-8 col-left">
                            <div class="section-item">
                                <div class="left-img">
                                    <figure><img src="<?= get_the_post_thumbnail($id_post) ?>" alt="blog"></figure>
                                </div>
                                <div class="right-text">
                                    <div class="hotel-title">
                                        <h1>Tour : <?= get_the_title($id_post) ?></h1>
                                    </div>
                                    <div class="rate">
                                        <div class="write">
                                            <strong>4.8 Rất tốt</strong><span>|</span>
                                            <p>75 đánh giá</p>
                                        </div>
                                    </div>
                                    <div class="map">
                                        <ul class="list-address">
                                            <li><i class="fas fa-map-marker-alt"></i><?= $location['to']?></li>
                                            <li><i class="fas fa-stopwatch"></i><?= $time['day']?> ngày <?= $time['night']?> đêm</li>
                                            <li><i class="fas fa-plane"></i>Máy bay</li>
                                        </ul>
                                    </div>
                                    <div class="room-info">
                                        <div class="text-left">
                                            <ul>
                                                <li>
                                                    <div class="left">
                                                        <div class="item"><strong>Mã tour</strong><span>TU13546</span></div>
                                                        <div class="item"><strong>Địa điểm khởi hành</strong><span><?= $location['from']?></span></div>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="left">
                                                        <div class="item"><strong>Ngày khởi hành</strong><span><?= $date?></span></div>
                                                    </div>
                                                </li>
<!--                                                <li>-->
<!--                                                    <div class="left">-->
<!--                                                        <div class="item"><strong>Từ ngày</strong><span></span></div>-->    
<!--                                                    </div>-->
<!--                                                </li>-->
                                                <li>
                                                    <div class="left">
                                                        <div class="item"><strong>Đến ngày</strong><span><?= $return_day?></span></div>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="left">
                                                        <div class="item">
                                                            <strong>Số khách</strong>
                                                            <ul>
                                                                <li><?= $member?> người</li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="text-right">
                                            <ul>
                                                <li><strong><?= number_format($price_tour, 0, '.', '.')?> đ</strong><span>/người</span></li>
                                            </ul>
                                            <p>*Chấp nhận khách sau 24h</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <a href="#">Thông tin chi tiết Tour <p>(Click vào để xem chi tiết lịch trình, chính sách, dịch vụ)</p></a>
                            <div class="section-item">
                                <div class="pay">
                                    <div class="left"><strong>Thành tiền</strong>
                                        <p>(Giá đã bao gồm thuế phí)</p>
                                    </div>
                                    <div class="right"><strong><?= number_format($total_price, 0, '.', '.')?> đ</strong></div>
                                    <input type="hidden" name="count-money" id="count-money" value="<?= $total_price ?>">
                                </div>
                            </div>
                            <div class="section-item">
                                <div class="note">
                                    <p>Thực hiện các bước trên đồng nghĩa với việc bạn chấp thuận tuân theo</p>
                                    <a href="#">Điều khoản sử dụng</a><span>và</span><a href="#">Chính sách bảo mật</a><span>của Taiyo Tourist</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 col-right">
                            <div class="form">
                                <form action="">
                                    <h2>Thông tin liên hệ</h2>
                                    <div class="f-item">
                                        <label for="">Họ và tên</label>
                                        <input type="text" value="<?= $delivery->fullname ?>">
                                    </div>
                                    <div class="f-item">
                                        <h3>Giới tính</h3>
                                        <div class="f-check">
                                            <ul>
                                                <li>
                                                    <label for="">Nam</label>
                                                    <input readonly type="radio" name="gender" id="male"
                                                           value="male" <?= (($currentLogin->gender == 'male') ? 'checked' : "") ?>>
                                                </li>
                                                <li>
                                                    <label for="">Nữ</label>
                                                    <input readonly type="radio" name="gender" id="female"
                                                           value="female" <?= (($currentLogin->gender == 'female') ? 'checked' : "") ?>>
                                                </li>
                                                <li>
                                                    <label for="">Khác</label>
                                                    <input readonly type="radio" name="gender" id="other"
                                                           value="other" <?= (($currentLogin->gender == 'other') ? 'checked' : "") ?>>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="f-item">
                                        <label for="">Số điện thoại</label>
                                        <input type="text" value="<?= $currentLogin->phonenumber ?>" readonly>
                                    </div>
                                    <div class="f-item">
                                        <label for="">Email</label>
                                        <input type="text" value="<?= $currentLogin->email ?>" readonly>
                                    </div>
                                    <div class="f-item">
                                        <label for="">Ghi chú</label>
                                        <textarea name="" id="" cols="30" rows="5"></textarea>
                                    </div>
                                    <button type="button" id="order-now">Đặt ngay</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>

<?php
get_footer()
?>
<script>
    $(document).ready(function () {
        // THay đổi thông tin
        $('#order-now').on('click', function () {
            var ippost = $('#id-post').val();
            var title = $('#title-post').val();
            var code = $('#code-order').val();
            var datego = $('#date-go').val();
            var child = $('#number-child').val();
            var adult = $('#number-adult').val();
            var price_adult = $('#price-adult').val();
            var price_child = $('#price-child').val();
            var money = $('#count-money').val();
            var note = $('#note').val();

            var link = "<?= admin_url('admin-ajax.php'); ?>";
            $.ajax({
                url: link,
                type: 'POST',
                cache: false,
                dataType: "json",
                data: {
                    idpost: ippost,
                    title: title,
                    code: code,
                    datego: datego,
                    child: child,
                    adult: adult,
                    price_adult: price_adult,
                    price_child: price_child,
                    money: money,
                    note: note,
                    typeorder: 'tour',
                    action: 'order_tour_now',
                },
                beforeSend: function () {
                    $('.divgif').css('display', 'block');
                },
                success: function (data) {
                    if (data.status == true) {
                        $('.divgif').css('display', 'none');
                        var ur = '<?= get_template_directory_uri() ?>';
                        var htmlpl = '<main id="order-success"> ' +
                            '<div class="section-success"> ' +
                            '<div class="container"> ' +
                            '<div class="content"> ' +
                            '<div class="img"> ' +
                            '<figure><img src=" ' + ur + '/dist/images/success.svg" alt="success"></figure> ' +
                            '</div> ' +
                            '<h1>Gửi yêu cầu đặt tour thành công</h1> ' +
                            '<p>Cảm ơn quý khách đã sử dụng dịch vụ tại Taiyo Tourist<br>Xin vui lòng kiểm tra email để xem lại thông tin đặt tour của quý khách</p> ' +
                            '<div class="bnt-success"> ' +
                            '<button id="button-return"><i class="fal fa-arrow-left"></i>Quay lại</button>' +
                            '</div></div></div></div></main>';
                        $("#book-room").html(htmlpl);
                    } else {
                        $('.divgif').css('display', 'none');
                        alert(data.mess);
                    }
                    if(parseInt(data.count) > 0){
                        $('.label span').html(data.count);
                    }else {
                        $('.label span').html(data.count);
                        $('.label').hide();
                    }
                }
            });
        });
        $('body').on('click', '#button-return', function () {
            setTimeout(function () {
                window.location.href = '<?= $_SERVER['HTTP_REFERER'] ?>';
            }, 500);
        });
    });
</script>
