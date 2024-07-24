<?php
/**
 * Created by PhpStorm.
 * User: VuThanhLong
 * Date: 11/13/2023
 * Time: 11:50 AM
 */

// Register
add_action('wp_ajax_nopriv_Register', 'formRegister');
add_action('wp_ajax_Register', 'formRegister');
function formRegister()
{
    global $wpdb;
    $rs = [];
    if (empty($_POST['email']) || empty($_POST['phonenumber']) || empty($_POST['password'])) {
        $rs['status'] = false;
        $rs['mess'] = messerror . " Lỗi Validate";
    } else {
        $email = no_sql_injection(xss($_POST['email']));
        $phonenumber = no_sql_injection(xss($_POST['phonenumber']));
        $pass = no_sql_injection(xss($_POST['password']));
        $password = hash('sha256', $pass . key_auth);
        $phonenumberdl = $wpdb->get_row(
            "SELECT * FROM useragency where phonenumber = '" . $phonenumber . "'");
        $emaildl = $wpdb->get_row(
            "SELECT * FROM useragency where email = '" . $email . "'");

        if ($emaildl != null) {
            $rs['status'] = false;
            $rs['mess'] = "Email đã tồn tại";
        } elseif ($phonenumberdl != null) {
            $rs['status'] = false;
            $rs['mess'] = "Số điện thoại đã tồn tại";
        } else {
            $queryStr = "insert into `useragency` (`email`,`phonenumber`, `password`) values('" . $email . "','" . $phonenumber . "','" . $password . "')";
            $resp = $wpdb->query($queryStr);
            $urlLogin = get_permalink(getIdPage('login'));
            if ($resp || (is_int($resp) && $resp >= 0)) {
                $token = generateRandom(150);
                $wpdb->query("update useragency set remeber_token ='" . $token . "' where email = '" . $email . "'");
                setcookie('ssidd', $token, (time() + 86400 * 3), '/');
                $toManager = $email;
                $home = home_url();
                $headers[] = 'Content-Type: text/html; charset=UTF-8';
                $subjectManager = "Taiyo Tourist - Đăng ký tài khoản";
                $emailBodyManager = '<p>Chào bạn,</p>

<p>Xin chúc mừng! Bạn đã đăng ký thành công tài khoản trên <a href="' . $home . '">Taiyo Tourist</a>.

<p>Dưới đây là thông tin về tài khoản của bạn:</p>

<p>Số điện thoại người dùng: ' . $phonenumber . '</p>
<p>Địa chỉ email:  ' . $email . '</p>
<p>Bạn có thể sử dụng tài khoản này để đăng nhập vào trang web của chúng tôi và tận hưởng các dịch vụ và tính năng hấp dẫn mà chúng tôi cung cấp.</p>';

                wp_mail($toManager, $subjectManager, $emailBodyManager, $headers);
                $rs['urlLogin'] = $urlLogin;
                $rs['status'] = true;
                $rs['mess'] = "Đăng ký tài khoản thành công";

            } else {
                $rs['status'] = false;
                $rs['mess'] = " Lỗi tạo tài khoản.";
            }
        }

    }

    echo json_encode($rs);
    die;
}

// Login
add_action('wp_ajax_Login', 'formLogin');
add_action('wp_ajax_nopriv_Login', 'formLogin');
function formLogin()
{
    global $wpdb;
    $rs = [];
    if (empty($_POST['email']) || empty($_POST['password'])) {
        $rs['status'] = false;
        $rs['mess'] = messerror . " Lỗi Validate";

    }
    // verify the response
    $email = no_sql_injection(xss($_POST['email']));
    $password = hash('sha256', $_POST['password'] . key_auth);
    $urlDas = get_permalink(getIdPage('dashbroad'));
    $checklogin = $wpdb->get_row("SELECT * FROM useragency where email = '" . $email . "'");
    if ($checklogin == null) {
        $rs['status'] = false;
        $rs['mess'] = "Tài khoản hoặc mật khẩu không chính xác.";

    }
    if ($password != $checklogin->password) {
        $rs['status'] = false;
        $rs['mess'] = "Tài khoản hoặc mật khẩu không chính xác.";
    }

    if ($checklogin != null && $password == $checklogin->password) {
        $token = generateRandom(150);
        setcookie('ssidd', $token, (time() + 86400 * 3), '/');
        $wpdb->query("update useragency set remeber_token ='" . $token . "' where id = " . $checklogin->id);
        $rs['status'] = true;
        $rs['urlLogin'] = $urlDas;
    }

    echo json_encode($rs);
    die;
}

