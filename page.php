<?php get_header(); ?>

<!-- for Page -->
<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/css/top.css">

  </head>
  <body id="pageDefault">
    <?php get_template_part('parts_site_header'); ?>

    <main class="contents">
      <ul class="postList">

        <?php
          $args=array(
            'tax_query' => array(
              array(
                'taxonomy' => 'm_category', //タクソノミーを指定
                'field' => 'slug', //ターム名をスラッグで指定する
                'terms' => array(  'python','spring','engineer') //表示したいタームをスラッグで指定
              ),
            ),
            'post_type' => 'magazine', //カスタム投稿名
            'posts_per_page'=> 10 //表示件数（-1で全ての記事を表示）
          );
        ?>
        <?php query_posts( $args ); ?>
        <?php if(have_posts()): ?>
        <?php while(have_posts()):the_post(); ?>

        <li class="postList_item">
            <a href="<?php the_permalink(); ?>" class="imgHov">
              <div class="date"><?php the_time('Y.m.d'); ?></div>
              <div class="tit_cate">
                <p class="title"><?php the_title(' '); ?></p>

                <?php
                  //タームの取得
                  $terms = wp_get_object_terms($post->ID, 'm_category');
                  //タームを出力
                  if(!empty($terms) && !is_wp_error($terms)){
                  ?>
                    <?php foreach($terms as $term){ ?>
                    <?php } ?>
                <?php } ?>
                <p class="category">

                <a class="<?=$term->slug?>" href="<?php echo get_term_link( $term->slug, 'm_category' ); ?>"><?=$term->name?></a>
                </p>

              </div>
            </a>
          </li>

        <?php endwhile; else: ?>
        <?php endif; ?>
        <?php wp_reset_query(); ?>

      </ul>

    </main>

  <?php get_template_part('parts_site_footer'); ?>
<?php get_footer(); ?>