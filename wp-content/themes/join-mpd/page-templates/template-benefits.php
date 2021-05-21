<?php

/**
 * Template Name: Benefits & Salary Page
 *
 * This file controls the display of the
 * Benefits & Salary page.
 *
 * @package Templates
 *
 */

get_header();
get_template_part('partials/template-part', 'head');

if (have_posts()) : while (have_posts()) : the_post();

?>

<main id="benefits-page">
    <article>

        <?php
    
        // Vars
        $header = get_field('page_header');
        $benefits = get_field('benefits_list');
        $chars = [' ', '/', '&', ',', '#038;', 'amp;']; // Characters to swap
    
        if ($benefits) {
            echo '<section class="benefits-contain">';
        
            if ($header) {
                echo '<header id="benefits-page-header">';
                echo '<div class="container">';
                echo wp_kses_post($header);
                echo '</div>';
                echo '</header>';
            }

            echo '<section id="benefis-tabs" class="container">';
            echo '<ul id="benefit-buttons" class="nav nav-tabs" role="tablist">';
            
            foreach ($benefits as $post) {
                setup_postdata($post);
                
                $icon = get_field('benefit_icon'); // Icon
                $desc = get_field('benefit_description'); // Description

                /* Store Benefit title to use as id for container */
                $title = get_the_title();  // Retrieve Benefit title
                $low = strtolower($title);
                $id = str_replace($chars, '-', $low); // Strip & lowercase to use as id
                
                /* Create Tabbed Navigation */
                echo '<li class="nav-item">';
                echo '<a class="nav-link" id="'. $id. '-tab" data-toggle="tab" href="#' .$id. '" role="tab" aria-controls="' .$id. '" aria-selected="false"><i class="fas fa-check"></i> ' .$title. '</a>';
                echo '</li>';
                
                wp_reset_postdata();
            }

            echo '</ul>';
            echo '</section>';

            echo '<section class="tab-content">';
            

            foreach ($benefits as $post) {
                setup_postdata($post);
                
                $icon = get_field('benefit_icon'); // Icon
                $desc = get_field('benefit_description'); // Description

                /* Store Benefit title to use as id for container */
                $title = get_the_title();  // Retrieve Benefit title
                $low = strtolower($title);
                $id = str_replace($chars, '-', $low); // Strip & lowercase to use as id



                echo '<section class="benefits-page-content tab-pane fade" id="' .$id. '">';
                the_content();
                echo '</section>';




                wp_reset_postdata();

            } // End foreach loop

            //echo '</div>'; // .tab-content
            echo '</section>';

        } // End if($benefits)
    
        ?>

    </article>
</main>


<?php endwhile; else:

    get_404_template();

endif;

get_footer();