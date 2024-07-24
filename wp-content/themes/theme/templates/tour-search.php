<?php
/**
 * Created by PhpStorm.
 * User: VuThanhLong
 * Date: 11/7/2023
 * Time: 3:22 PM
 * Template Name: Tour Search
 */
$uri = get_template_directory_uri();

$locationSearch = $_GET['city'];
$ngayDi = $_GET['ngay_di'];
$ngayVe = $_GET['ngay_ve'];

$termCategoryTour = get_terms(array(
    'taxonomy' => 'tour_category',
    'hide_empty' => false,
    'orderby'=>'ID',
    'order'=>'DESC'
));

$args = array(
    'post_type' => 'taiyo_tour',
    'meta_query' => array(
        array(
            'key' => 'location_to',
            'value' => $locationSearch,
            'compare' => '='
        ),
    ),
);

$tours = new WP_Query($args);

get_header();
?>
<main id="category-tour-2">
    <section class="category-hotel-1 category-hotel-2__1" style="background-image: url('<?= $uri?>/dist/images/cate-hotel-21.png')">
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
                        <button><img src="<?= $uri?>/dist/images/search.svg" alt="search">Tìm kiếm</button>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="category-hotel-2__2" style="background-image: url('<?= $uri?>/dist/images/cate-hotel-2.png')">
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
                                        <div class="price-slider"></div>
                                        <p class="price-value"></p>
                                        <input type="hidden" id="price-min" value="">
                                        <input type="hidden" id="price-max" value="">
                                    </div>
                                </div>
                            </div>
                            <div class="list-bar">
                                <h2>Loại tour</h2>
                                <div class="list-option category-tour">
                                    <?php
                                    foreach ($termCategoryTour as $term){
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
                            <?php
                            foreach ($tours->posts as $tour){
                                ?>
                                <div class="hotel-item">
                                    <div class="img">
                                        <figure><img src="<?= get_the_post_thumbnail($tour->ID); ?>" alt="blog"></figure>
                                    </div>
                                    <div class="desc">
                                        <div class="title">
                                            <h3><a href="<?= $tour->guid?>"><?= $tour->post_title?></a></h3>
                                            <button class="follow"><i class="fas fa-heart"></i></button>
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
                                                <?php
                                                $location = get_field('location', $tour->ID);
                                                ?>
                                                <li><?= $location['to']; ?></li>
                                                <li>Giá tốt</li>
                                                <li>Gần biển</li>
                                                <li>Luxury</li>
                                            </ul>
                                        </div>
                                        <div class="more-info">
                                            <div class="address">
                                                <ul class="list-address">
                                                    <li><i class="fas fa-map-marker-alt"></i><?= $location['to']; ?></li>
                                                    <?php
                                                    $time = get_field('time', $tour->ID);
                                                    ?>
                                                    <li><i class="fas fa-stopwatch"></i><?= $time['day']?> ngày <?= $time['night']?> đêm</li>
                                                    <li><i class="fas fa-plane"></i>Máy bay</li>
                                                </ul>
                                                <p>* Chấp nhận khách sau 24h</p>
                                            </div>
                                            <div class="price">
                                                <span>Giá chỉ từ:</span>
                                                <strong><?= number_format(get_field('price', $tour->ID), 0, ',', ',')?> đ</strong>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?php
                            }
                            ?>
                            <div class="pagra">
                                <a href="#"><i class="far fa-angle-left"></i></a>
                                <a href="#">1</a>
                                <a href="#">2</a>
                                <a href="#" class="current">3</a>
                                <a href="#">...</a>
                                <a href="#"><i class="far fa-angle-right"></i></a>
                            </div>
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
    
    jQuery(document).ready(function ($) {
        $('.category-tour input').on('change', function () {
            filtersCate = [];
            $('.category-tour input:checked').each(function(index, elem) {
                filtersCate.push($(elem).val());
            });

            if ($('.category-tour input:checked').length != 0){
                $.ajax({
                    url: '<?php echo admin_url('admin-ajax.php'); ?>',
                    type: 'post',
                    datatype: 'json',
                    data:{
                        action: 'searchCategory',
                        cate : filtersCate,
                        ngayDi : "<?= $ngayDi?>",
                        ngayVe: "<?= $ngayVe?>",
                    },
                    beforeSend:function () {
                        $('.divgif').css('display', 'block');
                    },
                    success:function (result) {
                        $('.divgif').css('display', 'none');
                        $('.tour-list').html(result);
                    }
                })
            }
        })
    })
    
</script>
