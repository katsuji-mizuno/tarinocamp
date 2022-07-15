<?php //remove_action( 'wp_head', '_wp_render_title_tag', 1 ); //タイトルタグを出力しない ?>

<?php get_header(); ?>
<!-- for Meta -->
<meta name="description" content='TRAINOCAMP（トレノキャンプ）オンライン学習サービスの特定商取引法に基づく表記'>
<meta property='og:description' content='TRAINOCAMP（トレノキャンプ）オンライン学習サービスの特定商取引法に基づく表記。'>
<!-- for Page -->
<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/lp/tc_clp01/css/style.min.css" media="all" />
<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/lp/tc_clp01/css/style.css" media="all" />



<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/lp/tc_clp01/js/modal.js" defer></script>
<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/lp/tc_clp01/js/disclosure.js" defer></script>


</head>

<body id="pageRequirements">

  <?php get_template_part('parts_site_header'); ?>

  <main class="contents hiragino">

    <header class="header">
      <div class="header__lead">
        <div class="header__leadTexts">
          <p class="header__leadText">現場で活躍するための<span class="header-emphasis">実践的スキルが</span><span class="header-emphasis">強化できる！</span></p>
          <p class="header__leadText header__leadText-trainocamp">TOP IT TrainingCompaniesに選ばれたトレノケート株式会社が<br>提供するEラーニングシステム　トレノキャンプ</p>
        </div>
        <div class="header__badges">
          <img src="<?php echo get_template_directory_uri(); ?>/lp/tc_clp01/images/icon-badge1.svg" alt="Python試験対策もバッチリ！" class="header__badge">
          <img src="<?php echo get_template_directory_uri(); ?>/lp/tc_clp01/images/icon-badge2.svg" alt="現場で使えるスキル育成" class="header__badge">
        </div>
		  <div class="header__movie"></div>		
		</div>
    </header>
    <div class="register">
      <a href="https://camp-lms.trainocate.co.jp/rpv/signup/" class="register__link">会員登録はこちら<span class="register-free"><span class="register-parentheses">（</span>無料<span class="register-parentheses">）</span></span></a>
    </div>
    <div class="spHeader">
		<div class="spHeader__movie">
        <img src="<?php echo get_template_directory_uri(); ?>/lp/tc_clp01/images/icon-movie.png" alt="">
      </div>
		<nav class="spHeader__nav">
        <ul class="spHeader__navList">
          <li class="spHeader__navListItem">
            <a href="#strength1">トレノケート<br>の3つの強み</a>
          </li>
          <li class="spHeader__navListItem">
            <a href="#strength2">サービスの<br>使い方</a>
          </li>
          <li class="spHeader__navListItem">
            <a href="#strength3">よくある質問</a>
          </li>
        </ul>
      </nav>
    </div>
    <section class="strengths" id="strength1">
      <p class="strengths__heading strengths__heading-en" lang="en">Three strengths of Trainocate</p>
      <h2 class="strengths__heading">トレノケートの3つの強み</h2>
      <dl class="strengths__list">
        <div class="strengths__item strengths__item-strengths1">
			<dt style="font-weight: bold;"><span style="color: #dd451e;">豊富な</span>体験コンテンツ</dt>
			<dd>
			<p>コース内容はアカウント登録後に無料体験することが可能です。プログラミングやWeb制作/開発、データ分析まで新人エンジニア向けのコースを用意しています。</p><br>
				<p>Javaは<span style="color: #dd451e;">JUnitやSpring</span>などのフレームワークを、Pythonはデータ分析から試験対策まで幅広くご用意。データベースやGitなど業務に必要な技能が一通り学べます。</p>
          </dd>
        </div>
        <div class="strengths__item strengths__item-strengths2">
			<dt style="font-weight: bold;">Python<span style="color: #dd451e;">試験対策</span>もバッチリ！</dt>
          <dd>
            <p>トレノキャンプはPythonエンジニア育成推進協会の認定スクールです。実務力の習得、試験対策などに高い品質の教材をお使いください。
