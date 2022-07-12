<?php
//--------サイト独自設定------------------------------------------//

//---------------------------------------
//コンスタント変数
//---------------------------------------
$base_api_url='https://trainocamp.dk-lab.jp/tcapi'; //APIテスト環境
//$base_api_url='https://camp-lms.trainocate.co.jp/tcapi/'; //API本番環境
$base_img_url='https://trainocamp.dk-lab.jp'; //商品画像の保存先サーバー
//$base_img_url='https://camp-lms.trainocate.co.jp'; //商品画像の保存先本番環境

//---------------------------------------
//URLのりライト
//---------------------------------------

function custom_rewrite_tag() {
  //パラメータ登録
  add_rewrite_tag('%merchandise_id%', '([^&]+)');
  add_rewrite_tag('%tag_slug%', '([^&]+)');
  add_rewrite_tag('%category1_slug%', '([^&]+)');
  add_rewrite_tag('%category2_slug%', '([^&]+)');
  add_rewrite_tag('%category3_slug%', '([^&]+)');
  add_rewrite_tag('%q%', '([^&]+)');
}
add_action('init', 'custom_rewrite_tag', 10, 0);

function custom_rewrite_rule() {
  //固定ページのIDを取得
  $course_tag_page         = get_page_by_path("course/course_tag");
  $course_tag_pageid       = $course_tag_page->ID;
  $course_category_page    = get_page_by_path("course/course_category");
  $course_category_pageid  = $course_category_page->ID;
  $course_search_page      = get_page_by_path("course/course_search");
  $course_search_pageid    = $course_category_page->ID;
  $course_detail_page      = get_page_by_path("course/course_detail");
  $course_detail_pageid    = $course_detail_page->ID;

  //URL変換
  //タグ
  add_rewrite_rule('^course/tag/([^/]*)/?','index.php?page_id='.$course_tag_pageid.'&tag_slug=$matches[1]','top');
  //カテゴリ
  add_rewrite_rule('^course/category/([^/]*)/([^/]*)/([^/]*)/?','index.php?page_id='.$course_category_pageid.'&category1_slug=$matches[1]&category2_slug=$matches[2]&category3_slug=$matches[3]','top');
  add_rewrite_rule('^course/category/([^/]*)/([^/]*)/?','index.php?page_id='.$course_category_pageid.'&category1_slug=$matches[1]&category2_slug=$matches[2]','top');
  add_rewrite_rule('^course/category/([^/]*)/?','index.php?page_id='.$course_category_pageid.'&category1_slug=$matches[1]','top');
  //キーワード
  // add_rewrite_rule('^course/search/?q=([^/]*)','index.php?page_id='.$course_search_pageid.'&keyword=$matches[1]','top');
  //詳細
  add_rewrite_rule('^course/detail/([^&]+)/?','index.php?page_id='.$course_detail_pageid.'&merchandise_id=$matches[1]','top');

}
add_action('init', 'custom_rewrite_rule', 10, 0);

//---------------------------------------
//商品情報取得関数
//(引数) prm_merchandise_id 商品ID(number)
//(戻り値) tag_listの配列
//---------------------------------------

function get_api_course($prm_merchandise_id) {
  global $base_api_url;
  if ($prm_merchandise_id) {
    $course_url    = $base_api_url . '/merchandise/?merchandise_id=' . $prm_merchandise_id;
    $course_json   = file_get_contents($course_url);
    $course_json   = mb_convert_encoding($course_json, 'UTF8', 'ASCII,JIS,UTF-8,EUC-JP,SJIS-WIN');
    $course_obj    = json_decode( $course_json ) ; //オブジェクト変換
    $tmp_course_info;
    if ($course_obj->result !== 'ng') {
      $tmp_course_info = $course_obj->course_info;
    }
    return $tmp_course_info;
  }
}
//---------------------------------------
//タグのみ取得関数
//(引数) prm_merchandise_id 商品ID(number)
//(戻り値) tag_listの配列
//---------------------------------------

function get_api_tags($prm_merchandise_id) {
  global $base_api_url;
  if ($prm_merchandise_id) {
    $tag_url    = $base_api_url . '/merchandise/?merchandise_id=' . $prm_merchandise_id;
    $tag_json   = file_get_contents($tag_url);
    $tag_json   = mb_convert_encoding($tag_json, 'UTF8', 'ASCII,JIS,UTF-8,EUC-JP,SJIS-WIN');
    $tag_obj    = json_decode( $tag_json ) ; //オブジェクト変換
    $tags;
    if ($tag_obj->result !== 'ng') {
      $tags = $tag_obj->course_info->tag_list;
    }
    return $tags;
  }
}


//------------------------------------------------------------------------//
//---------------------------------------
// ユーザープロフィールの項目のカスタマイズ
//---------------------------------------
function my_user_meta($wb)
{
//項目の追加例
$wb['position'] = '役職';

return $wb;
}
add_filter('user_contactmethods', 'my_user_meta', 10, 1);
//------------------------------------------------------------------------//


/* srcset　無効化 */
add_filter( 'wp_calculate_image_srcset_meta', '__return_null' );
add_filter( 'wp_calculate_image_srcset', '__return_false' );
remove_filter( 'the_content', 'wp_make_content_images_responsive' );

