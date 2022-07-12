/*--------------------------------
レイアウト調整
--------------------------------*/
function moveVideo() {
  if (window.innerWidth > 750) {
    $('#detail_title').before($('#movie'));
  }else{
    $('#course_head').before($('#movie'));
  }
}
$(window).on('load', function() {
  moveVideo();
});
var resizeTimer;
$(window).on('resize', function() {
  clearTimeout(resizeTimer);
  resizeTimer = setTimeout(function() {
    moveVideo();
  }, 200);
});

/*--------------------------------
動画のスライダー
--------------------------------*/
jQuery(function($){
  
  function movieSlider() {
    $('.slider_for').slick({
        slidesToShow: 1,
        slidesToScroll: 1,
        arrows: true,
        fade: true,
        asNavFor: '.slider_nav'
    });
    $('.slider_nav').slick({
        slidesToShow: 5,
        slidesToScroll: 1,
        infinite: false,
        asNavFor: '.slider_for',
        dots: false,
        centerMode: true,
        //centerMode: false,//ナビ数以内になると表示されているスライドがcenterの位置に配置
        dots: false,
        focusOnSelect: true,
        responsive: [
        {
            breakpoint: 1024,
            settings: {
              infinite: true,
              centerMode: true,
              slidesToShow: 3,
              slidesToScroll: 1,
            }
        },
        ]
    });
    $('.slider_for').on('beforeChange', function(event, slick, currentSlide, nextSlide){
      if (window.innerWidth <=750) {
        if ($('.slider_nav li').length < 4) {
          $('.slider_nav').addClass("pos_fixed");
          //$('.slider_nav').slick('slickSetOption', 'centerMode', true, true);
        }
      }
    });
    
  }
  $(window).on('load',function(){
    $('.slider_nav').on('init', function(event, slick){
      if (window.innerWidth <=750) {
        if ($('.slider_nav li').length < 4) {
          $('.slider_nav').addClass("pos_fixed");
        }
      }
    });
    movieSlider();
  });
});
/*--------------------------------
カリキュラム(アコーディオン)
--------------------------------*/
jQuery(function($){
  //個別アコーディオン
  $('.js_accordion').on('click', function () {
    $(this).next().slideToggle(200);
    $(this).parents('li').toggleClass('is_expand', 200);
  });

  //全て展開
  $('.btn_expand').on('click', function () {
    $('.cur_child li').addClass('is_expand',200);
    $('.cur_child .cur_list').slideDown(200);
  });
});

/*--------------------------------
受講者の声
--------------------------------*/
jQuery(function($){
  //個別アコーディオン
  $('.btn_voice').on('click', function () {
    $('.voices li').fadeIn(200);
    $(this).delay(200).fadeOut(200);
  });
});
/*--------------------------------
コースパック
--------------------------------*/
jQuery(function($){
  //個別アコーディオン
  $('.btn_pack').on('click', function () {
    $('.packs li').fadeIn(200);
    $(this).delay(200).fadeOut(200);
  });
});

/*--------------------------------
関連スライダー
--------------------------------*/
$(function() {
  function sliderSetting(){
    var width = $(window).width();
      $('#slide_recommend').not('.slick-initialized').slick({
        autoplay: true,
        adaptiveHeight: false,
        variableWidth:false,
        slidesToShow: 3,
        slidesToScroll: 1,
        responsive: [
        {
            breakpoint: 1024,
            settings: {
                slidesToShow: 2,
            }
        },
        {
            breakpoint: 750,
            settings: {
                // slidesToShow: 3,
                // slidesToScroll: 1,
                slidesToShow: 1,
                autoplay: true,
                adaptiveHeight: false,
                variableWidth:true,
                slidesToScroll: 1,
            }
        },
        ]
      });
  }

  // 初期表示時の実行
  $('#slide_recommend').on('init', function(event, slick){
    $('.auto').matchHeight();
  });
  sliderSetting();

  // リサイズ時の実行
  $(window).resize( function() {
    sliderSetting();
  });
});
/*--------------------------------
URLコピー
--------------------------------*/
$(function() {
  $(".btn_copy").on("click", function() {
    // コピーするテキストを選択
    $(".modal_url").select();
    // 選択したテキストをクリップボードにコピーする
    document.execCommand("Copy");
    // コピーを通知する
    //alert("コピーできました！\nコピー内容：" + $(".demo1 input").val() + "\n文字を変えてコピーボタンを押してみてね！");
  });
});