</p><br>
			  <p>技術解説と実際にコーディングして手を動かす<span style="color: #dd451e;">ハンズオン</span>を組み合わせ、確実になスキルアップを提供します。</p>
          </dd>
        </div>
        <div class="strengths__item strengths__item-strengths3">
			<dt style="font-weight: bold;">質の高い講座で<span style="color: #dd451e;">現場で使える</span><br>スキルが定着</dt>
          <dd>

			  <p>トレノキャンプを運営するトレノケートはITトレーニングの第三者評価機関であるTRAINING INDUSTRYにて選出される<span style="color: #dd451e;">「2021 Top IT Training Companies」</span>をはじめさまざまな受賞歴があります。</p><br>
            <p>トレノケート受賞歴一覧：<a href="https://www.trainocate.co.jp/info/award/index.html">https://www.trainocate.co.jp/info/award/index.html</a></p>
          </dd>
        </div>
      </dl>
    </section>
    <div class="register">
      <a href="https://camp-lms.trainocate.co.jp/rpv/signup/" class="register__link">会員登録はこちら<span class="register-free"><span class="register-parentheses">（</span>無料<span class="register-parentheses">）</span></span></a>
    </div>
    <section class="howToUse" id="strength2">
      <p class="howToUse__heading howToUse__heading-en" lang="en">How to use</p>
      <h2 class="howToUse__heading">サービスの使い方</h2>
      <div class="howToUse__infos">
        <div class="howToUse__info howToUse__info-howTo1">
          <img src="<?php echo get_template_directory_uri(); ?>/lp/tc_clp01/images/bg-info1.jpg" alt="" class="howToUse-bg">
          <h3 class="howToUse__infoHeading">コースの選択</h3>
          <p class="howToUse__infoText">受講するコースを探しましょう。</p>
          <p class="howToUse__infoText">他では学習できない内容もTRAINOCAMPなら見つかるかもしれません。</p>
          <p class="howToUse__infoText">受講順序を知りたい場合はコースマップを確認ください。各コースの紹介ページからカリキュラムをチェックしたり、サンプルの動画ができます。</p>
          <p class="howToUse__infoText">さまざまなレベルを用意しているので自身に最適なレベルをチェックしてください。</p>
          <a href="https://camp.trainocate.co.jp/map/" class="howToUse__link">コースマップ一覧を見る</a>
        </div>
        <div class="howToUse__info howToUse__info-howTo2">
          <img src="<?php echo get_template_directory_uri(); ?>/lp/tc_clp01/images/bg-info2.jpg" alt="" class="howToUse-bg">
          <h3 class="howToUse__infoHeading">コースの購入</h3>
          <p class="howToUse__infoText">受講するコースが決まったら、コースを購入しましょう。クレジット決済が利用できます。商品ページから購入ボタンを押すと決済サービスにアクセスします。</p>
          <p class="howToUse__infoText">ログインがまだの場合は、ログインが求められます。</p>
          <p class="howToUse__infoText">初めてご利用の方はコース購入時に新規アカウント登録は必要です。</p>
          <a href="https://camp-lms.trainocate.co.jp/rpv/signup/" class="howToUse__link">アカウント開設はこちら（無料）</a>
        </div>
        <div class="howToUse__info howToUse__info-howTo3">
          <img src="<?php echo get_template_directory_uri(); ?>/lp/tc_clp01/images/bg-info3.jpg" alt="" class="howToUse-bg">
          <h3 class="howToUse__infoHeading">受講開始</h3>
          <p class="howToUse__infoText">ログイン後は受講一覧からコースを選択し、早速受講しましょう。</p>
          <p class="howToUse__infoText">環境構築はドキュメントで、解説やハンズオンは動画で学習します。</p>
          <p class="howToUse__infoText">カリキュラムを上から順番に受講すれば、<br>TRAINOCAMP流の教育メソッドを反映した効率よい受講ができます。</p>
          <a href="https://camp.trainocate.co.jp/about/" class="howToUse__link">サービスの使い方詳細はこちら</a>
        </div>
      </div>
    </section>
    <div class="register">
      <a href="https://camp-lms.trainocate.co.jp/rpv/signup/" class="register__link">会員登録はこちら<span class="register-free"><span class="register-parentheses">（</span>無料<span class="register-parentheses">）</span></span></a>
    </div>
    <section class="qAndA" id="strength3">
      <p class="qAndA__heading qAndA__heading-en" lang="en">Q&amp;A</p>
      <h2 class="qAndA__heading">よくある質問</h2>
      <dl class="qAndA__list">
        <div class="qAndA__disclosure closed">
          <dt>どのコースもWindowsとMacの両方に対応していますか？</dt>
          <dd>はい。ハンズオンはどちらかのOS（主にWindows）をもとに解説していますが、どちらのOSでも学習環境を作りご受講いただけます。</dd>
        </div>
        <div class="qAndA__disclosure closed">
          <dt>受講はコースマップ通りに進めていく必要がありますか？</dt>
          <dd>いいえ。マップ通りに進めることを推奨していますが、ご興味のあるコースから受講していただいて構いません。コースによっては前提知識などを必要とすることがありますので、コース情報をご確認の上、お申し込みください。</dd>
        </div>
        <div class="qAndA__disclosure closed">
          <dt>試験対策コース（パック）はそれを受講するだけで合格できますか？</dt>
          <dd>コース内容が試験対象範囲を網羅できるように作っていますが、試験内容は変化することがあるため、該当試験の公式本は合わせてチェックいただくことをお勧めしております。</dd>
        </div>
      </dl>
    </section>

  </main>

  <?php get_template_part('parts_site_footer'); ?>

<div class="movie closed">
  <div class="movie__modal">
    <button type="button" aria-label="閉じる"></button>
    <iframe src="https://player.vimeo.com/video/714359968?h=1587992e03" width="640" height="564" frameborder="0" allow="autoplay; fullscreen" allowfullscreen></iframe>
  </div>
</div>
<?php get_footer(); ?>

