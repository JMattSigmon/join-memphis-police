<?php

/**
* Header Partial
*
* This file controls the Main Header display
*
* @package  Partials
*
*/


// Include Mobile Navigation Partial
get_template_part('partials/template-part', 'mobilenav-mmenu');

// Make sure this isn't the 404 page
if (!is_404()):

$hero = get_field('hero_type', $post->ID);

echo '<header id="header-container" role="banner"';

if (has_post_thumbnail()) {
    $bg = get_the_post_thumbnail_url($post->ID, 'full');
    echo ' style="background: url('.$bg.') transparent no-repeat 50% 50% / cover"';
}
if ($hero === 'tall') {
    echo ' class="tall-hero"';
}
if ($hero === 'short') {
    echo ' class="short-hero"';
}

echo '>'; // <-- header-container closing >

// Video header
if ($hero === 'video') {
    if (have_rows('video_hero')) :
        while (have_rows('video_hero')) : the_row();
        
    $mp4 = get_sub_field('mp4_video');
    $webm = get_sub_field('webm_video');
    $poster = get_sub_field('poster_image');
                
    echo '<video autoplay muted loop id="inner-video-hero"';
                
    if ($poster) {
        echo 'poster="'.$poster.'"';
    }
    echo '>';

    if ($mp4) {
        echo '<source src="'.$mp4.'">';
    }

    if ($webm) {
        echo '<source src="'.$webm.'">';
    }
                
    echo '</video>'; // #video-banner
                
    endwhile;
    endif;
}

get_template_part('partials/template-part', 'header-info'); // Header info

// Make sure it's not the front page
if (!is_front_page()) {
    echo '<section class="page-hero';
    
    if ($hero == 'video') {
        echo ' video-header';
    }
        
    echo '">';
    echo '<header class="container">';
    echo '<h1>';

    // If the is blogroll
    if (is_home()) {
        single_post_title();
    }
    // If Category
    if (is_category()) {
        single_cat_title();
    }
    // If Single Post
    if (is_single()) {
        echo get_the_title();
    }
    
    // If it's not any page related to the blog show this...
    if (!(is_blog())) {
        echo get_the_title();
    }

    echo '</h1>';
    echo '</header>'; // .container
    echo '</section>'; // .page-hero
}


echo '</header>'; // #header-container

else:
    
    //-----------------
    // 404 Page Header
    //-----------------

    $bg404 = get_field('header_background_404', 'option');
    $head404 = get_field('page_heading_404', 'option') ?: 'Page Not Found';

    echo '<header id="header-container" class="error-page" role="banner"';

    if ($bg404) {
        echo ' style="background: url('.$bg404.') transparent no-repeat 50% 50% / cover"';
    }

    echo '>';

    get_template_part('partials/template-part', 'header-info'); // Header info

    echo '<section class="page-hero">';
    echo '<header class="container">';
    echo '<h1>';
    esc_html_e($head404);
    echo '</h1>';
    echo '</header>';
    echo '</section>'; // .page-hero

    echo '</header>';
    
endif;