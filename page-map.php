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
      <div class="inner tit">
        <h1 class="page_title">コースマップ一覧</h1>
        <p class="h_lead">学習内容の定着、応用力を高めるには、正しい順序で学習を進めていくことが大切です<br />
          つまずかず学習できる、スキル習慣に最短のマップを確認してください</p>
      </div>
    </div>

    <div class="contents_body">
      <div class="inner">
        <h2>コースマップ</h1>
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

      <div class="inner">
        <h2>コース一覧</h1>
        <div class="course_list_tit first">Javaエンジニア</div>
        <ul class="course_list">
          <li>
            <h3>Java</h3>
            <ul>
              <li>
                <a href="<?php echo home_url(); ?>/course/detail/27/"><p>Javaエンジニア完全パック -実務に必要なスキルを網羅-</p></a><span>40時間</span>
              </li>
              <li>
                <a href="<?php echo home_url(); ?>/course/detail/26/"><p>Javaで開発するコンソールアプリケーション-開発工程とドキュメントを学ぶ-</p></a><span>5時間</span>
              </li>
              <li>
                <a href="<?php echo home_url(); ?>/course/detail/18/"><p>Javaで学習するユニットテスト入門 ～JUnitで理解するテスト手法～</p></a><span>8時間</span>
              </li>
            </ul>
          </li>
          <li>
            <h3>Spring</h3>
            <ul>
              <li>
                <a href="<?php echo home_url(); ?>/course/detail/5/"><p>現場で活かせるWebシステム開発（Spring編）【Springシリーズ 1～3パック】</p></a><span>15時間</span>
              </li>
              <li>
                <a href="<?php echo home_url(); ?>/course/detail/4/"><p>Springシリーズ① Spring入門-お問い合わせ機能の開発-</p></a><span>5時間</span>
              </li>
              <li>
                <a href="<?php echo home_url(); ?>/course/detail/6/"><p>Springシリーズ②～ToDo機能開発とAOP～</p></a><span>5時間</span>
              </li>
              <li>
                <a href="<?php echo home_url(); ?>/course/detail/7/"><p>Springシリーズ③ ～O/Rマッピングツール MyBatisによるデータベース操作～</p></a><span>5時間</span>
              </li>
            </ul>
          </li>
        </ul>

        <div class="course_list_tit">Pythonエンジニア</div>
        <ul class="course_list">
          <li>
            <h3>Python</h3>
            <ul>
              <li>
                <a href="<?php echo home_url(); ?>/course/detail/30/"><p>Python本格入門シリーズ① データ構造とアルゴリズム</p></a><span>8時間</span>
              </li>
              <li>
                <a href="<?php echo home_url(); ?>/course/detail/31/"><p>Python本格入門シリーズ② オブジェクト指向プログラミング</p></a><span>7時間</span>
              </li>
            </ul>
          </li>
          <li>
            <h3>データ分析・機械学習</h3>
            <ul>
              <li>
                <a href="<?php echo home_url(); ?>/course/detail/8/"><p>データ分析完全パック（Python 3 エンジニア認定データ分析試験対応）【データ分析シリーズ 1～3パック】</p></a><span>15時間</span>
              </li>
              <li>
                <a href="<?php echo home_url(); ?>/course/detail/9/"><p>データ分析シリーズ① AI数学 ～文系でも理解できる!高校から始めるデータ分析、AIのための数学～</p></a><span>5時間</span>
              </li>
              <li>
                <a href="<?php echo home_url(); ?>/course/detail/10/"><p>データ分析シリーズ② ～Pythonプログラミングの基礎と図形描画～</p></a><span>5時間</span>
              </li>
              <li>
                <a href="<?php echo home_url(); ?>/course/detail/11/"><p>データ分析シリーズ③ ～Pythonライブラリの実践活用～</p></a><span>5時間</span>
              </li>
              <li>
                <a href="<?php echo home_url(); ?>/course/detail/12/"><p>Pythonを動かして理解する機械学習 ～回帰と分類～</p></a><span>10時間</span>
              </li>
            </ul>
          </li>
        </ul>

        <div class="course_list_tit">開発</div>
        <ul class="course_list">
          <li>
            <h3>必須スキル</h3>
            <ul>
              <li>
                <a href="<?php echo home_url(); ?>/course/detail/34/"><p class="new">絶対につまずかないWeb制作/開発</p></a><span>10時間</span>
              </li>
              <li>
                <a href="<?php echo home_url(); ?>/course/detail/21/"><p>はじめてのデータベース ～仕組みの理解とSQL～</p></a><span>5時間</span>
              </li>
              <li>
                <a href="<?php echo home_url(); ?>/course/detail/14/"><p>Git/Github入門 ～基礎から学習するバージョン管理～</p></a><span>8時間</span>
              </li>
            </ul>
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

