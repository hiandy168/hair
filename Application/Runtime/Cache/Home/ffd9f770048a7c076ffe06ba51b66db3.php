<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
<title>秀管家</title>
<meta content="width=device-width, initial-scale=1.0" name="viewport" />
<meta content="" name="description" />
<meta content="" name="author" />

<link rel="stylesheet" type="text/css" href="<?php echo (C("WEB_RES_ROOT")); ?>/assets/bootstrap/css/bootstrap.min.css"/>
<link rel="stylesheet" type="text/css" href="<?php echo (C("WEB_RES_ROOT")); ?>/assets/bootstrap/css/bootstrap-responsive.min.css"/>
<link rel="stylesheet" type="text/css" href="<?php echo (C("WEB_RES_ROOT")); ?>/assets/bootstrap/css/bootstrap-fileupload.css"/>
<link rel="stylesheet" type="text/css" href="<?php echo (C("WEB_RES_ROOT")); ?>/assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
<link rel="stylesheet" type="text/css" href="<?php echo (C("WEB_RES_ROOT")); ?>/css/style.css"/>
<link rel="stylesheet" type="text/css" href="<?php echo (C("WEB_RES_ROOT")); ?>/css/style-responsive.css"/>
<link rel="stylesheet" type="text/css" href="<?php echo (C("WEB_RES_ROOT")); ?>/css/style-default.css"/>
<link rel="stylesheet" type="text/css" href="<?php echo (C("WEB_RES_ROOT")); ?>/assets/fancybox/source/jquery.fancybox.css"/>
<link rel="stylesheet" type="text/css" href="<?php echo (C("WEB_RES_ROOT")); ?>/assets/uniform/css/uniform.default.css" />
<link rel="stylesheet" type="text/css" href="<?php echo (C("WEB_RES_ROOT")); ?>/assets/chosen-bootstrap/chosen/chosen.css" />
<link rel="stylesheet" type="text/css" href="<?php echo (C("WEB_RES_ROOT")); ?>/assets/select2/css/select2.min.css" />
<link rel="stylesheet" type="text/css" href="<?php echo (C("WEB_RES_ROOT")); ?>/assets/jquery-tags-input/jquery.tagsinput.css" />
<link rel="stylesheet" type="text/css" href="<?php echo (C("WEB_RES_ROOT")); ?>/assets/clockface/css/clockface.css" />
<link rel="stylesheet" type="text/css" href="<?php echo (C("WEB_RES_ROOT")); ?>/assets/bootstrap-wysihtml5/bootstrap-wysihtml5.css" />
<link rel="stylesheet" type="text/css" href="<?php echo (C("WEB_RES_ROOT")); ?>/assets/bootstrap-datepicker/css/datepicker.css" />
<link rel="stylesheet" type="text/css" href="<?php echo (C("WEB_RES_ROOT")); ?>/assets/bootstrap-timepicker/compiled/timepicker.css" />
<link rel="stylesheet" type="text/css" href="<?php echo (C("WEB_RES_ROOT")); ?>/assets/bootstrap-colorpicker/css/colorpicker.css" />
<link rel="stylesheet" type="text/css" href="<?php echo (C("WEB_RES_ROOT")); ?>/assets/bootstrap-toggle-buttons/static/stylesheets/bootstrap-toggle-buttons.css" />
<link rel="stylesheet" type="text/css" href="<?php echo (C("WEB_RES_ROOT")); ?>/assets/bootstrap-daterangepicker/daterangepicker.css" />
<link rel="stylesheet" type="text/css" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css" />
<link rel="stylesheet" type="text/css" href="<?php echo (C("WEB_RES_ROOT")); ?>/css/style-customer.css" />
  </head>
  <body class="lock">
  	<div class="lock-header">
  		<a class="center" id="logo" href="<?php echo (C("ACTION_BASE_DIR")); ?>/">
  			<h1>秀管家</h1>
  		</a>
  	</div>
  	<form action="<?php echo (C("ACTION_BASE_DIR")); ?>/admin/adminLogin" method="post" id="loginForm" class="cmxform">
  		<div class="login-wrap">
  			<div class="metro single-size red">
  				<div class="locked">
  					<i class="icon-lock"></i> <span>登录</span>
  				</div>
  			</div>
  			<div class="metro double-size green">
  				<div class="input-append lock-input">
  					<input type="text" class="" placeholder="管理员用户名" name="admin_name">
  				</div>
  			</div>
  			<div class="metro double-size yellow">
  				<div class="input-append lock-input">
  					<input type="password" class="" placeholder="密码" name="admin_password">
  				</div>
  			</div>
  			<div class="metro single-size terques login">
  				<button type="button" class="btn login-btn" id="login_btn">
  					登录 <i class=" icon-long-arrow-right"></i>
  				</button>
  			</div>
  			<!--
  			<div class="login-footer">
  				<div class="remember-hint pull-left">
  					<input type="checkbox" id=""> 记住密码
  				</div>
  				<div class="forgot-hint pull-right">
  					<a id="forget-password" class="" href="javascript:;">忘记密码?</a>
  				</div>
  			</div>
  			-->
  		</div>
  	</form>
  </body>
  <script type="text/javascript" src="<?php echo (C("WEB_RES_ROOT")); ?>/js/jquery-1.8.2.min.js"></script>
