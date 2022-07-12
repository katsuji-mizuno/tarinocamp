<?php get_header(); ?>
<?php $uid = get_the_id(); ?>

<!--modal-->
<link rel="stylesheet" type="text/css" href="<?php bloginfo('template_directory'); ?>/css/remodal.css" >
  <link rel="stylesheet" type="text/css" href="<?php bloginfo('template_directory'); ?>/css/remodal-default-theme.css">
  <script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/remodal.js"></script>

<!-- for Page -->
<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/course.js"></script>

<!-- for Page -->
<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/css/author.css" media="all" />


</head>
<body id="singleDefault">
  <?php get_template_part('parts_site_header'); ?>

  <main class="contents">





    <div class="blog_wrap">
      <div class="content_inner">







        <!-- ここから投稿者 -->
        <div id="author">
          <?php
            $author = get_userdata($post->post_author);
            $aid =  $author->ID;
          ?>
          <div class="author_cols">
            <div class="author_img">
              <div class="image round">
                <?php echo get_avatar($aid, 240); ?>

              </div>
            </div>
            <div class="author_texts">


              <div class="author_name"><?php echo $author->user_mailad; ?><?php echo $author->display_name; ?></div>
              <div class="author_position"><?php echo $author->position; ?></div>
              <div class="author_description"><?php echo $author->description; ?></div>
            </div>
          </div>
        </div>
        <!-- ここまで投稿者 -->









      </div>
    </div>

  </main>



  <?php get_template_part('parts_site_footer'); ?>
<?php get_footer(); ?>