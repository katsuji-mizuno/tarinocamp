<?php
/**
 * Template Name: コースcategory検索結果(template)
 */
?>
<?php remove_action( 'wp_head', '_wp_render_title_tag', 1 ); //タイトルタグを出力しない ?>

<?php get_header(); ?>
<?php
//---------------------------------------
//カテゴリ情報取得関数
//--------------------------------------
// (引数)
// 階層1のスラッグ：prm_cate1_slug (文字)
// 階層2のスラッグ：prm_cate2_slug (文字)
// 階層3のスラッグ：prm_cate3_slug (文字)
// (戻り値)
// カテゴリ情報の配列(ID,Slug,名称,階層)
//---------------------------------------
  global $wp_query;
  $cate_info  = array();
  $q_cate1;
  $q_cate2;
  $q_cate3;

  function gat_category_info($prm_cate1_slug,$prm_cate2_slug,$prm_cate3_slug) {
    global $base_api_url;
    //カテゴリ情報取得
    $cate_url    = $base_api_url . '/categories/';
    $cate_json   = file_get_contents($cate_url);
    $cate_json   = mb_convert_encoding($cate_json, 'UTF8', 'ASCII,JIS,UTF-8,EUC-JP,SJIS-WIN');
    $cate_obj    = json_decode( $cate_json ) ; //オブジェクト変換

    $tmp_cate_list;
    if ($cate_obj->result !== 'ng') {
      //階層判定

      if (isset($prm_cate3_slug)) {
        $level = 3;
        $search_slug = $prm_cate3_slug;
        $tmp_cate_list = $cate_obj->category_info->category3_list;
        if (isset($tmp_cate_list)) {
          $keyIndex = array_search($search_slug, array_column($tmp_cate_list, 'category3_slug'),false);
          if ($keyIndex === false) {
            $result = array(
              'category_id' => -1,
              'category_slug' => null,
              'category_name' => null,
              'level' => 3
            );
          }else{
            $cate_list = $tmp_cate_list[$keyIndex];
            $result = array(
              'category_id' => $cate_list->category3_id,
              'category_slug' => $cate_list->category3_slug,
              'category_name' => $cate_list->category3_name,
              'level' => 3
            );
          }

        }else{
          //該当がない場合
          header('HTTP/1.0 404 Not Found');
          include(get_template_directory_uri().'/404.php');
          exit;
        }
      }elseif ($prm_cate2_slug) {
        $level=2;
        $search_slug=$prm_cate2_slug;
        $tmp_cate_list = $cate_obj->category_info->category2_list;
        if (isset($tmp_cate_list)) {
          $keyIndex = array_search($search_slug, array_column($tmp_cate_list, 'category2_slug'),false);
          $cate_list = $tmp_cate_list[$keyIndex];
          if ($keyIndex === false) {
            $result = array(
              'category_id' => -1,
              'category_slug' => null,
              'category_name' => null,
              'level' => 2
            );
          }else{
            $result = array(
              'category_id' => $cate_list->category2_id,
              'category_slug' => $cate_list->category2_slug,
              'category_name' => $cate_list->category2_name,
              'level' => 2
            );
          }
        }
      }else{

        $level = 1;
        $search_slug = $prm_cate1_slug;
        $tmp_cate_list = $cate_obj->category_info->category1_list;

        if (isset($tmp_cate_list)) {
          $keyIndex = array_search($search_slug, array_column($tmp_cate_list, 'category1_slug'),false);
          if ($keyIndex === false) {
            $result = array(
              'category_id' => -1,
              'category_slug' => null,
              'category_name' => null,
              'level' => 1
            );
          }else{
            $cate_list = $tmp_cate_list[$keyIndex];
            $result = array(
              'category_id' => $cate_list->category1_id,
              'category_slug' => $cate_list->category1_slug,
              'category_name' => $cate_list->category1_name,
              'level' => 1
            );
          }
        }
      }
    }

    return $result;
  }
//---------------------------------------
//商品一覧（カテゴリ）取得関数
//--------------------------------------
//(引数) 階層：prm_level (number),カテゴリID：prm_cate_id
//(戻り値) course_listの配列
//---------------------------------------
  function get_api_search_category($prm_level,$prm_cate_id) {
    global $base_api_url;
    if ($prm_cate_id) {
      $srch_cate_url    = $base_api_url . '/merchandise/search/?category_level='.$prm_level.'&category=' . $prm_cate_id;
      $srch_cate_json   = file_get_contents($srch_cate_url);
      $srch_cate_json   = mb_convert_encoding($srch_cate_json, 'UTF8', 'ASCII,JIS,UTF-8,EUC-JP,SJIS-WIN');
      $srch_cate_obj    = json_decode( $srch_cate_json ) ; //オブジェクト変換
      $tmp_course_list;
      if ($srch_cate_obj->result !== 'ng') {
        $tmp_course_list = $srch_cate_obj->course_info;
      }
      return $tmp_course_list;
    }
  }
