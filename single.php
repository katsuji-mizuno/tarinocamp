<?php get_header(); ?>


<!--modal-->
<link rel="stylesheet" type="text/css" href="<?php bloginfo('template_directory'); ?>/css/remodal.css" >
  <link rel="stylesheet" type="text/css" href="<?php bloginfo('template_directory'); ?>/css/remodal-default-theme.css">
  <script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/remodal.js"></script>

<!-- for Page -->
<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/css/course.css" media="all" />

<!-- for Page -->
<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/css/author.css" media="all" />

<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/css/blog.css">
<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/css/blog_tax.css">
<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/css/blog_single.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-cookie/1.4.1/jquery.cookie.min.js"></script>
<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/blog_common.js"></script>

</head>
<body id="singleDefault">
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
        <li><span>
          <?php
            //タームの取得
            $terms = wp_get_object_terms($post->ID, 'm_category');
            //タームを出力
            if(!empty($terms) && !is_wp_error($terms)){
            ?>
              <?php foreach($terms as $term){ ?>
              <?php } ?>
          <?php } ?>
          <a class="<?=$term->slug?>" href="<?php echo get_term_link( $term->slug, 'm_category' ); ?>"><?=$term->name?></a>
        </span></li>
        <li><span><?php the_title(); ?></span></li>
      </ul>
    </div>
  </div>



    <div class="blog_main">
      <div id="main">
        <div class="blog_single_wrap">
          <div class="blog_single">
            <div class="blog_single_text">
            <a class="<?=$term->slug?>" href="<?php echo get_term_link( $term->slug, 'm_category' ); ?>"><div class="blog_single_category" style="background-color:<?php echo $back_color;?>"><?=$term->name?></div></a>
              <div class="blog_single_time"><?php the_time('Y.m.d'); ?></div>
            </div>
            <div class="blog_single_tit"><?php the_title(); ?></div>
            <div class="blog_single_modi_date"><?php the_modified_date('Y.m.d'); ?></div>
            <div class="blog_single_content"><?php the_content(); ?></div>
          </div>


        </div>

        <?php } ?>

        <!-- SNSシェアモーダル -->
        <?php
        $share_url=get_permalink();
        $share_title=get_the_title();
        ?>

        <div class="sns_wrap">
          <div class="sns_tit">この記事をシェア</div>
          <div class="sns_icon">
            <!-- フェイスブック -->
            <div class="share__icon">
            <a href="http://www.facebook.com/share.php?u=<?=$share_url?>" title="Facebookでシェア" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/images/blog/sns_fb.png" alt=""></a>
            </div>
            <!-- ツイッター -->
            <div class="share__icon">
            <a href="//twitter.com/share?text=<?=$share_title?>&url=<?=$share_url?>" title="Twitterでシェア" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/images/blog/sns_tw.png" alt=""></a>
            </div>
            <!-- はてなブックマーク -->
            <div class="share__icon">
            <a href="https://b.hatena.ne.jp/entry/<?=$share_url?>" data-hatena-bookmark-layout="basic-label-counter" data-hatena-bookmark-lang="ja" title="このエントリーをはてなブックマークに追加" target="_blank">
            <img src="<?php echo get_template_directory_uri(); ?>/images/blog/sns_hatebu.png" alt="">
            </a><script type="text/javascript" src="https://b.st-hatena.com/js/bookmark_button.js" charset="utf-8" async="async"></script>
            </div>
          </div>
        </div>


        <?php
          $author = get_userdata($post->post_author);
          $aid =  $author->ID;
        ?>

        <!-- ここから投稿者 -->
        <?php
        $checked = get_field('author_info');
        if($checked){ //もし項目を選択したら
           echo '<div id="author"><div class="author_cols"><div class="author_img"><div class="image round">';
           echo get_avatar($aid, 240);
           echo '</div></div><div class="author_texts"><div class="author_name">氏名<span>';
           echo $author->user_mailad;
           echo $author->display_name;
           echo '</span></div><div class="author_position">肩書き・役職<span>';
           echo $author->position;
           echo '</span></div><div class="author_description">';
           echo $author->description;
           echo '</div></div></div></div>';
        }

        //逆の場合は...

        if( !$checked ){ //もし項目を選択していなかったら
            //選択していない時の処理
        }

        ?>


        <!-- ここまで投稿者 -->


        <!-- おすすめの受講コース -->

        <?php get_template_part('parts_blog_recommend'); ?>


        <?php get_template_part('parts_blog_random'); ?>

      </div>

          <!-- サイドメニュー -->
          <?php get_template_part('parts_blog_side'); ?>


    </div>

  </main>




  <?php endif; ?>
  <?php get_template_part('parts_blog_footer'); ?>
  <?php get_template_part('parts_site_footer'); ?>
<?php get_footer(); ?>