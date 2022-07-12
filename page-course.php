<?php remove_action( 'wp_head', '_wp_render_title_tag', 1 ); //タイトルタグを出力しない ?>

<?php get_header(); ?>
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
      $srch_url           = $base_api_url . '/merchandise/search/'; //全件
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

  echo '<title>コース全件 | '. get_bloginfo('name') .'</title>'."\n";
  echo  '<meta property="og:title" content="コース全件 | '. get_bloginfo('name') .'">'."\n";

  echo '<meta name="description" content="コースを全件表示します。">'."\n";
  echo '<meta property="og:description" content="コースを全件表示します。">'."\n";

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

  <main class="contents hiragino">

    <!-- パンくず -->
    <div id="breadcrumb">
      <div class="inner">
        <ul class="breadlist hiragino">
          <li><a href="<?php echo home_url(); ?>">ホーム</a></li>
          <li><span>検索結果</span></li>
        </ul>
      </div>
    </div>


    <!-- ページヘッダー -->
    <div class="contents_head">
      <div class="inner">
        <h1 class="page_title"><span id="search_name">全てのコース</span></h1>
        <p class="h_lead">スキルアップに必要なコースは<br class="forSP"><a href="<?php echo home_url(); ?>">コースマップ一覧</a>からもお探しいただけます</p>
      </div>
    </div>


    <?php
      //共通部分(一覧、法人)
      include_once("parts_search_list.php");
    ?>



  </main>





  <?php get_template_part('parts_site_footer'); ?>
<?php get_footer(); ?>