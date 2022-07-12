<?php
  require_once("../../../wp-config.php");

  $now_post_num = $_POST['now_post_num'];
  $get_post_num = $_POST['get_post_num'];
  $loopcounter = 0;
  $html_2 = '';
?>
<ul>
<?php
  $args = array(
  'post_type' => 'magazine',
  'orderby' => 'post_date',
  'order' => 'DESC',
  'posts_per_page' => $get_post_num,
  'offset' => $now_post_num,
  );
  query_posts( $args );
  if ( have_posts() ) :
  while ( have_posts() ) :
  the_post();
?>

<li class="blog_popular_item">
  <a href="<?php the_permalink(); ?>">
  <div class="blog_thumnail">
    <?php
      if(has_post_thumbnail()):
        the_post_thumbnail();
      else:
    ?>
    <img src="<?php echo get_template_directory_uri(); ?>/images/no_image.jpg" alt="" />
    <?php endif; ?>
  </div>

  <?php
    //タームの取得
    $terms = wp_get_object_terms($post->ID, 'm_category');
    //タームを出力
    if(!empty($terms) && !is_wp_error($terms)){
    ?>
      <?php foreach($terms as $term){ ?>
      <?php } ?>
  <?php } ?>
  </a>
  <a class="<?=$term->slug?>" href="<?php echo get_term_link( $term->slug, 'm_category' ); ?>"><div class="blog_cate"><?=$term->name?></div></a>
  <a href="<?php the_permalink(); ?>">
  <div class="blog_text">
    <div class="blog_date"><?php the_time('Y.m.d'); ?></div>
    <p class="blog_title"><?php the_title(' '); ?></p>
    <div class="blog_modi_date"><?php the_modified_date('Y.m.d'); ?></div>
  </div>
  </a>
</li>


  <?php $loopcounter++;?>

  <?php endwhile;?>
<?php endif; wp_reset_postdata();?>
</ul>
<?php // カウンターを用意しておいてボタンを表示させるかを判別
  if($loopcounter == $get_post_num) {
  // 表示させようとした投稿数に実際の投稿が届かない場合はボタンの表示はない
    $html_2 .= '<div id="more_disp_2"><p class="p-post-btn_2">もっと見る</p></div>';
  }
  echo $html_2;
