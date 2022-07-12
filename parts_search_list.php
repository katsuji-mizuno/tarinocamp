<?php
    //検索結果の一覧(全件、タグ検索、カテゴリ検索、キーワード検索のテンプレートにて使用)
?>

    <!-- 一覧 -->
    <div class="contents_body">
      <div class="inner">
        <div class="list_wrap">

        <?php if (isset($course_list)) :?>
          <ul class="course_list" id="course_list">
            <?php
            foreach ($course_list as $key => $course) :
              $img_url = $base_img_url . $course->icon_image;
            ?>
              <li>
                <a href="<?php echo home_url(); ?>/course/detail/<?php echo $course->merchandise_id; ?>/">
                  <div class="image c_thumb"><img src="<?php echo $img_url; ?>" class="fit-cover" alt="">
                  </div>
                  <div class="title_box">
                    <h2 class="course_title"><?php echo $course->merchandise_name;?></h2>
                    <p class="course_sub_title"><?php echo $course->sub_name;?></p>
                    <ul class="course_gaiyou">
                      <li class="icon time">学習時間の目安：<?php echo $course->attendance_time;?></li>
                      <li class="icon period">受講期間：<?php echo $course->course_period;?></li>
                      <li class="icon count">総単元数：<?php echo $course->unit_count;?>件</li>
                    </ul>
                  </div>
                  <div class="pc_cols">
                    <div class="price_box">
                      <p class="discount_price publicsans">&yen;<?php
                      if ($course->discount_price > 0) {
                        echo number_format($course->discount_price);
                      }else{
                        echo number_format($course->tuition);
                      }
                      ?></p>
                      <?php if ($course->discount_price > 0) : ?>
                        <p class="tuition">&yen;<?php echo number_format($course->tuition); ?></p>
                      <?php endif ?>
                    </div>
                    <ul class="list_tags">
                      <?php
                      if (isset($course->tag_list)) :
                        foreach ($course->tag_list as $key => $tag_item) :
                          echo '<li data-slug="'.$tag_item->slug .'">' . $tag_item->name . '</li>';
                        endforeach;
                      endif;
                      ?>
                    </ul>
                  </div>
                </a>
              </li>
            <?php endforeach; ?>
          </ul>
          <?php //if (count($course_list) > 3) :?>
            <div id="searchresult" class="pager"></div>
          <?php //endif; ?>
        <?php   else: ?>
          <p class="no_data">該当がありませんでした。</p>
        <?php endif; ?>
        </div>
      </div>
    </div>
