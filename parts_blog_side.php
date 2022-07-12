  <!--parts_blog_side.php-->


  <div class="side_menu">
    <div class="side_menu_bnr">
      <a href="https://camp.trainocate.co.jp/course/detail/8/" style="pointer:default;">
        <img src="<?php echo get_template_directory_uri(); ?>/images/blog/side_bnr.jpg" alt="">
      </a>
    </div>
    <div class="side_menu_cate">
      <div class="side_menu_cate_tit">カテゴリ</div>
      <div class="side_menu_cate_list">



      <?php
        $args = array(
          'taxonomy' => 'm_category',
          'orderby' => 'id',
          'hide_empty' => false,
          'exclude' => 5
        );
        $list_src = "";
        $the_query = new WP_Term_Query($args);

        foreach($the_query->get_terms() as $term):
          //$cat_name = $cat->name;
          $cat_id = $term->term_id;
          $cat_color = 'category_'.$cat_id;
          $blog_thum = get_field('blog_thum',$cat_color);
          $list_src .= '<li>'.'<a href="'.get_term_link($term).'"><img src="'.$blog_thum.'">'.$term->name.' ('.$term->count.')</a></li>';

        endforeach;
        echo '<ul>'.$list_src.'</ul>';
      ?>




      </div>
    </div>







    <div id="aside_sticky">
	    <div class="side_menu_bnr2">
	      <a href="https://camp.trainocate.co.jp/course/detail/33/">
	        <img src="<?php echo get_template_directory_uri(); ?>/images/blog/banner_premium_pack.png" alt="">
	      </a>
	    </div>

			<div class="side_menu_bnr2">
	      <a href="https://camp.trainocate.co.jp/course/detail/8/">
	        <img src="<?php echo get_template_directory_uri(); ?>/images/blog/banner_data_pack.png" alt="">
	      </a>
	    </div>

	    <div class="side_menu_bnr2">
	      <a href="https://camp.trainocate.co.jp/course/detail/5/">
	        <img src="<?php echo get_template_directory_uri(); ?>/images/blog/banner_spring_pack.png" alt="">
	      </a>
	    </div>
	    <div class="side_menu_bnr2">
	      <a href="https://camp.trainocate.co.jp/course/detail/27/">
	        <img src="<?php echo get_template_directory_uri(); ?>/images/blog/banner_java_pack.png" alt="">
	      </a>
	    </div>
	  </div>
  </div>

  <!--parts_blog_side.php-->
