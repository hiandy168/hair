/**
 * 
 */

$(document).ready(function() {
	
	if($("#service_1").length > 0){
		$.ajax({
			dataType: "json",
			url : action_base_dir + "/report/serviceReportData",
			type: "POST",
			success: function (data) {
				
				var data_string = [];
				var i = 0;
				$.each(data,function(name,value) {
					
					data_string[i] = { label: value.service_name ,data: parseFloat(value.real_result)};
					
					i=i+1;
				});
				
				$.plot($("#service_1"), data_string,
				{
				    series: {
				        pie: {
				            show: true,
				            radius: 1,
				            label: {
				                show: true,
				                radius: 1,
				                formatter: function(label, series){
				                    return '<div style="font-size:8pt;text-align:center;padding:2px;color:white;">'+label+'<br/>'+Math.round(series.percent)+'%</div>';
				                },
				                background: { opacity: 0.8 }
				            }
				        }
				    },
				    legend: {
				        show: false
				    }
				});
			},
			error: function (XMLHttpRequest, textStatus, errorThrown) {
				alert("errorThrown:" + errorThrown);
			}
		});
	}
	
	if($("#course_1").length > 0){
		$.ajax({
			dataType: "json",
			url : action_base_dir + "/report/courseReportData",
			type: "POST",
			success: function (data) {
				
				var data_string = [];
				var i = 0;
				$.each(data,function(name,value) {
					
					data_string[i] = { label: value.course_name ,data: parseFloat(value.course_result)};
					
					i=i+1;
				});
				
				$.plot($("#course_1"), data_string,
				{
				    series: {
				        pie: {
				            show: true,
				            radius: 1,
				            label: {
				                show: true,
				                radius: 1,
				                formatter: function(label, series){
				                    return '<div style="font-size:8pt;text-align:center;padding:2px;color:white;">'+label+'<br/>'+Math.round(series.percent)+'%</div>';
				                },
				                background: { opacity: 0.8 }
				            }
				        }
				    },
				    legend: {
				        show: false
				    }
				});
			},
			error: function (XMLHttpRequest, textStatus, errorThrown) {
				alert("errorThrown:" + errorThrown);
			}
		});
	}
	
	if($("#charge_1").length > 0){
		$.ajax({
			dataType: "json",
			url : action_base_dir + "/report/chargeReportData",
			type: "POST",
			success: function (data) {
				
				var data_string = [];
				var i = 0;
				$.each(data,function(name,value) {
					
					data_string[i] = { label: value.member_card_type_id ,data: parseFloat(value.charge_amoung)};
					
					i=i+1;
				});
				
				$.plot($("#charge_1"), data_string,
				{
				    series: {
				        pie: {
				            show: true,
				            radius: 1,
				            label: {
				                show: true,
				                radius: 1,
				                formatter: function(label, series){
				                    return '<div style="font-size:8pt;text-align:center;padding:2px;color:white;">'+label+'<br/>'+Math.round(series.percent)+'%</div>';
				                },
				                background: { opacity: 0.8 }
				            }
				        }
				    },
				    legend: {
				        show: false
				    }
				});
			},
			error: function (XMLHttpRequest, textStatus, errorThrown) {
				alert("errorThrown:" + errorThrown);
			}
		});
	}
});