//logout
add_action('wp_ajax_logout', 'form_logout');
add_action('wp_ajax_nopriv_logout', 'form_logout');
function form_logout()
{
    global $wpdb;
    $currentLogin = getLogin();
    $wpdb->update(
        'useragency',
        array(
            'remeber_token' => ''
        ),
        array(
            'id' => $currentLogin->id
        )
    );
    setcookie('ssidd', '', 0, '/');
    $rs['status'] = 1;
    returnajax($rs);
}

// upload avatar
add_action('wp_ajax_nopriv_update_ava', 'update_ava');
add_action('wp_ajax_update_ava', 'update_ava');
function update_ava()
{
    global $wpdb;
    $getUser = getLogin();
    if (empty($getUser)) {
        $rs['status'] = error_code;
        $rs['mess'] = auth_mess;
        returnajax($rs);
    }
    if (isset($_FILES['images']) && !empty($_FILES['images']['name'])) {
        $image_file = $_FILES['images']; // Tệp ảnh đã gửi lên
        $upload_dir = wp_upload_dir(); // Lấy thông tin về thư mục uploads
        $upload_path = $upload_dir['path'] . '/'; // Đường dẫn đến thư mục uploads
        $upload_url = $upload_dir['url'] . '/'; // Đường dẫn URL đến thư mục uploads

        $temp_file = $image_file['tmp_name'];
        $target_file = $upload_path . basename($image_file['name']);

        // Di chuyển tệp ảnh vào thư mục uploads
        if (move_uploaded_file($temp_file, $target_file)) {
            // Tạo các phiên bản ảnh cho tệp ảnh
            $image_info = wp_generate_attachment_metadata($target_file, $target_file);
            //wp_update_attachment_metadata($attachment_id, $image_info);

            // Lấy đường dẫn ảnh sau khi đã lưu trong thư mục uploads
            $image_url = $upload_url . basename($image_file['name']);
            $link = $image_url; // Gán đường dẫn ảnh vào biến $link
        }
    }

    $wpdb->update(
        'useragency',
        array(
            'avatar' => $link
        ),
        array(
            'id' => $getUser->id
        )
    );
    $rs['status'] = success_code;
    $rs['link'] = $link;
    $rs['mess'] = 'Cập nhật thành công';

    returnajax($rs);
}

// Update infomation
add_action('wp_ajax_update_information', 'updateUser');
add_action('wp_ajax_nopriv_update_information', 'updateUser');
function updateUser()
{
    global $wpdb;
    $rs = [];
    if (empty($_POST['name'])) {
        $rs['status'] = false;
        $rs['mess'] = messerror . " Lỗi Validate";
    } elseif (!empty($_POST['name'])) {
        $name = no_sql_injection(xss($_POST['name']));
        $address = no_sql_injection(xss($_POST['address']));
        $district = no_sql_injection(xss($_POST['district']));
        $gender = no_sql_injection(xss($_POST['gender']));
        $city = no_sql_injection(xss($_POST['city']));
        // $image = no_sql_injection(xss($_POST['image']));
        $currentLogin = getLogin();
        $wpdb->query("update useragency set name ='" . $name . "',gender ='" . $gender . " where id = " . $currentLogin->id);
        $user = $wpdb->get_row("select * from tt_delivery_information where id_user = '" . $currentLogin->id . "'");
        if (!empty($user)) {
            $wpdb->query("update tt_delivery_information set fullname ='" . $name . "',phone ='" . $currentLogin->phonenumber . "',address ='" . $address . "',city ='" . $city . "',district ='" . $district . "' where id_user = " . $currentLogin->id);
            $rs['status'] = true;
            $rs['mess'] = "Cập nhật tài khoản thành công.";
        } else {
            $queryStr = "insert into `tt_delivery_information` (`id_user`,`fullname`,`phone`, `address`,`city`,`district`) values('" . $currentLogin->id . "','" . $name . "','" . $currentLogin->phonenumber . "','" . $address . "','" . $city . "','" . $district . "')";
            $resp = $wpdb->query($queryStr);
            if ($resp || (is_int($resp) && $resp >= 0)) {

                $rs['status'] = true;
                $rs['mess'] = "Cập nhật tài khoản thành công.";

            } else {
                $rs['status'] = false;
                $rs['mess'] = "Cập nhật tài khoản thất bại.";
            }
        }


    } else {
        $rs['status'] = false;
        $rs['mess'] = messauth;
    }
    echo json_encode($rs);
    die;
}

