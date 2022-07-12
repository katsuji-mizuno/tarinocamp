<?php //remove_action( 'wp_head', '_wp_render_title_tag', 1 ); //タイトルタグを出力しない ?>

<?php get_header(); ?>
<!-- for Meta -->
<meta name="description" content='TRAINOCAMP（トレノキャンプ）オンライン学習サービスの特定商取引法に基づく表記'>
<meta property='og:description' content='TRAINOCAMP（トレノキャンプ）オンライン学習サービスの特定商取引法に基づく表記。'>
<!-- for Page -->
<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/css/java.css" media="all" />

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
          <li><span>Javaコースマップ</span></li>
        </ul>
      </div>
    </div>


    <!-- ページヘッダー -->
    <div class="contents_head">
      <div class="java_text">
        <div class="java_text_catch">
          <img src="<?php echo get_template_directory_uri(); ?>/images/map/java_head_pc.jpg" alt="" class="js_image_switch">
        </div>
        <div class="java_text_detail pc">
          Javaは業務系システム開発、WEBアプリケーション、Androipアプリ、などに使われ、汎用性が高く、世界的に人気の言語です。ITエンジニア/プログラマを目指す方がしっかりと学習するのにJavaをおすすめします。中途半端なところで学習が終らない、充実のカリキュラムは他の学習サービスと比べてみてください。
        </div>
      </div>
      <div class="java_image">
        <img src="<?php echo get_template_directory_uri(); ?>/images/map/java_mv.png" alt="">
      </div>
    </div>

    <div class="java_text_detail sp">
      Javaは業務系システム開発、WEBアプリケーション、Androipアプリ、などに使われ、汎用性が高く、世界的に人気の言語です。ITエンジニア/プログラマを目指す方がしっかりと学習するのにJavaをおすすめします。中途半端なところで学習が終らない、充実のカリキュラムは他の学習サービスと比べてみてください。
    </div>

    <div class="contents_body">

      <div class="inner">
        <div class="java_tit">Javaプログラミング</div>
        <div class="java_note">プログラミングのカリキュラムでは、学習の順序を重視しています。初心者の方は、Javaプログラミングのすべてのコースをマップに合わせて受講してください。体験的にコードを書いてみるファーストステップから理論や演習に取り組む本格入門へ向かうことで、スキルを確実に定着させます。おすすめの受講順序は「Javaプログラミング基礎」⇒「データベース」⇒「javaプログラミング実践」⇒「業務ツール」です。</div>
		  <div class="java_note space"><a href="<?php echo home_url(); ?>/course/detail/27/">Javaエンジニア完全パック -実務に必要なスキルを網羅-</a></div>
		  <div class="java_note">以下の基礎コースを全て網羅したキャンペーンパックです。就職/実務に必要なすべての項目を詰め込みました。コースマップに従い学習を進めましょう。
