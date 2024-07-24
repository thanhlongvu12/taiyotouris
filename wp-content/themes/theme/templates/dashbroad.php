<?php
/**
 * Created by PhpStorm.
 * User: VuThanhLong
 * Date: 11/13/2023
 * Time: 2:20 PM
 */
?>
<?php
/* Template Name:  Thông tin cá nhân */
$id = get_the_ID();
$cook = $_COOKIE;
$currentLogin = getLogin();
$delivery = getDelivery($currentLogin->id);
//print_r('');die;
?>
<style>
    .main-dashboard .dash-content .dash-main .list-dash .info-user .col-left form .f-col .f-item select {
        width: 100%;
        font-size: 15px;
        line-height: 24px;
        font-family: var(--f-body);
        font-weight: 400;
        color: var(--cl-black);
        padding: 14px 30px;
        border: 1px solid rgba(60, 60, 60, 0.3019607843);
        box-shadow: 0px 0px 10px 0px rgba(216, 216, 216, 0.1019607843);
        border-radius: 10px;
    }
</style>
<style>
    #loading-overlay {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, 0.5);
        display: flex;
        justify-content: center;
        align-items: center;
        z-index: 9999;
    }

    .spinner {
        border: 4px solid #f3f3f3;
        border-top: 4px solid #3498db;
        border-radius: 50%;
        width: 40px;
        height: 40px;
        animation: spin 1s linear infinite;
    }

    @keyframes spin {
        0% {
            transform: rotate(0deg);
        }
        100% {
            transform: rotate(360deg);
        }
    }
</style>
<div id="loading-overlay">
    <div class="spinner"></div>
</div>
<input type="hidden" id="citydb" value="<?= $delivery->city ?>">
<input type="hidden" id="districtdb" value="<?= $delivery->district ?>">
<input type="hidden" id="wardsdb" value="<?= $delivery->wards ?>">
<main id="dashboard-1" class="dashboard">
    <section class="main-dashboard">
        <?php get_header('dash'); ?>
        <div class="dash-content">
            <div class="dash-header">
                <div class="dash-inner">
                    <div class="header-left">
                        <a href="<?= home_url() ?>">Trang chủ</a><span>/</span><a href="#">Cá nhân</a><span>/</span><a
                            href="<?= get_permalink($id) ?>" class="current">Thông tin cá nhân</a>
                    </div>
                    <div class="header-right">
                        <div class="bar-advand">
                            <div class="notification">
                                <div class="cart">
                                    <?php

