/**
 * @author chenjianqiang98
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
