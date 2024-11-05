<?php 
// User favorite
add_action('wp_ajax_nopriv_userFavorite', 'userFavorite');
add_action('wp_ajax_userFavorite', 'userFavorite');

function userFavorite()
{
    global $wpdb;
    if (!isset($_POST['productId'])) {
        $rs['status'] = error_code;
        $rs['mess'] = messerror . " Lỗi Validate";
        returnajax($rs);
    }

    $product_id = no_sql_injection(xss($_POST['productId']));
    $getUser = getLogin();
    if (empty($getUser)) {
        $rs['status'] = error_code;
        $rs['mess'] = auth_mess;
        returnajax($rs);
    }

    $checkFavorite = $wpdb->get_row("SELECT * FROM user_favorite where product_id = {$product_id} AND user_id = {$getUser->id}");
    if (!empty($checkFavorite)) {
        $wpdb->delete('user_favorite', array('id' => $checkFavorite->id));
        $rs['status'] = success_code;
        $rs['type'] = 0;
        $rs['mess'] = "Sản phẩm đã được xóa khỏi danh mục yêu thích của bạn!";
        returnajax($rs);
    } else {
        $post_type = get_post_type($product_id);
        $wpdb->insert(
            'user_favorite',
            array(
                'product_id' => $product_id,
                'name_product' => get_the_title($product_id),
                'user_id' => $getUser->id,
                'create_at' => date('Y-m-d H:i:s'),
                'type_order' => $post_type,
            )
        );
        $rs['status'] = success_code;
        $rs['type'] = 1;
        $rs['mess'] = 'Sản phẩm đã được thêm vào danh mục yêu thích của bạn!';
        returnajax($rs);
    }
}

add_action('wp_ajax_liveSearch', 'liveSearch');
add_action('wp_ajax_nopriv_liveSearch', 'liveSearch');

