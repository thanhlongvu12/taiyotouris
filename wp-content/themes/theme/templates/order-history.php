<?php
/* Template Name:  Lịch sử đơn hàng */
global $wpdb;
$currentLogin = getLogin();
$delivery = getDelivery($currentLogin->id);
if (!empty($_GET['search'])) {
    $texxt = "and order_code like '%" . $_GET['search'] . "%'";
} else {
    $texxt = "";
}
$order = $wpdb->get_results("select * from tt_orders where id_user = '" . $currentLogin->id . "' order by id desc");
$count = count($order);
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
    
    .check-0{
       background-color :red;
    }
</style>
 <div id="loading-overlay">
    <div class="spinner"></div>
</div>
<input type="hidden" class="count" value="<?= $count ?>">
<main id="dashboard-1" class="dashboard">
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
                        <a href="<?= get_permalink() ?>" class="current">Lịch sử đơn hàng</a>
                    </div>
                    <div class="header-right">
                        <div class="bar-advand">
                            <div class="notification">
                                <div class="cart">
                                    <?php

                                    $count = $wpdb->get_var("SELECT count(*) FROM {$wpdb->prefix}cart where id_user = {$currentLogin->id} and status_cart < 2 ");
                                    ?>
                                </div>
                                <a href="<?= home_url('giao-hang') ?>">
                                    <button>
                                        <img src="<?= get_template_directory_uri(); ?>/dist/images/noti.svg" alt="cart">
                                        <div class="label" style="<?= ($count == 0) ? 'display:none' : '' ?>">
                                            <span><?= $count ?></span></div>
                                    </button>
                                </a>
                            </div>
                        </div>
                        <div class="user-right">
                            <div class="d-user">
                                <div class="img">
                                    <figure><img class="avater"
                                                 src="<?= ($currentLogin->avatar != '') ? $currentLogin->avatar : get_template_directory_uri() . '/dist/images/user.png' ?>"
                                                 alt="user"></figure>
                                </div>
                                <div class="info">
                                    <h2><?= (!empty($currentLogin->email)) ? $currentLogin->email : 'Tài khoản' ?></h2>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="dash-main">
                <div class="dash-bar">
                    <h1>Lịch sử đơn hàng</h1>
                    <div class="bar-right">
                        <form action="">
                            <div class="search-dash">
                                <button><i class="fal fa-search"></i></button>
                                <input type="text" class="text-search" name="search" value=""
                                       placeholder="Bạn có thể tìm kiếm theo tên đơn hàng, mã đơn hàng">
                            </div>
                        </form>
                    </div>
                </div>
                <div class="list-dash">
                    <?php foreach ($order as $key => $or) : ?>

                        <div class="item-tour">
                            <div class="i-top">
                                <div class="i-left">
                                    <div class="sku"><strong>Mã đơn hàng:</strong><span><?= $or->order_code ?></span>
                                    </div>
                                    <button class="check-<?= $key?>" id="check-status-<?= $key ?>" data-key="<?= $or->status ?>">
                                        <?php
                                        $date = get_field('date', $or->id_post);
                                        $time_tour = get_field('time_tour', $or->id_post);
                                        if ($or->status == 1) {
                                            echo('Đặt hàng');
                                        } elseif ($or->status == 2) {
                                            echo('Chờ thanh toán');
                                        } elseif ($or->status == 3) {
                                            echo('Đã thanh toán');
                                        } elseif ($or->status == 4) {
                                            echo('Đã kết thúc');
                                        }elseif ($or->status == 5) {
                                            echo('Đã hủy');
                                        }
                                        ?>
                                    </button>
                                </div>
                                <div class="i-right">
                                    <?php if ($or->status == 1 || $or->status == 2) : ?>
                                        <button><i class="far fa-trash-alt" id="cancel-order"
                                                   data-key="<?= $or->id ?>"></i>Hủy đơn hàng
                                        </button>
                                        <a href="javascript:;">
                                            <button class="blue seen-detail" data-key="<?= $or->id ?>">Xem chi tiết
                                            </button>
                                        </a>
                                    <?php elseif ($or->status == 4 || $or->status == 3) :
                                        $check_re = $wpdb->get_row("select * from reviews where product_id= {$or->id_post} and  user_id = {$currentLogin->id}");
                                        ?>
                                        <a href="javascript:;">
                                            <button class="blue seen-detail" data-key="<?= $or->id ?>">Xem chi tiết
                                            </button>
                                        </a>
                                    <?php endif; ?>

                                </div>
                            </div>
                            <?php if (!empty($or->data) || $or->data != NULL) {
                                $data = json_decode($or->data);
                                foreach ($data as $val):
                                    $checkInDate = new DateTime('@' . $val->start_date);
                                    $checkOutDate = new DateTime('@' . $val->end_date);

                                    // Tính số đêm giữa hai thời điểm
                                    $interval = $checkInDate->diff($checkOutDate);
                                    $numberOfNights = $interval->format('%a');

                                    // Lấy giá trị tuyệt đối của số đêm
                                    $numberOfNights = abs($numberOfNights);
                                    ?>
                                    <div class="i-bottom" style="margin: 20px 0">
                                        <div class="img">
                                            <a href="<?= get_permalink($val->id_post) ?>">
                                                <figure><img src="<?= get_the_post_thumbnail($val->id_post) ?>"
                                                             alt="tour"></figure>
                                            </a>
                                        </div>
                                        <div class="info">
                                            <a href="<?= get_permalink($val->id_post) ?>">
                                                <h3><?= get_the_title($val->id_post) ?></h3></a>
                                            <div class="time">
                                                <div class="time-item"><strong>Ngày bắt
                                                        đầu:</strong><span><?= date('d/m/Y', $val->start_date) ?></span>
                                                </div>
                                                <div class="time-item"><strong>Thời
                                                        gian:</strong><span><?= date('d/m/Y', $val->end_date) ?></span>
                                                </div>
                                            </div>
                                            <div class="i-tour">
                                                <strong>Đơn hàng:</strong>
                                                <?php if ($or->type_order == 'tour'): ?>
                                                    <ul>
                                                        <li>
                                                            <div class="i-li">
                                                                <span>Người lớn</span><span>x <?= $val->qty_adult ?></span>
                                                            </div>
                                                            <div class="i-li">
                                                                <span>= <?= money_check(($val->qty_adult * $val->pirce_adult)) ?> VNĐ</span>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="i-li">
                                                                <span>Trẻ em</span><span>x <?= $val->qty_child ?></span>
                                                            </div>
                                                            <div class="i-li">
                                                                <span>= <?= money_check($val->qty_child * $val->pirce_child) ?> VNĐ</span>
                                                            </div>
                                                        </li>
                                                    </ul>
                                                <?php else: ?>
                                                    <ul>
                                                        <li>
                                                            <div class="i-li">
                                                                <span>Loại phòng </span><span> <?= get_the_title($val->id_room) ?></span>
                                                            </div>
                                                            <div class="i-li">
                                                                <span></span>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="i-li">
                                                                <span>Thời gian ở: <?= $numberOfNights ?> đêm</span><span>x <?= money_check(get_field('detail',$val->id_room)['price']) ?> VND</span>
                                                            </div>

                                                        </li>
                                                    </ul>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="i-right">
                                        <?php if ($or->status == 4 || $or->status == 3) :
                                            $check_re = $wpdb->get_row("select * from reviews where product_id= {$or->id_post} and  user_id = {$currentLogin->id}");
                                            ?>
                                            <button class="write-review demo_rex_1" data-id="<?= $or->id ?>"
                                                    data-posst="<?= $val->id_post ?>"
                                                    data-key="<?= get_the_title($val->id_post) ?>"
                                                    data-bs-toggle="modal"
                                                    data-bs-target="#rateModal"
                                                    style="background-color: #e54141; color: #ffffff; <?= !empty($check_re) ? 'display:none' : '' ?>">
                                                Viết đánh giá
                                            </button>
                                            <button class="write-review  demo_rex_2" data-id="<?= $or->id ?>"
                                                    data-posst="<?= $val->id_post ?>"
                                                    data-key="<?= get_the_title($val->id_post) ?>"
                                                    style="background-color: #FFFFFF; color: #e54141; <?= !empty($check_re) ? '' : 'display:none' ?>">
                                                Xem đánh giá
                                            </button>
                                        <?php endif; ?>

                                    </div>
                                <?php endforeach; ?>
                                <div class="i-bottom" style="margin: 20px 0">
                                    <div class="info">
                                        <div class="i-tour">
                                            <div class="total justify-content-end">
                                                <strong>Thành tiền:</strong>
                                                <span><?= number_format($or->price_payment, 0, ",", ".") ?> VNĐ</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php } else { ?>
                                <div class="i-bottom">
                                    <div class="img">
                                        <figure><img src="<?= get_template_directory_uri(); ?>/dist/images/blog-1.png"
                                                     alt="tour"></figure>
                                    </div>
                                    <div class="info">
                                        <h3><?= get_the_title($or->id_post) ?></h3>
                                        <div class="time">
                                            <div class="time-item"><strong>Ngày bắt
                                                    đầu:</strong><span><?= $date ?></span>
                                            </div>
                                            <div class="time-item"><strong>Thời
                                                    gian:</strong><span><?= $time_tour ?></span>
                                            </div>
                                        </div>
                                        <div class="i-tour">
                                            <strong>Đơn hàng:</strong>
                                            <ul>
                                                <li>
                                                    <div class="i-li">
                                                        <span>Người lớn</span><span>x <?= $or->number_adult ?></span>
                                                    </div>
                                                    <div class="i-li">
                                                        <span>= <?= money_check($or->number_adult * $or->adult_price) ?> VNĐ</span>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="i-li">
                                                        <span>Trẻ em</span><span>x <?= $or->number_child ?></span>
                                                    </div>
                                                    <div class="i-li">
                                                        <span>= <?= money_check($or->number_child * $or->child_price) ?> VNĐ</span>
                                                    </div>
                                                </li>
                                            </ul>
                                            <div class="total">
                                                <strong>Thành tiền:</strong>
                                                <span><?= money_check($or->price_payment) ?> VNĐ</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="i-right">
                                    <?php if ($or->status == 4 || $or->status == 3) :
                                        $check_re = $wpdb->get_row("select * from reviews where product_id= {$or->id_post} and  user_id = {$currentLogin->id}");
                                        ?>
                                        <button class="write-review demo_rex_1" data-id="<?= $or->id ?>"
                                                data-posst="<?= $or->id_post ?>"
                                                data-key="<?= get_the_title($or->id_post) ?>" data-bs-toggle="modal"
                                                data-bs-target="#rateModal"
                                                style="background-color: #e54141; color: #ffffff; <?= !empty($check_re) ? 'display:none' : '' ?>">
                                            Viết đánh giá
                                        </button>
                                        <button class="write-review  demo_rex_2" data-id="<?= $or->id ?>"
                                                data-posst="<?= $or->id_post ?>"
                                                data-key="<?= get_the_title($or->id_post) ?>"
                                                style="background-color: #FFFFFF; color: #e54141; <?= !empty($check_re) ? '' : 'display:none' ?>">
                                            Xem đánh giá
                                        </button>
                                    <?php endif; ?>

                                </div>
                            <?php } ?>
                        </div>

                    <?php endforeach; ?>
                    <!--                    <div class="pagra">-->
                    <!--                        <a href="#"><i class="far fa-angle-left"></i></a>-->
                    <!--                        <a href="#">1</a>-->
                    <!--                        <a href="#">2</a>-->
                    <!--                        <a href="#" class="current">3</a>-->
                    <!--                        <a href="#">...</a>-->
                    <!--                        <a href="#"><i class="far fa-angle-right"></i></a>-->
                    <!--                    </div>-->
                </div>
            </div>
        </div>
    </section>
