<?php
/**
 * Created by PhpStorm.
 * User: VuThanhLong
 * Date: 11/9/2023
 * Time: 9:15 AM
 */
$uri = get_template_directory_uri();
$obj = get_queried_object();

$location = get_field('location', $obj->ID);
$price = get_field('price', $obj->ID);
$time = get_field('time', $obj->ID);
$schudule = get_field('schedule', $obj->ID);
$departureSchedule = get_field('departure_schedule', $obj->ID);

get_header('v2');
?>
<main id="detail-tour" class="main-v2">
    <section class="detail-tour-1">
        <div class="container">
            <div class="content">
                <div class="row">
                    <div class="col-md-8 col-left">
                        <div class="big-img">
                            <div class="url-link">
                                <a href="#">Trang chủ</a><span>/</span><a href="#">Tour du lịch</a><span>/</span><a href="#">Phú Quốc</a><span>/</span><a href="#" class="current">Phú Quốc</a>
                            </div>
                            <div class="section-type-1">
                                <div class="title">
                                    <h1><?= $obj->post_title?></h1>
                                    <div class="more-info">
                                        <div class="rate"><strong>4.8 Rất tốt</strong><span>|</span>
                                            <p>75 đánh giá</p>
                                        </div>
                                        <div class="map">
                                            <ul>
                                                <li>
                                                    <i class="fas fa-map-marker-alt"></i>
                                                    <p><?= $location['to']?></p>
                                                </li>
                                                <li>
                                                    <i class="far fa-stopwatch"></i>
                                                    <p><?= $time['day']?> ngày <?= $time['night']?> đêm</p>
                                                </li>
                                                <li>
                                                    <i class="fas fa-plane"></i>
                                                    <p>Máy bay</p>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="list-video">
                                <div class="col-left">
                                    <div class="video">
                                        <a class="view-trailer" href="https://www.youtube.com/watch?v=AZsZjzxpVwQ" data-fancybox="video">
                                            <div class="img">
                                                <figure><img src="<?= get_the_post_thumbnail($obj->ID); ?>" alt="video"></figure>
                                                <i class="fal fa-play-circle"></i>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                                <div class="col-right">
                                    <ul>
                                        <li><a href="#">
                                                <figure><img src="<?= $uri?>/dist/images/video.png" alt="video"></figure>
                                            </a></li>
                                        <li><a href="#">
                                                <figure><img src="<?= $uri?>/dist/images/video.png" alt="video"></figure>
                                            </a></li>
                                        <li><a href="#">
                                                <figure><img src="<?= $uri?>/dist/images/video.png" alt="video"></figure>
                                            </a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="accor-tour">
                            <div class="title-tour">
                                <h2>Lịch trình Tour</h2>
                            </div>
                            <div class="main-accor">
                                <?php
                                foreach ($schudule as $key=>$value){
                                    ?>
                                    <div class="item-accor">
                                        <div class="acc-title">
                                            <div class="acc-left">
                                                <div class="acc-icon"><i class="fas fa-calendar-alt"></i><span>Ngày <?= $key+1?>: <?= $value['Name']?></span></div>
                                            </div>
                                            <div class="acc-right"><i class="far fa-chevron-up"></i></div>
                                        </div>
                                        <div class="acc-content">
                                            <?= $value['content']?>
                                        </div>
                                    </div>
                                    <?php
                                }
                                ?>
                            </div>
                        </div>
                        <div class="tour-calendar">
                            <h2>Lịch khởi hành</h2>
                            <div class="table-calendar">
                                <table>
                                    <thead>
                                    <tr>
                                        <th scope="col">Khởi hành từ</th>
                                        <th scope="col">Ngày khởi hành</th>
                                        <th scope="col">Ngày về</th>
                                        <th scope="col">Tình trạng chỗ</th>
                                        <th scope="col">Giá</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    foreach ($departureSchedule as $value){
                                        ?>
                                        <tr>
                                            <td><?= $location['from']?></td>
                                            <td><?= $value['day_start']?></td>
                                            <td><?= $value['return_date']?></td>
                                            <td><?= $value['seat_status']?></td>
                                            <td class="blue"><?= $value['price']?> Đ</td>
                                        </tr>
                                        <?php
                                    }
                                    ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="info-pay">
                            <h2>Thông tin Visa</h2>
                            <div class="list-pay">
                                <ul>
                                    <li>Quý khách phải có hộ chiếu còn hạn 06 tháng tính từ ngày tour kết thúc và mang theo khi đi tour</li>
                                    <li>Được miễn phí visa đối với khách có quốc tịch Việt Nam</li>
                                </ul>
                            </div>
                        </div>
                        <div class="info-pay">
                            <h2>Hướng dẫn viên</h2>
                            <div class="list-pay">
                                <ul>
                                    <li>Hướng dẫn viên (HDV) sẽ liên lạc với quý khách khoảng 2 - 3 ngày trước khi khởi hành để sắp xếp giờ đón và cung cấp các thông tin cần thiết cho chuyến đi</li>
                                    <li>HDV làm thủ tục hàng không, nhận khách sạn, sắp xếp các bữa ăn và đồng hành suốt chuyến đi</li>
                                </ul>
                            </div>
                        </div>
                        <div class="tabhozion-tour">
                            <h2>Chính sách giá</h2>
                            <div class="tab-policy">
                                <div class="policy-title">
                                    <ul>
                                        <li rel="tab1">Giá bao gồm</li>
                                        <li rel="tab2">Giá không bao gồm</li>
                                        <li rel="tab3">Phụ thu</li>
                                        <li rel="tab4">Hủy đổi</li>
                                        <li rel="tab5">Lưu ý</li>
                                    </ul>
                                </div>
                                <div class="policy-content">
                                    <div id="tab1" class="poli-item">
                                        <ul>
                                            <li>Vé máy bay khứ hồi Hà Nội - Phú Quốc – Hà Nội (BamBooAirways).</li>
                                            <li>Vận chuyển xe máy lạnh đời mới theo lịch trình.</li>
                                            <li>Khách sạn tiêu chuẩn 3* tại Phú Quốc.</li>
                                            <li>Ăn sáng Buffet tại khách sạn.</li>
                                            <li>Hướng dẫn viên nhiệt tình, kinh nghiệm đón tiễn tại sân bay Nội Bài và đi theo suốt hành trình tại Phú Quốc.</li>
                                            <li>Bảo hiểm du lịch suốt tuyến (mức đền bù tối đa 20,000,000 VNĐ/vụ).</li>
                                            <li>Phí thắng cảnh các điểm vào cửa lần thứ nhất các điểm có trong chương trình.</li>
                                        </ul>
                                    </div>
                                    <div id="tab2" class="poli-item">
                                        <ul>
                                            <li>Vé máy bay khứ hồi Hà Nội - Phú Quốc – Hà Nội (BamBooAirways).</li>
                                            <li>Vận chuyển xe máy lạnh đời mới theo lịch trình.</li>
                                            <li>Khách sạn tiêu chuẩn 3* tại Phú Quốc.</li>
                                            <li>Ăn sáng Buffet tại khách sạn.</li>
                                            <li>Hướng dẫn viên nhiệt tình, kinh nghiệm đón tiễn tại sân bay Nội Bài và đi theo suốt hành trình tại Phú Quốc.</li>
                                            <li>Bảo hiểm du lịch suốt tuyến (mức đền bù tối đa 20,000,000 VNĐ/vụ).</li>
                                            <li>Phí thắng cảnh các điểm vào cửa lần thứ nhất các điểm có trong chương trình.</li>
                                        </ul>
                                    </div>
                                    <div id="tab3" class="poli-item">
                                        <ul>
                                            <li>Vé máy bay khứ hồi Hà Nội - Phú Quốc – Hà Nội (BamBooAirways).</li>
                                            <li>Vận chuyển xe máy lạnh đời mới theo lịch trình.</li>
                                            <li>Khách sạn tiêu chuẩn 3* tại Phú Quốc.</li>
                                            <li>Ăn sáng Buffet tại khách sạn.</li>
                                            <li>Hướng dẫn viên nhiệt tình, kinh nghiệm đón tiễn tại sân bay Nội Bài và đi theo suốt hành trình tại Phú Quốc.</li>
                                            <li>Bảo hiểm du lịch suốt tuyến (mức đền bù tối đa 20,000,000 VNĐ/vụ).</li>
                                            <li>Phí thắng cảnh các điểm vào cửa lần thứ nhất các điểm có trong chương trình.</li>
                                        </ul>
                                    </div>
                                    <div id="tab4" class="poli-item">
                                        <ul>
                                            <li>Vé máy bay khứ hồi Hà Nội - Phú Quốc – Hà Nội (BamBooAirways).</li>
                                            <li>Vận chuyển xe máy lạnh đời mới theo lịch trình.</li>
                                            <li>Khách sạn tiêu chuẩn 3* tại Phú Quốc.</li>
                                            <li>Ăn sáng Buffet tại khách sạn.</li>
                                            <li>Hướng dẫn viên nhiệt tình, kinh nghiệm đón tiễn tại sân bay Nội Bài và đi theo suốt hành trình tại Phú Quốc.</li>
                                            <li>Bảo hiểm du lịch suốt tuyến (mức đền bù tối đa 20,000,000 VNĐ/vụ).</li>
                                            <li>Phí thắng cảnh các điểm vào cửa lần thứ nhất các điểm có trong chương trình.</li>
                                        </ul>
                                    </div>
                                    <div id="tab5" class="poli-item">
                                        <ul>
                                            <li>Vé máy bay khứ hồi Hà Nội - Phú Quốc – Hà Nội (BamBooAirways).</li>
                                            <li>Vận chuyển xe máy lạnh đời mới theo lịch trình.</li>
                                            <li>Khách sạn tiêu chuẩn 3* tại Phú Quốc.</li>
                                            <li>Ăn sáng Buffet tại khách sạn.</li>
                                            <li>Hướng dẫn viên nhiệt tình, kinh nghiệm đón tiễn tại sân bay Nội Bài và đi theo suốt hành trình tại Phú Quốc.</li>
                                            <li>Bảo hiểm du lịch suốt tuyến (mức đền bù tối đa 20,000,000 VNĐ/vụ).</li>
                                            <li>Phí thắng cảnh các điểm vào cửa lần thứ nhất các điểm có trong chương trình.</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="poly-rate">
                            <div class="rate">
                                <h2>Đánh giá</h2>
                                <div class="row-rate">
                                    <div class="col-rate">
                                        <div class="progress"></div>
                                        <div class="review">
                                            <h3>Ảnh người dùng đánh giá</h3>
                                            <div class="list-img">
                                                <ul>
                                                    <li><img src="<?= $uri?>/dist/images/room-1.png" alt="room"></li>
                                                    <li><img src="<?= $uri?>/dist/images/room-1.png" alt="room"></li>
                                                    <li><img src="<?= $uri?>/dist/images/room-1.png" alt="room"></li>
                                                    <li><img src="<?= $uri?>/dist/images/room-1.png" alt="room"></li>
                                                    <li><img src="<?= $uri?>/dist/images/room-1.png" alt="room"></li>
                                                </ul>
                                            </div>
                                            <div class="list-cmt">
                                                <div class="i-cmt">
                                                    <div class="cmt-user">
                                                        <img src="<?= $uri?>/dist/images/user.png" alt="user">
                                                        <div class="info">
                                                            <strong>Trần Thảo Linh</strong>
                                                            <div class="more">
                                                                <strong>4.8 Rất tốt</strong><span>-</span>
                                                                <p>10/04/2023</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="short">
                                                        <p>Khu nghĩ dưỡng là nơi ấm cúng với những cảm xúc tuyệt vời, bãi biển đẹp với khu vệ sinh tốt. Điểm cộng lớn là giường thoải mái và phòng sạch sẽ. Nhưng điểm trừ là nhà hàng với bữa sáng không ngon</p>
                                                    </div>
                                                    <div class="img-review">
                                                        <ul>
                                                            <li><img src="<?= $uri?>/dist/images/room-1.png" alt="room"></li>
                                                            <li><img src="<?= $uri?>/dist/images/room-1.png" alt="room"></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <div class="i-cmt">
                                                    <div class="cmt-user">
                                                        <img src="<?= $uri?>/dist/images/user.png" alt="user">
                                                        <div class="info">
                                                            <strong>Trần Thảo Linh</strong>
                                                            <div class="more">
                                                                <strong>4.8 Rất tốt</strong><span>-</span>
                                                                <p>10/04/2023</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="short">
                                                        <p>Khu nghĩ dưỡng là nơi ấm cúng với những cảm xúc tuyệt vời, bãi biển đẹp với khu vệ sinh tốt. Điểm cộng lớn là giường thoải mái và phòng sạch sẽ. Nhưng điểm trừ là nhà hàng với bữa sáng không ngon</p>
                                                    </div>
                                                </div>
                                                <div class="i-cmt">
                                                    <div class="cmt-user">
                                                        <img src="<?= $uri?>/dist/images/user.png" alt="user">
                                                        <div class="info">
                                                            <strong>Trần Thảo Linh</strong>
                                                            <div class="more">
                                                                <strong>4.8 Rất tốt</strong><span>-</span>
                                                                <p>10/04/2023</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="short">
                                                        <p>Khu nghĩ dưỡng là nơi ấm cúng với những cảm xúc tuyệt vời, bãi biển đẹp với khu vệ sinh tốt. Điểm cộng lớn là giường thoải mái và phòng sạch sẽ. Nhưng điểm trừ là nhà hàng với bữa sáng không ngon</p>
                                                    </div>
                                                </div>
                                                <div class="i-cmt">
                                                    <div class="cmt-user">
                                                        <img src="<?= $uri?>/dist/images/user.png" alt="user">
                                                        <div class="info">
                                                            <strong>Trần Thảo Linh</strong>
                                                            <div class="more">
                                                                <strong>4.8 Rất tốt</strong><span>-</span>
                                                                <p>10/04/2023</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="short">
                                                        <p>Khu nghĩ dưỡng là nơi ấm cúng với những cảm xúc tuyệt vời, bãi biển đẹp với khu vệ sinh tốt. Điểm cộng lớn là giường thoải mái và phòng sạch sẽ. Nhưng điểm trừ là nhà hàng với bữa sáng không ngon</p>
                                                    </div>
                                                    <div class="img-review">
                                                        <ul>
                                                            <li><img src="<?= $uri?>/dist/images/room-1.png" alt="room"></li>
                                                            <li><img src="<?= $uri?>/dist/images/room-1.png" alt="room"></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <div class="i-cmt">
                                                    <div class="cmt-user">
                                                        <img src="<?= $uri?>/dist/images/user.png" alt="user">
                                                        <div class="info">
                                                            <strong>Trần Thảo Linh</strong>
                                                            <div class="more">
                                                                <strong>4.8 Rất tốt</strong><span>-</span>
                                                                <p>10/04/2023</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="short">
                                                        <p>Khu nghĩ dưỡng là nơi ấm cúng với những cảm xúc tuyệt vời, bãi biển đẹp với khu vệ sinh tốt. Điểm cộng lớn là giường thoải mái và phòng sạch sẽ. Nhưng điểm trừ là nhà hàng với bữa sáng không ngon</p>
                                                    </div>
                                                    <div class="img-review">
                                                        <ul>
                                                            <li><img src="<?= $uri?>/dist/images/room-1.png" alt="room"></li>
                                                            <li><img src="<?= $uri?>/dist/images/room-1.png" alt="room"></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                            <a href="#">Xem thêm<i class="far fa-angle-down"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-right">
                        <div class="form-right">
                            <div class="f-item">
                                <h3>Chọn ngày khởi hành</h3>
                                <div class="f-date">
                                    <input type="text" id="date10" value="" placeholder="Ngày khởi hành">
                                    <i class="fal fa-calendar-alt"></i>
                                </div>
                            </div>
                            <div class="f-item">
                                <h3>Ưu đãi</h3>
                                <div class="f-list">
                                    <ul>
                                        <li>Bảo hiểm</li>
                                        <li>Bữa ăn</li>
                                        <li>Hướng dẫn viên</li>
                                        <li>Xe đưa đón</li>
                                        <li>Khách sạn 4 sao</li>
                                        <li>Vé tham quan</li>
                                    </ul>
                                </div>
                            </div>
                            <div class="f-item">
                                <h3>Giá khách lẻ:</h3>
                                <strong id="price"><?= number_format($price, 0, '.', '.')?> đ/khách</strong>
                                <input type="hidden" id="hiddenPrice" name="price" value="<?= $price?>">
                            </div>
                            <div class="f-item">
                                <h3>Số người</h3>
                                <div class="item-quanlity">
                                    <ul>
                                        <li>
                                            <div class="left">
                                                <strong>Người Tham Gia</strong>
                                            </div>
                                            <div class="right">
                                                <div class="quanlity">
                                                    <button class="minus is-form"></button>
                                                    <input type="number" class="input-qty" name="adult" id="adult" min="1" max="100" value="1">
                                                    <button class="plus is-form"></button>
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <p> *Số lượng từ 10 khách trở lên. Liên hệ để có giá tốt nhất</p>
                            <div class="f-bnt">
                                <strong>Liên hệ ngay:</strong>
                                <button class="yellow">Gọi 0943 888 279</button>
                            </div>
                            <div class="f-bnt">
                                <button class="red" id="order_now">Đặt ngay</button>
                                <button class="blue" id="add_cart">Thêm vào giỏ</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="tour-relate">
        <div class="container">
            <div class="content">
                <div class="title">
                    <h2>Các tour liên quan</h2>
                </div>
                <div class="list-relate">
                    <div class="row">
                        <div class="col-md-4 h-col">
                            <div class="h-item">
                                <a href="#">
                                    <div class="img">
                                        <figure><img src="<?= $uri?>/dist/images/blog-1.png" alt="blog"></figure>
                                        <button class="follow"><i class="far fa-heart"></i></button>
                                    </div>
                                    <div class="desc">
                                        <h3>Sailing Club Signature Resort Phú Quốc</h3>
                                        <div class="rate">
                                            <div class="write"><strong>Đánh giá: 4.0 Rất tốt</strong><span>(1.27k đánh giá)</span></div>
                                        </div>
                                        <div class="tag">
                                            <ul>
                                                <li>Phú Quốc</li>
                                                <li>Giá tốt</li>
                                                <li>Gần biển</li>
                                                <li>Luxury</li>
                                            </ul>
                                        </div>
                                        <div class="price">
                                            <strong>3.650.000Đ</strong>
                                            <p>* Chấp nhận khách sau 24h</p>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="col-md-4 h-col">
                            <div class="h-item">
                                <a href="#">
                                    <div class="img">
                                        <figure><img src="<?= $uri?>/dist/images/blog-1.png" alt="blog"></figure>
                                        <button class="follow"><i class="far fa-heart"></i></button>
                                    </div>
                                    <div class="desc">
                                        <h3>Sailing Club Signature Resort Phú Quốc</h3>
                                        <div class="rate">
                                            <div class="write"><strong>Đánh giá: 4.0 Rất tốt</strong><span>(1.27k đánh giá)</span></div>
                                        </div>
                                        <div class="tag">
                                            <ul>
                                                <li>Phú Quốc</li>
                                                <li>Giá tốt</li>
                                                <li>Gần biển</li>
                                                <li>Luxury</li>
                                            </ul>
                                        </div>
                                        <div class="price">
                                            <strong>3.650.000Đ</strong>
                                            <p>* Chấp nhận khách sau 24h</p>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="col-md-4 h-col">
                            <div class="h-item">
                                <a href="#">
                                    <div class="img">
                                        <figure><img src="<?= $uri?>/dist/images/blog-1.png" alt="blog"></figure>
                                        <button class="follow"><i class="far fa-heart"></i></button>
                                    </div>
                                    <div class="desc">
                                        <h3>Sailing Club Signature Resort Phú Quốc</h3>
                                        <div class="rate">
                                            <div class="write"><strong>Đánh giá: 4.0 Rất tốt</strong><span>(1.27k đánh giá)</span></div>
                                        </div>
                                        <div class="tag">
                                            <ul>
                                                <li>Phú Quốc</li>
                                                <li>Giá tốt</li>
                                                <li>Gần biển</li>
                                                <li>Luxury</li>
                                            </ul>
                                        </div>
                                        <div class="price">
                                            <strong>3.650.000Đ</strong>
                                            <p>* Chấp nhận khách sau 24h</p>
                                        </div>
                                    </div>
                                </a>
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

    jQuery(document).ready(function () {
        jQuery(function () {
            jQuery("#date10").datepicker({
                minDate: new Date(),
                maxDate: new Date('2050-2-12')
            });
        });
    });

    jQuery(document).ready(function($) {

        $('.main-accor .item-accor:eq(0) .acc-title').addClass('active').next().slideDown();
        $('.item-accor .acc-title').click(function(j) {
            var dropDown = $(this).closest('.item-accor').find('.acc-content');

            $(this).closest('.item-accor').find('.acc-content').not(dropDown).slideUp();

            if ($(this).hasClass('active')) {
                $(this).removeClass('active');
            } else {
                $(this).closest('.item-accor').find('.acc-title.active').removeClass('active');
                $(this).addClass('active');
            }
            dropDown.stop(false, true).slideToggle();
            j.preventDefault();
        });

        $(".poli-item").hide();
        $(".policy-title ul li:first").addClass("act");
        $(".poli-item:first").show();
        $(".policy-title ul li").click(function() {
            $(".poli-item").hide();
            var activeTab = $(this).attr("rel");
            $("#" + activeTab).fadeIn();

            $(".policy-title ul li").removeClass("act");
            $(this).addClass("act");
        });

        $('input#adult').each(function() {
            var $this = $(this),
                qty = $this.parent().find('.is-form'),
                min = Number($this.attr('min')),
                max = Number($this.attr('max'))
            if (min == 0) {
                var d = 0
            } else d = min
            $('.is-form').on('click', function() {
                if ($(this).hasClass('minus')) {
                    if (d > min) d += -1
                } else if ($(this).hasClass('plus')) {
                    var x = Number($this.val()) + 1
                    if (x <= max) d += 1
                }
                $this.attr('value', d).val(d)
            });
        });
    });

    $(document).ready(function () {
        const quantityInput = $('#qty');
        const minusButton = $('.minus');
        const plusButton = $('.plus');
        const priceElement = $('#price');
        var hiddenPriceInput = $('#hiddenPrice');
        var price = <?= $price?>

        minusButton.click(function () {
            // Giảm giá trị đi 1 nếu không dưới giá trị tối thiểu
            if (quantityInput.val() > 0) {
                quantityInput.val(parseInt(quantityInput.val()) - 1);
                updateTotalPrice();
            }
        });

        plusButton.click(function () {
            // Tăng giá trị lên 1 nếu không vượt quá giá trị tối đa
            if (quantityInput.val() < 100) {
                quantityInput.val(parseInt(quantityInput.val()) + 1);
                updateTotalPrice();
            }
        });

        function updateTotalPrice() {
            const quantity = parseInt(quantityInput.val());
            const totalPrice = price * quantity;
            priceElement.text(totalPrice + ' đ/khách');
            hiddenPriceInput.val(totalPrice);
        }
    });
</script>
<script>
    jQuery(document).ready(function() {
        $('#order_now').on('click', function (){
            var id_tour = <?= $obj->ID ?>;
            var date = $('#date10').val();
            var adult = $('#adult').val();
            setTimeout(function () {
                window.location.href = '<?= get_permalink(getIdPage('paymentpage')) ?>?id_tour='+ id_tour +'&&date='+date+'&&adult='+adult ;
            }, 500);
        })
    });
</script>
