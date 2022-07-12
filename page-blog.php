<?php get_header(); ?>

<!-- モーダル -->
<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/css/magnific-popup.css">
<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/magnific-popup.js"></script>
<!-- slider -->
<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/slick/slick.css" media="all" />
<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/slick/slick-theme.css" media="all" />
<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/slick/slick.min.js"></script>
<!-- ページ固有 -->
<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/home.js"></script>
<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/css/blog.css">

</head>

<body id="pageBlog">

  <?php get_template_part('parts_site_header'); ?>
  <?php get_template_part('parts_blog_popup'); ?>

  <main class="contents">

    <!-- パンくず -->
    <div id="breadcrumb">
      <div class="inner">
        <ul class="breadlist hiragino">
          <li><a href="<?php echo home_url(); ?>">ホーム</a></li>
          <li><span>トレノキャンプブログ</span></li>
        </ul>
      </div>
    </div>


    <div class="blog_main_wrap">

      <!-- MVのslider -->
      <div class="blog_mv_wrap">
        <ul class="slider">
          <li>
            <div class="blog_mv_01"></div>
          </li>
          <li>
            <div class="blog_mv_02"></div>
          </li>
        </ul>
      </div>

      <div class="blog_main">


        <div class="blog_wrap">

          <div class="blog_popular">
            <div class="blog_popular_inner">

              <div class="blog_popular_tit">人気記事</div>
              <section id="content">
                <?php $posts = new WP_Query($args);?>
                  <ul>

                    <?php $paged = get_query_var('paged') ? get_query_var('paged') : 1 ;?>
                    <?php
                      $args = array(
                      'post_type' => 'magazine',
                      'posts_per_page' => 3,
                      'paged' => $paged,
                      'orderby' => 'post_date',
                      'order' => 'DESC',
                      'meta_key' => 'show_index', //カスタムフィールドのキー
                      'meta_value' => 'show', //カスタムフィールドの値
                      'meta_compare' => 'LIKE', //'meta_value'のテスト演算子
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
                          </a>
                          <?php
                            //タームの取得
                            $terms = wp_get_object_terms($post->ID, 'm_category');
                            //タームを出力
                            if(!empty($terms) && !is_wp_error($terms)){
                            ?>
                              <?php foreach($terms as $term){ ?>
                              <?php } ?>
                          <?php } ?>


                          <?php
                            $cats = get_the_terms($post->ID,'m_category');
                            foreach ( $cats as $cat ){
                              $cat_link = get_category_link($cat->term_id); //注意：cat_idじゃない
                              $cat_name = $cat->name;
                              $cat_id = $cat->term_id;
                              $cat_color = 'category_'.$cat_id;
                              $back_color = get_field('blog_color',$cat_color);
                              $blog_lead = get_field('blog_lead',$cat_color);
                          ?>
                          <a href="<?php echo get_term_link( $term->slug, 'm_category' ); ?>"><div class="blog_cate" style="background-color:<?php echo $back_color;?>"><?=$term->name?></div></a>
                          <a href="<?php the_permalink(); ?>">
                          <div class="blog_text">
                            <div class="blog_date"><?php the_time('Y.m.d'); ?></div>
                            <p class="blog_title"><?php the_title(' '); ?></p>
                            <div class="blog_modi_date"><?php the_modified_date('Y.m.d'); ?></div>
                          </div>
                          </a>
                          <?php } ?>


                        </li>
                        <?php endwhile; else: ?>
                      <?php endif; ?>
                  </ul>

                  <script>

                    /*--------------------
                    「もっと見る」ボタンの制御
                    ---------------------*/

                    var now_post_num = 3; // 現在表示されている数
                    var get_post_num = 3; // 一度に取得する数
                    $(function() {
                      $(document).on('click', '.p-post-btn', function() {

                        var ajax_url = '<?php echo bloginfo("template_url");?>/page-readmore.php';

                        $.ajax({
                          type: 'post',
                          url: ajax_url,
                          data: {
                              'now_post_num': now_post_num,
                              'get_post_num': get_post_num,
                          },
                          dataType: 'html',
                        })
                        .done(function(data){
                          now_post_num = now_post_num + get_post_num;
                          $("#more_disp").remove();
                          $("#content").append(data);
                        })
                        .fail(function(){ // ajax通信成失敗の処理
                          alert('エラーが発生しました');
                        })
                        return false;
                      });
                    });
                  </script>

                  <div id="more_disp">
                    <p class="p-post-btn">もっと見る</p>
                  </div>

              </section>

            </div>
          </div>

          <!-- 新着記事 -->
          <div class="blog_new">
            <div class="blog_new_inner">

              <div class="blog_new_tit">新着記事</div>

              <section id="content_2">


                <?php $posts = new WP_Query($args);?>
                  <ul>

                    <?php $paged = get_query_var('paged') ? get_query_var('paged') : 1 ;?>
                    <?php
                      $args = array(
                      'post_type' => 'magazine',
                      'posts_per_page' => 3,
                      'paged' => $paged,
                      'orderby' => 'post_date',
                      'order' => 'DESC',
                      );
                      query_posts( $args );
                      if ( have_posts() ) :
                      while ( have_posts() ) :
                      the_post();

                    ?>


                        <li class="blog_new_item">
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
                          <?php
                            //タームの取得
                            $terms = wp_get_object_terms($post->ID, 'm_category');
                            //タームを出力
                            if(!empty($terms) && !is_wp_error($terms)){
                            ?>
                              <?php foreach($terms as $term){ ?>
                              <?php } ?>
                          <?php } ?>


                          <?php
                            $cats = get_the_terms($post->ID,'m_category');
                            foreach ( $cats as $cat ){
                              $cat_link = get_category_link($cat->term_id); //注意：cat_idじゃない
                              $cat_name = $cat->name;
                              $cat_id = $cat->term_id;
                              $cat_color = 'category_'.$cat_id;
                              $back_color = get_field('blog_color',$cat_color);
                              $blog_lead = get_field('blog_lead',$cat_color);
                          ?>


                          <a href="<?php echo get_term_link( $term->slug, 'm_category' ); ?>"><div class="blog_cate" style="background-color:<?php echo $back_color;?>"><?=$term->name?></div></a>
                          <a href="<?php the_permalink(); ?>">
                          <div class="blog_text">
                            <div class="blog_date"><?php the_time('Y.m.d'); ?></div>
                            <p class="blog_title"><?php the_title(' '); ?></p>
                            <div class="blog_modi_date"><?php the_modified_date('Y.m.d'); ?></div>
                          </div>
                          </a>
                          <?php } ?>


                        </li>

                        <?php endwhile; else: ?>
                      <?php endif; ?>
                  </ul>

                  <script>

                    /*--------------------
                    「もっと見る」ボタンの制御
                    ---------------------*/

                    var now_post_num = 3; // 現在表示されている数
                    var get_post_num = 3; // 一度に取得する数
                    $(function() {
                      $(document).on('click', '.p-post-btn_2', function() {

                        var ajax_url = '<?php echo bloginfo("template_url");?>/page-readmore_2.php';

                        $.ajax({
                          type: 'post',
                          url: ajax_url,
                          data: {
                              'now_post_num': now_post_num,
                              'get_post_num': get_post_num,
                          },
                          dataType: 'html',
                        })
                        .done(function(data){
                          now_post_num = now_post_num + get_post_num;
                          $("#more_disp_2").remove();
                          $("#content_2").append(data);
                        })
                        .fail(function(){ // ajax通信成失敗の処理
                          alert('エラーが発生しました');
                        })
                        return false;
                      });
                    });
                  </script>

                  <div id="more_disp_2">
                    <p class="p-post-btn_2">もっと見る</p>
                  </div>

              </section>

            </div>
          </div>

          <!-- Spring -->
          <div class="blog_spring">

            <div class="blog_spring_inner">

              <div class="blog_spring_tit">Spring 関連の新着記事</div>
              <section id="content_3">


                <?php $posts = new WP_Query($args);?>
                  <ul>

                    <?php $paged = get_query_var('paged') ? get_query_var('paged') : 1 ;?>
                    <?php
                      $args = array(
                        'tax_query' => array(
                          array(
                            'taxonomy' => 'm_category', //タクソノミーを指定
                            'field' => 'slug', //ターム名をスラッグで指定する
                            'terms' => array( 'spring') //表示したいタームをスラッグで指定
                          ),
                        ),
                      'post_type' => 'magazine',
                      'posts_per_page' => 3,
                      'paged' => $paged,
                      'orderby' => 'post_date',
                      'order' => 'DESC',
                      );
                      query_posts( $args );
                      if ( have_posts() ) :
                      while ( have_posts() ) :
                      the_post();
                    ?>

                        <li class="blog_new_item">
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
                          <?php
                            //タームの取得
                            $terms = wp_get_object_terms($post->ID, 'm_category');
                            //タームを出力
                            if(!empty($terms) && !is_wp_error($terms)){
                            ?>
                              <?php foreach($terms as $term){ ?>
                              <?php } ?>
                          <?php } ?>


                          <?php
                            $cats = get_the_terms($post->ID,'m_category');
                            foreach ( $cats as $cat ){
                              $cat_link = get_category_link($cat->term_id); //注意：cat_idじゃない
                              $cat_name = $cat->name;
                              $cat_id = $cat->term_id;
                              $cat_color = 'category_'.$cat_id;
                              $back_color = get_field('blog_color',$cat_color);
                              $blog_lead = get_field('blog_lead',$cat_color);
                          ?>
                          <a href="<?php echo get_term_link( $term->slug, 'm_category' ); ?>"><div class="blog_cate" style="background-color:<?php echo $back_color;?>"><?=$term->name?></div></a>
                          <a href="<?php the_permalink(); ?>">
                          <div class="blog_text">
                            <div class="blog_date"><?php the_time('Y.m.d'); ?></div>
                            <p class="blog_title"><?php the_title(' '); ?></p>
                            <div class="blog_modi_date"><?php the_modified_date('Y.m.d'); ?></div>
                          </div>
                          </a>
                          <?php } ?>


                        </li>

                        <?php endwhile; else: ?>
                      <?php endif; ?>
                  </ul>

                  <script>

                    /*--------------------
                    「もっと見る」ボタンの制御
                    ---------------------*/

                    var now_post_num = 3; // 現在表示されている数
                    var get_post_num = 3; // 一度に取得する数
                    $(function() {
                      $(document).on('click', '.p-post-btn_3', function() {

                        var ajax_url = '<?php echo bloginfo("template_url");?>/page-readmore_3.php';

                        $.ajax({
                          type: 'post',
                          url: ajax_url,
                          data: {
                              'now_post_num': now_post_num,
                              'get_post_num': get_post_num,
                          },
                          dataType: 'html',
                        })
                        .done(function(data){
                          now_post_num = now_post_num + get_post_num;
                          $("#more_disp_3").remove();
                          $("#content_3").append(data);
                        })
                        .fail(function(){ // ajax通信成失敗の処理
                          alert('エラーが発生しました');
                        })
                        return false;
                      });
                    });
                  </script>
                  <div id="more_disp_3">
                    <p class="p-post-btn_3">もっと見る</p>
                  </div>
              </section>
            </div>
          </div>

          <!-- Footer　バナー -->
		  <!-- バナー部分を一時的に非表示 	
          <div class="blog_foot_bnr">
            <div class="blog_foot_bnr_inner">

              <ul>
                <li>
                  <a href="<?php echo home_url(); ?>">
                    <img src="<?php echo get_template_directory_uri(); ?>/images/blog/bnr_sample.jpg" alt="">
                  </a>
                </li>
                <li>
                  <a href="<?php echo home_url(); ?>">
                    <img src="<?php echo get_template_directory_uri(); ?>/images/blog/bnr_sample.jpg" alt="">
                  </a>
                </li>
                <li>
                  <a href="<?php echo home_url(); ?>">
                    <img src="<?php echo get_template_directory_uri(); ?>/images/blog/bnr_sample.jpg" alt="">
                  </a>
                </li>
                <li>
                  <a href="<?php echo home_url(); ?>">
                    <img src="<?php echo get_template_directory_uri(); ?>/images/blog/bnr_sample.jpg" alt="">
                  </a>
                </li>
                <li>
                  <a href="<?php echo home_url(); ?>">
                    <img src="<?php echo get_template_directory_uri(); ?>/images/blog/bnr_sample.jpg" alt="">
                  </a>
                </li>
              </ul>
            </div>
          </div> 
		  -->
			
        </div>

      <!-- サイドメニュー -->
      <?php get_template_part('parts_blog_side'); ?>

    </main>

  </div>
</div>
<?php get_template_part('parts_site_footer'); ?>
<?php wp_reset_query(); ?>

<?php get_footer(); ?>