</main>
<div class="form-rate-tour modal fade" id="rateModal" tabindex="-1" aria-labelledby="rateModalLabel1"
     aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h2>Đánh giá</h2>
                <p class="title-post">Combo du lịch Hà Nội - Phú Quốc 4N3Đ</p>
                <input type="hidden" value="0" name="id_post" id="id_post">
            </div>
            <div class="modal-body">
                <div class="rate-form">
                    <div class="form-text">
                        <div class="rate-2">
                            <strong>Chất lượng:</strong>
                            <div class="star">
                                <ul>
                                    <?php for ($i = 1; $i <= 5; $i++) : ?>
                                        <li class="star-check star-check-<?= $i ?>" data-star="<?= $i ?>"><i
                                                class="fas fa-star"></i></li>
                                    <?php endfor; ?>
                                </ul>
                                <strong class="text_star">5.0 Tuyệt vời</strong>
                                <input type="hidden" value="5" name="star_rating" id="star_rating">
                            </div>
                        </div>
                        <div class="text-area">
                            <strong>Nội dung:</strong>
                            <textarea name="content" id="content" cols="30" rows="8"
                                      placeholder="Chia sẻ những cảm nhận của bạn với những người khác..."></textarea>
                        </div>
                        <!-- upload -->
                        <div class="upload">
                            <div class="item-upload">
                                <div class="upload-img">
                                    <div class="before-up">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                             viewBox="0 0 24 24" fill="none">
                                            <path d="M17.2416 22.75H6.76164C3.96164 22.75 2.18164 21.08 2.02164 18.29L1.50164 10.04C1.42164 8.79 1.85164 7.59 2.71164 6.68C3.56164 5.77 4.76164 5.25 6.00164 5.25C6.32164 5.25 6.63164 5.06 6.78164 4.76L7.50164 3.33C8.09164 2.16 9.57164 1.25 10.8616 1.25H13.1516C14.4416 1.25 15.9116 2.16 16.5016 3.32L17.2216 4.78C17.3716 5.06 17.6716 5.25 18.0016 5.25C19.2416 5.25 20.4416 5.77 21.2916 6.68C22.1516 7.6 22.5816 8.79 22.5016 10.04L21.9816 18.3C21.8016 21.13 20.0716 22.75 17.2416 22.75ZM10.8616 2.75C10.1216 2.75 9.18164 3.33 8.84164 4L8.12164 5.44C7.70164 6.25 6.89164 6.75 6.00164 6.75C5.16164 6.75 4.38164 7.09 3.80164 7.7C3.23164 8.31 2.94164 9.11 3.00164 9.94L3.52164 18.2C3.64164 20.22 4.73164 21.25 6.76164 21.25H17.2416C19.2616 21.25 20.3516 20.22 20.4816 18.2L21.0016 9.94C21.0516 9.11 20.7716 8.31 20.2016 7.7C19.6216 7.09 18.8416 6.75 18.0016 6.75C17.1116 6.75 16.3016 6.25 15.8816 5.46L15.1516 4C14.8216 3.34 13.8816 2.76 13.1416 2.76H10.8616V2.75Z"
                                                  fill="#3C3C3C" fill-opacity="0.8"/>
                                            <path d="M13.5 8.75H10.5C10.09 8.75 9.75 8.41 9.75 8C9.75 7.59 10.09 7.25 10.5 7.25H13.5C13.91 7.25 14.25 7.59 14.25 8C14.25 8.41 13.91 8.75 13.5 8.75Z"
                                                  fill="#3C3C3C" fill-opacity="0.8"/>
                                            <path d="M12 18.75C9.79 18.75 8 16.96 8 14.75C8 12.54 9.79 10.75 12 10.75C14.21 10.75 16 12.54 16 14.75C16 16.96 14.21 18.75 12 18.75ZM12 12.25C10.62 12.25 9.5 13.37 9.5 14.75C9.5 16.13 10.62 17.25 12 17.25C13.38 17.25 14.5 16.13 14.5 14.75C14.5 13.37 13.38 12.25 12 12.25Z"
                                                  fill="#3C3C3C" fill-opacity="0.8"/>
                                        </svg>
                                        <input type="file" id="image-upload" accept="image/*" multiple>
                                    </div>
                                </div>
                                <div class="upload-img">
                                    <div class="before-up">
                                        <div class="video-status" style="    position: absolute;
    top: 70%;">0/1
                                        </div>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                             viewBox="0 0 24 24" fill="none">
                                            <path d="M12.88 20.8596H6.81C3.26 20.8596 2 18.3696 2 16.0496V7.94965C2 4.48965 3.35 3.13965 6.81 3.13965H12.88C16.34 3.13965 17.69 4.48965 17.69 7.94965V16.0496C17.69 19.5096 16.34 20.8596 12.88 20.8596ZM6.81 4.65965C4.2 4.65965 3.52 5.33965 3.52 7.94965V16.0496C3.52 17.2796 3.95 19.3396 6.81 19.3396H12.88C15.49 19.3396 16.17 18.6596 16.17 16.0496V7.94965C16.17 5.33965 15.49 4.65965 12.88 4.65965H6.81Z"
                                                  fill="#3C3C3C" fill-opacity="0.8"/>
                                            <path d="M20.7797 18.1105C20.3497 18.1105 19.7997 17.9705 19.1697 17.5305L16.4997 15.6605C16.2997 15.5205 16.1797 15.2905 16.1797 15.0405V8.96048C16.1797 8.71048 16.2997 8.48048 16.4997 8.34048L19.1697 6.47048C20.3597 5.64048 21.2297 5.88048 21.6397 6.09048C22.0497 6.31048 22.7497 6.88048 22.7497 8.33048V15.6605C22.7497 17.1105 22.0497 17.6905 21.6397 17.9005C21.4497 18.0105 21.1497 18.1105 20.7797 18.1105ZM17.6897 14.6405L20.0397 16.2805C20.4897 16.5905 20.8097 16.6205 20.9397 16.5505C21.0797 16.4805 21.2297 16.2005 21.2297 15.6605V8.34048C21.2297 7.79048 21.0697 7.52048 20.9397 7.45048C20.8097 7.38048 20.4897 7.41048 20.0397 7.72048L17.6897 9.36048V14.6405Z"
                                                  fill="#3C3C3C" fill-opacity="0.8"/>
                                            <path d="M11.5 11.75C10.26 11.75 9.25 10.74 9.25 9.5C9.25 8.26 10.26 7.25 11.5 7.25C12.74 7.25 13.75 8.26 13.75 9.5C13.75 10.74 12.74 11.75 11.5 11.75ZM11.5 8.75C11.09 8.75 10.75 9.09 10.75 9.5C10.75 9.91 11.09 10.25 11.5 10.25C11.91 10.25 12.25 9.91 12.25 9.5C12.25 9.09 11.91 8.75 11.5 8.75Z"
                                                  fill="#3C3C3C" fill-opacity="0.8"/>
                                        </svg>
                                        <input type="file" id="video-upload" accept="video/*" size="500000000">
                                    </div>
                                </div>
                            </div>
                            <div class="after-up">
                                <div id="preview-container" class="pre-img"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn-form">Trở lại</button>
                <button type="button" class="btn-form btn-form-submit">Gửi đánh giá</button>
            </div>
        </div>
    </div>
