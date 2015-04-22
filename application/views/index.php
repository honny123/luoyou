<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8"/>
    <title>裸游网</title>
    <link rel="stylesheet" type="text/css" href="<?php echo site_url('assets/css/normalize.css'); ?>"/>
    <link rel="stylesheet" type="text/css" href="<?php echo site_url('assets/css/index.css'); ?>"/>
  </head>
  <body>
    <!-- 头部start-->
    <!-- 登陆条start -->
    <div class="header_top">
      <div class="header_inner clearfix">
        <ul class="index_top_nav" id="user_login_info">
          <div class="login_menu clearfix">
            <li><a href="<?php echo site_url('login'); ?>" target="_blank">登录</a>|</li>
            <li><a href="<?php echo site_url('register'); ?>" target="_blank">注册</a></li>
          </div>
         </ul>
      </div>
    </div>
    <!-- 登陆条end -->
    <!-- 头部中start -->
    <div class="header_search">
      <div class="header_inner">
          <!-- logo start -->
          <div class="site_logo">
            <a href="http://www.tuniu.com/" target="_blank" class="logo_a">
              <img src="//ssl3.tuniucdn.com/site/images/index/logo_v4.gif" title="裸游网" onclick="_gaq.push(['_trackEvent', 'common_hz','logo','途牛旅游网']);tuniuRecorder.push('3_1_1_1_1_1');">
            </a>
          </div>
           <a href="http://www.tuniu.com" target="_blank" class="logo_a"></a>            
          <!-- logo end -->
          <!-- 预定城市start -->
                          <!-- 预定城市end -->
              <!-- 搜索框start -->
              <div class="tn_search_box ">
                  <div id="tnSearchBox" class="clearfix">
                    <form id="route_search" name="route_search" method="post" onsubmit="return delay(event);" action="http://s.tuniu.com/whole" target="_self">
                      <div class="tn_s_select" id="typename">
                        <span style="">所有帖子</span>
                        <div id="spic" class="spic"></div>
                        <div class="tn_search_bar">
                          <div class="type_s" style="display:none" classify="0">所有帖子</div>
                          <div class="type_s" classify="1" style="">AA结伴</div>
                          <div class="type_s" classify="2" style="">裸游分享</div>
                          <div class="type_s" classify="12" style="">裸游锦囊</div>
                       </div>
                      </div>
                   <p class="tn_s_input">
                     <input id="keyword-input" type="text" style="color: rgb(153, 153, 153);" autocomplete="off" data="" placeholder="藏行锦囊">
                   </p>
                   <p class="tn_s_button" onclick="_gaq.push(['_trackEvent', 'common_hz','search','搜索']);tuniuRecorder.push('3_3_1_1_1_2');">
                     <button type="button" onclick="search_sub();" id="searchSub"></button>
                   </p>
                   <div id="check_route_hi"></div>
                 </form>
                 </div>
               </div>
              <!-- 搜索框end -->
              <!-- tuniu电话start -->
              <div class="site_contact">
                 我要发帖
               </div>                <!-- tuniu电话end -->
          </div>
      </div>
     <!-- 头部中end -->
     <!-- 横向导航菜单start -->
    <div class="header_nav index clearfix">
      <div class="index_nav_menu">
        <div class="menu_panel">
          <div class="inner clearfix">
            <ul class="menu_list clearfix">
              <li class="menu_first">
                <a class="cur_nav" href="# title="首页">首页</a>
              </li>
              <li>
                 <a href="＃">裸游论坛</a>
              </li>
              <li>
                 <a href="＃">裸游锦囊</a>
              </li>
            </ul>
          </div>
          <div class="subMenu_panel">
              <ul class="ubMenu_list">
                <li class="subMenu_col">
                  <i class="header_icon icon_arrowUp2"></i>
                  <ul>
                    <li class="">
                      <a href="#">AA结伴</a>
                    </li>
                    <li class="">
                      <a href="＃">裸游分享</a>
                    </li>
                  </ul>
                </li>
              </ul>
          </div>
        </div>
      </div>
    </div>
    <!-- 横向导航菜单end -->
    <!-- 头部end-->
    <script src="<?php echo site_url('assets/js/jquery-1.11.2.min.js'); ?>"></script>
    <script src="<?php echo site_url('assets/js/index.js'); ?>"></script>
  </body>
</html>