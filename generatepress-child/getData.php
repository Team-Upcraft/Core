<?php
function filter_verlage() {
    $catSlug = $_POST['category'];
  
    $ajaxposts = new WP_Query([
      'post_type' => 'verlage',
      'posts_per_page' => -1,
      'category_name' => $catSlug,
      'orderby' => 'menu_order', 
      'order' => 'desc'
    ]);
    $response = '';
  
    if($ajaxposts->have_posts()) {
      while($ajaxposts->have_posts()) : $ajaxposts->the_post();
        $response .= include('Templates/Components/verlag-item.php');
      endwhile;
    } else {
      $response = '<h2>dazu konnte leider kein verlag gefunden werden</h2>';
    }
  
    echo $response;
    exit;
}

function getCategories() {
  $categories = get_categories( array(
    'orderby' => 'name',
    'parent'  => 0
  ) );

  foreach ( $categories as $category ) {
    printf( '<option val=%2$s">%2$s</option>',
        esc_url( get_category_link( $category->term_id ) ),
        esc_html( $category->name )
    );
  }
}

  add_action('wp_ajax_filter_verlage', 'filter_verlage');
  add_action('wp_ajax_nopriv_filter_verlage', 'filter_verlage');

  add_action('wp_ajax_filter_getCategories', 'getCategories');
  add_action('wp_ajax_nopriv_getCategories', 'getCategories');
?>