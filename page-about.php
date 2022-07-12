<?php //remove_action( 'wp_head', '_wp_render_title_tag', 1 ); //タイトルタグを出力しない ?>

<?php get_header(); ?>
<!-- for Meta -->
<meta name="description" content='TRAINOCAMP（トレノキャンプ）オンライン学習サービスの特定商取引法に基づく表記'>
<meta property='og:description' content='TRAINOCAMP（トレノキャンプ）オンライン学習サービスの特定商取引法に基づく表記。'>
<!-- for Page -->
<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/css/about.css" media="all" />


</head>

<body id="pageRequirements">

  <?php get_template_part('parts_site_header'); ?>

  <main class="contents hiragino">

    <!-- パンくず -->
    <div id="breadcrumb">
      <div class="inner">
        <ul class="breadlist hiragino">
          <li><a href="<?php echo home_url(); ?>">ホーム</a></li>
          <li><span>サービスの使い方</span></li>
        </ul>
      </div>
    </div>



      <!-- ページヘッダー -->
      <div class="contents_head">
        <div class="inner">
          <h1 class="page_title">サービスの使い方</h1>
          <p class="h_lead">TRAINOCAMPサービスの使い方をご紹介します。<br />
          コースを選び、すぐに学習を開始しましょう。<br />
          最適なカリキュラムで学習効率を上げることができます。</p>
        </div>
      </div>


    <div class="contents_body">
      <div class="inner">
        <div class="content_head">
          <div class="content_head_tit">
          TRAINOCAMPとは
          </div>
          <div class="content_head_detail">
          TRAINOCAMPは、ITエンジニア、プログラマー志望の初心者から現役のエンジニアまで対応できるeラーニングサービスです。<br />自身のPCへの環境構築から説明、ハンズオンまで丁寧に学習できます<br />スキルアップに必要なコンテンツを選び、学習を開始してください。
          </div>
        </div>


        <div class="content_odd_wrap">
          <div class="content_odd">
            <div class="contet_image">
              <img src="<?php echo get_template_directory_uri(); ?>/images/about/content_1.jpg" alt="">
            </div>
            <div class="content_text">
              <div class="content_tit">
                コースの選択
              </div>
              <div class="content_detail">
                受講するコースを探しましょう。<br />
                他では学習できない内容もTRAINOCAMPなら見つかるかもしれません。<br />
                受講順序を知りたい場合はコースマップを確認ください。<br />
                各コースの紹介ページからカリキュラムをチェックしたり、<br />
                サンプルの動画ができます。<br />
                さまざまなレベルを用意しているので自身に最適なレベルを<br />
                チェックしてください。
              </div>
              <div class="conten_btn"><a href="<?php echo home_url(); ?>/map/">コースマップ一覧へ</a></div>
            </div>
          </div>
        </div>


        <div class="content_even_wrap">
          <div class="content_even">
            <div class="contet_image">
              <img src="<?php echo get_template_directory_uri(); ?>/images/about/content_2.jpg" alt="">
            </div>
            <div class="content_text">
              <div class="content_tit">
                コースの購入
              </div>
              <div class="content_detail">
                受講するコースが決まったら、コースを購入しましょう。<br />
                クレジット決済が利用できます。<br />
                <span>商品ページから購入ボタンを押すと決済サービスにアクセス<br />
                します。ログインがまだの場合は、ログインが求められます。<br />
                初めてご利用の方はコース購入時に新規アカウント登録は必要です。</span>
              </div>
            </div>
          </div>
        </div>
        <div class="content_odd_wrap">
          <div class="content_odd">
            <div class="contet_image">
              <img src="<?php echo get_template_directory_uri(); ?>/images/about/content_3.jpg" alt="">
            </div>
            <div class="content_text">
              <div class="content_tit">
                受講を始めましょう
              </div>
              <div class="content_detail">
                ログイン後は受講一覧からコースを選択し、早速受講しましょう。<br />
                環境構築はドキュメントで、解説やハンズオンは動画で学習します。<br />
                カリキュラムを上から順番に受講すれば、TRAINOCAMP流の教育メソッドを反映した効率よい受講ができます。
              </div>
              <div class="conten_btn"><a href="https://camp-lms.trainocate.co.jp/rpv/">ログインページへ</a></div>
            </div>
          </div>
        </div>
        <div class="content_even_wrap">
          <div class="content_even">
            <div class="contet_image">
              <img src="<?php echo get_template_directory_uri(); ?>/images/about/content_4.jpg" alt="">
            </div>
            <div class="content_text">
              <div class="content_tit">
                受講中の質問
              </div>
              <div class="content_detail">
                動画視聴中に分からないことがあれば、質問ボタンから<br />
                質問できます。どの単元の話なのか自動反映されますので、<br />
                すぐに視聴中の内容の疑問点から記入できます。<br /><br />
                コースは品質向上のために教材開発者が定期的にチェックしています。
              </div>
            </div>
          </div>
        </div>
        <div class="content_odd_wrap">
          <div class="content_odd">
            <div class="contet_image">
              <img src="<?php echo get_template_directory_uri(); ?>/images/about/content_5.jpg" alt="">
            </div>
            <div class="content_text">
              <div class="content_tit">
                ミニテスト／模擬試験
              </div>
              <div class="content_detail">
                コースによってはミニテストや模擬試験が用意されています。<br />
                <span>コース内容の定着を確認したり、資格試験のために万全の対策をたてましょう。</span>
              </div>
            </div>
          </div>
        </div>
        <div class="content_even_wrap">
          <div class="content_even">
            <div class="contet_image">
              <img src="<?php echo get_template_directory_uri(); ?>/images/about/content_6.jpg" alt="">
            </div>
            <div class="content_text">
              <div class="content_tit">
                進捗のチェック
              </div>
              <div class="content_detail">
              コースの進み具体や学習時間などをチェックできます。<br />
              学習が予定通りにおこなえているか、確認しながら進めましょう。
              </div>
            </div>
          </div>
        </div>
        <div class="content_odd_wrap bottom">
          <div class="content_odd">
            <div class="contet_image">
              <img src="<?php echo get_template_directory_uri(); ?>/images/about/content_7.jpg" alt="">
            </div>
            <div class="content_text">
              <div class="content_tit">
                領収書の発行
              </div>
              <div class="content_detail">
                コース購入の料金を会社で清算したい方のために、<br />
                領収書の発行機能を用意してございます。<br />
                <span>先に個人クレジット購入して、後で清算する場合にお使いください。</span>
              </div>
            </div>
          </div>
        </div>

        <div class="content_foot">
          <div class="content_tit foot">
            よくある質問
          </div>
          <div class="content_detail">

            <div class="faq_list">

              <!-- お知らせQAはここで１セット -->
              <div class="faq">
                <input type="checkbox" id="faq_bar01" />
                <div class="faq_wrap">
                  <label for="faq_bar01">どのコースもWindowsとMacの両方に対応していますか？</label>
                </div>
                <ul id="links01">
                  <li>はい。ハンズオンはどちらかのOS(主にWindows)をもとに解説していますが、どちらのOSでも学習環境を作りご受講いただけます。</li>
                </ul>
              </div>
              <!-- お知らせQAはここで１セット -->
              <div class="faq">
                <input type="checkbox" id="faq_bar02" />
                <div class="faq_wrap">
                  <label for="faq_bar02">受講はコースマップ通りに進めていく必要がありますか？</label>
                </div>
                <ul id="links02">
                  <li>いいえ。マップ通りに進めることを推奨していますが、ご興味のあるコースから受講していただいて構いません。コースによっては前提知識などを必要とすることがありますので、コース情報をご確認の上、お申し込みください。</li>
                </ul>
              </div>
              <!-- お知らせQAはここで１セット -->
              <div class="faq">
                <input type="checkbox" id="faq_bar03" />
                <div class="faq_wrap">
                  <label for="faq_bar03">試験対策コース（パック）はそれを受講するだけで合格できますか？</label>
                </div>
                <ul id="links03">
                  <li>コース内容が試験対象範囲を網羅できるように作っていますが、試験内容は変化することがあるため、該当試験の公式本は合わせてチェックいただくことをお勧めしております。</li>
                </ul>
              </div>

            </div>
          </div>
        </div>
      </div>
    </div>

      <!-- 法人のお客様リンク -->
      <?php get_template_part('parts_biz'); ?>

  </main>
  <?php get_template_part('parts_site_footer'); ?>
<?php get_footer(); ?>
