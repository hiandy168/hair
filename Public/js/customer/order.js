/**
 * 
 */

$(document).ready(function() {
	if($("input[type=radio], input[type=checkbox]").length > 0){
		$("input[type=radio], input[type=checkbox]").uniform();	
	}
	
	if($(".fancybox").length>0){
		$(".fancybox").fancybox();
	}
});

//会员信息
this.select_member_row = function(member_id,member_no,member_name,member_card_discount,blance_money,gift_money,arrears_money){
	
	$("#order_member_content tbody tr input[name='member_card_no']").val(member_no);
	$("#order_member_content tbody tr input[name='member_card_id']").val(member_id);
	$("#order_member_content tbody tr input[name='member_name']").val(member_name);
	$("#order_member_content tbody tr input[name='member_card_discount']").val(member_card_discount);
	$("#order_member_content tbody tr input[name='blance_money']").val(blance_money);
	$("#order_member_content tbody tr input[name='gift_money']").val(gift_money);
	$("#order_member_content tbody tr input[name='arrears_money']").val(arrears_money);
	
	$("#member_charge").show(500);
	$("#order_course").show(500);
	
	$.fancybox.close();
};

//会员卡类型
this.select_member_card_type_row = function(member_card_type_id,member_card_type_name,service_discount){
	
	$("#order_charge_content tbody tr input[name='member_card_type_id']").val(member_card_type_id);
	$("#order_charge_content tbody tr input[name='member_card_type_name']").val(member_card_type_name);
	$("#order_charge_content tbody tr input[name='member_card_discount']").val(service_discount);
	
	$.fancybox.close();
};

//服务项目信息

this.service_content_add = function(elem){
	var table_tr = '';
	
	table_tr = table_tr + "<tr>";
	table_tr = table_tr + "<td>";
	table_tr = table_tr + "<select data-placeholder='请选择项目' class='chzn-select' style='width:150px' id='service_id_pull'>";
	table_tr = table_tr + $("#service_pull_content").html();
	table_tr = table_tr + "</select>";
	table_tr = table_tr + "</td>";
	table_tr = table_tr + "<td>";
	table_tr = table_tr + "<input class='span12 ' type='hidden' name='service_id[]' readonly value=''>";
	table_tr = table_tr + "<input class='span12 ' type='hidden' name='category_id[]' readonly value=''>";
	table_tr = table_tr + "<input class='span12 ' type='hidden' name='category_name[]' readonly value=''>";
	table_tr = table_tr + "<input class='span12 ' type='hidden' name='service_no[]' readonly value=''>";
	table_tr = table_tr + "<input class='span12 ' type='hidden' name='service_name[]' readonly value=''>";
	table_tr = table_tr + "<input class='span12 ' type='text' name='sell_price[]' readonly value=''>";
	table_tr = table_tr + "</td>";
	table_tr = table_tr + "<td>";
	table_tr = table_tr + "<input class='span12 ' type='text' name='service_price[]' value='' onchange='pay_amoung_change(this,'service')'>";
	table_tr = table_tr + "</td>";
	table_tr = table_tr + "<td>";
	table_tr = table_tr + "<input class='span12 ' type='text' name='service_result[]' value=''>";
	table_tr = table_tr + "</td>";
	table_tr = table_tr + "<td colspan='3'>";
	table_tr = table_tr + "<table>";
	table_tr = table_tr + "<tr>";
	table_tr = table_tr + "<td>";
	table_tr = table_tr + "<select data-placeholder='请选择设计师' class='chzn-select' style='width:80px' id='employee_desgin'>";
	table_tr = table_tr + $("#employee_desgin_pull_content").html();
	table_tr = table_tr + "</select>";
	table_tr = table_tr + "</td>";
	table_tr = table_tr + "<td>";
	table_tr = table_tr + "<input class='span12 ' type='hidden' name='employee_id_service[]' value=''>";
	table_tr = table_tr + "<input class='span12 ' type='text' name='employee_position_id_service[]' value=''>";
	table_tr = table_tr + "</td>";
	table_tr = table_tr + "<td>";
	table_tr = table_tr + "<input class='span12 ' type='text' name='order_result_service[]' value=''>";
	table_tr = table_tr + "</td>";
	table_tr = table_tr + "</tr>";
	table_tr = table_tr + "</table>";
	table_tr = table_tr + "<a class='btn btn-inverse span12' href='javascript:void(0)' onClick='employee_service_desgin_add(this)'><i class='icon-plus'></i></a>";
	table_tr = table_tr + "</td>";
	table_tr = table_tr + "<td colspan='3'>";
	table_tr = table_tr + "<table>";
	table_tr = table_tr + "<tr>";
	table_tr = table_tr + "<td>";
	table_tr = table_tr + "<select data-placeholder='请选择中工' class='chzn-select' style='width:80px' id='employee_middle_desgin'>";
	table_tr = table_tr + $("#employee_middle_desgin_pull_content").html();
	table_tr = table_tr + "</select>";
	table_tr = table_tr + "</td>";
	table_tr = table_tr + "<td>";
	table_tr = table_tr + "<input class='span12 ' type='hidden' name='employee_id_service[]' value=''>";
	table_tr = table_tr + "<input class='span12 ' type='text' name='employee_position_id_service[]' value=''>";
	table_tr = table_tr + "</td>";
	table_tr = table_tr + "<td>";
	table_tr = table_tr + "<input class='span12 ' type='text' name='order_result_service[]' value=''>";
	table_tr = table_tr + "</td>";
	table_tr = table_tr + "</tr>";
	table_tr = table_tr + "</table>";
	table_tr = table_tr + "<a class='btn btn-inverse span12' href='javascript:void(0)' onClick='employee_service_middle_desgin_add(this)'><i class='icon-plus'></i></a>";
	table_tr = table_tr + "</td>";
	table_tr = table_tr + "<td colspan='3'>";
	table_tr = table_tr + "<table>";
	table_tr = table_tr + "<tr>";
	table_tr = table_tr + "<td>";
	table_tr = table_tr + "<select data-placeholder='请选择助理' class='chzn-select' style='width:80px' id='employee_assistant'>";
	table_tr = table_tr + $("#employee_assistant_pull_content").html();
	table_tr = table_tr + "</select>";
	table_tr = table_tr + "</td>";
	table_tr = table_tr + "<td>";
	table_tr = table_tr + "<input class='span12 ' type='hidden' name='employee_id_service[]' value=''>";
	table_tr = table_tr + "<input class='span12 ' type='text' name='employee_position_id_service[]' value=''>";
	table_tr = table_tr + "</td>";
	table_tr = table_tr + "<td>";
	table_tr = table_tr + "<input class='span12 ' type='text' name='order_result_service[]' value=''>";
	table_tr = table_tr + "</td>";
	table_tr = table_tr + "</tr>";
	table_tr = table_tr + "</table>";
	table_tr = table_tr + "<a class='btn btn-inverse span12' href='javascript:void(0)' onClick='employee_service_assistant_add(this)'><i class='icon-plus'></i></a>";
	table_tr = table_tr + "</td>";
	table_tr = table_tr + "<td>";
	table_tr = table_tr + "<a class='btn btn-danger' onClick='order_service_content_clear(this)'><i class='icon-trash '></i></a>";
	table_tr = table_tr + "</td>";
	table_tr = table_tr + "</tr>";
	
	var table_info = $("#order_service_content tbody").first().prepend(table_tr);
	
	table_info.find("#service_id_pull").chosen({width:"200px"});
	table_info.find("#employee_desgin").chosen({width:"100px"});
	table_info.find("#employee_middle_desgin").chosen({width:"100px"});
	table_info.find("#employee_assistant").chosen({width:"100px"});
	
	table_info.find("#service_id_pull").on('change', function(e, params) {
	  if(params.selected){
	  	var ary_selected_value = params.selected.split(",");
	  	$(this).parent().parent().find("input[name='service_id[]']").val(ary_selected_value[0]);
	  	$(this).parent().parent().find("input[name='service_no[]']").val(ary_selected_value[1]);
	  	$(this).parent().parent().find("input[name='service_name[]']").val(ary_selected_value[2]);
	  	$(this).parent().parent().find("input[name='sell_price[]']").val(ary_selected_value[3]);
	  	$(this).parent().parent().find("input[name='service_price[]']").val(ary_selected_value[3]);
	  	$(this).parent().parent().find("input[name='service_result[]']").val(ary_selected_value[3]);
	  	$(this).parent().parent().find("input[name='category_id[]']").val(ary_selected_value[4]);
	  	$(this).parent().parent().find("input[name='category_name[]']").val(ary_selected_value[5]);
	  	pay_amoung_cata(elem,'service');
	  }
	});
	
	table_info.find("#employee_desgin").on('change', function(e, params) {
	  if(params.selected){
	  	var ary_selected_value = params.selected.split(",");
	  	$(this).parent().parent().find("input[name='employee_id_service[]']").val(ary_selected_value[0]);
	  	$(this).parent().parent().find("input[name='employee_position_id_service[]']").val(ary_selected_value[1]);
	  	$(this).parent().parent().find("input[name='order_result_service[]']").val($(this).parent().parent().parent().parent().parent().parent().find("input[name='service_result[]']").val());

	  }
	});
	
	table_info.find("#employee_middle_desgin").on('change', function(e, params) {
	  if(params.selected){
	  	var ary_selected_value = params.selected.split(",");
	  	$(this).parent().parent().find("input[name='employee_id_service[]']").val(ary_selected_value[0]);
	  	$(this).parent().parent().find("input[name='employee_position_id_service[]']").val(ary_selected_value[1]);
	  	$(this).parent().parent().find("input[name='order_result_service[]']").val($(this).parent().parent().parent().parent().parent().parent().find("input[name='service_result[]']").val());
	  }
	});
	table_info.find("#employee_assistant").on('change', function(e, params) {
	  if(params.selected){
	  	var ary_selected_value = params.selected.split(",");
	  	$(this).parent().parent().find("input[name='employee_id_service[]']").val(ary_selected_value[0]);
	  	$(this).parent().parent().find("input[name='employee_position_id_service[]']").val(ary_selected_value[1]);
	  	$(this).parent().parent().find("input[name='order_result_service[]']").val($(this).parent().parent().parent().parent().parent().parent().find("input[name='service_result[]']").val());
	  }
	});
};

