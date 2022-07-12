 /*--------------------------------------
  メニュー（現在ページ）
--------------------------------------*/
jQuery(function($){
  var myUrl   = location.href ;
  var mySlug  = myUrl.replace(homeURL,"");
  var ary     = myUrl.split('/');
  var lastSlug = ary[ary.length - 2];
  var strItem = "menu ul.menulv1 ." + lastSlug;
  console.log(strItem);
  
  if($('ul.catelist')[0]){
    if ( mySlug.indexOf('/column/') != -1) {
      $('ul.catelist .column').addClass('selected');
    }else if ( mySlug.indexOf('/market/') != -1) {
      $('ul.catelist .market').addClass('selected');
    }else if ( mySlug.indexOf('/news/') != -1) {
      $('ul.catelist .news').addClass('selected');
    }
    if ( $("#" + strItem)[0]) {
      $("#" + strItem).addClass('selected');
    }
  }
});