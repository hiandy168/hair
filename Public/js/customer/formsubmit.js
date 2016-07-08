/**
 * 画面表单验证并提交  
 * 2016/07/08 11:45:53
 */

/**
 * 登陆画面 
 */
$(document).ready(function() {
  $("#loginForm").validate({
    doNotHideMessage: true,
    errorClass: "error",
    errorElement: "label",
    rules: {
      admin_name: {
        required:true,
        maxlength:60,
        chrengnum:true
      },
      admin_password: {
        required:true,
        maxlength:60,
        chrengnum:true
      }
    },
    messages: {

    }
  });
  $("#login_btn").click(function(e){
    login();
  });
  
});

document.onkeydown = function(e){
  if((e||event).keyCode==13) login();
};

this.login = function(){
  if($('#loginForm').valid()){
    $('#loginForm').ajaxSubmit({
      dataType: "json",
      type: "POST",
      success: function (data) {
        if (data.result == false) {
          layer.msg(data.message);
        } else {
          layer.msg(data.message);
          location.href = action_base_dir + "/index/";
        }
      },
      error: function (XMLHttpRequest, textStatus, errorThrown) {
        alert("errorThrown:" + errorThrown);
      },
    });
  }
};

/**
 * 管理员画面 
 */
this.admin_form_submit = function(elem){
  $("#admin_form").validate({
    doNotHideMessage: true,
    errorClass: "error",
    errorElement: "label",
    rules: {
      admin_name:{
        required:true,
        maxlength:60,
        chrengnum:true
      },
      admin_mail:{
        required:true,
        maxlength:60,
        email:true
      },
      admin_real_name:{
        required:true,
        maxlength:45
      },
      admin_tel:{
        required:true,
        maxlength:45,
        isMobile:true
      },
      admin_old_password:{
        required:true,
        maxlength:60,
        chrengnum:true
      },
      admin_new_password:{
        required:true,
        maxlength:60,
        chrengnum:true
      },
      readmin_new_password:{
        required:true,
        maxlength:60,
        chrengnum:true,
        equalTo:"#admin_new_password"
      }
    },
    messages: {

    }
  });
  
  if($('#admin_form').valid()){
    
    $('#admin_form').ajaxSubmit({
      dataType: "json",
      type: "POST",
      beforeSubmit: function(){
        //$(".body_overlay").show(500);
      },
      success: function (data) {
        //$(".body_overlay").hide(500);
        if (data.result == false) {
          layer.msg(data.message);
        } else {
          layer.msg(data.message);
          location.href = action_base_dir + "/admin/adminList";
        }
      },
      error: function (XMLHttpRequest, textStatus, errorThrown) {
        alert("errorThrown:" + errorThrown);
      }
    });
  }
};

/**
 * 员工画面 
 */
this.form_employee_submit = function(){
  $("#employee_form").validate({
    doNotHideMessage: true,
    errorClass: "error",
    errorElement: "label",
    rules: {
      employee_name:{
        required: true,
        maxlength: 255
      },
      employee_position_id:{
        required: true
      },
      employee_tel:{
        maxlength : 11,
        digits:true,
        isMobile:true
      },
      employee_id_card:{
        isIdCardNo:true
      },
      employee_bank_no:{
        maxlength : 30,
        digits:true
      },
      employee_comment:{
        maxlength : 200
      }
    },
    messages: {

    }
  });
  
  if($('#employee_form').valid()){
    
    $('#employee_form').ajaxSubmit({
      dataType: "json",
      type: "POST",
      success: function (data) {
        if (data.result == false) {
          layer.msg(data.message);
        } else {
          layer.msg(data.message);
          location.href = action_base_dir + "/employee/employeeList";
        }
      },
      error: function (XMLHttpRequest, textStatus, errorThrown) {
        alert("errorThrown:" + errorThrown);
      }
    });
   
  }
};


this.form_position_submit = function(){
  $("#employee_position").validate({
    doNotHideMessage: true,
    errorClass: "error",
    errorElement: "label",
    rules: {
    },
    messages: {

    }
  });
  
  if($('#employee_position').valid()){
    $(".widget input[name='employee_position_id[]']").each(function(index,elem){
      var input_employee_position_id = $(this);
      
      input_employee_position_id.val(input_employee_position_id.attr("data_employee_position_big_id") + "," + input_employee_position_id.val());
    });
    
    $('#employee_position').ajaxSubmit({
      dataType: "json",
      type: "POST",
      success: function (data) {
        if (data.result == false) {
          layer.msg(data.message);
        } else {
          layer.msg(data.message);
          location.href = action_base_dir + "/employee/employeeList";
        }
      },
      error: function (XMLHttpRequest, textStatus, errorThrown) {
        alert("errorThrown:" + errorThrown);
      },
    });
  }
};

this.form_employee_list_submit = function(){
  
  $('#employee_list_form').ajaxSubmit({
    dataType: "json",
    type: "POST",
    success: function (data) {
      if (data.result == false) {
        layer.msg(data.message);
      } else {
        layer.msg(data.message);
        location.href = action_base_dir + "/employee/employeeList";
      }
    },
    error: function (XMLHttpRequest, textStatus, errorThrown) {
      alert("errorThrown:" + errorThrown);
    }
  });
};

this.form_employee_list_file_submit = function(){
  
  $('#employee_list_file').ajaxSubmit({
    dataType: "json",
    type: "POST",
    success: function (data) {
      if (data.result == false) {
        layer.msg(data.message);
      } else {
        layer.msg(data.message);
        location.href = action_base_dir + "/employee/employeeList";
      }
    },
    error: function (XMLHttpRequest, textStatus, errorThrown) {
      alert("errorThrown:" + errorThrown);
    }
  });
};