this.pay_amoung_change = function(elem,check_out_content){
	pay_amoung_cata(elem,check_out_content);
};

this.pay_amoung_cata = function(elem,check_out_content){
	var pay_amoung = 0;
	var real_result = 0;

	$(elem).parents("form").find("table").first().find("tbody").first().children().each(function(index, el) {
		
		if (check_out_content == "service") {
			var service_price = $(this).find("input[name='service_price[]']").val();
			var service_result = $(this).find("input[name='service_result[]']").val();

			if (typeof service_price != "undefined") {
		    pay_amoung = parseFloat(pay_amoung) + parseFloat(service_price);
		    real_result = parseFloat(real_result) + parseFloat(service_result);
			}
		}else if(check_out_content == "course"){
			var course_price = $(this).find("input[name='course_price[]']").val();
			var course_result = $(this).find("input[name='course_result[]']").val();

			if (typeof course_price != "undefined") {
		    pay_amoung = parseFloat(pay_amoung) + parseFloat(course_price);
		    real_result = parseFloat(real_result) + parseFloat(course_result);
			}
		}
		
	});

	$(elem).parents("form").find("input[name='pay_amoung']").val(pay_amoung);
	$(elem).parents("form").find("input[name='cash_pay']").val(pay_amoung);
	$(elem).parents("form").find("input[name='real_result']").val(real_result);
};

