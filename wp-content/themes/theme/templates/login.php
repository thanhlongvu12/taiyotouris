<?php
/**
 * Created by PhpStorm.
 * User: VuThanhLong
 * Date: 11/13/2023
 * Time: 11:42 AM
 * Template Name:  Login
 */
?>
<?php
//$idregister= getIdPage('register');
//$pass= getIdPage('forgot_password');
get_header();
global $wpdb;
$token = $_COOKIE['ssidd'];
if(!empty($token)) {
    $userr = $wpdb->get_row("select * from useragency where remeber_token = '{$token}'");
    if (!empty($userr)) {
        header("Location: " . home_url());
        exit;
    }
}
?>
<main id="login" class="main-v2">
    <section class="login" style="background-image: url('<?= get_template_directory_uri(); ?>/dist/images/bg-login.png')">
        <div class="container">
            <div class="content">
                <form action="" id="login_form" method="post">
                    <h1>Đăng nhập</h1>
                    <input type="text" name="email" id="email" placeholder="Nhập email">
                    <input type="password" name="password" id="password" placeholder="Nhập mật khẩu">
                    <button type="button" id="button_login">Đăng nhập</button>
                    <a href="<?= get_permalink($pass) ?>">Quên mật khẩu</a>
                    <div class="no-pass">
                        <span>Bạn chưa có tài khoản?</span>
                        <a href="<?= get_permalink($idregister) ?>">Đăng ký tài khoản</a>
                    </div>
                </form>
            </div>
        </div>
    </section>
</main>
<?php
get_footer();
?>
<script type="text/javascript">
    jQuery.validator.setDefaults({
        debug: false,
        success: "valid"
    });
    jQuery.validator.addMethod("passwordKey", function (value, element) {
        return this.optional(element) || /^(?=.*[A-Z])(?=.*[a-z])(?=.*[0-9])(?=.*[!@#$%&*])[a-zA-Z0-9!@#$%&*]+$/.test(value);
    });
    $("#login_form").submit(function (e) {
        e.preventDefault();
    }).validate({
        rules: {
            email: {
                required: true,
                email: true,
            },
            password: {
                required: true,
                minlength: 8,
                maxlength: 32,
                passwordKey: true,
            },
        },
        messages: {
            'email': {
                required: 'Vui lòng nhập địa chỉ email',
                email: 'Địa chỉ email không đúng',
            },
            'password': {
                required: 'Vui lòng nhập mật khẩu',
                minlength: 'Mật khẩu tối thiếu 8 kí tự',
                maxlength: 'Mật khẩu tối đa 32 kí tự',
                passwordKey: 'Mật khẩu ít nhất phải có 1 chữ hoa, 1 số, 1 ký tự đặc biệt và không dấu'

            },
        },
    });

    $('#button_login').on('click',function () {
        var link = "<?= admin_url('admin-ajax.php'); ?>";
        $.ajax({
            url: link,
            type: 'POST',
            cache: false,
            dataType: "json",
            data: {
                email: $('#email').val(),
                password: $('#password').val(),
                action: 'Login',
            },
            beforeSend: function () {
                $('.divgif').css('display', 'block');
            },
            success: function (data) {
                if (data.status == true) {
                    $('.divgif').css('display', 'none');
                    setTimeout(function () {
                        window.location.href = data.urlLogin;
                    }, 500);
                } else {
                    $('.divgif').css('display', 'none');
                    alert(data.mess);
                }
            }
        });
    });
</script>
