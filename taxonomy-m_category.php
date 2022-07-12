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
<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/css/blog_tax.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-cookie/1.4.1/jquery.cookie.min.js"></script>
<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/blog_common.js"></script>

</head>

<body id="pageBlog">

<?php get_template_part('parts_site_header'); ?>
<?php get_template_part('parts_blog_popup'); ?>

<main class="contents">


<!-- Advance Custom Field 取得 -->

<?php if (has_term('','m_category')): ?>

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

  <!-- パンくず -->
  <div id="breadcrumb">
    <div class="inner">
      <ul class="breadlist hiragino">
        <li><a href="<?php echo home_url(); ?>">ホーム</a></li>
        <li><span><a href="<?php echo home_url(); ?>/blog/">トレノキャンプブログ</a></span></li>
        <li><span><?php echo $cat_name; ?></span></li>
      </ul>
    </div>
  </div>

  <div class="blog_main">

  <div id="main">

    <!-- カテゴリー画像 -->
    <div class="blog_header">
      <div class="blog_header_logo" style="background-color:<?php echo $back_color; ?>">
        <div class="blog_header_logo_inner">
          <img src="<?php echo get_template_directory_uri(); ?>/images/blog/logo_blog_pc.png" alt="" class="js_image_switch">
        </div>
      </div>
      <div class="blog_header_image"></div>
    </div>

    <!-- カテゴリータイトル -->
    <div class="category_tit"  style="border-color:<?php echo $back_color; ?>;">
      <?php echo $cat_name; ?>
    </div>

    <!-- カテゴリーリード文 -->
    <div class="category_lead">
      <?php echo $blog_lead; ?>
    </div>


    <script>
    var view=4;
    $(function(){
      $('.more_list:gt('+(view-1)+')').hide();
      $('.more_list:visible:last').after($('<div id="more">もっとみる</div>'));
      $(document).on('click','#more',function(){
        $('.more_list:lt('+($('.more_list:visible').length+view)+')').show();
        $('.more_list:visible:last').after($('#more'));
        if($('.more_list:hidden').length==0) $('#more').remove();
      });
    });
    </script>

    <!-- 記事一覧　-->
    <div class="category_list">
      <ul>

        <?php
        $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;

        $args = array(
          'post_type' => 'magazine', // 投稿タイプを指定
          'posts_per_page' => -1, // 表示するページ数
          'paged' => $paged, // 表示するページ数
        ); ?>

              <?php if (have_posts()) :  while (have_posts()) : the_post(); ?>
              <?php
                $terms = get_the_terms( get_the_ID(), 'm_category' );
                if ( !empty($terms) ) : if ( !is_wp_error($terms) ) :
              ?>

              <?php foreach( $terms as $term ) : ?>

            <li class="more_list">
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
                <div class="blog_text_cate_date">
                  <div class="blog_text_category" style="background-color:<?php echo $back_color; ?>">
                    <a class="<?=$term->slug?>" href="<?php echo get_term_link( $term->slug, 'm_category' ); ?>"><?=$term->name?></a>
                  </div>
                  <div class="blog_text_date"><?php the_time('Y.m.d'); ?></div>
                </div>
                <div class="blog_text_title"><a href="<?php the_permalink(); ?>"><?php the_title(' '); ?></a></div>
                <div class="blog_text_modi_date"><?php the_modified_date('Y.m.d'); ?></div>

              </div>

              <?php endforeach; ?>
              <?php endif; endif; ?>
          </li>


          <?php endwhile; endif; ?>
          <?php wp_reset_postdata(); ?><!-- 忘れずにリセットする必要がある -->
      </ul>

    </div>


</div>

  <?php } ?>

<?php endif; ?>

  <!-- サイドメニュー -->
  <?php get_template_part('parts_blog_side'); ?>

</main>


<?php get_template_part('parts_blog_footer'); ?>
<?php get_template_part('parts_site_footer'); ?>
<?php get_footer(); ?>