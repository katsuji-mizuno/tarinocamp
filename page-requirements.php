<?php //remove_action( 'wp_head', '_wp_render_title_tag', 1 ); //タイトルタグを出力しない ?>

<?php get_header(); ?>
<!-- for Meta -->
<meta name="description" content='TRAINOCAMP（トレノキャンプ）オンライン学習サービスの動作環境です。'>
<meta property='og:description' content='TRAINOCAMP（トレノキャンプ）オンライン学習サービスの動作環境です。'>
<!-- for Page -->
<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/css/requirements.css" media="all" />

</head>

<body id="pageRequirements">
  
  <?php get_template_part('parts_site_header'); ?>

  <main class="contents hiragino">

    <!-- パンくず -->
    <div id="breadcrumb">
      <div class="inner">
        <ul class="breadlist hiragino">
          <li><a href="<?php echo home_url(); ?>">ホーム</a></li>
          <li><span>動作環境</span></li> 
        </ul>
      </div>
    </div>


    <!-- ページヘッダー -->
    <div class="contents_head">
      <div class="inner">
        <h1 class="page_title">動作環境</h1>
      </div>
    </div>

    <div class="contents_body">
      <div class="inner">
        <p class="cb_lead">
          以下の動作環境を推奨しております。<br>
          推奨している動作環境以外で受講しますと、映像や音声が途切れるなどの現象が発生する可能性がございます。
        </p>

        <div class="sec">
          <h2 class="article_title">PC環境</h2>
          <table class="table_blue">
            <tr>
              <th>OS</th>
              <td><ul class="list_bar">
                <li>Windows8.1</li>
                <li>Windows10</li>
                <li>macOS X</li>
              </ul></td>
            </tr>
            <tr>
              <th>ブラウザ</th>
              <td><ul class="list_bar">
                <li>Microsoft Edge　※Windows10のみ対象</li>
                <li>Firefox</li>
                <li>Safari</li>
                <li>Google Chrome</li>
              </ul></td>
            </tr>
            <tr>
              <th>ソフトウェア</th>
              <td>Adobe Reader</td>
            </tr>
          </table>
        </div>

        <div class="sec">
          <h2 class="article_title">タブレット・スマートフォン環境</h2>
          <table class="table_blue">
            <tr>
              <th>OS</th>
              <td><ul class="list_bar">
                <li>Android 6.0～</li>
                <li>iOS 10.2～</li>
              </ul></td>
            </tr>
            <tr>
              <th>ブラウザ</th>
              <td><ul class="list_bar">
                <li>Andorid：Google Chrome</li>
                <li>iOS：Safari</li>
              </ul></td>
            </tr>
            <tr>
              <th>ソフトウェア</th>
              <td>Adobe Reader</td>
            </tr>
          </table>
        </div>

        <p class="text">
          デスクトップモード／デスクトップ版が推奨環境になります。<br>タブレットモードでのご利用は動作保証外となりますのでご注意ください。
        </p>
      </div>


    </div>
  </main>





  <?php get_template_part('parts_site_footer'); ?>
<?php get_footer(); ?>