// Order Now
add_action('wp_ajax_order_tour_now', 'orderNow');
add_action('wp_ajax_nopriv_order_tour_now', 'orderNow');
function orderNow()
{
    global $wpdb;
    $date_order = time();
    $currentLogin = getLogin();
    $rs = [];
    $ippost = no_sql_injection(xss($_POST['idpost']));

    $note = no_sql_injection(xss($_POST['note']));
    if ($ippost == 0) {

        $cart = $wpdb->get_results("select * from {$wpdb->prefix}cart where status_cart = 1 and id_user = {$currentLogin->id} and type_cart ='taiyotourist'");
        $user = $wpdb->get_row("select * from tt_delivery_information where id_user = '" . $currentLogin->id . "'");
        $tong = 0;
        $arr = array();
        foreach ($cart as $value):
            $tong += (($value->qty_adult * $value->pirce_adult) + ($value->qty_child * $value->pirce_child));
            $arr[] = array(
                'id_post' => $value->id_product,
                'qty_adult' => $value->qty_adult,
                'pirce_adult' => $value->pirce_adult,
                'qty_child' => $value->qty_child,
                'pirce_child' => $value->pirce_child,
                'start_date' => $value->start_date,
                'end_date' => $value->end_date
            );
        endforeach;
        $code = generate_order_code('tt_orders');
        $wpdb->insert(
            'tt_orders',
            array(
                'id_user' => $currentLogin->id,
                'order_code' => $code,
                'note' => $note,
                'number_adult' => 0,
                'number_child' => 0,
                'adult_price' => 0,
                'price_payment' => $tong,
                'time_order' => time(),
                'child_price' => 0,
                'type_order' => 'tour',
                'nam_dat' => date('Y'),
                'data' => json_encode($arr),
            )
        );
        $inserted_id = $wpdb->insert_id;
//        print_r($inserted_id);die();
        $order = $wpdb->get_row("select * from tt_orders where id = {$inserted_id} ");
        if (!empty($order)) {
            $wpdb->update(
                $wpdb->prefix . 'cart',
                array(
                    'status_cart' => 2
                ),
                array(
                    'id_user' => $currentLogin->id,
                    'status_cart' => 1,
                    'type_cart' => 'taiyotourist'
                )
            );
            $arr_s = json_decode($order->data);
            $table = '<table style="width: 1000px;
    border: solid 1px;
    text-align: center;
    border-collapse: collapse;">
                        <thead style="    background: #e5c9c9;">
                        <th>STT</th>
                        <th>Tên Tour du lịch</th>
                        <th>Số lượng người lớn / Giá tiền(đ)</th>
                        <th>Số lượng trẻ con / Giá tiền(đ)</th>
                        <th>Ngày bắt đầu</th>
                        <th>Ngày kết thúc</th>
</thead>
<tbody>';
            foreach ($arr_s as $key => $value):
                $title = get_the_title($value->id_post);
                $price_adult_2 = money_check($value->pirce_adult);
                $price_c_2 = money_check($value->pirce_child);
                $date_st = date('d-m-Y', $value->start_date);
                $date_en = date('d-m-Y', $value->end_date);
                $table .= '
               <tr>
               <td style="border: solid 1px;">' . ($key + 1) . '</td>
               <td style="border: solid 1px;">' . $title . '</td>
               <td style="border: solid 1px;">' . $value->qty_adult . ' / ' . $price_adult_2 . ' đ</td>
               <td style="border: solid 1px;">' . $value->qty_child . ' / ' . $price_c_2 . ' đ</td>
               <td style="border: solid 1px;">' . $date_st . '</td>
               <td style="border: solid 1px;">' . $date_en . '</td>
</tr>    
                ';
            endforeach;
            $table .= '</tbody>';
            $tong = money_check($tong);
            $headers = array('Content-Type: text/html; charset=UTF-8');
            $body = get_field('email_order', 'option');
            $body = str_replace('{{__order__}}', $order->order_code, $body);
            $body = str_replace('{{__name__}}', $user->fullname, $body);
            $body = str_replace('{{__email__}}', $currentLogin->email, $body);
            $body = str_replace('{{__phone__}}', $currentLogin->phonenumber, $body);
            $body = str_replace('{{__table__}}', $table, $body);
            $body = str_replace('{{__money__}}', $tong, $body);
            wp_mail($currentLogin->email, 'Thông tin đặt tour', $body, $headers);
            $rs['status'] = true;
            $rs['mess'] = "Đặt tour thành công.";
            $cart = $wpdb->get_var("select count(*) from {$wpdb->prefix}cart where status_cart < 2 and id_user = {$currentLogin->id} ");
            $rs['count'] = $cart;
            returnajax($rs);
        }
    } else {
        $title = no_sql_injection(xss($_POST['title']));
        $code = generate_order_code('tt_orders');
        $datego = no_sql_injection(xss($_POST['datego']));
        $adult = no_sql_injection(xss($_POST['adult']));
        $child = no_sql_injection(xss($_POST['child']));
        $price_child = no_sql_injection(xss($_POST['price_child']));
        $price_adult = no_sql_injection(xss($_POST['price_adult']));
        $money = no_sql_injection(xss($_POST['money']));

        $typeorder = no_sql_injection(xss($_POST['typeorder']));

        $user = $wpdb->get_row("select * from tt_delivery_information where id_user = '" . $currentLogin->id . "'");
        $queryStr = "INSERT INTO `tt_orders` (`id_user`, `order_code`, `note`, `number_adult`, `number_child`, `adult_price`, `price_payment`, `time_order`, `date_go`, `id_post`, `child_price`, `type_order`) VALUES ('" . $currentLogin->id . "', '" . $code . "', '" . $note . "', '" . $adult . "', '" . $child . "', '" . $price_adult . "', '" . $money . "', '" . $date_order . "', '" . $datego . "', '" . $ippost . "', '" . $price_child . "', '" . $typeorder . "')";
        $resp = $wpdb->query($queryStr);
        if ($resp || (is_int($resp) && $resp >= 0)) {
            $body = '<p>Mã đơn hàng:<span style="margin-left: 10px">' . $code . '</span></p>
                            <p>Tiêu đề tour:<span style="margin-left: 10px">' . $title . '</span></p>
                            <p>Tên khách hàng:<span style="margin-left: 10px">' . $user->fullname . '</span></p>
                            <p>Email:<span style="margin-left: 10px">' . $currentLogin->email . '</span></p>
                            <p>Số điện thoại:<span style="margin-left: 10px">' . $currentLogin->phonenumber . '</span></p>
                            <p>Số lượng người lớn:<span style="margin-left: 10px">' . $adult . '</span></p>                            
                            <p>Số lượng trẻ em:<span style="margin-left: 10px">' . $child . '</span></p>                            
                            <p>Giá tiền 1 người / 1 đêm:<span style="margin-left: 10px">' . number_format($price_adult) . 'VND</span></p>                            
                            <p>Giá tiền 1 trẻ em / 1 đêm:<span style="margin-left: 10px">' . number_format($price_child) . 'VND</span></p>                            
                            <p>Tổng tiền cần trả:<span style="margin-left: 10px">' . number_format($money) . 'VND</span>
                            <p>Ngày khởi hành:<span style="margin-left: 10px">' . $datego . '</span></p>
                            <p>Ghi chú:<span style="margin-left: 10px">' . $note . '</span></p>
                           ';
            $headers = array('Content-Type: text/html; charset=UTF-8');
            wp_mail($currentLogin->email, 'Thông tin đặt tour', $body, $headers);
            $rs['status'] = true;
            $rs['mess'] = "Đặt tour thành công.";

        } else {
            $rs['status'] = false;
            $rs['mess'] = "Đặt tour thất bại.";
        }
        echo json_encode($rs);
        die;
    }

}

