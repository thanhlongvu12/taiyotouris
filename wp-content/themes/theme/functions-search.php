<?php
/**
 * Created by PhpStorm.
 * User: VuThanhLong
 * Date: 11/9/2023
 * Time: 2:19 PM
 */

add_action('wp_ajax_searchCategory', 'searchCategory');
add_action('wp_ajax_nopriv_searchCategory', 'searchCategory');

function searchCategory(){
    $cate = $_POST['cate'];
    $ngayDi = $_POST['ngayDi'];
    $ngayVe = $_POST['ngayVe'];
    $args = array(
        'post_type' => 'taiyo_tour',
        'tax_query'=>array(
            array(
                'taxonomy' => 'tour_category',
                'field' => 'slug',
                'terms' => $cate[0]
            )
        ),
        'orderby'=>'ID',
        'order'=>'DESC'
    );
    $query = new WP_Query($args);
    $tours = $query->posts;
    $result = "";
    foreach ($tours as $tour) {
        $departure = get_field('departure_schedule', $tour->ID);
        foreach ($departure as $item){
            $dateTime = DateTime::createFromFormat('d/m/Y', $item['day_start']);
            $newFormat = $dateTime->format('Y-m-d');
            $dateTimeReturn = DateTime::createFromFormat('d/m/Y', $item['return_date']);
            $newFormatReturn = $dateTimeReturn->format('Y-m-d');
            if($newFormat >= $ngayDi && $newFormatReturn <= $ngayVe){
                $time = get_field('time', $tour->ID);
                $location = get_field('location', $tour->ID);
                $result .= '<div class="hotel-item">
                                    <div class="img">
                                        <figure><img src="'. get_the_post_thumbnail($tour->ID) .'" alt="blog"></figure>
                                    </div>
                                    <div class="desc">
                                        <div class="title">
                                            <h3><a href="'.$tour->guid.'">'.$tour->post_title.'</a></h3>
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
                                                <li>'. $location['to'] .'</li>
                                                <li>Giá tốt</li>
                                                <li>Gần biển</li>
                                                <li>Luxury</li>
                                            </ul>
                                        </div>
                                        <div class="more-info">
                                            <div class="address">
                                                <ul class="list-address">
                                                    <li><i class="fas fa-map-marker-alt"></i>'.$location['to'].'</li>
                                                    <li><i class="fas fa-stopwatch"></i> '. $time['day'].' ngày '. $time['night'].' đêm</li>
                                                    <li><i class="fas fa-plane"></i>Máy bay</li>
                                                </ul>
                                                <p>* Chấp nhận khách sau 24h</p>
                                            </div>
                                            <div class="price">
                                                <span>Giá chỉ từ:</span>
                                                <strong>'. number_format(get_field('price', $tour->ID), 0, ',', ',').' đ</strong>
                                            </div>
                                        </div>
                                    </div>
                                </div>';
                break;
            }
        }
    }
    echo $result;
    die();
}