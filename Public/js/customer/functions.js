/**
 * JavaScript 函数设定
 */

/**
 * 带参数的页面跳转
 */
this.toLink = function(url,args){
  
  var params = "";
  if(args != ""){
    $.each(eval('(' + args + ')'),function(key,value){
      params = params + key + "/" + value + "/";
    });  
  }
  location.href = action_base_dir + url + params;
};

/**
 * 带参数的ajax请求
 */
this.ajaxRequest = function(url,returnUrl,args,msg){
  var params = "";
  if(args != ""){
    $.each(eval('(' + args + ')'),function(key,value){
      params = params + key.toString() + "/" + value.toString() + "/";
    });  
  }
  if(msg != ""){
    layer.confirm(msg, {
      btn : ['确定', '取消']
    }, function() {
      $.ajax({
        url: action_base_dir + url + params,
        dataType: "json",
        type: "POST",
        success: function (data) {
          if (data.result == false) {
            layer.msg(data.message);
          } else {
            layer.msg(data.message);
            location.href = action_base_dir + returnUrl;
          }
        },
        error: function (XMLHttpRequest, textStatus, errorThrown) {
          alert("errorThrown:" + errorThrown);
        }
      });
    }, function() {
    }); 
  }else{
    $.ajax({
      url: action_base_dir + url + params,
      dataType: "json",
      type: "POST",
      success: function (data) {
        if (data.result == false) {
          layer.msg(data.message);
        } else {
          layer.msg(data.message);
          location.href = action_base_dir + returnUrl;
        }
      },
      error: function (XMLHttpRequest, textStatus, errorThrown) {
        alert("errorThrown:" + errorThrown);
      }
    });
  }
};

/**
 * 点击父级复选框的时候，子复选框也全部被处理 
 */
this.checkBoxAll = function(elem){
  if(elem.checked == true){
    $(elem).parents(".control-group").find("input[type='checkbox']").attr("checked",true);
  }else{
    $(elem).parents(".control-group").find("input[type='checkbox']").attr("checked",false);
  }
  
  $.uniform.update();
};

/**
 * 当子复选框点击的时候，父级复选框也被处理 
 */
this.checkBox = function(elem){
  var checked_count = 0;
  
  var check_count = 0;
  
  $(elem).parents(".controls").find("input[type='checkbox']").each(function(){
    if($(this).attr("checked") == "checked"){
      check_count = check_count + 1; 
    }
    
    checked_count = checked_count + 1;
  });
  
  if(checked_count == check_count){
    $(elem).parents(".control-group").find(".role_id_all").attr("checked",true);
  }else{
    $(elem).parents(".control-group").find(".role_id_all").attr("checked",false);
  }
  
  $.uniform.update();
};

/**
 * 加一行 
 */
this.addRow = function(elem){
  var dtrow = $(elem).parents("tbody").children().first('tr').clone();
  dtrow.find("input").val("");
  dtrow.insertBefore($(elem).parents("tbody").children().last('tr'));
  return false;
};


/**
 * 减一行 
 */
this.delRow = function(elem){
  if($(elem).parents("tbody").find('tr').length>2){
    $(elem).parents("tbody").children().last('tr').prev().remove();
  }
  
  return false;
};