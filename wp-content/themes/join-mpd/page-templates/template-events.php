<?php

/**
 * Template Name: Join MPD Events Page
 *
 * This file controls the display of the
 * Events page.
 *
 * @package Templates
 *
 */


get_header();
get_template_part('partials/template-part', 'head-events');

if (have_posts()) : while (have_posts()) : the_post();



echo '<main id="inner-page"';
echo '>';
echo '<article>';
echo '<section class="container">';
the_content();
echo '</section>';
echo '</article>';
echo '</main>';

endwhile; else:

    get_404_template();

endif;

get_footer();