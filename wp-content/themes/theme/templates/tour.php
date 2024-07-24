<?php
/**
 * Created by PhpStorm.
 * User: VuThanhLong
 * Date: 11/7/2023
 * Time: 3:08 PM
 * Template Name: Tour
 */
$uri = get_template_directory_uri();

$argsNoiDia = array(
    'post_type' => 'taiyo_tour',
    'tax_query'=>array(
        array(
            'taxonomy' => 'tour_category',
            'field' => 'slug',
            'terms' => 'noi-dia'
        )
    ),
    'orderby'=>'ID',
    'order'=>'DESC'
);

$argsQuocTe = array(
    'post_type' => 'taiyo_tour',
    'tax_query'=>array(
        array(
            'taxonomy' => 'tour_category',
            'field' => 'slug',
            'terms' => 'quoc-te'
        )
    ),
    'orderby'=>'ID',
    'order'=>'DESC'
);

$toursNoiDia = new WP_Query($argsNoiDia);
$toursQuocTe = new WP_Query($argsQuocTe);

get_header();
?>
<main id="category-tour">
    <section class="category-hotel-1" style="background-image: url('<?= $uri?>/dist/images/cate-hotel-1.png')">
        <div class="container">
            <div class="content">
                <form action="<?= get_permalink(getIdPage('tour-search')); ?>" method="get">
                    <div class="book-option">
                        <div class="item">
                            <strong>Bạn muốn đi</strong>
                            <select name="city" id="city">
                                <option value="Phú Quốc">Phú Quốc</option>
                                <option value="Hàn Quốc">Hàn Quốc</option>
                            </select>
                        </div>
                        <div class="item">
                            <strong>Ngày đi</strong>
                            <div class="date"><input type="date" name="ngay_di" value="" min="<?= date('Y-m-d');?>"></div>
                        </div>
                        <div class="item">
                            <strong>Ngày về</strong>
                            <div class="date"><input type="date" name="ngay_ve" value="" min="<?= date('Y-m-d');?>"></div>
                        </div>
                        <div class="item">
                            <button><img src="<?= $uri?>/dist/images/search.svg" alt="search">Tìm kiếm</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
    <section class="category-hotel-3 category-tour-2" style="background-image: url('<?= $uri?>/dist/images/cate-hotel-2.png')">
        <div class="container">
            <div class="content">
                <div class="main-content">
                    <div class="section-list-hotel">
                        <div class="list-hotel">
                            <div class="title">
                                <h2>Tour nội địa</h2>
                                <p>Các tour du lịch được tìm kiếm & đặt nhiều nhất do Taiyotourist đề xuất</p>
                            </div>
                            <div class="row">
                                <?php
                                foreach ($toursNoiDia->posts as $item) {
                                    ?>
                                    <div class="col-md-4 h-col">
                                        <div class="h-item">
                                            <a href="<?= $item->guid?>">
                                                <div class="img">
                                                    <figure><img src="<?= get_the_post_thumbnail($item->ID); ?>" alt="blog"></figure>
                                                    <button class="follow"><i class="far fa-heart"></i></button>
                                                </div>
                                                <div class="desc">
                                                    <h3><?= $item->post_title?></h3>
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
                                                            <?php
                                                            $location = get_field('location', $item->ID);
                                                            ?>
                                                            <li><?= $location['to']; ?></li>
                                                            <li>Giá tốt</li>
                                                            <li>Gần biển</li>
                                                            <li>Luxury</li>
                                                        </ul>
                                                    </div>
                                                    <div class="price">
                                                        <strong><?= number_format(get_field('price', $item->ID), 0, '.', '.')?>Đ</strong>
                                                        <p>* Chấp nhận khách sau 24h</p>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                    <?php
                                }
                                ?>
                            </div>
                        </div>
                        <div class="list-hotel">
                            <div class="title">
                                <h2>Tour quốc tế</h2>
                                <p>Nâng tầm du lịch với các top những tour du lịch hàng đầu</p>
                            </div>
                            <div class="row">
                                <?php
                                foreach ($toursQuocTe->posts as $item) {
                                    ?>
                                    <div class="col-md-4 h-col">
                                        <div class="h-item">
                                            <a href="<?= $item->guid?>">
                                                <div class="img">
                                                    <figure><img src="<?= get_the_post_thumbnail($item->ID); ?>" alt="blog"></figure>
                                                    <button class="follow"><i class="far fa-heart"></i></button>
                                                </div>
                                                <div class="desc">
                                                    <h3><?= $item->post_title?></h3>
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
                                                            <?php
                                                            $location = get_field('location', $item->ID);
                                                            ?>
                                                            <li><?= $location['to']; ?></li>
                                                            <li>Giá tốt</li>
                                                            <li>Gần biển</li>
                                                            <li>Luxury</li>
                                                        </ul>
                                                    </div>
                                                    <div class="price">
                                                        <strong><?= number_format(get_field('price', $item->ID), 0, '.', '.')?>Đ</strong>
                                                        <p>* Chấp nhận khách sau 24h</p>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                    <?php
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                    <div class="discover">
                        <div class="title">
                            <h2>Khám phá Việt Nam</h2>
                            <p>Tận hưởng sự tư do theo cách của bạn</p>
                        </div>
                        <div class="disco-slide">
                            <div class="swiper slide-discover discovers1lideSwiper">
                                <div class="swiper-wrapper">
                                    <div class="swiper-slide">
                                        <div class="h-item">
                                            <div class="img">
                                                <figure><img src="<?= $uri?>/dist/images/about.png" alt="about"></figure>
                                            </div>
                                            <div class="desc">
                                                <strong>Phú Quốc</strong>
                                                <span>600 khách sạn</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="swiper-slide">
                                        <div class="h-item">
                                            <div class="img">
                                                <figure><img src="<?= $uri?>/dist/images/about.png" alt="about"></figure>
                                            </div>
                                            <div class="desc">
                                                <strong>Phú Quốc</strong>
                                                <span>600 khách sạn</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="swiper-slide">
                                        <div class="h-item">
                                            <div class="img">
                                                <figure><img src="<?= $uri?>/dist/images/about.png" alt="about"></figure>
                                            </div>
                                            <div class="desc">
                                                <strong>Phú Quốc</strong>
                                                <span>600 khách sạn</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="swiper-slide">
                                        <div class="h-item">
                                            <div class="img">
                                                <figure><img src="<?= $uri?>/dist/images/about.png" alt="about"></figure>
                                            </div>
                                            <div class="desc">
                                                <strong>Phú Quốc</strong>
                                                <span>600 khách sạn</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="swiper-slide">
                                        <div class="h-item">
                                            <div class="img">
                                                <figure><img src="<?= $uri?>/dist/images/about.png" alt="about"></figure>
                                            </div>
                                            <div class="desc">
                                                <strong>Phú Quốc</strong>
                                                <span>600 khách sạn</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="swiper-slide">
                                        <div class="h-item">
                                            <div class="img">
                                                <figure><img src="<?= $uri?>/dist/images/about.png" alt="about"></figure>
                                            </div>
                                            <div class="desc">
                                                <strong>Phú Quốc</strong>
                                                <span>600 khách sạn</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="swiper-slide">
                                        <div class="h-item">
                                            <div class="img">
                                                <figure><img src="<?= $uri?>/dist/images/about.png" alt="about"></figure>
                                            </div>
                                            <div class="desc">
                                                <strong>Phú Quốc</strong>
                                                <span>600 khách sạn</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="swiper-slide">
                                        <div class="h-item">
                                            <div class="img">
                                                <figure><img src="<?= $uri?>/dist/images/about.png" alt="about"></figure>
                                            </div>
                                            <div class="desc">
                                                <strong>Phú Quốc</strong>
                                                <span>600 khách sạn</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-button-prev"><i class="fal fa-chevron-left"></i></div>
                            <div class="swiper-button-next"><i class="fal fa-chevron-right"></i></div>
                        </div>
                    </div>
                    <div class="banner-tour">
                        <div class="row" style="align-items: center;">
                            <div class="col-md-5 col-left">
                                <div class="img">
                                    <figure><img src="<?= $uri?>/dist/images/about.png" alt="tour"></figure>
                                </div>
                            </div>
                            <div class="col-md-7 col-right">
                                <div class="text">
                                    <h2>Giới thiệu Tour đoàn</h2>
                                    <p>loremLorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. loremLorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. </p>
                                    <p>loremLorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>
<?php get_footer(); ?>
<script>
    var discover1 = new Swiper(".discovers1lideSwiper", {
        grabCursor: true,
        slidesPerView: "6",
        spaceBetween: 20,
        slideToClickedSlide: true,
        loop: true,
        navigation: {
            nextEl: ".swiper-button-next",
            prevEl: ".swiper-button-prev",
        },
    });
</script>
