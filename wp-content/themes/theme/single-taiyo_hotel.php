<?php

/**
 * Created by PhpStorm.
 * User: VuThanhLong
 * Date: 11/13/2023
 * Time: 7:05 PM
 */
$obj = get_queried_object();
$terms = get_terms(array(
    // 'taxonomy' => 'tourist_attraction',
    // 'object_ids' => $obj->ID,
));
$gallery = get_field('gallery', $obj->ID);
$introduce = get_field('introduce', $obj->ID);
get_header();
?>
<style>
    .category-type-1 .content .section-type-1 .single-col--video {
        display: flex;
        align-items: flex-start;
        gap: 20px;
    }

    .category-type-1 .content .section-type-1 .single-col--video .col-left .single-hotel--video {
        display: flex;
        align-items: flex-start;
        gap: 20px;
    }

    .category-type-1 .content .section-type-1 .single-col--video .col-left .single-hotel--video .main-video .view-video {
        position: relative;
    }

    .category-type-1 .content .section-type-1 .single-col--video .col-left .single-hotel--video .main-video .view-video .img-over {
        display: block;
        width: 661px;
    }

    .category-type-1 .content .section-type-1 .single-col--video .col-left .single-hotel--video .main-video .view-video .img-over figure {
        position: relative;
        display: block;
        overflow: hidden;
        width: 100%;
        height: 0;
        padding-top: 63.993948562%;
        border-radius: 20px;
    }

    .category-type-1 .content .section-type-1 .single-col--video .col-left .single-hotel--video .main-video .view-video .img-over figure img {
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        border-radius: 20px;
        box-shadow: 0px 0px 10px 0px rgba(0, 0, 0, 0.07);
    }

    .category-type-1 .content .section-type-1 .single-col--video .col-left .single-hotel--video .ul-img-video {
        position: relative;
        height: 415px;
        overflow: hidden;
    }

    .category-type-1 .content .section-type-1 .single-col--video .col-left .single-hotel--video .ul-img-video ul {
        list-style: none;
        margin: 0;
        padding: 0;
    }

    .category-type-1 .content .section-type-1 .single-col--video .col-left .single-hotel--video .ul-img-video ul li {
        position: relative;
        margin-bottom: 20px;
    }

    .category-type-1 .content .section-type-1 .single-col--video .col-left .single-hotel--video .more-thumb {
        position: absolute;
        left: 0;
        right: 0;
        bottom: 0;
        z-index: 1;
        pointer-events: none;
    }

    .category-type-1 .content .section-type-1 .single-col--video .col-left .single-hotel--video .more-thumb .box {
        position: relative;
        display: block;
        overflow: hidden;
        width: 100%;
        height: 0;
        padding-top: 75.301204819%;
        border-radius: 10px;
        z-index: 1;
    }

    .category-type-1 .content .section-type-1 .single-col--video .col-left .single-hotel--video .more-thumb .box p {
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        border-radius: 10px;
        width: 100%;
        height: 100%;
        margin: 0;
    }

    .category-type-1 .content .section-type-1 .single-col--video .col-left .single-hotel--video .more-thumb .box span {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        display: flex;
        align-items: center;
        gap: 10px;
        color: var(--cl-white);
        font-family: var(--f-body);
        font-size: 18px;
        font-weight: 600;
        line-height: 24px;
    }

    .category-type-1 .content .section-type-1 .single-col--video .col-right .right-text button {
        width: 100%;
        text-align: center;
        font-size: 16px;
        line-height: 24px;
        font-family: var(--f-body);
        font-weight: 600;
        padding: 14px 25px;
        color: var(--cl-white);
        background: var(--cl-red);
        border-radius: 10px;
        border: 0;
    }

    .pp-form-contact .modal-dialog .modal-content .modal-body .f-item .col input {
        width: 100%;
        padding: 14px 20px;
        border-radius: 10px;
        border: 1px solid #ddd;
        background: rgba(0, 0, 0, 0);
        outline: 0;
        color: var(--cl-black);
        font-family: var(--f-body);
        font-size: 16px;
        font-weight: 400;
        line-height: 24px;
    }

    .pp-form-contact .modal-dialog .modal-content .modal-body .f-item {
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 80px;
        margin-bottom: 30px;
    }

    .pp-form-contact .modal-dialog .modal-content .modal-body .f-item .col label {
        color: var(--cl-black);
        font-family: var(--f-body);
        font-size: 16px;
        font-weight: 600;
        line-height: 24px;
        margin-bottom: 5px;
    }

    .pp-form-contact .modal-dialog .modal-content .modal-body .f-item .col input {
        width: 100%;
        padding: 14px 20px;
        border-radius: 10px;
        border: 1px solid #ddd;
        background: rgba(0, 0, 0, 0);
        outline: 0;
        color: var(--cl-black);
        font-family: var(--f-body);
        font-size: 16px;
        font-weight: 400;
        line-height: 24px;
    }

    .pp-form-contact .modal-dialog .modal-content .modal-body .f-item .col .list-check {
        display: flex;
        align-items: center;
        gap: 40px;
    }

    .pp-form-contact .modal-dialog .modal-content .modal-body .f-item .col .list-check .c-item {
        display: flex;
        align-items: center;
        gap: 15px;
    }

    .pp-form-contact .modal-dialog .modal-content .modal-body .f-item .col .list-check input {
        width: 16px;
        height: 16px;
    }

    .pp-form-contact .modal-dialog .modal-content .modal-body .f-item .col .list-check span {
        color: var(--cl-black);
        font-family: var(--f-body);
        font-size: 16px;
        font-weight: 400;
        line-height: 24px;
        margin-bottom: 0;
    }

    .pp-form-contact .modal-dialog .modal-content .modal-body .col-full textarea {
        width: 100%;
        color: var(--cl-black);
        font-family: var(--f-body);
        font-size: 16px;
        font-weight: 400;
        line-height: 24px;
        border-radius: 10px;
        border: 1px solid #ddd;
        padding: 20px;
        outline: 0;
    }

    .pp-form-contact .modal-dialog .modal-content .modal-footer input[type="submit"] {
        border-color: var(--cl-red);
        background: var(--cl-red);
        color: var(--cl-white);
        font-family: var(--f-body);
        font-size: 14px;
        font-weight: 500;
        line-height: 20px;
        padding: 10px 20px;
        border-radius: 10px;
    }

    .pp-form-contact .modal-dialog {
        max-width: 820px;
        width: 100%;
        margin: 3.5rem auto;
    }

    .pp-form-contact .modal-dialog .modal-content {
        border-radius: 20px;
        background: var(--cl-white);
        padding: 35px 50px;
    }

    .pp-form-contact .modal-dialog .modal-content .modal-header {
        padding: 0 0 40px 0;
        margin-bottom: 40px;
    }

    .pp-form-contact .modal-dialog .modal-content .modal-header h4 {
        color: var(--cl-blue);
        font-family: var(--f-body);
        font-size: 30px;
        line-height: 40px;
        font-weight: 600;
        margin: 0;
    }

    .pp-form-contact .modal-dialog .modal-content .modal-header button {
        border: 0;
        background: rgba(0, 0, 0, 0);
        width: 40px;
        height: 40px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 20px;
        line-height: 1;
        color: #000;
    }

    .pp-form-contact .modal-dialog .modal-content .modal-body {
        padding: 0;
        margin-bottom: 50px;
    }

    .pp-form-contact .modal-dialog .modal-content .modal-footer {
        display: flex;
        align-items: center;
        justify-content: flex-end;
        gap: 15px;
        padding: 0;
        border: 0;
    }

    .pp-form-contact .modal-dialog .modal-content .modal-footer button {
        font-family: var(--f-body);
        font-size: 14px;
        font-weight: 500;
        line-height: 20px;
        padding: 10px 20px;
        border: 1px solid;
        border-radius: 10px;
    }

    .pp-form-contact .modal-dialog .modal-content .modal-footer button:first-child {
        border-color: var(--cl-blue);
        color: var(--cl-blue);
        background: rgba(0, 0, 0, 0);
    }

    .pp-form-contact .modal-dialog .modal-content .modal-footer button:last-child {
        border-color: var(--cl-red);
        background: var(--cl-red);
        color: var(--cl-white);
    }
