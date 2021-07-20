<?php

/**
* Events Header Partial
*
* This file controls the Main Header display
*
* @package  Partials
*
*/
// Include Popup
get_template_part('partials/template-part', 'popup');

// Include Mobile Navigation Partial
get_template_part('partials/template-part', 'mobilenav-mmenu');

echo '<header id="header-container" role="banner">';


get_template_part('partials/template-part', 'header-info'); // Header info

echo '<section class="page-hero">';
echo '<header class="container">';
echo '<h1 class="slide-down">';
echo 'Events';
echo '</h1>';
echo '</header>';
echo '</section>';
echo '</header>';