<?php
/**
 * Created by PhpStorm.
 * User: VuThanhLong
 * Date: 11/13/2023
 * Time: 11:57 PM
 * Template Name: Booking Hotel
 */
$id_post = $_GET['id'];
if (!empty($id_post)) {
    $id_room = $_GET['id_room'];
    $checkin = $_GET['checkin'];
    $checkout = $_GET['checkout'];
}else{
    $id_post = 0;
}
$currentLogin = getLogin();
$delivery = getDelivery($currentLogin->id);
get_header('v2')
?>
<main id="book-room" style="margin-top: 150px">
<!--    <div class="nor-book"><i class="far fa-stopwatch"></i> Nếu quý khách hàng không thực hiện thanh toán đơn hàng tự động hủy sau 30:00</div>-->
    <section class="bookroom-1">
        <div class="container">
            <div class="content">
                <div class="url-link">
                    <a href="#">Trang chủ</a><span>/</span><a href="#">Giỏ hàng</a><span>/</span><a href="#" class="current">Yêu cầu đặt phòng</a>
                </div>
                <div class="main-content">
                    <div class="row">
                        <div class="col-md-8 col-left">
                            <?php
                            if (!empty($id_post)){
                                $count_price = 0;
                                $checkInDate = new DateTime('@' . strtotime($checkin));
                                $checkOutDate = new DateTime('@' . strtotime($checkout));

                                // Tính số đêm giữa hai thời điểm
                                $interval = $checkInDate->diff($checkOutDate);
                                $numberOfNights = $interval->format('%a');

                                // Lấy giá trị tuyệt đối của số đêm
                                $numberOfNights = abs($numberOfNights);
                                $count_price += ($numberOfNights * get_field('detail',$id_room)['price']);
                                ?>
                                <input type="hidden" id="id_ps" value="<?= $id_post ?>">
                                <input type="hidden" id="checkin_date" value="<?= strtotime($checkin) ?>">
                                <input type="hidden" id="checkout_date" value="<?= strtotime($checkout) ?>">
                                <input type="hidden" id="id_room" value="<?= $id_room ?>">
                                <div class="section-item">
                                    <div class="left-img">
                                        <figure><img src="<?= get_the_post_thumbnail_url($id_room)?>" alt="blog"></figure>
                                    </div>
                                    <div class="right-text">
                                        <div class="hotel-title">
                                            <h1>Khách sạn: <?= get_the_title($id_post) . ' : ' . get_the_title($id_room)?></h1>
                                            <div class="sku">Mã đơn: HDG14579</div>
                                        </div>
                                        <div class="rate">
                                            <div class="star">
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                            </div>
                                            <div class="write">
                                                <strong>4.8 Rất tốt</strong><span>|</span>
                                                <p>75 đánh giá</p>
                                            </div>
                                        </div>
                                        <div class="map"><i class="fas fa-map-marker-alt"></i>
                                            <?php
                                            $terms = get_terms(array(
                                                'taxonomy' => 'tourist_attraction',
                                                'object_ids' => $id_room,
                                            ));
                                            ?>
                                            <p><?=$terms[0]->name?></p>
                                        </div>
                                        <div class="room-info">
                                            <div class="text-left">
                                                <ul>
                                                    <li>
                                                        <div class="left">
                                                            <div class="item"><strong>Nhận phòng</strong><span><?= date('d', strtotime($checkin))    ?> tháng <?=  date('m', strtotime($checkin))   ?></span></div>
                                                            <div class="item"><strong>Trả phòng</strong><span><?= date('d', strtotime($checkout))   ?> tháng <?= date('m', strtotime($checkout))  ?></span></div>
                                                        </div>
                                                        <div class="right"><span><?= $numberOfNights ?> đêm</span></div>
                                                    </li>
                                                    <li>
                                                        <div class="left">
                                                            <div class="item"><strong>Phòng đặt</strong><span><?= get_the_title($id_room)?></span></div>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="left">
                                                            <div class="item"><strong>Loại giường</strong><span><?= get_field('detail',$id_room)['bed_type'] ?></span></div>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="left">
                                                            <div class="item"><strong>Diện tích</strong><span><?= get_field('detail',$id_room)['area'] ?> m²</span></div>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="left">
                                                            <div class="item"><strong>Số khách</strong><span>Số khách
                                                                    <?= get_field('detail',$id_room)['number'] ?> người</span></div>
                                                        </div>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="text-right">
                                                <ul>
                                                    <li><strong><?= number_format(get_field('detail',$id_room)['price'], 0, '.', ',')?> đ</strong><span>/người/đêm</span></li>
                                                </ul>
                                                <p>*Chấp nhận khách sau 24h</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?php
                            }
                            ?>
                            <a href="#">Thông tin chi tiết Tour <p>(Click vào để xem chi tiết lịch trình, chính sách, dịch vụ)</p></a>
                            <div class="section-item">
                                <div class="pay">
                                    <div class="left"><strong>Thành tiền</strong>
                                        <p>(Giá đã bao gồm thuế phí)</p>
                                    </div>
                                    <div class="right"><strong><?= money_check($count_price) ?> đ</strong></div>
                                </div>
                            </div>
                            <div class="section-item">
                                <div class="note">
                                    <p>Thực hiện các bước trên đồng nghĩa với việc bạn chấp thuận tuân theo</p>
                                    <a href="#">Điều khoản sử dụng</a><span>và</span><a href="#">Chính sách bảo mật</a><span>của Taiyo Tourist</span>
                                </div>
                            </div>
                            <button id="order-now">Gửi yêu cầu đặt phòng</button>
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
                                                    <input  readonly type="radio" name="gender" id="male"
                                                            value="male" <?= (($currentLogin->gender == 'male') ? 'checked' : "") ?>>
                                                </li>
                                                <li>
                                                    <label for="">Nữ</label>
                                                    <input  readonly type="radio" name="gender" id="female"
                                                            value="female" <?= (($currentLogin->gender == 'female') ? 'checked' : "") ?>>
                                                </li>
                                                <li>
                                                    <label for="">Khác</label>
                                                    <input  readonly type="radio" name="gender" id="other"
                                                            value="other" <?= (($currentLogin->gender == 'other') ? 'checked' : "") ?>>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="f-item">
                                        <label for="">Số điện thoại</label>
                                        <input readonly type="text" value="<?= $currentLogin->phonenumber ?>" >
                                    </div>
                                    <div class="f-item">
                                        <label for="">Email</label>
                                        <input readonly type="text" value="<?= $currentLogin->email ?>" >
                                    </div>
                                    <div class="f-item">
                                        <label for="">Ghi chú</label>
                                        <textarea name="" id="" cols="30" rows="5"></textarea>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>
