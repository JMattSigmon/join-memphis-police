<?php

  if (function_exists('acf_add_options_page')) {
      acf_add_options_page(array(
        'page_title' 	=> 'Theme General Settings',
        'menu_title'	=> 'Theme Settings',
        'menu_slug' 	=> 'theme-general-settings',
        'capability'	=> 'edit_posts',
        'redirect'		=> false
    ));

      acf_add_options_sub_page(array(
        'page_title' 	=> 'Logo',
        'menu_title'	=> 'Logo',
        'parent_slug'	=> 'theme-general-settings',
    ));

      acf_add_options_sub_page(array(
        'page_title' 	=> 'Social Media Links',
        'menu_title'	=> 'Social Media Links',
        'parent_slug'	=> 'theme-general-settings',
    ));

      acf_add_options_sub_page(array(
        'page_title' 	=> 'Theme Footer Settings',
        'menu_title'	=> 'Footer',
        'parent_slug'	=> 'theme-general-settings',
    ));

    acf_add_options_sub_page(array(
        'page_title' 	=> '404 Page',
        'menu_title'	=> '404 Page',
        'parent_slug'	=> 'theme-general-settings',
    ));

    acf_add_options_sub_page(array(
        'page_title' 	=> 'Popup',
        'menu_title'	=> 'Popup',
        'parent_slug'	=> 'theme-general-settings',
    ));
  }