<?php

//==================
// Theme Widgets
//==================

function mpd_theme_widgets_init()
{
    register_sidebar(
      array(
      'name' => 'Footer Widget One',
      'id' => 'footer-widget-one',
      'before_widget' => '<aside id="%1$s" class="widget %2$s">',
      'after_widget' => '</aside>',
      'before_title' => '<h3>',
      'after_title' => '</h3>'
    )
  );

    register_sidebar(
      array(
      'name' => 'Footer Widget Two',
      'id' => 'footer-widget-two',
      'before_widget' => '<aside id="%1$s" class="widget %2$s">',
      'after_widget' => '</aside>',
      'before_title' => '<h3>',
      'after_title' => '</h3>',
    )
  );
  
    register_sidebar(
      array(
      'name' => 'Footer Widget Three',
      'id' => 'footer-widget-three',
      'before_widget' => '<aside id="%1$s" class="widget %2$s">',
      'after_widget' => '</aside>',
      'before_title' => '<h3>',
      'after_title' => '</h3>',
    )
  );
}
add_action('widgets_init', 'mpd_theme_widgets_init');