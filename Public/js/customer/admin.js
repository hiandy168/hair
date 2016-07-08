/**
 * 
 */

$(document).ready(function() {
});

this.adminAdd = function(){
	location.href = action_base_dir + "/admin/toAdminAdd";
};

this.checkBoxAll = function(elem){
	if(elem.checked == true){
		$(elem).parents(".control-group").find("input[type='checkbox']").attr("checked",true);
	}else{
		$(elem).parents(".control-group").find("input[type='checkbox']").attr("checked",false);
	}
	
	$.uniform.update();
};

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


this.admin_update = function(admin_id,upd_kbn){
	location.href = action_base_dir + "/admin/toAdminUpdate/admin_id/"+ admin_id + "/upd_kbn/"+upd_kbn;
};


this.admin_delete = function(admin_id,admin_name){
	layer.confirm('确定删除？', {
		btn : ['确定', '取消']
	}, function() {
		$.ajax({
			url: action_base_dir + "/admin/adminDelete/admin_id/"+admin_id+"/admin_name/"+admin_name,
			dataType: "json",
			type: "POST",
			success: function (data) {
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
		
	}, function() {
	}); 
};