<?php get_footer() ?>
<script>
    $(document).ready(function () {
        // THay đổi thông tin
        $('#order-now').on('click', function () {
            var note = $('#note').val();
            var id_ps = $('#id_ps').val();
            var checkin_date = $('#checkin_date').val();
            var checkout_date = $('#checkout_date').val();
            var id_room = $('#id_room').val();
            if(id_ps === undefined){
                id_ps = '-1';
            }
            var link = "<?= admin_url('admin-ajax.php'); ?>";
            $.ajax({
                url: link,
                type: 'POST',
                cache: false,
                dataType: "json",
                data: {
                    note: note,
                    id_ps: id_ps,
                    checkin_date: checkin_date,
                    checkout_date: checkout_date,
                    id_room: id_room,
                    typeorder: 'hotel',
                    action: 'order_hotel_now',
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
                            '<h1>Gửi yêu cầu đặt Phòng khách sạn thành công</h1> ' +
                            '<p>Cảm ơn quý khách đã sử dụng dịch vụ tại Taiyo Tourist<br>Xin vui lòng kiểm tra email để xem lại thông tin đặt phòng khách sạn của quý khách</p> ' +
                            '<div class="bnt-success"> ' +
                            '<a href="<?= home_url() ?>"><button id="button-return"><i class="fal fa-arrow-left"></i>Quay lại Trang chủ</button></a>' +
                            '</div></div></div></div></main>';
                        $("#book-room").html(htmlpl);
                        if(parseInt(data.count) > 0){
                            $('.label span').html(data.count);
                        }else {
                            $('.label span').html(data.count);
                            $('.label').hide();
                        }
                    } else {
                        $('.divgif').css('display', 'none');
                        Swal.fire({
                            icon: 'warning',
                            text: data.mess,
                            showConfirmButton: false,
                            timer: 1500
                        })
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
