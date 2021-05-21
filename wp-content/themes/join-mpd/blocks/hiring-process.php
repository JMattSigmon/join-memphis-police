<?php

/**
 * Hiring Process Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'hiring-process-' . $block['id'];
if( !empty($block['anchor']) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'hiring-process';
if( !empty($block['className']) ) {
    $className .= ' ' . $block['className'];
}
if( !empty($block['align']) ) {
    $className .= ' align' . $block['align'];
}

// Load values and assign defaults.
$title = get_field('title') ?: 'The Hiring Process';

?>
<div id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?>">
    <?php

    echo '<section id="hiring-process-contain">';

    if( have_rows('steps') ): $count = 0; // Start count at zero

        echo '<ul id="hiring-process-tabs" class="nav nav-tabs" role="tablist">';
        
        while ( have_rows('steps') ) : the_row();
        
        $count++; // Start counting

        echo '<li class="nav-item">';
        echo '<a class="nav-link" id="'. $count. '-tab" data-toggle="tab" href="#hiring-' .$count. '" role="tab" aria-controls="hiring-' .$count. '" aria-selected="false">' .$count. '</a>';
        echo '</li>';

    endwhile;

    echo '</ul>';

endif;

    wp_reset_postdata();

    if( have_rows('steps') ): $count = 0;

    echo '<section id="hiring-steps" class="tab-content">';

        // loop through the rows of data
        while ( have_rows('steps') ) : the_row();

        $count++;

        $step = get_sub_field('step');
        echo '<section class="hiring-process-content tab-pane fade" id="hiring-' .$count. '">';
        echo $step;
        echo '</section>';

    endwhile;

    echo '</section>'; // .tab-content
    endif;

    echo '</section>'; // #hiring-process-contain

    ?>
</div>