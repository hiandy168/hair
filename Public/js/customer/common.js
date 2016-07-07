/**
 * JavaScript 共通设定
 */

//**************************************************************** 
//* 名　　称：messages 
//* 功    能：验证控件默认提示信息
//***************************************************************** 
var messages = {
	"hair.message.success": "操作成功",
	"hair.message.error": "操作错误",
	"hair.dialog.ok": "确&nbsp;&nbsp;定",
	"hair.dialog.cancel": "取&nbsp;&nbsp;消",
	"hair.dialog.deleteConfirm": "您确定要删除吗？",
	"hair.dialog.clearConfirm": "您确定要清空吗？",
	"hair.validate.required": "必填",
	"hair.validate.email": "E-mail格式错误",
	"hair.validate.url": "网址格式错误",
	"hair.validate.date": "日期格式错误",
	"hair.validate.dateISO": "日期格式错误",
	"hair.validate.pointcard": "信用卡格式错误",
	"hair.validate.number": "只允许输入数字",
	"hair.validate.digits": "只允许输入零或正整数",
	"hair.validate.minlength": "长度不允许小于{0}",
	"hair.validate.maxlength": "长度不允许大于{0}",
	"hair.validate.rangelength": "长度必须在{0}-{1}之间",
	"hair.validate.min": "不允许小于{0}",
	"hair.validate.max": "不允许大于{0}",
	"hair.validate.range": "必须在{0}-{1}之间",
	"hair.validate.accept": "输入后缀错误",
	"hair.validate.equalTo": "两次输入不一致",
	"hair.validate.remote": "输入错误",
	"hair.validate.integer": "只允许输入整数",
	"hair.validate.positive": "只允许输入正数",
	"hair.validate.negative": "只允许输入负数",
	"hair.validate.decimal": "数值超出了允许范围",
	"hair.validate.pattern": "格式错误",
	"hair.validate.extension": "文件格式错误",
	"hair.validate.isMobile": "手机号码格式错误"
};

//**************************************************************** 
//* 名　　称：message 
//* 功    能：取得提示信息 
//* 入口参数：code：信息号码 
//* 出口参数：号码对应的信息
//***************************************************************** 
function message(code) {
	if (code != null) {
		var content = messages[code] != null ? messages[code] : code;
		if (arguments.length == 1) {
			return content;
		} else {
			if ($.isArray(arguments[1])) {
				$.each(arguments[1], function(i, n) {
					content = content.replace(new RegExp("\\{" + i + "\\}", "g"), n);
				});
				return content;
			} else {
				$.each(Array.prototype.slice.apply(arguments).slice(1), function(i, n) {
					content = content.replace(new RegExp("\\{" + i + "\\}", "g"), n);
				});
				return content;
			}
		}
	}
}

//**************************************************************** 
//* 功    能：验证控件提示信息的追加
//***************************************************************** 
if ($.validator != null) {
	$.extend($.validator.messages, {
		required: message("hair.validate.required"),
		email: message("hair.validate.email"),
		url: message("hair.validate.url"),
		date: message("hair.validate.date"),
		dateISO: message("hair.validate.dateISO"),
		pointcard: message("hair.validate.pointcard"),
		number: message("hair.validate.number"),
		digits: message("hair.validate.digits"),
		minlength: $.validator.format(message("hair.validate.minlength")),
		maxlength: $.validator.format(message("hair.validate.maxlength")),
		rangelength: $.validator.format(message("hair.validate.rangelength")),
		min: $.validator.format(message("hair.validate.min")),
		max: $.validator.format(message("hair.validate.max")),
		range: $.validator.format(message("hair.validate.range")),
		accept: message("hair.validate.accept"),
		equalTo: message("hair.validate.equalTo"),
		remote: message("hair.validate.remote"),
		integer: message("hair.validate.integer"),
		positive: message("hair.validate.positive"),
		negative: message("hair.validate.negative"),
		decimal: message("hair.validate.decimal"),
		pattern: message("hair.validate.pattern"),
		extension: message("hair.validate.extension"),
		isMobile: message("hair.validate.isMobile")
	});
	
	//追加手机号码验证方法
	jQuery.validator.addMethod("isMobile", function(value, element) {  
	    var length = value.length;  
	    var mobile = /^(13[0-9]{9})|(18[0-9]{9})|(14[0-9]{9})|(17[0-9]{9})|(15[0-9]{9})$/;  
	    return this.optional(element) || (length == 11 && mobile.test(value));  
	}, "请正确填写您的手机号码");
	
	//追加电话号码验证
	jQuery.validator.addMethod("phone", function(value, element) { 
		var tel = /^(0[0-9]{2,3}\-)?([2-9][0-9]{6,7})+(\-[0-9]{1,4})?$/; 
		return this.optional(element) || (tel.test(value)); 
	}, "请正确填写您的电话号码");
	
	//追加身份证号码验证
	jQuery.validator.addMethod("isIdCardNo", function (value, element) {
      return this.optional(element) || isIdCardNo(value);
  }, "请正确填写您的身份证号码");
	
	//追加字母和数字验证  
  jQuery.validator.addMethod("chrengnum", function(value, element) {
		var chrnum = /^([a-zA-Z0-9]+)$/;
		return this.optional(element) || (chrnum.test(value));
	}, "只能输入数字和字母(字符A-Z, a-z, 0-9)");
}

