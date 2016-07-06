/**
 * 
 */
$(document).ready(function() {
	
	if($("#employee_search").length>0){
		$("#employee_search").fancybox({
		});
	}
	
	if($("select[name='member_card_type_id']").length > 0){
		$("select[name='member_card_type_id']").change(function(){
			
			var member_card_discount = $("select[name='member_card_type_id'] option:selected").attr("data-member-card-type-discount");
			
			$("input[name='member_card_discount']").val(member_card_discount);
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

//会员卡类型添加页面跳转
this.cardTypeAdd = function(){
	location.href = action_base_dir + "/member/toMemberCardTypeAdd";
};

//会员卡类型修改页面跳转
this.cardTypeUpdate = function(member_card_type_id){
	location.href = action_base_dir + "/member/toMemberCardTypeUpdate/member_card_type_id/"+ member_card_type_id;
};

//会员卡类型删除处理
this.cardTypeDelete = function(member_card_type_id){
	layer.confirm('确定删除？', {
		btn : ['确定', '取消']
	}, function() {
		
		$.ajax({
			url: action_base_dir + "/member/memberCardTypeDelete/member_card_type_id/"+member_card_type_id,
			dataType: "json",
			type: "POST",
			success: function (data) {
				if (data.result == false) {
					layer.msg(data.message);
				} else {
					layer.msg(data.message);
					location.href = action_base_dir + "/member/memberCardTypeList";
				}
			},
			error: function (XMLHttpRequest, textStatus, errorThrown) {
				alert("errorThrown:" + errorThrown);
			}
		});
		
	}, function() {
	}); 
};

//会员卡类型表单提交
this.form_card_type_submit = function(){
	$("#card_type_form").validate({
		doNotHideMessage: true,
		errorClass: "error",
		errorElement: "label",
		rules: {
			member_card_type_name:{
				required: true,
				maxlength: 200
			},
			service_discount:{
				required: true,
				digits:true,
				min:0,
				max:10
			},
			course_discount:{
				required: true,
				digits:true,
				min:0,
				max:10
			},
			comment:{
				maxlength: 1000
			}
		},
		messages: {

		}
	});
	
	if($('#card_type_form').valid()){
		
		$('#card_type_form').ajaxSubmit({
			dataType: "json",
			type: "POST",
			success: function (data) {
				if (data.result == false) {
					layer.msg(data.message);
				} else {
					layer.msg(data.message);
					location.href = action_base_dir + "/member/memberCardTypeList";
				}
			},
			error: function (XMLHttpRequest, textStatus, errorThrown) {
				alert("errorThrown:" + errorThrown);
			}
		});
	}
};


this.form_card_type_commision_submit = function(elem){
	
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
		//$(elem).parents("form").submit();
	}
};


this.form_member_submit = function(){
	
	$("#member_form").validate({
		doNotHideMessage: true,
		errorClass: "error",
		errorElement: "label",
		rules: {
		},
		messages: {

		}
	});
	
	if($('#member_form').valid()){
		$('#member_form').ajaxSubmit({
			dataType: "json",
			type: "POST",
			success: function (data) {
				if (data.result == false) {
					layer.msg(data.message);
				} else {
					layer.msg(data.message);
					location.href = action_base_dir + "/member/toMemberAdd";
				}
			},
			error: function (XMLHttpRequest, textStatus, errorThrown) {
				alert("errorThrown:" + errorThrown);
			}
		});
	}
};

this.select_row = function(employee_id,employee_no,employee_name){
	var table_tr = '';
	
	table_tr = table_tr + "<tr>";
	table_tr = table_tr + "<td>";
	table_tr = table_tr + "<input class='span12' type='text' name='employee_no[]' readonly value='"+employee_no+"'>";
	table_tr = table_tr + "<input class='span12' type='hidden' name='employee_id[]' readonly value='"+employee_id+"'>";
	table_tr = table_tr + "</td>";
	table_tr = table_tr + "<td>";
	table_tr = table_tr + "<input class='span12 ' type='text' name='employee_name[]' readonly value='"+employee_name+"'>";
	table_tr = table_tr + "</td>";
	table_tr = table_tr + "<td>";
	table_tr = table_tr + "<input class='span12 ' type='text' name='order_result[]' value=''>";
	table_tr = table_tr + "</td>";
	table_tr = table_tr + "<td>";
	table_tr = table_tr + "<input class='span12 ' type='text' name='order_commision[]' value=''>";
	table_tr = table_tr + "</td>";
	table_tr = table_tr + "</tr>";
	
	$("#member_content tbody").prepend(table_tr);
	
	$.fancybox.close();
};

this.memberCardTypeCommisionProcess = function(member_card_type_id){
	location.href = action_base_dir + "/member/toMemberCardTypeCommisionProcess/member_card_type_id/"+member_card_type_id;
};

this.radio_update = function(elem){
	$(elem).parent().find("input[type='radio']").attr("checked",true);
	$(elem).parent().parent().find("input[type='text']").val("");
	$.uniform.update();
};
