/**
 * 
 */

$(document).ready(function() {
	
	$("#employee_position_id").on("change", function(event, data){
	  if(data){
	  	$("input[name='employee_position_id']").val(data.selected);
	  }
	});
	if($("#employee_position_id").length > 0){
		$("#employee_position_id").chosen({disable_search_threshold: 10});
	}
});

this.employeeAdd = function(){
	location.href = action_base_dir + "/employee/toEmployeeAdd";
};

this.employeePositionList = function(){
	location.href = action_base_dir + "/employee/toEmployeePositionList";
};

this.employeeListAdd = function(){
	location.href = action_base_dir + "/employee/toEmployeeListAdd";
};

this.addRow = function(elem){
	var dtrow = $("#tbody").children().first('tr').clone();
	
	dtrow.find("input").val("");
	
	dtrow.insertBefore($("#tbody").children().last('tr'));
	
	return false;
	
};

this.delRow = function(elem){
	if($("#tbody").find('tr').length>2){
		$("#tbody").children().last('tr').prev().remove();
	}
	
	return false;
};

this.add_category_sub = function(element,employee_position_big_id){
	var html_text = "";
	html_text = html_text + '<input type="hidden" placeholder="" class="span12" data_employee_position_big_id="'+employee_position_big_id+'" name="employee_position_id[]" value=""/>';
	html_text = html_text + '<input type="text" placeholder="" class="span12" data_employee_position_big_id="'+employee_position_big_id+'"  name="employee_position_name[]" value=""/>';
	$(element).parents(".widget").find(".widget-body input:last").after(html_text);
};

this.employee_update = function(employee_id){
	location.href = action_base_dir + "/employee/toEmployeeUpdate/employee_id/"+employee_id;
};

this.employee_delete = function(employee_id){
	layer.confirm('确定删除？', {
		btn : ['确定', '取消']
	}, function() {
		
		$.ajax({
			url: action_base_dir + "/employee/employeeDelete/employee_id/"+employee_id,
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
		
	}, function() {
	}); 
};

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