</style>
<main id="category-type">
    <section class="category-hotel-1">
        <div class="container">
            <div class="content">
                <div class="book-option">
                    <div class="item">
                        <strong>Bạn muốn đi</strong>
                        <select name="city" id="city">
                            <option value="1">Hà Nội</option>
                            <option value="1">Đà Nẵng</option>
                            <option value="1">Huế</option>
                        </select>
                    </div>
                    <div class="item">
                        <strong>Ngày đến</strong>
                        <div class="date"><input type="text" value="18 tháng 4, 2023"><i class="fal fa-calendar-alt"></i></div>
                    </div>
                    <div class="item">
                        <strong>Ngày về</strong>
                        <div class="date"><input type="text" value="20 tháng 4, 2023"><i class="fal fa-calendar-alt"></i></div>
                    </div>
                    <div class="item">
                        <strong>Số khách</strong>
                        <select name="sl" id="sl">
                            <option value="1">2 người lớn, 1 trẻ...</option>
                            <option value="1">2 người lớn, 1 trẻ...</option>
                            <option value="1">2 người lớn, 1 trẻ...</option>
                        </select>
                    </div>
                    <div class="item">
                        <button><img src="<?= get_template_directory_uri();  ?>/dist/images/search.svg" alt="search">Tìm kiếm</button>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="category-type-1" style="background-image: url('<?= get_template_directory_uri();  ?>/dist/images/cate-hotel-2.png')">
        <div class="container">
            <div class="content">
                <div class="url-link">
                    <a href="#">Trang chủ</a><span>/</span><a href="#">Khách sạn</a><span>/</span><a href="#">Khách sạn</a><span>/</span><a href="#" class="current">Chi tiết khách sạn</a>
                </div>
                <div class="section-type-1">
                    <div class="title">
                        <h1><?= $obj->post_title ?></h1>
                        <div class="more-info">
                            <div class="rate"><strong>4.8 Rất tốt</strong><span>|</span>
                                <p>75 đánh giá</p>
                            </div>
                            <!-- <div class="map"><i class="fas fa-map-marker-alt"></i>
                                <p><?= $terms[0]->name; ?></p>
                            </div> -->
                        </div>
                    </div>
                    <div class="single-col--video">
                        <div class="row">
                            <div class="col-xl-8 col-left">
                                <div class="big-img">
                                    <div class="list-video">
                                        <div class="single-hotel--video">
                                            <?php
                                            foreach ($gallery as $key => $img) :
                                                $check = strpos($img, 'mp4');
                                            ?>
                                                <?php if ($key == 0) : ?>
                                                    <?php if ($check == true) : ?>
                                                        <div class="main-video">
                                                            <a class="view-video" href="<?= $img ?>" data-fancybox="video">
                                                                <div class="img-over">
                                                                    <figure><img src="<?= get_template_directory_uri(); ?>/dist/images/over-img.png" alt="images"></figure>
                                                                </div>
                                                                <div class="play">
                                                                    <figure><img src="<?= get_template_directory_uri(); ?>/dist/images/play.svg" alt="play"></figure>
                                                                </div>
                                                            </a>
                                                        </div>
                                                    <?php else : ?>
                                                        <div class="main-video">
                                                            <a class="view-video" href="javascript:;">
                                                                <div class="img-over">
                                                                    <figure><img src="<?= $img ?>" alt="images"></figure>
                                                                </div>

                                                            </a>
                                                        </div>
                                                    <?php endif; ?>
                                                <?php endif; ?>
                                            <?php endforeach; ?>
                                            <div class="ul-img-video">
                                                <ul id="js-gallery">
                                                    <?php
                                                    $count = count($gallery);
                                                    foreach ($gallery as $key => $img) :
                                                        $file_extension = pathinfo($img, PATHINFO_EXTENSION);

                                                        if (in_array($file_extension, ['jpg', 'jpeg', 'png', 'gif'])) {
                                                    ?>
                                                            <li data-fancybox="gallery" href="<?= $img ?>">
                                                                <div class="img">
                                                                    <figure><img src="<?= $img ?>" alt="images"></figure>
                                                                </div>
                                                            </li>
                                                        <?php
                                                        } elseif (in_array($file_extension, ['mp4', 'avi', 'mov'])) {
                                                        ?>
                                                            <li data-fancybox="gallery" href="<?= $img ?>">
                                                                <figure>
                                                                    <a href="<?= $img ?>">
                                                                        <video controls style="height: 125px; width: 100%; object-fit: cover">
                                                                            <source src="<?= $img ?>" type="video/mp4">
                                                                        </video>
                                                                    </a>
                                                                </figure>
                                                            </li>
                                                    <?php
                                                        }
                                                    endforeach;
                                                    ?>
                                                </ul>
                                                <?php if ($count > 3) : ?>
                                                    <div class="more-thumb">
                                                        <div class="box">
                                                            <p></p>
                                                            <span>+<?= $count - 3 ?> <img src="<?= get_template_directory_uri(); ?>/dist/images/place.svg" alt="place"></span>
                                                        </div>
                                                    </div>
                                                <?php endif ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-4 col-right">
                                <div class="right-text">
                                    <h2>Giới thiệu</h2>
                                    <p><?= $introduce ?></p>
                                    <button type="button" data-bs-toggle="modal" data-bs-target="#popup-contact-0">Liên hệ
                                        tư vấn
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <?php
                $args = array(
                    'post_parent' => get_the_ID(),
                    'post_type' => 'taiyo_hotel',
                    'posts_per_page' => -1,
                );
                $query_post = new WP_Query($args);
                $posts = $query_post->posts;
                ?>

                <div class="section-type-2">
                    <h2>Danh sách phòng khách sạn</h2>
                    <div class="list-room">
                        <?php
                        foreach ($posts as $post) {
                            $detail = get_field('detail', $post->ID);
                            $gallery = get_field('gallery', $post->ID);
                        ?>
                            <div class="r-item">
                                <div class="r-left">
                                    <div class="img">
                                        <div class="big-img">
                                            <figure><img src="<?= get_the_post_thumbnail_url($post->ID) ?>" alt="room"></figure>
                                        </div>
                                        <div class="list-img">
                                            <ul>
                                                <?php
                                                foreach ($gallery as $value) {
                                                ?>
                                                    <li>
                                                        <figure><img src="<?= $value ?>" alt="room"></figure>
                                                    </li>
                                                <?php
                                                }
                                                ?>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="tag">
                                        <ul>
                                            <li>Ban công</li>
                                            <li>Hướng vườn</li>
                                            <li>Bồn tắm</li>
                                            <li>Vòi hoa sen</li>
                                            <li>Vòi hoa sen</li>
                                            <li>Vòi hoa sen</li>
                                        </ul>
                                    </div>
                                    <a href="#">Xem thêm + 14 tiện ích</a>
                                </div>
                                <div class="r-right">
                                    <h3><?= $post->post_title ?></h3>
                                    <div class="sl">
                                        <ul>
                                            <li><img src="<?= get_template_directory_uri();  ?>/dist/images/r-1.svg" alt="room">
                                                <p><?= $detail['number'] ?> người</p>
                                            </li>
                                            <span>-</span>
                                            <li><img src="<?= get_template_directory_uri();  ?>/dist/images/r-2.svg" alt="room">
                                                <p><?= $detail['area'] ?>m</p>
                                            </li>
                                            <span>-</span>
                                            <li><img src="<?= get_template_directory_uri();  ?>/dist/images/r-3.svg" alt="room">
                                                <p><?= $detail['bed_type'] ?></p>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="more-sevice">
                                        <h4>Dịch vụ phòng</h4>
                                        <div class="list-sev">
                                            <ul>
                                                <li><img src="<?= get_template_directory_uri();  ?>/dist/images/sev-1.svg" alt="room"><span>Ăn sáng</span></li>
                                                <li><img src="<?= get_template_directory_uri();  ?>/dist/images/sev-2.svg" alt="room"><span>Wifi miễn phí</span></li>
                                                <li><img src="<?= get_template_directory_uri();  ?>/dist/images/sev-3.svg" alt="room"><span>Đã bao gồm thuế & phí</span></li>
                                                <li><img src="<?= get_template_directory_uri();  ?>/dist/images/sev-4.svg" alt="room"><span>Đưa đón sân bay</span></li>
                                                <li><img src="<?= get_template_directory_uri();  ?>/dist/images/sev-1.svg" alt="room"><span>Ăn sáng</span></li>
                                                <li><img src="<?= get_template_directory_uri();  ?>/dist/images/sev-2.svg" alt="room"><span>Wifi miễn phí</span></li>
                                            </ul>
                                        </div>
                                        <div class="total-pice">
                                            <div class="price"><strong>Giá:</strong><span><?= number_format($detail['price'], 0, '.', '.') ?> đ</span></div>
                                            <div class="note"><img src="<?= get_template_directory_uri();  ?>/dist/images/note.svg" alt="note">
                                                <p>Không hỗ trợ hoàn, hủy phòng đã đặt</p>
                                            </div>
                                        </div>
                                        <?php if (!empty($detail['price']) || $detail['price'] > 0) : ?>
                                            <button class="room_cart" data-bs-toggle="modal" data-bs-target="#popup-cart" data-id="<?= $post->ID ?>" data-title="<?= get_the_title(get_the_ID()) . ' - ' . get_the_title($post->ID) ?>">
                                                Giỏ hàng
                                            </button>

                                            <button class="order_room" data-bs-toggle="modal" data-bs-target="#popup-contact" data-id="<?= $post->ID ?>">đặt phòng
                                            </button>
                                        <?php else : ?>
                                            <button class="order_room_cobntact" data-bs-toggle="modal" data-bs-target="#popup-contact-0" data-id="<?= $post->ID ?>">Liên hệ tư
                                                vấn
                                            </button>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                        <?php
                        }
                        ?>
                    </div>
                    <div class="faq-hotel">
                        <h2>Chính sách khách sạn</h2>
                        <div class="faq-detail">
                            <div class="top-detail">
                                <ul>
                                    <li>
                                        <span>Nhận phòng</span>
                                        <strong>Từ 15:00</strong>
                                    </li>
                                    <li>
                                        <span>Trả phòng</span>
                                        <strong>Trước 12:00</strong>
                                    </li>
                                </ul>
                            </div>
                            <div class="bottom-detail">
                                <h3>Chính sách chung</h3>
                                <ul>
                                    <li>Không cho phép hút thuốc</li>
                                    <li>Không cho phép thú cưng</li>
                                    <li>Cho phép tổ chức tiệc / sự kiện</li>
                                </ul>
                                <h3>Chính sách trẻ em</h3>
                                <ul>
                                    <li>Trẻ em từ 12 tuổi sẽ được xem như người lớn</li>
                                    <li>Quý khách hàng vui lòng nhập đúng số lượng khách và tuổi để có giá chính xác.</li>
                                    <li>Quý khách hàng vui lòng nhập đúng số lượng khách và tuổi để có giá chính xác.</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="rate">
                        <h2>Đánh giá</h2>
                        <div class="row row-rate">
                            <div class="col-md-8 col-rate">
                                <div class="progress"></div>
                                <div class="review">
                                    <h3>Ảnh người dùng đánh giá</h3>
                                    <div class="list-img">
                                        <ul>
                                            <li><img src="<?= get_template_directory_uri();  ?>/dist/images/room-1.png" alt="room"></li>
                                            <li><img src="<?= get_template_directory_uri();  ?>/dist/images/room-1.png" alt="room"></li>
                                            <li><img src="<?= get_template_directory_uri();  ?>/dist/images/room-1.png" alt="room"></li>
                                            <li><img src="<?= get_template_directory_uri();  ?>/dist/images/room-1.png" alt="room"></li>
                                            <li><img src="<?= get_template_directory_uri();  ?>/dist/images/room-1.png" alt="room"></li>
                                        </ul>
                                    </div>
                                    <div class="list-cmt">
                                        <div class="i-cmt">
                                            <div class="cmt-user">
                                                <img src="<?= get_template_directory_uri();  ?>/dist/images/user.png" alt="user">
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
                                                    <li><img src="<?= get_template_directory_uri();  ?>/dist/images/room-1.png" alt="room"></li>
                                                    <li><img src="<?= get_template_directory_uri();  ?>/dist/images/room-1.png" alt="room"></li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="i-cmt">
                                            <div class="cmt-user">
                                                <img src="<?= get_template_directory_uri();  ?>/dist/images/user.png" alt="user">
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
                                                <img src="<?= get_template_directory_uri();  ?>/dist/images/user.png" alt="user">
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
                                                <img src="<?= get_template_directory_uri();  ?>/dist/images/user.png" alt="user">
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
                                                    <li><img src="<?= get_template_directory_uri();  ?>/dist/images/room-1.png" alt="room"></li>
                                                    <li><img src="<?= get_template_directory_uri();  ?>/dist/images/room-1.png" alt="room"></li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="i-cmt">
                                            <div class="cmt-user">
                                                <img src="<?= get_template_directory_uri();  ?>/dist/images/user.png" alt="user">
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
                                                    <li><img src="<?= get_template_directory_uri();  ?>/dist/images/room-1.png" alt="room"></li>
                                                    <li><img src="<?= get_template_directory_uri();  ?>/dist/images/room-1.png" alt="room"></li>
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
        </div>
    </section>
    <div class="pp-form-contact modal fade" id="popup-contact" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="exampleModalLabel">Thông tin liên hệ</h4>
                    <button type="button" class="close-bnt" data-bs-dismiss="modal" aria-label="Close"><i class="far fa-times"></i></button>
                </div>
                <div class="modal-body">
                    <form action="">
                        <input type="hidden" value="" id="id_ht">
                        <div class="f-item">
                            <div class="col">
                                <label for="">Thời gian nhận phòng</label>
                                <input type="text" id="checkInDate">
                            </div>
                            <div class="col">
                                <label for="">Thời gian trả phòng</label>
                                <input type="text" id="checkOutDate">
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="f-bnt" data-bs-dismiss="modal">Hủy</button>
                    <button type="button" class="f-bnt order_now_c">Gửi thông tin liên hệ</button>
                </div>
            </div>
        </div>
    </div>
    <div class="pp-form-contact modal fade" id="popup-cart" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="exampleModalLabel"><span class="name-p"></span></h4>
                    <button type="button" class="close-bnt" data-bs-dismiss="modal" aria-label="Close"><i class="far fa-times"></i></button>
                </div>
                <div class="modal-body">
                    <form>
                        <input type="hidden" value="<?= get_the_ID() ?>" id="id_ht-cart">
                        <input type="hidden" value="<?= get_the_ID() ?>" id="id_ht-room">
                        <div class="f-item">
                            <div class="col">
                                <label for="">Thời gian nhận phòng</label>
                                <input type="text" id="checkInDate_cart">
                            </div>
                            <div class="col">
                                <label for="">Thời gian trả phòng</label>
                                <input type="text" id="checkOutDate_cart">
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="f-bnt" data-bs-dismiss="modal">Hủy</button>
                    <button type="button" class="f-bnt add_cart">Thêm vào giỏ hàng</button>
                </div>
            </div>
        </div>
    </div>