//                                    $count = $wpdb->get_var("SELECT count(*) FROM {$wpdb->prefix}cart where id_user = {$currentLogin->id} and status_cart < 2 ");
                                    ?>
                                </div>
                                <a href="<?= home_url('giao-hang') ?>">
                                    <button>
                                        <img src="<?= get_template_directory_uri(); ?>/dist/images/noti.svg" alt="cart">
                                        <!-- <div class="label" style="<?= ($count == 0) ? 'display:none' : '' ?>"><span><?= $count ?></span></div> -->
                                    </button>
                                </a>
                            </div>
                        </div>
                        <div class="user-right">
                            <div class="d-user">
                                <div class="img">
                                    <figure><img class="avater"
                                                 src="<?= ($currentLogin->avatar != '') ? $currentLogin->avatar : get_template_directory_uri() . '/dist/images/user.png' ?>"
                                                 alt="user"></figure>
                                </div>
                                <div class="info">
                                    <h2><?= (!empty($currentLogin->email)) ? $currentLogin->email : 'Tài khoản' ?></h2>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="dash-main">
                <div class="dash-info--user">
                    <div class="dash-bar">
                        <h1>Thông tin cá nhân</h1>
                        <p>Quản lý thông tin hồ sơ để bảo mật tài khoản</p>
                    </div>
                    <div class="list-dash">
                        <div class="info-user">
                            <div class="row">
                                <div class="col-xl-8 col-left">
                                    <form action="" method="post" class="form-edit" id="form-edit">
                                        <div class="f-col">
                                            <div class="f-item">
                                                <label for="">Tài khoản</label>
                                                <input type="text" name="full_name" id="full_name"
                                                       value="<?= (!empty($delivery->fullname)) ? $delivery->fullname : "" ?>"
                                                       placeholder="Họ tên">
                                            </div>
                                            <div class="f-item">
                                                <label for="">Email</label>
                                                <input type="text" name="email" id="email"
                                                       value="<?= (!empty($currentLogin->email)) ? $currentLogin->email : "" ?>"
                                                       placeholder="Email" readonly>
                                            </div>
                                        </div>
                                        <div class="f-col">
                                            <div class="f-item">
                                                <label for="">Số điện thoại</label>
                                                <input type="text" name="phonenumber" id="phonenumber"
                                                       value="<?= (!empty($currentLogin->phonenumber)) ? $currentLogin->phonenumber : "" ?>"
                                                       placeholder="Số điện thoại" readonly>
                                            </div>
                                            <div class="f-item">
                                                <label for="">Địa chỉ</label>
                                                <input type="text" name="address" id="address"
                                                       value="<?= (!empty($delivery->address)) ? $delivery->address : "" ?>"
                                                       placeholder="Địa chỉ">
                                            </div>
                                        </div>
                                        <div class="f-col">
                                            <div class="f-item">
                                                <label for="city">Tỉnh / Thành phố</label>
                                                <select name="city" id="city">
                                                    <option value="<?= (!empty($delivery->city)) ? $delivery->city : "" ?>">
                                                        <?= (!empty($delivery->city)) ? $delivery->city : "Tỉnh / Thành phố" ?>
                                                    </option>
                                                </select>
                                            </div>
                                            <div class="f-item">
                                                <label for="district">Quận / Huyện</label>
                                                <select name="district" id="district">
                                                    <option value="<?= (!empty($delivery->district)) ? $delivery->district : "" ?>">
                                                        <?= (!empty($delivery->district)) ? $delivery->district : "Quận / Huyện" ?>
                                                    </option>
                                                </select>
                                            </div>

                                        </div>
                                        <div class="f-check" id="gender_radio">
                                            <strong>Giới tính</strong>
                                            <ul>
                                                <li>
                                                    <label for="">Nam</label>
                                                    <input type="radio" name="gender" id="male"
                                                           value="male" <?= (($currentLogin->gender == 'male') ? 'checked' : "") ?>>
                                                </li>
                                                <li>
                                                    <label for="">Nữ</label>
                                                    <input type="radio" name="gender" id="female"
                                                           value="female" <?= (($currentLogin->gender == 'female') ? 'checked' : "") ?>>
                                                </li>
                                                <li>
                                                    <label for="">Khác</label>
                                                    <input type="radio" name="gender" id="other"
                                                           value="other" <?= (($currentLogin->gender == 'other') ? 'checked' : "") ?>>
                                                </li>
                                            </ul>
                                        </div>
                                        <button type="button" id="button-edit">Chỉnh sửa thông tin</button>
                                    </form>
                                </div>
                                <div class="col-xl-4 col-right">
                                    <div class="upload-user">
                                        <div class="img-user">
                                            <figure><img id="preview"
                                                         src="<?= (!empty($currentLogin->avatar)) ? $currentLogin->avatar : "" ?>"
                                                         alt="user"></figure>
                                        </div>
                                        <div class="bnt-up">
                                            <label class="custom-file-label" for="avatar">Đổi avatar</label>
                                            <input type="file" id="avatar" name="avatar" value=""
                                                   accept="image/png, image/jpeg">
                                        </div>
                                        <span>Dụng lượng file tối đa 1 MB<br> Định dạng:.JPEG, .PNG</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>
<input type="hidden" value="" name="link_image" id="link_image">
<input type="hidden" id="datacity" value="<?= get_template_directory_uri() ?>/vn_city.json"><?php
get_footer('dash');
?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<!--<script>-->
<!--    jQuery(document).ready(function ($) {-->
<!---->
<!--    }-->
<!--</script>-->

<script>
    jQuery(document).ready(function ($) {
        var ajaxurl = "<?= admin_url('admin-ajax.php') ?>";

        var cms_adapter_ajax = function cms_adapter_ajax($param) {
            var beforeSend = $param.beforeSend || function() {};
            var complete = $param.complete || function() {}; //
            $.ajax({
                url: $param.url,
                type: $param.type,
                data: $param.data,
                processData: false,
                beforeSend: beforeSend,
                complete: complete,
                contentType: false,
                success: $param.callback
            });
        };
        $("#avatar").change(function (event) {  // event change <input> id="avatar"
            RecurFadeIn(); // call function
            readURL(this);
        });
        $("#avatar").on('click', function (event) { // event click <input> id="avatar"
            RecurFadeIn();
        });
        $("#loading-overlay").hide();

        // Hàm để hiển thị overlay
        function showLoadingOverlay() {
            $("#loading-overlay").show();
        }

        // Hàm để tắt overlay
        function hideLoadingOverlay() {
            $("#loading-overlay").hide();
        }

        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                var filename = $("#avatar").val();
                // $('#link_image').val(filename);
                filename = filename.substring(filename.lastIndexOf('\\') + 1);
                reader.onload = function (e) {
                    $('#preview').attr('src', e.target.result);
                    $('#link_image').val(e.target.result);
                    $('#preview').hide();
                    $('#preview').fadeIn(500);
                    // $('.custom-file-label').text(filename);
                    var link = e.target.result;

                }
                reader.readAsDataURL(input.files[0]);
                var imgFiles = $("#avatar")[0].files; // Lấy danh sách tệp hình ảnh đã chọn
                var imageFile = imgFiles[0]; // Truy cập vào ảnh đầu tiên trong danh sách
                var formData = new FormData();
                formData.append('action', 'update_ava');
                formData.append('images', imageFile);
                console.log(formData);
                var $param = {
                    'type': 'POST',
                    'url': ajaxurl,
                    'data': formData,
                    'beforeSend': function () {
                        showLoadingOverlay();
                    },
                    'complete': function () {
                        hideLoadingOverlay();
                    },
                    'callback': function (data) {
                        $('.divgif').css('display', 'none');
                        $('.avater').attr('src',JSON.parse(data).link);
                    }
                };
                // console.log(this.files[0].mozFullPath);
                cms_adapter_ajax($param);
            }
        }

        $(".alert").removeClass("loading").hide();

        function RecurFadeIn() {
            // console.log('ran');
            FadeInAlert("Wait for it...");
        }

        function FadeInAlert(text) {
            $(".alert").show();
            $(".alert").text(text).addClass("loading");
        }
    });
