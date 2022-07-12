

<?php
    $recommend_bnr_3 = get_field('recommend_bnr_3');
?>


<!-- 関連記事 -->

        <div class="blog_recommend">
          <div class="blog_recommend_tit">おすすめの受講コース</div>
          <ul>
            <?php if( get_field('course_id_1') ) { ?>
            <li>
              <div class="blog_recommend_bnr">
                <?php if( get_field('recommend_bnr_1') ) { ?>
                  <img src="<?php the_field('recommend_bnr_1'); ?>" />
                <?php } ?>
              </div>
              <div class="blog_recommend_text_wrap">
                <div class="blog_recommend_text">
                  <?php if( get_field('recommend_text_1') ) { ?>
                    <?php the_field('recommend_text_1'); ?>
                  <?php } ?>
                </div>
                <div class="blog_recommend_btn">
                  <a href="<?php echo home_url(); ?>/course/detail/<?php the_field('course_id_1'); ?>/">詳細はこちら</a>
                </div>
              </div>
            </li>
            <?php } ?>

            <?php if( get_field('course_id_2') ) { ?>
            <li>
              <div class="blog_recommend_bnr">
                <?php if( get_field('recommend_bnr_2') ) { ?>
                  <img src="<?php the_field('recommend_bnr_2'); ?>" />
                <?php } ?>
              </div>
              <div class="blog_recommend_text_wrap">
                <div class="blog_recommend_text">
                  <?php if( get_field('recommend_text_2') ) { ?>
                    <?php the_field('recommend_text_2'); ?>
                  <?php } ?>
                </div>
                <div class="blog_recommend_btn">
                  <a href="<?php echo home_url(); ?>/course/detail/<?php the_field('course_id_2'); ?>/">詳細はこちら</a>
                </div>
              </div>
            </li>
            <?php } ?>

            <?php if( get_field('course_id_3') ) { ?>
            <li>
              <div class="blog_recommend_bnr">
                <?php if( get_field('recommend_bnr_3') ) { ?>
                  <img src="<?php the_field('recommend_bnr_3'); ?>" />
                <?php } ?>
              </div>
              <div class="blog_recommend_text_wrap">
                <div class="blog_recommend_text">
                  <?php if( get_field('recommend_text_3') ) { ?>
                    <?php the_field('recommend_text_3'); ?>
                  <?php } ?>
                </div>
                <div class="blog_recommend_btn">
                  <a href="<?php echo home_url(); ?>/course/detail/<?php the_field('course_id_3'); ?>/">詳細はこちら</a>
                </div>
              </div>
            </li>
            <?php } ?>

            <?php if( get_field('course_id_4') ) { ?>
            <li>
              <div class="blog_recommend_bnr">
                <?php if( get_field('recommend_bnr_4') ) { ?>
                  <img src="<?php the_field('recommend_bnr_4'); ?>" />
                <?php } ?>
              </div>
              <div class="blog_recommend_text_wrap">
                <div class="blog_recommend_text">
                  <?php if( get_field('recommend_text_4') ) { ?>
                    <?php the_field('recommend_text_4'); ?>
                  <?php } ?>
                </div>
                <div class="blog_recommend_btn">
                  <a href="<?php echo home_url(); ?>/course/detail/<?php the_field('course_id_4'); ?>/">詳細はこちら</a>
                </div>
              </div>
            </li>
            <?php } ?>

          </ul>
        </div>