<script type="text/javascript" src="<?php echo (C("WEB_RES_ROOT")); ?>/js/jquery.nicescroll.js"></script>
<script type="text/javascript" src="<?php echo (C("WEB_RES_ROOT")); ?>/assets/ckeditor/ckeditor.js"></script>
<script type="text/javascript" src="<?php echo (C("WEB_RES_ROOT")); ?>/assets/bootstrap/js/bootstrap.min.js"></script>
<script type="text/javascript" src="<?php echo (C("WEB_RES_ROOT")); ?>/assets/bootstrap/js/bootstrap-fileupload.js"></script>
<script type="text/javascript" src="<?php echo (C("WEB_RES_ROOT")); ?>/js/jquery.blockui.js"></script>
<script type="text/javascript" src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
<script type="text/javascript" src="<?php echo (C("WEB_RES_ROOT")); ?>/js/jQuery.dualListBox-1.3.js"></script>
<script type="text/javascript" src="<?php echo (C("WEB_RES_ROOT")); ?>/assets/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<script type="text/javascript" src="<?php echo (C("WEB_RES_ROOT")); ?>/assets/bootstrap-toggle-buttons/static/js/jquery.toggle.buttons.js"></script>
<script type="text/javascript" src="<?php echo (C("WEB_RES_ROOT")); ?>/assets/chosen-bootstrap/chosen/chosen.jquery.min.js"></script>
<script type="text/javascript" src="<?php echo (C("WEB_RES_ROOT")); ?>/assets/select2/js/select2.min.js"></script>
<script type="text/javascript" src="<?php echo (C("WEB_RES_ROOT")); ?>/assets/uniform/jquery.uniform.min.js"></script>
<script type="text/javascript" src="<?php echo (C("WEB_RES_ROOT")); ?>/assets/bootstrap-wysihtml5/wysihtml5-0.3.0.js"></script>
<script type="text/javascript" src="<?php echo (C("WEB_RES_ROOT")); ?>/assets/bootstrap-wysihtml5/bootstrap-wysihtml5.js"></script>
<script type="text/javascript" src="<?php echo (C("WEB_RES_ROOT")); ?>/assets/clockface/js/clockface.js"></script>
<script type="text/javascript" src="<?php echo (C("WEB_RES_ROOT")); ?>/assets/jquery-tags-input/jquery.tagsinput.min.js"></script>
<!--
<script type="text/javascript" src="<?php echo (C("WEB_RES_ROOT")); ?>/assets/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
<script type="text/javascript" src="<?php echo (C("WEB_RES_ROOT")); ?>/assets/bootstrap-daterangepicker/date.js"></script>
<script type="text/javascript" src="<?php echo (C("WEB_RES_ROOT")); ?>/assets/bootstrap-daterangepicker/daterangepicker.js"></script>
<script type="text/javascript" src="<?php echo (C("WEB_RES_ROOT")); ?>/assets/bootstrap-colorpicker/js/bootstrap-colorpicker.js"></script>
<script type="text/javascript" src="<?php echo (C("WEB_RES_ROOT")); ?>/assets/bootstrap-timepicker/js/bootstrap-timepicker.js"></script>
<script type="text/javascript" src="<?php echo (C("WEB_RES_ROOT")); ?>/assets/bootstrap-inputmask/bootstrap-inputmask.min.js"></script>
-->
<script type="text/javascript" src="<?php echo (C("WEB_RES_ROOT")); ?>/assets/fancybox/source/jquery.fancybox.pack.js"></script>
<script type="text/javascript" src="<?php echo (C("WEB_RES_ROOT")); ?>/assets/flot/jquery.flot.js"></script>
<script type="text/javascript" src="<?php echo (C("WEB_RES_ROOT")); ?>/assets/flot/jquery.flot.resize.js"></script>
<script type="text/javascript" src="<?php echo (C("WEB_RES_ROOT")); ?>/assets/flot/jquery.flot.pie.js"></script>
<script type="text/javascript" src="<?php echo (C("WEB_RES_ROOT")); ?>/assets/flot/jquery.flot.stack.js"></script>
<script type="text/javascript" src="<?php echo (C("WEB_RES_ROOT")); ?>/assets/flot/jquery.flot.crosshair.js"></script>
<script type="text/javascript" src="<?php echo (C("WEB_RES_ROOT")); ?>/js/jquery.scrollTo.min.js"></script>
<script type="text/javascript" charset="utf-8">
  var action_base_dir = "<?php echo (C("ACTION_BASE_DIR")); ?>";
  var web_res_root = "<?php echo (C("WEB_RES_ROOT")); ?>";
