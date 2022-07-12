<?php
  require_once("../../../wp-config.php");

  $now_post_num = $_POST['now_post_num'];
  $get_post_num = $_POST['get_post_num'];
  $loopcounter = 0;
  $html_4 = '';
?>



<ul>
  <?php $paged = get_query_var('paged') ? get_query_var('paged') : 1 ;?>
  <?php
    $args = array(
      'post_type' => 'magazine', // 投稿タイプを指定
      'posts_per_page' => 4, // 表示するページ数
      'paged' => $paged, // 表示するページ数
      'posts_per_page' => $get_post_num,
      'offset' => $now_post_num,
      );
      query_posts( $args );
      if ( have_posts() ) :
      while ( have_posts() ) :
      the_post();
    ?>


          <?php
            $terms = get_the_terms( get_the_ID(), 'm_category' );
            if ( !empty($terms) ) : if ( !is_wp_error($terms) ) :
          ?>

          <?php foreach( $terms as $term ) : ?>

        <li>
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
          </a>
          <div class="blog_text">
            <div class="blog_text_category" style="background-color:<?php echo $back_color; ?>">
              <a class="<?=$term->slug?>" href="<?php echo get_term_link( $term->slug, 'm_category' ); ?>"><?=$term->name?></a>
            </div>
            <div class="blog_text_date"><?php the_time('Y.m.d'); ?></div>
            <div class="blog_text_title"><?php the_title(' '); ?></div>
          </div>

          <?php endforeach; ?>
          <?php endif; endif; ?>
      </li>


  <?php $loopcounter++;?>

  <?php endwhile;?>
<?php endif; wp_reset_postdata();?>
</ul>
<?php // カウンターを用意しておいてボタンを表示させるかを判別
  if($loopcounter == $get_post_num) {
  // 表示させようとした投稿数に実際の投稿が届かない場合はボタンの表示はない
    $html_4 .= '<div id="more_disp_4"<p class="p-post-btn_4">もっと見る</p></div>';
  }
  echo $html_4;