//**************************************************************** 
//* 名　　称：isIdCardNo 
//* 功    能：身份证号码判断 
//* 入口参数：num：需要判断的数据 
//* 出口参数：true，false
//***************************************************************** 
function isIdCardNo(num) {
    var factorArr = new Array(7, 9, 10, 5, 8, 4, 2, 1, 6, 3, 7, 9, 10, 5, 8, 4, 2, 1);
    var parityBit = new Array("1", "0", "X", "9", "8", "7", "6", "5", "4", "3", "2");
    var varArray = new Array();
    var intValue;
    var lngProduct = 0;
    var intCheckDigit;
    var intStrLen = num.length;
    var idNumber = num;
    // initialize
    if ((intStrLen != 15) && (intStrLen != 18)) {
        return false;
    }
    // check and set value
    for (i = 0; i < intStrLen; i++) {
        varArray[i] = idNumber.charAt(i);
        if ((varArray[i] < '0' || varArray[i] > '9') && (i != 17)) {
            return false;
        } else if (i < 17) {
            varArray[i] = varArray[i] * factorArr[i];
        }
    }
    if (intStrLen == 18) {
        //check date
        var date8 = idNumber.substring(6, 14);
        if (isDate8(date8) == false) {
            return false;
        }
        // calculate the sum of the products
        for (i = 0; i < 17; i++) {
            lngProduct = lngProduct + varArray[i];
        }
        // calculate the check digit
        intCheckDigit = parityBit[lngProduct % 11];
        // check last digit
        if (varArray[17] != intCheckDigit) {
            return false;
        }
    }
    else {        //length is 15
        //check date
        var date6 = idNumber.substring(6, 12);
        if (isDate6(date6) == false) {
            return false;
        }
    }
    return true;
}
function isDate6(sDate) {
    if (!/^[0-9]{6}$/.test(sDate)) {
        return false;
    }
    var year, month, day;
    year = sDate.substring(0, 4);
    month = sDate.substring(4, 6);
    if (year < 1700 || year > 2500) return false;
    if (month < 1 || month > 12) return false;
    return true;
}

function isDate8(sDate) {
    if (!/^[0-9]{8}$/.test(sDate)) {
        return false;
    }
    var year, month, day;
    year = sDate.substring(0, 4);
    month = sDate.substring(4, 6);
    day = sDate.substring(6, 8);
    var iaMonthDays = [31, 28, 31, 30, 31, 30, 31, 31, 30, 31, 30, 31];
    if (year < 1700 || year > 2500) return false;
    if (((year % 4 == 0) && (year % 100 != 0)) || (year % 400 == 0)) iaMonthDays[1] = 29;
    if (month < 1 || month > 12) return false;
    if (day < 1 || day > iaMonthDays[month - 1]) return false;
    return true;
}


//**************************************************************** 
//* 名　　称：DataLength 
//* 功    能：计算数据的长度 
//* 入口参数：fData：需要计算的数据 
//* 出口参数：返回fData的长度(Unicode长度为2，非Unicode长度为1) 
//***************************************************************** 
function DataLength(fData) 
{ 
    var intLength=0;
    for (var i=0;i<fData.length;i++) 
    { 
        if ((fData.charCodeAt(i) < 0) || (fData.charCodeAt(i) > 255)) 
            intLength=intLength+2;
        else 
            intLength=intLength+1;    
    } 
    return intLength; 
} 
//**************************************************************** 
//* 名　　称：IsEmpty 
//* 功    能：判断是否为空 
//* 入口参数：fData：要检查的数据 
//* 出口参数：True：空                              
//*           False：非空 
//***************************************************************** 
function IsEmpty(fData) 
{ 
    return ((fData==null) || (fData.length==0) ); 
} 


//**************************************************************** 
//* 名　　称：IsDigit 
//* 功    能：判断是否为数字 
//* 入口参数：fData：要检查的数据 
//* 出口参数：True：是0到9的数字                              
//*           False：不是0到9的数字 
//***************************************************************** 
function IsDigit(fData) 
{ 
    return ((fData>="0") && (fData<="9")); 
} 


