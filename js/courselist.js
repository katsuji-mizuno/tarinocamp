/*--------------------
 ページネーション
---------------------*/
$(window).on("load", function() {
  $(".pager").jPages({
    containerID : "course_list",
    previous : "《",
    next : "》",
    perPage:10,
    minHeight: false,
    midRange: 4,
    callback    : function( pages,items ){
      $("#course_list").css('min-height', '');
    }
  });
  
});

