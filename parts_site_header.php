  <!--parts_site_header.php-->

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


  <div id="loadingWrap">

    <header>

      <div class="header header__top">
		<!--ヘッダーニュースエリア-->
		<!--
		<div class="head_news">
           <a href="https://globalknowledge.smktg.jp/public/seminar/view/3175">
            <p class="head_news_text">初心者必見！Python データ分析 無料セミナーを開催します</p>
           </a>
          <button name="btn_news">×</button>
		</div>
		-->
        <p id="nav_open"><span></span><span></span><span></span></p>
        <div class="header_nav">

          <?php if ( is_post_type_archive('magazine')): ?>
            <h1 class="blog_logo">
            <a href="<?php echo home_url(); ?>">
              <img src="<?php echo get_template_directory_uri(); ?>/images/common/blog_logo.png" alt="TRAINO CAMP">
            </a>
            </h1>

          <?php else: ?>
            <h1 class="common_logo">
            <a href="<?php echo home_url(); ?>">
              <img src="<?php echo get_template_directory_uri(); ?>/images/common/logo.png" alt="TRAINO CAMP">
            </a>
            </h1>
          <?php endif; ?>

          <ul class="nav_flex">
            <!--PCのメニュー-->
            <li class="accordion"><a class="hover_first" href="<?php echo home_url(); ?>/course/">コースカテゴリー</a>
                <div class="accordion_on">
                  <ul class="nav_1">
                    <?php
                      foreach ($categories1 as $category1) :
                       echo '<li class="accordion_1"><a class="hover_second" href="'.home_url().'/course/category/'. $category1->category1_slug ;
                        echo '">' . $category1->category1_name .'</a>';
                          echo '<div class="accordion_1_on">';
                            echo '<ul class="nav_2">';
                              foreach ( $categories2 as $category2 ) {
                                if($category2->category1_id==$category1->category1_id){
                                  echo '<li class="accordion_2"><a class="hover_third"  href="'.home_url().'/course/category/'. $category1->category1_slug.'/'. $category2->category2_slug ;
                                  echo '">' . $category2->category2_name.'</a>';
                                    echo '<div class="accordion_2_on">';
                                      echo '<ul class="nav_3">';
                                        foreach ( $categories3 as $category3 ) {
                                          if($category3->category2_id==$category2->category2_id){
                                            echo '<li class="accordion_3"><a class="hover_fourth" href="'.home_url().'/course/category/'. $category1->category1_slug.'/'. $category2->category2_slug.'/'. $category3->category3_slug ;
                                            echo '">' . $category3->category3_name;
                                            echo '</a></li>';
                                          }
                                        }
                                        echo '</ul>';
                                      }
                                    echo '</li>';
                                    }
                              echo '</ul>';
                            echo '</div>';
                          echo '</li>';
                      endforeach;
                    ?>
                  </ul>
              </div>
            </li>
            <!--スマホのメニュー-->
            <li class="dropdown">
              <dl class="toggle_contents">
                <dt class="toggle_title tap_first"><a href="<?php echo home_url(); ?>/course/">コースカテゴリー</a><span class="toggle_btn">開く</span></dt>
                <dd>
                  <ul>
                    <?php
                      foreach ($categories1 as $category1) :
                        echo '<li class="dropdown nav_second_sp">' ;
                          echo '<dl class="toggle_contents">' ;
                            echo '<dt class="toggle_title">' ;
                            echo '<a  href="'.home_url().'/course/category/'. $category1->category1_slug. '">' .$category1->category1_name .'</a><span class="toggle_btn">開く</span></dt>' ;
                            echo '<dd>';
                              foreach ( $categories2 as $category2 ) {
                                if($category2->category1_id==$category1->category1_id){
                                  echo '<li class="dropdown nav_third_sp">' ;
                                    echo '<dl class="toggle_contents">' ;
                                      echo '<dt class="toggle_title">' ;
                                      echo '<a  href="'.home_url().'/course/category/'. $category1->category1_slug.'/'. $category2->category2_slug. '">'. $category2->category2_name.'</a><span class="toggle_btn">開く</span></dt>';
                                      echo '<dd>';
                                        foreach ( $categories3 as $category3 ) {
                                          if($category3->category2_id==$category2->category2_id){
                                            echo '<li class="nav_forth_sp"><a href="'.home_url().'/course/category/'. $category1->category1_slug.'/'. $category2->category2_slug.'/'. $category3->category3_slug. '">' . $category3->category3_name.'</a></li>';
                                          }
                                        }
                                      echo '</dd>';
                                    echo '</dt>';
                                  echo '</li>';
                                }
                              }
                            echo '</dd>';
                          echo '</dl>';
                        echo '</li>';
                      endforeach;
                    ?>
                  </ul>
                </dd>
              </dl>
            </li>
            <!--PC・スマホ共通のメニュー-->

            <li class="search_window">
              <!-- json search -->
              <form role="search" method="get" id="searchform" action="<?php echo home_url(); ?>/course/search/" class="form-inline search">
              <input class="form-control" type="text" value="" placeholder="キーワードでコース検索" name="q" id="q" />
              <input class="btn_search" type="submit" id="searchsubmit" value="" />
              </form>
              <!-- json search -->
            </li>
            <li class="list_servive"><a class="hover_first tap_first" href="<?php echo home_url(); ?>/about/">サービスの使い方</a></li>
            <li class="list_course"><a class="hover_first tap_first" href="<?php echo home_url(); ?>/map/">コースマップ一覧</a></li>
            <li class="list_blog"><a class="hover_first tap_first" href="<?php echo home_url(); ?>/magazine/">ブログ</a></li>
            <li class="list_biz"><a class="hover_first tap_first" href="<?php echo home_url(); ?>/biz/">法人でのご利用</a></li>
            <li class="nav_login tap_first"><a href="https://camp-lms.trainocate.co.jp/rpv/login">ログイン</a></li>
            <li class="nav_register tap_first"><a href="https://camp-lms.trainocate.co.jp/rpv/signup/">新規登録</a></li>
          </ul>
        </div>
        <div class="search_icon">
          <div class="open-btn"></div><!--虫眼鏡マークのHTML-->
          <div id="search-wrap"><!--表示エリアのHTML虫眼鏡マークをクリックするとsearch-wrap に表示用のクラス名が付与されて前面に画面表示。閉じるボタン（close-btn）をクリックするとクラス名が除去されて非表示。-->
            <div class="close-btn"><span></span><span></span></div>
            <div class="search-area">
            <form role="search" method="get" id="searchform" action="<?php echo home_url(); ?>/course/search/" class="form-inline search">
            <input class="form-control" type="text" value="" placeholder="キーワードでコース検索" name="q" id="q" />
            <input class="btn_search" type="submit" id="searchsubmit" value="" />
            </form>
            </div>
          </div>
        </div>
        <div class="header_nav_bottom">


        <!--PCの2段目のメニュー-->

        <div class="nav_second">
          <ul class="nav_flex">
            <?php

              /*----------------------------------------------------
              第1階層が「開発」（ID=1）の第2階層を一覧表示
              ----------------------------------------------------*/
              foreach ($categories2 as $category2) :
                if($category2->category1_id=='1'){

                echo '<li class="accordion_2"><a href="'.home_url().'/course/category/development/'.  $category2->category2_slug ;
                echo '">' . $category2->category2_name .'</a>';
                  echo '<div class="accordion_2_on">';
                    echo '<ul class="nav_4">';
                      foreach ( $categories3 as $category3 ) {
                        if($category3->category2_id==$category2->category2_id){
                          echo '<li class="accordion_4"><a class="hover_fourth" href="'.home_url().'/course/category/development/'. $category2->category2_slug.'/'.$category3->category3_slug ;
                          echo '">' . $category3->category3_name.'</a>';
                              }
                            echo '</li>';
                            }
                      echo '</ul>';
                    echo '</div>';
                  echo '</li>';
                          }
              endforeach;
            ?>
          </ul>
          <ul class="nav_flex">
            <?php
              /*----------------------------------------------------
              第2階層の「DX」（ID=14）のみを一覧表示
              ----------------------------------------------------*/
              foreach ($categories2 as $category2) :
                if($category2->category2_id=='14'){

                echo '<li class="accordion_2"><a href="'.home_url().'/course/category/development/'. $category2->category2_slug ;
                echo '">' . $category2->category2_name .'</a>';
                  echo '<div class="accordion_2_on">';
                    echo '<ul class="nav_4">';
                      foreach ( $categories3 as $category3 ) {
                        if($category3->category2_id==$category2->category2_id){
                          echo '<li class="accordion_3"><a href="'.home_url().'/course/category/development/'. $category2->category2_slug.'/'. $category3->category3_slug ;
                          echo '">' . $category3->category3_name.'</a>';
                              }
                            echo '</li>';
                            }
                      echo '</ul>';
                    echo '</div>';
                  echo '</li>';
                          }
              endforeach;
            ?>
          </ul>
      </div>




        </div>
      </div>
    </header>

    <div id="fb-root"></div>
    <script async defer crossorigin="anonymous" src="https://connect.facebook.net/ja_JP/sdk.js#xfbml=1&version=v8.0" nonce="4yu1rgXk"></script>

  <!--parts_site_header.php end-->
