<?php
include __DIR__ . "/../includes/padding.php";

//pr(123);

//-------del-------------
action_list_del("tt_orders");
$pagesize = 20;
$s = '';
$rs = $wpdb->get_results("SELECT * FROM tt_orders");
$my_str = "WHERE 1=1";
//print_r($rs);die;

if (isset($_REQUEST['search'])) {
    $keyword = fixqQ($_REQUEST['keyword']);
    $s .= '&search=1';
    $status = (int)$_REQUEST['status'];
    $orderStatus = (int)$_REQUEST['orderStatus'];

    // Điều kiện
    $dkKey = '';
    $dkValue = '';
    //
    if ($keyword != null) {
        $my_str .= ' AND order_code like "%' . $keyword . '%" OR delivery_information like "%' . $keyword . '%" OR id_user like "%' . $keyword . '%" ';
    }
    if ($orderStatus != 0) {
        $my_str .= ' AND status = ' . $orderStatus;
    }
}

$recordcount = count_total_db("tt_orders", $my_str);
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
//$city = file_get_contents(plugin_dir_path(__FILE__) . 'vn_city.json');
//$json = json_decode($city, true);

// Loại tài khoản

?>
<style>
    .flr {
        display: flex;
        float: right;
    }

    .d-none {
        display: none;
    }

    .divgif {
        position: fixed;
        width: 100%;
        height: 100%;
        z-index: 1100;
        display: none;
        background: #dedede;
        opacity: 0.5;
        top: 0;
        left: 0;
    }

    .iconloadgif {
        top: 0;
        right: 0;
        left: 0;
        bottom: 0;
        position: absolute;
        margin: auto;
        width: 150px;
        height: 150px;
    }
</style>
<div class="divgif">
    <img class="iconloadgif" src="<?php echo get_template_directory_uri(); ?>/ajax/images/loading2.gif" alt="">
