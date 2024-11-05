<?php
/* Template Name:  Liên hệ */
get_header();
$info = get_field('information', get_the_ID());
?>
    <style>
        iframe {
            width: 100%;
        }
    </style>
    <main id="faq" class="main-v2">
        <section class="archive-blog-1" style="background-image: url('<?= get_field('background', get_the_ID()) ?>')">
            <div class="container">
                <div class="content">
                    <div class="url-link"><a href="<?= home_url(); ?>">Trang chủ</a><span>/</span><a
                                href="<?= get_permalink(get_the_ID()) ?>"><?= get_the_title() ?></a></div>
                    <h1><?= get_the_title() ?></h1>
                </div>
            </div>
        </section>
        <section class="contact-1"
                 style="background-image: url('<?= get_template_directory_uri(); ?>/dist/images/bg-faq.png')">
            <div class="container">
                <div class="content">
                    <div class="title">
                        <h2><?= get_field('name_form', get_the_ID()) ?></h2>
                        <p><?= get_field('detail', get_the_ID()) ?></p>
                    </div>
                    <div class="row">
                        <div class="col-lg-8 col-left">
                            <div class="contact-form">
                                <?php echo do_shortcode('[contact-form-7 id="195" title="Liên hệ"]'); ?>
                            </div>
                        </div>
                        <div class="col-lg-4 col-right">
                            <div class="info-contact">
                                <h3>Liên hệ với chúng tôi</h3>
                                <ul>
                                    <?php if (!empty($info['Headerquarters'])): ?>
                                        <li>
                                            <a href="#">
                                                <div class="img">
                                                    <figure><img src="<?= $info['icon_tru']; ?>" alt="contact"></figure>
                                                </div>
                                                <div class="text">
                                                    <span><?= $info['name_header'] ?></span>
                                                    <strong><?= $info['Headerquarters'] ?></strong>
                                                </div>
                                            </a>
                                        </li>
                                    <?php endif; ?>
                                    <?php if (!empty($info['brach'])): ?>
                                        <li>
                                            <a href="#">
                                                <div class="img">
                                                    <figure><img
                                                                src="<?= $info['icon_chi']; ?>"
                                                                alt="contact"></figure>
                                                </div>
                                                <div class="text">
                                                    <span><?= $info['name_brach'] ?></span>
                                                    <strong><?= $info['brach'] ?></strong>
                                                </div>
                                            </a>
                                        </li>
                                    <?php endif; ?>
                                    <?php if (!empty($info['number'])): ?>
                                        <li>
                                            <a href="tel:<?= $info['number'] ?>">
                                                <div class="img">
                                                    <figure><img src="<?= $info['icon_p']; ?>" alt="contact"></figure>
                                                </div>
                                                <div class="text">
                                                    <span><?= $info['phone'] ?></span>
                                                    <strong><?= $info['number'] ?></strong>
                                                </div>
                                            </a>
                                        </li>
                                    <?php endif; ?>
                                </ul>
                                <div class="social">
                                    <ul>
                                        <?php if (!empty($info['link_youtobe'])): ?>
                                            <li><a href="<?= $info['link_youtobe'] ?>"><img
                                                            src="<?= get_template_directory_uri(); ?>/dist/images/ytb.svg"
                                                            alt="ytb"></a></li>
                                        <?php endif; ?>
                                        <?php if (!empty($info['link_in'])): ?>
                                            <li><a href="<?= $info['link_in'] ?>"><img
                                                            src="<?= get_template_directory_uri(); ?>/dist/images/tw.svg"
                                                            alt="ytb"></a></li>
                                            <?php if (!empty($info['link_facebook'])): ?>
                                            <?php endif; ?>
                                            <li><a href="<?= $info['link_facebook'] ?>"><img
                                                            src="<?= get_template_directory_uri(); ?>/dist/images/fb.svg"
                                                            alt="ytb"></a></li>
                                        <?php endif; ?>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <?= get_field('map', get_the_ID()) ?>
    </main>

<?php
get_footer();
?>