</div>
<div class="form-rate-tour modal fade" id="rateModal1_2" tabindex="-1" aria-labelledby="rateModalLabel"
     aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h2>Đánh giá</h2>
                <p id="view_title">Combo du lịch Hà Nội - Phú Quốc 4N3Đ</p>
            </div>
            <div class="modal-body">
                <div class="rate-form">
                    <div class="rate-user">
                        <div class="avatar">
                            <figure><img src="<?= get_template_directory_uri(); ?>/dist/images/user.png" alt="user">
                            </figure>
                            <div class="info">
                                <h4><?= $currentLogin->name ?></h4>
                                <div class="star">
                                    <ul>
                                        <li><i class="fas fa-star"></i></li>
                                        <li><i class="fas fa-star"></i></li>
                                        <li><i class="fas fa-star"></i></li>
                                        <li><i class="fas fa-star"></i></li>
                                        <li><i class="fas fa-star"></i></li>
                                    </ul>
                                    <strong>4.8 Rất tốt</strong>
                                </div>
                                <p class="content_re">Khu nghĩ dưỡng là nơi ấm cúng với những cảm xúc tuyệt vời, bãi
                                    biển đẹp với khu vệ sinh tốt. Điểm cộng lớn là giường thoải mái và phòng sạch sẽ.
                                    Nhưng điểm trừ là nhà hàng với bữa sáng không ngon</p>
                                <div class="img-review">
                                    <ul>
                                        <li>
                                            <div class="i-img">
                                                <figure><img
                                                        src="<?= get_template_directory_uri(); ?>/dist/images/blog-1.png"
                                                        alt="up"></figure>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="i-img">
                                                <figure><img
                                                        src="<?= get_template_directory_uri(); ?>/dist/images/blog-1.png"
                                                        alt="up"></figure>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                                <div class="i-time">
                                    <time>17:01 - 10/04/2023</time>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <!--                <button type="button" class="btn-form">Xóa đánh giá</button>-->
                <button type="button" class="btn-form" data-bs-dismiss="modal">Thoát</button>
            </div>
        </div>
    </div>
