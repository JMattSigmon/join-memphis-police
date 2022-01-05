<?php

//===============================================
// MAIN THEME FUNCTION FILE
//===============================================


//---------------------------------
// Include Custom Files
//---------------------------------

include 'lib/theme-widgets.php';
include 'lib/acf-options.php';
include 'lib/recruiter-post-type.php'; // Recruiter post Type
include 'lib/benefit-post-type.php'; // Benefit Post type


add_action('acf/init', 'mpd_acf_init_block_types');
function mpd_acf_init_block_types()
{

    // Check function exists.
    if (function_exists('acf_register_block_type')) {
        acf_register_block_type(array(
            'name'              => 'hiring-process',
            'title'             => __('Hiring Process'),
            'description'       => __('the Join MPD Hiring Process'),
            'render_template'   => 'blocks/hiring-process.php',
            'category'          => 'formatting',
            'icon'              => 'admin-comments',
            'keywords'          => array( 'testimonial', 'quote' ),
        ));
    }
}



//---------------------------------
// Enqueue Styles & Scripts
//---------------------------------


function mpd_theme_scripts()
{
    /* Theme Styles */

    // Use filetime to force browser cache refresh
    wp_register_style('custom.min.css', get_template_directory_uri() . '/assets/css/custom.min.css', array(), filemtime(get_template_directory() . '/assets/css/custom.min.css'), false, 99);
    wp_enqueue_style('custom.min.css');

    // Compiled Theme JS
    wp_register_script('theme', get_template_directory_uri() . '/assets/js/dist/scripts.min.js', array('jquery'), false, true);
    wp_enqueue_script('theme');
}
add_action('wp_enqueue_scripts', 'mpd_theme_scripts');



//--------------------------------------
// Add Title Parameter
//--------------------------------------

if (!function_exists('mpd_theme_title')) {
    function mpd_theme_title($title, $sep)
    {
        global $paged, $page;

        if (is_feed()) {
            return $title;
        }

        // Add the site name.
        $title .= get_bloginfo('name');

        // Add the site description for the home/front page.
        $site_description = get_bloginfo('description', 'display');
        if ($site_description && (is_home() || is_front_page())) {
            $title = "$title $sep $site_description";
        }

        // Add a page number if necessary.
        if ($paged >= 2 || $page >= 2) {
            $title = "$title $sep " . sprintf(__('Page %s', $domain), max($paged, $page));
        }

        return $title;
    }
    add_filter('wp_title', 'mpd_theme_title', 10, 2);
}

//--------------------------------------
// Register Bootstrap 4 Desktop Navigation
//--------------------------------------

require_once('lib/bs4Navwalker.php');

//--------------------------------------
// Register Menus
//--------------------------------------

register_nav_menus(
    array(
    'mobile_menu' => 'Mobile Menu',
    'top_menu' => 'Top Menu',
    'desktop_menu' => 'Desktop Menu'
  )
);

//--------------------------------------
// Add Support for Featured Image
//--------------------------------------

add_theme_support('post-thumbnails');
set_post_thumbnail_size(150, 150, true);

/* Add Cutom Image Sizes */
add_image_size('video-logo', 250, 100, false);
add_image_size('big-thumbnail', 300, 300, false);
add_image_size('full-width', 1920, 1080, false);


//--------------------------------------
// Add Favicon Here
//--------------------------------------

function mpd_add_theme_favicon()
{
    echo '<link rel="shortcut icon" href="' . get_template_directory_uri() . '/assets/images/favicon.png" >';
}
add_action('wp_head', 'mpd_add_theme_favicon');//Custom Favicon

//--------------------------------------
// Change Default Image Attachment to None
//--------------------------------------

add_action('after_setup_theme', 'default_attachment_display_settings');
function default_attachment_display_settings()
{
    update_option('image_default_link_type', 'none');
}

//--------------------------------------
// Edit Admin Footer Text
//--------------------------------------

function mpd_edit_footer()
{
    add_filter('admin_footer_text', 'mpd_edit_text', 10);
}

function mpd_edit_text($content)
{
    return 'Website developed by <strong><em>City of Memphis</em></strong>';
}
add_action('admin_init', 'mpd_edit_text');


//--------------------------------------
// Return Slug as Parameter for Shortcodes
//--------------------------------------

if (!function_exists('mpd_the_slug')) {
    function mpd_the_slug()
    {
        $post_data = get_post($post->ID, ARRAY_A);
        $slug = $post_data['post_name'];
        return $slug;
    }
}