/* タイトルタグ */
add_theme_support( 'title-tag' );
/* タイトル区切り文字を変更 */
function change_title_separator( $sep ){
  $sep = '|';
  return $sep;
}
add_filter( 'document_title_separator', 'change_title_separator' );



////////////////////////////////////
//  抜粋の文字数変更
////////////////////////////////////
function twpp_change_excerpt_length( $length ) {
  return 40;
}
add_filter( 'excerpt_length', 'twpp_change_excerpt_length', 999 );


////////////////////////////////////
//  検索バーのカスタマイズ
////////////////////////////////////
function custom_search($search, $wp_query  ) {
    //query['s']があったら検索ページ表示
    if ( isset($wp_query->query['s']) ) $wp_query->is_search = true;
    return $search;
}
add_filter('posts_search','custom_search', 10, 2);


function change_document_title_parts( $title_parts ){

    //デフォルトとしてタグラインとサイト名は表示しないようにセット
    //$title_parts['tagline'] = '';
    //$title_parts['site'] = '';

  $site_name = trim( get_bloginfo('name') );
  $title_parts['tagline'] = '';
  if(is_search()): //検索結果ページの場合
      $title_parts['title'] = '検索結果';
  elseif(is_404()): //404ページの場合
    $title_parts['title'] = 'お探しのページは見つかりませんでした';
  endif;

  return $title_parts;
}
add_filter( 'document_title_parts', 'change_document_title_parts' );



/* jQuery の読み込み */
function add_my_scripts() {
  if(is_admin()) return; //管理画面ではスクリプトは読み込まない

  wp_enqueue_scripts ( 'jquery'); //デフォルトの jQuery は読み込まない
  //CDN から読み込む
  //wp_enqueue_script( 'jquery', '//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js', array(), '1.10.2', false);
  //wp_enqueue_script( 'jquery-mig', '//cdnjs.cloudflare.com/ajax/libs/jquery-migrate/1.2.1/jquery-migrate.min.js', array(), '1.2.1', false);
}
add_action('wp_print_scripts', 'add_my_scripts');


remove_action('wp_head', 'rel_canonical');
add_action( 'wp_head', 'add_canonical' );
function add_canonical() {
  $canonical = null;
  if( is_home() || is_front_page() ) {
  $canonical = home_url();
  } elseif ( is_category() ) {
  $canonical = get_category_link( get_query_var('cat') );
  } else if(is_tag()){
  $canonical = get_tag_link(get_queried_object()->term_id);
  } elseif ( is_search() ) {
  $canonical = get_search_link();
  } elseif ( is_page() || is_single() ) {
  $canonical = get_permalink();
  } else{
  $canonical = home_url();
  }
  echo '<link rel="canonical" href="'.$canonical.'">'."\n";
}



//管理画面CSS
function admin_css() {
  echo '<link rel="stylesheet" type="text/css" href="'.get_bloginfo("template_directory").'/admin.css">';
}
add_action('admin_head', 'admin_css');


//ダッシュボードタイトル
function adminTxtReplace(){
  echo'
<script type="text/javascript">
//<![CDATA[
window.onload=adminTxtReplace
function adminTxtReplace(){
  document.body.innerHTML = document.body.innerHTML.replace(/\<h1\>ダッシュボード\<\/h1\>/g, "\<h1\ style\=\"background\:\#000000\;\ text\-align\:center\; color\:\#fff\; padding\:200px 10px\;\"\>ダッシュボード\<br\>\<span style\=\"font-size\:12px\;\"\>content management system</span>\<\/h1\>");
}
//]]>
</script>';
}
add_action('admin_head-index.php', 'adminTxtReplace', 20);



//////////////////////////////////////////////////////////////////////

// 管理画面非表示
function remove_admin_menus() {

    // level10以外のユーザーの場合
    if (!current_user_can('level_10')) {

        global $menu;

        // unsetで非表示にするメニューを指定
        //unset($menu[2]);        // ダッシュボード
        //unset($menu[5]);        // 投稿
        //unset($menu[10]);       // メディア

        //unset($menu[20]);       // 固定ページ
        unset($menu[25]);       // コメント
        unset($menu[60]);       // 外観
        unset($menu[65]);       // プラグイン
        unset($menu[70]);       // ユーザー
        unset($menu[75]);       // ツール
        unset($menu[80]);       // 設定


        remove_menu_page('cptui_main_menu');//CPT
        remove_menu_page('edit.php?post_type=acf');//ACF
        remove_menu_page ('toolset-dashboard');//Types

    }
}


add_action('admin_menu', 'remove_admin_menus', 11);
//プラグイン非表示の場合「,11」にする（プライオリティを10以上を指定）

function add_jquery() {
  if ( !is_admin() ) {
   // jQueryを読み込まないようにする
   wp_deregister_script('jquery');
  }
}
add_action( 'wp_enqueue_scripts', 'add_jquery');



add_theme_support('post-thumbnails');



//unsetを使う場合は配列番号、remove_menu_pageを使う場合は、「2 =>」の箇所の値を指定
/*
 function remove_menus () {
     global $menu;
     var_dump($menu);
 }
 add_action('admin_menu', 'remove_menus');




