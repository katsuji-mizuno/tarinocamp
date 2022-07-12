<?php
  //////　ポップアップバナー　/////////////////////////
  $args = array(
    'post_type' => 'custom_options',
    's' => 'ポップアップバナー',
    'posts_per_page' => 1,
  );
  //query_posts( $args );
  $the_query = new WP_Query( $args );

  if ( $the_query->have_posts()) :
  while ( $the_query->have_posts() ) :
    $the_query->the_post();
    
    if (get_field('popup_enabled') == 'true') :
?>
  <div id="blog_popup_banner">
    <div class="popup_overlay"></div>
    <div class="popup_wrapper">
      <div class="popup_contents">
        <a href="<?php the_field('popup_url');?>" class="popup_banner"><img src="<?php the_field('popup_img');?>" alt=""></a>
        <a href="javascript:void(0)" class="popup_close"><img src="<?php echo get_template_directory_uri(); ?>/images/blog/popup_close.svg" alt="×"></a>
      </div>
    </div>
  </div><!-- blog_popup_banner -->
<?php
    endif;
  endwhile;
  endif;
  wp_reset_postdata();
?>
