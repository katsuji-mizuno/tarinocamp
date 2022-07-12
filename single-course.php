<?php remove_action( 'wp_head', '_wp_render_title_tag', 1 ); //タイトルタグを出力しない ?>

<?php get_header(); ?>


<?php 
  /*************************
  商品情報の取得 
  *************************/
  $merchandise_id = get_field('merchandise_id');
  $course_info = get_api_course($merchandise_id);
  if ($course_info) {
    echo '<title>' . $course_info->merchandise_name .' | '. get_bloginfo('name') .'</title>';
    echo  '<meta property="og:title" content="'. $course_info->merchandise_name .' | '. get_bloginfo('name') .'">';
    echo '<meta name="description" content="'. $course_info->sub_name .'">';
    echo '<meta property="og:description" content="'. $course_info->sub_name .'">';
  }else{
    echo '<title>出力エラー'. bloginfo('name') .'</title>';
  }
?>
<!-- match_height -->
<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/matchHeight-min.js"></script>
<!-- slider -->
<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/slick/slick.css" media="all" />
<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/slick/slick-theme.css" media="all" />
<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/slick/slick.min.js"></script>
<!--modal-->
  <link rel="stylesheet" type="text/css" href="<?php bloginfo('template_directory'); ?>/css/remodal.css" >
  <link rel="stylesheet" type="text/css" href="<?php bloginfo('template_directory'); ?>/css/remodal-default-theme.css">
  <script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/remodal.js"></script>
<!-- for Page -->
<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/css/course.css" media="all" />
<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/course.js"></script>


<style>
/*.slider_nav .slick-track {
transform:unset!important;
}*/
</style>
</head>