this.course_content_add = function(elem){
	var table_tr = '';
	
	table_tr = table_tr + "<tr>";
	table_tr = table_tr + "<td>";
	table_tr = table_tr + "<select data-placeholder='请选择套餐' class='chzn-select' style='width:150px' id='course_id_pull'>";
	table_tr = table_tr + $("#course_pull_content").html();
	table_tr = table_tr + "</select>";
	table_tr = table_tr + "</td>";
	table_tr = table_tr + "<td>";
	table_tr = table_tr + "<input class='span12 ' type='hidden' name='course_id[]' readonly value=''>";
	table_tr = table_tr + "<input class='span12 ' type='hidden' name='course_no[]' readonly value=''>";
	table_tr = table_tr + "<input class='span12 ' type='hidden' name='course_name[]' readonly value=''>";
	table_tr = table_tr + "<input class='span12 ' type='text' name='sell_price[]' readonly value=''>";
	table_tr = table_tr + "</td>";
	table_tr = table_tr + "<td>";
	table_tr = table_tr + "<input class='span12 ' type='text' name='course_price[]' value='' onchange='pay_amoung_change(this,'course')'>";
	table_tr = table_tr + "</td>";
	table_tr = table_tr + "<td>";
	table_tr = table_tr + "<input class='span12 ' type='text' name='course_result[]' value=''>";
	table_tr = table_tr + "</td>";
	table_tr = table_tr + "<td colspan='3'>";
	table_tr = table_tr + "<table>";
	table_tr = table_tr + "<tr>";
	table_tr = table_tr + "<td>";
	table_tr = table_tr + "<select data-placeholder='请选择员工' class='chzn-select' style='width:100px' id='employee_course'>";
	table_tr = table_tr + $("#employee_pull_content").html();
	table_tr = table_tr + "</select>";
	table_tr = table_tr + "</td>";
	table_tr = table_tr + "<td>";
	table_tr = table_tr + "<input class='span12 ' type='hidden' name='employee_id_course[]' value=''>";
	table_tr = table_tr + "<input class='span12 ' type='hidden' name='employee_position_id_course[]' value=''>";
	table_tr = table_tr + "<input class='span12 ' type='text' name='order_result_course[]' value=''>";
	table_tr = table_tr + "</td>";
	table_tr = table_tr + "<td>";
	table_tr = table_tr + "<input class='span12 ' type='text' name='order_commision_course[]' value=''>";
	table_tr = table_tr + "</td>";
	table_tr = table_tr + "</tr>";
	table_tr = table_tr + "</table>";
	table_tr = table_tr + "<a class='btn btn-inverse span12' href='javascript:void(0)' onClick='employee_course_add(this)'><i class='icon-plus'></i></a>";
	table_tr = table_tr + "</td>";
	table_tr = table_tr + "<td>";
	table_tr = table_tr + "<a class='btn btn-danger' onClick='order_service_content_clear(this)'><i class='icon-trash '></i></a>";
	table_tr = table_tr + "</td>";
	table_tr = table_tr + "</tr>";
	
	var table_info = $("#order_course_content tbody").first().prepend(table_tr);
	
	table_info.find("#course_id_pull").chosen({width:"200px"});
	table_info.find("#employee_course").chosen({width:"100px"});
	
	table_info.find("#course_id_pull").on('change', function(e, params) {
	  if(params.selected){
	  	var ary_selected_value = params.selected.split(",");
	  	$(this).parent().parent().find("input[name='course_id[]']").val(ary_selected_value[0]);
	  	$(this).parent().parent().find("input[name='course_no[]']").val(ary_selected_value[1]);
	  	$(this).parent().parent().find("input[name='course_name[]']").val(ary_selected_value[2]);
	  	$(this).parent().parent().find("input[name='sell_price[]']").val(ary_selected_value[3]);
	  	$(this).parent().parent().find("input[name='course_price[]']").val(ary_selected_value[3]);
	  	$(this).parent().parent().find("input[name='course_result[]']").val(ary_selected_value[3]);

	  	pay_amoung_cata(elem,'course');
	  }
	});
	
	table_info.find("#employee_course").on('change', function(e, params) {
	  if(params.selected){
	  	var ary_selected_value = params.selected.split(",");
	  	$(this).parent().parent().find("input[name='employee_id_course[]']").val(ary_selected_value[0]);
	  	$(this).parent().parent().find("input[name='employee_position_id_course[]']").val(ary_selected_value[1]);
	  	$(this).parent().parent().find("input[name='order_result_course[]']").val($(this).parent().parent().parent().parent().parent().parent().find("input[name='course_result[]']").val());
	  	$(this).parent().parent().find("input[name='order_commision_course[]']").val(0);
	  }
	});
};

this.employee_course_add = function(elem){
	var table_tr = "";
	
	table_tr = table_tr + "<tr>";
	table_tr = table_tr + "<td>";
	table_tr = table_tr + "<select data-placeholder='请选择员工' class='chzn-select' style='width:100px'>";
	table_tr = table_tr + $("#employee_pull_content").html();
	table_tr = table_tr + "</select>";
	table_tr = table_tr + "</td>";
	table_tr = table_tr + "<td>";
	table_tr = table_tr + "<input class='span12 ' type='hidden' name='employee_id_course[]' value=''>";
	table_tr = table_tr + "<input class='span12 ' type='hidden' name='employee_position_id_course[]' value=''>";
	table_tr = table_tr + "<input class='span12 ' type='text' name='order_result_course[]' value=''>";
	table_tr = table_tr + "</td>";
	table_tr = table_tr + "<td>";
	table_tr = table_tr + "<input class='span12 ' type='text' name='order_commision_course[]' value=''>";
	table_tr = table_tr + "</td>";
	table_tr = table_tr + "</tr>";
	
	var table_info = $(elem).parent().find("table").append(table_tr);
	
	$(elem).parent().find("table").find("tr").last().find(".chzn-select").chosen({width:"100px"});
	
	table_info.find(".chzn-select").on('change', function(e, params) {
	  if(params.selected){
	  	var ary_selected_value = params.selected.split(",");
	  	$(this).parent().parent().find("input[name='employee_id_course[]']").val(ary_selected_value[0]);
	  	$(this).parent().parent().find("input[name='employee_position_id_course[]']").val(ary_selected_value[1]);
	  	$(this).parent().parent().find("input[name='order_result_course[]']").val($(this).parent().parent().parent().parent().parent().parent().find("input[name='course_result[]']").val());
	  	$(this).parent().parent().find("input[name='order_commision_course[]']").val(0);
	  }
	});
};

this.employee_service_desgin_add = function(elem){
	var table_tr = "";
	
	table_tr = table_tr + "<tr>";
	table_tr = table_tr + "<td>";
	table_tr = table_tr + "<select data-placeholder='请选择设计师' class='chzn-select' style='width:80px'>";
	table_tr = table_tr + $("#employee_desgin_pull_content").html();
	table_tr = table_tr + "</select>";
	table_tr = table_tr + "</td>";
	table_tr = table_tr + "<td>";
	table_tr = table_tr + "<input class='span12 ' type='hidden' name='employee_id_service[]' value=''>";
	table_tr = table_tr + "<input class='span12 ' type='text' name='employee_position_id_service[]' value=''>";
	table_tr = table_tr + "</td>";
	table_tr = table_tr + "<td>";
	table_tr = table_tr + "<input class='span12 ' type='text' name='order_result_service[]' value=''>";
	table_tr = table_tr + "</td>";
	table_tr = table_tr + "</tr>";
	
	var table_info = $(elem).parent().find("table").append(table_tr);
	
	$(elem).parent().find("table").find("tr").last().find(".chzn-select").chosen({width:"100px"});
	
	table_info.find(".chzn-select").on('change', function(e, params) {
	  if(params.selected){
	  	var ary_selected_value = params.selected.split(",");
	  	$(this).parent().parent().find("input[name='employee_id_service[]']").val(ary_selected_value[0]);
	  	$(this).parent().parent().find("input[name='employee_position_id_service[]']").val(ary_selected_value[1]);
	  	$(this).parent().parent().find("input[name='order_result_service[]']").val($(this).parent().parent().parent().parent().parent().parent().find("input[name='service_result[]']").val());
	  }
	});
};

