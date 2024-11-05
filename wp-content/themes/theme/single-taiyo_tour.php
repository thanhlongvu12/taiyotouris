<?php
get_header("v2");
$id = get_the_ID();
$image_video = get_field('image_video', $id);
$date = get_field('date', $id);

$time_tour = get_field('tour_time', $id);
$location_form = get_field('location_form', $id);
$location_to = get_field('location_to', $id);
$return_day = get_field('return_day', $id);
$list_endow = get_field('list_endow', $id);
$price = get_field('price', $id);
$vehicle = get_field('vehicle', $id);
$adults = get_field('adults', $id);
$enfants = get_field('enfants', $id);
$schedule_tour = get_field('shedule_tour', $id);
$schedule_start = get_field('schedule_start', $id);
$visa = get_field('visa', $id);
$tour_guide = get_field('tour_guide', $id);
$policy = get_field('policy', $id);
$number_phone = get_field('phone', $id);
$currentLogin = getLogin();

// Sử dụng hàm date() để định dạng lại thành ngày tháng năm ở định dạng mới
$timestamp = DateTime::createFromFormat('d/m/Y', $date);
$formattedDate = date("Y-m-d", $timestamp->getTimestamp());
$rewiew = $wpdb->get_results("select * from reviews where product_id ={$id}  ");
//print_r($rewiew);
$rewiew_star = $wpdb->get_results("select count(*) as sum_star,star_rating from reviews where product_id ={$id} group by star_rating  ");
//print_r($rewiew_star);die();
?>
<?php
$dem = 0;
$tong = 0;
$avg = 0;
foreach ($rewiew_star as $value) {
    $dem += ($value->sum_star * $value->star_rating);
}

$tong = count($rewiew) * 5;
if ($tong != 0) {
    $avg = ($dem / $tong) * 5;
    $avg = round($avg, 1);
}

switch (round($avg, 0)):
    case 1:
        $text_avg = 'Kém';
        break;
    case 2:
        $text_avg = 'Trung Bình';
        break;
    case 3:
        $text_avg = 'Tốt';
        break;
    case 4:
        $text_avg = 'Xuất sắc';
        break;
    case 5:
        $text_avg = 'Tuyệt vời';
        break;
    default:
        $text_avg = '';
        break;
