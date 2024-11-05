<?php
/**
 * theme functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package theme
 */
include (TEMPLATEPATH . '/functions-search.php');
require get_template_directory() . '/function-ajax-customer.php';
require get_template_directory() . '/function-config.php';
require get_template_directory() . '/function-ajax-action.php';

if ( ! function_exists( 'theme_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function theme_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on theme, use a find and replace
		 * to change 'theme' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'theme', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus( array(
			'menu-1' => esc_html__( 'Primary', 'theme' ),
		) );

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );

		// Set up the WordPress core custom background feature.
		add_theme_support( 'custom-background', apply_filters( 'theme_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		) ) );

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support( 'custom-logo', array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		) );
	}
endif;
add_action( 'after_setup_theme', 'theme_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function theme_content_width() {
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters( 'theme_content_width', 640 );
}
add_action( 'after_setup_theme', 'theme_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function theme_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'theme' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'theme' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'theme_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function theme_scripts() {
	wp_enqueue_style( 'theme-style', get_stylesheet_uri() );

	wp_enqueue_script( 'theme-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );

	wp_enqueue_script( 'theme-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'theme_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

if ( function_exists( 'acf_add_options_page' ) ) {
    // add parent
    $parent = acf_add_options_page( array(
        'page_title' => 'Tùy chỉnh chung',
        'menu_title' => 'Tùy chỉnh chung',
        'redirect'   => false
    ) );
    // add sub page
//    acf_add_options_sub_page( array(
//        'page_title'  => '',
//        'menu_title'  => '',
//        'parent_slug' => $parent['menu_slug'],
//    ) );

}

show_admin_bar(false);

function checkImage($id)
{
    $avatar_hot = get_the_post_thumbnail_url($id, 'full');
    if ($avatar_hot == '') {
        $avatar_hot = get_field('image_no_image', 'option');
    }
    return $avatar_hot;
}

function getIdPage($name){
    // Lấy dữ liệu data
    $pages_data = get_pages(array(
        'meta_key' => '_wp_page_template',
        'meta_value' => 'templates/'.$name.'.php'
    ));
    $id_dv = $pages_data[0]->ID;
    return $id_dv;
}


function no_sql_injection($input)
{
    $arr = array("from", "select", "insert", "insert", "delete", "where", "drop", "drop table", "show tables", "*", "=", "update");
    $sql = str_replace($arr, "", $input);
    return trim(strip_tags(addslashes($sql))); #strtolower()
}
function xss($input)
{
    $input = str_replace('=', '', $input);
    $input = str_replace(';', '', $input);
    $input = str_replace(':', '', $input);
    $input = str_replace('[', '', $input);
    $input = str_replace(']', '', $input);
    $input = str_replace('?', '', $input);
    $input = str_replace('AND', '', $input);
    $input = str_replace('OR ', '', $input);
//    $input = str_replace('&', '', $input);
    $input = str_replace('\'', '', $input);
    $input = str_replace('"', '', $input);
    $input = str_replace('`', '', $input);
    $input = str_replace("'", '', $input);
    $input = str_replace('%', '', $input);
    $input = str_replace('<', '', $input);
    $input = str_replace('>', '', $input);
    $input = str_replace('*', '', $input);
    $input = str_replace('+', '', $input);
    $input = str_replace('#', '', $input);
    $input = str_replace(')', '', $input);
    $input = str_replace('(', '', $input);
    $input = str_replace('\\', '', $input);
    $input = str_replace('\/', '', $input);
//    $input = str_replace('-', '', $input);
    $input = str_replace('SHUTDOWN', '', $input);
    $input = str_replace('DROP', '', $input);
    $input = preg_replace("/[`]/", '', $input);
    $input = addslashes($input);
    $input = htmlspecialchars($input);
    $input = strip_tags($input);

    return $input;
}
// Hàm cắt chuỗi
function cutString($string='',$size=100,$link='...')
{
    $string = strip_tags(trim($string));
    $strlen = strlen($string);
    $str = substr($string,$size,20);
    $exp = explode(" ",$str);
    $sum =  count($exp);
    $yes= "";
    for($i=0;$i<$sum;$i++)
    {
        if($yes==""){
            $a = strlen($exp[$i]);
            if($a==0){ $yes="no"; $a=0;}
            if(($a>=1)&&($a<=12)){ $yes = "no"; $a;}
            if($a>12){ $yes = "no"; $a=12;}
        }
    }
    $sub = substr($string,0,$size+$a);
    if($strlen-$size>0){ $sub.= $link;}
    return $sub;
}

// Menu
function checkChild($data, $id){
    foreach ($data as $value){
        if ($value->menu_item_parent == $id){
            return true;
        }
    }
    return false;
}

function menu($data, $parentID=0,$lv=0){
    if($lv == 0){
        $result = "<div class='menu-inner'>";
        $result .= "<ul>";
    }else{
        $result = "<div class='drop-menu'>";
        $result .= "<ul>";
    }

    foreach ($data as $value){
        if ($value->menu_item_parent == $parentID){
            if ($lv == 0){
                $result .= "<li>";
                $result .= "<div class='item-link'>";
                $result .= "<a href='$value->url'>$value->title</a>";
                $result .= "</div>";
            }else{
                $result .= "<li>";
                $result .= "<div class='item-link-sub'>";
                $result .= "<a href='$value->url'>$value->title</a>";
                $result .= "</div>";
            }
            if (checkChild($data, $value->ID)){
                $result .= menu($data, $value->ID, $lv+1);
            }
            $result .= "</li>";
        }
    }
    $result .= "</ul>";
    $result .= "</div>";
    return $result;
}

function generate_order_code($table_name) {
    global $wpdb;

    // Tạo mã đơn hàng ban đầu
    $cartcode = 'DH_' . date('Y');

    // Lấy số lượng đơn hàng cho năm hiện tại
    $sql_select = $wpdb->prepare("SELECT count(*) FROM $table_name WHERE nam_dat = %d", date('Y'));
    $idcart = $wpdb->get_var($sql_select) + 1;

    // Định dạng $idcart với số 0 ở đầu
    $idcart = sprintf("%05d", $idcart);

    // Ghép chuỗi $idcart đã định dạng vào mã đơn hàng
    $cartcode .= $idcart;

    // Kiểm tra xem mã đơn hàng đã được tạo có tồn tại trong cơ sở dữ liệu chưa
    $existing_order = $wpdb->get_row($wpdb->prepare("SELECT * FROM $table_name WHERE order_code = %s", $cartcode));

    // Vòng lặp để đảm bảo mã đơn hàng là duy nhất
    while ($existing_order !== null) {
        $idcart++; // Tăng giá trị của $idcart
        $idcart = sprintf("%05d", $idcart); // Định dạng với số 0 ở đầu
        $cartcode = 'DH_' . date('Y') . $idcart; // Tạo mã đơn hàng mới
        $existing_order = $wpdb->get_row($wpdb->prepare("SELECT * FROM $table_name WHERE order_code = %s", $cartcode));
    }

    return $cartcode;
}

function formatShortNumber($number) {
    $siSymbols = ['', 'k', 'M', 'B', 'T'];
    $tier = floor(log10(abs($number)) / 3);

    if ($tier == 0) return $number;

    $suffix = $siSymbols[$tier];
    $scale = pow(10, $tier * 3);

    $scaledNumber = $number / $scale;

    return number_format($scaledNumber, 1) . $suffix;
}