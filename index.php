<?php get_header(); ?>
<!-- モーダル -->

<!-- css -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

<!-- script -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

<!-- slider -->
<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/slick/slick.css" media="all" />
<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/slick/slick-theme.css" media="all" />
<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/slick/slick.min.js"></script>
<!-- ページ固有 -->
<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/home.js"></script>
<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/css/top.css">

</head>

<?php
  //キーワード
$keyword = get_query_var('q');
$data_count = 0;
//---------------------------------------
//商品一覧（タグ）取得関数
//(引数) prm_tag_id (number)
//(戻り値) tag_listの配列
//---------------------------------------

  function get_api_search_keyword($prm_keyword) {

    global $base_api_url;
    if ($prm_keyword) {
      $srch_url           = $base_api_url . '/merchandise/search/?keyword=' . urlencode($prm_keyword);
    }else{
      $srch_url           = $base_api_url . '/merchandise/search/?sort=created_date&limit=30'; //全件
    }
      $srch_keyword_json  = file_get_contents($srch_url);
      $srch_keyword_json  = mb_convert_encoding($srch_keyword_json, 'UTF8', 'ASCII,JIS,UTF-8,EUC-JP,SJIS-WIN');
      $srch_keyword_obj   = json_decode( $srch_keyword_json ) ; //オブジェクト変換
      $tmp_course_list;
      if ($srch_keyword_obj->result !== 'ng') {
        $tmp_course_list = $srch_keyword_obj->course_info;
        $data_count = $srch_keyword_obj->count;
      }

      return $tmp_course_list;

  }
?>


<?php
  /*************************
  商品情報の取得
  *************************/

  $course_list = array();
  $course_list = get_api_search_keyword( $keyword );

?>

<?php
  //カテゴリ情報の取得------------------------------

  global $base_api_url;
    $categories_url    = $base_api_url . '/categories/';
    $categories_json   = file_get_contents($categories_url);
    $categories_json   = mb_convert_encoding($categories_json, 'UTF8', 'ASCII,JIS,UTF-8,EUC-JP,SJIS-WIN');
    $categories_obj    = json_decode( $categories_json ) ; //オブジェクト変換
    $categories1 = $categories_obj ->category_info->category1_list;
    $categories2 = $categories_obj ->category_info->category2_list;
    $categories3 = $categories_obj ->category_info->category3_list;
?>




