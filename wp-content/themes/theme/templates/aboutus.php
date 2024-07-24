<?php
/**
 * Created by PhpStorm.
 * User: VuThanhLong
 * Date: 11/7/2023
 * Time: 10:30 AM
 * Template Name: About US
 */
$uri = get_template_directory_uri();
get_header('v2');
?>
    <main id="about-us" class="main-v2">
        <section class="about-section-1">
            <div class="item-video">
                <div class="i-video">
                    <video class="video" autoplay loop muted>
                        <source src="<?= $uri?>/dist/images/video.mp4" type="video/mp4">
                    </video>
                    <div class="text">
                        <div class="container">
                            <div class="content">
                                <h1>Giới thiệu về Taiyotourits</h1>
                                <p>loremLorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. </p>
                                <button><i class="fal fa-play-circle"></i>Xem ngay</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="about-section-2">
            <div class="container">
                <div class="content">
                    <div class="title">
                        <h2>Hệ sinh thái của chúng tôi</h2>
                        <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincunt ut laoreet dolore magna aliquam</p>
                    </div>
                    <div class="ecosystem">
                        <div class="img"><figure><img src="<?= $uri?>/dist/images/ecosystem.png" alt="ecosystem"></figure></div>
                    </div>
                    <div class="detail-ecosystem">
                        <div class="row">
                            <div class="col-md-5 col-left">
                                <div class="img">
                                    <figure><img src="<?= $uri?>/dist/images/about.png" alt="about"></figure>
                                </div>
                            </div>
                            <div class="col-md-7 col-right">
                                <div class="text">
                                    <h2>Công ty cổ phần du lịch Taiyo</h2>
                                    <p>Công ty Cổ phần Du lịch Taiyo (Taiyo Tourist) được ra đời tập trung vào lĩnh vực lữ hành, lưu trú. Với phương châm hoạt động " Sự hài lòng của Quý khách là sự thành công của chúng tôi, Taiyo Tourist luôn đem đến cho khách hàng những sản phẩm, dịch vụ đạt chất lượng tốt nhất với giá cả cạnh tranh.</p>
                                    <div class="list-check">
                                        <ul>
                                            <li><i class="far fa-check"></i><span>Dịch vụ chất lượng tốt</span></li>
                                            <li><i class="far fa-check"></i><span>Giá cả cạnh tranh</span></li>
                                            <li><i class="far fa-check"></i><span>Nỗ lực phấn đấu để hoàn thiện</span></li>
                                            <li><i class="far fa-check"></i><span>Hỗ trợ thanh toán và vận hành vững mạnh</span></li>
                                            <li><i class="far fa-check"></i><span>Trải nghiệm đặt tour trực tuyến dễ dàng, đơn giản</span></li>
                                            <li><i class="far fa-check"></i><span>Dịch vụ liền mạch</span></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="about-section-3" style="background-image: url('<?= $uri?>/dist/images/bg-about.png')">
            <div class="container">
                <div class="content">
                    <div class="title">
                        <h2>Dịch vụ của chúng tôi</h2>
                        <p>Công ty Cổ phần Du lịch Taiyo (Taiyo Tourist) được ra đời tập trung vào lĩnh vực lữ hành, lưu trú. Với phương châm hoạt động " Sự hài lòng của </p>
                    </div>
                    <div class="row">
                        <div class="col-md-3 item">
                            <div class="i-item">
                                <a href="#">
                                    <div class="img">
                                        <figure><img src="<?= $uri?>/dist/images/se-1.svg" alt="se"></figure>
                                    </div>
                                    <h3>Tour du lịch</h3>
                                </a>
                            </div>
                        </div>
                        <div class="col-md-3 item">
                            <div class="i-item">
                                <a href="#">
                                    <div class="img">
                                        <figure><img src="<?= $uri?>/dist/images/se-2.svg" alt="se"></figure>
                                    </div>
                                    <h3>Dịch vụ lưu trú</h3>
                                </a>
                            </div>
                        </div>
                        <div class="col-md-3 item">
                            <div class="i-item">
                                <a href="#">
                                    <div class="img">
                                        <figure><img src="<?= $uri?>/dist/images/se-3.svg" alt="se"></figure>
                                    </div>
                                    <h3>Vé máy bay - Visa</h3>
                                </a>
                            </div>
                        </div>
                        <div class="col-md-3 item">
                            <div class="i-item">
                                <a href="#">
                                    <div class="img">
                                        <figure><img src="<?= $uri?>/dist/images/se-4.svg" alt="se"></figure>
                                    </div>
                                    <h3>Dịch vụ xe du lịch</h3>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="about-section-4" style="background-image: url('<?= $uri?>/dist/images/cate-hotel-2.png')">
            <div class="container">
                <div class="content">
                    <div class="title">
                        <h2>Taiyo Group</h2>
                        <p>Công ty Cổ phần Du lịch Taiyo (Taiyo Tourist) là thành viên của tập đoàn Taiyo cung cấp các dịch vụ liên quan đến du lịch và đặt phòng khách sạn</p>
                    </div>
                    <div class="diagram">
                        <div class="level-1">
                            <div class="img"> <figure><img src="<?= $uri?>/dist/images/lv-1.png" alt="logo"></figure></div>
                        </div>
                        <div class="level-2">
                            <div class="lv-item">
                                <div class="img">
                                    <figure><img src="<?= $uri?>/dist/images/lv-2.png" alt="logo"></figure>
                                </div>
                            </div>
                            <div class="lv-item">
                                <div class="img">
                                    <figure><img src="<?= $uri?>/dist/images/lv-3.png" alt="logo"></figure>
                                </div>
                            </div>
                            <div class="lv-item">
                                <div class="img">
                                    <figure><img src="<?= $uri?>/dist/images/lv-4.png" alt="logo"></figure>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="about-section-5" style="background-image: url('<?= $uri?>/dist/images/bg-about-3.png')">
            <div class="container">
                <div class="content">
                    <div class="text">
                        <h2>Dowload Profile</h2>
                        <p>loremLorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. </p>
                        <a href="#" download><img src="<?= $uri?>/dist/images/download.svg" alt="download">Tải xuống</a>
                    </div>
                </div>
            </div>
        </section>
    </main>
<?php
get_footer();