</main>
<?php
get_footer();
?>
<script>
    jQuery(document).ready(function() {
        jQuery(function() {
            jQuery("#date1").datepicker();
            jQuery("#date2").datepicker();
        });
        var input = $('input.hidden_title');
        input.attr('type', 'hidden');
        input.val('<?= get_the_title() ?>');
        <?php if (!empty($currentLogin)) : ?>
            $('.name_form').val('<?= $delivery->fullname ?>');
            $('.phone_tel').val('<?= $currentLogin->phonenumber ?>');
            $('.email_form').val('<?= $currentLogin->email ?>');

        <?php endif; ?>
    });
</script>
<script>
    $(document).ready(function() {
        // const $lgContainer = document.getElementById("js-gallery");
        // const lg = lightGallery($lgContainer, {
        //     animateThumb: true,
        //     allowMediaOverlap: true,
        //     toggleThumb: true,
        //     download: false,
        //     speed: 500,
        //     slideShowAutoplay: true,
        //     plugins: [lgThumbnail],
        //     actualSize: true,
        // });
        // $("[data-fancybox]").fancybox({
        //     // Tùy chọn tùy chỉnh nếu cần
        // });
    });
</script>
<script>
    $(document).ready(function() {
        var id_t = 0;
        $('.room_cart').on('click', function() {
            var title = $(this).data('title');
            var id = $(this).data('id');
            $('.name-p').html(title)
            $('#id_ht-room').val(id);

        })

        $('.order_room').on('click', function() {
            var id = $(this).data('id');
            $('#id_ht').val(id);
            id_t = id;
        })

        $('.order_now_c').on('click', function() {
            var id_room = id_t;
            var checkInDate = $('#checkInDate').val();
            var checkOutDate = $('#checkOutDate').val();
            var id = '<?= $obj->ID ?>';
            var redirectURL = "<?= home_url('booking-hotel') ?>"; // Thay đổi thành đường dẫn bạn muốn

            // Chuyển hướng trang
            window.location.href = redirectURL + '?id=' + id + '&id_room=' + id_room + '&checkin=' + checkInDate + '&checkout=' + checkOutDate;

        })
    });
    $(document).ready(function() {
        var currentDate = new Date();
        currentDate.setDate(currentDate.getDate() + 1);

        // Thiết lập datepicker cho ô nhận phòng và ô trả phòng
        $('#checkInDate').datepicker({
            minDate: currentDate, // Bắt đầu từ ngày mai
            onSelect: function(selectedDate) {
                // Ngày checkInDate được chọn
                var checkInDate = new Date(selectedDate);
                var minCheckOutDate = new Date(selectedDate);
                minCheckOutDate.setDate(minCheckOutDate.getDate() + 1); // Tối thiểu ngày là ngày checkInDate + 1

                // Cập nhật giá trị và tối thiểu ngày cho ô checkOutDate
                $('#checkOutDate').datepicker('option', 'minDate', minCheckOutDate);
            }
        });
        $('.active_utilities').on('click', function() {
            $('.hide_utilities').addClass('active');
            $(this).hide();
        });

        $('.add_cart').on('click', function() {
            var id_ht_cart = $('#id_ht-cart').val();
            var id_ht_room = $('#id_ht-room').val();
            var checkInDate_cart = $('#checkInDate_cart').val();
            var checkOutDate_cart = $('#checkOutDate_cart').val();
            var $data = {
                'id_ht_cart': id_ht_cart,
                'id_ht_room': id_ht_room,
                'checkInDate_cart': checkInDate_cart,
                'checkOutDate_cart': checkOutDate_cart,
                'action': 'add_cart_ht',
            };
            var $param = {
                'type': 'POST',
                'url': ajaxurl,
                'data': $data,
                'callback': function(data) {
                    var res = JSON.parse(data);
                    $('.bnt-cart .label').show().html('<span>' + JSON.parse(data).count + '</span>')
                    $('#popup-cart').modal('hide');
                    Swal.fire({
                        icon: 'success',
                        text: res.mess,
                        showConfirmButton: false,
                        timer: 1500
                    })
                }
            };
            cms_adapter_ajax($param);
        })
        $('#checkOutDate').datepicker({
            minDate: currentDate, // Bắt đầu từ ngày mai
            onSelect: function(selectedDate) {
                // Ngày checkOutDate được chọn
                var checkOutDate = new Date(selectedDate);
                var maxCheckInDate = new Date(selectedDate);
                maxCheckInDate.setDate(maxCheckInDate.getDate() - 1); // Tối đa ngày là ngày checkOutDate - 1

                // Cập nhật tối đa ngày cho ô checkInDate
                $('#checkInDate').datepicker('option', 'maxDate', maxCheckInDate);
            }
        });

        // Ngăn người dùng chọn ngày trong quá khứ cho ô nhận phòng
        $('#checkInDate').on('change', function() {
            var selectedDate = $(this).datepicker('getDate');

            // Nếu ngày đã chọn nhỏ hơn hoặc bằng ngày hiện tại, thiết lập giá trị cho datepicker thành ngày mai
            if (selectedDate <= currentDate) {
                currentDate.setDate(currentDate.getDate() + 1);
                $(this).datepicker('setDate', currentDate);
            }
            // Cập nhật ngày tối thiểu cho ô trả phòng
            $('#checkOutDate').datepicker('option', 'minDate', currentDate);
        });

        // Ngăn người dùng chọn ngày nhỏ hơn ngày đã chọn trong ô nhận phòng cho ô trả phòng
        $('#checkOutDate').on('change', function() {
            var selectedDate = $(this).datepicker('getDate');
            var checkInDate = $('#checkInDate').datepicker('getDate');

            // Nếu ngày đã chọn nhỏ hơn ngày nhận phòng, thiết lập giá trị cho datepicker thành ngày nhận phòng + 1 ngày
            if (selectedDate <= checkInDate) {
                checkInDate.setDate(checkInDate.getDate() + 1);
                $(this).datepicker('setDate', checkInDate);
            }
        });
    });
    $(document).ready(function() {
        var currentDate = new Date();
        currentDate.setDate(currentDate.getDate() + 1);

        // Thiết lập datepicker cho ô nhận phòng và ô trả phòng
        $('#checkInDate_cart').datepicker({
            minDate: currentDate, // Bắt đầu từ ngày mai
            onSelect: function(selectedDate) {
                // Ngày checkInDate được chọn
                var checkInDate = new Date(selectedDate);
                var minCheckOutDate = new Date(selectedDate);
                minCheckOutDate.setDate(minCheckOutDate.getDate() + 1); // Tối thiểu ngày là ngày checkInDate + 1

                // Cập nhật giá trị và tối thiểu ngày cho ô checkOutDate
                $('#checkOutDate_cart').datepicker('option', 'minDate', minCheckOutDate);
            }
        });

        $('#checkOutDate_cart').datepicker({
            minDate: currentDate, // Bắt đầu từ ngày mai
            onSelect: function(selectedDate) {
                // Ngày checkOutDate được chọn
                var checkOutDate = new Date(selectedDate);
                var maxCheckInDate = new Date(selectedDate);
                maxCheckInDate.setDate(maxCheckInDate.getDate() - 1); // Tối đa ngày là ngày checkOutDate - 1

                // Cập nhật tối đa ngày cho ô checkInDate
                $('#checkInDate_cart').datepicker('option', 'maxDate', maxCheckInDate);
            }
        });

        // Ngăn người dùng chọn ngày trong quá khứ cho ô nhận phòng
        $('#checkInDate_cart').on('change', function() {
            var selectedDate = $(this).datepicker('getDate');

            // Nếu ngày đã chọn nhỏ hơn hoặc bằng ngày hiện tại, thiết lập giá trị cho datepicker thành ngày mai
            if (selectedDate <= currentDate) {
                currentDate.setDate(currentDate.getDate() + 1);
                $(this).datepicker('setDate', currentDate);
            }
            // Cập nhật ngày tối thiểu cho ô trả phòng
            $('#checkOutDate_cart').datepicker('option', 'minDate', currentDate);
        });

        // Ngăn người dùng chọn ngày nhỏ hơn ngày đã chọn trong ô nhận phòng cho ô trả phòng
        $('#checkOutDate_cart').on('change', function() {
            var selectedDate = $(this).datepicker('getDate');
            var checkInDate = $('#checkInDate_cart').datepicker('getDate');

            // Nếu ngày đã chọn nhỏ hơn ngày nhận phòng, thiết lập giá trị cho datepicker thành ngày nhận phòng + 1 ngày
            if (selectedDate <= checkInDate) {
                checkInDate.setDate(checkInDate.getDate() + 1);
                $(this).datepicker('setDate', checkInDate);
            }
        });
    });
</script>