this.employee_service_middle_desgin_add = function(elem){
	var table_tr = "";
	
	table_tr = table_tr + "<tr>";
	table_tr = table_tr + "<td>";
	table_tr = table_tr + "<select data-placeholder='请选择设计师' class='chzn-select' style='width:80px'>";
	table_tr = table_tr + $("#employee_middle_desgin_pull_content").html();
	table_tr = table_tr + "</select>";
	table_tr = table_tr + "</td>";
	table_tr = table_tr + "<td>";
	table_tr = table_tr + "<input class='span12 ' type='hidden' name='employee_id_service[]' value=''>";
	table_tr = table_tr + "<input class='span12 ' type='text' name='employee_position_id_service[]' value=''>";
	table_tr = table_tr + "</td>";
	table_tr = table_tr + "<td>";
	table_tr = table_tr + "<input class='span12 ' type='text' name='order_result_service[]' value=''>";
	table_tr = table_tr + "</td>";
	table_tr = table_tr + "</tr>";
	
	var table_info = $(elem).parent().find("table").append(table_tr);
	
	$(elem).parent().find("table").find("tr").last().find(".chzn-select").chosen({width:"100px"});
	
	table_info.find(".chzn-select").on('change', function(e, params) {
	  if(params.selected){
	  	var ary_selected_value = params.selected.split(",");
	  	$(this).parent().parent().find("input[name='employee_id_service[]']").val(ary_selected_value[0]);
	  	$(this).parent().parent().find("input[name='employee_position_id_service[]']").val(ary_selected_value[1]);
	  	$(this).parent().parent().find("input[name='order_result_service[]']").val($(this).parent().parent().parent().parent().parent().parent().find("input[name='service_result[]']").val());
	  }
	});
};

this.employee_service_assistant_add = function(elem){
	var table_tr = "";
	
	table_tr = table_tr + "<tr>";
	table_tr = table_tr + "<td>";
	table_tr = table_tr + "<select data-placeholder='请选择设计师' class='chzn-select' style='width:80px'>";
	table_tr = table_tr + $("#employee_assistant_pull_content").html();
	table_tr = table_tr + "</select>";
	table_tr = table_tr + "</td>";
	table_tr = table_tr + "<td>";
	table_tr = table_tr + "<input class='span12 ' type='hidden' name='employee_id_service[]' value=''>";
	table_tr = table_tr + "<input class='span12 ' type='text' name='employee_position_id_service[]' value=''>";
	table_tr = table_tr + "</td>";
	table_tr = table_tr + "<td>";
	table_tr = table_tr + "<input class='span12 ' type='text' name='order_result_service[]' value=''>";
	table_tr = table_tr + "</td>";
	table_tr = table_tr + "</tr>";
	
	var table_info = $(elem).parent().find("table").append(table_tr);
	
	$(elem).parent().find("table").find("tr").last().find(".chzn-select").chosen({width:"100px"});
	
	table_info.find(".chzn-select").on('change', function(e, params) {
	  if(params.selected){
	  	var ary_selected_value = params.selected.split(",");
	  	$(this).parent().parent().find("input[name='employee_id_service[]']").val(ary_selected_value[0]);
	  	$(this).parent().parent().find("input[name='employee_position_id_service[]']").val(ary_selected_value[1]);
	  	$(this).parent().parent().find("input[name='order_result_service[]']").val($(this).parent().parent().parent().parent().parent().parent().find("input[name='service_result[]']").val());
	  }
	});
};

//充值员工
this.select_employee_charge_row = function(elem,employee_id,employee_no,employee_name,employee_position_id){
	var table_tr = '';
	
	table_tr = table_tr + "<tr>";
	table_tr = table_tr + "<td>";
	table_tr = table_tr + "<input class='span12' type='text' name='employee_no_charge[]' readonly value='"+employee_no+"'>";
	table_tr = table_tr + "<input class='span12' type='hidden' name='employee_id_charge[]' readonly value='"+employee_id+"'>";
	table_tr = table_tr + "</td>";
	table_tr = table_tr + "<td>";
	table_tr = table_tr + "<input class='span12 ' type='text' name='employee_name_charge[]' readonly value='"+employee_name+"'>";
	table_tr = table_tr + "<input class='span12 ' type='hidden' name='employee_position_id_charge[]' readonly value='"+employee_position_id+"'>";
	table_tr = table_tr + "</td>";
	table_tr = table_tr + "<td>";
	table_tr = table_tr + "<input class='span12 ' type='text' name='order_result_charge[]' value=''>";
	table_tr = table_tr + "</td>";
	table_tr = table_tr + "<td>";
	table_tr = table_tr + "<input class='span12 ' type='text' name='order_commision_charge[]' value=''>";
	table_tr = table_tr + "</td>";
	table_tr = table_tr + "<td>";
	table_tr = table_tr + "<a class='btn btn-danger' onClick='order_service_content_clear(this)'><i class='icon-trash '></i></a>";
	table_tr = table_tr + "</td>";
	table_tr = table_tr + "</tr>";
	
	$("#"+elem).find("tbody").prepend(table_tr);
	
	$.fancybox.close();
};

//会员信息清空
this.order_member_content_clear = function(elem){
	$(elem).parents("tr").find("input").each(function(index,elem){
		$(this).val("");
	});
	
	if($(elem).parents("table").attr("id") == "order_member_content"){
		$("#member_charge").hide(500);
		$("#order_course").hide(500);
	}
	
	return false;
};

//删除该行的信息
this.order_service_content_clear = function(elem){
	$(elem).parent().parent().remove();
};

//表单提交
this.check_out_submit = function(elem,check_out_content){
	
	if (check_out_content == "service") {

		//服务明细
		service_detail(elem);

		$.fancybox({href:"#service_check_out_content"});

	}else if (check_out_content == "course") {

		//套餐明细
		course_detail(elem);

		$.fancybox({href:"#course_check_out_content"});
	}else if (check_out_content == "charge"){
		//充值明细
		charge_detail(elem);

		$.fancybox({href:"#charge_check_out_content"});
	}
};

