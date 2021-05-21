<?php

/**
* Homepage Template
*
* This file controls the display of the
* site's homepage.
*
* @package Templates
*
*/

get_header();
get_template_part('partials/template-part', 'head');

// Basic WordPress Loop.  Nothing to see here.
if (have_posts()) : while (have_posts()) : the_post(); ?>



<main id="homepage">
    <article id="homepage-content-contain">
        <section id="homepage-content">
            <?php the_content(); ?>
        </section>
    </article>
</main>

<p>Hey, What in the world is going on here???</p>

<?php endwhile; endif; get_footer(); ?>