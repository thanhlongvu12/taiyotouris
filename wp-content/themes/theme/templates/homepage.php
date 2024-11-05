<?php
/**
 * Created by PhpStorm.
 * User: truongnt
 * Date: 27/04/2020
 * Time: 6:05 PM
 */
/* Template Name:  Trang chủ */
$uri = get_template_directory_uri();
$obj = get_queried_object();
$currentLogin = getLogin();


get_header();
?>
<style>
.tab-tour .tab-wrapper .title-tab ul li.active {
    background-image: url('<?= $uri?>/dist/images/bg-button.svg');
    color: var(--cl-blue);
}
.tab-tour .tab-wrapper .title-tab ul li {
    background-image: url('<?= $uri?>/dist/images/bg-active.svg');
    color: white;
}
.active {
    background: var(--cl-red) !important;
}
</style>
<main id="homepage" class="homepage">
    <section class="main-slide">
        <div class="swiper slide-homepage mainslideSwiper">
            <div class="swiper-wrapper">
                <div class="swiper-slide">
                    <div class="s-item">
                        <figure><img src="<?= $uri?>/dist/images/bg-main.png" alt="slide"></figure>
                        <div class="text">
                            <h2>CHUỖI HỆ THỐNG<br>KHÁCH SẠN</h2>
                            <p>loremLorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. </p>
                            <button>Explore<i class="fal fa-arrow-right"></i></button>
                        </div>
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="s-item">
                        <figure><img src="<?= $uri?>/dist/images/bg-main.png" alt="slide"></figure>
                        <div class="text">
                            <h2>CHUỖI HỆ THỐNG<br>KHÁCH SẠN</h2>
                            <p>loremLorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. </p>
                            <button>Explore<i class="fal fa-arrow-right"></i></button>
                        </div>
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="s-item">
                        <figure><img src="<?= $uri?>/dist/images/bg-main.png" alt="slide"></figure>
                        <div class="text">
                            <h2>CHUỖI HỆ THỐNG<br>KHÁCH SẠN</h2>
                            <p>loremLorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. </p>
                            <button>Explore<i class="fal fa-arrow-right"></i></button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="swiper-pagination"></div>
        </div>
    </section>
    <section class="tab-tour">
        <div class="container">
            <div class="tab-wrapper">
                <div class="title-tab">
                    <ul>
                        <li rel="tab1">Tour du lịch</li>
                        <li rel="tab2">Khách sạn</li>
                    </ul>
                </div>
                <div class="tab-content">
                    <div id="tab1" class="content-tab">
                        <div class="item-content">
                            <div class="col-item">
                                <span>Bạn muốn đi</span>
                                <select name="city" id="city">
                                    <option value="1">Thành phố, điểm đến</option>
                                    <option value="1">Hà Nội</option>
                                    <option value="1">Đà Nẵng</option>
                                    <option value="1">Lâm Đồng</option>
                                    <option value="1">Tuyên Quang</option>
                                </select>
                            </div>
                            <div class="col-item">
                                <span>Khởi hành từ</span>
                                <select name="city2" id="city2">
                                    <option value="1">Tỉnh / Thành phố</option>
                                    <option value="1">Hà Nội</option>
                                    <option value="1">Đà Nẵng</option>
                                    <option value="1">Lâm Đồng</option>
                                    <option value="1">Tuyên Quang</option>
                                </select>
                            </div>
                            <div class="col-item">
                                <span>Ngày khởi hành</span>
                                <div class="date"><input id="date1" type="text" placeholder="Chọn ngày khởi hành"><i class="fas fa-calendar-check"></i></div>
                            </div>
                            <button id="search_tour"><img src="<?= $uri?>/dist/images/search.svg" alt="search">Tìm kiếm</button>
                        </div>
                    </div>
                    <div id="tab2" class="content-tab">
                        <div class="item-content">
                            <div class="col-item">
                                <span>Bạn muốn đi</span>
                                <select name="city" id="city">
                                    <option value="1">Thành phố, điểm đến</option>
                                    <option value="1">Hà Nội</option>
                                    <option value="1">Đà Nẵng</option>
                                    <option value="1">Lâm Đồng</option>
                                    <option value="1">Tuyên Quang</option>
                                </select>
                            </div>
                            <div class="col-item">
                                <span>Khởi hành từ</span>
                                <select name="city2" id="city2">
                                    <option value="1">Tỉnh / Thành phố</option>
                                    <option value="1">Hà Nội</option>
                                    <option value="1">Đà Nẵng</option>
                                    <option value="1">Lâm Đồng</option>
                                    <option value="1">Tuyên Quang</option>
                                </select>
                            </div>
                            <div class="col-item">
                                <span>Ngày khởi hành</span>
                                <div class="date"><input type="text" id="date2" placeholder="Chọn ngày khởi hành"><i class="fas fa-calendar-check"></i></div>
                            </div>
                            <button id="search_hotel"><img src="<?= $uri?>/dist/images/search.svg" alt="search">Tìm kiếm</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="bg-section-1" style="background-image: url('<?= $uri?>/dist/images/bg-1.png')">
        <div class="container">
            <div class="big-item">
                <div class="title">
                    <h2>Tour du lịch nổi bật</h2>
                    <p>Tổng hợp những tour du lịch hot nhất hiện nay với mức giá hấp dẫn, khởi hành liên tục, ưu đãi ngập tràn dành cho các "tín đồ xê dịch" tha hồ lựa chọn</p>
                </div>
                <div class="row">
                    <?php
                    $tours = get_field('prominent_tour', $obj->ID);
                    foreach ($tours as $tour){
                        if($currentLogin){
                            $checkFavorite = $wpdb->get_row("SELECT * FROM user_favorite where product_id = {$tour->ID} AND user_id = {$currentLogin->id}");
                        }
                        $soTien = get_field('price', $tour->ID);
                        $soTienDaChuyen = number_format($soTien, 0, '.', '.');
                        ?>
                        <div class="col-md-4">
                            <div class="item">
                                <a href="<?= get_permalink($tour->ID) ?>">
                                    <div class="img">
                                        <figure><img src="<?= get_the_post_thumbnail($tour->ID); ?>" alt="banner"></figure>
                                        <div class="follow follow_check_<?= $tour->ID ?> <?= (!empty($checkFavorite)) ? 'active' : '' ?>" data-id="<?= $tour->ID ?>"><i class="fal fa-heart"></i></div>
                                    </div>
                                    <div class="desc">
                                        <h3><?= $tour->post_title; ?></h3>
                                        <div class="rate"><strong>4.8 Rất tốt</strong><span>(1.27k đánh giá)</span></div>
                                        <span class="price"><?= $soTienDaChuyen?>Đ</span>
                                        <p>Chấp nhận khách sau 24h</p>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <?php
                    }
                    ?>
                </div>
            </div>
            <div class="big-item">
                <div class="title">
                    <h2>Ưu đãi mới nhất</h2>
                </div>
                <div class="sale-content">
                    <div class="swiper sale-homepage saleSwiper">
                        <div class="swiper-wrapper">
                            <div class="swiper-slide">
                                <div class="s-item">
                                    <figure><img src="<?= $uri?>/dist/images/sale.png" alt="slide"></figure>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="s-item">
                                    <figure><img src="<?= $uri?>/dist/images/sale-2.png" alt="slide"></figure>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="s-item">
                                    <figure><img src="<?= $uri?>/dist/images/sale-3.png" alt="slide"></figure>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="s-item">
                                    <figure><img src="<?= $uri?>/dist/images/sale-4.png" alt="slide"></figure>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="s-item">
                                    <figure><img src="<?= $uri?>/dist/images/sale-2.png" alt="slide"></figure>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="s-item">
                                    <figure><img src="<?= $uri?>/dist/images/sale-3.png" alt="slide"></figure>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-button-prev swiper-button-prev-1"><i class="fal fa-chevron-left"></i></div>
                    <div class="swiper-button-next swiper-button-next-1"><i class="fal fa-chevron-right"></i></div>
                </div>
            </div>
            <div class="big-item">
                <div class="title">
                    <h2>Chuyến bay giá tốt</h2>
                    <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincunt ut laoreet dolore magna aliquam </p>
                </div>
                <div class="fly-content">
                    <div class="swiper ticket-homepage ticketSwiper">
                        <div class="swiper-wrapper">
                            <div class="swiper-slide">
                                <div class="i-ticket">
                                    <div class="airlines">
                                        <ul>
                                            <li><img src="<?= $uri?>/dist/images/air-1.svg" alt="air"></li>
                                            <li><img src="<?= $uri?>/dist/images/air-2.svg" alt="air"></li>
                                        </ul>
                                    </div>
                                    <div class="name-ticket">
                                        <h3>Tân Sơn Nhất</h3><img src="<?= $uri?>/dist/images/veer.svg" alt="veer">
                                        <h3>Nội Bài</h3>
                                    </div>
                                    <div class="ticket-info">
                                        <ul>
                                            <li><i class="fas fa-plane"></i><span>Khởi hành: 03/04/2023</span></li>
                                            <li><i class="fas fa-plane"></i><span>Khứ hồi: 05/04/2023</span></li>
                                        </ul>
                                    </div>
                                    <div class="price"><strong>3.650.000Đ</strong></div>
                                    <div class="ticket-bottom">
                                        <div class="label"><img src="<?= $uri?>/dist/images/taiyo.svg" alt="taiyo"></div>
                                        <span>Giá sau thuế: 4.112.000Đ</span>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="i-ticket">
                                    <div class="airlines">
                                        <ul>
                                            <li><img src="<?= $uri?>/dist/images/air-1.svg" alt="air"></li>
                                            <li><img src="<?= $uri?>/dist/images/air-2.svg" alt="air"></li>
                                        </ul>
                                    </div>
                                    <div class="name-ticket">
                                        <h3>Tân Sơn Nhất</h3><img src="<?= $uri?>/dist/images/veer.svg" alt="veer">
                                        <h3>Nội Bài</h3>
                                    </div>
                                    <div class="ticket-info">
                                        <ul>
                                            <li><i class="fas fa-plane"></i><span>Khởi hành: 03/04/2023</span></li>
                                            <li><i class="fas fa-plane"></i><span>Khứ hồi: 05/04/2023</span></li>
                                        </ul>
                                    </div>
                                    <div class="price"><strong>3.650.000Đ</strong></div>
                                    <div class="ticket-bottom">
                                        <div class="label"><img src="<?= $uri?>/dist/images/taiyo.svg" alt="taiyo"></div>
                                        <span>Giá sau thuế: 4.112.000Đ</span>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="i-ticket">
                                    <div class="airlines">
                                        <ul>
                                            <li><img src="<?= $uri?>/dist/images/air-1.svg" alt="air"></li>
                                            <li><img src="<?= $uri?>/dist/images/air-2.svg" alt="air"></li>
                                        </ul>
                                    </div>
                                    <div class="name-ticket">
                                        <h3>Tân Sơn Nhất</h3><img src="<?= $uri?>/dist/images/veer.svg" alt="veer">
                                        <h3>Nội Bài</h3>
                                    </div>
                                    <div class="ticket-info">
                                        <ul>
                                            <li><i class="fas fa-plane"></i><span>Khởi hành: 03/04/2023</span></li>
                                            <li><i class="fas fa-plane"></i><span>Khứ hồi: 05/04/2023</span></li>
                                        </ul>
                                    </div>
                                    <div class="price"><strong>3.650.000Đ</strong></div>
                                    <div class="ticket-bottom">
                                        <div class="label"><img src="<?= $uri?>/dist/images/taiyo.svg" alt="taiyo"></div>
                                        <span>Giá sau thuế: 4.112.000Đ</span>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="i-ticket">
                                    <div class="airlines">
                                        <ul>
                                            <li><img src="<?= $uri?>/dist/images/air-1.svg" alt="air"></li>
                                            <li><img src="<?= $uri?>/dist/images/air-2.svg" alt="air"></li>
                                        </ul>
                                    </div>
                                    <div class="name-ticket">
                                        <h3>Tân Sơn Nhất</h3><img src="<?= $uri?>/dist/images/veer.svg" alt="veer">
                                        <h3>Nội Bài</h3>
                                    </div>
                                    <div class="ticket-info">
                                        <ul>
                                            <li><i class="fas fa-plane"></i><span>Khởi hành: 03/04/2023</span></li>
                                            <li><i class="fas fa-plane"></i><span>Khứ hồi: 05/04/2023</span></li>
                                        </ul>
                                    </div>
                                    <div class="price"><strong>3.650.000Đ</strong></div>
                                    <div class="ticket-bottom">
                                        <div class="label"><img src="<?= $uri?>/dist/images/taiyo.svg" alt="taiyo"></div>
                                        <span>Giá sau thuế: 4.112.000Đ</span>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="i-ticket">
                                    <div class="airlines">
                                        <ul>
                                            <li><img src="<?= $uri?>/dist/images/air-1.svg" alt="air"></li>
                                            <li><img src="<?= $uri?>/dist/images/air-2.svg" alt="air"></li>
                                        </ul>
                                    </div>
                                    <div class="name-ticket">
                                        <h3>Tân Sơn Nhất</h3><img src="<?= $uri?>/dist/images/veer.svg" alt="veer">
                                        <h3>Nội Bài</h3>
                                    </div>
                                    <div class="ticket-info">
                                        <ul>
                                            <li><i class="fas fa-plane"></i><span>Khởi hành: 03/04/2023</span></li>
                                            <li><i class="fas fa-plane"></i><span>Khứ hồi: 05/04/2023</span></li>
                                        </ul>
                                    </div>
                                    <div class="price"><strong>3.650.000Đ</strong></div>
                                    <div class="ticket-bottom">
                                        <div class="label"><img src="<?= $uri?>/dist/images/taiyo.svg" alt="taiyo"></div>
                                        <span>Giá sau thuế: 4.112.000Đ</span>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="i-ticket">
                                    <div class="airlines">
                                        <ul>
                                            <li><img src="<?= $uri?>/dist/images/air-1.svg" alt="air"></li>
                                            <li><img src="<?= $uri?>/dist/images/air-2.svg" alt="air"></li>
                                        </ul>
                                    </div>
                                    <div class="name-ticket">
                                        <h3>Tân Sơn Nhất</h3><img src="<?= $uri?>/dist/images/veer.svg" alt="veer">
                                        <h3>Nội Bài</h3>
                                    </div>
                                    <div class="ticket-info">
                                        <ul>
                                            <li><i class="fas fa-plane"></i><span>Khởi hành: 03/04/2023</span></li>
                                            <li><i class="fas fa-plane"></i><span>Khứ hồi: 05/04/2023</span></li>
                                        </ul>
                                    </div>
                                    <div class="price"><strong>3.650.000Đ</strong></div>
                                    <div class="ticket-bottom">
                                        <div class="label"><img src="<?= $uri?>/dist/images/taiyo.svg" alt="taiyo"></div>
                                        <span>Giá sau thuế: 4.112.000Đ</span>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="i-ticket">
                                    <div class="airlines">
                                        <ul>
                                            <li><img src="<?= $uri?>/dist/images/air-1.svg" alt="air"></li>
                                            <li><img src="<?= $uri?>/dist/images/air-2.svg" alt="air"></li>
                                        </ul>
                                    </div>
                                    <div class="name-ticket">
                                        <h3>Tân Sơn Nhất</h3><img src="<?= $uri?>/dist/images/veer.svg" alt="veer">
                                        <h3>Nội Bài</h3>
                                    </div>
                                    <div class="ticket-info">
                                        <ul>
                                            <li><i class="fas fa-plane"></i><span>Khởi hành: 03/04/2023</span></li>
                                            <li><i class="fas fa-plane"></i><span>Khứ hồi: 05/04/2023</span></li>
                                        </ul>
                                    </div>
                                    <div class="price"><strong>3.650.000Đ</strong></div>
                                    <div class="ticket-bottom">
                                        <div class="label"><img src="<?= $uri?>/dist/images/taiyo.svg" alt="taiyo"></div>
                                        <span>Giá sau thuế: 4.112.000Đ</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-button-prev swiper-button-prev-2"><i class="fal fa-chevron-left"></i></div>
                    <div class="swiper-button-next swiper-button-next-2"><i class="fal fa-chevron-right"></i></div>
                </div>
            </div>
        </div>
    </section>
    <section class="home-combo" style="background-image: url('<?= $uri?>/dist/images/bg-2.png')">
        <div class="container">
            <div class="title">
                <h2>Combo</h2>
                <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincunt ut laoreet dolore magna aliquam </p>
                <button>Explore<i class="far fa-arrow-right"></i></button>
            </div>
            <div class="absol-content">
                <div class="row" style="justify-content: center;">
                    <div class="col-md-4 f-combo">
                        <div class="item">
                            <a href="#">
                                <div class="img">
                                    <figure><img src="<?= $uri?>/dist/images/n-1.png" alt="banner"></figure>
                                    <div class="follow"><i class="fal fa-heart"></i></div>
                                </div>
                                <div class="desc">
                                    <h3>Combo vé máy bay Hải Phòng - Nha Trang Khách sạn 4 sao 3N2D</h3>
                                    <div class="rate"><strong>4.8 Rất tốt</strong><span>(1.27k đánh giá)</span></div>
                                    <div class="tag">
                                        <ul>
                                            <li>Phú Quốc</li>
                                            <li>Giá tốt</li>
                                            <li>Gần biển</li>
                                            <li>Luxury</li>
                                        </ul>
                                    </div>
                                    <span class="price">2.220.000Đ</span>
                                    <p>Đặt cọc không hoàn tiền nếu hủy vé 2 ngày trước khi khởi hành</p>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-md-4 f-combo">
                        <div class="item">
                            <a href="#">
                                <div class="img">
                                    <figure><img src="<?= $uri?>/dist/images/n-1.png" alt="banner"></figure>
                                    <div class="follow"><i class="fal fa-heart"></i></div>
                                </div>
                                <div class="desc">
                                    <h3>Combo vé máy bay Hải Phòng - Nha Trang Khách sạn 4 sao 3N2D</h3>
                                    <div class="rate"><strong>4.8 Rất tốt</strong><span>(1.27k đánh giá)</span></div>
                                    <div class="tag">
                                        <ul>
                                            <li>Phú Quốc</li>
                                            <li>Giá tốt</li>
                                            <li>Gần biển</li>
                                            <li>Luxury</li>
                                        </ul>
                                    </div>
                                    <span class="price">2.220.000Đ</span>
                                    <p>Đặt cọc không hoàn tiền nếu hủy vé 2 ngày trước khi khởi hành</p>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-md-4 f-combo">
                        <div class="item">
                            <a href="#">
                                <div class="img">
                                    <figure><img src="<?= $uri?>/dist/images/n-1.png" alt="banner"></figure>
                                    <div class="follow"><i class="fal fa-heart"></i></div>
                                </div>
                                <div class="desc">
                                    <h3>Combo vé máy bay Hải Phòng - Nha Trang Khách sạn 4 sao 3N2D</h3>
                                    <div class="rate"><strong>4.8 Rất tốt</strong><span>(1.27k đánh giá)</span></div>
                                    <div class="tag">
                                        <ul>
                                            <li>Phú Quốc</li>
                                            <li>Giá tốt</li>
                                            <li>Gần biển</li>
                                            <li>Luxury</li>
                                        </ul>
                                    </div>
                                    <span class="price">2.220.000Đ</span>
                                    <p>Đặt cọc không hoàn tiền nếu hủy vé 2 ngày trước khi khởi hành</p>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-md-4 f-combo">
                        <div class="item">
                            <a href="#">
                                <div class="img">
                                    <figure><img src="<?= $uri?>/dist/images/n-1.png" alt="banner"></figure>
                                    <div class="follow"><i class="fal fa-heart"></i></div>
                                </div>
                                <div class="desc">
                                    <h3>Combo vé máy bay Hải Phòng - Nha Trang Khách sạn 4 sao 3N2D</h3>
                                    <div class="rate"><strong>4.8 Rất tốt</strong><span>(1.27k đánh giá)</span></div>
                                    <div class="tag">
                                        <ul>
                                            <li>Phú Quốc</li>
                                            <li>Giá tốt</li>
                                            <li>Gần biển</li>
                                            <li>Luxury</li>
                                        </ul>
                                    </div>
                                    <span class="price">2.220.000Đ</span>
                                    <p>Đặt cọc không hoàn tiền nếu hủy vé 2 ngày trước khi khởi hành</p>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="hotel-list">
        <div class="container">
            <div class="list-hotel-slide">
                <div class="title">
                    <h2>Khách sạn</h2>
                </div>
                <div class="tab-hotel">
                    <div class="title-tab-1">
                        <ul>
                            <li rel="tab1">Đà Nẵng</li>
                            <li rel="tab2">Hạ Long</li>
                            <li rel="tab3">Phú Quốc</li>
                            <li rel="tab4">Nha Trang</li>
                            <li rel="tab5">Bà Rịa - Vũng Tàu</li>
                            <li rel="tab6">Sa Pa</li>
                            <li rel="tab7">Hội An</li>
                            <li rel="tab8">Hồ Chí Minh</li>
                        </ul>
                    </div>
                    <div class="tab-content-1">
                        <div id="tab1" class="content-tab-1">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="h-col">
                                        <div class="h-item">
                                            <a href="#">
                                                <div class="img">
                                                    <figure><img src="<?= $uri?>/dist/images/blog-1.png" alt="blog"></figure>
                                                    <button class="follow"><i class="far fa-heart"></i></button>
                                                </div>
                                                <div class="desc">
                                                    <h3>Sailing Club Signature Resort Phú Quốc</h3>
                                                    <div class="rate">
                                                        <div class="star">
                                                            <i class="fas fa-star"></i>
                                                            <i class="fas fa-star"></i>
                                                            <i class="fas fa-star"></i>
                                                            <i class="fas fa-star"></i>
                                                            <i class="fas fa-star"></i>
                                                        </div>
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
                                <div class="col-md-4">
                                    <div class="h-col">
                                        <div class="h-item">
                                            <a href="#">
                                                <div class="img">
                                                    <figure><img src="<?= $uri?>/dist/images/blog-1.png" alt="blog"></figure>
                                                    <button class="follow"><i class="far fa-heart"></i></button>
                                                </div>
                                                <div class="desc">
                                                    <h3>Sailing Club Signature Resort Phú Quốc</h3>
                                                    <div class="rate">
                                                        <div class="star">
                                                            <i class="fas fa-star"></i>
                                                            <i class="fas fa-star"></i>
                                                            <i class="fas fa-star"></i>
                                                            <i class="fas fa-star"></i>
                                                            <i class="fas fa-star"></i>
                                                        </div>
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
                                <div class="col-md-4">
                                    <div class="h-col">
                                        <div class="h-item">
                                            <a href="#">
                                                <div class="img">
                                                    <figure><img src="<?= $uri?>/dist/images/blog-1.png" alt="blog"></figure>
                                                    <button class="follow"><i class="far fa-heart"></i></button>
                                                </div>
                                                <div class="desc">
                                                    <h3>Sailing Club Signature Resort Phú Quốc</h3>
                                                    <div class="rate">
                                                        <div class="star">
                                                            <i class="fas fa-star"></i>
                                                            <i class="fas fa-star"></i>
                                                            <i class="fas fa-star"></i>
                                                            <i class="fas fa-star"></i>
                                                            <i class="fas fa-star"></i>
                                                        </div>
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
                        <div id="tab2" class="content-tab-1">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="h-col">
                                        <div class="h-item">
                                            <a href="#">
                                                <div class="img">
                                                    <figure><img src="<?= $uri?>/dist/images/blog-1.png" alt="blog"></figure>
                                                    <button class="follow"><i class="far fa-heart"></i></button>
                                                </div>
                                                <div class="desc">
                                                    <h3>Sailing Club Signature Resort Phú Quốc</h3>
                                                    <div class="rate">
                                                        <div class="star">
                                                            <i class="fas fa-star"></i>
                                                            <i class="fas fa-star"></i>
                                                            <i class="fas fa-star"></i>
                                                            <i class="fas fa-star"></i>
                                                            <i class="fas fa-star"></i>
                                                        </div>
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
                                <div class="col-md-4">
                                    <div class="h-col">
                                        <div class="h-item">
                                            <a href="#">
                                                <div class="img">
                                                    <figure><img src="<?= $uri?>/dist/images/blog-1.png" alt="blog"></figure>
                                                    <button class="follow"><i class="far fa-heart"></i></button>
                                                </div>
                                                <div class="desc">
                                                    <h3>Sailing Club Signature Resort Phú Quốc</h3>
                                                    <div class="rate">
                                                        <div class="star">
                                                            <i class="fas fa-star"></i>
                                                            <i class="fas fa-star"></i>
                                                            <i class="fas fa-star"></i>
                                                            <i class="fas fa-star"></i>
                                                            <i class="fas fa-star"></i>
                                                        </div>
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
                                <div class="col-md-4">
                                    <div class="h-col">
                                        <div class="h-item">
                                            <a href="#">
                                                <div class="img">
                                                    <figure><img src="<?= $uri?>/dist/images/blog-1.png" alt="blog"></figure>
                                                    <button class="follow"><i class="far fa-heart"></i></button>
                                                </div>
                                                <div class="desc">
                                                    <h3>Sailing Club Signature Resort Phú Quốc</h3>
                                                    <div class="rate">
                                                        <div class="star">
                                                            <i class="fas fa-star"></i>
                                                            <i class="fas fa-star"></i>
                                                            <i class="fas fa-star"></i>
                                                            <i class="fas fa-star"></i>
                                                            <i class="fas fa-star"></i>
                                                        </div>
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
                        <div id="tab3" class="content-tab-1">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="h-col">
                                        <div class="h-item">
                                            <a href="#">
                                                <div class="img">
                                                    <figure><img src="<?= $uri?>/dist/images/blog-1.png" alt="blog"></figure>
                                                    <button class="follow"><i class="far fa-heart"></i></button>
                                                </div>
                                                <div class="desc">
                                                    <h3>Sailing Club Signature Resort Phú Quốc</h3>
                                                    <div class="rate">
                                                        <div class="star">
                                                            <i class="fas fa-star"></i>
                                                            <i class="fas fa-star"></i>
                                                            <i class="fas fa-star"></i>
                                                            <i class="fas fa-star"></i>
                                                            <i class="fas fa-star"></i>
                                                        </div>
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
                                <div class="col-md-4">
                                    <div class="h-col">
                                        <div class="h-item">
                                            <a href="#">
                                                <div class="img">
                                                    <figure><img src="<?= $uri?>/dist/images/blog-1.png" alt="blog"></figure>
                                                    <button class="follow"><i class="far fa-heart"></i></button>
                                                </div>
                                                <div class="desc">
                                                    <h3>Sailing Club Signature Resort Phú Quốc</h3>
                                                    <div class="rate">
                                                        <div class="star">
                                                            <i class="fas fa-star"></i>
                                                            <i class="fas fa-star"></i>
                                                            <i class="fas fa-star"></i>
                                                            <i class="fas fa-star"></i>
                                                            <i class="fas fa-star"></i>
                                                        </div>
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
                                <div class="col-md-4">
                                    <div class="h-col">
                                        <div class="h-item">
                                            <a href="#">
                                                <div class="img">
                                                    <figure><img src="<?= $uri?>/dist/images/blog-1.png" alt="blog"></figure>
                                                    <button class="follow"><i class="far fa-heart"></i></button>
                                                </div>
                                                <div class="desc">
                                                    <h3>Sailing Club Signature Resort Phú Quốc</h3>
                                                    <div class="rate">
                                                        <div class="star">
                                                            <i class="fas fa-star"></i>
                                                            <i class="fas fa-star"></i>
                                                            <i class="fas fa-star"></i>
                                                            <i class="fas fa-star"></i>
                                                            <i class="fas fa-star"></i>
                                                        </div>
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
                        <div id="tab4" class="content-tab-1">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="h-col">
                                        <div class="h-item">
                                            <a href="#">
                                                <div class="img">
                                                    <figure><img src="<?= $uri?>/dist/images/blog-1.png" alt="blog"></figure>
                                                    <button class="follow"><i class="far fa-heart"></i></button>
                                                </div>
                                                <div class="desc">
                                                    <h3>Sailing Club Signature Resort Phú Quốc</h3>
                                                    <div class="rate">
                                                        <div class="star">
                                                            <i class="fas fa-star"></i>
                                                            <i class="fas fa-star"></i>
                                                            <i class="fas fa-star"></i>
                                                            <i class="fas fa-star"></i>
                                                            <i class="fas fa-star"></i>
                                                        </div>
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
                                <div class="col-md-4">
                                    <div class="h-col">
                                        <div class="h-item">
                                            <a href="#">
                                                <div class="img">
                                                    <figure><img src="<?= $uri?>/dist/images/blog-1.png" alt="blog"></figure>
                                                    <button class="follow"><i class="far fa-heart"></i></button>
                                                </div>
                                                <div class="desc">
                                                    <h3>Sailing Club Signature Resort Phú Quốc</h3>
                                                    <div class="rate">
                                                        <div class="star">
                                                            <i class="fas fa-star"></i>
                                                            <i class="fas fa-star"></i>
                                                            <i class="fas fa-star"></i>
                                                            <i class="fas fa-star"></i>
                                                            <i class="fas fa-star"></i>
                                                        </div>
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
                                <div class="col-md-4">
                                    <div class="h-col">
                                        <div class="h-item">
                                            <a href="#">
                                                <div class="img">
                                                    <figure><img src="<?= $uri?>/dist/images/blog-1.png" alt="blog"></figure>
                                                    <button class="follow"><i class="far fa-heart"></i></button>
                                                </div>
                                                <div class="desc">
                                                    <h3>Sailing Club Signature Resort Phú Quốc</h3>
                                                    <div class="rate">
                                                        <div class="star">
                                                            <i class="fas fa-star"></i>
                                                            <i class="fas fa-star"></i>
                                                            <i class="fas fa-star"></i>
                                                            <i class="fas fa-star"></i>
                                                            <i class="fas fa-star"></i>
                                                        </div>
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
                        <div id="tab5" class="content-tab-1">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="h-col">
                                        <div class="h-item">
                                            <a href="#">
                                                <div class="img">
                                                    <figure><img src="<?= $uri?>/dist/images/blog-1.png" alt="blog"></figure>
                                                    <button class="follow"><i class="far fa-heart"></i></button>
                                                </div>
                                                <div class="desc">
                                                    <h3>Sailing Club Signature Resort Phú Quốc</h3>
                                                    <div class="rate">
                                                        <div class="star">
                                                            <i class="fas fa-star"></i>
                                                            <i class="fas fa-star"></i>
                                                            <i class="fas fa-star"></i>
                                                            <i class="fas fa-star"></i>
                                                            <i class="fas fa-star"></i>
                                                        </div>
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
                                <div class="col-md-4">
                                    <div class="h-col">
                                        <div class="h-item">
                                            <a href="#">
                                                <div class="img">
                                                    <figure><img src="<?= $uri?>/dist/images/blog-1.png" alt="blog"></figure>
                                                    <button class="follow"><i class="far fa-heart"></i></button>
                                                </div>
                                                <div class="desc">
                                                    <h3>Sailing Club Signature Resort Phú Quốc</h3>
                                                    <div class="rate">
                                                        <div class="star">
                                                            <i class="fas fa-star"></i>
                                                            <i class="fas fa-star"></i>
                                                            <i class="fas fa-star"></i>
                                                            <i class="fas fa-star"></i>
                                                            <i class="fas fa-star"></i>
                                                        </div>
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
                                <div class="col-md-4">
                                    <div class="h-col">
                                        <div class="h-item">
                                            <a href="#">
                                                <div class="img">
                                                    <figure><img src="<?= $uri?>/dist/images/blog-1.png" alt="blog"></figure>
                                                    <button class="follow"><i class="far fa-heart"></i></button>
                                                </div>
                                                <div class="desc">
                                                    <h3>Sailing Club Signature Resort Phú Quốc</h3>
                                                    <div class="rate">
                                                        <div class="star">
                                                            <i class="fas fa-star"></i>
                                                            <i class="fas fa-star"></i>
                                                            <i class="fas fa-star"></i>
                                                            <i class="fas fa-star"></i>
                                                            <i class="fas fa-star"></i>
                                                        </div>
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
                </div>
            </div>
            <div class="banner">
                <div class="banner-wrapper">
                    <div class="b-img">
                        <figure><img src="<?= $uri?>/dist/images/banner.png" alt="banner"></figure>
                    </div>
                    <div class="text">
                        <h2>Dịch vụ xe du lịch</h2>
                        <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincunt ut laoreet dolore magna aliquam </p>
                        <button>Explore<i class="fal fa-arrow-right"></i></button>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="testimonial" style="background-image: url('<?= $uri?>/dist/images/wase.png')">
        <div class="container">
            <div class="title">
                <h2>Cảm nhận của khách hàng</h2>
            </div>
            <div class="list-testimonial">
                <div class="swiper slide-testimonial testimonialSwiper">
                    <div class="swiper-wrapper">
                        <div class="swiper-slide">
                            <div class="t-item">
                                <div class="t-img">
                                    <div class="avatar">
                                        <figure><img src="<?= $uri?>/dist/images/user.png" alt="user"></figure>
                                    </div>
                                    <div class="info">
                                        <div class="name"><strong>- Trần Thảo Linh</strong><img src="<?= $uri?>/dist/images/plane.svg" alt="plane"></div>
                                        <p>Khách du lịch</p>
                                    </div>
                                </div>
                                <div class="desc">
                                    <p>“Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincunt ut laoreet dolore magna aliquamlorem Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincunt ut laoreet dolore magna aliquam Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincunt ut laoreet dolore magna aliquamlorem Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod”</p>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="t-item">
                                <div class="t-img">
                                    <div class="avatar">
                                        <figure><img src="<?= $uri?>/dist/images/user.png" alt="user"></figure>
                                    </div>
                                    <div class="info">
                                        <div class="name"><strong>- Trần Thảo Linh</strong><img src="<?= $uri?>/dist/images/plane.svg" alt="plane"></div>
                                        <p>Khách du lịch</p>
                                    </div>
                                </div>
                                <div class="desc">
                                    <p>“Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincunt ut laoreet dolore magna aliquamlorem Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincunt ut laoreet dolore magna aliquam Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincunt ut laoreet dolore magna aliquamlorem Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod”</p>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="t-item">
                                <div class="t-img">
                                    <div class="avatar">
                                        <figure><img src="<?= $uri?>/dist/images/user.png" alt="user"></figure>
                                    </div>
                                    <div class="info">
                                        <div class="name"><strong>- Trần Thảo Linh</strong><img src="<?= $uri?>/dist/images/plane.svg" alt="plane"></div>
                                        <p>Khách du lịch</p>
                                    </div>
                                </div>
                                <div class="desc">
                                    <p>“Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincunt ut laoreet dolore magna aliquamlorem Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincunt ut laoreet dolore magna aliquam Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincunt ut laoreet dolore magna aliquamlorem Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod”</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="swiper-button-prev"><i class="fal fa-chevron-left"></i></div>
                <div class="swiper-button-next"><i class="fal fa-chevron-right"></i></div>
            </div>
    </section>
