<?php
include __DIR__ . "/../includes/padding.php";

//-------del-------------
action_list_del("useragency");
$pagesize = 20;
$s = '';
$rs = $wpdb->get_results("SELECT id,name FROM useragency where parent = 0 ");
$my_str = "WHERE 1=1";

if (isset($_REQUEST['search'])) {
    $keyword = fixqQ($_REQUEST['keyword']);
    $s .= '&search=1';

    // Điều kiện
    $dkKey = '';
    $dkValue = '';
    //
    if ($keyword != null) {
        $my_str .= ' AND username like "%' . $keyword . '%" OR name like "%' . $keyword . '%" OR phonenumber like "%' . $keyword . '%" OR email like "%' . $keyword . '%" ';
    }
}
$recordcount = count_total_db("useragency", $my_str);
if (isset($_GET['paged'])){
    $paged = (int)$_GET['paged'];
}else{
    $paged = 0;
}
if ($paged == 0) {
    $paged = 1;
}
$beginpaging = beginpaging($pagesize, $recordcount, $paged);
add_admin_css('main.css');
add_admin_js('jquery-2.2.4.min.js');
$city = file_get_contents(plugin_dir_path(__FILE__) . 'vn_city.json');
$json = json_decode($city, true);

// Loại tài khoản

?>
<style>
    .flr{
        display: flex;
        float: right;
    }
    .d-none{
        display: none;
    }
    .iconloadgif {
        top: 0;
        right: 0;
        left: 0;
        bottom: 0;
        position: absolute;
        margin: auto;
    }

    .divgif {
        position: fixed;
        width: 100%;
        height: 100%;
        z-index: 1100;
        display: none;
        background: #dedede;
        opacity: 0.5;
    }
</style>
<div class="divgif">
    <img class="iconloadgif" src="<?= get_template_directory_uri() ?>/ajax/images/loading2.gif" alt="">
</div>
<div class="wrap">
    <h1 style="margin-bottom:15px;">Danh sách <?php echo $mdlconf['title']; ?>
<!--        <a class="page-title-action" href="--><?php //echo $module_pathadd; ?><!--">Thêm mới</a>-->
    </h1>

    <ul class="subsubsub">
        <li class="all"><a class="current" href="<?php echo $module_path; ?>">Tất cả <span
                        class="count">(<?php echo $recordcount; ?>)</span></a></li>
    </ul>
    <form class="search-box flr" method="POST" action="<?php echo $module_path; ?>">
        <input class="sear_2" value="<?php if (isset($keyword)) echo $keyword; ?>" type="text" name="keyword"
               placeholder="Từ khóa">
        <input type="submit" name="search" value="Lọc" class="button"/>
    </form>
    <?php
    $myrows = $wpdb->get_results("SELECT * FROM useragency ". $my_str ." ORDER BY id DESC LIMIT  " . $beginpaging[0] . ",$pagesize");
    ?>
    <!--    --><?php // if ( $mess != '' ) { ?>
    <!--        <div class="notice notice-warning is-dismissible" id="message">-->
    <!--            <p>--><?php //echo $mess; ?><!--</p>-->
    <!--        </div>-->
    <!--    --><?php // } ?>

    <form class="" method="POST" action="<?php echo $module_path; ?>">
        <div class="tablenav top" style="display: none">
            <div class="alignleft actions bulkactions">
                <select id="bulk-action-selector-top" name="action">
                    <option value="-1">Tác vụ</option>
                    <option value="1">Xóa</option>
                </select>
                <input type="submit" value="Áp dụng" class="button action" id="doaction" name="doaction">
            </div>
        </div>

        <table class="wp-list-table widefat fixed striped posts">
            <thead>
            <tr class="headline">
                <td class="manage-column column-cb check-column" id="cb">
                    <input type="checkbox" id="cb-select-all-1"></td>
                <th style="width:30px;text-align:center;">STT</th>
<!--                <th>Tài khoản</th>-->
                <th>Họ tên</th>
                <th>Email</th>
                <th>Số điện thoại</th>
                <th>Giới tính</th>
                <th></th>
            </tr>
            </thead>
            <tfoot>
            <tr class="headline">
                <td class="manage-column column-cb check-column" id="cb">
                    <input type="checkbox" id="cb-select-all-1"></td>
                <th style="width:30px;text-align:center;">STT</th>
<!--                <th>Tài khoản</th>-->
                <th>Họ tên</th>
                <th>Email</th>
                <th>Số điện thoại</th>
                <th>Giới tính</th>
                <th></th>
            </tr>
            </tfoot>

            <?php
            $i = 0;
            foreach ($myrows as $item) {
                $i++;
                $rowlink = $module_path . '&sub=edit&id=' . $item->id;
//                $user = $wpdb->get_row("select * from  ".$wpdb->prefix."account where  id = '".$item->id_user."'")
                ?>
                <tr>
                    <th class="check-column" scope="row">
                        <input type="checkbox" value="<?php echo $item->id; ?>" name="post[]"/>
                    </th>
                    <td><?php echo get_list_order($pagesize, $paged, $i); ?></td>
                    <td><a href="<?php echo $rowlink; ?>" target="blank"><?= $item->name ?></a></td>
                    <td><?= $item->email ?> </td>
                    <td><?= $item->phonenumber ?> </td>
                    <td>
                        <?php
                            if($item->gender == 'male'){
                                echo ('Nam');
                            }elseif ($item->gender == 'female'){
                                echo ('Nữ');
                            }else {
                                echo ('Khác');
                            }
0
                        ?>
                    </td>
                    <td><a href="<?php echo $rowlink; ?>" target="blank">Xem chi tiết</a></td>
                </tr>
            <?php } ?>
        </table>

    </form>

    <?php echo paddingpage($module_short_url, $beginpaging[1], $beginpaging[2], $beginpaging[3], $paged, $pagesize, $recordcount, $s); ?>

</div>

<div class="box-alert"></div>
<?php
add_admin_js('common.js');
?>