?>

<?php
  /*************************
  商品情報の取得
  *************************/

  //パラメータの生成

  if ($wp_query->query_vars['category1_slug']) {
    $q_cate1 = $wp_query->query_vars['category1_slug'];
  }
  if ($wp_query->query_vars['category2_slug']) {
    $q_cate2 = $wp_query->query_vars['category2_slug'];
  }
  if ($wp_query->query_vars['category3_slug']) {
    $q_cate3 = $wp_query->query_vars['category3_slug'];
  }
  $cate_info  = gat_category_info( $q_cate1 , $q_cate2 , $q_cate3);

  $cate_id    = $cate_info['category_id'];
  $cate_slug  = $cate_info["category_slug"];
  $cate_name  = $cate_info["category_name"];
  $cate_level = $cate_info["level"];


  $course_list = array();
  $course_list = get_api_search_category( $cate_level,$cate_id );

  echo '<title>カテゴリー：' . $cate_name .' | '. get_bloginfo('name') .'</title>'."\n";
  echo  '<meta property="og:title" content="カテゴリー：'. $cate_name .' | '. get_bloginfo('name') .'">'."\n";

  echo '<meta name="description" content="コースをカテゴリ「'. $cate_name .'」で検索した結果です。">'."\n";
  echo '<meta property="og:description" content="コースをカテゴリ「'. $$cate_name .'」で検索した結果です。">'."\n";

?>
<!-- match_height -->
<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/matchHeight-min.js"></script>

<!-- for Page -->
<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/css/courselist.css" media="all" />
<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/jpages.min.js"></script>
<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/courselist.js"></script>

</head>

<body id="pageCourseList" data-merchandise-id="<?php echo $course_info->merchandise_id; ?>">

  <?php get_template_part('parts_site_header'); ?>

  <main class="contents hiragino" <?php if ((!isset($course_list)) && (is_null($cate_name))) echo 'style="background:#efefef;"'; ?>>

    <!-- パンくず -->
    <div id="breadcrumb">
      <div class="inner">
        <ul class="breadlist hiragino">
          <li><a href="<?php echo home_url(); ?>">ホーム</a></li>
          <li><span>検索結果</span></li>
        </ul>
      </div>
    </div>

    <?php if (isset($course_list)) : ?>


      <!-- ページヘッダー -->
      <div class="contents_head">
        <div class="inner">
          <h1 class="page_title">「<span id="search_name"><?echo $cate_name; ?></span>」の検索結果<br class="forSP"><span id="search_count"><?php echo isset($course_list) ? count($course_list) : 0; ?></span>件が見つかりました</h1>
          <p class="h_lead"><span class="ph_icon"><img src="<?php echo get_template_directory_uri(); ?>/images/courselist/icon-search.svg" alt="search"></span>スキルアップに必要なコースは<br class="forSP"><!-- <a href="<?php echo home_url(); ?>" class=>コースマップ一覧</a> --><a href="javascript:void(0)" class="is_disable">コースマップ一覧</a>からもお探しいただけます</p>
        </div>
      </div>


      <?php
        //共通部分(一覧、法人)
        include_once("parts_search_list.php");
      ?>
    <?php else: ?>
      <?php if($cate_name) : ?>
          <div class="contents_head">
            <div class="inner">
              <h1 class="page_title">「<span id="search_name"><?echo $cate_name; ?></span>」の検索結果<br class="forSP"><span id="search_count"><?php echo isset($course_list) ? count($course_list) : 0; ?></span>件が見つかりました</h1>
              <p class="h_lead"><span class="ph_icon"><img src="<?php echo get_template_directory_uri(); ?>/images/courselist/icon-search.svg" alt="search"></span>スキルアップに必要なコースは<br class="forSP"><!-- <a href="<?php echo home_url(); ?>" class=>コースマップ一覧</a> --><a href="javascript:void(0)" class="is_disable">コースマップ一覧</a>からもお探しいただけます</p>
            </div>
          </div>
          <div class="contents_body">
            <div class="inner">
              <div class="section align_center">
                該当する項目がありませんでした。
              </div>
            </div>
          </div>

      <?php else: ?>
          <div id="not_found">
            <div class="inner">
              <h1>404</h1>
              <p class="lead">Not Found.<br class="sp_tab"><span> ー お探しのカテゴリは見つかりませんでした。 ー </span></p>
              <p class="text">
                申し訳ございません。アクセスしたページは削除されたか、URLが間違っている可能性がございます。<br>
                大変お手数ですが、下部のトップボタンを押して本サイトにお戻りください。
              </p>
            </div>
            <p class="totop"><a class="btn404goTop" href="<?php echo home_url(); ?>">トップに戻る</a></p>
            </div>
          </div>
      <?php endif; ?>
    <?php endif; ?>

    <!-- 法人のお客様リンク -->
    <?php get_template_part('parts_biz'); ?>
  </main>



  <?php get_template_part('parts_site_footer'); ?>
<?php get_footer(); ?>