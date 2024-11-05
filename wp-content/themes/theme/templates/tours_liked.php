<?php
/* Template Name:  Danh sách tour yêu thích */

$idlogin = getIdPage('login');
$currentLogin = getLogin();
global $wpdb;
if (!empty($_GET['search_tour'])) {
    $texxt = "and name_product like '%" . $_GET['search_tour'] . "%'";
} else {
    $texxt = "";
}
$listFavorites = $wpdb->get_results("SELECT * FROM user_favorite where type_order = 'taiyo_tour' AND user_id = {$currentLogin->id}");
// pr($checkFavorites);
?>
<style>
.follow.active {
    background: var(--cl-red) !important;
}
.main-dashboard .dash-content .dash-main .list-dash .list-tour--like .hotel-item .desc {
    flex: 1;
    padding: 15px 20px 20px 25px;
    overflow: hidden;
    max-height: 260px;
    height: 100%;
}

.main-dashboard .dash-content .dash-main .list-dash .list-tour--like .hotel-item .desc .box {
    max-height: 230px;
    height: 100%;
    overflow-x: hidden;
    overflow-y: scroll;
    padding-right: 10px;
}

.main-dashboard .dash-content .dash-main .list-dash .list-tour--like .hotel-item .desc .box .title {
    display: flex;
    align-items: flex-start;
    justify-content: space-between;
    gap: 20px;
    margin-bottom: 10px;
}

.main-dashboard .dash-content .dash-main .list-dash .list-tour--like .hotel-item .desc .box .title h3 {
    flex: 1;
    font-size: 18px;
    line-height: 26px;
    font-family: var(--f-body);
    font-weight: 700;
    margin: 0;
    color: var(--cl-black);
    -webkit-box-orient: vertical;
    -webkit-line-clamp: 2;
    overflow: hidden;
    text-overflow: ellipsis;
    word-break: break-word;
    display: -webkit-box;
    min-height: 52px;
}

.main-dashboard .dash-content .dash-main .list-dash .list-tour--like .hotel-item .desc .box .title .follow {
    width: 36px;
    height: 36px;
    border-radius: 10px;
    background: var(--cl-red);
    border: 0;
    outline: 0;
    display: flex;
    align-items: center;
    justify-content: center;
}

.main-dashboard .dash-content .dash-main .list-dash .list-tour--like .hotel-item .desc .box .title .follow i {
    font-size: 20px;
    color: var(--cl-white);
}

.main-dashboard .dash-content .dash-main .list-dash .list-tour--like .hotel-item .desc .box .write {
    display: flex;
    align-items: center;
    gap: 20px;
    margin-bottom: 15px;
}

.main-dashboard .dash-content .dash-main .list-dash .list-tour--like .hotel-item .desc .box .write strong {
    display: block;
    font-size: 14px;
    line-height: 20px;
    font-family: var(--f-body);
    font-weight: 600;
    color: var(--cl-red);
    margin: 0;
}

.main-dashboard .dash-content .dash-main .list-dash .list-tour--like .hotel-item .desc .box .tag {
    margin-bottom: 15px;
}

.main-dashboard .dash-content .dash-main .list-dash .list-tour--like .hotel-item .desc .box .tag ul {
    display: flex;
    flex-wrap: wrap;
    align-items: center;
    gap: 5px;
    list-style: none;
    margin: 0;
    padding: 0;
}

.main-dashboard .dash-content .dash-main .list-dash .list-tour--like .hotel-item .desc .box .tag ul li {
    padding: 5px 12px;
    border: 1px solid #4475f2;
    border-radius: 5px;
    font-size: 14px;
    line-height: 20px;
    font-family: var(--f-body);
    font-weight: 500;
    color: #4475f2;
}

.main-dashboard .dash-content .dash-main .list-dash .list-tour--like .hotel-item .desc .box .more-info {
    display: block;
}
.main-dashboard .dash-content .dash-main .list-dash .list-tour--like .hotel-item .desc .box .more-info .address .list-address {
    display: flex;
    flex-wrap: wrap;
    align-items: center;
    gap: 20px;
    list-style: none;
    margin: 0 0 20px 0;
    padding: 0;
}
.main-dashboard .dash-content .dash-main .list-dash .list-tour--like .hotel-item .desc .box .more-info .address .list-address li {
    display: flex;
    align-items: center;
    gap: 5px;
    font-size: 14px;
    line-height: 20px;
    font-family: var(--f-body);
    font-weight: 500;
    color: #4475f2;
}

