/*===================================
ブログ共通処理
======================================/
/*------------------
各種設定
-------------------*/
const POP_UP_TIMING_PC = 1000; //ポップアップの表示タイミング(pxを指定)
const POP_UP_TIMING_SP = 1600; //ポップアップの表示タイミング(pxを指定)
const FOOTER_BANNAR_TIMING = 300; //フッターバナー表示タイミング(pxを指定)

/*------------------
ポップアップバナー
-------------------*/
$(function(){
  
  // スクロールでの表示（廃止）
  // var timing = POP_UP_TIMING_PC;
  // $(window).scroll(function () {
  //   if (window.innerWidth > 750) {
  //     timing = POP_UP_TIMING_PC;
  //   }else{
  //     timing = POP_UP_TIMING_SP;
  //   }
  //   if ($(this).scrollTop() > timing) { //スクロール量はここを変更
  //     if ($('#blog_popup_banner')[0]) {
  //       $("#blog_popup_banner").show();
  //       $.cookie('btnFlg') == 'on'?$("#blog_popup_banner").hide():$("#blog_popup_banner").show();
        
  //     }
  //   }
  // });

  //ロード後30秒後に表示
  $(window).on('load', function() {
    setTimeout( function(){ 
      if ($('#blog_popup_banner')[0]) {
        $("#blog_popup_banner").show();
        $.cookie('btnFlg') == 'on'?$("#blog_popup_banner").hide():$("#blog_popup_banner").show();
      }
    }, 30000 );
  });

  $(".popup_close").on('click',function(){
      $("#blog_popup_banner").fadeOut();
      $.cookie('btnFlg', 'on', { expires: 1,path: '/' }); //cookieの保存日数はここを変更
  });

});
/*------------------
サイドバナーの追従
-------------------*/

$(function() {
  var target_pos;
  var win_w = $(window).width();

  //スクロール時
  $(window).scroll(function() {
    var scroll = $(this).scrollTop();
    var target_w = $('#aside_sticky').width();
    var target_h = $('#aside_sticky').height();

    if (!$('#aside_sticky').hasClass("sticky_fixed")) { //ちらつき防止
      target_pos = $('#aside_sticky').offset().top;
    }

    if (window.innerWidth > 1100) {
      if (target_pos < scroll) {
        if ($('#aside_sticky').not('.sticky_fixed')) {
          $('#aside_sticky').addClass('sticky_fixed');
          $('#aside_sticky').width(target_w);
          $('#aside_sticky').height(target_h);
        }
      }else{
         $('#aside_sticky').removeClass('sticky_fixed');
         $('#aside_sticky').css({"width":"","height":""});
      }
    }else{
      $('#aside_sticky').removeClass('sticky_fixed');
      $('#aside_sticky').css({"width":"","height":""});
    }
  });

  //リサイズ時（サイズの再取得)
  var timer = false;
  $(window).resize(function() {
      if (timer !== false) {
          clearTimeout(timer);
      }
      timer = setTimeout(function() {
        var now_w = $(window).width();
        if(win_w != now_w) {
          if ($('#aside_sticky').hasClass('sticky_fixed')) {
            target_w = $('#aside_sticky').width();
            target_h = $('#aside_sticky').height();
            $('#aside_sticky').width(target_w);
            $('#aside_sticky').height(target_h);
          }
        }
      }, 200);
  });
});
/*--------------------------------------
  フッターバナーの制御
--------------------------------------*/
$(function () {
  $(window).scroll(function () {
    if ($(this).scrollTop() > FOOTER_BANNAR_TIMING) {
      if ($('#blog_footer_banner')[0]) {
        $("#blog_footer_banner").addClass('show');
      }
    }
  });
  //クローズボタン
  $("#blog_footer_banner .bf_close").on('click',function(){
      $("#blog_footer_banner").fadeOut();
  });
});