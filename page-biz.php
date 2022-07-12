<?php //remove_action( 'wp_head', '_wp_render_title_tag', 1 ); //タイトルタグを出力しない ?>

<?php get_header(); ?>
<!-- for Meta -->
<meta name="description" content='TRAINOCAMP（トレノキャンプ）オンライン学習サービスの特定商取引法に基づく表記'>
<meta property='og:description' content='TRAINOCAMP（トレノキャンプ）オンライン学習サービスの特定商取引法に基づく表記。'>

<!-- slider -->
<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/slick/slick.css" media="all" />
<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/slick/slick-theme.css" media="all" />
<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/slick/slick.min.js"></script>
<!-- ページ固有 -->
<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/css/biz.css" media="all" />
</head>

<body id="pageBiz">

  <?php get_template_part('parts_site_header'); ?>

  <main class="contents hiragino">

    <!-- パンくず -->
    <div id="breadcrumb">
      <div class="inner">
        <ul class="breadlist hiragino">
          <li><a href="<?php echo home_url(); ?>">ホーム</a></li>
          <li><span>法人でのご利用</span></li>
        </ul>
      </div>
    </div>

    <!-- MVのslider -->
    <div class="biz_mv_wrap">
      <ul class="slider">
        <li>
          <div class="biz_mv_01">
              <div class="biz_mv_catch">
                <div class="biz_mv_catch_main">
                  eラーニングで<br />企業課題を解決する
                </div>
                <div class="biz_mv_catch_sub">
                  初めてのIT業界　<br />その不安を解消するコース群！
                </div>
                <div class="biz_mv_btn pc">
                  <a href="https://www.trainocate.co.jp/reference/trainocamp.html">法人向けコース一覧を見る</a>
                </div>
              </div>
          </div>
        </li>
        <li>
          <div class="biz_mv_02">
              <div class="biz_mv_catch">
                <div class="biz_mv_catch_main">
                  すべてのビジネスパーソンに<br />ITリテラシーを
                </div>
                <div class="biz_mv_catch_sub">
                  検索だけで見つからない　<br />リアルな情報を学習する
                </div>
                <div class="biz_mv_btn pc">
                  <a href="https://www.trainocate.co.jp/reference/trainocamp.html">法人向けコース一覧を見る</a>
                </div>
              </div>
          </div>
        </li>
      </ul>
      <div class="biz_mv_btn sp">
        <a href="https://www.trainocate.co.jp/reference/trainocamp.html">法人向けコース一覧を見る</a>
      </div>
    </div>



    <div class="contents_body">
      <div class="inner">

        <div class="content_odd_wrap">
          <div class="content_odd logo">
            <div class="content_logo">
              <img src="<?php echo get_template_directory_uri(); ?>/images/common/logo.png" alt="">
            </div>
            <div class="content_tit">
              トレノキャンプとは
            </div>
            <div class="content_detail width_shrink">
              TRAINOCAMPは、ITに重点をおいたeラーニングサービスです。ビジネスパーソン向けには、今後最も重要であるITリテラシーの向上を図るコースを、ITエンジニア向けには基礎はもちろん、開発のノウハウや周辺ツールまで充実のコンテンツを扱っています。人財強化に最適な選択肢となるコースを提供します。
            </div>
            <div class="content_effect">
              <div class="content_effect_inner">
                <div class="content_effect_inner_image">
                  <img src="<?php echo get_template_directory_uri(); ?>/images/biz/effect1.png" alt="">
                </div>
                <div class="content_effect_inner_tit">ビジネス×IT</div>
                <div class="content_effect_inner_text">
                  <div class="content_effect_inner_detail">
                    今求められているITコンテンツがここにあります。IT業界が初めてのビジネスパーソン向けのコンテンツが充実しています。IT業界、専門用語の把握、ITパスポートに紐づいた基礎項目を体験型コースで習得
                  </div>
                </div>
              </div>

              <div class="content_effect_inner">
                <div class="content_effect_inner_image">
                  <img src="<?php echo get_template_directory_uri(); ?>/images/biz/effect2.png" alt="">
                </div>
                <div class="content_effect_inner_tit">能動的 eラーニング</div>
                <div class="content_effect_inner_text">
                  <div class="content_effect_inner_detail">
                  一方的な講義をただ聞くだけという従来のeラーニングとは異なり、解説後にハンズオンよる体験を重視しています。その他、アニメーション、テスト、演習と飽きずに必ず習得する仕組みを用意しました
                  </div>
                </div>
              </div>

              <div class="content_effect_inner">
                <div class="content_effect_inner_image">
                  <img src="<?php echo get_template_directory_uri(); ?>/images/biz/effect3.png" alt="">
                </div>
                <div class="content_effect_inner_tit">ITエンジニア向けコースの即効性</div>
                <div class="content_effect_inner_text">
                  <div class="content_effect_inner_detail">
                  ITエンジニア向けはJavaとPythonに強く、現場ノウハウを詰め込んでいます。実際の開発現場で使われているテクニック、知識をもとに実務エンジニアと開発した教材のため、検索では見つからない有用な情報がたくさん
                  </div>
                </div>
              </div>

            </div>
          </div>
        </div>


        <div class="content_even_wrap">
          <div class="content_even">
            <div class="content_tit">
              TRAINOCAMP コース例
            </div>

            <table>
              <tr>
                <td class="table_tit" rowspan="2">
                  <div class="content_course_tit a">
                    ビジネスパーソン向け
                  </div>
                </td>
                <td class="table_text">
                  <div class="content_course_btn space">IT業界へようこそ-IT業界把握のファーストステップ-  2021年12月提供予定</div>
                </td>
              </tr>
              <tr>
                <td class="table_text">
                  <div class="content_course_btn b space">ITリテラシー受け放題完全パック  2021年12月提供予定</div>
                </td>
              </tr>
            </table>

            <table>
              <tr>
                <td class="table_tit" rowspan="2">
                  <div class="content_course_tit b">
                  エンジニア向け（開発系）
                  </div>
                </td>
                <td class="table_text">
                  <div class="content_course_btn"><a href="https://www.trainocate.co.jp/elearning/elearning_details.aspx?code=DBX0040G">データ分析完全パック（Python 3 エンジニア認定データ分析試験対応）</a></div>
                </td>
              </tr>
              <tr>
                <td class="table_text">
                  <div class="content_course_btn"><a href="https://www.trainocate.co.jp/elearning/elearning_details.aspx?code=JAX0056G">現場で活かせるWebシステム開発（Spring編）【Springシリーズパック】</a></div>
                </td>
              </tr>
            </table>


            <div class="content_lineup">
              <a href="https://www.trainocate.co.jp/reference/trainocamp.html">すべてのコースラインナップを見る</a>
            </div>


            <div class="content_order">
              <div class="content_order_text">
                <div class="content_order_tit">
                  お申込み方法
                </div>
                <div class="content_order_detail">
                  コースのお申込み方法は「WEB経由でのお申込み」、「申込書によるお申込み」を用意しています。
                </div>
                <div class="content_order_btn">
                  <a href="https://www.trainocate.co.jp/reference/elearning/asp.html">コースのお申込み方法を見る</a>
                </div>
              </div>
              <div class="content_order_image">
                <img src="<?php echo get_template_directory_uri(); ?>/images/biz/biz_order_icon.png" alt="">
              </div>
            </div>
          </div>





        </div>

        <div class="content_odd_wrap promo">
          <div class="content_odd">
            <div class="promotion_a">
              <div class="promotion_illust">
                <img src="<?php echo get_template_directory_uri(); ?>/images/biz/biz_illust1.png" alt="">
              </div>
              <div class="promotion_text">
                <div class="promotion_tit">IT知識を<span>業務に落とし込む</span></div>
                <div class="promotion_detail">ビジネスパーソンのITの習得、DX(デジタルトランスフォーメーション)といったテーマの基礎的コンテンツを揃えています。IT教育が知識や理論に重点を置きがちな中、TRAINOCAMPでは業務への落とし込みを重要視してカリキュラムを構成しています。</div>
              </div>
            </div>
            <div class="promotion_b">
              <div class="promotion_illust">
                <img src="<?php echo get_template_directory_uri(); ?>/images/biz/biz_illust2.png" alt="">
              </div>
              <div class="promotion_text">
                <div class="promotion_tit"><span>ゴール設定の明確な</span>カリキュラム</div>
                <div class="promotion_detail">ITエンジニア向けのコースには、コースマップが用意されています。プログラミングと一言でいっても、実際の実務に必要な知識は開発、テスト、周辺ツールに関することなど様々です。それらの項目をふまえて受講手順を組みました。</div>
              </div>
            </div>
            <div class="promotion_c">
              <div class="promotion_illust">
                <img src="<?php echo get_template_directory_uri(); ?>/images/biz/biz_illust3.png" alt="">
              </div>
              <div class="promotion_text">
                <div class="promotion_tit"><span>企業管理者に安心</span>のシステム</div>
                <div class="promotion_detail">受講者が体験的、能動的に受講できるシステム、教材のクオリティ、進捗やテスト結果を管理できるダッシュボードなどeラーニングであっても人材強化の効果を実感いただけるサービスです。</div>
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
                  <label for="faq_bar01">一般向けと法人向けの違いは何ですか？</label>
                </div>
                <ul id="links01">
                  <li>コース内容や受講システムに違いはございません。法人としてお申し込みの場合は、企業管理者様が受講者の進捗、テスト結果のチェックをする管理アカウントを発行することができます。</li>
                </ul>
              </div>
              <!-- お知らせQAはここで１セット -->
              <div class="faq">
                <input type="checkbox" id="faq_bar02" />
                <div class="faq_wrap">
                  <label for="faq_bar02">eラーニングで知識が定着しますか？</label>
                </div>
                <ul id="links02">
                  <li>TRAINOCAMPのコースは、視聴だけでなく、実際に作業、体験したり、演習を行ったりとさまざまな学習活動が用意されています。そのため、知識の定着や実務への応用など高い習熟度に好評をいただいております。</li>
                </ul>
              </div>
              <!-- お知らせQAはここで１セット -->
              <div class="faq">
                <input type="checkbox" id="faq_bar03" />
                <div class="faq_wrap">
                  <label for="faq_bar03">社員に何を受講させたらよいか分かりません</label>
                </div>
                <ul id="links03">
                  <li>様々なケース、対象に合わせて順次パック商品を用意しております。お気軽にご相談ください。</li>
                </ul>
              </div>
            </div>
          </div>
        </div>

      </div>


    </div>
  </main>


<script>
$(function () {
  $('.slider').slick({
    autoplay:true,
    autoplaySpeed:5000,
    dots:true,
    fade: true,
  });
});
</script>


  <?php get_template_part('parts_site_footer'); ?>
<?php get_footer(); ?>