//**************************************************************** 
//* 名　　称：IsInteger 
//* 功    能：判断是否为正整数 
//* 入口参数：fData：要检查的数据 
//* 出口参数：True：是整数，或者数据是空的                            
//*           False：不是整数 
//***************************************************************** 
function IsInteger(fData) 
{ 
    //如果为空，返回true 
    if (IsEmpty(fData)) 
        return true; 
    if ((isNaN(fData)) || (fData.indexOf(".")!=-1) || (fData.indexOf("-")!=-1)) 
        return false;    
    
    return true;    
} 

//**************************************************************** 
//* 名　　称：IsEmail 
//* 功    能：判断是否为正确的Email地址 
//* 入口参数：fData：要检查的数据 
//* 出口参数：True：正确的Email地址，或者空                              
//*           False：错误的Email地址 
//***************************************************************** 
function IsEmail(fData) 
{ 
    if (IsEmpty(fData)) 
        return true; 
    if (fData.indexOf("@")==-1) 
        return false; 
    var NameList=fData.split("@"); 
    if (NameList.length!=2) 
        return false;  
    if (NameList[0].length<1 ) 
        return false;   
    if (NameList[1].indexOf(".")<=0) 
        return false; 
    if (fData.indexOf("@")>fData.indexOf(".")) 
				return false; 
    if (fData.indexOf(".")==fData.length-1) 
				return false; 
    
    return true;    
} 

//**************************************************************** 
//* 名　　称：IsPhone 
//* 功    能：判断是否为正确的电话号码（可以含"()"、"（）"、"+"、"-"和空格） 
//* 入口参数：fData：要检查的数据 
//* 出口参数：True：正确的电话号码，或者空                              
//*           False：错误的电话号码 
//* 错误信息： 
//***************************************************************** 
function IsPhone(fData) 
{ 
    var str; 
    var fDatastr=""; 
    if (IsEmpty(fData)) 
        return true; 
    for (var i=0;i<fData.length;i++) 
    { 
        str=fData.substring(i,i+1); 
        if (str!="(" && str!=")" && str!="（" && str!="）" && str!="+" && str!="-" && str!=" ") 
           fDatastr=fDatastr+str; 
    }  
    //alert(fDatastr);  
    if (isNaN(fDatastr)) 
        return false; 
    return true;    
} 

//**************************************************************** 
//* 名　　称：IsPlusNumeric 
//* 功    能：判断是否为正确的正数（可以含小数部分） 
//* 入口参数：fData：要检查的数据 
//* 出口参数：True：正确的正数，或者空                              
//*           False：错误的正数 
//* 错误信息： 
//***************************************************************** 
function IsPlusNumeric(fData) 
{ 
    if (IsEmpty(fData)) 
        return true; 
    if ((isNaN(fData)) || (fData.indexOf("-")!=-1)) 
        return false; 
    return true;    
} 

//**************************************************************** 
//* 名　　称：IsNumeric 
//* 功    能：判断是否为正确的数字（可以为负数，小数） 
//* 入口参数：fData：要检查的数据 
//* 出口参数：True：正确的数字，或者空                              
//*           False：错误的数字 
//* 错误信息： 
//***************************************************************** 
function IsNumeric(fData) 
{ 
    if (IsEmpty(fData)) 
        return true; 
    if (isNaN(fData)) 
        return false; 
        
    return true;    
} 


//**************************************************************** 
//* 名　　称：IsIntegerInRange 
//* 功    能：判断一个数字是否在指定的范围内 
//* 入口参数：fInput：要检查的数据 
//*           fLower：检查的范围下限，如果没有下限，请用null 
//*           fHigh：检查的上限，如果没有上限，请用null 
//* 出口参数：True：在指定的范围内                              
//*           False：超出指定范围 
//***************************************************************** 
function IsIntegerInRange(fInput,fLower,fHigh) 
{ 
    if (fLower==null) 
        return (fInput<=fHigh); 
    else if (fHigh==null) 
        return (fInput>=fLower); 
    else         
        return ((fInput>=fLower) && (fInput<=fHigh)); 
}

