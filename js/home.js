/*--------------------------------------
  初期アニメーション
--------------------------------------*/
$(function () {
    $('.popup_youtube').on('click',function(){
      var target = $(this).attr('data-id');

      var speed = $(this).attr('data-speed') != undefined ? $(this).attr('data-speed') : 0;

      $.magnificPopup.open({
        items: {
          src: '<div class="movie-wrap"><iframe width="90%" height="400" src="https://www.youtube.com/embed/' + target + '?rel=0&start=' + speed + '&autoplay=1" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe></div>',
          type: 'inline',
          modal: true
        }
      });
    });
});


/*--------------------------------------
TOPの一覧のaタグを複層にすると、閉じタグが勝手に付けられる為、
aタグをdivにしてリンクを設置させるためのjs
--------------------------------------*/
// クリックしたらURLへ遷移させる

$(function(){
  $('.tag_link').click(function(){
    location.href=$(this).attr('data-url');
  });
});
/*--------------------------------------
 TOPとカテゴリTOPのMVのSlick（共通）
--------------------------------------*/
$(function () {
  $('.slider').slick({
    autoplay:true,
    autoplaySpeed:5000,
    dots:true,
    fade: true,
  });
});


/*--------------------------------------
 TOPのコース「新着一覧」のSlick
--------------------------------------*/
$(function () {
  $('.slider_course_new').slick({
    autoplay:false,
    dots:false,
    slidesToShow:5,
    responsive: [{
      breakpoint: 1050,　
      settings: {
        slidesToShow: 1,
        centerMode: true,
        centerPadding: '10%'
       }
   }]
  });
});

  /*--------------------------------------
    TOPのコース「新着一覧」のSlick
  --------------------------------------*/
  $(function() {
    var showPopover = function () {

      $('[data-toggle="popover"]').popover('hide');  //新しいポップアップを開く前にすでに開いている物は閉じる
      $(this).popover('show'); //hoverされた対象を開く
    }
    var hidePopover = function () {
      $(this).popover('hide');
      var id =  $(this).attr('id');
      $("#" + id).mouseenter(function(){
        //popupにhoverしている時は何もしない(閉じない)
      }).mouseleave(function(){
          $(this).popover('hide');
      });
    };

    $('[data-toggle="popover"]').popover({
        content: 'Popover content',
        placement: 'auto',
        html: true,
        trigger: 'hover focus',
        trigger: 'manual',
    })
    //.click(showPopover)
    .focus(showPopover)
    .hover(showPopover,hidePopover)
    .blur(hidePopover)
    ;
});


/*--------------------------------------
「Springフレームワーク」はSlickの枚数に応じて「slidesToshow」を可変
--------------------------------------*/

$(function(){
  var slidesToshow_val = 5;
  var slidesToshow_leng = $('ul.slider_course_spring li.top_course_spring_list').length;
    if(slidesToshow_leng < slidesToshow_val){
      slidesToshow_val = slidesToshow_leng;
    }
   $('.slider_course_spring').slick({
     slidesToShow:slidesToshow_val,
     autoplay:false,
     dots:false,
     responsive: [{
      breakpoint: 750,　
      settings: {
        slidesToShow: 1,
        centerMode: true,
        centerPadding: '10%'
       }
   }]
   });
});