</script>
<script>
    $(document).ready(function () {
        var vietnam;
        var datacity = $("#datacity").val();
        $.getJSON(datacity, function (data) {
            vietnam = data.items;

            var citydb = $("#citydb").val();
            var districtdb = $("#districtdb").val();
            var wardsdb = $("#wardsdb").val();
            // Show thành phố và gán mảng huyện
            var huyen = [];
            var cityhtml = "";
            var keycity, keydistrict, keywards;
            for (var i = 0; i < vietnam.length; i++) {
                var nameCity = vietnam[i].name;
                if (nameCity == "Thành phố Hà Nội" || nameCity == "Thành phố Hồ Chí Minh") {
                    var name1 = nameCity.replace("Thành phố ", '');
                    var selected = "";
                    if (name1 == citydb) {
                        keycity = i;
                        selected = "selected";
                    }
                    cityhtml = cityhtml + '<option ' + selected + ' data-key="' + i + '" value="' + name1 + '">' + name1 + '</optiondata-key>';
                } else {
                    var name2 = nameCity.replace("Tỉnh ", '');
                    var selected = "";
                    if (name2 == citydb) {
                        keycity = i;
                        selected = "selected";
                    }
                    cityhtml = cityhtml + '<option ' + selected + ' data-key="' + i + '" value="' + name2 + '">' + name2 + '</option>';
                }
                huyen[i] = vietnam[i].huyen;
            }
            $("#city").append(cityhtml);

            // Chọn thành phố và show huyện
            var ward = [];

            $('body').on('change', '#city', function (e) {
                var option1 = $('option:selected', this).attr('data-key');
                loadH(option1);
            });
            loadH(keycity);

            function loadH(option1) {
                $('#district').html('<option  value="">Chọn</option>');
                $('#wards').html('<option  value="">Chọn</option>');
                var option_huyen1 = huyen[option1];
                var district = "";
                for (var m = 0; m < option_huyen1.length; m++) {
                    var selected = "";
                    if (option_huyen1[m].name == districtdb) {
                        keydistrict = m;
                        selected = "selected";
                    }
                    ward[m] = option_huyen1[m].xa;
                    district = district + '<option ' + selected + ' data-key="' + m + '" value="' + option_huyen1[m].name + '">' + option_huyen1[m].name + '</option>';
                }
                $('#district').append(district);
            }

        });
    });
</script>
<script>
    $(document).ready(function () {
        // THay đổi thông tin
        $('#button-edit').on('click', function () {
            var name = $('#full_name').val();
            var email = $('#email').val();
            var phonenumber = $('#phonenumber').val();
            var address = $('#address').val();
            var city = $('#city').find(':selected').val();
            var district = $('#district').find(':selected').val();
            var gender = $("input[name='gender']:checked").val();
            // var image = $('#link_image').val();
            // console.log(name);
            // console.log(email);
            // console.log(phonenumber);
            // console.log(address);
            // console.log(district);
            // console.log(gender);
            // console.log(city);
            // console.log(image);
            var link = "<?= admin_url('admin-ajax.php'); ?>";
            $.ajax({
                url: link,
                type: 'POST',
                cache: false,
                dataType: "json",
                data: {
                    name: name,
                    email: email,
                    phonenumber: phonenumber,
                    address: address,
                    district: district,
                    gender: gender,
                    city: city,
                    // image: image,
                    action: 'update_information',
                },
                beforeSend: function () {
                    $('.divgif').css('display', 'block');
                },
                success: function (data) {
                    if (data.status == true) {
                        $('.divgif').css('display', 'none');
                        alert(data.mess);
                    } else {
                        $('.divgif').css('display', 'none');
                        alert(data.mess);
                    }
                }
            });
        });
    });
</script>


