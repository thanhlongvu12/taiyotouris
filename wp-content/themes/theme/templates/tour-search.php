<?php

/**
 * Created by PhpStorm.
 * User: VuThanhLong
 * Date: 11/7/2023
 * Time: 3:22 PM
 * Template Name: Tour Search
 */
$uri = get_template_directory_uri();

if (!empty($_GET['slug_tour'])) {
    $location = $_GET['slug_tour'];
}
if (!empty($_GET['city_start'])) {
    $locationStart = $_GET['city_start'];
}
if (!empty($_GET['date_start'])) {
    $dateStart = $_GET['date_start'];
}
if (!empty($_GET['date_end'])) {
    $dateEnd = $_GET['date_end'];
}


$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;

$termCategoryTour = get_terms(array(
    'taxonomy' => 'tour_category',
    'hide_empty' => false,
    'orderby' => 'ID',
    'order' => 'DESC'
));

$args = array(
    'post_type' => 'taiyo_tour',
    // 'meta_query' => array(
    //     array(
    //         'key' => 'location_to',
    //         'value' => $location,
    //         'compare' => '='
    //     ),
    // ),
    'posts_per_page' => 10, // Number of posts per page
    'paged' => $paged // Current page number
);

$tours = new WP_Query($args);
$currentLogin = getLogin();
get_header('v2');
?>
<style>
    .category-hotel-2__2 .content .main-content .col-left .list-bar .price-range .price-bar .price-slider {
        background: #eaeaea;
        border-radius: 10px;
        border: 0;
        height: 0.7em;
    }

    .category-hotel-2__2 .content .main-content .col-left .list-bar .price-range .price-bar .price-slider .ui-slider-range {
        background: var(--cl-red);
    }

    .category-hotel-2__2 .content .main-content .col-left .list-bar .price-range .price-bar .price-slider .ui-slider-handle {
        background: var(--cl-red);
        border: 2px solid var(--cl-white);
        border-radius: 50%;
        width: 20px;
        height: 20px;
        box-shadow: 0px 4px 6px 0px rgba(0, 0, 0, 0.2);
    }

    .category-hotel-2__2 .content .main-content .col-left .list-bar .price-range .price-bar .price-value {
        margin-top: 15px;
        font-size: 16px;
        line-height: 18px;
        font-family: var(--f-body);
        font-weight: 500;
        color: var(--cl-black);
        display: block;
        text-align: center;
    }

    button,
    input,
    optgroup,
    select,
    textarea {
        font-family: inherit;
        font-size: 100%;
        line-height: 1.15;
        margin: 0;
    }
