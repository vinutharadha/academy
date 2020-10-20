<?php
namespace WowDiviCarouselLite;

defined( 'ABSPATH' ) || die();

class Admin_Dashboard {

    const MODULES_NONCE = 'wdcl_save_admin';

	public function __construct() {
		add_action( 'admin_menu', [ __CLASS__, 'add_menu'], 21 );
		add_action( 'admin_enqueue_scripts', [ __CLASS__, 'enqueue_scripts'], 21 );
	}

	public static function add_menu() {
		add_menu_page(
            __( 'WowCarousel Lite', 'wdcl-wow-divi-carousel-lite' ),
            __( 'WowCarousel Lite', 'wdcl-wow-divi-carousel-lite' ),
            'manage_options',
            'wow-divi-carousel-lite',
            [ __CLASS__, 'render_main' ],
            wdcl_white_svg_icon(),
            111
        );

	}

    public static function enqueue_scripts() {

        if ( ! current_user_can( 'manage_options' ) ) {
            return;
        }

        wp_enqueue_style(
            'wdcl-admin',
            WDCL_PLUGIN_ASSETS . 'admin/css/admin.css'
        );

        wp_enqueue_style(
            'google-nunito-font',
            WDCL_PLUGIN_ASSETS . 'fonts/nunito/stylesheet.css'
        );

    }

    private static function get_all_modules() {
        
        $modules_map = [

            'image-carousel' => [
                'demo'    => 'https://wowcarousel.com/modules/image-carousel/',
                'title'   => __( 'Image Carousel', 'wdcl-wow-divi-carousel-lite'),
                'is_free' => true
            ],

            'logo-carousel' => [
                'demo'    => 'https://wowcarousel.com/modules/logo-carousel/',
                'title'   => __( 'Logo Carousel', 'wdcl-wow-divi-carousel-lite'),
                'is_free' => true
            ],

            'content-carousel' => [
                'demo'    => 'https://wowcarousel.com/modules/content-carousel/',
                'title'   => __( 'Content Carousel', 'wdcl-wow-divi-carousel-lite'),
                'is_free' => false
            ],

            'card-carousel' => [
                'demo'    => 'https://wowcarousel.com/modules/card-carousel/',
                'title'   => __( 'Card Carousel', 'wdcl-wow-divi-carousel-lite'),
                'is_free' => false
            ],

            'team-carousel' => [
                'demo'    => 'https://wowcarousel.com/modules/team-carousel/',
                'title'   => __( 'Team Carousel', 'wdcl-wow-divi-carousel-lite'),
                'is_free' => false
            ],

            'testimonial' => [
                'demo'    => 'https://wowcarousel.com/modules/testimonial-carousel/',
                'title'   => __( 'Testimonial Carousel', 'wdcl-wow-divi-carousel-lite'),
                'is_free' => false
            ],

            'divi-library' => [
                'demo'    => 'https://wowcarousel.com/modules/divi-library/',
                'title'   => __( 'Divi Library Carousel', 'wdcl-wow-divi-carousel-lite'),
                'is_free' => false
            ],

            'post-carousel' => [
                'demo'    => 'https://wowcarousel.com/modules/post-carousel/',
                'title'   => __( 'Post Carousel', 'wdcl-wow-divi-carousel-lite'),
                'is_free' => false
            ],
            
            'twitter-feed' => [
                'demo'    => 'https://wowcarousel.com/modules/twitter-feed/',
                'title'   => __( 'Twitter Feed', 'wdcl-wow-divi-carousel-lite'),
                'is_free' => true
            ],

            'product-carousel' => [
                'demo'    => 'https://wowcarousel.com/modules/twitter-feed/',
                'title'   => __( 'Product Carousel', 'wdcl-wow-divi-carousel-lite'),
                'is_free' => false
            ],

            'google-reviews' => [
                'demo'    => 'https://wowcarousel.com/modules/google-review/',
                'title'   => __( 'Google Review', 'wdcl-wow-divi-carousel-lite'),
                'is_free' => false
            ],

        ];

        return $modules_map;
    }

    public static function get_modules() {

        $modules_map = self::get_all_modules();

        return $modules_map;
    }

    private static function load_template( $template ) {
    	$file = WDCL_PLUGIN_DIR . 'templates/admin/admin-' . $template . '.php';
        if ( is_readable( $file ) ) {
            include( $file );
        }
    }

    public static function render_main() {
        self::load_template( 'main' );
    }
    
}

new Admin_Dashboard;