</main>
<?php
get_footer();
?>
<script>
    jQuery(document).ready(function () {
        $('#search_tour').on('click', function () {
            var tour = $('#tour').find(':selected').val();
            var citytour = $('#city').find(':selected').val();
            var datetour = $('#date1').val();
            setTimeout(function () {
                window.location.href = 'http://tourhotel.test/danh-sach-tour/?slugTour=' + tour + '&citytour=' + citytour + '&datetour=' + datetour;
            }, 500);
        })
    });

    jQuery(document).ready(function () {
        $('#search_hotel').on('click', function () {
            var city_hotel = $('#city_hotel').find(':selected').val();
            var sl = $('#sl').find(':selected').val();
            var date2 = $('#date2').val();
            setTimeout(function () {
                window.location.href = 'http://tourhotel.test/danh-sach-khach-san/?slughotel=' + city_hotel + '&sl=' + sl + '&datehotel=' + date2;
            }, 500);
        });
        $('.tag_names_combo').on('click', function (e) {
            e.preventDefault(); // Ngăn chặn hành vi mặc định của thẻ <a>
            var src = $(this).data('src');
            window.location.href = src; // Chuyển hướng đến đường dẫn được lưu trong thuộc tính data-src
        });
        $('.tags-ht').on('click', function (e) {
            e.preventDefault(); // Ngăn chặn hành vi mặc định của thẻ <a>
            var id = $(this).data('id');
            window.location.href = 'http://tourhotel.test/danh-sach-khach-san/?tags=' + id;
        });
    });

