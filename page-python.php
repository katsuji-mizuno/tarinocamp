<?php //remove_action( 'wp_head', '_wp_render_title_tag', 1 ); //タイトルタグを出力しない ?>

<?php get_header(); ?>
<!-- for Meta -->
<meta name="description" content='TRAINOCAMP（トレノキャンプ）オンライン学習サービスの特定商取引法に基づく表記'>
<meta property='og:description' content='TRAINOCAMP（トレノキャンプ）オンライン学習サービスの特定商取引法に基づく表記。'>
<!-- for Page -->
<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/css/python.css" media="all" />

</head>

<body id="pageRequirements">

  <?php get_template_part('parts_site_header'); ?>

  <main class="contents hiragino">

    <!-- パンくず -->
    <div id="breadcrumb">
      <div class="inner">
        <ul class="breadlist hiragino">
          <li><a href="<?php echo home_url(); ?>">ホーム</a></li>
          <li><a href="<?php echo home_url(); ?>/map/">コースマップ一覧</a></li>
          <li><span>Pythonコースマップ</span></li>
        </ul>
      </div>
    </div>

    <!-- ページヘッダー -->
    <div class="contents_head">
      <div class="python_image">
          <img src="<?php echo get_template_directory_uri(); ?>/images/map/python_head_pc.jpg" alt="" class="js_image_switch">
      </div>
      <div class="python_catch">
        TRAINOCAMPのPythonコースは実務と試験対策の両面を押さえています。適切な順序で受講することで、効率よく初心者がスキル習得できるようカリキュラムが調整されています。動画解説だけでなく、実際にコーディングして動かすハンズオン、模擬試験までTRAINOCAMPだけですべてをご用意しました。これからプログラミングを始めたい、実務に役立てたい方におすすめのコースです。Pythonエンジニア育成推進協会の認定スクールによる一段上のeラーニングをご体験ください。
      </div>
      <div class="python_logo">
        <img src="<?php echo get_template_directory_uri(); ?>/images/map/python_logo.png" alt="" class="js_image_switch">
      </div>
    </div>

    <div class="contents_body">

      <div class="inner">
        <div class="python_tit">Pythonプログラミング</div>
        <div class="python_note">
          Pythonプログラミングを初めて学習する方にお勧め。試験対策も押さえた体系的な学習で効率的に学習できます。<br />文法、演習、ハンズオン、ライブラリ活用などバランスよく学習できるカリキュラムです。<br />
		<a href="<?php echo home_url(); ?>/course/detail/32/">TRAINOCAMPベーシックパック)-ITエンジニアの必須コースを網羅-(30日間)</a>
			以下のコースを含むお得なキャンペーンパックをご利用ください。</div>

        <div class="python_tree">
          <div class="python_tree_basis">
            <div class="python_tree_tit">Python プログラミング 基礎</div>
            <div class="python_tree_text line">
              <div class="python_tree_text_l">
				  <a href="<?php echo home_url(); ?>/course/detail/30/">Python本格入門シリーズ①<br />-データ構造とアルゴリズム-<br />(Python 3 エンジニア認定基礎試験対応)</a>
              </div>
              <div class="python_tree_text_s">Pythonによるアルゴリズムの学習を試験対策も踏まえながら進めます</div>
            </div>
            <div class="python_tree_text line">
              <div class="python_tree_text_l nolink">
                <a href="<?php echo home_url(); ?>/course/detail/31/">Python本格入門シリーズ②<br />-オブジェクト指向プログラミング-<br />(Python 3 エンジニア認定基礎試験対応)</a>   
              </div>
              <div class="python_tree_text_s">デモンストレーション、ハンズオンでオブジェクト指向をじっくり習得</div>
            </div>
          </div>
        </div>
      </div>

      <div class="inner">
        <div class="course_register">
        <a href="https://camp-lms.trainocate.co.jp/rpv/signup/">会員登録して無料の模擬試験を受ける</a>
        </div>
      </div>

      <div class="inner">
        <div class="python_tit">データ分析</div>
        <div class="python_note">
          データ分析に関わる基礎項目を網羅的に学習できます。文系からでも理解できる、データ分析、機械学習の理解に必須となる数学の学習、Pythonによる図形の描画方法、各種必須ライブラリの活用方法などを扱います。
          <a href="<?php echo home_url(); ?>/course/detail/8/">データ分析完全パック【データ分析シリーズ 1～3パック】</a>
			データ分析・機械学習に必要な数学から、Pythonプログラミング、図形描画、scikit-learnなどのライブラリまでPythonによるデータ分析に関する基本をすべて網羅したコースパックです。
        </div>

        <div class="python_tree_else">
          <div class="python_tree_else_left">
            <div class="python_tree_tit">データ分析　基礎</div>
            <div class="python_tree_text line">
              <div class="python_tree_text_l"><a href="<?php echo home_url(); ?>/course/detail/9/">データ分析シリーズ①<br />AI数学<br />-文系でも理解できる!高校から始めるデータ分析、AIのための数学-</a></div>
              <div class="python_tree_text_s">文系の方でも理解できる丁寧な導入とAI理解のための無駄のないカリキュラム</div>
            </div>
            <div class="python_tree_text line">
              <div class="python_tree_text_l"><a href="<?php echo home_url(); ?>/course/detail/10/">データ分析シリーズ②<br />Pythonプログラミングの基礎と図形描画</a></div>
              <div class="python_tree_text_s">Pythonが初めてでも理解できる基本文法とデータ分析のための基本</div>
            </div>
            <div class="python_tree_text">
              <div class="python_tree_text_l"><a href="<?php echo home_url(); ?>/course/detail/11/">データ分析シリーズ③<br />Pythonライブラリの実践活用</a></div>
              <div class="python_tree_text_s">データベースのテストからmockitoの利用まで扱います</div>
            </div>
          </div>
          <div class="python_tree_else_right">
            <div class="python_tree_tit">データベース</div>
            <div class="python_tree_text">
              <div class="python_tree_text_l"><a href="<?php echo home_url(); ?>/course/detail/21/">はじめてのデータベース(MySQL)<br />-仕組みの理解とSQL-</a></div>
              <div class="python_tree_text_s">データ分析に欠かせないデータベースに関する知識を習得。<br />データ操作のためのSQLという言語をハンズオンで学習</div>
            </div>
            <div class="python_tree_tit">機械学習</div>
            <div class="python_tree_text line">
              <div class="python_tree_text_l"><a href="<?php echo home_url(); ?>/course/detail/12/">Pythonを動かして理解する機械学習<br />-回帰と分類-</a></div>
              <div class="python_tree_text_s">機械学習の中でも教師あり学習の仕組みをPythonを使って完全把握値の予測をする回帰からデータが属するクラスを予測する分類まで</div>
            </div>
          </div>
        </div>
      </div>

      <div class="inner">
        <div class="course_register">
        <a href="https://camp-lms.trainocate.co.jp/rpv/signup/">会員登録して無料の模擬試験を受ける</a>
        </div>
      </div>

      <div class="inner">
        <div class="framework_tit">試験について</div>
        <div class="python_note">
          Pythonには、一般社団法人Pythonエンジニア育成推進協会が実施している理解度を確認する試験があります。<br />エンジニアを目指すうえで必要な知識、スキルをバランスよく身に着けることができます。資格対策をとりながら学習することをおすすめします。
        </div>
        <div class="framework_table">
          <table>
            <tr>
              <th>試験名</th>
              <th>内容、出題範囲</th>
            </tr>
            <tr>
              <td>Python 3 エンジニア認定<br />基礎試験</td>
              <td>データ構造や入出力など、Pythonの基本的な項目からクラスやライブラリなどの知識を確認します。入門者が目指すのに最適な難易度になっています。<br />対策コースのご案内：
                Pythonプログラミングコンプリートパック(Python基礎試験対応) 2021年11月提供予定<br />
                <br />※試験対策には合わせて公式本もチェックしましょう
              </td>
            </tr>
            <tr>
              <td>Python 3 エンジニア認定<br />データ分析試験</td>
              <td>データ分析に関わる数学の理解から、各種ライブラリの知識が問われます。Numpy, pandas Matplotlib, scikit-learnなどデータ分析に定番のライブラリを中心に出題されます。<br />
                対策コースのご案内：
                <a href="<?php echo home_url(); ?>/course/detail/12/">データ分析完全パック シリーズ①～③(Python 3 エンジニア認定データ分析試験対応)</a>
                <br />※試験対策には合わせて公式本もチェックしましょう
              </td>
            </tr>
          </table>
        </div>
      </div>
    </div>

  <!-- 受講の方法 -->
  <?php get_template_part('parts_howto'); ?>


  <!-- 法人のお客様リンク -->
  <?php get_template_part('parts_biz'); ?>
  </main>


  <?php get_template_part('parts_site_footer'); ?>
<?php get_footer(); ?>
