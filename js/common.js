/***************************************************************************

  汎用関数

****************************************************************************/
//コンスタント文字列
const SP_BP = 750;    //スマホ判定のブレイクポイント
const MENU_BP = 1024;  //グローバルメニューの表示ブレイクポイント

/*------------------------------------
ウィンドウ幅取得
--------------------------------------*/
var wWidth = 0;
function getWidth() {
  wWidth = window.innerWidth;
  return wWidth;
}

/*------------------------------------
  SPとPCで画像の入れ替え
  画像変更対象の<img>にスタイル「js_image_switch」を追加する。
  画像の命名規則：最後に_pc,_spとする。
  ※スタイルはJSコントロール用でCSSに無し。
--------------------------------------*/

$(function() {
  // 置換の対象とするclass属性。
  var $elem = $('.js_image_switch');
  // 置換の対象とするsrc属性の末尾の文字列。
  var sp = '_sp.';
  var pc = '_pc.';
  // 画像を切り替えるウィンドウサイズ。
  var replaceWidth = SP_BP;

  function imageSwitch() {
    // ウィンドウサイズを取得する。
    var windowWidth = parseInt($(window).width());

    // ページ内にあるすべての`.js_image_switch`に適応される。
    $elem.each(function() {
      var $this = $(this);
      // ウィンドウサイズが768px以上であれば_spを_pcに置換する。
      if(windowWidth > replaceWidth) {
        $this.attr('src', $this.attr('src').replace(sp, pc));

      // ウィンドウサイズが768px未満であれば_pcを_spに置換する。
      } else {
        $this.attr('src', $this.attr('src').replace(pc, sp));
      }
    });
  }
  imageSwitch();

  // 動的なリサイズは操作後0.2秒経ってから処理を実行する。
  var resizeTimer;
  $(window).on('resize', function() {
    clearTimeout(resizeTimer);
    resizeTimer = setTimeout(function() {
      imageSwitch();
    }, 200);
  });
});


/*------------------------------------
画像トリミング
--------------------------------------*/
$(function() {
  objectFitImages();
});

/***************************************************************************

  共通動作

****************************************************************************/

/*--------------------------------------
  ローディング
--------------------------------------*/
/*
jQuery(function($){
  var h = $(window).height();
  var ofsh = window.pageYOffset ;

  //$('#loadingWrap').css('display','none');
  $('#loader-bg').css({'display':'block','position':'fixed','top': '0' + 'px'});
  $('.loader').css({'visibility':'visible'});
  $('#loadingWrap').css({'visibility':'hidden','opacity':'0'});
});

$(window).on("load",function(){
  $('#loader-bg').delay(900).fadeOut(800);
  $('#loadingWrap').css({'visibility':'visible',opacity: '1'});
});

//10秒たったら強制的にロード画面を非表示
$(function(){
  setTimeout('stopload()',10000);
});

function stopload(){
  $('#loadingWrap').css({'visibility':'visible',opacity: '1'});
  $('#loader-bg').delay(900).fadeOut(800);
}
//カウンター
$(function(){
    var countElm = $('.count'),
    countSpeed = 10;

    countElm.each(function(){
        var self = $(this),
        countMax = self.attr('data-num'),
        thisCount = self.text(),
        countTimer;

        function timer(){
            countTimer = setInterval(function(){
                var countNext = thisCount++;
                self.text(countNext);

                if(countNext == countMax){
                    clearInterval(countTimer);
                }
            },countSpeed);
        }
        timer();
    });

});
*/



/*--------------------------------------
  メニューボタン
--------------------------------------*/

$(document).on('click', 'ul.show li a', function(){
  replaceWidth = 751;
  var windowWidth = parseInt($(window).width());
  if (windowWidth < replaceWidth) {
    $('.header_nav ul, #nav_open').removeClass('show');
  }
});

// スマホメニューの制御
$(function() {
  $('#nav_open').on('click', function () {
    $(this).toggleClass('show');
    $(this).next().find('ul').toggleClass('show');
  });

	$('.toggle_title').click(function(){
		$(this).toggleClass('selected');
		$(this).next().slideToggle();
	});
});