//服务明细
this.service_detail = function(elem){
	var pay_amoung = 0;
	$("#check_out_detail tbody").empty();

	$(elem).parents("form").find("table").first().find("tbody").first().children().each(function(index, el) {
		
		var category_id = $(this).find("input[name='category_id[]']").val();
		var category_name = $(this).find("input[name='category_name[]']").val();
		var service_id = $(this).find("input[name='service_id[]']").val();
		var service_no = $(this).find("input[name='service_no[]']").val();
		var service_name = $(this).find("input[name='service_name[]']").val();
		var sell_price = $(this).find("input[name='sell_price[]']").val();
		var service_price = $(this).find("input[name='service_price[]']").val();
		var service_result = $(this).find("input[name='service_result[]']").val();

		if (typeof service_id != "undefined") {
			var html_table_text = "";
			html_table_text = html_table_text +"<tr class='odd gradeX'>";
	    html_table_text = html_table_text +"  <td>"+service_name+"</td>";
	    html_table_text = html_table_text +"  <td>"+sell_price+"</td>";
	    html_table_text = html_table_text +"  <td>"+service_price+"</td>";
	    html_table_text = html_table_text +"</tr>";
			
			html_table_text = html_table_text +"<input type='hidden' name='category_id[]' value='"+category_id+"'>";
			html_table_text = html_table_text +"<input type='hidden' name='category_name[]' value='"+category_name+"'>";
	    html_table_text = html_table_text +"<input type='hidden' name='service_id[]' value='"+service_id+"'>";
	    html_table_text = html_table_text +"<input type='hidden' name='service_no[]' value='"+service_no+"'>";
	    html_table_text = html_table_text +"<input type='hidden' name='service_name[]' value='"+service_name+"'>";
	    html_table_text = html_table_text +"<input type='hidden' name='sell_price[]' value='"+sell_price+"'>";
	    html_table_text = html_table_text +"<input type='hidden' name='service_price[]' value='"+service_price+"'>";
	    html_table_text = html_table_text +"<input type='hidden' name='service_result[]' value='"+service_result+"'>";
	    pay_amoung = pay_amoung + parseFloat(service_price);
	    var emplouee_id_service = "";
    	var emplouee_postion_id_service = "";
    	var order_result_service = "";

	    $(this).find("table").first().find("tbody").children("tr").each(function(index, el) {

	    	var temp_emplouee_id_service = $(this).find("input[name='employee_id_service[]']").val();
	    	var temp_emplouee_postion_id_service = $(this).find("input[name='employee_position_id_service[]']").val();
	    	var temp_order_result_service = $(this).find("input[name='order_result_service[]']").val();
	    	if (typeof temp_emplouee_id_service != "undefined") {
	    		emplouee_id_service = emplouee_id_service + temp_emplouee_id_service + ",";
	    		emplouee_postion_id_service = emplouee_postion_id_service + temp_emplouee_postion_id_service + ",";
	    		order_result_service = order_result_service + temp_order_result_service + ",";
	    	}
	    });

	    $(this).find("table").eq(1).find("tbody").children("tr").each(function(index, el) {

	    	var temp_emplouee_id_service = $(this).find("input[name='employee_id_service[]']").val();
	    	var temp_emplouee_postion_id_service = $(this).find("input[name='employee_position_id_service[]']").val();
	    	var temp_order_result_service = $(this).find("input[name='order_result_service[]']").val();
	    	if (typeof temp_emplouee_id_service != "undefined") {
	    		emplouee_id_service = emplouee_id_service + temp_emplouee_id_service + ",";
	    		emplouee_postion_id_service = emplouee_postion_id_service + temp_emplouee_postion_id_service + ",";
	    		order_result_service = order_result_service + temp_order_result_service + ",";
	    	}
	    });

	    $(this).find("table").eq(2).find("tbody").children("tr").each(function(index, el) {

	    	var temp_emplouee_id_service = $(this).find("input[name='employee_id_service[]']").val();
	    	var temp_emplouee_postion_id_service = $(this).find("input[name='employee_position_id_service[]']").val();
	    	var temp_order_result_service = $(this).find("input[name='order_result_service[]']").val();
	    	if (typeof temp_emplouee_id_service != "undefined") {
	    		emplouee_id_service = emplouee_id_service + temp_emplouee_id_service + ",";
	    		emplouee_postion_id_service = emplouee_postion_id_service + temp_emplouee_postion_id_service + ",";
	    		order_result_service = order_result_service + temp_order_result_service + ",";
	    	}
	    });

	    html_table_text = html_table_text +"<input type='hidden' name='employee_id_service"+index+"' value='"+emplouee_id_service.substr(0,emplouee_id_service.length -1)+"'>";
	    html_table_text = html_table_text +"<input type='hidden' name='employee_position_id_service"+index+"' value='"+emplouee_postion_id_service.substr(0,emplouee_postion_id_service.length -1)+"'>";
	    html_table_text = html_table_text +"<input type='hidden' name='order_result_service"+index+"' value='"+order_result_service.substr(0,order_result_service.length -1)+"'>";


	    $("#service_check_out_detail tbody").append(html_table_text);
		}
	});

	var html_table_text = "";
	html_table_text = html_table_text +"<input type='hidden' name='member_card_no' value='"+$("#order_member_content").find("input[name='member_card_no']").val()+"'>";
	html_table_text = html_table_text +"<input type='hidden' name='member_card_id' value='"+$("#order_member_content").find("input[name='member_card_id']").val()+"'>";
	html_table_text = html_table_text +"<input type='hidden' name='member_name' value='"+$("#order_member_content").find("input[name='member_name']").val()+"'>";
	html_table_text = html_table_text +"<input type='hidden' name='pay_amoung' value='"+$(elem).parents("form").find("input[name='pay_amoung']").val()+"'>";
	html_table_text = html_table_text +"<input type='hidden' name='card_pay' value='"+$(elem).parents("form").find("input[name='card_pay']").val()+"'>";
	html_table_text = html_table_text +"<input type='hidden' name='cash_pay' value='"+$(elem).parents("form").find("input[name='cash_pay']").val()+"'>";
	html_table_text = html_table_text +"<input type='hidden' name='union_pay' value='"+$(elem).parents("form").find("input[name='union_pay']").val()+"'>";
	html_table_text = html_table_text +"<input type='hidden' name='vouchers_pay' value='"+$(elem).parents("form").find("input[name='vouchers_pay']").val()+"'>";
	html_table_text = html_table_text +"<input type='hidden' name='gift_pay' value='"+$(elem).parents("form").find("input[name='gift_pay']").val()+"'>";
	html_table_text = html_table_text +"<input type='hidden' name='free_pay' value='"+$(elem).parents("form").find("input[name='free_pay']").val()+"'>";
	html_table_text = html_table_text +"<input type='hidden' name='arrears_pay' value='"+$(elem).parents("form").find("input[name='arrears_pay']").val()+"'>";
	html_table_text = html_table_text +"<input type='hidden' name='real_result' value='"+$(elem).parents("form").find("input[name='real_result']").val()+"'>";
	html_table_text = html_table_text +"<input type='hidden' name='vochers_id' value='"+$(elem).parents("form").find("input[name='vochers_id']").val()+"'>";
	html_table_text = html_table_text +"<input type='hidden' name='guest_name' value='"+$(elem).parents("form").find("input[name='guest_name']").val()+"'>";
	html_table_text = html_table_text +"<input type='hidden' name='guest_tel' value='"+$(elem).parents("form").find("input[name='guest_tel']").val()+"'>";
	html_table_text = html_table_text +"<input type='hidden' name='guest_sex' value='"+$(elem).parents("form").find("input[name='guest_sex']").val()+"'>";
	html_table_text = html_table_text +"<input type='hidden' name='order_comment' value='"+$(elem).parents("form").find("textarea[name='order_comment']").val()+"'>";
	html_table_text = html_table_text +"<input type='hidden' name='order_status' value='2'>";
	html_table_text = html_table_text +"<input type='hidden' name='order_type' value='1'>";

	$("#service_check_out_form").append(html_table_text);

	var pay_text = "";

	pay_text = "总消费"+pay_amoung+"(";

	if ($(elem).parents("form").find("input[name='card_pay']").val() != '') {
		pay_text = pay_text + "会员卡:<font color='red'>" + $(elem).parents("form").find("input[name='card_pay']").val() + "</font>";
	}

	if ($(elem).parents("form").find("input[name='cash_pay']").val() != '') {
		pay_text = pay_text + "现金:<font color='red'>" + $(elem).parents("form").find("input[name='cash_pay']").val() + "</font>";
	}

	pay_text = pay_text + ")";

	$("#service_check_out_form").find("h3").html(pay_text);

	$("#service_check_out_form").find("input[name='real_pay_amount']").val(pay_amoung);
};