add_action('wp_ajax_order_hotel_now', 'order_hotel_now');
add_action('wp_ajax_nopriv_order_hotel_now', 'order_hotel_now');
function order_hotel_now()
{
    global $wpdb;
    $date_order = time();
    $currentLogin = getLogin();
    $rs = [];
    $note = no_sql_injection(xss($_POST['note']));
    $id_ps = no_sql_injection(xss($_POST['id_ps']));
    $checkin_date = no_sql_injection(xss($_POST['checkin_date']));
    $checkout_date = no_sql_injection(xss($_POST['checkout_date']));
    $id_room = no_sql_injection(xss($_POST['id_room']));
    $tong = 0;
    $arr = array();
    $user = $wpdb->get_row("select * from tt_delivery_information where id_user = '" . $currentLogin->id . "'");
    if ($id_ps == '-1') {
        echo 123;
        die();
        $cart = $wpdb->get_results("select * from {$wpdb->prefix}cart where status_cart = 1 and id_user = {$currentLogin->id} and type_cart ='khach_san'");


        foreach ($cart as $value):

            $checkInDate = new DateTime('@' . $value->start_date);
            $checkOutDate = new DateTime('@' . $value->end_date);

            // Tính số đêm giữa hai thời điểm
            $interval = $checkInDate->diff($checkOutDate);
            $numberOfNights = $interval->format('%a');

            // Lấy giá trị tuyệt đối của số đêm
            $numberOfNights = abs($numberOfNights);
            $tong += ($numberOfNights * $value->pirce_adult);
            $arr[] = array(
                'id_post' => $value->id_product,
                'id_room' => $value->id_room,
                'qty_adult' => (!empty(get_field('detail', $value->id_room)['number'])) ? get_field('detail', $value->id_room)['number'] : 0,
                'pirce_adult' => $value->pirce_adult,
                'start_date' => $value->start_date,
                'end_date' => $value->end_date,
                'pay' => ($numberOfNights * $value->pirce_adult)
            );
        endforeach;
        $code = generate_order_code('tt_orders');
//    print_r($code);die();
        $wpdb->insert(
            'tt_orders',
            array(
                'id_user' => $currentLogin->id,
                'order_code' => $code,
                'note' => $note,
                'number_adult' => 0,
                'number_child' => 0,
                'adult_price' => 0,
                'price_payment' => $tong,
                'time_order' => $date_order,
                'child_price' => 0,
                'type_order' => 'hotel',
                'nam_dat' => date('Y'),
                'data' => json_encode($arr),
            )
        );
        $inserted_id = $wpdb->insert_id;
//        print_r($inserted_id);die();
        $order = $wpdb->get_row("select * from tt_orders where id = {$inserted_id} ");
        if (!empty($order)) {
            $wpdb->update(
                $wpdb->prefix . 'cart',
                array(
                    'status_cart' => 2
                ),
                array(
                    'id_user' => $currentLogin->id,
                    'status_cart' => 1,
                    'type_cart' => 'khach_san'
                )
            );
            $arr_s = json_decode($order->data);
            $table = '<table style="width: 1000px;
    border: solid 1px;
    text-align: center;
    border-collapse: collapse;">
                        <thead style="    background: #e5c9c9;">
                        <th>STT</th>
                        <th>Tên khách sạn  </th>
                        <th>Tên phòng</th>
                        <th>Ngày bắt đầu</th>
                        <th>Ngày kết thúc</th>
                        <th>Giá tiền(đ) / đêm </th>
</thead>
<tbody>';
            foreach ($arr_s as $key => $value):
                $title = get_the_title($value->id_post);
                $room = get_the_title($value->id_room);
                $checkInDate = new DateTime('@' . $value->start_date);
                $checkOutDate = new DateTime('@' . $value->end_date);

                // Tính số đêm giữa hai thời điểm
                $interval = $checkInDate->diff($checkOutDate);
                $numberOfNights = $interval->format('%a');

                // Lấy giá trị tuyệt đối của số đêm
                $numberOfNights = abs($numberOfNights);
                $date_st = date('d-m-Y', $value->start_date);
                $date_en = date('d-m-Y', $value->end_date);
                $price_t = money_check($value->pirce_adult);
                $table .= '
               <tr>
               <td style="border: solid 1px;">' . ($key + 1) . '</td>
               <td style="border: solid 1px;">' . $title . '</td>
               <td style="border: solid 1px;">' . $room . '</td>
               <td style="border: solid 1px;">' . $date_st . '</td>
               <td style="border: solid 1px;">' . $date_en . '</td>
               <td style="border: solid 1px;">' . $price_t . 'd / ' . $numberOfNights . ' đêm</td>
</tr>    
                ';
            endforeach;
            $table .= '</tbody>';
            $tong = money_check($tong);
            $headers = array('Content-Type: text/html; charset=UTF-8');
            $body = get_field('email_order', 'option');
            $body = str_replace('{{__order__}}', $order->order_code, $body);
            $body = str_replace('{{__name__}}', $user->fullname, $body);
            $body = str_replace('{{__email__}}', $currentLogin->email, $body);
            $body = str_replace('{{__phone__}}', $currentLogin->phonenumber, $body);
            $body = str_replace('{{__table__}}', $table, $body);
            $body = str_replace('{{__money__}}', $tong, $body);
            wp_mail($currentLogin->email, 'Thông tin đặt Khách sạn', $body, $headers);
            $rs['status'] = true;
            $rs['mess'] = "Đặt phòng khách sạn thành công.";
            $cart = $wpdb->get_var("select count(*) from {$wpdb->prefix}cart where status_cart < 2 and id_user = {$currentLogin->id} ");
            $rs['count'] = $cart;
            returnajax($rs);
        }
    } else {
        if (get_post($id_ps)) {
            $checkInDate = new DateTime('@' . $checkin_date);
            $checkOutDate = new DateTime('@' . $checkout_date);

            // Tính số đêm giữa hai thời điểm
            $interval = $checkInDate->diff($checkOutDate);
            $numberOfNights = $interval->format('%a');
            $pirce_adult = (!empty(get_field('detail', $id_room)['price'])) ? get_field('detail', $id_room)['price'] : 0;
            // Lấy giá trị tuyệt đối của số đêm
            $numberOfNights = abs($numberOfNights);
            $tong = ($numberOfNights * $pirce_adult);
            $arr[] = array(
                'id_post' => $id_ps,
                'id_room' => $id_room,
                'qty_adult' => (!empty(get_field('detail', $id_room)['number'])) ? get_field('detail', $id_room)['number'] : 0,
                'pirce_adult' => $pirce_adult,
                'start_date' => $checkin_date,
                'end_date' => $checkout_date,
                'pay' => ($numberOfNights * $pirce_adult)
            );
            $code = generate_order_code('tt_orders');
            $wpdb->insert(
                'tt_orders',
                array(
                    'id_user' => $currentLogin->id,
                    'order_code' => $code,
                    'note' => $note,
                    'number_adult' => 0,
                    'number_child' => 0,
                    'adult_price' => 0,
                    'price_payment' => $tong,
                    'time_order' => $date_order,
                    'child_price' => 0,
                    'type_order' => 'hotel',
                    'nam_dat' => date('Y'),
                    'data' => json_encode($arr),
                )
            );
            $inserted_id = $wpdb->insert_id;
            $order = $wpdb->get_row("select * from tt_orders where id = {$inserted_id} ");
            if (!empty($order)) {
                $arr_s = json_decode($order->data);
                $table = '<table style="width: 1000px;
    border: solid 1px;
    text-align: center;
    border-collapse: collapse;">
                        <thead style="    background: #e5c9c9;">
                        <th>STT</th>
                        <th>Tên khách sạn  </th>
                        <th>Tên phòng</th>
                        <th>Ngày bắt đầu</th>
                        <th>Ngày kết thúc</th>
                        <th>Giá tiền(đ) / đêm </th>
</thead>
<tbody>';
                foreach ($arr_s as $key => $value):
                    $title = get_the_title($value->id_post);
                    $room = get_the_title($value->id_room);
                    $checkInDate = new DateTime('@' . $value->start_date);
                    $checkOutDate = new DateTime('@' . $value->end_date);

                    // Tính số đêm giữa hai thời điểm
                    $interval = $checkInDate->diff($checkOutDate);
                    $numberOfNights = $interval->format('%a');

                    // Lấy giá trị tuyệt đối của số đêm
                    $numberOfNights = abs($numberOfNights);
                    $date_st = date('d-m-Y', $value->start_date);
                    $date_en = date('d-m-Y', $value->end_date);
                    $price_t = ($value->pirce_adult > 0) ? money_check($value->pirce_adult) : 'Chờ liên hệ';
                    $table .= '
               <tr>
               <td style="border: solid 1px;">' . ($key + 1) . '</td>
               <td style="border: solid 1px;">' . $title . '</td>
               <td style="border: solid 1px;">' . $room . '</td>
               <td style="border: solid 1px;">' . $date_st . '</td>
               <td style="border: solid 1px;">' . $date_en . '</td>
               <td style="border: solid 1px;">' . $price_t . 'd / ' . $numberOfNights . ' đêm</td>
</tr>    
                ';
                endforeach;
                $table .= '</tbody>';
                $tong = ($tong > 0) ? money_check($tong) : 'Chờ liên hệ';
                $headers = array('Content-Type: text/html; charset=UTF-8');
                $body = get_field('email_order', 'option');
                $body = str_replace('{{__order__}}', $order->order_code, $body);
                $body = str_replace('{{__name__}}', $user->fullname, $body);
                $body = str_replace('{{__email__}}', $currentLogin->email, $body);
                $body = str_replace('{{__phone__}}', $currentLogin->phonenumber, $body);
                $body = str_replace('{{__table__}}', $table, $body);
                $body = str_replace('{{__money__}}', $tong, $body);
                wp_mail($currentLogin->email, 'Thông tin đặt Khách sạn', $body, $headers);
                $rs['status'] = true;
                $rs['mess'] = "Đặt phòng khách sạn thành công.";
                returnajax($rs);
            }
        } else {
            $rs['status'] = false;
            $rs['mess'] = "Đặt phòng không thành công, vui lòng kiểm tra lại!.";
            returnajax($rs);
        }
    }
}

