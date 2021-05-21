<?php

/**
* Mobile Navigation Partial
*
* This file controls the Mobile Navigation
*
* @package  Partials
*
*/

if (has_nav_menu('mobile_menu')) : ?>

<section id="mobile-navigation" class="d-md-none">

    <!-- Mobile Navbar -->
    <div id="mobile-navbar" class="d-flex justify-content-between">

        <!-- Mobile Logo -->

        <div id="mobile-logo">
            <a href="<?php echo esc_url(home_url('/')); ?>">
                <?php

          //--------------------------
          // Site Logo
          //--------------------------

          $logo = get_field('site_logo', 'option');
          $logoR = get_field('site_logo_right', 'option');

          // Helper function to process SVGs
          mpd_acf_svg_helper($logo);
          mpd_acf_svg_helper($logoR);

        ?>
            </a>
        </div>
        <!-- End Mobile Logo -->

        <!-- Hamburger Button -->
        <button class="my-icon hamburger hamburger--collapse" type="button" role="button" aria-controls="navigation">
            <span class="hamburger-box">
                <span class="hamburger-inner"></span>
            </span>
        </button>
        <!-- End Hamburger Button -->

    </div><!-- #mobile-navbar -->

    <nav id="mobile-menu">

        <?php

      //--------------------------
      // Mobile Navigation
      //--------------------------

      wp_nav_menu(
          array(
        'theme_location'    => 'mobile_menu',
        'depth'             => 3,
        'menu_class'        => 'mmenu mmenu-horizontal'
        //'walker'          => new Walker_Nav_Menu())
        )
      );

  ?>

    </nav>
</section><!-- #mobile-navigation -->
<?php endif; ?>