//套餐明细
this.course_detail = function(elem){
	var pay_amoung = 0;
	$("#course_check_out_detail tbody").empty();

	$(elem).parents("form").find("table").first().find("tbody").first().children().each(function(index, el) {
		
		var course_id = $(this).find("input[name='course_id[]']").val();
		var course_no = $(this).find("input[name='course_no[]']").val();
		var course_name = $(this).find("input[name='course_name[]']").val();
		var sell_price = $(this).find("input[name='sell_price[]']").val();
		var course_price = $(this).find("input[name='course_price[]']").val();
		var course_result = $(this).find("input[name='course_result[]']").val();

		if (typeof course_id != "undefined") {
			var html_table_text = "";
			html_table_text = html_table_text +"<tr class='odd gradeX'>";
	    html_table_text = html_table_text +"  <td>"+course_name+"</td>";
	    html_table_text = html_table_text +"  <td>"+sell_price+"</td>";
	    html_table_text = html_table_text +"  <td>"+course_price+"</td>";
	    html_table_text = html_table_text +"</tr>";

	    html_table_text = html_table_text +"<input type='hidden' name='course_id[]' value='"+course_id+"'>";
	    html_table_text = html_table_text +"<input type='hidden' name='course_no[]' value='"+course_no+"'>";
	    html_table_text = html_table_text +"<input type='hidden' name='course_name[]' value='"+course_name+"'>";
	    html_table_text = html_table_text +"<input type='hidden' name='sell_price[]' value='"+sell_price+"'>";
	    html_table_text = html_table_text +"<input type='hidden' name='course_price[]' value='"+course_price+"'>";
	    html_table_text = html_table_text +"<input type='hidden' name='course_result[]' value='"+course_result+"'>";
	    pay_amoung = pay_amoung + parseFloat(course_price);
	    var emplouee_id_course = "";
    	var emplouee_postion_id_course = "";
    	var order_result_course = "";
    	var order_commision_course = "";

	    $(this).find("table").first().find("tbody").children("tr").each(function(index, el) {

	    	var temp_emplouee_id_course = $(this).find("input[name='employee_id_course[]']").val();
	    	var temp_emplouee_postion_id_course = $(this).find("input[name='employee_position_id_course[]']").val();
	    	var temp_order_result_course = $(this).find("input[name='order_result_course[]']").val();
	    	var temp_order_commision_course = $(this).find("input[name='order_commision_course[]']").val();
	    	if (typeof temp_emplouee_id_course != "undefined") {
	    		emplouee_id_course = emplouee_id_course + temp_emplouee_id_course + ",";
	    		emplouee_postion_id_course = emplouee_postion_id_course + temp_emplouee_postion_id_course + ",";
	    		order_result_course = order_result_course + temp_order_result_course + ",";
	    		order_commision_course = order_commision_course + temp_order_commision_course + ",";
	    	}
	    });

	    html_table_text = html_table_text +"<input type='hidden' name='employee_id_course"+index+"' value='"+emplouee_id_course.substr(0,emplouee_id_course.length -1)+"'>";
	    html_table_text = html_table_text +"<input type='hidden' name='employee_position_id_course"+index+"' value='"+emplouee_postion_id_course.substr(0,emplouee_postion_id_course.length -1)+"'>";
	    html_table_text = html_table_text +"<input type='hidden' name='order_result_course"+index+"' value='"+order_result_course.substr(0,order_result_course.length -1)+"'>";
	    html_table_text = html_table_text +"<input type='hidden' name='order_commision_course"+index+"' value='"+order_commision_course.substr(0,order_commision_course.length -1)+"'>";


	    $("#course_check_out_detail tbody").append(html_table_text);
		}
	});

	var html_table_text = "";
	html_table_text = html_table_text +"<input type='hidden' name='member_card_no' value='"+$("#order_member_content").find("input[name='member_card_no']").val()+"'>";
	html_table_text = html_table_text +"<input type='hidden' name='member_card_id' value='"+$("#order_member_content").find("input[name='member_card_id']").val()+"'>";
	html_table_text = html_table_text +"<input type='hidden' name='member_name' value='"+$("#order_member_content").find("input[name='member_name']").val()+"'>";
	html_table_text = html_table_text +"<input type='hidden' name='pay_amoung' value='"+$(elem).parents("form").find("input[name='pay_amoung']").val()+"'>";
	html_table_text = html_table_text +"<input type='hidden' name='card_pay' value='"+$(elem).parents("form").find("input[name='card_pay']").val()+"'>";
	html_table_text = html_table_text +"<input type='hidden' name='cash_pay' value='"+$(elem).parents("form").find("input[name='cash_pay']").val()+"'>";
	html_table_text = html_table_text +"<input type='hidden' name='union_pay' value='"+$(elem).parents("form").find("input[name='union_pay']").val()+"'>";
	html_table_text = html_table_text +"<input type='hidden' name='vouchers_pay' value='"+$(elem).parents("form").find("input[name='vouchers_pay']").val()+"'>";
	html_table_text = html_table_text +"<input type='hidden' name='gift_pay' value='"+$(elem).parents("form").find("input[name='gift_pay']").val()+"'>";
	html_table_text = html_table_text +"<input type='hidden' name='free_pay' value='"+$(elem).parents("form").find("input[name='free_pay']").val()+"'>";
	html_table_text = html_table_text +"<input type='hidden' name='arrears_pay' value='"+$(elem).parents("form").find("input[name='arrears_pay']").val()+"'>";
	html_table_text = html_table_text +"<input type='hidden' name='real_result' value='"+$(elem).parents("form").find("input[name='real_result']").val()+"'>";
	html_table_text = html_table_text +"<input type='hidden' name='vochers_id' value='"+$(elem).parents("form").find("input[name='vochers_id']").val()+"'>";
	html_table_text = html_table_text +"<input type='hidden' name='guest_name' value='"+$(elem).parents("form").find("input[name='guest_name']").val()+"'>";
	html_table_text = html_table_text +"<input type='hidden' name='guest_tel' value='"+$(elem).parents("form").find("input[name='guest_tel']").val()+"'>";
	html_table_text = html_table_text +"<input type='hidden' name='guest_sex' value='"+$(elem).parents("form").find("input[name='guest_sex']").val()+"'>";
	html_table_text = html_table_text +"<input type='hidden' name='order_comment' value='"+$(elem).parents("form").find("textarea[name='order_comment']").val()+"'>";
	html_table_text = html_table_text +"<input type='hidden' name='order_status' value='2'>";
	html_table_text = html_table_text +"<input type='hidden' name='order_type' value='2'>";

	$("#course_check_out_form").append(html_table_text);

	var pay_text = "";

	pay_text = "总消费"+pay_amoung+"(";

	if ($(elem).parents("form").find("input[name='card_pay']").val() != '') {
		pay_text = pay_text + "会员卡:<font color='red'>" + $(elem).parents("form").find("input[name='card_pay']").val() + "</font>";
	}

	if ($(elem).parents("form").find("input[name='cash_pay']").val() != '') {
		pay_text = pay_text + "现金:<font color='red'>" + $(elem).parents("form").find("input[name='cash_pay']").val() + "</font>";
	}

	pay_text = pay_text + ")";

	$("#course_check_out_form").find("h3").html(pay_text);

	$("#course_check_out_form").find("input[name='real_pay_amount']").val(pay_amoung);

};