</style>
<main id="category-tour-2" class="main-v2">
    <section class="category-hotel-1 category-hotel-2__1" style="background-image: url('<?= $uri ?>/dist/images/cate-hotel-21.png')">
        <div class="container">
            <div class="content">
                <div class="book-option">
                    <div class="item">
                        <strong>Bạn muốn đi</strong>
                        <select name="city" id="city">
                            <option value="Phú Quốc">Phú Quốc</option>
                            <option value="Hàn Quốc">Hàn Quốc</option>
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
                        <button><img src="<?= $uri ?>/dist/images/search.svg" alt="search">Tìm kiếm</button>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="category-hotel-2__2" style="background-image: url('<?= $uri ?>/dist/images/cate-hotel-2.png')">
        <div class="container">
            <div class="content">
                <div class="url-link">
                    <a href="#">Trang chủ</a><span>/</span><a href="#">Tour</a><span>/</span><a href="#" class="current">Phú Quốc</a>
                </div>
                <div class="main-content">
                    <div class="row">
                        <div class="col-md-3 col-left">
                            <div class="list-bar">
                                <h2>Khoảng giá</h2>
                                <div id="price-range" class="price-range">
                                    <div class="price-bar">
                                        <div class="price-slider ui-slider ui-corner-all ui-slider-horizontal ui-widget ui-widget-content">
                                            <div class="ui-slider-range ui-corner-all ui-widget-header" style=""></div>
                                            <span tabindex="0" class="ui-slider-handle ui-corner-all ui-state-default" style="left: 0%;"></span>
                                            <span tabindex="0" class="ui-slider-handle ui-corner-all ui-state-default" style="left: 100%;"></span>
                                        </div>
                                        <p class="price-value">0đ - 100,000,000đ</p>
                                        <input type="hidden" id="price-min" value="">
                                        <input type="hidden" id="price-max" value="">
                                    </div>
                                </div>
                            </div>
                            <div class="list-bar">
                                <h2>Loại tour</h2>
                                <div class="list-option category-tour">
                                    <?php
                                    foreach ($termCategoryTour as $term) {
                                    ?>
                                        <div class="item-check">
                                            <input type="radio" name="cate" value="<?= $term->slug; ?>" id="<?= $term->slug; ?>">
                                            <label for="1"><?= $term->name; ?></label>
                                        </div>
                                    <?php
                                    }
                                    ?>
                                </div>
                            </div>
                            <div class="list-bar">
                                <h2>Chủ đề</h2>
                                <div class="list-option">
                                    <div class="item-check"><input type="checkbox" name="1" id="1"><label for="1">Khách sạn</label></div>
                                    <div class="item-check"><input type="checkbox" name="1" id="1"><label for="1">Tour Khám Phá và Trải Nghiệm Làng Nghề</label></div>
                                    <div class="item-check"><input type="checkbox" name="1" id="1"><label for="1">Vé Vui Chơi Giải Trí</label></div>
                                    <div class="item-check"><input type="checkbox" name="1" id="1"><label for="1">Combo Camping/Picnic 1 Ngày</label></div>
                                    <div class="item-check"><input type="checkbox" name="1" id="1"><label for="1">Tour Khám Phá Văn Hóa Làng Nghề Việt Nam</label></div>
                                    <div class="item-check"><input type="checkbox" name="1" id="1"><label for="1">Tour Du Lịch Tâm Linh Việt Nam</label></div>
                                    <div class="item-check"><input type="checkbox" name="1" id="1"><label for="1">Tour Miền Tây</label></div>
                                    <div class="item-check"><input type="checkbox" name="1" id="1"><label for="1">Tour Xuyên Việt</label></div>
                                    <div class="item-check"><input type="checkbox" name="1" id="1"><label for="1">Tour Nghỉ Dưỡng và Chơi Golf Cao Cấp</label></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-9 col-right tour-list">
                            <div class="list-tour-search">
                            <?php
                                foreach ($tours->posts as $tour) {
                                    $location = get_field('location_to', $tour->ID);
                                    $termTourCatgory = get_the_terms($tour->ID, 'tour_category');
                                    if (!empty(get_the_terms($tour->ID, 'theme_tourist'))) {
                                        $termTopics = get_the_terms($tour->ID, 'theme_tourist');
                                    }
                                    if($currentLogin){
                                        $checkFavorite = $wpdb->get_row("SELECT * FROM user_favorite where product_id = {$tour->ID} AND user_id = {$currentLogin->id}");
                                    }
                                ?>
                                    <div class="hotel-item">
                                        <div class="img">
                                            <figure><img src="<?= get_the_post_thumbnail($tour->ID); ?>" alt="blog"></figure>
                                        </div>
                                        <div class="desc">
                                            <div class="title">
                                                <h3><a href="<?= $tour->guid ?>"><?= $tour->post_title ?></a></h3>
                                                <div class="follow follow_check_<?= $tour->ID ?> <?= (!empty($checkFavorite)) ? 'active' : '' ?>" data-id="<?= $tour->ID ?>"><i class="fal fa-heart"></i></div>
                                            </div>
                                            <div class="rate">
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                            </div>
                                            <div class="write"><strong>4.0 Rất tốt</strong><span>(1.27k đánh giá)</span></div>
                                            <div class="tag">
                                                <ul>
                                                    <li><?= $termTourCatgory[0]->name; ?></li>
                                                    <?php
                                                    if (!empty(get_the_terms($tour->ID, 'theme_tourist'))) {
                                                        foreach ($termTopics as $termTopic) {
                                                    ?>
                                                            <li><?= $termTopic->name ?></li>
                                                    <?php
                                                        }
                                                    }
                                                    ?>
                                                </ul>
                                            </div>
                                            <div class="more-info">
                                                <div class="address">
                                                    <ul class="list-address">
                                                        <li><i class="fas fa-map-marker-alt"></i><?= $location; ?></li>
                                                        <?php
                                                        $time = get_field('tour_time', $tour->ID);
                                                        ?>
                                                        <li><i class="fas fa-stopwatch"></i><?= $time; ?> đêm</li>
                                                        <li><i class="fas fa-plane"></i>Máy bay</li>
                                                    </ul>
                                                    <p>* Chấp nhận khách sau 24h</p>
                                                </div>
                                                <div class="price">
                                                    <span>Giá chỉ từ:</span>
                                                    <strong><?= number_format(get_field('price', $tour->ID), 0, ',', ',') ?> đ</strong>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php
                                }
                            ?>
                            </div>
                            <?php
                            $pagination_links = paginate_links(array(
                                'total' => $tours->max_num_pages,
                                'current' => $paged,
                                'format' => '?paged=%#%',
                                'prev_text' => '<i class="far fa-angle-left"></i>',
                                'next_text' => '<i class="far fa-angle-right"></i>',
                                'type' => 'array' // Return an array of links
                            ));

                            // Output pagination in your custom structure
                            if ($pagination_links) :
                                echo '<div class="pagra">';
                                foreach ($pagination_links as $link) {
                                    // Replace 'current' class to highlight the current page in your pagination
                                    if (strpos($link, 'current') !== false) {
                                        $link = str_replace('page-numbers current', 'current', $link);
                                    }
                                    echo $link;
                                }
                                echo '</div>';
                            endif;
                            ?>
                        </div>
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
    jQuery(document).ready(function($) {
        jQuery(function() {
            jQuery("#date8").datepicker();
            jQuery("#date9").datepicker();
        });
        jQuery(".price-slider").slider({
            range: true,
            min: 0,
            max: 10000000,
            values: [900000, 5000000],
            slide: function(event, ui) {
                jQuery(".price-value").text(ui.values[0] + "đ" + " - " + ui.values[1] + "đ");
                price = jQuery("#price-min").val(ui.values[0]);
                jQuery("#price-max").val(ui.values[1]);
            }
        });
        jQuery(".price-value").text(jQuery(".price-slider").slider("values", 0) + "đ" +
            " - " + jQuery(".price-slider").slider("values", 1) + "đ");
    });

    jQuery(document).ready(function($) {
        $('.category-tour input').on('change', function() {
            filtersCate = [];
            $('.category-tour input:checked').each(function(index, elem) {
                filtersCate.push($(elem).val());
            });

            if ($('.category-tour input:checked').length != 0) {
                $.ajax({
                    url: '<?php echo admin_url('admin-ajax.php'); ?>',
                    type: 'post',
                    datatype: 'json',
                    data: {
                        action: 'searchCategory',
                        cate: filtersCate,
                        ngayDi: "<?= $ngayDi ?>",
                        ngayVe: "<?= $ngayVe ?>",
                    },
                    beforeSend: function() {
                        $('.divgif').css('display', 'block');
                    },
                    success: function(result) {
                        $('.divgif').css('display', 'none');
                        $('.tour-list').html(result);
                    }
                })
            }
        })
    })
