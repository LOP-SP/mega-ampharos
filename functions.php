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

  # Add a link to our writer's recruiting form.
  function add_post_content($content) {
    if (!is_feed() && !is_home()) {
      $content .= '<p class="recruitment-form">Gostaria de se tornar um redator da LOP-SP e escrever sobre Pokémon? Cadastre-se <a href="http://goo.gl/forms/ya9xe5thfh" target="_blank">neste formulário</a>!</p>';
    }
    return $content;
  }
  add_filter('the_content', 'add_post_content');
?>