</div>
		  <div class="java_tree">
          <div class="java_tree_basis">
            <div class="java_tree_tit">Java プログラミング 基礎</div>
            <div class="java_tree_text line">
              <div class="java_tree_text_l"><a href="https://camp-lms.trainocate.co.jp/rpv/signup/">絶対につまずかない！<br />Javaプログラミング ファーストステップ（無料提供）</a></div>
              <div class="java_tree_text_s">必要最低限の文法学習でクイズアプリを作る。<br />プログラミング体験を通じて本格学習に備えるという最初のステップです</div>
            </div>
            <div class="java_tree_text line">
              <div class="java_tree_text_l"><a href="<?php echo home_url(); ?>/course/detail/24/">Javaプログラミング本格入門シリーズ①<br />-データ構造とアルゴリズム-</a></div>
              <div class="java_tree_text_s">Javaの基本項目を網羅したコースです。文法解説、演習、ハンズオン、チェックテスト</div>
            </div>
            <div class="java_tree_text">
              <div class="java_tree_text_l"><a href="<?php echo home_url(); ?>/course/detail/25/">Javaプログラミング本格入門シリーズ②<br />-オブジェクト指向プログラミング-</a></div>
              <div class="java_tree_text_s">オブジェクト指向の概念を丁寧に解説。開発必須のスキルを習得します。</div>
            </div>
          </div>
          <div class="java_tree_line">
            <img src="<?php echo get_template_directory_uri(); ?>/images/map/java_line.png" alt="">
          </div>

          <div class="java_tree_else">
            <div class="java_tree_else_left">
              <div class="java_tree_tit">Java プログラミング 実践</div>
              <div class="java_tree_text line">
                <div class="java_tree_text_l"><a href="<?php echo home_url(); ?>/course/detail/26/">Javaで開発する<br />コンソールアプリケーション</a></div>
                <div class="java_tree_text_s">要求仕様書、DBスキーマ設計書、詳細設計書などを用いて簡単なアプリケーションを開発</div>
              </div>
              <div class="java_tree_text line">
                <div class="java_tree_text_l"><a href="<?php echo home_url(); ?>/course/detail/19/">JUnit5シリーズ①<br />ユニットテスト基礎</a></div>
                <div class="java_tree_text_s">ユニットテストの基本概念からテストコードの記述方法を習得</div>
              </div>
              <div class="java_tree_text">
                <div class="java_tree_text_l"><a href="<?php echo home_url(); ?>/course/detail/20/">JUnit5シリーズ②<br />ユニットテスト実践</a></div>
                <div class="java_tree_text_s">データベースのテストからmockitoの利用まで扱います</div>
              </div>
              <p>「Javaプログラミング実践」が終ったら、いよいよ具体的な開発を経験してみましょう。「Spring」の受講に進みましょう。</p>
            </div>
            <div class="java_tree_else_right">
              <div class="java_tree_tit">データベース</div>
              <p>デプログラミングの学習にはデータベースのスキル習得が欠かせません。<br />「Javaプログラミング基礎」習得後に先に受講しましょう</p>
              <div class="java_tree_text">
                <div class="java_tree_text_l"><a href="<?php echo home_url(); ?>/course/detail/21/">はじめてのデータベース(MySQL)</a></div>
                <div class="java_tree_text_s">データ分析に欠かせないデータベースに関する知識を習得データ操作のためのSQLという言語をハンズオンで学習</div>
              </div>
              <div class="java_tree_tit">業務ツール</div>
              <p>Gitはバージョン管理ツールといって、コードをある状態にまで戻したり、他社と協業したりするのに必須のツールです。<br />プログラミングの学習と合わせて習得する必要があります。</p>
              <div class="java_tree_text line">
                <div class="java_tree_text_l"><a href="<?php echo home_url(); ?>/course/detail/16/">Git/Githubシリーズ①<br />Gitの基本操作</a></div>
                <div class="java_tree_text_s">SourceTreeとコマンド操作の両方でGitを操作できるようになる</div>
              </div>
              <div class="java_tree_text">
                <div class="java_tree_text_l"><a href="<?php echo home_url(); ?>/course/detail/17/">Git/Githubシリーズ②<br />Git/Githubの実践活用</a></div>
                <div class="java_tree_text_s">プルリクエストなどのGithubの操作方法を習得</div>
              </div>
            </div>
          </div>
        </div>
      </div>


      <div class="inner">
          <div class="course_register">
          <a href="https://camp-lms.trainocate.co.jp/rpv/external/user_regist.aspx?k=ZiMY2oT6IXWMiMe9gVl7MDlYUzOTO9y9TFwhTdGqGVaFftUDRTJzjiHtQ1xJAP%2f0">会員登録して無料のコンテンツを受講する</a>
          </div>
        </div>


        <div class="inner">
          <div class="java_tit">Spring</div>
          <div class="java_note">SpringはJavaの人気フレームワークです。本格的にWEBシステムの開発を体験したい方や、プログラミングスキルをさらに高めたい方におすすめの学習項目です。
          </div>
          <div class="java_note space2"><a href="<?php echo home_url(); ?>/course/detail/33/">TRAINOCAMPプレミアムパック-専門コースを含むコンプリート版-(30日間)</a></div>
          <div class="java_note">以下のコースを網羅したお得なプレミアプパックをお勧めします。</div>

          <div class="java_tree">
            <div class="java_tree_basis">
              <div class="java_tree_tit">Springフレームワーク、Spring Boot</div>
              <div class="java_tree_text line">
                <div class="java_tree_text_l"><a href="<?php echo home_url(); ?>/course/detail/4/">Springシリーズ① Spring入門<br />-お問い合わせ機能の開発-</a></div>
                <div class="java_tree_text_s">Springへの丁寧な導入から、Springの基礎、<br />DI(Dependency Injection)まで丁寧に解説</div>
              </div>
              <div class="java_tree_text line">
                <div class="java_tree_text_l"><a href="<?php echo home_url(); ?>/course/detail/6/">Springシリーズ②<br />-ToDo機能開発とAOP-</a></div>
                <div class="java_tree_text_s">ToDoアプリを作りながら実践に慣れる。<br />AOP(Aspect of Programming)の知識も習得</div>
              </div>
              <div class="java_tree_text line">
                <div class="java_tree_text_l"><a href="<?php echo home_url(); ?>/course/detail/7/">Springシリーズ③ O/Rマッピングツール<br />MyBatisによるデータベース操作</a></div>
                <div class="java_tree_text_s">Springでよく使われる定番ツール(MyBatis)によるデータベース操作を学習</div>
              </div>
              <div class="java_tree_text line">
                <div class="java_tree_text_l nolink">Springシリーズ④ WEB APIを学ぶ<br />-RESTful WEBサービスの構築-(2021年11月提供予定)</div>
                <div class="java_tree_text_s">WEB APIを公開する方法を学習します。<br />データ連携に使われる技術です。</div>
              </div>
            </div>
          </div>
        </div>


      <div class="inner">
        <div class="framework_tit">ツール、フレームワークについて</div>
        <div class="java_note">開発に必要なのはプログラミングスキルだけではありません。開発に関わる、各種ツールやソフト、フレームワークなどの知識や経験も求められます。TRAINOCAMPのJavaコースマップでは、実務で困らないように、それらも併せて習得できるようカリキュラムに組み込んでいます。</div>
        <div class="framework_table">
          <table>
            <tr>
              <th>ツール、<br />フレームワーク</th>
              <th>説明</th>
            </tr>
            <tr>
              <td>JUnit</td>
              <td>データ構造や入出力など、Pythonの基本的な項目からクラスやライブラリ開発者は、プログラムで機能を作った後に、単体テスト(ユニットテスト)というものを行います。
                それによりコードの品質が高まります。JUnitはそれらを行うためのフレームワークです。<br />
                対策コースのご案内：
                <a href="<?php echo home_url(); ?>/course/detail/18/">Javaで学習するユニットテスト入門パック ～Junitで理解するテスト手法～</a></td>
            </tr>
            <tr>
              <td>MySQL</td>
              <td>MySQLは、オープンソースソフトウェアといって自由に使用したり、変更できるデータベース管理システムです。世界的にも人気のデータベースで、自身のPCにも簡単にインストールできます。<br />
                対策コースのご案内：
                <a href="<?php echo home_url(); ?>/course/detail/21/">はじめてのデータベース(MySQL)</a></td>
            </tr>
            <tr>
              <td>Git/Github</td>
              <td>Gitは変更履歴を記録、追跡するツールです。これにより、簡単にプログラムを元の状態に戻すなど行うことができます。また、協業にも役立つ開発業務の必須ツールです。<br />
                対策コースのご案内：
                <a href="<?php echo home_url(); ?>/course/detail/14/">Git/Github入門パック ～基礎から学習するバージョン管理～</a></td>
            </tr>
            <tr>
              <td>Spring</td>
              <td>SpringはWEB開発などの便利な機能を提供するフレームワークです。本格的な開発の方法を学習されたい方のために初心者から理解できる丁寧なカリキュラムを用意しました。<br />
              対策コースのご案内：
              <a href="<?php echo home_url(); ?>/course/detail/5/">Springパック 現場で活かせるWebシステム開発(Spring編)</a></td>
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