</script>
<script>
    jQuery(document).ready(function($) {
        let ajaxTimeout;

        function money_check(number) {
            return number.toLocaleString('en-US', {
                style: 'decimal',
                minimumFractionDigits: 0
            });
        }

        jQuery(".price-slider").slider({
            range: true,
            min: 0,
            max: 100000000,
            values: [0, 100000000],
            slide: function(event, ui) {
                var min = Math.round(ui.values[0] / 100000) * 100000;
                var max = Math.round(ui.values[1] / 100000) * 100000;

                jQuery(".price-value").text(money_check(min) + "đ - " + money_check(max) + "đ");
                jQuery("#price-min").val(min);
                jQuery("#price-max").val(max);

                clearTimeout(ajaxTimeout);

                // Đặt timeout mới, chỉ thực hiện AJAX sau khi ngừng kéo trong 500ms
                ajaxTimeout = setTimeout(function() {
                    searchLive(); // Hàm gọi lệnh AJAX
                }, 100); // Delay 500ms
            }
        });
        jQuery(".price-value").text(money_check(jQuery(".price-slider").slider("values", 0)) + "đ" +
            " - " + money_check(jQuery(".price-slider").slider("values", 1)) + "đ");
        $('#search_tour').on('click', function() {
            var tour = $('#tour').find(':selected').val();
            var citytour = $('#city').find(':selected').val();
            var datetour = $('#date1').val();
            setTimeout(function() {
                window.location.href = '<?= get_permalink(getIdPage('tour-search')) ?>?slugTour=' + tour + '&citytour=' + citytour + '&datetour=' + datetour;
            }, 500);
        });
        var ajax_url = "<?= admin_url('admin-ajax.php') ?>";
        $('.term_tour').on('click', function(e) {
            // e.preventDefault();
            // var value = $("input[name='bu-radio']:checked").val();
            searchLive();
        });
        $('.location_tour').on('click', function(e) {
            // e.preventDefault();
            // var value = $("input[name='bu-radio']:checked").val();
            searchLive();
        });
        $('.theme_tourist').on('click', function(e) {
            // e.preventDefault();
            // var value = $("input[name='bu-radio']:checked").val();
            searchLive();
        });
        $('.tags_tour').on('click', function(e) {
            // e.preventDefault();
            // var value = $("input[name='bu-radio']:checked").val();
            searchLive();
        });

        $('.item-check-title').on('click', function(e) {
            // e.preventDefault();
            var value = $("input[name='search-checked']:checked").val();
            console.log(value);
        })

        function searchLive() {
            var values = [];
            $("input[name='theme_tourist-radio']:checked").each(function() {
                values.push($(this).val());
            });
            var tags_tour = [];
            $("input[name='tags_tour-radio']:checked").each(function() {
                tags_tour.push($(this).val());
            });
            
            clearTimeout(ajaxTimeout);
            ajaxTimeout = setTimeout(function() {
                $.ajax({
                    url: ajax_url,
                    method: 'POST',
                    data: {
                        action: 'liveSearch',
                        slugTour: $('#tour').val(),
                        term_tour: $("input[name='term_tour-radio']:checked").val(),
                        location_tour: $("input[name='location_tour-radio']:checked").val(),
                        tags_tour: tags_tour,
                        theme_tourist: values,
                        citytour: $('#city').val(),
                        datetour: $('#date1').val(),
                        min: $('#price-min').val(),
                        max: $('#price-max').val(),
                    },
                    beforeSend: function() {
                        $('.divgif').css('display', 'block');
                    },
                    success: function(resule) {
                        $('.list-tour-search').html(resule);
                        $('.divgif').css('display', 'none');
                    },
                    error: function(error) {
                        console.log(error);
                    }
                });
            }, 500);
        }
    });
</script>