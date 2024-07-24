<?php
include __DIR__ . "/../includes/padding.php";
global $wpdb;

$idOrder = xss(no_sql_injection($_GET['id']));
$queryOrders = $wpdb->get_row("SELECT * FROM tt_orders where id='".$idOrder."'");
//$delivery_information = $wpdb->get_results("SELECT * FROM tt_delivery_information where id_orders=".$idOrder);
$us = $wpdb->get_results("SELECT * FROM tt_delivery_information where id_user = '".$queryOrders->id_user." '");
$email = $wpdb->get_results("SELECT * FROM useragency where id = '".$queryOrders->id_user." '");
//print_r($us);die;
$user = $us[0];
$id_post = $queryOrders->id_post;
$data = json_decode($queryOrders->data);
?>

<style>
    input {
        width: 100%;
    }

    .d-none {
        display: none;
    }
    .order-item-product img{
        width: 100%;
    }
    .order-item-product{
        padding: 40px 45px;
        /*background: #ecf1ff;*/
        border-radius: 10px;
        margin-bottom: 20px;
    }
    .order-item-product .order-status{
        margin: 20px auto;
    }
    .order-item-product .order-status .st-main{
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 50px;
    }
    .order-item-product .order-status .st-main .st-left{
        display: flex;
        align-items: center;
        gap: 40px;
        flex-basis: 70%;
    }
    .order-item-product .order-status .st-main .st-left .status{
        display: flex;
        align-items: center;
        gap: 10px;
    }
    .order-item-product .order-status .st-main .st-left .status span{
        display: block;
        font-size: 14px;
        line-height: 20px;
        color: #292b2e;
        margin: 0;
    }
    .order-item-product .order-status .st-main .st-left .status strong{
        display: block;
        font-size: 14px;
        line-height: 20px;
        color: #e91c24;
        font-family: K2D-Bold, sans-serif;
        margin: 0;
    }
    .order-item-product .order-status .st-main .st-right{
        flex: 1;
        display: flex;
        align-items: center;
        justify-content: flex-end;
        text-align: right;
        gap: 50px;
    }
    .order-item-product .order-status .st-main .st-right span{
        flex: 1;
        display: block;
        font-size: 16px;
        line-height: 24px;
        color: #292b2e;
        margin: 0;
    }
    .order-item-product .order-status .st-main .st-right strong{
        display: block;
        font-size: 20px;
        line-height: 26px;
        color: #e54141;
        font-family: K2D-Bold, sans-serif;
    }
    .order-item-product .order-detail{
        border-bottom: 1px solid #d9d9d9;
        padding-bottom: 25px;
    }
    .order-item-product .order-detail .list-product{

    }
    .order-item-product .order-detail .list-product .morth-item{
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 50px;
        margin-bottom: 20px;
    }
    .order-item-product .order-detail .list-product .morth-item .morth-img{
        display: flex;
        align-items: center;
        gap: 50px;
        flex-basis: 70%;
    }
    .order-item-product .order-detail .list-product .morth-item .morth-img figure{
        position: relative;
        width: 150px;
        height: 125px;
        border-radius: 10px;
    }
    .order-item-product .order-detail .list-product .morth-item .morth-img figure img {
        height: 160px;
        object-fit: contain;
    }
    .order-item-product .order-detail .list-product .morth-item .morth-img .info{

    }
    .order-item-product .order-detail .list-product .morth-item .morth-img .info h4{
        font-size: 20px;
        line-height: 26px;
        /*font-family: var(--f-bold);*/
        color: #292b2e;
        margin-bottom: 10px;
    }
    .order-item-product .order-detail .list-product .morth-item .morth-img .info .type{
        display: flex;
        align-items: center;
        gap: 15px;
    }
    .order-item-product .order-detail .list-product .morth-item .morth-img .info .type span{
        display: block;
        font-size: 14px;
        line-height: 24px;
        color: rgba(22, 7, 8, 0.5019607843);
    }

    .order-item-product .order-detail .list-product .morth-item .morth-price strong{
        font-size: 20px;
        line-height: 26px;
        font-family: K2D-ExtraBold, sans-serif;
        color: #292b2e;
        margin: 0;
    }
    .order-item-product .order-detail .list-product .morth-item .morth-price{
        flex: 1;
        text-align: right;
    }
    .order-item-product .order-detail .list-info{
        display: flex;
        align-items: center;
        justify-content: space-between;
        padding-top: 20px;
        margin-top: 30px;
        border-top: 1px solid #d9d9d9;
    }
    .order-item-product .order-detail .list-info .info__left ul li{
        display: flex;
        align-items: center;
        flex-basis: 50%;
        gap: 15px;
        margin-bottom: 10px;
    }
    .order-item-product .order-detail .list-info .info__left ul{
        display: flex;
        align-items: center;
        flex-wrap: wrap;
        margin: 0;
        padding: 0;
        list-style: none;
    }
    .order-item-product .order-detail .list-info .info__left{
        flex-basis: 70%;
    }
    .order-item-product .order-detail .list-info .info__right ul{
        display: flex;
        align-items: center;
        flex-wrap: wrap;
        margin: 0;
        padding: 0;
        list-style: none;
    }
    .order-item-product .order-detail .list-info .info__right ul li{
        width: 100%;
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 20px;
        margin-bottom: 10px;
    }
    .order-item-product .order-detail .list-info .info__right{
        flex: 1;
        padding-left: 120px;
    }
    .order-item-product strong{
        display: block;
        font-size: 16px;
        line-height: 26px;

        color: #292b2e;
        margin: 0;
    }
    .order-item-product span{
        display: block;
        font-size: 16px;
        line-height: 26px;
        color: #292b2e;
        margin: 0;
    }
    .st-left button{
        padding: 9px 30px;
        border: none;
        font-size: 14px;
        line-height: 20px;
        color: #e91c24;
        border: 1px solid #e91c24;
        background: rgba(0, 0, 0, 0);
        border-radius: 10px;
    }
