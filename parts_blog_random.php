




<!-- 関連記事 -->

        <div class="blog_connection">
          <div class="blog_connection_tit">関連記事</div>
          <?php

            $categ = get_the_category($post->ID);
            // $catID = array();

            // foreach($categ as $cat){
            //   array_push($catID, $cat -> cat_ID);
            // }

            $terms = get_the_terms($post->ID,'m_category');
            foreach( $terms as $term ) {
              $term_slug = $term->slug; // 現在表示している投稿に属しているタームを取得
            }

            $args = array(
              'post__not_in' => array($post->ID),
              'post_type' => 'magazine',

              //'category__in' => $catID,
              'category__in' => $categ,
              'posts_per_page' => 3 ,
              'tax_query' => array( // タクソノミーの指定
                array(
                  'taxonomy' => 'm_category',
                  'field' => 'slug',
                  'terms' => $term_slug, // 取得したタームを指定
                )
              ),
              //'orderby' => 'modified'
            );

            $the_query = new WP_Query($args);
            if($the_query -> have_posts()) :?>

            <div class="random_post">
            <?php while($the_query -> have_posts()) : $the_query -> the_post();
            ?>
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

                <?php
                  //タームの取得
                  $terms = wp_get_object_terms($post->ID, 'm_category');
                  //タームを出力
                  if(!empty($terms) && !is_wp_error($terms)){
                  ?>
                    <?php foreach($terms as $term){ ?>
                    <?php } ?>
                <?php } ?>
                <a class="<?=$term->slug?>" href="<?php echo get_term_link( $term->slug, 'm_category' ); ?>"><div class="random_post_cate" style="background-color:<?php echo $back_color;?>"><?=$term->name?></div></a>
                <a href="<?php the_permalink(); ?>">
                <div class="random_post_text">
                  <p class="blog_title"><?php the_title(' '); ?></p>
                  <div class="blog_date"><?php the_time('Y.m.d'); ?></div>
                </div>
                </a>
              </li>
              <?php } ?>

            <?php endwhile; ?>
            </div>
            <?php endif; wp_reset_postdata(); ?>
        </div>


