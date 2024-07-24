<?php
/**
 * Created by PhpStorm.
 * User: VuThanhLong
 * Date: 11/13/2023
 * Time: 11:42 AM
 * Template Name:  Register
 */

?>
<?php
/*  */
get_header();
$idlogin = getIdPage('login');
?>
<main id="register">
    <section class="login"
             style="background-image: url('<?= get_template_directory_uri(); ?>/dist/images/bg-register.png')">
        <div class="container">
            <div class="content">
                <form action="" id="info_register" method="post">
                    <h1>Đăng ký</h1>
                    <input type="text" name="email" id="email" value="" placeholder="* Nhập email">
                    <input type="text" name="phonenumber" id="phonenumber" value="" placeholder="Nhập số điện thoại">
                    <input type="password" name="password" id="password" value="" placeholder="Nhập mật khẩu">
                    <button id="form_register" type="button">Đăng ký</button>
                    <div class="no-pass">
                        <span>Bạn đã có tài khoản?</span>
                        <a href="<?= get_permalink($idlogin) ?>">Đăng nhập tài khoản</a>
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
        // return this.optional(element) || /^(?=.*[A-Z])(?=.*[a-z])(?=.*[0-9])(?=.*[!@#$%&*])[a-zA-Z0-9!@#$%&*]+$/.test(value);
        return this.optional(element) || /^[a-zA-Z0-9!@#$%&*]+$/.test(value);
    });
    $("#info_register").submit(function (e) {
        e.preventDefault();
    }).validate({
        rules: {
            email: {
                required: true,
                email: true,
            },
            phonenumber: {
                required: true,
                minlength: 9,
                maxlength: 12,
                digits: true,
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
            'phonenumber': {
                required: 'Vui lòng nhập số điện thoại',
                minlength: 'Số điện thoại tối thiếu 9 kí tự',
                maxlength: 'Số điện thoại tối đa 12 kí tự',
                digits: 'Vui lòng nhập chữ số',

            },
            'password': {
                required: 'Vui lòng nhập mật khẩu',
                minlength: 'Mật khẩu tối thiếu 8 kí tự',
                maxlength: 'Mật khẩu tối đa 32 kí tự',
                passwordKey: 'Mật khẩu ít nhất phải có 1 chữ hoa, 1 số, 1 ký tự đặc biệt và không dấu'

            },
        },
    });
    $('#form_register').on('click',function () {
        var link = "<?= admin_url('admin-ajax.php'); ?>";
        $.ajax({
            url: link,
            type: 'POST',
            cache: false,
            dataType: "json",
            data: {
                email: $('#email').val(),
                phonenumber: $('#phonenumber').val(),
                password: $('#password').val(),
                action: 'Register',
            },
            beforeSend: function () {
                $('.divgif').css('display', 'block');
            },
            success: function (data) {
                $('.divgif').css('display', 'none');
                if (data.status == true) {
                    setTimeout(function () {
                        window.location.href = data.urlLogin;
                    }, 500);
                } else {
                    // alert(data.mess);
                }
            }
        });
    });

</script>

