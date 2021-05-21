<?php

get_header();
get_template_part('partials/template-part', 'head');

if (have_posts()) : while (have_posts()) : the_post();

$hero = get_field('hero_type');


echo '<main id="inner-page"';
if ($hero === 'video') {
    echo ' class="video-inner"';
}
echo '>';
echo '<article>';
echo '<section>';
the_content();
echo '</section>';
echo '</article>';
echo '</main>';

endwhile; else:

    get_404_template();

endif;

get_footer();