/*--------------------------------------
  検索ボタン
  スマホでタップすると検索窓が出現
--------------------------------------*/
$(function() {
  //開くボタンを押した時には
  $(".open-btn").click(function () {
    $("#search-wrap").addClass('panelactive');//#search-wrapへpanelactiveクラスを付与
  $('#search-text').focus();//テキスト入力のinputにフォーカス
  });

  //閉じるボタンを押した時には
  $(".close-btn").click(function () {
    $("#search-wrap").removeClass('panelactive');//#search-wrapからpanelactiveクラスを除去
  });
});

/*--------------------------------------
  smooth scroll
--------------------------------------*/

jQuery(function($){
  $('a[href^="#"]').on('click', function(){
    var offset = 70;

    var href= $(this).attr("href");
    if (href.match('modal') == null) {

      if (window.innerWidth < 1025) {
        //スマホの場合の調整
        if ($('body').hasClass('open')) {
          $('body').removeClass("open");
        }
      }
      var target = $(href == "#" || href == "" ? 'html' : href);
      var position = target.offset().top - offset;
      $('body,html').animate({scrollTop:position}, 800, 'swing');
      return false;
    }
  });

  $('.toPageTop').click(function () {
    $("html,body").animate({scrollTop:0},'300');
  });
});
//パラメータ付でスクロール
jQuery.event.add(window,"load",function(){
  setTimeout(function() {
    if(wWidth < 751) {
      var offset = 0;
    } else {
      offset = 0;
    }
    var idHash   = location.hash;
    if(idHash){
      if (idHash.match('modal') == null) {
        var target = $(idHash);
        var position = target.offset().top - offset;
        $('body,html').animate({scrollTop:position}, 400, 'swing');
      }
    }
  }, 600);
});

/*--------------------------------------
  スクロールアニメーション
  fadeFromBottom:下から
  fadeFromLeft：左から
  fadeFromRight：右から
  （OPTION）
  delay:遅延表示
--------------------------------------*/
jQuery(function($){
  //上から
  $('.fadeFromBottom').css({top:'30px',opacity:0,position:'relative'});
  $('.fadeFromBottom').one('inview', function(event, isInView1, visiblePartX, visiblePartY) {
    if (isInView1) {
      $(this).stop();
      $(this).stop().animate({top:'0px',opacity:1}, 500);
    }
    else {
      $(this).stop();
      $(this).stop().animate({top:'30px',opacity:0}, 500);
    }
  });
  //左から
  $('.fadeFromLeft').css({right:'50%',opacity:0,position:'relative'});
  $('.fadeFromLeft').one('inview', function(event, isInView2, visiblePartX, visiblePartY) {

    var delayleft = 1;
    if ($('.fadeFromLeft').hasClass('delay')){
      if (window.innerWidth > 750){
        var delayleft = 500;
      }
    }
    if (isInView2) {
      $(this).stop();
      $(this).stop().delay(delayleft).animate({right:'0px',opacity:1}, 800);
    }
    else {
      $(this).stop();
      $(this).stop().animate({right:'50%',opacity:0}, 800);
    }
  });

  $('.fadeFromRight').css({left:'50%',opacity:0,position:'relative'});
  $('.fadeFromRight').one('inview', function(event, isInView3, visiblePartX, visiblePartY) {
    var delayRight = 1;
    if ($('.fadeFromRight').hasClass('delay')){
      if (window.innerWidth > 750){
        var delayRight = 500;
      }
    }
    if (isInView3) {
      $(this).stop();
      $(this).stop().delay(delayRight).animate({left:'0px',opacity:1}, 800);
    }
    else {
      $(this).stop();
      $(this).stop().animate({left:'50%',opacity:0}, 800);
    }
  });
});

/*--------------------------------------
Headerのニュース
--------------------------------------*/

$(function () {

  if($('.head_news').length) {

  $('button[name=btn_news]').on('click', () => {
    $('.head_news').fadeOut();
    $('.open-btn').addClass("no_news");
    $('#nav_open').addClass("no_news");
    $('.top_mv_01').addClass("no_news");
    $('.top_mv_02').addClass("no_news");
    $('.nav_flex').addClass("no_news");
  });
}

else {
  $('.open-btn').addClass("no_news");
  $('#nav_open').addClass("no_news");
    $('.top_mv_01').addClass("no_news");
    $('.top_mv_02').addClass("no_news");
    $('.nav_flex').addClass("no_news");
}

});
