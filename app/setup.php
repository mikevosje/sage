<?php

namespace App;

use Roots\Sage\Container;
use Roots\Sage\Assets\JsonManifest;
use Roots\Sage\Template\Blade;
use Roots\Sage\Template\BladeProvider;
use Wappz\Assets;

/**
 * Theme assets
 */
add_action('wp_enqueue_scripts', function () {
    wp_enqueue_style('sage/main.css', asset_path('styles/main.css'), false, null);
    wp_enqueue_script('sage/main.js', asset_path('scripts/main.js'), ['jquery'], null, true);
}, 100);

/**
 * Theme setup
 */
add_action('after_setup_theme', function () {
    /**
     * Enable features from Soil when plugin is activated
     * @link https://roots.io/plugins/soil/
     */
    add_theme_support('soil-clean-up');
    add_theme_support('soil-jquery-cdn');
    add_theme_support('soil-nav-walker');
    add_theme_support('soil-nice-search');
    add_theme_support('soil-relative-urls');

    /**
     * Enable plugins to manage the document title
     * @link https://developer.wordpress.org/reference/functions/add_theme_support/#title-tag
     */
    add_theme_support('title-tag');

    /**
     * Register navigation menus
     * @link https://developer.wordpress.org/reference/functions/register_nav_menus/
     */
    register_nav_menus([
        'primary_navigation' => __('Primary Navigation', 'sage')
    ]);

    /**
     * Enable post thumbnails
     * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
     */
    add_theme_support('post-thumbnails');

    /**
     * Enable HTML5 markup support
     * @link https://developer.wordpress.org/reference/functions/add_theme_support/#html5
     */
    add_theme_support('html5', ['caption', 'comment-form', 'comment-list', 'gallery', 'search-form']);

    /**
     * Enable selective refresh for widgets in customizer
     * @link https://developer.wordpress.org/themes/advanced-topics/customizer-api/#theme-support-in-sidebars
     */
    add_theme_support('customize-selective-refresh-widgets');

    /**
     * Use main stylesheet for visual editor
     * @see resources/assets/styles/layouts/_tinymce.scss
     */
    add_editor_style(asset_path('styles/main.css'));
}, 20);

/**
 * Register sidebars
 */
add_action('widgets_init', function () {
    $config = [
        'before_widget' => '<section class="widget %1$s %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h3>',
        'after_title'   => '</h3>'
    ];
    register_sidebar([
        'name'          => __('Primary', 'sage'),
        'id'            => 'sidebar-primary'
    ] + $config);
    register_sidebar([
        'name'          => __('Footer', 'sage'),
        'id'            => 'sidebar-footer'
    ] + $config);
});

/**
 * Updates the `$post` variable on each iteration of the loop.
 * Note: updated value is only available for subsequently loaded views, such as partials
 */
add_action('the_post', function ($post) {
    sage('blade')->share('post', $post);
});

/**
 * Setup Sage options
 */
add_action('after_setup_theme', function () {
    /**
     * Add JsonManifest to Sage container
     */
    sage()->singleton('sage.assets', function () {
        return new JsonManifest(config('assets.manifest'), config('assets.uri'));
    });

    /**
     * Add Blade to Sage container
     */
    sage()->singleton('sage.blade', function (Container $app) {
        $cachePath = config('view.compiled');
        if (!file_exists($cachePath)) {
            wp_mkdir_p($cachePath);
        }
        (new BladeProvider($app))->register();
        return new Blade($app['view']);
    });

    /**
     * Create @asset() Blade directive
     */
    sage('blade')->compiler()->directive('asset', function ($asset) {
        return "<?= " . __NAMESPACE__ . "\\asset_path({$asset}); ?>";
    });
});

/**
 * Register custom image sizes
 *
 * @param $sizes array
 */
function register_image_sizes( $sizes ) {
    foreach ( $sizes as $id => $size ) {
        add_image_size( $id, $size['width'], $size['height'], $size['crop'] );
    }
}

/**
 * Load images sizes on init
 * @action init
 */
function init_image_sizes() {
    $sizes = Assets\get_image_sizes();

    if ( empty( $sizes ) ) {
        return;
    }

    register_image_sizes( $sizes );
}

add_action( 'init', __NAMESPACE__ . '\\init_image_sizes' );

/**
 * Filter image sizes to include the new image sizes
 *
 * @param $sizes
 *
 * @return mixed
 * @filter image_size_names_choose
 */
function filter_image_sizes( $sizes ) {
    $new_sizes = Assets\get_image_sizes();

    $new_sizes_merge_array = array();
    foreach ( $new_sizes as $new_size_name => $new_size ) {
        $new_sizes_merge_array[ $new_size_name ] = __( $new_size['name'] );
    }

    return array_merge( $sizes, $new_sizes_merge_array );
}

add_filter( 'image_size_names_choose', __NAMESPACE__ . '\\filter_image_sizes' );

/**
 * Add acf option pages from configuration
 *
 * @action init
 */
function init_acf_option_pages() {
    $options_pages = Assets\get_acf_option_pages();

    if ( ( ! function_exists( 'acf_add_options_page' ) ) || empty( $options_pages ) ) {
        return;
    }

    foreach ( $options_pages as $option_page ) {
        acf_add_options_page( $option_page );
    }
}

add_action( 'init', __NAMESPACE__ . '\\init_acf_option_pages' );


function init_ajaxurl() {
    if ( Assets\ajax_enabled() ) {
        echo '<script type="text/javascript"> var ajaxurl = "' . esc_html( admin_url( 'admin-ajax.php' ) ) . '";</script>';
    }
}

add_action( 'wp_head', __NAMESPACE__ . '\\init_ajaxurl' );

function my_acf_init() {

	acf_update_setting('google_api_key', env('ACF_GOOGLE_MAPS_API'));
}

add_action('acf/init', __NAMESPACE__ . '\\my_acf_init');