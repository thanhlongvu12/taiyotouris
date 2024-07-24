<?php
/**
 * @package Subscribe Plugin by W.G
 * Auth:
 * @version 1.1.5
 */

/*
Plugin Name:  WG-Wecan-group
Plugin URI: https://wecan-group.com/
Description: Quản lý Wecan-Group
Author: Wecan Group
Version: 1.0
Author URI: https://wecan-group.com/
*/

$userRoles = '';
$userPer   = '';

add_action('admin_menu', 'show_menu_app1');

function show_menu_app1(){
    global $userRoles,$userPer;
    $userRoles = wp_get_current_user();
    $userPer = $userRoles->roles;

    add_menu_page( 'Tài Khoản', 'Tài Khoản', 'manage_insurance', 'daily_list', 'daily' , 'dashicons-star-filled', 40);
    add_submenu_page( 'daily_list', 'Danh sách Tài Khoản', 'Danh sách Tài Khoản','manage_options', 'daily','daily');
//    add_submenu_page( 'daily_list', 'Thêm mới Tài Khoản', 'Thêm mới Tài Khoản','manage_options', 'adddaily','adddaily');

    add_menu_page( 'Đơn hàng', 'Đơn hàng', 'manage_options', 'order_manager', 'order' , 'dashicons-nametag', 40);

    add_menu_page( 'Đánh giá khách hàng', 'Đánh giá khách hàng', 'manage_options', 'reviews', 'danhgia' , 'dashicons-star-filled', 40);



//    add_menu_page( 'Cơ sở dữ liệu M&E', 'Cơ sở dữ liệu M&E', 'manage_insurance', 'csdl_list', 'csdl' , 'dashicons-nametag', 40);
//    add_submenu_page( 'report_list', 'Cơ sở dữ liệu M&E', 'Cơ sở dữ liệu M&E','manage_options', 'csdl','csdl');
    //    add_submenu_page( 'report_list', 'Thêm mới Báo cáo', 'Thêm mới Báo cáo','manage_options', 'addreport','addreport');

}
include plugin_dir_path( __FILE__ ) . '/includes/config.php';

function daily(){
    include plugin_dir_path( __FILE__ ) . '/daily/daily.php';
}

function order(){
    include plugin_dir_path( __FILE__ ) . '/orders/order.php';
}


function csdl(){
    include plugin_dir_path( __FILE__ ) . '/csdl/setting.php';
}
//
//function danhgia() {
//    include plugin_dir_path(__FILE__) . '/danhgia/danhgia.php';
//}
