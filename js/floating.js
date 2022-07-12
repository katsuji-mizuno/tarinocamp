// HTMLの要素が全て準備できれば処理を行う
var setBoxId = '#merchandise';      // スクロールさせる要素
var initOffsetTop = null;   // 要素の初期位置
$(document).ready(function() {
    // 初期位置取得
    initOffsetTop = $(setBoxId).offset().top;

});

//スクロールしたらこの処理が走る
$(window).scroll(function() {
    scrollbox();
});




if(!navigator.userAgent.match(/(iPhone|iPad|iPod|Android)/)){
  // スクロール処理
  function scrollbox(){
    // 初期位置が取れていなければ処理を抜ける
    if(initOffsetTop == null) return;

    // 現在のスクロール位置を取得
    var scrollTop = $(document).scrollTop();

    // スクロールさせる要素の初期位置と現在のスクロールの位置を比較
    //初期位置より下にスクロールした時
    if(initOffsetTop < scrollTop) {
        // positionを設定
        $(setBoxId).css('position', 'fixed');
        // topの位置を設定
        $(setBoxId).animate({top: '60'}, {duration: 0});
    } else {
        // 設定したスタイルを元に戻す
        $(setBoxId).css('position', 'absolute');
        $(setBoxId).animate({top: '0'}, {duration: 0});
    }

  }
}