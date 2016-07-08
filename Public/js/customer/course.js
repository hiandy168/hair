/**
 * 
 */

$(document).ready(function() {
	
	if($("#service_search").length>0){
		$("#service_search").fancybox();
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


this.courseAdd = function(){
	location.href = action_base_dir + "/course/toCourseAdd";
};

this.serviceUpdate = function(course_id){
	location.href = action_base_dir + "/course/toCourseUpdate/course_id/"+ course_id;
};

this.courseCategoryAdd = function(){
	location.href = action_base_dir + "/course/toCourseCategoryProcess";
};

this.courseDelete = function(course_id){
	layer.confirm('确定删除？', {
		btn : ['确定', '取消']
	}, function() {
		
		$.ajax({
			url: action_base_dir + "/course/courseDelete/course_id/"+course_id,
			dataType: "json",
			type: "POST",
			success: function (data) {
				if (data.result == false) {
					layer.msg(data.message);
				} else {
					layer.msg(data.message);
					location.href = action_base_dir + "/course/courseList";
				}
			},
			error: function (XMLHttpRequest, textStatus, errorThrown) {
				alert("errorThrown:" + errorThrown);
			}
		});
		
	}, function() {
	}); 
};

this.add_category = function(element){
	var html_text = "<input type='hidden' class='span12' name='category_id[]' />";
	html_text = html_text + "<input type='text' class='span12' name='category_name[]' />";
	$(".widget").find(".widget-body input:last").after(html_text);
};


this.form_course_category_submit=function(){
	$("#course_category").validate({
		doNotHideMessage: true,
		errorClass: "error",
		errorElement: "label",
		rules: {
		},
		messages: {

		}
	});
	
	if($('#course_category').valid()){
		
		$('#course_category').ajaxSubmit({
			dataType: "json",
			type: "POST",
			success: function (data) {
				if (data.result == false) {
					layer.msg(data.message);
				} else {
					layer.msg(data.message);
					location.href = action_base_dir + "/course/toCourseCategoryProcess";
				}
			},
			error: function (XMLHttpRequest, textStatus, errorThrown) {
				alert("errorThrown:" + errorThrown);
			}
		});
	}
};

this.form_course_submit=function(){
	$("#course_form").validate({
		doNotHideMessage: true,
		errorClass: "error",
		errorElement: "label",
		rules: {
		},
		messages: {

		}
	});
	
	if($('#course_form').valid()){
		/*
		$('#course_form').ajaxSubmit({
			dataType: "json",
			type: "POST",
			success: function (data) {
				if (data.result == false) {
					layer.msg(data.message);
				} else {
					layer.msg(data.message);
					location.href = action_base_dir + "/course/courseList";
				}
			},
			error: function (XMLHttpRequest, textStatus, errorThrown) {
				alert("errorThrown:" + errorThrown);
			}
		});
		*/
		$('#course_form').submit();
		
	}
};
var radio_count = 0;
this.select_row = function(service_id,service_name,service_price){
	var table_tr = '';
	
	table_tr = table_tr + "<tr>";
	table_tr = table_tr + "<td>";
	table_tr = table_tr + "<input class='span12' type='text' name='service_id[]' readonly value='"+service_id+"'>";
	table_tr = table_tr + "</td>";
	table_tr = table_tr + "<td>";
	table_tr = table_tr + "<input class='span12 ' type='text' name='service_name[]' readonly value='"+service_name+"'>";
	table_tr = table_tr + "</td>";
	table_tr = table_tr + "<td>";
	table_tr = table_tr + "<input class='span12 ' type='text' readonly name='service_price[]' value='"+service_price+"'>";
	table_tr = table_tr + "</td>";
	table_tr = table_tr + "<td>";
	table_tr = table_tr + "<input class='span12 ' type='text' name='usecount[]' value='' onblur='usecount_value_change(this)'>";
	table_tr = table_tr + "</td>";
	table_tr = table_tr + "<td>";
	table_tr = table_tr + "<input class='span12 ' type='text' name='course_service_price[]' value='' onblur='price_value_change(this)'>";
	table_tr = table_tr + "</td>";
	table_tr = table_tr + "<td>";
	table_tr = table_tr + "<input class='span12 ' type='text' name='signal_price[]' value=''>";
	table_tr = table_tr + "</td>";
	table_tr = table_tr + "<td>";
	table_tr = table_tr + "<div class='input-prepend input-append' style='width:147px'>";
	table_tr = table_tr + "	<span class='add-on'> <label class='radio'>";
	table_tr = table_tr + "			<input type='radio' name='course_service_type"+radio_count+"' value='0' />";
	table_tr = table_tr + "			天数 </label> </span>";
	table_tr = table_tr + "	<input class='' type='text' name='course_service_days[]' style='width:30px' onfocus='radio_update(this)'>";
	table_tr = table_tr + "	<span class='add-on'>天</span>";
	table_tr = table_tr + "</div>";
	table_tr = table_tr + "<div class='input-prepend input-append' style='width:200px'>";
	table_tr = table_tr + "	<span class='add-on'> <label class='radio'>";
	table_tr = table_tr + "			<input type='radio' name='course_service_type"+radio_count+"' value='1' />";
	table_tr = table_tr + "			日期 </label> </span>";
	table_tr = table_tr + "	<input class='' type='text' name='course_service_date[]' style='width:80px' onfocus='radio_update(this)'>";
	table_tr = table_tr + "	<span class='add-on'>号</span>";
	table_tr = table_tr + "</div>";
	table_tr = table_tr + "</td>";
	table_tr = table_tr + "<td>";
	table_tr = table_tr + "		<a class='btn btn-danger' onClick='table_row_clear(this)'><i class='icon-trash '></i></a>";
	table_tr = table_tr + "</td>";
	table_tr = table_tr + "</tr>";
	
	$("#course_content tbody").prepend(table_tr);
	$("input[name='course_service_date[]']").datepicker( { 
	     dateFormat: 'yy/mm/dd',
	     dayNamesMin: ['日','一', '二', '三', '四', '五', '六'],
	     monthNames:['一月','二月','三月','四月','五月','六月','七月','八月','九月','十月','十一月','十二月'],
	     buttonImage: web_res_root + "/img/date_btn.png",
	     showOn:"both"
	  } );
    $("input[type=radio], input[type=checkbox]").uniform();
	
	radio_count = radio_count + 1;
	
	$.fancybox.close();
};

this.radio_update = function(elem){
	$(elem).parent().find("input[type='radio']").attr("checked",true);
	$(elem).parent().parent().find("input[type='text']").val("");
	$.uniform.update();
};

this.usecount_value_change = function(element){
	var usecount = $(element).val();
	
	var course_service_price = $(element).parents('tr').find('input[name="course_service_price[]"]').val();
	
	var sell_price = $(element).parents('tr').find('input[name="service_price[]"]').val();
	
	if(usecount != "" && course_service_price != "" && /^[0-9]*$/.test(usecount) && /^[0-9]*$/.test(course_service_price)){
		$(element).parents("tr").find("input[name='signal_price[]']").val((course_service_price/usecount).toFixed(2));
	}
	
	var all_price = 0;
	
	$("#course_content tbody tr").each(function(index,elem){
		
		var temp_sell_price = $(this).find('input[name="service_price[]"]').val();
		var temp_usecount = $(this).find('input[name="usecount[]"]').val();
		
		if(temp_usecount != "" && temp_sell_price != "" && /^[0-9]*$/.test(temp_usecount) && /^[0-9]*$/.test(temp_sell_price)){
			all_price = all_price + parseInt(temp_sell_price) * parseInt(temp_usecount);
		}
	});
	$("#txtpackageOriginalprice").text(all_price);
	$("#course_value").val(all_price);
};

this.price_value_change = function(element){
	var course_service_price = $(element).val();
	
	var usecount = $(element).parents('tr').find('input[name="usecount[]"]').val();
	
	if(usecount != "" && course_service_price != "" && /^[0-9]*$/.test(usecount) && /^[0-9]*$/.test(usecount)){
		$(element).parents("tr").find("input[name='signal_price[]']").val((course_service_price/usecount).toFixed(2));
	}
	
	var all_price = 0;
	
	$("#course_content tbody tr").each(function(index,elem){
		
		var temp_sell_price = $(this).find('input[name="course_service_price[]"]').val();
		//var temp_usecount = $(this).find('input[name="usecount[]"]').val();
		/*
		if(temp_usecount != "" && temp_sell_price != "" && /^[0-9]*$/.test(temp_usecount) && /^[0-9]*$/.test(temp_sell_price)){
			all_price = all_price + parseInt(temp_sell_price) * parseInt(temp_usecount);
		}
		*/
		all_price = all_price + temp_sell_price;
	});
	
	$("#txtpackagePrice").text(all_price);
	$("#course_price").val(all_price);
};

this.radio_update = function(elem){
	$(elem).parent().find("input[type='radio']").attr("checked",true);
	$(elem).parent().parent().find("input[type='text']").val("");
	$.uniform.update();
};


this.form_course_commision_submit = function(elem){
	
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

this.table_row_clear = function(elem){
	$(elem).parent().parent().remove();
};