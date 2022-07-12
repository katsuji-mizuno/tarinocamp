<?php
/**
 * Template Name: コースtag検索結果(template)
 */
?>
<?php remove_action( 'wp_head', '_wp_render_title_tag', 1 ); //タイトルタグを出力しない ?>

<?php get_header(); ?>
<?php 
//---------------------------------------
//商品一覧（タグ）取得関数
//(引数) prm_tag_id (number)
//(戻り値) tag_listの配列
//---------------------------------------
  global $wp_query;
  
  function gat_tag_info($prm_tag_slug) {
    global $base_api_url;
    if ($prm_tag_slug) {
      $tags_url    = $base_api_url . '/tags/';
      $tags_json   = file_get_contents($tags_url);
      $tags_json   = mb_convert_encoding($tags_json, 'UTF8', 'ASCII,JIS,UTF-8,EUC-JP,SJIS-WIN');
      $tags_obj    = json_decode( $tags_json ) ; //オブジェクト変換
      $tmp_tag_list;
      if ($tags_obj->result !== 'ng') {
        $tmp_tag_list = $tags_obj->tag_list;
        if (isset($tmp_tag_list)) {
          $keyIndex = array_search($prm_tag_slug, array_column($tmp_tag_list, 'tag_slug'),true);
          if ($keyIndex === false) {
            $result = array();
          }else{
            $result = $tmp_tag_list[$keyIndex];
          }
        }
      }
      return $result;
    }
  }
//---------------------------------------
//商品一覧（タグ）取得関数
//(引数) タグのID：prm_tag_id(number)
//(戻り値) course_listの配列
//--------------------------------------- 
  function get_api_search_tag($prm_tag_id) {
    global $base_api_url;
    if ($prm_tag_id) {
      $srch_tag_url    = $base_api_url . '/merchandise/search/?tag=' . $prm_tag_id;
      $srch_tag_json   = file_get_contents($srch_tag_url);
      $srch_tag_json   = mb_convert_encoding($srch_tag_json, 'UTF8', 'ASCII,JIS,UTF-8,EUC-JP,SJIS-WIN');
      $srch_tag_obj    = json_decode( $srch_tag_json ) ; //オブジェクト変換
      $tmp_course_list;
      if ($srch_tag_obj->result !== 'ng') {
        $tmp_course_list = $srch_tag_obj->course_info;
      }
      return $tmp_course_list;
    }
  }
?>

<?php 
  /*************************
  商品情報の取得 
  *************************/
  $tag_info = array();
  $q_tag_slug = $wp_query->query_vars['tag_slug'];
  $tag_info = gat_tag_info( $q_tag_slug);
  
  $tag_id   = $tag_info->id; //8;
  $tag_slug = $tag_info->tag_slug; //'data-science';
  $tag_name = $tag_info->name; //'AI データサイエンス';

  $course_list = array();
  $course_list = get_api_search_tag( $tag_id );

  echo '<title>タグ：' . $tag_name .' | '. get_bloginfo('name') .'</title>'."\n";
  echo  '<meta property="og:title" content="タグ：'. $tag_name .' | '. get_bloginfo('name') .'">'."\n";

  echo '<meta name="description" content="コースをタグ「'. $tag_name .'」で検索した結果です。">'."\n";
  echo '<meta property="og:description" content="コースをタグ「'. $$tag_name .'」で検索した結果です。">'."\n";
  
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
          <h1 class="page_title">「<span id="search_name"><?echo $tag_name; ?></span>」の検索結果<br class="forSP"><span id="search_count"><?php echo isset($course_list) ? count($course_list) : 0; ?></span>件が見つかりました</h1>
          <p class="h_lead"><span class="ph_icon"><img src="<?php echo get_template_directory_uri(); ?>/images/courselist/icon-search.svg" alt="search"></span>スキルアップに必要なコースは<br class="forSP"><!-- <a href="<?php echo home_url(); ?>" class=>コースマップ一覧</a> --><a href="javascript:void(0)" class="is_disable">コースマップ一覧</a>からもお探しいただけます</p>
        </div>
      </div>


      <?php 
        //共通部分(一覧、法人)
        include_once("parts_search_list.php"); 
      ?>
    <?php else: ?>
      <?php if($tag_name) : ?>
          <div class="contents_head">
            <div class="inner">
              <h1 class="page_title">「<span id="search_name"><?echo $tag_name; ?></span>」の検索結果<br class="forSP"><span id="search_count"><?php echo isset($course_list) ? count($course_list) : 0; ?></span>件が見つかりました</h1>
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
            <p class="lead">Not Found.<br class="sp_tab"><span> ー お探しのタグは見つかりませんでした。 ー </span></p>
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


  </main>





  <?php get_template_part('parts_site_footer'); ?>
<?php get_footer(); ?>