//**************************************************************** 
//* 功    能：页面初始化函数 
//***************************************************************** 
$(document).ready(function() {
	
	//画面共通
	jQuery('#sidebar .sub-menu > a').click(function () {
	  var last = jQuery('.sub-menu.open', $('#sidebar'));
	  last.removeClass("open");
	  jQuery('.arrow', last).removeClass("open");
	  jQuery('.sub', last).slideUp(200);
	  var sub = jQuery(this).next();
	  if (sub.is(":visible")) {
	      jQuery('.arrow', jQuery(this)).removeClass("open");
	      jQuery(this).parent().removeClass("open");
	      sub.slideUp(200);
	  } else {
	      jQuery('.arrow', jQuery(this)).addClass("open");
	      jQuery(this).parent().addClass("open");
	      sub.slideDown(200);
	  }
	  var o = ($(this).offset());
	  diff = 200 - o.top;
	  if(diff>0)
	      $(".sidebar-scroll").scrollTo("-="+Math.abs(diff),500);
	  else
	      $(".sidebar-scroll").scrollTo("+="+Math.abs(diff),500);
  });

  $('.icon-reorder').click(function () {
	  if ($('#sidebar > ul').is(":visible") === true) {
	      $('#main-content').css({
	          'margin-left': '0px'
	      });
	      $('#sidebar').css({
	          'margin-left': '-180px'
	      });
	      $('#sidebar > ul').hide();
	      $("#container").addClass("sidebar-closed");
	  } else {
	      $('#main-content').css({
	          'margin-left': '180px'
	      });
	      $('#sidebar > ul').show();
	      $('#sidebar').css({
	          'margin-left': '0'
	      });
	      $("#container").removeClass("sidebar-closed");
	  }
  });

  $(".sidebar-scroll").niceScroll({styler:"fb",cursorcolor:"#4A8BC2", cursorwidth: '5', cursorborderradius: '0px', background: '#404040', cursorborder: ''});

  $(".portlet-scroll-1").niceScroll({styler:"fb",cursorcolor:"#4A8BC2", cursorwidth: '5', cursorborderradius: '0px', background: '#404040', cursorborder: ''});

  $(".portlet-scroll-2").niceScroll({styler:"fb",cursorcolor:"#4A8BC2", cursorwidth: '5', cursorborderradius: '0px', autohidemode: false, cursorborder: ''});

  $(".portlet-scroll-3").niceScroll({styler:"fb",cursorcolor:"#4A8BC2", cursorwidth: '5', cursorborderradius: '0px', background: '#404040', autohidemode: false, cursorborder: ''});

  $("html").niceScroll({styler:"fb",cursorcolor:"#4A8BC2", cursorwidth: '8', cursorborderradius: '0px', background: '#404040', cursorborder: '', zindex: '1000'});

  jQuery('.widget .tools .icon-chevron-down').click(function () {
    var el = jQuery(this).parents(".widget").children(".widget-body");
    if (jQuery(this).hasClass("icon-chevron-down")) {
        jQuery(this).removeClass("icon-chevron-down").addClass("icon-chevron-up");
        el.slideUp(200);
    } else {
        jQuery(this).removeClass("icon-chevron-up").addClass("icon-chevron-down");
        el.slideDown(200);
    }
  });

  jQuery('.widget .tools .icon-remove').click(function () {
    jQuery(this).parents(".widget").parent().remove();
  });

  $('.element').tooltip();

  $('.tooltips').tooltip();

  $('.popovers').popover();

  $('.scroller').slimscroll({
    height: 'auto'
  });
	
	if($( ".datepicker_field" ).length>0){
		  $( ".datepicker_field" ).datepicker( { 
		     dateFormat: 'yy/mm/dd',
		     dayNamesMin: ['日','一', '二', '三', '四', '五', '六'],
		     monthNames:['一月','二月','三月','四月','五月','六月','七月','八月','九月','十月','十一月','十二月'],
		     buttonImage: web_res_root + "/img/date_btn.png",
		     showOn:"both",
		     defaultDate: "+0d"
		  } );
	  }
	
	if($(".chzn-select").length > 0){
		$(".chzn-select").chosen();
		$(".chzn-select-deselect").chosen({allow_single_deselect:true});
	}
    
	if ($('table[rel="data_table"]').length > 0) {
		$('#data').dataTable({
			"sDom" : "<'row-fluid'<'span6'l><'span6'f>r>t<'row-fluid'<'span6'i><'span6'p>>",
			"sPaginationType" : "bootstrap",
			"oLanguage" : {
				"sLengthMenu" : "_MENU_ records per page",
				"oPaginate" : {
					"sPrevious" : "上一页",
					"sNext" : "下一页"
				}
			},
			"aoColumnDefs" : [{
				'bSortable' : false,
				'aTargets' : [0]
			}]
		});
	}
	
	//表单radio，checkbox样式设定
	if($("input[type=radio], input[type=checkbox]").length > 0){
		$("input[type=radio], input[type=checkbox]").uniform();	
	}
});

//**************************************************************** 
//* 功    能：页面加载完成执行函数 
//***************************************************************** 
$(window).load(function() {

});