</script>
<script>
    jQuery(document).ready(function() {
        jQuery(function() {
            jQuery("#date1").datepicker();
            jQuery("#date2").datepicker();
        });
        var slider = new Swiper(".mainslideSwiper", {
            grabCursor: true,
            slidesPerView: 1,
            spaceBetween: 0,
            slideToClickedSlide: true,
            loop: true,
            pagination: {
                el: ".swiper-pagination",
                clickable: true
            }
        });
        var sale = new Swiper(".saleSwiper", {
            grabCursor: true,
            slidesPerView: 4,
            spaceBetween: 20,
            slideToClickedSlide: true,
            loop: true,
            navigation: {
                nextEl: ".swiper-button-next-1",
                prevEl: ".swiper-button-prev-1",
            },
        });
        var ticket = new Swiper(".ticketSwiper", {
            grabCursor: true,
            slidesPerView: 4,
            spaceBetween: 20,
            slideToClickedSlide: true,
            loop: true,
            navigation: {
                nextEl: ".swiper-button-next-2",
                prevEl: ".swiper-button-prev-2",
            },
        });
        var testimonial = new Swiper(".testimonialSwiper", {
            grabCursor: true,
            slidesPerView: 2,
            spaceBetween: 60,
            slideToClickedSlide: true,
            loop: true,
            navigation: {
                nextEl: ".swiper-button-next",
                prevEl: ".swiper-button-prev",
            },
        });
        $(".content-tab").hide();
        $(".title-tab ul li:first").addClass("active");
        $(".content-tab:first").show();
        $(".title-tab ul li").click(function() {
            $(".content-tab").hide();
            var activeTab = $(this).attr("rel");
            $("#" + activeTab).fadeIn();

            $(".title-tab ul li").removeClass("active");
            $(this).addClass("active");
        });

        $(".content-tab-1").hide();
        $(".title-tab-1 ul li:first").addClass("active-1");
        $(".content-tab-1:first").show();
        $(".title-tab-1 ul li").click(function() {
            $(".content-tab-1").hide();
            var activeTab1 = $(this).attr("rel");
            $("#" + activeTab1).fadeIn();

            $(".title-tab-1 ul li").removeClass("active-1");
            $(this).addClass("active-1");
        });
    });
</script>