</div>
<div class="wrap">
    <h1 style="margin-bottom:15px;">Danh sách <?php echo $mdlconf['title']; ?>
    </h1>

    <ul class="subsubsub">
        <li class="all"><a class="current" href="<?php echo $module_path; ?>">Tất cả <span
                        class="count">(<?php echo $recordcount; ?>)</span></a></li>
    </ul>
    <form class="search-box flr" method="POST" action="<?php echo $module_path; ?>">
        <span style="line-height: 24px; margin-right: 10px">Trạng thái đơn hàng:  </span>
        <select name="orderStatus">
            <option value="0" <?php if ($orderStatus == 0) {
                echo 'selected';
            } ?>>Tất cả trạng thái
            </option>
            <option value="1" <?php if ($orderStatus == 1) {
                echo 'selected';
            } ?>>Đặt hàng
            </option>
            <option value="2" <?php if ($orderStatus == 2) {
                echo 'selected';
            } ?>>Chờ lấy hàng
            </option>
            <option value="3" <?php if ($orderStatus == 3) {
                echo 'selected';
            } ?>>Đã thanh toán
            </option>
            <option value="4" <?php if ($orderStatus == 4) {
                echo 'selected';
            } ?>>Đánh giá
            </option>
            <option value="5" <?php if ($orderStatus == 5) {
                echo 'selected';
            } ?>>Hủy đơn hàng
            </option>
        </select>
        <input class="sear_2" value="<?php if (isset($keyword)) echo $keyword; ?>" type="text" name="keyword"
               placeholder="Từ khóa">

        <input type="submit" name="search" value="Lọc" class="button"/>
    </form>
    <?php
    $myrows = $wpdb->get_results("SELECT * FROM `tt_orders` " . $my_str . " ORDER BY `tt_orders`.`id` DESC LIMIT  " . $beginpaging[0] . ", " .$pagesize." ");
    ?>


    <form class="" method="POST" action="<?php echo $module_path; ?>">

        <table class="wp-list-table widefat fixed striped posts">
            <thead>
            <tr class="headline">
                <th style="width:30px;text-align:center;">STT</th>
                <th>Mã đơn hàng</th>
                <th>Danh mục đơn hàng</th>
                <th>Người mua</th>
                <th>Số điện thoại</th>
                <th>Ngày đặt</th>
                <th>Trạng thái đơn hàng</th>
                <th>Tổng tiền</th>
                <th></th>
            </tr>
            </thead>
            <tfoot>
            <tr class="headline">
                <th style="width:30px;text-align:center;">STT</th>
                <th>Mã đơn hàng</th>
                <th>Danh mục đơn hàng</th>
                <th>Người mua</th>
                <th>Số điện thoại</th>
                <th>Ngày đặt</th>
                <th>Trạng thái đơn hàng</th>
                <th>Tổng tiền</th>
                <th></th>
            </tr>
            </tfoot>

            <?php
            $i = 0;
            foreach ($myrows as $order) {
                $delivery_information = $wpdb->get_results("SELECT * FROM  `tt_delivery_information` where `id_user` = '" . $order->id_user . "' ");
//                pr($delivery_information);
                $i++;
                $rowlink = $module_path . '&sub=edit&id=' . $order->id;
                $rowlinkUser = 'admin.php?page=daily&sub=edit&id=' . $order->id_user;
                ?>
                <tr>
                    <td><?= $i ?></td>
                    <td><a href="<?php echo $rowlink; ?>" target="_blank"><?= $order->order_code ?></a></td>
                    <td><?= $order->type_order ?></td>
                    <td><a href="<?php echo $rowlinkUser; ?>" target="_blank"><?= $delivery_information[0]->fullname ?></a>
                    </td>
                    <td><?= $delivery_information[0]->phone ?></td>
                    <td><?= date('H:i d/m/Y', $order->time_order) ?></td>
                    <td>

                            <select class="statusTransport" name="orderStatus" data-order-id="<?= $order->id ?>">
                                <option value="0" <?php if ($order->status == 0) {
                                    echo 'selected';
                                } ?>>Tất cả trạng thái
                                </option>
                                <option value="1" <?php if ($order->status == 1) {
                                    echo 'selected';
                                } ?>>Đặt hàng
                                </option>
                                <option value="2" <?php if ($order->status == 2) {
                                    echo 'selected';
                                } ?>>Chờ lấy hàng
                                </option>
                                <option value="3" <?php if ($order->status == 3) {
                                    echo 'selected';
                                } ?>>Đã thanh toán
                                </option>
                                <option value="4" <?php if ($order->status == 4) {
                                    echo 'selected';
                                } ?>>Đánh giá
                                </option>
                                <option value="5" <?php if ($order->status == 5) {
                                    echo 'selected';
                                } ?>>Hủy đơn hàng
                                </option>
                            </select>

                    </td>
                    <td><?= number_format($order->price_payment, 0, ',', '.') ?> <strong>đ</strong></td>
                    <td><a href="<?php echo $rowlink; ?>" target="_blank">Xem chi tiết</a></td>
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
<script>
    $(document).ready(function () {
        // Thay doi trang thai don hang
        $('.statusTransport').on('change', function () {
            console.log(312312);
            let newStatus = $(this).val();
            let orderId = $(this).attr('data-order-id');

            $.ajax({
                url: '<?php echo admin_url('admin-ajax.php'); ?>',
                type: 'POST',
                cache: false,
                dataType: "text",
                data: {
                    status: newStatus,
                    orderId: orderId,
                    action: 'changeTransportStatus',
                },
                beforeSend: function () {
                    $('.divgif').css('display', 'block');
                },
                success: function (rs) {
                    $('.divgif').css('display', 'none');
                    rs = JSON.parse(rs);
                    if (rs.status == <?php echo success_code ?>) {
                        Swal.fire({
                            icon: 'success',
                            text: rs.mess,
                        });
                    } else {
                        Swal.fire({
                            icon: 'error',
                            text: rs.mess,
                        });
                    }
                }
            });
        });
        // Thay doi trang thai thanh toan
        $('.statusPayment').on('change', function () {
            let newPayment = $(this).val();
            let orderId = $(this).attr('data-order-id');

            $.ajax({
                url: '<?php echo admin_url('admin-ajax.php'); ?>',
                type: 'POST',
                cache: false,
                dataType: "text",
                data: {
                    status: newPayment,
                    orderId: orderId,
                    action: 'changePaymentStatus',
                },
                beforeSend: function () {
                    $('.divgif').css('display', 'block');
                },
                success: function (rs) {
                    $('.divgif').css('display', 'none');
                    rs = JSON.parse(rs);
                    if (rs.status == <?php echo success_code ?>) {
                        Swal.fire({
                            icon: 'success',
                            text: rs.mess,
                        });
                    } else {
                        Swal.fire({
                            icon: 'error',
                            text: rs.mess,
                        });
                    }
                }
            });
        });
    });
</script>