.main-dashboard .dash-content .dash-main .list-dash .list-tour--like .hotel-item .desc .box .more-info .price {
    display: flex;
    align-items: center;
    gap: 10px;
}
.main-dashboard .dash-content .dash-main .list-dash .list-tour--like .hotel-item .desc .box .more-info .price span {
    display: block;
    font-size: 16px;
    line-height: 32px;
    font-family: var(--f-body);
    font-weight: 600;
    color: var(--cl-black);
}
.main-dashboard .dash-content .dash-main .list-dash .list-tour--like .hotel-item .desc .box .more-info .price strong {
    display: block;
    font-size: 20px;
    line-height: 30px;
    font-family: var(--f-body);
    font-weight: 600;
    color: var(--cl-red);
    margin: 0;
}
</style>
<main id="dashboard-1" class="dashboard">
    <section class="main-dashboard">
        <?php get_header('dash'); ?>
        <div class="dash-content">
            <div class="dash-header">
                <div class="dash-inner">
                    <div class="header-left">
                        <a href="#">Trang chủ</a>
                        <span>/</span>
                        <a href="#">Cá nhân</a>
                        <span>/</span>
                        <a href="#" class="current">Tour yêu thích</a>
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
                                            <span><?= $count ?></span>
                                        </div>
                                    </button>
                                </a>
                            </div>
                        </div>
                        <div class="user-right">
                            <div class="d-user">
                                <div class="img">
                                    <figure><img class="avater" src="<?= ($currentLogin->avatar != '') ? $currentLogin->avatar : get_template_directory_uri() . '/dist/images/user.png' ?>" alt="user"></figure>
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
                    <h1>Tour yêu thích</h1>
                    <div class="bar-right">
                        <form action="">
                            <div class="search-dash">
                                <button><i class="fal fa-search"></i></button>
                                <input name="search_tour" type="text" placeholder="Bạn có thể tìm kiếm theo tên tour">
                            </div>
                        </form>
                    </div>
                </div>
                <div class="list-dash">
                    <div class="list-tour--like">
                        <div class="row">
                            <?php 
                                foreach($listFavorites as $listFavorite){
                                ?> 
                                    <div class="col-md-6 col-item">
                                        <div class="hotel-item">
                                            <div class="img">
                                                <a href="<?= get_permalink($listFavorite->product_id) ?>">
                                                    <figure><img src="<?= get_the_post_thumbnail($listFavorite->product_id); ?>"></figure>
                                                </a>
                                            </div>
                                            <div class="desc">
                                                <div class="box">
                                                    <div class="title">
                                                        <h3><a href="<?= get_permalink($listFavorite->product_id) ?>"><?= $listFavorite->name_product?></a></h3>
                                                        <div class="follow follow_check_<?= $listFavorite->product_id?> active" data-id="<?= $listFavorite->product_id?>"><i class="fas fa-heart"></i></div>
                                                    </div>
                                                    <div class="write">
                                                        <strong>0 <i class="fas fa-star"></i></strong><span>|</span>
                                                        <p>(0 đánh giá)</p>
                                                    </div>
                                                    <div class="tag">
                                                        <ul>
                                                            <li class="tags-ht" data-id="75">Tour ngắn ngày</li>
                                                        </ul>
                                                    </div>
                                                    <div class="more-info">
                                                        <div class="address">
                                                            <ul class="list-address">
                                                                <li><i class="fas fa-map-marker-alt"></i>Lâm Đồng</li>
                                                                <li><i class="fas fa-stopwatch"></i>4 ngày 3 đêm</li>
                                                                <li><i class="fas fa-plane"></i>
                                                            </ul>
                                                        </div>
                                                        <div class="price">
                                                            <span>Giá:</span>
                                                            <strong>5,000,000 đ</strong>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php
                                }
                            ?>
                        </div>
                    </div>
                    <!--                        <div class="pagra">-->
                    <!--                            <a href="#"><i class="far fa-angle-left"></i></a>-->
                    <!--                            <a href="#">1</a>-->
                    <!--                            <a href="#">2</a>-->
                    <!--                            <a href="#" class="current">3</a>-->
                    <!--                            <a href="#">...</a>-->
                    <!--                            <a href="#"><i class="far fa-angle-right"></i></a>-->
                    <!--                        </div>-->
                </div>
            </div>
        </div>
    </section>
</main>
<?php
get_footer('dash');
?>
<script>
    $(document).ready(function() {
        $('.tags-ht').on('click', function(e) {
            e.preventDefault(); // Ngăn chặn hành vi mặc định của thẻ <a>
            var id = $(this).data('id');
            window.location.href = '<?= get_permalink(getIdPage('list_tour')) ?>?tags=' + id;
        });
    })
</script>