<body id="pageHome">
  <?php get_template_part('parts_site_header'); ?>

    <main class="contents">

      <!-- MVのslider -->
      <div class="top_mv_wrap">
        <ul class="slider">
          <li>
            <div class="top_mv_01">
              <div class="top_mv_inner">
                <a href="<?php echo home_url(); ?>/map/python/">
                  <div class="top_mv_link">
                    <div class="top_mv_link_red">
                      <img src="<?php echo get_template_directory_uri(); ?>/images/top/top_slick_btn1.png" alt="">
                    </div>
                  </div>
                </a>
                <div class="top_mv_catch">
                  <div class="top_mv_catch_text">
                    <div class="top_mv_01_catch">
                      学びを止めない eラーニング<br /><span>初心者から現役エンジニアまで<br />実務で使えるコンテンツ</span>
                    </div>
                    <div class="mv_search_window">
                      <!-- json search -->
                      <form role="search" method="get" id="searchform" action="<?php echo home_url(); ?>/course/search/" class="form-inline search">
                      <input class="form-control" type="text" value="" placeholder="キーワードでコース検索" name="q" id="q" />
                      <input class="btn_search" type="submit" id="searchsubmit" value="" />
                      </form>
                      <!-- json search -->
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </li>
          <li>
            <div class="top_mv_02">
              <div class="top_mv_inner">
                <a href="<?php echo home_url(); ?>/map/java/">
                  <div class="top_mv_link">
                      <img src="<?php echo get_template_directory_uri(); ?>/images/top/top_slick_btn2.png" alt="">
                  </div>
                </a>
                <div class="top_mv_catch">
                  <div class="top_mv_catch_text">
                    <div class="top_mv_02_catch">
                    プログラミングをどこよりも深く<br /><span>スキルを継続的にアップデートして<br />現場で活躍しましょう</span>
                    </div>
                    <div class="mv_search_window">
                      <!-- json search -->
                      <form role="search" method="get" id="searchform" action="<?php echo home_url(); ?>/course/search/" class="form-inline search">
                      <input class="form-control" type="text" value="" placeholder="キーワードでコース検索" name="q" id="q" />
                      <input class="btn_search" type="submit" id="searchsubmit" value="" />
                      </form>
                      <!-- json search -->
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </li>
        </ul>
      </div>


      <div class="top_catch">
      検索だけでは見つからない<br />現場のノウハウを学習しましょう
      </div>


      <!-- コース「新着一覧」 -->
      <div class="top_course_new">
        <div class="top_course_new_inner">

          <div class="top_course_new_tit">
          新着一覧
          </div>

          <!-- 一覧 -->
          <div class="contents_body">
            <div class="inner">
              <div class="list_wrap">

                <ul class="course_list slider_course_new" id="course_list">
                  <?php
                  foreach ($course_list as $key => $course) :
                    global $wp_query;
                    //$merchandise_id = get_field('merchandise_id');
                    $merchandise_id = $wp_query->query_vars['merchandise_id'];
                    $course_info = get_api_course($merchandise_id);
                    $img_url = $base_img_url . $course->icon_image;
                  ?>

                    <li class="top_course_new_list">
                      <a href="<?php echo home_url(); ?>/course/detail/<?php echo $course->merchandise_id; ?>/" data-toggle="popover" title="<?php echo $course->merchandise_name;?>" data-content='<ul class="course_gaiyou"><li class="icon time">学習時間の目安：<?php echo $course->attendance_time;?></li><li class="icon count">総単元数：<?php echo $course->unit_count;?>件</li><li class="icon period">受講期間：<?php echo $course->course_period;?></li></ul><p class="course_sub_title_dialogue"><?php echo $course->sub_name;?></p>' data-placement="top">
                          <div class="image c_thumb"><img src="<?php echo $img_url; ?>" class="fit-cover" alt=""></div>
                          <h2 class="course_title"><?php echo $course->merchandise_name;?></h2>
                      </a>
                          <ul class="list_tags list_tags2">
                            <?php
                              if (isset($course->tag_list)) :
                                foreach ($course->tag_list as $key => $tag_item) :
                                  echo '<li data-url="'. home_url() . '/course/tag/'. $tag_item->tag_slug . '/" class="tag_link">' . $tag_item->name . '</li>';
                                endforeach;
                              endif;
                              ?>
                          </ul>
                      <a href="<?php echo home_url(); ?>/course/detail/<?php echo $course->merchandise_id; ?>/" data-toggle="popover" title="<?php echo $course->merchandise_name;?>" data-content='<ul class="course_gaiyou"><li class="icon time">学習時間の目安：<?php echo $course->attendance_time;?></li><li class="icon count">総単元数：<?php echo $course->unit_count;?>件</li><li class="icon period">受講期間：<?php echo $course->course_period;?></li></ul><p class="course_sub_title_dialogue"><?php echo $course->sub_name;?></p>' data-placement="top">
                          <p class="course_sub_title"><?php echo $course->sub_name;?></p>
                          <div class="price_box">
                            <p class="discount_price">&yen;<?php
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
                      </a>
                      <div class="popover_cols">
                        <a  href="<?php echo home_url(); ?>/course/detail/<?php echo $course->merchandise_id; ?>/">
                          <div class="dialogue_btn_course">コース詳細</div>
                        </a>
                        <a href="<?php echo $course->ec_jump_key; ?>" target="_blank">
                          <div class="dialogue_btn_purchase">購入する</div>
                        </a>
                      </div>
                    </li>
                  <?php endforeach; ?>
                </ul>


              </div>
            </div>
          </div>

        </div>
      </div>



      <!-- Javaプログラミング -->
      <div class="top_course_java">
        <div class="top_course_java_tit">
        Javaプログラミング
        </div>
        <div class="contents_body">
          <div class="inner">
            <div class="list_wrap">

              <ul class="course_list slider_course_new" id="course_list">
              <?php
                foreach ($course_list as $key => $course) :
                  $img_url = $base_img_url . $course->icon_image;
                ?>

                <?php
                   if ($course->category3_id=='1') : //本番環境
                  //if ($course->category3_id=='7') :  //テスト環境
                ?>

                    <li class="top_course_new_list">
                      <a href="<?php echo home_url(); ?>/course/detail/<?php echo $course->merchandise_id; ?>/" data-toggle="popover" title="<?php echo $course->merchandise_name;?>" data-content='<ul class="course_gaiyou"><li class="icon time">学習時間の目安：<?php echo $course->attendance_time;?></li><li class="icon count">総単元数：<?php echo $course->unit_count;?>件</li><li class="icon period">受講期間：<?php echo $course->course_period;?></li></ul><p class="course_sub_title_dialogue"><?php echo $course->sub_name;?></p>' data-placement="top">
                        <div class="image c_thumb"><img src="<?php echo $img_url; ?>" class="fit-cover" alt=""></div>
                        <h2 class="course_title"><?php echo $course->merchandise_name;?></h2>
                      </a>
                        <ul class="list_tags list_tags2">
                            <?php
                              if (isset($course->tag_list)) :
                                foreach ($course->tag_list as $key => $tag_item) :
                                  echo '<li data-url="'. home_url() . '/course/tag/'. $tag_item->tag_slug . '/" class="tag_link">' . $tag_item->name . '</li>';
                                endforeach;
                              endif;
                              ?>
                          </ul>
                      <a href="<?php echo home_url(); ?>/course/detail/<?php echo $course->merchandise_id; ?>/" data-toggle="popover" title="<?php echo $course->merchandise_name;?>" data-content='<ul class="course_gaiyou"><li class="icon time">学習時間の目安：<?php echo $course->attendance_time;?></li><li class="icon count">総単元数：<?php echo $course->unit_count;?>件</li><li class="icon period">受講期間：<?php echo $course->course_period;?></li></ul><p class="course_sub_title_dialogue"><?php echo $course->sub_name;?></p>' data-placement="top">
                          <p class="course_sub_title"><?php echo $course->sub_name;?></p>
                            <div class="price_box">
                              <p class="discount_price">&yen;<?php
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

                      </a>

                      <div class="popover_cols">
                        <a  href="<?php echo home_url(); ?>/course/detail/<?php echo $course->merchandise_id; ?>/">
                          <div class="dialogue_btn_course">コース詳細</div>
                        </a>
                        <a href="<?php echo $course->ec_jump_key; ?>" target="_blank">
                          <div class="dialogue_btn_purchase">購入する</div>
                        </a>
                      </div>
                    </li>

                  <?php endif ?>

                  <?php endforeach; ?>

              </ul>
            </div>
          </div>
        </div>
      </div>


      <!-- Springフレームワーク -->
      <div class="top_course_spring">
        <div class="top_course_spring_tit">
        Springフレームワーク
        </div>
        <div class="contents_body">
          <div class="inner">
            <div class="list_wrap">



              <ul class="course_list slider_course_new" id="course_list">
              <?php
                foreach ($course_list as $key => $course) :
                  $img_url = $base_img_url . $course->icon_image;
                ?>

                <?php
                   if ($course->category3_id=='2') : //本番環境
                  //if ($course->category3_id=='10') :  //テスト環境
                ?>

                    <li class="top_course_new_list">
                      <a href="<?php echo home_url(); ?>/course/detail/<?php echo $course->merchandise_id; ?>/" data-toggle="popover" title="<?php echo $course->merchandise_name;?>" data-content='<ul class="course_gaiyou"><li class="icon time">学習時間の目安：<?php echo $course->attendance_time;?></li><li class="icon count">総単元数：<?php echo $course->unit_count;?>件</li><li class="icon period">受講期間：<?php echo $course->course_period;?></li></ul><p class="course_sub_title_dialogue"><?php echo $course->sub_name;?></p>' data-placement="top">
                        <div class="image c_thumb"><img src="<?php echo $img_url; ?>" class="fit-cover" alt=""></div>
                        <h2 class="course_title"><?php echo $course->merchandise_name;?></h2>
                      </a>
                          <ul class="list_tags list_tags2">
                              <?php
                              if (isset($course->tag_list)) :
                                foreach ($course->tag_list as $key => $tag_item) :
                                  echo '<li data-slug="'.$tag_item->slug .'"><a href="'. home_url() . '/course/tag/'. $tag_item->tag_slug . '/" class="btn_course">' . $tag_item->name . '</a></li>';
                                endforeach;
                              endif;
                              ?>
                          </ul>
                      <a href="<?php echo home_url(); ?>/course/detail/<?php echo $course->merchandise_id; ?>/" data-toggle="popover" title="<?php echo $course->merchandise_name;?>" data-content='<ul class="course_gaiyou"><li class="icon time">学習時間の目安：<?php echo $course->attendance_time;?></li><li class="icon count">総単元数：<?php echo $course->unit_count;?>件</li><li class="icon period">受講期間：<?php echo $course->course_period;?></li></ul><p class="course_sub_title_dialogue"><?php echo $course->sub_name;?></p>' data-placement="top">
                          <p class="course_sub_title"><?php echo $course->sub_name;?></p>
                          <div class="price_box">
                              <p class="discount_price">&yen;<?php
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

                      </a>

                        <div class="popover_cols">
                            <a  href="<?php echo home_url(); ?>/course/detail/<?php echo $course->merchandise_id; ?>/">
                              <div class="dialogue_btn_course">コース詳細</div>
                            </a>
                            <a href="<?php echo $course->ec_jump_key; ?>" target="_blank">
                              <div class="dialogue_btn_purchase">購入する</div>
                          </a>
                        </div>
                      </li>
                <?php endif ?>

                <?php endforeach; ?>

              </ul>
            </div>
          </div>
        </div>
      </div>


      <!-- 機械学習・データ分析 -->
      <div class="top_course_learn">
        <div class="top_course_learn_tit">
        機械学習・データ分析
        </div>
        <div class="contents_body">
          <div class="inner">
            <div class="list_wrap">

              <ul class="course_list slider_course_new" id="course_list">
              <?php
                foreach ($course_list as $key => $course) :
                  $img_url = $base_img_url . $course->icon_image;
                ?>

                <?php
                   if ($course->category3_id=='4') : //本番環境
                  //if ($course->category3_id=='13') :  //テスト環境
                ?>
                    <li class="top_course_new_list">
                      <a href="<?php echo home_url(); ?>/course/detail/<?php echo $course->merchandise_id; ?>/" data-toggle="popover" title="<?php echo $course->merchandise_name;?>" data-content='<ul class="course_gaiyou"><li class="icon time">学習時間の目安：<?php echo $course->attendance_time;?></li><li class="icon count">総単元数：<?php echo $course->unit_count;?>件</li><li class="icon period">受講期間：<?php echo $course->course_period;?></li></ul><p class="course_sub_title_dialogue"><?php echo $course->sub_name;?></p>' data-placement="top">
                        <div class="image c_thumb"><img src="<?php echo $img_url; ?>" class="fit-cover" alt=""></div>
                        <h2 class="course_title"><?php echo $course->merchandise_name;?></h2>
                      </a>

                          <ul class="list_tags list_tags2">
                            <?php
                              if (isset($course->tag_list)) :
                                foreach ($course->tag_list as $key => $tag_item) :
                                  echo '<li data-url="'. home_url() . '/course/tag/'. $tag_item->tag_slug . '/" class="tag_link">' . $tag_item->name . '</li>';
                                endforeach;
                              endif;
                              ?>
                          </ul>
                      <a href="<?php echo home_url(); ?>/course/detail/<?php echo $course->merchandise_id; ?>/" data-toggle="popover" title="<?php echo $course->merchandise_name;?>" data-content='<ul class="course_gaiyou"><li class="icon time">学習時間の目安：<?php echo $course->attendance_time;?></li><li class="icon count">総単元数：<?php echo $course->unit_count;?>件</li><li class="icon period">受講期間：<?php echo $course->course_period;?></li></ul><p class="course_sub_title_dialogue"><?php echo $course->sub_name;?></p>' data-placement="top">
                        <p class="course_sub_title"><?php echo $course->sub_name;?></p>
                        <div class="price_box">
                          <p class="discount_price">&yen;<?php
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
                      </a>
                      <div class="popover_cols">
                        <a  href="<?php echo home_url(); ?>/course/detail/<?php echo $course->merchandise_id; ?>/">
                          <div class="dialogue_btn_course">コース詳細</div>
                        </a>
                        <a href="<?php echo $course->ec_jump_key; ?>" target="_blank">
                          <div class="dialogue_btn_purchase">購入する</div>
                        </a>
                      </div>
                    </li>
                  <?php endif ?>

                  <?php endforeach; ?>

              </ul>
            </div>
          </div>
        </div>
      </div>



      <!-- 受講の方法 -->
      <?php get_template_part('parts_howto'); ?>


      <!-- 途中にあるコースカテゴリーのメニュー -->
      <div class="top_course">
        <div class="top_course_tit">
        コースカテゴリー
        </div>
        <div class="top_course_content">
          <ul>
            <a href="<?php echo home_url(); ?>/course/category/development/programming/java/">
              <li>Javaプログラミング</li>
            </a>
            <a href="<?php echo home_url(); ?>/course/category/development/programming/python/">
              <li>Pythonプログラミング</li>
            </a>
            <a href="<?php echo home_url(); ?>/course/category/development/web-development/spring/">
              <li>Springフレームワーク</li>
            </a>
            <a href="<?php echo home_url(); ?>/course/category/development/web-development/dev-ops/">
              <li>DevOps</li>
            </a>
            <a href="<?php echo home_url(); ?>/course/category/development/ai-datasience/machine-learning/">
              <li>データ分析/機械学習</li>
            </a>
            <a href="<?php echo home_url(); ?>/course/category/development/DB/">
              <li>データベース</li>
            </a>
            <a href="<?php echo home_url(); ?>/course/category/development/dx/improvement/">
              <li>DX/業務改善</li>
            </a>
            <a href="<?php echo home_url(); ?>/course/category/it_use/it-basic/">
              <li>ITリテラシー</li>
            </a>
          </ul>
        </div>
      </div>


      <!-- お知らせ -->

      <div class="top_news">
        <div class="top_news_tit">
        お知らせ
        </div>
        <div class="news_content">
          <ul>
            <?php
              $args=array(
                'tax_query' => array(
                  array(
                    'taxonomy' => 'm_category', //タクソノミーを指定
                    'field' => 'slug', //ターム名をスラッグで指定する
                    'terms' => array( 'news') //表示したいタームをスラッグで指定
                  ),
                ),
                'post_type' => 'magazine', //カスタム投稿名
                'posts_per_page'=> 3 //表示件数（-1で全ての記事を表示）
              );
            ?>
            <?php query_posts( $args ); ?>
            <?php if(have_posts()): ?>
            <?php while(have_posts()):the_post(); ?>
            <a href="<?php the_permalink(); ?>">
              <li>
                <div class="post_date"><?php the_time('Y.m.d'); ?></div>
                <div class="post_tit"><?php the_title(' '); ?></div>
              </li>
            </a>
            <?php endwhile; else: ?>
            <?php endif; ?>
            <?php wp_reset_query(); ?>
          </ul>
        </div>
      </div>


      <!-- 法人のお客様リンク -->
      <?php get_template_part('parts_biz'); ?>


      <?php
      //var_dump($tag_item);
      ?>



    </main>

  <?php get_template_part('parts_site_footer'); ?>

<?php get_footer(); ?>