//充值明细
this.charge_detail = function(elem){
	var pay_amoung = 0;
	$("#charge_check_out_detail tbody").empty();

	var html_table_text = "";

	$(elem).parents("form").find("table").first().find("tbody").first().children().first().each(function(index, el) {
		
		var member_card_type_id = $(this).find("input[name='member_card_type_id']").val();
		var member_card_type_name = $(this).find("input[name='member_card_type_name']").val();
		var member_card_discount = $(this).find("input[name='member_card_discount']").val();
		var charge_money = $(this).find("input[name='charge_money']").val();
		var gift_money = $(this).find("input[name='gift_money']").val();

		if (typeof member_card_type_id != "undefined") {
			html_table_text = html_table_text +"<tr class='odd gradeX'>";
	    html_table_text = html_table_text +"  <td>"+member_card_type_name+"</td>";
	    html_table_text = html_table_text +"  <td>"+charge_money+"</td>";
	    html_table_text = html_table_text +"  <td>"+charge_money+"</td>";
	    html_table_text = html_table_text +"</tr>";

	    html_table_text = html_table_text +"<input type='hidden' name='member_card_type_id' value='"+member_card_type_id+"'>";
	    html_table_text = html_table_text +"<input type='hidden' name='member_card_type_name' value='"+member_card_type_name+"'>";
	    html_table_text = html_table_text +"<input type='hidden' name='member_card_discount' value='"+member_card_discount+"'>";
	    html_table_text = html_table_text +"<input type='hidden' name='charge_money' value='"+charge_money+"'>";
	    html_table_text = html_table_text +"<input type='hidden' name='gift_money' value='"+gift_money+"'>";
	    pay_amoung = pay_amoung + parseFloat(charge_money);
		}
	});

	$("#charge_check_out_detail tbody").append(html_table_text);

	var html_table_text = "";

	$(elem).parents("form").find("table").eq(1).find("tbody").first().children().each(function(index, el) {
		var employee_id_charge = $(this).find("input[name='employee_id_charge[]']").val();
  	var employee_position_id_charge = $(this).find("input[name='employee_position_id_charge[]']").val();
  	var order_result_charge = $(this).find("input[name='order_result_charge[]']").val();
  	var order_commision_charge = $(this).find("input[name='order_commision_charge[]']").val();
  	if (typeof employee_id_charge != "undefined") {
  		html_table_text = html_table_text +"<input type='hidden' name='employee_id_charge[]' value='"+employee_id_charge+"'>";
	    html_table_text = html_table_text +"<input type='hidden' name='employee_position_id_charge[]' value='"+employee_position_id_charge+"'>";
	    html_table_text = html_table_text +"<input type='hidden' name='order_result_charge[]' value='"+order_result_charge+"'>";
	    html_table_text = html_table_text +"<input type='hidden' name='order_commision_charge[]' value='"+order_commision_charge+"'>";
  	}
	});

	html_table_text = html_table_text +"<input type='hidden' name='member_card_no' value='"+$("#order_member_content").find("input[name='member_card_no']").val()+"'>";
	html_table_text = html_table_text +"<input type='hidden' name='member_card_id' value='"+$("#order_member_content").find("input[name='member_card_id']").val()+"'>";
	html_table_text = html_table_text +"<input type='hidden' name='member_name' value='"+$("#order_member_content").find("input[name='member_name']").val()+"'>";
	html_table_text = html_table_text +"<input type='hidden' name='pay_amoung' value='"+$(elem).parents("form").find("input[name='pay_amoung']").val()+"'>";
	html_table_text = html_table_text +"<input type='hidden' name='card_pay' value='"+$(elem).parents("form").find("input[name='card_pay']").val()+"'>";
	html_table_text = html_table_text +"<input type='hidden' name='cash_pay' value='"+$(elem).parents("form").find("input[name='cash_pay']").val()+"'>";
	html_table_text = html_table_text +"<input type='hidden' name='union_pay' value='"+$(elem).parents("form").find("input[name='union_pay']").val()+"'>";
	html_table_text = html_table_text +"<input type='hidden' name='vouchers_pay' value='"+$(elem).parents("form").find("input[name='vouchers_pay']").val()+"'>";
	html_table_text = html_table_text +"<input type='hidden' name='gift_pay' value='"+$(elem).parents("form").find("input[name='gift_pay']").val()+"'>";
	html_table_text = html_table_text +"<input type='hidden' name='free_pay' value='"+$(elem).parents("form").find("input[name='free_pay']").val()+"'>";
	html_table_text = html_table_text +"<input type='hidden' name='arrears_pay' value='"+$(elem).parents("form").find("input[name='arrears_pay']").val()+"'>";
	html_table_text = html_table_text +"<input type='hidden' name='real_result' value='"+$(elem).parents("form").find("input[name='real_result']").val()+"'>";
	html_table_text = html_table_text +"<input type='hidden' name='vochers_id' value='"+$(elem).parents("form").find("input[name='vochers_id']").val()+"'>";
	html_table_text = html_table_text +"<input type='hidden' name='guest_name' value='"+$(elem).parents("form").find("input[name='guest_name']").val()+"'>";
	html_table_text = html_table_text +"<input type='hidden' name='guest_tel' value='"+$(elem).parents("form").find("input[name='guest_tel']").val()+"'>";
	html_table_text = html_table_text +"<input type='hidden' name='guest_sex' value='"+$(elem).parents("form").find("input[name='guest_sex']").val()+"'>";
	html_table_text = html_table_text +"<input type='hidden' name='order_comment' value='"+$(elem).parents("form").find("textarea[name='order_comment']").val()+"'>";
	html_table_text = html_table_text +"<input type='hidden' name='order_status' value='2'>";
	html_table_text = html_table_text +"<input type='hidden' name='order_type' value='3'>";

	$("#charge_check_out_form").append(html_table_text);

	var pay_text = "";

	pay_text = "总消费"+pay_amoung+"(";

	if ($(elem).parents("form").find("input[name='card_pay']").val() != '') {
		pay_text = pay_text + "会员卡:<font color='red'>" + $(elem).parents("form").find("input[name='card_pay']").val() + "</font>";
	}

	if ($(elem).parents("form").find("input[name='cash_pay']").val() != '') {
		pay_text = pay_text + "现金:<font color='red'>" + $(elem).parents("form").find("input[name='cash_pay']").val() + "</font>";
	}

	pay_text = pay_text + ")";

	$("#charge_check_out_form").find("h3").html(pay_text);

	$("#charge_check_out_form").find("input[name='real_pay_amount']").val(pay_amoung);

};