endswitch;
?>
<style>
    .circle-wrap {
        display: grid;
        grid-template-columns: repeat(1, 190px) !important;
        grid-gap: 80px !important;
        background: #d9d7da;
        border-radius: 50%;
        width: 190px !important;
        height: 190px !important;
        position: relative;
    }

    .circle-wrap .circle .mask,
    .circle-wrap .circle .fill-1 {
        width: 190px !important;
        height: 190px !important;
        position: absolute;
        border-radius: 50%;
    }

    .circle-wrap .circle .mask {
        clip: rect(0px, 190px, 190px, 95px);
    }

    .circle-wrap .inside-circle {
        width: 154px !important;
        height: 154px !important;
        border-radius: 50%;
        text-align: center;
        margin-top: 18px;
        margin-left: 18px;
        color: white;
        position: absolute;
        z-index: 100;
        font-weight: 700;
        font-size: 2em;
        background: #fff;
        top: unset !important;
        left: unset !important;
        transform: translate(0, 0) !important;
    }

    /* color animation */

    .mask .fill-1 {
        clip: rect(0px, 95px, 190px, 0px) !important;
        background-color: #ec0c0c;
    }

    .mask.full-1,
    .circle .fill-1 {
        animation: fill-1 ease-in-out 3s;
        transform: rotate(<?= $avg * 20 * 1.8 ?>deg);
    }

    @keyframes fill-1 {
        0% {
            transform: rotate(0deg);
        }

        100% {
            transform: rotate(<?= $avg * 20 * 1.8 ?>deg);
        }
    }

    .detail-tour-1 .content .col-left .rate .col-rate .review .list-cmt .i-cmt .img-review ul li video {
        width: 110px;
        height: 91px;
        border-radius: 10px;
        box-shadow: 0px 0px 10px 0px rgba(0, 0, 0, 0.0705882353);
    }

    .detail-tour-1 .content .url-link {
        display: flex;
        align-items: center;
        flex-wrap: wrap;
        gap: 10px;
        margin-bottom: 25px;
    }

    .detail-tour-1 .content .url-link a {
        font-size: 14px;
        line-height: 20px;
        font-family: var(--f-body);
        font-weight: 700;
        color: var(--cl-red);
        margin: 0;
    }

    .detail-tour-1 .content .url-link span {
        display: block;
        font-size: 14px;
        line-height: 20px;
        font-family: var(--f-body);
        font-weight: 700;
        margin: 0;
        color: var(--cl-black);
    }

    .detail-tour-1 .content .url-link a.current {
        color: var(--cl-black);
    }

    .detail-tour-1 .content .section-type-1 {
        margin-top: 20px;
    }

    .detail-tour-1 .content .section-type-1 {
        margin-top: 20px;
    }

    .detail-tour-1 .content .section-type-1 .title h1 {
        display: block;
        font-size: 24px;
        line-height: 32px;
        font-family: var(--f-body);
        font-weight: 700;
        color: var(--cl-black);
        margin: 0 0 20px 0;
    }

    .detail-tour-1 .content .section-type-1 .title .more-info {
        display: flex;
        align-items: center;
        gap: 40px;
        margin-bottom: 40px;
    }

    .detail-tour-1 .content .section-type-1 .title .more-info .rate {
        display: flex;
        align-items: center;
        gap: 10px;
    }

    .detail-tour-1 .content .section-type-1 .title .more-info .rate strong {
        display: block;
        font-size: 14px;
        line-height: 20px;
        font-family: var(--f-body);
        font-weight: 600;
        color: var(--cl-yellow);
        margin: 0;
    }

    .detail-tour-1 .content .section-type-1 .title .more-info .rate span {
        display: block;
        font-size: 14px;
        line-height: 20px;
        font-family: var(--f-body);
        font-weight: 500;
        color: #292d32;
        margin: 0;
    }

    .detail-tour-1 .content .section-type-1 .title .more-info .rate p {
        display: block;
        font-size: 14px;
        line-height: 20px;
        font-family: var(--f-body);
        font-weight: 400;
        color: var(--cl-black);
        margin: 0;
    }

    .detail-tour-1 .content .section-type-1 .title .more-info .map ul {
        display: flex;
        flex-wrap: wrap;
        align-items: center;
        gap: 30px;
        list-style: none;
        margin: 0;
        padding: 0;
    }

    .detail-tour-1 .content .section-type-1 .title .more-info .map ul li {
        display: flex;
        align-items: center;
        gap: 5px;
    }

    .detail-tour-1 .content .section-type-1 .title .more-info .map ul li i {
        font-size: 18px;
        line-height: 26px;
        color: #4475f2;
    }

    .detail-tour-1 .content .section-type-1 .title .more-info .map ul li p {
        display: block;
        font-size: 14px;
        line-height: 20px;
        font-weight: 500;
        color: #4475f2;
        margin: 0;
    }

    .detail-tour-1 .content .col-left .big-img .list-video {
        display: flex;
        align-items: flex-start;
        gap: 20px;
    }

    .detail-tour-1 .content .col-left .big-img .list-video .single-hotel--video {
        display: flex;
        align-items: flex-start;
        gap: 20px;
    }

    .detail-tour-1 .content .col-left .big-img .list-video .single-hotel--video .main-video .view-video {
        position: relative;
    }

    .detail-tour-1 .content .col-left .big-img .list-video .single-hotel--video .main-video .view-video .img-over {
        display: block;
        width: 661px;
    }

    .detail-tour-1 .content .col-left .big-img .list-video .single-hotel--video .main-video .view-video .img-over figure {
        position: relative;
        display: block;
        overflow: hidden;
        width: 100%;
        height: 0;
        padding-top: 63.993948562%;
        border-radius: 20px;
    }

    .detail-tour-1 .content .col-left .big-img .list-video .single-hotel--video .main-video .view-video .img-over figure img {
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        border-radius: 20px;
        box-shadow: 0px 0px 10px 0px rgba(0, 0, 0, 0.07);
    }

    .detail-tour-1 .content .col-left .big-img .list-video .single-hotel--video .main-video .view-video .play {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
    }

    .detail-tour-1 .content .col-left .big-img .list-video .single-hotel--video .main-video .view-video .play figure {
        display: block;
    }

    .detail-tour-1 .content .col-left .big-img .list-video .single-hotel--video .main-video .view-video .play figure img {
        width: 35px;
        height: 35px;
    }

    .detail-tour-1 .content .col-left .big-img .list-video .single-hotel--video .ul-img-video {
        position: relative;
        height: 415px;
        overflow: hidden;
    }

    .detail-tour-1 .content .col-left .big-img .list-video .single-hotel--video .ul-img-video ul {
        list-style: none;
        margin: 0;
        padding: 0;
    }

    .detail-tour-1 .content .col-left .big-img .list-video .single-hotel--video .ul-img-video ul li {
        position: relative;
        margin-bottom: 20px;
    }

    .detail-tour-1 .content .col-left .big-img .list-video .single-hotel--video .ul-img-video ul li .img {
        display: block;
        width: 166px;
    }

    .detail-tour-1 .content .col-left .big-img .list-video .single-hotel--video .ul-img-video ul li .img figure {
        position: relative;
        display: block;
        overflow: hidden;
        width: 100%;
        height: 0;
        padding-top: 75.301204819%;
    }

    .detail-tour-1 .content .col-left .big-img .list-video .single-hotel--video .ul-img-video ul li .img figure img {
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        border-radius: 10px;
        box-shadow: 0px 0px 10px 0px rgba(0, 0, 0, 0.07);
    }

    .detail-tour-1 .content .col-left .big-img .list-video .single-hotel--video .more-thumb {
        position: absolute;
        left: 0;
        right: 0;
        bottom: 0;
        z-index: 1;
        pointer-events: none;
    }

    .detail-tour-1 .content .col-left .big-img .list-video .single-hotel--video .more-thumb .box {
        position: relative;
        display: block;
        overflow: hidden;
        width: 100%;
        height: 0;
        padding-top: 75.301204819%;
        border-radius: 10px;
        z-index: 1;
    }

    .detail-tour-1 .content .col-left .big-img .list-video .single-hotel--video .more-thumb .box:before {
        content: "";
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        border: 0;
        width: 100%;
        height: 100%;
        border-radius: 10px;
        background: linear-gradient(0deg, rgba(0, 0, 0, 0.5) 0%, rgba(0, 0, 0, 0.5) 100%);
        box-shadow: 0px 0px 10px 0px rgba(0, 0, 0, 0.07);
    }

    .detail-tour-1 .content .col-left .big-img .list-video .single-hotel--video .more-thumb .box p {
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

    .detail-tour-1 .content .col-left .big-img .list-video .single-hotel--video .more-thumb .box span {
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

    .detail-tour-1 .content .col-left .tabhozion-tour .tab-policy .policy-title ul li.act {
        border-bottom: solid;
        color: var(--cl-blue);
        /* border-color: var(--cl-blue); */
    }

    .detail-tour-1 .content .col-left .rate {
        margin-top: 50px;
    }

    .detail-tour-1 .content .col-left .rate h2 {
        margin: 0;
    }

    .detail-tour-1 .content .col-left .rate .col-rate {
        box-shadow: 0px 0px 10px 0px rgba(0, 0, 0, 0.0705882353);
        background: var(--cl-white);
        border-radius: 8px;
        padding: 50px 40px;
        margin: 30px 0 70px;
    }

    .detail-tour-1 .content .col-left .rate .col-rate .single-progress {
        display: flex;
        align-items: flex-start;
        gap: 80px;
        margin-bottom: 50px;
    }

    .detail-tour-1 .content .col-left .rate .col-rate .single-progress .pro-left {
        width: 190px;
    }

    .detail-tour-1 .content .col-left .rate .col-rate .single-progress .pro-left .circle-wrap {
        position: relative;
        width: 190px;
        height: 190px;
        border-radius: 50%;
        background: #ececec;
    }

    .detail-tour-1 .content .col-left .rate .col-rate .single-progress .pro-left .circle-wrap .circle .mask {
        width: 190px;
        height: 190px;
        position: absolute;
        border-radius: 50%;
    }

    .circle-wrap .circle .mask,
    .circle-wrap .circle .fill-1 {
        width: 190px !important;
        height: 190px !important;
        position: absolute;
        border-radius: 50%;
    }

    .detail-tour-1 .content .col-left .rate .col-rate .single-progress .pro-left .circle-wrap .circle .inside-circle {
        width: 165px;
        height: 165px;
        border-radius: 50%;
        background: var(--cl-white);
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        flex-wrap: wrap;
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
    }

    .detail-tour-1 .content .col-left .rate .col-rate .single-progress .pro-left .circle-wrap .circle .inside-circle strong {
        display: block;
        font-size: 20px;
        line-height: 30px;
        font-family: var(--f-body);
        font-weight: 700;
        color: var(--cl-red);
        margin: 0 auto 5px;
    }

    .detail-tour-1 .content .col-left .rate .col-rate .single-progress .pro-left .circle-wrap .circle .inside-circle span {
        display: block;
        font-size: 14px;
        font-family: var(--f-body);
        font-weight: 500;
        color: var(--cl-black);
        margin: 0 auto;
    }

    .detail-tour-1 .content .col-left .rate .col-rate .single-progress .pro-right {
        flex: 1;
    }

    .detail-tour-1 .content .col-left .rate .col-rate .single-progress .pro-right ul {
        margin: 0;
        list-style: none;
        padding: 0;
    }

    .detail-tour-1 .content .col-left .rate .col-rate .single-progress .pro-right ul li {
        display: flex;
        align-items: center;
        margin-bottom: 10px;
    }

    .detail-tour-1 .content .col-left .rate .col-rate .single-progress .pro-right ul li strong {
        flex-basis: 25%;
        display: block;
        font-size: 16px;
        font-family: var(--f-body);
        font-weight: 600;
        line-height: 28px;
        margin: 0;
        color: var(--cl-black);
    }

    .detail-tour-1 .content .col-left .rate .col-rate .single-progress .pro-right ul li .progress {
        flex-basis: 70%;
        height: 10px;
        border-radius: 10px;
        background: #eaeaea;
        margin-right: 20px;
    }

    .detail-tour-1 .content .col-left .rate .col-rate .single-progress .pro-right ul li .progress .progress-bar {
        border-radius: 10px;
        background: var(--cl-red);
        height: 10px;
    }

    .detail-tour-1 .content .col-left .rate .col-rate .review h3 {
        font-size: 18px;
        line-height: 26px;
        font-family: var(--f-body);
        font-weight: 600;
        color: var(--cl-black);
        margin: 0 0 15px 0;
    }

    .detail-tour-1 .content .col-left .rate .col-rate .review .list-img {
        margin-bottom: 60px;
    }

    .detail-tour-1 .content .col-left .rate .col-rate .review .list-img ul {
        list-style: none;
        display: flex;
        flex-wrap: wrap;
        align-items: center;
        gap: 10px;
        padding: 0;
    }
    .detail-tour-1 .content .col-right .form-right .f-item .f-list ul {
        display: block;
        margin: 0;
    }
    .detail-tour-1 .content .col-right .form-right .f-item .f-date {
    display: flex;
    align-items: center;
    gap: 20px;
    padding: 10px 20px;
    border: 1px solid #5f5f5f;
    border-radius: 10px;
    background: rgba(68, 117, 242, 0.05);
    width: 210px;
}
.detail-tour-1 .content .col-right .form-right .f-item .f-date input {
    padding: 0;
    border: 0;
    background: rgba(0, 0, 0, 0);
    outline: 0;
    font-size: 16px;
    line-height: 24px;
    font-family: var(--f-body);
    font-weight: 500;
    color: var(--cl-black);
    width: 100%;
    max-width: 170px;
}
.detail-tour-1 .content .col-right .form-right .f-item .f-date i {
    font-size: 18px;
    line-height: 1;
    color: var(--cl-black);
    margin-left: -35px;
}
.ui-widget-header .ui-icon {
	background-image: url("<?= get_template_directory_uri(); ?>/dist/images/ui-icons_444444_256.png");
}
</style>
<main id="detail-tour" class="main-v2">
    <section class="detail-tour-1">
        <div class="container">
            <div class="content">
                <div class="url-link">
                    <a href="<?= home_url() ?>">Trang chủ</a><span>/</span><a href="<?= get_permalink(372) ?>">Tour du
                        lịch</a><span>/</span><a href="<?= get_permalink($id) ?>"
                        class="current"><?= get_the_title() ?></a>
                </div>
                <div class="section-type-1">
                    <div class="title">
                        <h1><?= get_the_title() ?></h1>
                        <div class="more-info">
                            <div class="rate">
                                <strong><?= number_format($avg, 1) ?> <?= $text_avg ?></strong><span>|</span>
                                <p><?= count($rewiew) ?> đánh giá</p>
                            </div>
                            <div class="map">
                                <ul>
                                    <?php if (!empty($location_to)): ?>
                                        <li>
                                            <i class="fas fa-map-marker-alt"></i>
                                            <p><?= $location_to ?></p>
                                        </li>
                                    <?php endif; ?>
                                    <?php if (!empty($time_tour)): ?>
                                        <li>
                                            <i class="far fa-stopwatch"></i>
                                            <p><?= $time_tour ?></p>
                                        </li>
                                    <?php endif; ?>
                                    <?php if (!empty($vehicle['text'])): ?>
                                        <li>
                                            <img style="width: 15px;" src="<?= $vehicle['icon'] ?>" alt="">

                                            <p><?= $vehicle['text'] ?></p>
                                        </li>
                                    <?php endif; ?>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-8 col-left">
                        <div class="big-img">
                            <div class="list-video">
                                <div class="single-hotel--video">
                                    <?php
                                    foreach ($image_video as $key => $img) :
                                        $check = strpos($img, 'mp4');
                                    ?>
                                        <?php if ($check == true) : ?>
                                            <div class="main-video">
                                                <a class="view-video" href="<?= $img ?>" data-fancybox="video">
                                                    <div class="img-over">
                                                        <figure><img
                                                                src="<?= get_template_directory_uri(); ?>/dist/images/over-img.png"
                                                                alt="images"></figure>
                                                    </div>
                                                    <div class="play">
                                                        <figure><img
                                                                src="<?= get_template_directory_uri(); ?>/dist/images/play.svg"
                                                                alt="play"></figure>
                                                    </div>
                                                </a>
                                            </div>
                                        <?php else : ?>
                                            <?php if ($key == 0) : ?>
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
                                            if (!empty($image_video)) {
                                                $count = count($image_video);
                                                foreach ($image_video as $key => $img) :
                                                    $check = strpos('mp4', $img);
                                            ?>
                                                    <?php if ($check == false) : ?>

                                                        <li data-src="<?= $img ?>">
                                                            <div class="img">
                                                                <figure><img src="<?= $img ?>" alt="images"></figure>
                                                            </div>
                                                        </li>
                                                    <?php endif; ?>
                                            <?php endforeach;
                                            } ?>
                                        </ul>
                                        <?php if ($count > 3): ?>
                                            <div class="more-thumb">
                                                <div class="box">
                                                    <p></p>
                                                    <span>+<?= $count - 3 ?> <img
                                                            src="<?= get_template_directory_uri(); ?>/dist/images/place.svg"
                                                            alt="place"></span>
                                                </div>
                                            </div>
                                        <?php endif ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="accor-tour">
                            <div class="title-tour">
                                <h2>Lịch trình Tour</h2>
                            </div>
                            <div class="main-accor">
                                <?php foreach ($schedule_tour as $key => $item) : ?>
                                    <div class="item-accor">
                                        <div class="acc-title">
                                            <div class="acc-left">
                                                <div class="acc-icon"><i
                                                        class="fas fa-calendar-alt"></i><span><?= $item['day_number'] ?></span>
                                                </div>
                                            </div>
                                            <div class="acc-right"><i class="far fa-chevron-up"></i></div>
                                        </div>
                                        <div class="acc-content">
                                            <?php foreach ($item['detail_activity'] as $de) : ?>
                                                <div class="i-item">
                                                    <strong><?= $de['session'] ?></strong>
                                                    <p><?= $de['activity'] ?></p>
                                                </div>
                                            <?php endforeach; ?>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
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
                                        <?php foreach ($schedule_start as $start) : ?>
                                            <tr>
                                                <td><?= $start['from'] ?></td>
                                                <td><?= $start['date_start'] ?></td>
                                                <td><?= $start['date_end'] ?></td>
                                                <td class="cyan"><a href="<?= get_permalink(getIdPage('contact')) ?>">Liên hệ</a></td>
                                                <td class="blue"><?= number_format($start['price'], 0, ",", ".") ?> Đ</td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="info-pay">
                            <h2>Thông tin Visa</h2>
                            <div class="list-pay">
                                <ul>
                                    <?= $visa ?>
                                </ul>
                            </div>
                        </div>
                        <div class="info-pay">
                            <h2>Hướng dẫn viên</h2>
                            <div class="list-pay">
                                <ul>
                                    <?= $tour_guide ?>
                                </ul>
                            </div>
                        </div>
                        <div class="tabhozion-tour">
                            <h2>Chính sách giá</h2>
                            <div class="tab-policy">
                                <div class="policy-title">
                                    <ul>
                                        <?php foreach ($policy as $key => $til) : ?>
                                            <li rel="tab<?= $key + 1 ?>"><?= $til['name_policy'] ?></li>
                                        <?php endforeach; ?>
                                    </ul>
                                </div>
                                <div class="policy-content">
                                    <?php foreach ($policy as $key => $til) : ?>
                                        <div id="tab<?= $key + 1 ?>" class="poli-item">
                                            <ul>
                                                <?= $til['detail'] ?>
                                            </ul>
                                        </div>
                                    <?php endforeach; ?>
                                </div>
                            </div>
                        </div>
                        <div class="rate">
                            <h2>Đánh giá</h2>
                            <div class="row-rate">
                                <div class="col-rate">
                                    <div class="single-progress">
                                        <div class="pro-left">
                                            <div class="circle-wrap">
                                                <div class="circle">
                                                    <div class="mask full-1">
                                                        <div class="fill-1"></div>
                                                    </div>
                                                    <div class="mask half">
                                                        <div class="fill-1"></div>
                                                    </div>
                                                    <div class="inside-circle">
                                                        <strong><?= $avg ?>/5 <?= $text_avg ?></strong>
                                                        <span><?= count($rewiew) ?> đánh giá</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="pro-right">
                                            <ul>
                                                <?php
                                                for ($i = 5; $i >= 1; $i--):
                                                    $text = '';
                                                    switch ($i):
                                                        case 1:
                                                            $text = 'Kém';
                                                            break;
                                                        case 2:
                                                            $text = 'Trung Bình';
                                                            break;
                                                        case 3:
                                                            $text = 'Tốt';
                                                            break;
                                                        case 4:
                                                            $text = 'Xuất sắc';
                                                            break;
                                                        case 5:
                                                            $text = 'Tuyệt vời';
                                                            break;
                                                        default:
                                                            $text = 'Tuyệt vời';
                                                            break;
                                                    endswitch;
                                                    $av = 0;
                                                    $dem_s = 0;
                                                    foreach ($rewiew_star as $value):
                                                        if ($value->star_rating == $i):
                                                            $av = round((($value->sum_star) / count($rewiew)) * 100, 0);
                                                            $dem_s = $value->sum_star;
                                                        endif;

                                                ?>

                                                    <?php
                                                    endforeach;
                                                    ?>
                                                    <li>
                                                        <strong><?= $text ?></strong>
                                                        <div class="progress">
                                                            <div class="progress-bar" role="progressbar"
                                                                style="width: <?= $av ?>%;" aria-valuenow="25"
                                                                aria-valuemin="0" aria-valuemax="100"></div>
                                                        </div>
                                                        <span><?= $dem_s ?></span>
                                                    </li>
                                                <?php
                                                endfor; ?>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="review">
                                        <h3>Ảnh người dùng đánh giá</h3>
                                        <div class="list-img">
                                            <ul>
                                                <?php foreach ($rewiew as $key => $value): ?>

                                                    <?php foreach (json_decode($value->link_img_video) as $val):
                                                        $extension = pathinfo($val, PATHINFO_EXTENSION); // Lấy phần mở rộng của đường dẫn

                                                        if (in_array($extension, ['jpg', 'jpeg', 'png', 'gif'])) {
                                                            echo '<li><img src="' . $val . '"  alt="room" ></li>';
                                                        }
                                                    ?>


                                                    <?php endforeach; ?>
                                                <?php
                                                endforeach; ?>
                                            </ul>
                                        </div>
                                        <div class="list-cmt">
                                            <?php foreach ($rewiew as $key => $value):
                                                $user = $wpdb->get_row("select * from useragency where id ={$value->user_id} ");
                                                switch ($value->star_rating):
                                                    case 1:
                                                        $text = 'Kém';
                                                        break;
                                                    case 2:
                                                        $text = 'Trung Bình';
                                                        break;
                                                    case 3:
                                                        $text = 'Tốt';
                                                        break;
                                                    case 4:
                                                        $text = 'Xuất sắc';
                                                        break;
                                                    case 5:
                                                        $text = 'Tuyệt vời';
                                                        break;
                                                    default:
                                                        $text = '';
                                                        break;
                                                endswitch;
                                            ?>
                                                <div class="i-cmt i-cmt-<?= $key ?>">
                                                    <div class="cmt-user">
                                                        <img src="<?= $user->avatar ?>" alt="user">
                                                        <div class="info">
                                                            <strong><?= $user->name ?></strong>
                                                            <div class="more">
                                                                <strong><?= $value->star_rating . ' <i class="fas fa-star"></i> - ' . $text ?></strong><span>-</span>
                                                                <p><?= date('d/m/Y', $value->created_at) ?></p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="short">
                                                        <p><?= $value->comment ?></p>
                                                    </div>
                                                    <div class="img-review">
                                                        <ul>
                                                            <?php foreach (json_decode($value->link_img_video) as $val):
                                                                $extension = pathinfo($val, PATHINFO_EXTENSION); // Lấy phần mở rộng của đường dẫn

                                                                if (in_array($extension, ['jpg', 'jpeg', 'png', 'gif'])) {
                                                                    echo '<li><img src="' . $val . '"></li>';
                                                                } elseif (in_array($extension, ['mp4', 'mov', 'avi', 'wmv'])) {
                                                                    echo '<li><video src="' . $val . '" controls></video></li>';
                                                                }
                                                            ?>
                                                            <?php endforeach; ?>
                                                        </ul>
                                                    </div>
                                                </div>
                                            <?php endforeach; ?>
                                        </div>
                                        <!--                                        <a href="#">Xem thêm<i class="far fa-angle-down"></i></a>-->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-right">
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
                                        <?php foreach ($list_endow as $en) : ?>
                                            <li><?= $en['endow'] ?></li>
                                        <?php endforeach; ?>
                                    </ul>
                                </div>
                            </div>
                            <div class="f-item">
                                <h3>Giá khách lẻ:</h3>
                                <strong><?= number_format($price, 0, ",", ".") ?> đ/khách</strong>
                            </div>
                            <div class="f-item">
                                <h3>Số người</h3>
                                <div class="item-quanlity">
                                    <ul>
                                        <li>
                                            <div class="left">
                                                <strong>Người lớn</strong>
                                                <span>(> 12 tuổi)</span>
                                            </div>
                                            <div class="right">
                                                <div class="quanlity">
                                                    <button class="minus is-form"></button>
                                                    <input type="number" class="input-qty" name="adult" id="adult"
                                                        min="1" max="100" value="1">
                                                    <button class="plus is-form"></button>
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="left">
                                                <strong>Trẻ em</strong>
                                                <span> 6 tuổi & =< 12 tuổi)</span>
                                            </div>
                                            <div class="right">
                                                <div class="quanlity">
                                                    <button class="minus child-form"></button>
                                                    <input type="number" name="child" id="child" min="0" max="100"
                                                        value="0">
                                                    <button class="plus child-form"></button>
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <p> <?= (!empty(get_the_excerpt())) ? '*' : '' ?> <?= get_the_excerpt() ?></p>
                            <div class="f-bnt">
                                <strong>Liên hệ ngay:</strong>
                                <a href="tel:<?= $number_phone; ?>">
                                    <button class="yellow">Gọi <?php echo $number_phone; ?></button>
                                </a>
                            </div>

                            <div class="f-bnt">
                                <button class="red" id="order_now">Đặt ngay</button>
                                <?php if (!empty($currentLogin)): ?>
                                    <button class="blue" id="add_cart" data-id="<?= get_the_ID() ?>">Thêm vào giỏ</button>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <?php
    $args_two = new WP_Query(query: array(
        'post_type' => 'taiyo_tour',
        'posts_per_page' => 3,

    ));
    $post_two = $args_two->posts;
    // $terms = get_terms(array(
    //     'taxonomy' => 'danh_muc_tourist',
    //     'orderby' => 'ID', // default: 'orderby' => 'name',
    //     'order' => 'DESC',
    //     'hide_empty' => false, // default: true
    // ));

    ?>
    <section class="tour-relate">
        <div class="container">
            <div class="content">
                <div class="title">
                    <h2>Các tour liên quan</h2>
                </div>
                <div class="list-relate">
                    <div class="row">
                        <?php
                        foreach ($post_two as $value) :
                            $price = get_field('price', $value->ID);
                            // $checkFavorite = $wpdb->get_row("SELECT * FROM user_favorite where product_id = {$value->ID} AND user_id = {$currentLogin->id}");
                            $reviews = $wpdb->get_results("SELECT * FROM reviews where product_id = {$value->ID}  and status = 0 ");
                            // $averageQuery = "SELECT AVG(star_rating) as averageRating FROM reviews WHERE product_id = %d";
                            // $averageRating = $wpdb->get_var($wpdb->prepare($averageQuery, $value->ID));
                            // $integerPart = intval($averageRating);
                            // $decimalPart = $averageRating - $integerPart;
                            // $terms_t = get_terms(array(
                            //     'taxonomy' => 'tags_tour',
                            //     'object_ids' => $value->ID,
                            // ));
                        ?>
                            <div class="col-md-4 col-lx-4 h-col">
                                <div class="h-item">
                                    <a href="<?= get_permalink($value->ID) ?>">
                                        <div class="img">
                                            <figure><img src="<?= get_the_post_thumbnail($value->ID) ?>" alt="blog">
                                            </figure>
                                            <div class="follow follow_check_<?= $value->ID ?> <?= (!empty($checkFavorite)) ? 'active' : '' ?> "
                                                data-id="<?= $value->ID ?>"><i
                                                    class="fal fa-heart"></i></div>
                                        </div>
                                        <div class="desc">
                                            <h3><?= $value->post_title ?></h3>
                                            <div class="rate">
                                                <div class="write">
                                                    <!-- <strong>Đánh giá: <?= round($averageRating, 2) ?> <i
                                                            class="fas fa-star"></i>
                                                    </strong>
                                                    <span>
                                                        (<?= (!empty($reviews)) ? formatShortNumber(count($reviews)) : 0 ?> đánh giá)
                                                    </span> -->
                                                </div>
                                            </div>
                                            <div class="tag">
                                                <ul>
                                                    <!-- <?php foreach ($terms_t as $item) : ?>
                                                        <li><?= $item->name ?></li>
                                                    <?php endforeach; ?> -->
                                                </ul>
                                            </div>
                                            <div class="price">
                                                <strong><?= number_format($price, 0, ",", ".") ?>Đ</strong>
                                                <p><?= (!empty(get_the_excerpt($value->ID))) ? '*' : '' ?> <?= get_the_excerpt($value->ID) ?></p>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        <?php endforeach; ?>
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
    //<![CDATA[
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
    $('input#child').each(function() {
        var $this = $(this),
            qty = $this.parent().find('.is-form'),
            min = Number($this.attr('min')),
            max = Number($this.attr('max'))
        if (min == 0) {
            var d = 0
        } else d = min
        $('.child-form').on('click', function() {
            if ($(this).hasClass('minus')) {
                if (d > min) d += -1
            } else if ($(this).hasClass('plus')) {
                var x = Number($this.val()) + 1
                if (x <= max) d += 1
            }
            $this.attr('value', d).val(d)
        });
    })
    //]]>
</script>
<script>
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
    });
    jQuery(document).ready(function() {
        const maxDate = '<?= $formattedDate ?>';
        console.log(maxDate)
        jQuery("#date10").datepicker({
            minDate: new Date(),
            // maxDate: new Date('<?= $formattedDate ?>')
        });
    });
