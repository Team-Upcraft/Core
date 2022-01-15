<?php /* Template Name: Verlage_Anzeigen_Template */ 
//@mattia mueggler (head dev) insert logic here

get_header(); ?>
    <div id="primary" class="content-area">
		    <main id="main" class="site-main" role="main">

                <div id="control-elements"></div>
                <?php loadPosts();?>
            </main><!-- .site-main -->
    </div><!-- .content-area -->
<?php
/*wp standard functions */
get_sidebar();
get_footer(); 

function loadCategories(){

}

function loadPosts(){
    $projects = new WP_Query([
      'post_type' => 'verlage',
      'posts_per_page' => -1,
      'order_by' => 'date',
      'order' => 'desc',
      'meta_query' => array(
	  'relation' => 'AND',
        array(
            'key'     => 'publiziert_in_sprache',
            'value'   => 'Deutsch',
            'compare' => '=',
        ),
        array(
                'key' => 'Land',
                'value' => 'Schweiz',
                'compare' => '=',
        ),
      ),
    ]);
   if($projects->have_posts()): ?>
   <div id="verlage">
      <?php
        while($projects->have_posts()) : $projects->the_post();
          include('Components/verlag-item.php');
        endwhile;
      ?>
    <?php wp_reset_postdata(); ?>
    </div>
  <?php endif;
}



?>