$(function(){
  var $email = $("#email"), arr = ['qq.com', 'gmail.com', '126.com', '163.com', 'hotmail.com', 'yahoo.com', 'yahoo.com.cn', 'live.com', 'sohu.com', 'sina.com'], count = 60;
      function email_err() {
        $(".reg_tip").append("<span class='reg_err'></span><span>您输入的邮箱格式有误！</span>");
      }
      function email_reload_time() {
        setInterval(function() {
          if (count > 1) {
            $(function() {
              count--;
              $('.email_resend').html(count + "s后重新发送");
            })
          } else {
            $('.email_resend').html("重新发送邮件");
            return false;
          }
        }, 1000)
      }
      function email_succ() {
        $(".reg_tip").append("<span class='email_succ'></span>");
      }
      function email_tip() {
        $(".reg_tip").append("<span class='reg_remind'><span class='reg_triangle'><span class='reg_small_triangle'></span></span>输入您常用的邮箱，方便登录和找回密码</span>");
      }
      function email_null_tip() {
        $(".reg_tip").append("<span class='reg_err'></span><span>您的邮箱为空</span>");
      }
      function email_send_ok() {
        $('.ipt_list').children().remove();
        $('.ipt_list').append("<li class='reg_send_ok'>" + "<span class='email_succ'></span>" + "<span>验证邮件已发送到邮箱</span>" + "<a href='#' class='reg_email'>baodou.jiayou@qq.com</a>" + "</li>");
        $('.main_item').append("<div class='email_verify_box'>" + "<a href='#' class='email_login'>登录邮箱验证</a>" + "<span class='email_resend'>60s后发送邮件</span>" + "</div>")
      }
      function set_pwd() {
        $('.ipt_list').children().remove();
        $('.email_verify_box').remove();
        $('.ipt_list').append("<li class='reg_pwd'>" + "<label for='pwd'>登录密码:</label>" + "<input type='password' name='pwd' id='pwd' maxlength='16'/>" + "<span class='reg_tip'></span>" + "<div class='pwd_save'></div>" + "</li>" + "<li class='reg_re_pwd'>" + "<label for='re_pwd'>确认密码:</label>" + "<input type='password' name='re_pwd' id='re_pwd' maxlength='16'/>" + "<span class='reg_tip'></span>" + "</li>")
      }
      $email.focus(function() {
        $(".reg_tip").children().remove();
        email_tip();
        $(this).keyup(function() {
          $(".reg_tip").children().remove();
          $(".email_tip").remove();
          var $val = $email.val(), leng = $val.length, len = $val.indexOf('@'), index = 0;
          if ($val != '') {
            if (len >= 0) {
              $val_start = $val.substring(0, len);
              $val_end = $val.substring(len + 1, leng);
              if ($val_start != '') {
                var $email_tip = $("<ul class='email_tip'></ul>");
                for (var i = 0; i < 10; i++) {
                  if (arr[i].indexOf($val_end) == 0) {
                    $email_tip.append("<li>" + $val_start + "@" + arr[i] + "</li>");
                    index++;
                  }
                }
                if (index > 0) {
                  $(".reg_ipt").append($email_tip);
                } else {
                  $(".reg_tip").children().remove();
                  email_err();
                }
              } else {
                $(".reg_tip").children().remove();
                email_err();
              }
            } else {
              $(".reg_ipt").append("<ul class='email_tip'><li>" + $val + "@qq.com</li><li>" + $val + "@gmail.com</li><li>" + $val + "@126.com</li><li>" + $val + "@163.com</li><li>" + $val + "@hotmail.com</li><li>" + $val + "@yahoo.com</li><li>" + $val + "@yahoo.com.cn</li><li>" + $val + "@live.com</li><li>" + $val + "@sohu.com</li><li>" + $val + "@sina.com</li></ul>");
            }
          }
        })
      })
      $email.blur(function() {
        $(".reg_tip").children().remove();
        var $val = $email.val(), leng = $val.length, len = $val.indexOf('@');
        if ($val == '') {
          email_null_tip()
        } else {
          if (len > 0) {
            $val_end = $val.substring(len + 1, leng);
            if ($val_end.indexOf('.com') >= 0) {
              email_succ();
            }
          } else {
            email_err();
          }
        }
      })
      $(document).on("click", ".email_tip>li", function() {
        $(".reg_tip").children().remove();
        $(this).parent(".email_tip").remove();
        $email.val($(this).html());
        email_succ();
        return false;
      });
      $(document).on('click', '.step1_next', function() {
        var $val = $email.val();
        if ($('.reg_ipt').has($('.email_succ'))) {
          $('.reg_submit').css('display', 'none');
          email_send_ok();
        }
        email_reload_time();
      })
      $(document).on('click', '.email_login', function() {
        $('.step').removeClass('step1').addClass('step2');
        $('.reg_submit').show();
        $('.register_btn').removeClass('step1_next').addClass('step2_next');
        set_pwd();
      })
      $('.ipt_list').on('focus', '.reg_pwd', function() {
        $('#pwd').keyup(function() {
          var $val = $('#pwd').val(), leng = $val.length;
          if (leng > 0 && leng < 7) {
            $('.pwd_save').addClass('pwd_save_low').removeClass('pwd_save_middle', 'pwd_save_high');
          } else if (leng > 6 && leng < 14) {
            $('.pwd_save').addClass('pwd_save_middle').removeClass('pwd_save_low', 'pwd_save_high');
          } else if (leng > 13) {
            $('.pwd_save').addClass('pwd_save_high').removeClass('pwd_save_middle', 'pwd_save_low');
          }
        })
      })
      $('.ipt_list').on('blur', '.reg_pwd', function() {
        $('.reg_tip').children().remove();
        var $val = $('#pwd').val();
        if ($val == '') {
          $('.reg_pwd>.reg_tip').append("<span class='reg_err'></span><span>密码为空！</span>")
        } else if ($val.length < 6) {
          $('.reg_pwd>.reg_tip').append("<span class='reg_err'></span><span>请输入6位以上密码！</span>")
        }
      })
      $('.ipt_list').on('focus', '.reg_re_pwd', function() {
        $('.reg_re_pwd>.reg_tip').children().remove();
        $('.reg_re_pwd>.reg_tip').append("<span class='reg_err'></span><span>请再次输入密码！</span>");
      })
      $('.ipt_list').on('blur', '.reg_re_pwd', function() {
        $('.reg_re_pwd>.reg_tip').children().remove();
        if ($('#re_pwd').val() == '') {
          $('.reg_re_pwd>.reg_tip').append("<span class='reg_err'></span><span>确定密码不能为空</span>");
        } else if ($('#pwd').val() == $('#re_pwd').val()) {
          $('.reg_re_pwd>.reg_tip').append("<span class='email_succ'></span>");
        } else {
          $('.reg_re_pwd>.reg_tip').append("<span class='reg_err'></span><span>两次密码输入不一致，请重新输入</span>");
        }
      })
      $(document).on('click', '.step2_next', function() {
        var $val = $('#pwd').val(), leng = $val.length;
        if (leng > 5 && leng < 14 && $val == $('#re_pwd').val()) {
          $('.step').removeClass('step2').addClass('step3');
          $('.ipt_list').children().remove();
          $('.reg_submit').remove();
          $('.ipt_list').append("<li class='reg_succ'>恭喜您，注册成功！<a href='#'>去裸游网首页</a></li>" + "<li class='reg_perfect'>为了方便您更好的享受裸游服务，建议完善您的资料</li>")
        }
      })
      $("a.agreement").on("click",function(){
          $("#dyPop").prev(".divMask").show().end().show();
      })
      $("#dyClose").on("click",function(){
        $("#dyPop").hide().prev(".divMask").hide();
      })
})