</div>
<?php
get_footer('dash');
?>
<script>
    jQuery(document).ready(function ($) {
        var count = $('.count').val();
        var i;
        for (i = 0; i <= count; i++) {
            var status = $('#check-status-' + i).data('key');
            // console.log(status);
            if (status == 3) {
                $('#check-status-' + i).css({
                    "color": "#1AB44E",
                    "border": "1px solid #1AB44E",
                    "background": "rgba(26, 180, 78, 0.1019607843)"
                });
            } else if (status == 4) {
                $('#check-status-' + i).css({
                    "color": "#E54141",
                    "border": "1px solid #E54141",
                    "background": "rgba(229, 65, 65, 0.1019607843)"
                });
            }
        }
        $('.seen-detail').on('click', function () {
            var id_order = $(this).data('key');
            setTimeout(function () {
                window.location.href = '<?= get_permalink(getIdPage('order_management')) ?>?token=' + id_order;
            }, 500);
        });

        $('.write-review').on('click', function () {
            var id_order = $(this).data('id');
            var id_posst = $(this).data('posst');
            var title = $(this).data('key');
            $('.title-post').text(title);
            $('#id_post').val(id_posst);
        })

    });
    $(document).ready(function () {
        var ajaxurl = "<?= admin_url('admin-ajax.php') ?>";
        var cms_adapter_ajax = function cms_adapter_ajax($param) {
            $.ajax({
                url: $param.url,
                type: $param.type,
                data: $param.data,
                processData: false,
                contentType: false,
                success: $param.callback
            });
        };
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
        var filesArray = [];
        $("#loading-overlay").hide();

        // Hàm để hiển thị overlay
        function showLoadingOverlay() {
            $("#loading-overlay").show();
        }

        // Hàm để tắt overlay
        function hideLoadingOverlay() {
            $("#loading-overlay").hide();
        }

        $('#image-upload').on('change', function (e) {
            var files = e.target.files;
            var previewContainer = $('#preview-container');

            // Xóa tất cả các ảnh trước đó trong preview
            previewContainer.empty();
            filesArray = [];

            // Kiểm tra số lượng ảnh tải lên
            if (files.length > 5) {
                alert('Vui lòng chỉ chọn tối đa 5 ảnh');
                return;
            }

            // Hiển thị từng ảnh trong preview
            Array.from(files).forEach(function (file, index) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    var img = $('<img>').attr('src', e.target.result).addClass('preview-image');
                    var removeIcon = $('<span>').addClass('remove-icon').html('&#x2716;').attr('data-index', index);
                    img.appendTo(previewContainer);
                    removeIcon.appendTo(img);
                    filesArray.push(file);
                };

                reader.readAsDataURL(file);
            });
        });

        $('#preview-container').on('click', '.remove-icon', function () {
            var index = $(this).data('index');
            var inputFile = $('#image-upload');

            // Xóa ảnh khỏi preview
            $(this).closest('.preview-image').remove();
            filesArray.splice(index, 1);

            // Cập nhật lại chỉ mục trong data-index
            $('#preview-container .remove-icon').each(function (i) {
                $(this).data('index', i);
            });

            // Xóa tệp ảnh khỏi trường tải lên
            inputFile.val('');
        });

        $('#video-upload').on('change', function (e) {
            var file = e.target.files[0];

            // Kiểm tra kích thước tệp video
            if (file && file.size > 500000000) {
                alert('Vui lòng chọn một video có kích thước nhỏ hơn 500MB');
                $(this).val('');
                return;
            }
            if ($(this).val()) {
                // Nếu có video được chọn, ẩn phần "0/1" và hiển thị "1/1"
                $(".video-status").text("1/1").show();
            } else {
                // Nếu không có video được chọn, hiển thị lại "0/1"
                $(".video-status").text("0/1").show();
            }
        });

        $('.star-check').on('click', function () {
            var star = $(this).data('star');
            console.log(star);
            var text = '';
            switch (star) {
                case 1:
                    text = '1.0 Kém';
                    break;
                case 2:
                    text = '2.0 Trung Bình';
                    break;
                case 3:
                    text = '3.0 Tốt';
                    break;
                case 4:
                    text = '4.0 Xuất Sắc';
                    break;
                case 5:
                    text = '5.0 Tuyệt vời';
                    break;
            }
            $('.text_star').html(text);
            for (var i = 1; i <= 5; i++) {
                if (star < i) {
                    $('.star-check-' + i + ' i').removeClass('fas');
                    $('.star-check-' + i + ' i').addClass('far');
                } else {
                    $('.star-check-' + i + ' i').removeClass('far');
                    $('.star-check-' + i + ' i').addClass('fas');
                }
            }
            $('#star_rating').val(star);
        });
        $('.btn-form-submit').on('click', function () {
            var id_post = $('#id_post').val();
            var star = $('#star_rating').val();
            var content = $('#content').val();
            var imgFiles = $('#image-upload')[0].files; // Lấy danh sách tệp hình ảnh đã chọn
            var videoFile = $('#video-upload')[0].files[0];
            var formData = new FormData();
            formData.append('id_post', id_post);
            formData.append('star_rating', star);
            formData.append('content', content);
            formData.append('action', 'reviews_star');
            for (var i = 0; i < imgFiles.length; i++) {
                formData.append('images[]', imgFiles[i]);
            }
            formData.append('video', videoFile);
            console.log(formData);
            var $param = {
                'type': 'POST',
                'url': ajaxurl,
                'data': formData,
                'callback': function (data) {
                    var res_2 = JSON.parse(data);
                    var res = res_2.data;

                    $('#rateModal').modal('hide');

                    // Mở modal 2
                    $('#rateModal1_2').modal('show');
                    $('#view_title').html(res.post);
                    $('.content_re').html(res.comment);
                    $('#rateModal1_2 .star ul').html('');
                    for (var i = 1; i <= 5; i++) {
                        if (i <= res.star_rating) {
                            $('#rateModal1_2 .star ul').append('<li><i class="fas fa-star"></i></li>');
                        } else {
                            $('#rateModal1_2 .star ul').append('<li><i class="far fa-star"></i></li>');
                        }
                    }
                    text = '';
                    switch (res.star_rating) {
                        case 1:
                            text = '1.0 Kém';
                            break;
                        case 2:
                            text = '2.0 Trung Bình';
                            break;
                        case 3:
                            text = '3.0 Tốt';
                            break;
                        case 4:
                            text = '4.0 Xuất Sắc';
                            break;
                        case 5:
                            text = '5.0 Tuyệt vời';
                            break;
                    }
                    $('#rateModal1_2 .star strong').html(text);
                    $('#rateModal1_2 .img-review ul').html('');
                    $.each(res.link_img_video, function (index, value) {
                        var extension = value.split('.').pop().toLowerCase(); // Lấy phần mở rộng của đường dẫn

                        if ($.inArray(extension, ['jpg', 'jpeg', 'png', 'gif']) !== -1) {
                            $('#rateModal1_2 .img-review ul').append('<li><img src="' + value + '"></li>');
                        } else if ($.inArray(extension, ['mp4', 'mov', 'avi', 'wmv']) !== -1) {
                            $('#rateModal1_2 .img-review ul').append('<li><video style="max-width: 100px" src="' + value + '" controls></video></li>');
                        }
                    });
                    var timestamp = res.created_at;

                    // Tạo đối tượng Date từ chuỗi số (đơn vị là giây)
                    var dateObj = new Date(timestamp * 1000);

                    // Lấy các thành phần của ngày tháng từ đối tượng Date
                    var hours = dateObj.getHours();
                    var minutes = dateObj.getMinutes();
                    var seconds = dateObj.getSeconds();
                    var day = dateObj.getDate();
                    var month = dateObj.getMonth() + 1; // Tháng trong JavaScript bắt đầu từ 0, nên cần cộng thêm 1
                    var year = dateObj.getFullYear();

                    // Tạo chuỗi ngày tháng dạng H:i:s d/m/Y
                    var formattedDateTime = hours + ':' + minutes + ':' + seconds + ' ' + day + '/' + month + '/' + year;

                    $('#rateModal1_2 .i-time').html(formattedDateTime);
                    $('.demo_rex_1').hide();
                    $('.demo_rex_2').show();
                }
            };
            cms_adapter_ajax($param);
        })
        $('.demo_rex_2').on('click', function () {
            var id_posst = $(this).data('posst');
            var $data = {
                'id_posst': id_posst,
                'action': 'check_reviews',
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
                    var res_2 = JSON.parse(data);
                    var res = res_2.data;
                    // Mở modal 2
                    $('#rateModal1_2').modal('show');
                    $('#view_title').html(res.post);
                    $('.content_re').html(res.comment);
                    $('#rateModal1_2 .star ul').html('');
                    for (var i = 1; i <= 5; i++) {
                        if (i <= res.star_rating) {
                            $('#rateModal1_2 .star ul').append('<li><i class="fas fa-star"></i></li>');
                        } else {
                            $('#rateModal1_2 .star ul').append('<li><i class="far fa-star"></i></li>');
                        }
                    }
                    text = '';
                    switch (res.star_rating) {
                        case 1:
                            text = '1.0 Kém';
                            break;
                        case 2:
                            text = '2.0 Trung Bình';
                            break;
                        case 3:
                            text = '3.0 Tốt';
                            break;
                        case 4:
                            text = '4.0 Xuất Sắc';
                            break;
                        case 5:
                            text = '5.0 Tuyệt vời';
                            break;
                    }
                    $('#rateModal1_2 .star strong').html(text);
                    $('#rateModal1_2 .img-review ul').html('');
                    $.each(res.link_img_video, function (index, value) {
                        var extension = value.split('.').pop().toLowerCase(); // Lấy phần mở rộng của đường dẫn

                        if ($.inArray(extension, ['jpg', 'jpeg', 'png', 'gif']) !== -1) {
                            $('#rateModal1_2 .img-review ul').append('<li><img src="' + value + '"></li>');
                        } else if ($.inArray(extension, ['mp4', 'mov', 'avi', 'wmv']) !== -1) {
                            $('#rateModal1_2 .img-review ul').append('<li><video style="max-width: 100px" src="' + value + '" controls></video></li>');
                        }
                    });
                    var timestamp = res.created_at;

                    // Tạo đối tượng Date từ chuỗi số (đơn vị là giây)
                    var dateObj = new Date(timestamp * 1000);

                    // Lấy các thành phần của ngày tháng từ đối tượng Date
                    var hours = dateObj.getHours();
                    var minutes = dateObj.getMinutes();
                    var seconds = dateObj.getSeconds();
                    var day = dateObj.getDate();
                    var month = dateObj.getMonth() + 1; // Tháng trong JavaScript bắt đầu từ 0, nên cần cộng thêm 1
                    var year = dateObj.getFullYear();

                    // Tạo chuỗi ngày tháng dạng H:i:s d/m/Y
                    var formattedDateTime = hours + ':' + minutes + ':' + seconds + ' ' + day + '/' + month + '/' + year;

                    $('#rateModal1_2 .i-time').html(formattedDateTime);

                }
            };
            cms_adapter_ajax_2($param);

        })
    });
</script>