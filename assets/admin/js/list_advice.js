/* [ ---- Gebo Admin Panel - tables ---- ] */

  $(document).ready(function() {
    //* 先初始化表格中的数据
    gebo_datatbles.dt_a();
        //* actions for tables, datatables
        gebo_select_row.init();
    gebo_delete_rows.simple();
    gebo_delete_row.init();
    //gebo_add_row.init();
  });
  
  gebo_datatbles = {
    dt_a: function() {
      $('#smpl_tbl').dataTable({
                "sDom": "<'row'<'span6'<'dt_actions'>l><'span6'f>r>t<'row'<'span6'i><'span6'p>>",
                "sPaginationType": "bootstrap_alt",
                "oLanguage": {
                    "sLengthMenu": "_MENU_ 记录每页"
                },
                "aoColumnDefs": [
            { "bSortable": false, "aTargets": [ 0 ] },
            { "bSortable": false, "aTargets": [ 6 ] }
          ]
            });
    }
  }
  //* select all rows
  gebo_select_row = {
    init: function() {
      $('.select_rows').click(function () {
        var tableid = $(this).data('tableid');
                $('#'+tableid).find('input[name=row_sel]').attr('checked', this.checked);
      });
    }
  };
  
  //* delete rows
  gebo_delete_rows = {
    simple: function() {
      $(".delete_rows_simple").on('click',function (e) {
        e.preventDefault();
        var tableid = $(this).data('tableid');
        var $selectedRows = $('input[name=row_sel]:checked', '#'+tableid);
                if($selectedRows.length) {
                    $.colorbox({
                        initialHeight: '0',
                        initialWidth: '0',
                        href: "#confirm_dialog",
                        inline: true,
                        opacity: '0.3',
                        onComplete: function(){
                            $('.confirm_yes').click(function(e){
                                e.preventDefault();
                                var aNews = [];
                                $selectedRows.each(function(index, elem){
                                  aNews.push(elem.value);
                                });
                                $.get("../admin/member/remove", {memberIds:aNews}, function(data){
                                  
                                  if(data == "success"){
                                    
                                   alert("全部已禁言");
                                  }
                                },'text');
                                $.colorbox.close();
                            });
                            $('.confirm_no').click(function(e){
                                e.preventDefault();
                                $.colorbox.close(); 
                            });
                        }
                    });
                }
      });
    }
  };
  
  
  gebo_delete_row = {
    init: function(){
      $(".delete_row").on("click",function(e){
        e.preventDefault();
        var newsId = $(this).data('aid');
        //$(this).parents("tr").remove();
        var _this = this;
        
        $.colorbox({
                    initialHeight: '0',
                    initialWidth: '0',
                    href: "#confirm_dialog",
                    inline: true,
                    opacity: '0.3',
                    onComplete: function(){
                        $('.confirm_yes').click(function(e){
                            e.preventDefault();
                        
                            $.get("../admin/member/remove", {memberIds:newsId}, function(data){
                              if(data == "success"){
                                alert("已禁言");
                              }
                            },'text');
                            $.colorbox.close();
                        });
                        $('.confirm_no').click(function(e){
                            e.preventDefault();
                            $.colorbox.close(); 
                        });
                    }
              });
      });
    }
  }     


