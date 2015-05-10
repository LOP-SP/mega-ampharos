<?php
  // Setup stylesheets for child & parent theme with correct loading order.
  function theme_enqueue_styles() {
      // Parent stylesheet first.
      wp_enqueue_style('parent-style', get_template_directory_uri() . '/style.css' );

      // Then the child theme's.
      wp_enqueue_style('child-style',
                       get_stylesheet_directory_uri() . '/style.css',
                       array('parent-style'));
  }
  add_action( 'wp_enqueue_scripts', 'theme_enqueue_styles' );
?>