this.change_pay_amount = function(elem){
	var pay_amoung = $("#check_out_form").find("input[name='pay_amoung']").val();

	var real_pay_amount = $(elem).val();

	$(elem).parent().parent().find("input[name='change_pay_amount']").val(parseFloat(real_pay_amount) - parseFloat(pay_amoung));

};

this.check_out_form_submit = function(elem){
	$("#"+elem).validate({
		doNotHideMessage: true,
		errorClass: "error",
		errorElement: "label",
		rules: {
		},
		messages: {

		}
	});
	
	if($("#"+elem).valid()){
		$("#"+elem).ajaxSubmit({
			dataType: "json",
			type: "POST",
			success: function (data) {
				if (data.result == false) {
					layer.msg(data.message);
				} else {
					layer.msg(data.message);
					location.href = action_base_dir + "/index";
				}
			},
			error: function (XMLHttpRequest, textStatus, errorThrown) {
				alert("errorThrown:" + errorThrown);
			}
		});
		//$('#check_out_form').submit();
	}
};

this.union_order_submit = function(elem,check_out_content){
	if (check_out_content == "service") {

		//服务明细
		service_detail(elem);
		
		$("#service_check_out_form").validate({
			doNotHideMessage: true,
			errorClass: "error",
			errorElement: "label",
			rules: {
			},
			messages: {
	
			}
		});
		
		if($('#service_check_out_form').valid()){
			$('#service_check_out_form').ajaxSubmit({
				dataType: "json",
				type: "POST",
				data:{
					order_status:"0"
				},
				success: function (data) {
					if (data.result == false) {
						layer.msg(data.message);
					} else {
						layer.msg(data.message);
						location.href = action_base_dir + "/index";
					}
				},
				error: function (XMLHttpRequest, textStatus, errorThrown) {
					alert("errorThrown:" + errorThrown);
				}
			});
		}
	}else if (check_out_content == "course") {

		//套餐明细
		course_detail(elem);
		
		$("#course_check_out_form").validate({
			doNotHideMessage: true,
			errorClass: "error",
			errorElement: "label",
			rules: {
			},
			messages: {
	
			}
		});
		
		if($('#course_check_out_form').valid()){
			$('#course_check_out_form').ajaxSubmit({
				dataType: "json",
				type: "POST",
				data:{
					order_status:"0"
				},
				success: function (data) {
					if (data.result == false) {
						layer.msg(data.message);
					} else {
						layer.msg(data.message);
						location.href = action_base_dir + "/index";
					}
				},
				error: function (XMLHttpRequest, textStatus, errorThrown) {
					alert("errorThrown:" + errorThrown);
				}
			});
		}
	}else if(check_out_content == "charge"){
		//套餐明细
		course_detail(elem);
		
		$("#charge_check_out_form").validate({
			doNotHideMessage: true,
			errorClass: "error",
			errorElement: "label",
			rules: {
			},
			messages: {
	
			}
		});
		
		if($('#charge_check_out_form').valid()){
			$('#charge_check_out_form').ajaxSubmit({
				dataType: "json",
				type: "POST",
				data:{
					order_status:"0"
				},
				success: function (data) {
					if (data.result == false) {
						layer.msg(data.message);
					} else {
						layer.msg(data.message);
						location.href = action_base_dir + "/index";
					}
				},
				error: function (XMLHttpRequest, textStatus, errorThrown) {
					alert("errorThrown:" + errorThrown);
				}
			});
		}
	}

};


this.pending_order_submit = function(elem,check_out_content){
	if (check_out_content == "service") {

		//服务明细
		service_detail(elem);

	}else if (check_out_content == "course") {

		//套餐明细
		course_detail(elem);
	}

	$("#check_out_form").validate({
		doNotHideMessage: true,
		errorClass: "error",
		errorElement: "label",
		rules: {
		},
		messages: {

		}
	});
	
	if($('#check_out_form').valid()){
		$('#check_out_form').ajaxSubmit({
			dataType: "json",
			type: "POST",
			data:{
				order_status:"1"
			},
			success: function (data) {
				if (data.result == false) {
					layer.msg(data.message);
				} else {
					layer.msg(data.message);
					location.href = action_base_dir + "/index";
				}
			},
			error: function (XMLHttpRequest, textStatus, errorThrown) {
				alert("errorThrown:" + errorThrown);
			}
		});
	}
};
