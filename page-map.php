<?php //remove_action( 'wp_head', '_wp_render_title_tag', 1 ); //タイトルタグを出力しない ?>

<?php get_header(); ?>
<!-- for Meta -->
<meta name="description" content='TRAINOCAMP（トレノキャンプ）オンライン学習サービスの特定商取引法に基づく表記'>
<meta property='og:description' content='TRAINOCAMP（トレノキャンプ）オンライン学習サービスの特定商取引法に基づく表記。'>
<!-- for Page -->
<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/css/map.css" media="all" />

</head>

<body id="pageRequirements">

  <?php get_template_part('parts_site_header'); ?>

  <main class="contents hiragino">

    <!-- パンくず -->
    <div id="breadcrumb">
      <div class="inner">
        <ul class="breadlist hiragino">
          <li><a href="<?php echo home_url(); ?>">ホーム</a></li>
          <li><span>コースマップ一覧</span></li>
        </ul>
      </div>
    </div>

    <!-- ページヘッダー -->
    <div class="contents_head">
      <div class="inner">
        <h1 class="page_title">コースマップ一覧</h1>
        <p class="h_lead">学習内容の定着、応用力を高めるには、正しい順序で学習を進めていくことが大切です<br />
          つまずかず学習できる、スキル習慣に最短のマップを確認してください</p>
      </div>
    </div>

    <div class="contents_body">
      <div class="inner">
        <ul class="map_menu">
          <li class="map_java">
            <a class="hover_first" href="<?php echo home_url(); ?>/map/java/">
              <div class="map_menu_tit">Javaコースマップ
              <span>Javaエンジニアとして実務に必要な知識を<br />網羅しました</span>
              </div>
            </a>
         </li>
         <li class="map_python">
         <a class="hover_first" href="<?php echo home_url(); ?>/map/python/">
            <div class="map_menu_tit">Pythonコースマップ
            <span>Python協会認定の安心クオリティー<br />資格試験にも対応した効率的ステップ</span>
            </div>
          </a>
         </li>
        </ul>
      </div>
    </div>


  <!-- 受講の方法 -->
  <?php get_template_part('parts_howto'); ?>


  <!-- 法人のお客様リンク -->
  <?php get_template_part('parts_biz'); ?>

  </main>





  <?php get_template_part('parts_site_footer'); ?>
<?php get_footer(); ?>

