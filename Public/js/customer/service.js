/**
 * 
 */
$(document).ready(function() {
	
	if($("input[name='result_amount_setting']").length > 0){
		$("input[name='result_amount_setting']").focus(function(){
			$(this).parents(".input-prepend").find("input[name='result_type']").attr('checked',true);
		});
	}
	
	if($("input[name='result_discount_setting']").length > 0){
		$("input[name='result_discount_setting']").focus(function(){
			$(this).parents(".input-prepend").find("input[name='result_type']").attr('checked',true);
		});
	}
	
	if($(".fancybox").length>0){
		$(".fancybox").fancybox({
			"onComplete" :function(){
				
				if($("input[name='open_type']").length > 0){
					$("input[name='open_type']").uniform();
				}
				
				if($("input[name='charge_type']").length > 0){
					$("input[name='charge_type']").uniform();
				}
			}
		});
	}
	
});

//服务项目添加跳转
this.serviceAdd = function(){
	location.href = action_base_dir + "/service/toServiceAdd";
};

//服务项目更新跳转
this.serviceUpdate = function(service_id){
	location.href = action_base_dir + "/service/toServiceUpdate/service_id/"+ service_id;
};

//服务项目类型处理
this.serviceTypeCategoryAdd = function(){
	location.href = action_base_dir + "/service/toServiceCategoryProcess";
};

//服务项目删除处理
this.serviceDelete = function(service_id){
	layer.confirm('确定删除？', {
		btn : ['确定', '取消']
	}, function() {
		
		$.ajax({
			url: action_base_dir + "/service/serviceDelete/service_id/"+service_id,
			dataType: "json",
			type: "POST",
			success: function (data) {
				if (data.result == false) {
					layer.msg(data.message);
				} else {
					layer.msg(data.message);
					location.href = action_base_dir + "/service/serviceList";
				}
			},
			error: function (XMLHttpRequest, textStatus, errorThrown) {
				alert("errorThrown:" + errorThrown);
			}
		});
		
	}, function() {
	}); 
};


this.add_category = function(elem){
	
	var parent_div = $(elem).parent();
	var num=parent_div.nextAll().length;
	
	if(num == 0){
		
		var cParentDiv = parent_div.clone();
		
		cParentDiv.find("input").val("");
		
		cParentDiv.insertAfter($(".widget").find(".widget-body").children().children().last("div"));
		
		//$.uniform.update();
	}
	
};

this.form_service_type_category_submit=function(){
	
	//服务项目分类名的验证
	$()
	
	$('#service_type_category').ajaxSubmit({
		dataType: "json",
		type: "POST",
		success: function (data) {
			if (data.result == false) {
				layer.msg(data.message);
			} else {
				layer.msg(data.message);
				location.href = action_base_dir + "/service/toServiceCategoryProcess";
			}
		},
		error: function (XMLHttpRequest, textStatus, errorThrown) {
			alert("errorThrown:" + errorThrown);
		}
	});
};

this.form_service_submit = function(){
	$("#service_form").validate({
		doNotHideMessage: true,
		errorClass: "error",
		errorElement: "label",
		rules: {
			service_name:{
				required: true,
				maxlength: 255
			},
			service_price:{
				required: true,
				number:true
			},
			hand_price:{
				number:true
			},
		},
		messages: {

		}
	});
	
	if($('#service_form').valid()){
		
		$('#service_form').ajaxSubmit({
			dataType: "json",
			type: "POST",
			success: function (data) {
				if (data.result == false) {
					layer.msg(data.message);
				} else {
					layer.msg(data.message);
					location.href = action_base_dir + "/service/serviceList";
				}
			},
			error: function (XMLHttpRequest, textStatus, errorThrown) {
				alert("errorThrown:" + errorThrown);
			}
		});
	}
};

this.radio_update = function(elem){
	$(elem).parent().find("input[type='radio']").attr("checked",true);
	$(elem).parent().parent().find("input[type='text']").val("");
	$.uniform.update();
};


this.form_service_commision_submit = function(elem){
	
	$(elem).parents("form").validate({
		doNotHideMessage: true,
		errorClass: "error",
		errorElement: "label",
		rules: {
		},
		messages: {

		}
	});
	
	if($(elem).parents("form").valid()){
		$(elem).parents("form").ajaxSubmit({
			dataType: "json",
			type: "POST",
			success: function (data) {
				if (data.result == false) {
					layer.msg(data.message);
				} else {
					layer.msg(data.message);
					location.href = action_base_dir + "/member/memberCardTypeCommisionList";
				}
			},
			error: function (XMLHttpRequest, textStatus, errorThrown) {
				alert("errorThrown:" + errorThrown);
			}
		});
	}
};
