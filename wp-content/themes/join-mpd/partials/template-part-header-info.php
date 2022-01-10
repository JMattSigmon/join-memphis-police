<?php

/**
* Header Info Partial
*
* This file controls the Logo and Desktop navigation
* display in the Header Partial
*
* @package  Partials
*
*/

?>

<div id="header-info-contain" class="container-fluid">

    <?php
    
    $logo = get_field('site_logo', 'option');
    $logoR = get_field('site_logo_right', 'option');

    if ($logo) {
        echo '<div id="logo-right" class="d-none d-lg-block">';
        echo '<a href="' .esc_url(home_url('/')). '">';
        mpd_acf_svg_helper($logo);
        echo '</a>';
        echo '</div>';
    }

    get_template_part('partials/template-part', 'desktop-nav'); // Desktop Navigation

    if ($logoR) {
        echo '<div id="logo-right" class="d-none d-lg-block">';
        echo '<a href="' .esc_url(home_url('/')). '">';
        mpd_acf_svg_helper($logoR);
        echo '</a>';
        echo '</div>';
    }
        
    ?>

</div>