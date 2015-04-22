$(function(){
  $("#typename").on("mousemove",function(){
    $(this).children(".tn_search_bar").show().prev("#spic").css("background","url(http://img3.tuniucdn.com/img/20141204/index/up.jpg) 100% 50% no-repeat");
  }).on("mouseout",function(){
     $(this).children(".tn_search_bar").hide().prev("#spic").css("background","url(http://img3.tuniucdn.com/img/20141204/index/down.jpg) 100% 50% no-repeat");
  })
  $("#typename > .tn_search_bar > .type_s").on("click",function(){
    $("#typename > span").text($(this).text());
    $(this).hide().siblings(".type_s").show().end().parent(".tn_search_bar").hide();
  })
})
