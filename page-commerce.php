<?php //remove_action( 'wp_head', '_wp_render_title_tag', 1 ); //タイトルタグを出力しない ?>

<?php get_header(); ?>
<!-- for Meta -->
<meta name="description" content='TRAINOCAMP（トレノキャンプ）オンライン学習サービスの特定商取引法に基づく表記'>
<meta property='og:description' content='TRAINOCAMP（トレノキャンプ）オンライン学習サービスの特定商取引法に基づく表記。'>
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
          <li><span>特定商取引法に基づく表記</span></li> 
        </ul>
      </div>
    </div>


    <!-- ページヘッダー -->
    <div class="contents_head">
      <div class="inner">
        <h1 class="page_title">特定商取引法に基づく表記</h1>
      </div>
    </div>

    <div class="contents_body">
      <div class="inner">

        <div class="sec noMgnT">
          <h2 class="article_title">販売業者</h2>
          <p>トレノケート株式会社</p>
        </div>
        <div class="sec">
          <h2 class="article_title">運営統括責任者名</h2>
          <p>代表取締役社長　小澤 隆</p>
        </div>
        <div class="sec">
          <h2 class="article_title">住所</h2>
          <p>東京都新宿区西新宿6丁目8番1号<br>住友不動産新宿オークタワー19～20階</p>
        </div>
        <div class="sec">
          <h2 class="article_title">サービス名</h2>
          <p>TrainoCamp（トレノキャンプ）オンライン学習サービス</p>
        </div>
        <div class="sec">
          <h2 class="article_title">電話番号</h2>
          <p>03-3347-9686（代）</p>
        </div>
        <div class="sec">
          <h2 class="article_title">メールアドレス</h2>
          <p>support＠camp.trainocate.co.jp</p>
        </div>
        <div class="sec">
          <h2 class="article_title">販売代金</h2>
          <p>商品ごとに記載するものとし、商品一覧のページ及び購入手続き画面にて表示されます。</p>
        </div>
        <div class="sec">
          <h2 class="article_title">商品代金以外の料金の説明</h2>
          <ul class="list_bar">
            <li>消費税</li>
            <li>振込手数料（銀行振込の場合）</li>
            <li>当サイトのページ、コンテンツの閲覧、商品の購入、ソフトウェアのダウンロード等に必要となるインターネット接続料金、通信料金等</li>
          </ul>
        </div>
        <div class="sec">
          <h2 class="article_title">お支払い方法</h2>
          <ul class="list_bar">
            <li>クレジットカード決済</li>
            <li>銀行振込（バーチャル口座）</li>
          </ul>
          <ul class="list_kome">
            <li>「クレジットカードカード決済」、「銀行振込（バーチャル口座）」 は、GMOペイメントゲートウェイ株式会社が提供する「PGマルチペイメントサービス」の決済代行サービス を利用しております。</li>
            <li>ご注文後、同サービスの決済画面へ移動いたしますので決済を完了させてください。</li>
            <li>クレジットカード情報は当社では保有せず、GMOペイメントゲートウェイ株式会社で管理しております。</li>
          </ul>

        </div>


        <div class="sec">
          <h2 class="article_title">お支払期限（時期）</h2>
          <table class="table_blue">
            <tbody>
              <tr>
                <th width="35%">クレジットカード決済</th>
                <td>ご利用のカード会社ごとに異なります。</td>
              </tr>
              <tr>
                <th>銀行振込（バーチャル口座）</th>
                <td>ご注文日から15日以内にお支払いください。</td>
              </tr>
            </tbody>
          </table>
        </div>


        <div class="sec">
          <h2 class="article_title">引渡時期</h2>
          <table class="table_blue">
            <tbody>
              <tr>
                <th>クレジットカード決済</th>
                <td>決済完了後直ちにサービス開始</td>
              </tr>
              <tr>
                <th>銀行振込（バーチャル口座）</th>
                <td>入金確認後直ちにサービス開始</td>
              </tr>
            </tbody>
          </table>
          <p>※いずれもサービス開始の旨をお伝えするメールが届きます。同メールが届いた時点からご利用可能です。</p>
        </div>

        <div class="sec">
          <h2 class="article_title">返品条件／期限</h2>
          <p>商品の特性上返品に応じることはできません。</p>
        </div>

        <div class="sec">
          <h2 class="article_title">販売数量</h2>
          <p>制限はありません。</p>
        </div>

        <div class="sec">
          <h2 class="article_title">動作環境</h2>
          <p>詳細につきましては動作環境をご参照ください。</p>
        </div>



        
      </div>


    </div>
  </main>





  <?php get_template_part('parts_site_footer'); ?>
<?php get_footer(); ?>