</script>
<script>
    jQuery(document).ready(function() {
        $('#order_now').on('click', function() {
            var login = '<?= $currentLogin->remeber_token ?>';
            if (login) {
                var id_tour = <?= $id ?>;
                var date = $('#date10').val();
                var adult = $('#adult').val();
                var child = $('#child').val();
                setTimeout(function() {
                    window.location.href = '<?= get_permalink(getIdPage('order_tour_now')) ?>?id_tour=' + id_tour + '&&date=' + date + '&&adult=' + adult + '&&child=' + child;
                }, 500);
            } else {
                setTimeout(function() {
                    window.location.href = '<?= get_permalink(getIdPage('login')) ?>';
                }, 500);
            }

        })
        $('#add_cart').on('click', function() {
            var id = $(this).data('id');
            var adult = $('#adult').val();
            var child = $('#child').val();
            var $data = {
                'productId': id,
                'adult': adult,
                'child': child,
                'action': 'addcart',
            };
            var $param = {
                'type': 'POST',
                'url': ajaxurl,
                'data': $data,
                'callback': function(data) {
                    $('.bnt-cart .label').show().html('<span>' + JSON.parse(data).count + '</span>')
                }
            };
            cms_adapter_ajax($param);

        })
    });
</script>
<script>
    $(document).ready(function() {
        const $lgContainer = document.getElementById("js-gallery");
        const lg = lightGallery($lgContainer, {
            animateThumb: true,
            allowMediaOverlap: true,
            toggleThumb: true,
            download: false,
            speed: 500,
            slideShowAutoplay: true,
            plugins: [lgThumbnail],
            actualSize: true,
        });
    });
</script>