//huy don
add_action('wp_ajax_nopriv_cancel_order', 'cancel_order');
add_action('wp_ajax_cancel_order', 'cancel_order');

function cancel_order()
{

    global $wpdb;
    if (!isset($_POST['val'])) {
        $rs['status'] = error_code;
        $rs['mess'] = messerror . " Lỗi Validate";
        returnajax($rs);
    }

    $id = no_sql_injection(xss($_POST['val']));
    $getUser = getLogin();
    if (empty($getUser)) {
        $rs['status'] = error_code;
        $rs['mess'] = messerror . " Lỗi Validate";
        returnajax($rs);
    }
//    $checkcart = $wpdb->get_results("SELECT * FROM {$wpdb->prefix}cart where product_id = {$product_id} AND user_id = {$getUser->id}");
//    if(empty($checkcart)){
//
//    }

    $checkcart = $wpdb->get_results("SELECT * FROM tt_orders where id = {$id} and  id_user = {$getUser->id}");
    if (empty($checkcart)) {
        $rs['status'] = error_code;
        $rs['mess'] = "Đơn hàng không tồn tại vui lòng kiểm tra lại";
        returnajax($rs);
    } else {

        $wpdb->update(
            'tt_orders',
            array(
                'status' => 5
            ),array(
                'id' => $id
            )
        );
//                print_r($wpdb->last_query);die();

//        print_r($wpdb->last_query);die();
    }
    $rs['status'] = success_code;
    $rs['mess'] = "Cập nhật thành công";
    returnajax($rs);
}