</style>
<div class="wrap">
    <h1>
        Quản lý đơn hàng
    </h1>
    <form id="adddaily" method="post" action="<?php echo $module_path . '&sub=edit&edit_action=1&id=' . $id; ?>"
          name="post">
        <div id="poststuff">
            <input type="hidden" value="<?php echo $id; ?>" name="id"/>
            <div class="metabox-holder columns-2" id="post-body">
                <!---left-->
                <div id="post-body-content" class="pos1">
                    <div class="postbox">
                        <div class="inside">
                            <div class="order-table">
                                <div class="order-item-product">
                                    <div class="order-detail">
                                        <div class="list-product">
                                            <?php if(!empty($data)): ?>
                                            <?php foreach ($data as $value): ?>
                                                    <div class="morth-item">
                                                        <div class="morth-img">
                                                            <figure>
                                                                <?= get_the_post_thumbnail($value->id_post) ?>
                                                            </figure>
                                                            <div class="info">
                                                                <h4><?= get_the_title($value->id_post) ?></h4>
                                                                <div class="type">
                                                                    <span>Số lượng người lớn: <?= $value->qty_adult ?></span>
                                                                    <span>Giá người lớn: <?= money_check($value->pirce_adult) ?>đ</span>
                                                                    <span>Số lượng trẻ em: <?= $value->qty_child ?></span>
                                                                    <span>Giá trẻ em: <?= money_check($value->pirce_child) ?>đ</span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="morth-price">
                                                            <strong><?= money_check($queryOrders->price_payment) ?> đ</strong>
                                                        </div>
                                                    </div>
                                            <?php  endforeach;?>
                                            <?php else: ?>
                                                <div class="morth-item">
                                                    <div class="morth-img">
                                                        <figure>
                                                            <?= get_the_post_thumbnail($id_post) ?>
                                                        </figure>
                                                        <div class="info">
                                                            <h4><?= get_the_title($id_post) ?></h4>
                                                            <div class="type">
                                                                <span>Số lượng người lớn: <?= $queryOrders->number_adult ?></span>
                                                                <span>Giá người lớn: <?= $queryOrders->adult_price ?></span>
                                                                <span>Số lượng trẻ em: <?= $queryOrders->number_child ?></span>
                                                                <span>Giá trẻ em: <?= $queryOrders->child_price ?></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="morth-price">
                                                        <?php $post_price = (($queryOrders->number_adult*$queryOrders->adult_price)+($queryOrders->number_child*$queryOrders->child_price)) ?>
                                                        <strong><?= money_check($queryOrders->price_payment) ?> đ</strong>
                                                    </div>
                                                </div>
                                            <?php endif; ?>
                                        </div>
                                        <div class="list-info">
                                            <div class="info__left">
                                                <ul>
                                                    <li>
                                                        <span>Mã đơn hàng:</span>
                                                        <strong><?= $queryOrders->order_code ?></strong>
                                                    </li>
                                                    <li>
                                                        <span>Họ và tên:</span>
                                                        <strong><?= $user->fullname ?></strong>
                                                    </li>
                                                    <li>
                                                        <span>Danh mục đơn hàng:</span>
                                                        <strong><?= $queryOrders->type_order ?></strong>
                                                    </li>
                                                    <li>
                                                        <span>Email:</span>
                                                        <strong><?= $email[0]->email ?></strong>
                                                    </li>
                                                    <li>
                                                        <span>Ngày đặt hàng:</span>
                                                        <strong><?= date('H:i d/m/Y', $queryOrders->time_order) ?></strong>
                                                    </li>
                                                    <li>
                                                        <span>Số điện thoại:</span>
                                                        <strong><?= $user->phone ?></strong>
                                                    </li>
                                                    <li>
                                                        <span>Địa chỉ:</span>
                                                        <strong><?= $user->address ?></strong>
                                                    </li>
                                                    <li>
                                                        <span>Quận / Huyện :</span>
                                                        <strong><?= $user->district ?></strong>
                                                    <li>
                                                        <span>Tỉnh / Thành phố :</span>
                                                        <strong><?= $user->city ?></strong>
                                                    </li>

                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="order-status">
                                        <div class="st-main">
                                            <div class="st-left">
                                                <div class="status">
                                                    <span>Trạng thái:</span>
                                                    <?php if($queryOrders->status == 1): ?>
                                                        <strong>Chờ xác nhận</strong>
                                                    <?php elseif ($queryOrders->status == 2): ?>
                                                        <strong>Chờ lấy hàng</strong>
                                                    <?php elseif ($queryOrders->status == 3): ?>
                                                        <strong>Đang giao hàng</strong>
                                                    <?php elseif ($queryOrders->status == 4): ?>
                                                        <strong>Đã giao hàng</strong>
                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                            <div class="st-right">
                                                <span>Thành tiền:</span>
                                                <strong><?= number_format($queryOrders->price_payment, 0, ',', '.') ?> đ</strong>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </form>
</div>

<?php
//add_admin_js('image.upload.js');

add_admin_js('jquery.min.js');
add_admin_js('jquery.validate.min.js');
?>

<script>
    $(document).ready(function () {
        $("#adddaily").validate({
            rules: {
                name: {
                    required: true,
                    minlength: 3,
                },
            },
            messages: {
                name: {
                    required: "Vui lòng nhập họ tên",
                    minlength: "Tối thiểu 3 ký tự",
                },
            }
        });
    });
</script>