</script>
<script type="text/javascript" src="<?php echo (C("WEB_RES_ROOT")); ?>/js/jquery.validate.min.js"></script>
<script type="text/javascript" src="<?php echo (C("WEB_RES_ROOT")); ?>/js/jquery.form.min.js"></script>
<script type="text/javascript" src="<?php echo (C("WEB_RES_ROOT")); ?>/js/layer/layer.js"></script>
<script type="text/javascript" src="<?php echo (C("WEB_RES_ROOT")); ?>/js/customer/common.js"></script>
<script type="text/javascript" src="<?php echo (C("WEB_RES_ROOT")); ?>/js/customer/functions.js"></script>
<script type="text/javascript" src="<?php echo (C("WEB_RES_ROOT")); ?>/js/customer/formsubmit.js"></script>
<!--
<script type="text/javascript" src="<?php echo (C("WEB_RES_ROOT")); ?>/js/customer/admin.js"></script>
<script type="text/javascript" src="<?php echo (C("WEB_RES_ROOT")); ?>/js/customer/course.js"></script>
<script type="text/javascript" src="<?php echo (C("WEB_RES_ROOT")); ?>/js/customer/employee.js"></script>
<script type="text/javascript" src="<?php echo (C("WEB_RES_ROOT")); ?>/js/customer/login.js"></script>
<script type="text/javascript" src="<?php echo (C("WEB_RES_ROOT")); ?>/js/customer/member.js"></script>
<script type="text/javascript" src="<?php echo (C("WEB_RES_ROOT")); ?>/js/customer/order.js"></script>
<script type="text/javascript" src="<?php echo (C("WEB_RES_ROOT")); ?>/js/customer/report.js"></script>
<script type="text/javascript" src="<?php echo (C("WEB_RES_ROOT")); ?>/js/customer/service.js"></script>
-->
</html>