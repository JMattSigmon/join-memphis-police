<footer>

    <div id="footer-info" class="container">
        <div class="row">

            <?php
            
            if (is_active_sidebar('footer-widget-one')) {
                echo '<div id="footer-widget-one" class="footer-widget widget-area col-md" role="complementary">';
                dynamic_sidebar('footer-widget-one');
                echo '</div>';
            }
            
            if (is_active_sidebar('footer-widget-two')) {
                echo '<div id="footer-widget-two" class="footer-widget widget-area col-md" role="complementary">';
                dynamic_sidebar('footer-widget-two');
                echo '</div>';
            }

            echo '<div id="footer-widget-three" class="footer-widget widget-area col-md" role="complementary">';
                
            $fb = get_field('facebook', 'options');
            $tw = get_field('twitter', 'options');
            $yt = get_field('youtube', 'options');
            $in = get_field('instagram', 'options');

            echo '<h3>Connect with Us!</h3>';
            echo '<ul id="footer-social">';
            echo '<li><a href="'.$fb.'" target="_blank"><i class="fab fa-facebook"></i></a></li>';
            echo '<li><a href="'.$tw.'" target="_blank"><i class="fab fa-twitter"></i></a></li>';
            echo '<li><a href="'.$yt.'" target="_blank"><i class="fab fa-youtube"></i></a></li>';
            echo '<li><a href="'.$in.'" target="_blank"><i class="fab fa-instagram"></i></a></li>';
            echo '</ul>';

            if (is_active_sidebar('footer-widget-three')) {
                dynamic_sidebar('footer-widget-three');
            }

            echo '</div>'; // #footer-widget-three
            
            ?>

        </div>
    </div>



</footer>
<div id="copyright">
    <div class="container">
        <p>&copy; <?php echo date('Y'); ?> The Memphis Police Department. All Rights Reserved. <a
                href="<?php echo esc_url(home_url('/')); ?>privacy-policy/">Privacy Policy</a></p>
    </div>
</div>
</div><!-- #body-contain -->
</body>
<?php wp_footer(); ?>

</html>