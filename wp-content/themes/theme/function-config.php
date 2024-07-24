<?php
/**
 * Created by PhpStorm.
 * User: VuThanhLong
 * Date: 11/13/2023
 * Time: 1:35 PM
 */

define('error_code', 1);
define('success_code', 0);
define('auth_error', 401);

define('messerror', "Có lỗi xảy ra. Vui lòng kiểm tra và thử lại");
define('auth_mess', "Vui lòng đăng nhập để thực hiện chức năng này");
define('messauth', "Lỗi xác thực. Vui lòng kiểm tra trình duyệt của bạn");
define('key_auth', '3xBGYEpCIWi&M+r^e+W^E5nMpYQnO%#p'); // key check bao mat
ob_start();
// In kết quả
function pr($value){
    echo "<pre>";
    print_r($value);
    die;
}

function generateRandom($length = 6)
{
    $str = "";
    $characters = array_merge(range('A', 'Z'), range('a', 'z'), range('0', '9'));
    $max = count($characters) - 1;
    for ($i = 0; $i < $length; $i++) {
        $rand = mt_rand(0, $max);
        $str .= $characters[$rand];
    }
    return $str;
}
// trả dữ liệu cho ajax
function returnajax($rs)
{
    echo json_encode($rs);
    die();
}
// Call google check captcha
function googleCaptcha($token)
{

    $secret = get_field("setting_captcha", "option")["secret_key"];
    // call curl to POST request
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, "https://www.google.com/recaptcha/api/siteverify");
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query(array('secret' => $secret, 'response' => $token)));
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $response = curl_exec($ch);
    curl_close($ch);
    $arrResponse = json_decode($response, true);
    return $arrResponse;
}

//function my_enqueue($hook) {
//    // Only add to the edit.php admin page.
//    // See WP docs.
////    if ('edit.php' !== $hook) {
////        return;
////    }
//    wp_enqueue_script('my_custom_script_0', get_template_directory_uri().'/ajax/js/sweetalert2.js');
//    wp_enqueue_script('my_custom_script_2', 'https://www.google.com/recaptcha/api.js?render='. get_field("setting_captcha","option")["site_key"]);
//    wp_enqueue_script('my_custom_script_1', get_template_directory_uri().'/ajax/js/script-admin.js');
//    wp_register_style('my_custom_style', get_template_directory_uri().'/ajax/css/main-admin.css');
//    wp_enqueue_style( 'my_custom_style' );
//}

//add_action('admin_enqueue_scripts', 'my_enqueue');


function add_file_types_to_uploads($file_types){
    $new_filetypes = array();
    $new_filetypes['svg'] = 'image/svg+xml';
    $file_types = array_merge($file_types, $new_filetypes );
    return $file_types;
}
add_filter('upload_mimes', 'add_file_types_to_uploads');


//function my_custom_html() {
//    $html = '<input type="hidden" id="urlAjax" value="'. admin_url() .'admin-ajax.php">
//<input type="hidden" id="site_key" value="'. get_field("setting_captcha","option")["site_key"] .'">
//<input type="hidden" id="success_code" value="'. success_code .'">';
//    echo $html;
//}
////add_action( 'my_custom_admin_body', 'my_custom_html' );
////add_action( 'edit_form_after_editor', 'my_custom_html' );
//add_action( 'admin_notices', 'my_custom_html' );

// Lấy thông tin đăng nhập
function getLogin()
{
    global $username;
    global $wpdb;
    if (!empty($_COOKIE['ssidd'])) {
        $username = $wpdb->get_row("SELECT * FROM useragency where remeber_token = '" . no_sql_injection(xss($_COOKIE['ssidd'])) . "'");
    }
    return $username;
}
// Lấy thông tin đăng nhập
function getDelivery($iduser)
{
    global $delivery;
    global $wpdb;
    if (!empty($iduser)) {
        $delivery = $wpdb->get_row("SELECT * FROM tt_delivery_information where id_user = '".$iduser."'");
    }
    return $delivery;
}
// Check đăng nhập
function checkLogin()
{
//    session_start();
    global $username;
    global $wpdb;
    if (!empty($_COOKIE['ssidd'])) {
        $username = $wpdb->get_row("SELECT id,username,name,phonenumber,email, birthday, api_token,remeber_token FROM useragency where remeber_token = '" . no_sql_injection(xss($_COOKIE['ssidd'])) . "'");
        if ($username == null) {
            setcookie('ssidd', '', time() - 3600, '/');
            header("Location: " . get_permalink(getIdPage('login')));
            exit();
        }
    } else {
        if (!is_page(getIdPage('login'))) {
            setcookie('ssidd', '', time() - 3600, '/');
            header("Location: " . get_permalink(getIdPage('login')));
            exit();
        }
    }
    return $username;
}
function money_check($srt)
{
    return number_format($srt, 0, '.', ',');
}
function formatNumberr(){
    $price = '5,000,000 VND';
    $priceWithoutNonDigits = preg_replace('/\D/', '', $price); // '5000000'
    $formattedPrice = number_format($priceWithoutNonDigits, 0, ',', '.'); // '5.000.000'
    $formattedPriceWithCurrency = '₫' . $formattedPrice; // '₫5.000.000'
}