<?php
/**
 * Created by PhpStorm.
 * User: VuThanhLong
 * Date: 11/7/2023
 * Time: 2:35 PM
 * Template Name: Hotel
 */
$uri = get_template_directory_uri();
$obj = get_queried_object();

$args = new WP_Query(array(
    'post_type' => 'taiyo_hotel',
    'posts_per_page' => 6,
    'post_parent' => 0

));
$posts = $args->posts;
// echo json_encode($posts);
// die;

$idlogin = getIdPage('login');
$currentLogin = getLogin();

$taxonomy = 'tourist_attraction'; // Thay 'tourist_attraction' bằng tên thực của taxonomy mà bạn muốn lấy tất cả các term

// Lấy danh sách các term của taxonomy
$tourist_attraction = get_terms(array(
    'taxonomy' => $taxonomy,
    'hide_empty' => false, // Bao gồm cả các term không có bài viết
));

$list_hotel = get_field('list', $obj->ID);

get_header();
?>
<main id="category-hotel">
    <section class="category-hotel-1" style="background-image: url('<?= $uri?>/dist/images/cate-hotel-1.png')">
        <div class="container">
            <div class="content">
                <div class="link-breacrumb">
                    <div class="url-link"><a href="#">Trang chủ</a><span>/</span><a href="#" class="link-current">Khách sạn</a></div>
                    <h1>Khách sạn</h1>
                </div>
                <div class="book-option">
                    <div class="item">
                        <strong>Bạn muốn tìm khách sạn ở</strong>
                        <select name="city_hotel" id="city_hotel">
                            <option value="1">Thành phố, điểm đến</option>
                        </select>
                    </div>
                    <div class="item">
                        <strong>Ngày nhận phòng</strong>
                        <div class="date">
                            <input type="text" id="date2" placeholder="Chọn ngày khởi hành"><i class="fas fa-calendar-check"></i>
                        </div>
                    </div>
                    <div class="item">
                        <strong>Số khách</strong>
                        <select name="sl" id="sl">
                            <option value="2">2 người</option>
                            <option value="4">4 người</option>
                            <option value="6">6 người</option>
                            <option value="8">8 người</option>
                            <option value="9">>8 người</option>
                        </select>
                    </div>
                    <div class="item">
                        <button id="search_hotel"><img src="<?= $uri?>/dist/images/search.svg" alt="search">Tìm kiếm</button>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="category-hotel-2">
        <div class="container">
            <div class="content">
                <div class="section-list-hotel">
                    <div class="title">
                        <h2>Chuỗi khách sạn TaiyoTourist</h2>
                        <p>Các khách sạn được tìm kiếm & đặt nhiều nhất do Taiyotourist đề xuất</p>
                    </div>
                    <div class="list-hotel">
                        <div class="swiper slide-listhotel listhotelSwiper">
                            <div class="swiper-wrapper">
                                <?php
                                foreach ($list_hotel as $val){
                                    // $terms = get_terms(array(
                                    //     'taxonomy' => 'tourist_attraction',
                                    //     'object_ids' => $val->ID,
                                    // ));
                                    // echo json_encode($terms);
                                    // die;
                                    $detail = get_field('detail', $val->ID);
                                    ?>
                                    <div class="swiper-slide">
                                        <div class="h-col">
                                            <div class="h-item">
                                                <a href="<?= get_permalink($val->ID) ?>">
                                                    <div class="img">
                                                        <figure><img src="<?= get_the_post_thumbnail_url($val->ID) ?>" alt="blog"></figure>
                                                        <button class="follow"><i class="far fa-heart"></i></button>
                                                    </div>
                                                    <div class="desc">
                                                        <h3><?= $val->post_title ?></h3>
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
                                                                <!-- <li><?= $terms[0]->name?></li> -->
                                                                <li>Giá tốt</li>
                                                                <li>Gần biển</li>
                                                                <li>Luxury</li>
                                                            </ul>
                                                        </div>
                                                        <div class="price">
                                                            <strong><?= number_format($detail['price'], 0, '.', '.')?>Đ</strong>
                                                            <p>* Chấp nhận khách sau 24h</p>
                                                        </div>
                                                    </div>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <?php
                                }
                                ?>
                            </div>
                        </div>
                        <div class="swiper-button-prev"><i class="fal fa-chevron-left"></i></div>
                        <div class="swiper-button-next"><i class="fal fa-chevron-right"></i></div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="category-hotel-3" style="background-image: url('<?= $uri?>/dist/images/cate-hotel-2.png')">
        <div class="container">
            <div class="content">
                <div class="section-list-hotel">
                    <div class="title">
                        <h2>Sang trọng & Đẳng cấp</h2>
                        <p>Nâng tầm du lịch với các top thương hiệu khách sạn, biệt thự hàng đầu</p>
                    </div>
                    <div class="list-hotel">
                        <div class="row">
                            <?php
                            foreach ($posts as $post){
                                // $terms = get_terms(array(
                                //     'taxonomy' => 'tourist_attraction',
                                //     'object_ids' => $val->ID,
                                // ));
                                $detail = get_field('detail', $val->ID);
                                ?>
                                <div class="col-md-4 h-col">
                                    <div class="h-item">
                                        <a href="<?= $post->guid?>">
                                            <div class="img">
                                                <figure><img src="<?= get_the_post_thumbnail_url($post->ID)?>" alt="blog"></figure>
                                                <button class="follow"><i class="far fa-heart"></i></button>
                                            </div>
                                            <div class="desc">
                                                <h3><?= $post->post_title?></h3>
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
                                                        <!-- <li><?= $terms[0]->name?></li> -->
                                                        <li>Giá tốt</li>
                                                        <li>Gần biển</li>
                                                        <li>Luxury</li>
                                                    </ul>
                                                </div>
                                                <div class="price">
                                                    <strong><?= number_format($detail['price'], 0, '.', '.')?>Đ</strong>
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
                        <div class="swiper slide-discover discoverslideSwiper">
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
            </div>
        </div>
    </section>
    <input type="hidden" id="datacity" value="<?= get_template_directory_uri() ?>/vn_city.json">
</main>
<?php get_footer(); ?>
<script>
    jQuery(document).ready(function() {
        var listhotel = new Swiper(".listhotelSwiper", {
            grabCursor: true,
            slidesPerView: "3",
            spaceBetween: 20,
            slideToClickedSlide: true,
            loop: true,
            navigation: {
                nextEl: ".swiper-button-next",
                prevEl: ".swiper-button-prev",
            },
        });
        var discover = new Swiper(".discoverslideSwiper", {
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
    });

    jQuery(function () {
        jQuery("#date2").datepicker({
            minDate: '+1'
        });
        jQuery("#date3").datepicker();
        jQuery("#date4").datepicker();
    });
    jQuery(document).ready(function () {
        $('#search_hotel').on('click', function () {
            var city_hotel = $('#city_hotel').find(':selected').val();
            var sl = $('#sl').find(':selected').val();
            var date2 = $('#date2').val();
            setTimeout(function () {
                window.location.href = '<?= get_permalink(getIdPage('hotel-search')) ?>?slughotel=' + city_hotel + '&sl=' + sl + '&datehotel=' + date2;
            }, 500);
        })
        $('.tourist_attraction').on('click', function () {
            var slug = $(this).data('slug');

            setTimeout(function () {
                window.location.href = '<?= get_permalink(getIdPage('hotel-search')) ?>?location=' + slug;
            }, 500);
        })
    });
</script>
<script>
    $(document).ready(function () {
        var vietnam;
        var datacity = $("#datacity").val();
        $.getJSON(datacity, function (data) {
            vietnam = data.items;

            var citydb = $("#citydb").val();
            var districtdb = $("#districtdb").val();
            var wardsdb = $("#wardsdb").val();
            // Show thành phố và gán mảng huyện
            var huyen = [];
            var cityhtml = "";
            var keycity, keydistrict, keywards;
            for (var i = 0; i < vietnam.length; i++) {
                var nameCity = vietnam[i].name;
                if (nameCity == "Thành phố Hà Nội" || nameCity == "Thành phố Hồ Chí Minh") {
                    var name1 = nameCity.replace("Thành phố ", '');
                    var selected = "";
                    if (name1 == citydb) {
                        keycity = i;
                        selected = "selected";
                    }
                    cityhtml = cityhtml + '<option ' + selected + ' data-key="' + i + '" value="' + name1 + '">' + name1 + '</optiondata-key>';
                } else {
                    var name2 = nameCity.replace("Tỉnh ", '');
                    var selected = "";
                    if (name2 == citydb) {
                        keycity = i;
                        selected = "selected";
                    }
                    cityhtml = cityhtml + '<option ' + selected + ' data-key="' + i + '" value="' + name2 + '">' + name2 + '</option>';
                }
                huyen[i] = vietnam[i].huyen;
            }
            $("#city").append(cityhtml);
            $("#city_from").append(cityhtml);
            $("#city_hotel").append(cityhtml);
            $("#tour").append(cityhtml);
        });
    });
</script>