//--------------------------------------
// Gutenberg Full Width
//--------------------------------------

add_theme_support('align-wide');

//--------------------------------------
// Block Editor Stylesheet
//--------------------------------------

function mpd_add_editor_styles()
{
    add_theme_support('editor-styles');

    add_editor_style([
        'assets/css/custom.min.css',
        'assets/css/editor.min.css'
    ]);
}
add_action('after_setup_theme', 'mpd_add_editor_styles');


function mpd_add_editor_script()
{
    echo '<script src ="' .get_template_directory_uri() . '/assets/js/dist/scripts.min.js"></script>';
}
add_action('admin_head', 'mpd_add_editor_script');


//--------------------------------------
// Load Font Libraries
//--------------------------------------

/*
 *
 * This script will load fonts from different libraries
 * More info found here: https://github.com/typekit/webfontloader
 *
 */

function mpd_load_theme_fonts()
{
    echo '<script src="https://ajax.googleapis.com/ajax/libs/webfont/1.5.18/webfont.js"></script>';
    echo "<script>WebFont.load({ google: { families: ['Exo+2:600,800','Open+Sans:400,400i,600,700' ]}});";
    echo '</script>';
}
add_action('wp_head', 'mpd_load_theme_fonts');
add_action('admin_head', 'mpd_load_theme_fonts');



//--------------------------------------
// Add Custom Login Styles
//--------------------------------------/

function theme_custom_login()
{
    echo '<link rel="stylesheet" type="text/css" href="' . get_template_directory_uri() . '/assets/css/custom.min.css" />';
}
add_action('login_head', 'theme_custom_login');

//--------------------------------------
// Add Title & Tag Support
//--------------------------------------

add_theme_support('title-tag');
get_the_tag_list();
wp_link_pages();

//------------------------------------------------------------
// Reduce Number of Unnecessary Calls to change_link Function
//------------------------------------------------------------

remove_action('wp_head', 'adjacent_posts_rel_link_wp_head');
remove_action('wp_head', 'rsd_link');
remove_action('wp_head', 'wlwmanifest_link');
remove_action('wp_head', 'wp_shortlink_wp_head');
remove_action('wp_head', 'wp_generator');
remove_action('wp_head', 'rest_output_link_wp_head');
remove_action('wp_head', 'wp_oembed_add_discovery_links');

//-----------------------------------
// Add SVG Upload Ability
//-----------------------------------

function mpd_custom_mtypes($m)
{
    $m['svg'] = 'image/svg+xml';
    $m['svgz'] = 'image/svg+xml';
    return $m;
}
add_filter('upload_mimes', 'mpd_custom_mtypes');

/**
 *
 *---------------------------------------------
 * ACF SVG & Image Fallback
 *---------------------------------------------
 *
 * Thi little function will allow ACF image
 * fields to display inline SVGs and fallback
 * to traditional image formats if necessary
 *
 */


function mpd_acf_svg_helper($field)
{

    // Store file's Path info for conditional checks
    $file_parts = pathinfo($field);


    if ($field) {

        // Is the uploaded file an SVG? Do this.
        if ($file_parts['extension'] == 'svg') {
            echo file_get_contents($field);
        } else { ?>

<!-- Fallback Old School Images -->
<img src="<?php esc_attr_e($field); ?>" />

<?php

            }
    }
}

//------------------------------
// Add Read More Tag to Excerpt
//------------------------------


function mpd_excerpt($num)
{
    global $post;
    $limit = $num+1;
    $excerpt = explode(' ', get_the_excerpt(), $limit);
    array_pop($excerpt);
    $excerpt = implode(" ", $excerpt).'...<a class="moretag" href="' .get_permalink($post->ID) . ' ">Read More <i class="fas fa-chevron-right"></i></a>';
    echo '<p>';
    echo $excerpt;
    echo '</p>';
}

//-----------------
// Add Pagination
//-----------------


function mpd_theme_pagination()
{
    global $postslist;
    $big = 999999999;
    echo '<div class="page-nav py-5">';
    echo paginate_links(
        array(
            'base' => str_replace($big, '%#%', get_pagenum_link($big)),
            'format' => '%#%',
            'current' => max(1, get_query_var('paged'))
        )
    );
    echo '</div>';
}

//--------------------------
// Target all blog pages
//--------------------------

function is_blog()
{
    return (is_archive() || is_author() || is_category() || is_home() || is_single() || is_tag()) && 'post' == get_post_type();
}