function liveSearch()
{
    $term_tour = $_POST['term_tour'];
    $tags_tour = $_POST['tags_tour'];
    $location_tour = $_POST['location_tour'];
    $theme_tourist = $_POST['theme_tourist'];
    $city = $_POST['slugTour'];
    $citytour = $_POST['citytour'];
    $datetour = $_POST['datetour'];
    $min = $_POST['min'];
    $max = $_POST['max'];


    $args = array(
        'post_type' => 'taiyo_tour',
        'posts_per_page' => -1,
        'meta_query' => array(
            'relation' => 'AND',

        ),
        // 'tax_query' => array(
        //     'relation' => 'AND', // Sử dụng OR để kết hợp các điều kiện
        // ),
    );
    // if (!empty($city) && $city != 1) {
    //     $args['meta_query'][] = array(
    //         'key' => 'location_to',
    //         'value' => $city,
    //         'compare' => 'LIKE'
    //     );
    // }
    // if (!empty($citytour) && $citytour != 1) {
    //     $args['meta_query'][] = array(
    //         'key' => 'location_form',
    //         'value' => $citytour,
    //         'compare' => 'LIKE'
    //     );
    // }
    if ((!empty($min) || $min == 0) && !empty($max)) {
        $args['meta_query'][] = array(
            'key' => 'price',
            'value' => array($min, $max),
            'type' => 'numeric',
            'compare' => 'BETWEEN'
        );
    }
    if (!empty($datetour)) {
        $start_date_obj = date_create_from_format('m/d/Y', $datetour);
        $formatted_date = date_format($start_date_obj, 'Ymd');
        // Tiếp tục sử dụng $convertedDate trong truy vấn
        $args['meta_query'][] = array(
            'key' => 'date',
            'value' => $formatted_date,
            'compare' => '='
        );


    }

    if (!empty($theme_tourist)) {
        $args['tax_query'][] = array(
            'taxonomy' => 'theme_tourist',
            'field' => 'slug',
            'terms' => $theme_tourist,
            'operator' => 'IN',
        );
    }
 if (!empty($tags_tour)) {
        $args['tax_query'][] = array(
            'taxonomy' => 'tags_tour',
            'field' => 'slug',
            'terms' => $tags_tour,
            'operator' => 'IN',
        );
    }


    if (!empty($term_tour)) {
        $args['tax_query'][] = array(
            'taxonomy' => 'danh_muc_tourist',
            'field' => 'slug',
            'terms' => $term_tour,
            'operator' => 'IN',
        );
    }

    if (!empty($location_tour)) {
        $args['tax_query'][] = array(
            'taxonomy' => 'location_tour',
            'field' => 'slug',
            'terms' => $location_tour,
            'operator' => 'IN',
        );
    }
    $queryTour = new WP_Query($args);

    $listTour = $queryTour->posts;

    $result = "";
    global $wpdb;
    if (!empty($listTour)) {
        foreach ($listTour as $tour) {
            $fieldLocationTo = get_field('location_to', $tour->ID);
            $fieldVehicle = get_field('vehicle', $tour->ID);
            $fieldTourTime = get_field('time_tour', $tour->ID);
            $fieldPriceTour = get_field('price', $tour->ID);
            $idlogin = getIdPage('login');
            $currentLogin = getLogin();
            $checkFavorite = $wpdb->get_row("SELECT * FROM user_favorite where product_id = {$tour->ID} AND user_id = {$currentLogin->id}");
            $reviews = $wpdb->get_results("SELECT * FROM reviews where product_id = {$tour->ID}  and status = 0 ");
            $averageQuery = "SELECT AVG(star_rating) as averageRating FROM reviews WHERE product_id = %d";
            $averageRating = $wpdb->get_var($wpdb->prepare($averageQuery, $tour->ID));
            $integerPart = intval($averageRating);

            $decimalPart = $averageRating - $integerPart;

            $star = '';
            for ($i = 1; $i <= 5; $i++):
                if ($i <= $integerPart):
                    $star .= '<i class="fas fa-star"></i>';
                endif;
            endfor;
            if ($decimalPart > 0 && $integerPart < 5):
                $star .= '<i class="fas fa-star-half-alt"></i>';
            endif;
            for ($i = ($integerPart + 1); $i <= 5; $i++):
                $star .= '<i class="far fa-star"></i>';
            endfor;
            $terms_t = get_terms(array(
                'taxonomy' => 'tags_tour',
                'object_ids' => $tour->ID,
            ));
            $check_t = '';
           foreach ($terms_t as $item) :
               $check_t.= '<li>'.$item->name .'</li>';
            endforeach;
            $vel = '';
             if(!empty($vehicle['text'])):
                 $vel .= '<li>
                    <img style="width: 15px;" src=" '. $vehicle['icon'].' " alt="">
                    <p> '. $vehicle['text'].' </p>
                </li>';
             endif;
            $ac = (!empty($checkFavorite)) ? 'active' : '';
            $as = round($averageRating, 2);
            $te = (!empty($reviews)) ? formatShortNumber(count($reviews)) : 0;
            $result .= '<div class="hotel-item">';
            $result .= '<div class="img">';
            $result .= '<a href="' . get_permalink($tour->ID) . '"><figure><img src="' . get_the_post_thumbnail_url($tour->ID) . '" alt="blog"></figure></a>';
            $result .= '</div>';
            $result .= '<div class="desc">';
            $result .= '<div class="title">';
            $result .= '<h3><a href="' . get_permalink($tour->ID) . '">' . $tour->post_title . '</a></h3>';
            $result .= '<div class="follow follow_check_' . $tour->ID . '  ' . $ac . '"   data-id="' . $tour->ID . '"><i class="fal fa-heart"></i></div>';
            $result .= '</div>';
            $result .= '<div class="rate">';
            $result .= $star;
            $result .= '</div>';
            $result .= ' <div class="write">
                                                                        <strong>Đánh giá: ' . $as . ' <i
                                                                                    class="fas fa-star"></i>
                                                                        </strong><span>(' . $te . ' đánh giá)</span>
                                                                    </div>';
            $result .= '<div class="tag">';
            $result .= '<ul>';
            $result .= $check_t;
            $result .= '</ul>';
            $result .= '</div>';
            $result .= '<div class="more-info">';
            $result .= '<div class="address">';
            $result .= '<ul class="list-address">';
            $result .= '<li><i class="fas fa-map-marker-alt"></i>' . $fieldLocationTo . '</li>';
            $result .= '<li><i class="fas fa-stopwatch"></i>' . $fieldTourTime . '</li>';
            $result .= $vel;
            $result .= '</ul>';
            $result .= '<p>'.get_the_excerpt($tour->ID ).'</p>';
            $result .= '</div>';
            $result .= '<div class="price">';
            $result .= '<span>Giá chỉ từ:</span>';
            $result .= '<strong>' . $fieldPriceTour = number_format($fieldPriceTour, 0, ",", ".") . ' đ</strong>';
            $result .= '</div>';
            $result .= '</div>';
            $result .= '</div>';
            $result .= '</div>';
        }
        wp_reset_postdata();
    } else {
        $result = " <p>Không có tour phù hợp!!</p>";
    }
    echo $result;
    die();
}