<body id="singleCourse" data-merchandise-id="<?php echo $course_info->merchandise_id; ?>">
  
  <?php get_template_part('parts_site_header'); ?>

  <main class="contents">

    <!-- パンくず -->
    <div id="breadcrumb">
      <div class="inner">
        <ul class="breadlist hiragino">
          <li><a href="<?php echo home_url(); ?>" >ホーム</a></li>
          <?php
          if ($course_info->category1_name) {
            echo '<li><a href="' . home_url() . '/course/category/'.$course_info->category1_slug .'/" data-lebel="1" data-cate-id1="'. $course_info->category1_id .'">'. $course_info->category1_name .'</a></li>';
          }
          if ($course_info->category2_name) {
            echo '<li><a href="' . home_url() . '/course/category/'.$course_info->category1_slug .'/'.$course_info->category2_slug.'/" data-cate-lebel="2" data-cate-id1="'. $course_info->category1_id .'"  data-cate-id2="'. $course_info->category2_id .'">'. $course_info->category2_name .'</a></li>';
          }
          if ($course_info->category3_name) {
            echo '<li><a href="' . home_url() . '/course/category/'.$course_info->category1_slug .'/'.$course_info->category2_slug.'/'.$course_info->category3_slug.'/" data-cate-lebel="2" data-cate-id1="'. $course_info->category1_id .'" data-cate-id2="'. $course_info->category2_id .'" data-cate-id3="'. $course_info->category3_id .'">'. $course_info->category3_name .'</a></li>';
          }
          //echo '<li><span>'.$course_info->merchandise_name.'</span></li>'
        ?>
        </ul>
      </div>
    </div>

    <div class="layout hiragino">

      <div class="contents_head">
        <div class="ch_inner">

          <!-- 動画BOX -->
          <div id="movie" class="">
            <div class="innerSP">
              <?php 
                //動画の取得------------------------------
                $videos       = array();
                $videoinfos   = array();
                $videos = $course_info->sample_video;

                foreach($videos as $video) :
                  $video_url = 'https://vimeo.com/api/oembed.json?url=' . $video;
                  $video_json   = file_get_contents($video_url);
                  $video_json   = mb_convert_encoding($video_json, 'UTF8', 'ASCII,JIS,UTF-8,EUC-JP,SJIS-WIN');
                  $videoinfo    = json_decode( $video_json ) ; //オブジェクト変換
        
                  if ($videoinfo) {
                    array_push($videoinfos,$videoinfo);
                  }
                endforeach;
              ?>

              <!-- 動画の再生エリア -->
              <div id="moviePlayer" class="slider_for">
              	<?php
                  foreach($videoinfos as $videoinfo) :
                ?>
                    <div class="wrap_movie">
                      <iframe src="<?php echo 'https://player.vimeo.com/video/' . $videoinfo->video_id; ?>" title = "<?php echo $videoinfo->title; ?>" frameborder = "0" allow = "accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                    </div>
                <?php 
                  endforeach;
              	?>
              </div>
              <!-- 動画のサムネイル -->

              <ul id="movieNav" class="slider_nav">
                <?php
                  foreach($videoinfos as $videoinfo) :
                    $video_thumb;
                    if ($videoinfo->thumbnail_url) {
                      $video_thumb = $videoinfo->thumbnail_url;
                    }else{
                      $video_thumb = get_template_directory_uri() . '/images/course/no_thumb.jpg';
                    }
                ?>
                    <li>
                      <div class="image"><img src="<?php echo $video_thumb; ?>" alt=""></div>
                    </li>
                <?php 
                  endforeach;
                ?>
              </ul>
            </div><!-- inner_sp -->
          </div>

          <div id="course_head">
            <div class="innerSP">
              <h1 class="page_title"><?php echo $course_info->merchandise_name; ?></h1>
              <p class="sub_title"><?php echo $course_info->sub_name; ?></p>
              <ul class="meta">
                <li>講師：<?php echo $course_info->teacher_name; ?></li>
                <li>教材提供：<?php echo $course_info->teaching_material_company; ?></li>
                <li>最終更新：<?php echo $course_info->last_updated; ?></li>
                <li>言語：<?php echo $course_info->last_updated;//言語なし ?></li>
              </ul>
            </div>
          </div>


          <div id="merchandise">
            <div class="innerSP">
              <?php
                $img_url = $base_img_url . $course_info->icon_image;
                $sagaku =  $course_info->tuition - $course_info->discount_price;
                $percent = floor(($sagaku / $course_info->tuition) * 100);
              ?>
              <div class="nonSP">
                <div class="image m_thumb"><img src="<?php echo $img_url; ?>" alt="<?php echo $course_info->merchandise_name; ?>">
                </div>
              </div>
              <div class="cols">
                <div class="col">
                  <p class="discount_price">&yen;<?php echo number_format($course_info->discount_price); ?></p>
                </div>
                <div class="col">
                  <p class="tuition">&yen;<?php echo number_format($course_info->tuition); ?></p>
                  
                  <p class="percent"><?php echo $percent; ?>%OFF</p>
                </div>
              </div>
              <div class="btn_wrap">
                <a href="<?php echo $course_info->ec_jump_key; ?>" target="_blank" class="btn_course is_red"><span class="notosans">お申し込み手続き</span></a>

                <div class="nonSP">
                  <h3 class="big_title">コース概要</h3>
                  <ul id="gaoyou" class="course_gaiyou">
                    <li class="icon time">学習時間の目安：<?php echo $course_info->attendance_time;?></li>
                    <li class="icon count">総単元数：<?php echo $course_info->unit_count;?>件</li>
                    <li class="icon period">受講期間：<?php echo $course_info->course_period;?></li>
                    <li class="icon certificate">修了証明書発行</li>
                    <li class="icon mobile">PC、モバイルにて視聴可</li>
                  </ul>
                </div>
              </div>
            </div>
          </div>

          <div id="tags">
            <div class="innerSP">
              <ul>
                <li>
                  <a href="#modal_share" class="btn_course is_share"><span>シェア</span></a>
                </li>
                <?php 
                  if (isset($course_info->tag_list)) :
                    $tags = $course_info->tag_list;
                    foreach($tags as $tag) :
                ?>
                    <li>
                      <a href="<?php echo home_url() ?>/tag/<?php echo $tag->slug; ?>" class="btn_course"><span><?php echo $tag->name ?></span></a>
                    </li>
                <?php
                    endforeach;
                  endif;
                ?>
              </ul>
            </div>
          </div>
        </div>
      </div>


      <div class="contents_body">
        <div class="cb_inner">
          <div class="innerSP">

            <h2 id="detail_title" class="detail_title">コースの詳細</h2>

            <h3 class="mid_title">対象者</h3>
            <?php if (isset($course_info->tag_list)) : ?>
              <ul class="target_person">
                <?php 
                  $persons = $course_info->target_person;
                  foreach($persons as $person) :
                    echo '<li>' . $person . '</li>';
                  endforeach;
                ?>
              </ul>
            <?php  endif; ?>


            
            <div class="box_blue">
              <h3 class="mid_title">このコースで身につくスキル</h3>
              <?php if (isset($course_info->skill)) : ?>
                <ul class="skills">
                  <?php 
                    $skills = $course_info->skill;
                    foreach($skills as $skill) :
                      echo '<li>' . $skill . '</li>';
                    endforeach;
                  ?>
                </ul>
              <?php  endif; ?>
            </div>
            


            <h3 class="big_title pc_min">コース概要</h3>
            <div class="forSP">
              <ul id="gaoyou" class="course_gaiyou">
                <li class="icon time">学習時間の目安：<?php echo $course_info->attendance_time;?></li>
                <li class="icon count">総単元数：<?php echo $course_info->unit_count;?>件</li>
                <li class="icon period">受講期間：<?php echo $course_info->course_period;?></li>
                <li class="icon certificate">修了証明書発行</li>
                <li class="icon mobile">PC、モバイルにて視聴可</li>
              </ul>
            </div>
            <div class="text">
              <?php echo $course_info->description;?>
            </div>


            <h3 class="big_title pc_min">ご用意いただく環境</h3>
            <?php if (isset($course_info->preparation)) : ?>
              <ul class="preparations">
                <?php 
                  $preparations = $course_info->preparation;
                  foreach($preparations as $preparation) :
                    echo '<li>' . $preparation . '</li>';
                  endforeach;
                ?>
              </ul>
            <?php  endif; ?>


            <!-- カリキュラム -->
            <div id="curriculum" class="accordion curriculum">
              <div class="cur_title_box">
                <h3 class="big_title">カリキュラム</h3>
                <a href="javascript:void(0)" class="btn_expand">全てのカリキュラム表示</a>
              </div>
              
              <?php if (isset($course_info->curriculum_list)) : ?>
                <ul class="cur_parent">
                  <?php 
                    $curriculums = $course_info->curriculum_list;
                    foreach($curriculums as $idx1 =>$curriculum) :
                  ?>
                    <li>
                      <div class="cur_course_box">
                        <div class="cur_course_head"><?php echo $curriculum->course_name;?></div>
                        <div class="cur_course_content">
                          <ul  class="cur_child">
                            <?php 
                              $childlist = $curriculum->child_list;
                              foreach($childlist as $idx2 =>$child) :
                            ?>
                            <?php echo (($idx1==0) && ($idx2==0)) ? '<li class="is_expand">' : '<li>'; ?>
                              <a href="javascript:void(0)" class="js_accordion"><?php echo $child->child_name;?></a>
                              <?php echo (($idx1==0) && ($idx2==0)) ? '<ul class="cur_list">' : '<ul class="cur_list" style="display:none;">'; ?>
                              <!-- <ul class="cur_list"> -->
                                <?php 
                                  $childlist2 = $child->child_name2;
                                  foreach($childlist2 as $child2) :
                                ?>
                                <li><?php echo $child2;?></li>
                                <?php  endforeach; ?>    
                              </ul>
                            <?php echo '</li>'; ?>
                            <?php  endforeach; ?>
                          </ul>
                        </div>
                      </div>
                    </li>
                  <?php  endforeach; ?>    
                  
                </ul>
              <?php  endif; ?>
            </div>


            <div id="voice">
              <h3 class="big_title pc_min">受講者からの声</h3>
              <?php if (isset($course_info->user_voice)) : ?>
                <ul class="voices">
                  <?php 
                    $voices = $course_info->user_voice;
                    $idx = 0;
                    foreach($voices as $voice) :
                      ++$idx;
                      if ($idx > 3) {
                        echo '<li style="display:none;"><div class="title">' . $voice . '</div></li>';
                      }else{
                        echo '<li><div class="title">' . $voice . '</div></li>';
                      }
                    endforeach;
                  ?>
                </ul>
                <?php if ($idx > 3) : ?>
                  <a href="javascript:void(0)" class="btn_more btn_voice">もっと見る</a>
                <?php endif; ?>
              <?php  endif; ?>
            </div>


            <!-- このコースを含む -->
            <div id="pack">
              <h3 class="big_title">このコースを含むパック</h3>
              <?php if (isset($course_info->pack_list)) : ?>
                <ul class="packs">
                  <?php 
                    $packs = $course_info->pack_list;
                    $idx = 0;
                    foreach($packs as $pack) :
                      ++$idx;
                      if ($idx > 3) {
                        echo '<li class="no_disp">';
                      }else{
                        echo '<li>';
                      }
                      $pack_tags = get_api_tags($pack->merchandise_id);
                  ?>
                      <a href="<?php echo home_url(); ?>?merchandise_id=<?php echo $pack->merchandise_id;?>" >
                        <div class="cols">
                          <div class="image thumb">
                            <img src="<?php echo $base_img_url . $pack->icon_image;?>" class="fit-cover" alt="">
                          </div>
                          <div class="texts">
                            <div class="left_box">
                              <div class="pack_title_box">
                                <p class="pack_title"><?php echo $pack->merchandise_name;?></p>
                                <p class="pack_attendance_time">学習時間の目安：<?php echo $pack->attendance_time;?></p>
                              </div>
                            </div>
                            <div class="right_box">
                              <div class="pack_price_box">
                                <p class="pack_discount_price">&yen;<?php echo number_format($pack->discount_price);?></p>
                                <p class="pack_tuition">&yen;<?php echo number_format($pack->tuition);?></p>
                              </div>
                              <?php if (isset($pack_tags)) : ?>
                                <ul class="list_tags">
                                  <?php 
                                    foreach ($pack_tags as $tag) :
                                      echo '<li>' . $tag->name . '</li>';
                                    endforeach;
                                  ?>
                                </ul>
                              <?php endif; ?>
                            </div>
                          </div>
                        </div>
                      </a>
                  <?php 
                    echo '</li>';
                  endforeach;
                  ?>
                </ul>
                <?php if ($idx > 1) : ?>
                  <a href="javascript:void(0)" class="btn_more btn_pack">もっと見る</a>
                <?php endif; ?>
              <?php else: ?>
                <p class="none">該当がありません。</p>
              <?php  endif; ?>
            </div>


            <!-- オススメ -->
            <div id="recommend">
              <div class="innerSP">
                <h3 class="big_title">その他のおすすめコース</h3>
                <?php if (isset($course_info->recommend_list)) : ?>
                  <ul class="recommend" id="slide_recommend">
                    <?php 
                      $recommends = $course_info->recommend_list;
                      $idx = 0;
                      foreach($recommends as $recommend) :
                        
                        $recommend_tags = get_api_tags($recomend->merchandise_id);
                    ?>
                        <li class="auto">
                          <a href="<?php echo home_url(); ?>?merchandise_id=<?php echo $pack->merchandise_id;?>" >
                            <div class="image thumb">
                              <?php 
                                if ($recommend->icon_image) :
                                  $packimg = $base_img_url . $recommend->icon_image;
                                else:
                                  $packimg = get_template_directory_uri() . '/images/course/noimage.jpg';
                                endif; 
                              ?>
                              <img src="<?php echo $packimg;?>" alt="">
                            </div>
                            <div class="texts">
                              <p class="recommend_title"><?php echo $recommend->merchandise_name;?></p>
                              <p class="recommend_sub_title"><?php echo $recommend->sub_name;?></p>
                              <div class="recommend_price_box">
                                <p class="recommend_discount_price">&yen;<?php echo number_format($recommend->discount_price);?></p>
                                <p class="recommend_tuition">&yen;<?php echo number_format($recommend->tuition);?></p>
                              </div>
                            </div>
                            <?php if (isset($recommend_tags)) : ?>
                              <ul class="list_tags">
                                <?php 
                                  foreach ($recommend_tags as $tag) :
                                    echo '<li>' . $tag->name . '</li>';
                                  endforeach;
                                ?>
                              </ul>
                            <?php endif; ?>
                          </a>
                        </li>
                    <?php 
                     
                    endforeach;
                    ?>
                  </ul>
                <?php else: ?>
                  <p class="none">該当がありません。</p>
                <?php  endif; ?>
              </div>
            </div>

          </div>
        </div>
      </div>
    
    </div>

  </main>
  <!-- SNSシェアモーダル -->
  <div class="remodal" data-remodal-id="modal_share" id="modal_share">
    <button data-remodal-action="close" class="remodal-close"></button>
    <h1 class="modal_title"><span class="icon"><img src="<?php echo get_template_directory_uri() . '/images/course/icon_share2.svg'; ?>" alt=""></span><span>このコースを共有</span></h1>
    <div class="modal_url_wrap">
      <input type="text" class="modal_url" placeholder="ここに文字を書いてね" value="<?php echo get_permalink(); ?>" />
      <span class="btn_copy">コピー</span>
    </div>

    <!-- Your share button code -->
    <div class="pc_cols">
      <ul class="sns_modal_btns">
        <li class="facebook">
          <a href="javascript:window.open('http://www.facebook.com/sharer.php?u='+encodeURIComponent(location.href),'sharewindow','width=550, height=450, personalbar=0, toolbar=0, scrollbars=1, resizable=!');"><img src="<?php echo get_template_directory_uri() . '/images/course/icon_facebook.svg'; ?>" alt=""></a>
        </li>
        <li class="twitter">
          <a href="javascript:window.open('http://twitter.com/share?text='+encodeURIComponent(document.title)+'&url='+encodeURIComponent(location.href),'sharewindow','width=550, height=450, personalbar=0, toolbar=0, scrollbars=1, resizable=!');"><img src="<?php echo get_template_directory_uri() . '/images/course/icon_twitter.svg'; ?>" alt=""></a><script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
        </li>
      </ul>
      <div class="align_right_pc btnWrap">
        <button data-remodal-action="cancel" class="remodal-cancel">閉じる</button>
      </div>
    </div>
    
    
    
    <!-- <button data-remodal-action="confirm" class="remodal-confirm">OK</button> -->
  </div>




  <?php get_template_part('parts_site_footer'); ?>
<?php get_footer(); ?>