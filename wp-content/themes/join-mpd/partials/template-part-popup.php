<?php

/**
 * Popup Modal
 *
 * This file controls the Popup display
 *
 * @package  Partials
 *
 */

$default = <<<EOT
<p>Text JOINMPD to <a href="tel:19014992336">901-499-2336</a></p>
EOT;

 $h3 = get_field('popup_header', 'option') ?: 'Want to pre-qualify or speak to a recruiter?'; // Popup Header
 $stuff = get_field('popup_content', 'option') ?: $default; 

?>

<section id="memphis-popup" class="modal fade memphis-modal" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div id="popup-info" class="modal-content box-shadow">

        <i class="fas fa-times"></i>

            <div class="modal-header">
                <h3 class="modal-title"><?php esc_html_e($h3); ?></h3>
                
            </div><!-- .modal-header -->

            <div class="modal-body">
                <?php echo wp_kses_post($stuff); ?>
            </div><!-- .modal-body -->

            <div class="modal-footer">

            </div><!-- .modal-footer -->

        </div>
    </div>
</section>