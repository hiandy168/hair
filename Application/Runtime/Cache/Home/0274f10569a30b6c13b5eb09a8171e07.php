<?php if (!defined('THINK_PATH')) exit();?>﻿<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!-->
<html>
  <!--<![endif]-->
  <!-- BEGIN HEAD -->
  <head>
    <meta charset="utf-8" />
    <title>秀管家</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <meta content="" name="description" />
    <meta content="" name="author" />
    <link href="<?php echo (C("WEB_RES_ROOT")); ?>/assets/bootstrap/css/bootstrap.min.css" rel="stylesheet" />
    <link href="<?php echo (C("WEB_RES_ROOT")); ?>/assets/bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet" />
    <link href="<?php echo (C("WEB_RES_ROOT")); ?>/assets/bootstrap/css/bootstrap-fileupload.css" rel="stylesheet" />
    <link href="<?php echo (C("WEB_RES_ROOT")); ?>/assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <link href="<?php echo (C("WEB_RES_ROOT")); ?>/css/style.css" rel="stylesheet" />
    <link href="<?php echo (C("WEB_RES_ROOT")); ?>/css/style-responsive.css" rel="stylesheet" />
    <link href="<?php echo (C("WEB_RES_ROOT")); ?>/css/style-default.css" rel="stylesheet" id="style_color" />
    <link href="<?php echo (C("WEB_RES_ROOT")); ?>/assets/fancybox/source/jquery.fancybox.css" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="<?php echo (C("WEB_RES_ROOT")); ?>/assets/uniform/css/uniform.default.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo (C("WEB_RES_ROOT")); ?>/assets/chosen-bootstrap/chosen/chosen.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo (C("WEB_RES_ROOT")); ?>/assets/jquery-tags-input/jquery.tagsinput.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo (C("WEB_RES_ROOT")); ?>/assets/clockface/css/clockface.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo (C("WEB_RES_ROOT")); ?>/assets/bootstrap-wysihtml5/bootstrap-wysihtml5.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo (C("WEB_RES_ROOT")); ?>/assets/bootstrap-datepicker/css/datepicker.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo (C("WEB_RES_ROOT")); ?>/assets/bootstrap-timepicker/compiled/timepicker.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo (C("WEB_RES_ROOT")); ?>/assets/bootstrap-colorpicker/css/colorpicker.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo (C("WEB_RES_ROOT")); ?>/assets/bootstrap-toggle-buttons/static/stylesheets/bootstrap-toggle-buttons.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo (C("WEB_RES_ROOT")); ?>/assets/bootstrap-daterangepicker/daterangepicker.css" />
    <link rel="stylesheet" type="text/css" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css" />

  </head>
  <!-- END HEAD -->
  <!-- BEGIN BODY -->
  <body class="fixed-top">
    <!-- BEGIN HEADER -->
    <div id="header" class="navbar navbar-inverse navbar-fixed-top">
	<!-- BEGIN TOP NAVIGATION BAR -->
	<div class="navbar-inner">
		<div class="container-fluid">
			<!--BEGIN SIDEBAR TOGGLE-->
			<div class="sidebar-toggle-box hidden-phone">
				<div class="icon-reorder tooltips" data-placement="right"
					data-original-title="Toggle Navigation"></div>
			</div>
			<!--END SIDEBAR TOGGLE-->
			<!-- BEGIN LOGO -->
			<!--
			<a class="brand" href="index.html">秀管家</a>
			-->
			<!-- END LOGO -->
			<!-- BEGIN RESPONSIVE MENU TOGGLER -->
			<a class="btn btn-navbar collapsed" id="main_menu_trigger"
				data-toggle="collapse" data-target=".nav-collapse"> <span
				class="icon-bar"></span> <span class="icon-bar"></span> <span
				class="icon-bar"></span> <span class="arrow"></span>
			</a>
			<!-- END RESPONSIVE MENU TOGGLER -->
			<div class="top-nav ">
				<ul class="nav pull-right top-menu">
					<!-- BEGIN USER LOGIN DROPDOWN -->
					<li class="dropdown"><a href="#" class="dropdown-toggle"
						data-toggle="dropdown">
						<span class="username"><?php echo ($_SESSION['admin']['admin_name']); ?></span>
						<b class="caret"></b>
					</a>
						<ul class="dropdown-menu extended logout">
							<li><a href="<?php echo (C("ACTION_BASE_DIR")); ?>/admin/adminLogout"><i class="icon-key"></i>退出</a></li>
						</ul></li>
					<!-- END USER LOGIN DROPDOWN -->
				</ul>
				<!-- END TOP NAVIGATION MENU -->
			</div>
		</div>
	</div>
	<!-- END TOP NAVIGATION BAR -->
</div>
    <!-- END HEADER -->
    <!-- BEGIN CONTAINER -->
    <div id="container" class="row-fluid">
      <!-- BEGIN SIDEBAR -->
      <div class="sidebar-scroll">
        <div class="sidebar-scroll">
	<div id="sidebar" class="nav-collapse collapse">
		<!-- BEGIN RESPONSIVE QUICK SEARCH FORM -->
		<div class="navbar-inverse">
			<form class="navbar-search visible-phone">
				<input type="text" class="search-query" placeholder="Search" />
			</form>
		</div>
		<!-- END RESPONSIVE QUICK SEARCH FORM -->
		<!-- BEGIN SIDEBAR MENU -->
		<ul class="sidebar-menu">
			<?php if(stripos($action_list,'Cash') !== false): ?><li class="sub-menu <?php echo stripos($base_url , 'Home') !== false ? active: ''; ?> ">
					<a class="" href="<?php echo (C("ACTION_BASE_DIR")); ?>"> <i 	class="icon icon-tasks"></i> <span>收银</span>
					</a>
				</li><?php endif; ?>
			<?php if(stripos($action_list,'OpenCard') !== false): ?><li class="sub-menu <?php echo stripos($base_url , 'toMemberAdd') !== false ? active: ''; ?> ">
					<a class="" href="<?php echo (C("ACTION_BASE_DIR")); ?>/member/toMemberAdd"> <i class="icon icon-user"> </i> <span>开卡</span>
					</a>
				</li><?php endif; ?>
			<?php if(stripos($action_list,'Booking') !== false): ?><li class="sub-menu <?php echo stripos($base_url , 'toBookList') !== false ? active: ''; ?> ">
          <a class="" href="<?php echo (C("ACTION_BASE_DIR")); ?>/member/toBookList"> <i class="icon icon-headphones"> </i> <span>预约</span>
          </a>
        </li><?php endif; ?>
			<?php if(stripos($action_list,'OrderPending') !== false): ?><li class="sub-menu <?php echo stripos($base_url , 'orderPendingList') !== false ? active: ''; ?>">
					<a class="" href="<?php echo (C("ACTION_BASE_DIR")); ?>/order/orderPendingList"> <i class="icon icon-list-alt"></i> <span>挂单</span>
					</a>
				</li><?php endif; ?>
			<?php if(stripos($action_list,'TodayAllOrder') !== false): ?><li class="sub-menu <?php echo stripos($base_url , 'orderTodayAllList') != false ? active: ''; ?>">
					<a class="" href="<?php echo (C("ACTION_BASE_DIR")); ?>/order/orderTodayAllList"> <i class="icon icon-list"></i> <span>今日水单</span>
					</a>
				</li><?php endif; ?>
			<?php if(stripos($action_list,'DayMoney') !== false): ?><li class="sub-menu <?php echo stripos($base_url , 'dayMoneyList') !== false ? active: ''; ?>">
          <a class="" href="<?php echo (C("ACTION_BASE_DIR")); ?>/order/dayMoneyList"> <i class="icon icon-indent-left"></i> <span>日常收支</span>
          </a>
        </li><?php endif; ?>
			<?php if(stripos($action_list,'MemberManagement') !== false): ?><li class="sub-menu <?php echo stripos($base_url , 'memberList') !== false ? 'open active' : ''; ?>">
					<a href="javascript:;" class="">
						<i class="icon icon-check"></i> <span>会员管理</span> <span class="arrow"></span>
					</a>
					<ul class="sub" <?php echo stripos($base_url , 'memberList') !== false ? 'style="display: block;"' : ''; ?>>
						<?php if(stripos($action_list,'MemberList') !== false): ?><li><a class="" href="<?php echo (C("ACTION_BASE_DIR")); ?>/member/memberList">会员列表</a></li><?php endif; ?>
					</ul>
				</li><?php endif; ?>
			<?php if(stripos($action_list,'BussinessRecord') !== false): ?><li class="sub-menu <?php echo (stripos($base_url,'orderServiceList') !== false or stripos($base_url , 'orderCourseList') !== false or stripos($base_url , 'orderChargeList') !== false) ? 'open active' : '' ?>">
					<a href="javascript:;" class="">
						<i class="icon-calendar"></i> <span>营业记录</span> <span class="arrow"></span>
					</a>
					<ul class="sub" <?php echo (stripos($base_url ,'orderServiceList') !== false or stripos($base_url ,'orderCourseList') !== false or stripos($base_url ,'orderChargeList') !== false) ? 'style="display: block;"' : ''; ?>>
						<?php if(stripos($action_list,'ServiceConsumerRecor') !== false): ?><li class="<?php echo stripos($base_url ,'orderServiceList') !== false ? active: ''; ?>"><a href="<?php echo (C("ACTION_BASE_DIR")); ?>/order/orderServiceList">项目消费记录</a></li><?php endif; ?>
						<?php if(stripos($action_list,'CourseConsumerRecord') !== false): ?><li class="<?php echo stripos($base_url ,'orderCourseList') !== false ? active: ''; ?>" ><a href="<?php echo (C("ACTION_BASE_DIR")); ?>/order/orderCourseList">订购套餐记录</a></li><?php endif; ?>
						<?php if(stripos($action_list,'ChargeConsumerRecord') !== false): ?><li class="<?php echo stripos($base_url ,'orderChargeList') !== false ? active: ''; ?>" ><a href="<?php echo (C("ACTION_BASE_DIR")); ?>/order/orderChargeList">充值开卡记录</a></li><?php endif; ?>
					</ul>
				</li><?php endif; ?>
			<?php if(stripos($action_list,'StatisticReport') !== false): ?><li class="sub-menu <?php echo (stripos($base_url,'serviceReport') !== false or stripos($base_url , 'courseReport') !== false or stripos($base_url , 'chargeReport') !== false) ? 'open active' : '' ?>">
					<a href="javascript:;" class="">
						<i class="icon-table"></i> <span>统计报表</span> <span class="arrow"></span>
					</a>
					<ul class="sub" <?php echo (stripos($base_url ,'serviceReport') !== false or stripos($base_url ,'courseReport') !== false or stripos($base_url ,'chargeReport') !== false) ? 'style="display: block;"' : ''; ?>>
						<?php if(stripos($action_list,'ServiceConsumerRepor') !== false): ?><li class="<?php echo stripos($base_url ,'serviceReport') !== false ? active: ''; ?>" ><a class="" href="<?php echo (C("ACTION_BASE_DIR")); ?>/report/serviceReport">项目消费报表</a></li><?php endif; ?>
						<?php if(stripos($action_list,'CourseConsumerReport') !== false): ?><li class="<?php echo stripos($base_url ,'courseReport') !== false ? active: ''; ?>" ><a class="" href="<?php echo (C("ACTION_BASE_DIR")); ?>/report/courseReport">套餐订购报表</a></li><?php endif; ?>
						<?php if(stripos($action_list,'ChargeConsumerReport') !== false): ?><li class="<?php echo stripos($base_url ,'chargeReport') !== false ? active: ''; ?>" ><a class="" href="<?php echo (C("ACTION_BASE_DIR")); ?>/report/chargeReport">会员卡充值报表</a></li><?php endif; ?>
					</ul>
				</li><?php endif; ?>
			<?php if(stripos($action_list,'OpenShopSetting') !== false): ?><li class="sub-menu <?php echo (stripos($base_url,'employeeList') !== false or stripos($base_url , 'memberCardTypeList') !== false or stripos($base_url , 'serviceList') !== false or stripos($base_url , 'courseList') !== false or stripos($base_url , 'shopList') !== false) ? 'open active' : '' ?>">
					<a href="javascript:;" class="">
						<i class="icon-wrench"></i> <span>开店设置</span> <span class="arrow"></span>
					</a>
					<ul class="sub" <?php echo (stripos($base_url,'employeeList') !== false or stripos($base_url , 'memberCardTypeList') !== false or stripos($base_url , 'serviceList') !== false or stripos($base_url , 'courseList') !== false or stripos($base_url , 'shopList') !== false) ? 'style="display: block;"' : '' ?>>
						<?php if(stripos($action_list,'EmployeeAdd') !== false): ?><li class="<?php echo stripos($base_url ,'employeeList') !== false ? active: ''; ?>" ><a class="" href="<?php echo (C("ACTION_BASE_DIR")); ?>/employee/employeeList">添加员工</a></li><?php endif; ?>
						<?php if(stripos($action_list,'MemberCardTypeAdd') !== false): ?><li class="<?php echo stripos($base_url ,'memberCardTypeList') !== false ? active: ''; ?>" ><a class="" href="<?php echo (C("ACTION_BASE_DIR")); ?>/member/memberCardTypeList">添加会员卡</a></li><?php endif; ?>
						<?php if(stripos($action_list,'ServiceAdd') !== false): ?><li class="<?php echo stripos($base_url ,'serviceList') !== false ? active: ''; ?>" ><a class="" href="<?php echo (C("ACTION_BASE_DIR")); ?>/service/serviceList">添加服务项目</a></li><?php endif; ?>
						<?php if(stripos($action_list,'courseList') !== false): ?><li class="<?php echo stripos($base_url ,'serviceList') !== false ? active: ''; ?>" ><a class="" href="<?php echo (C("ACTION_BASE_DIR")); ?>/course/courseList">添加套餐</a></li><?php endif; ?>
						<?php if(stripos($action_list,'ShopInforUpdate') !== false): ?><li class="<?php echo stripos($base_url ,'shopList') !== false ? active: ''; ?>" ><a class="" href="<?php echo (C("ACTION_BASE_DIR")); ?>/shop/shopList">店铺信息修改</a></li><?php endif; ?>
					</ul>
				</li><?php endif; ?>
			<?php if(stripos($action_list,'CommissionSetting') !== false): ?><li class="sub-menu <?php echo (stripos($base_url,'serviceCommisionList') !== false or stripos($base_url , 'memberCardTypeCommisionList') !== false or stripos($base_url , 'courseCommisionList') !== false) ? 'open active' : '' ?> ">
					<a href="javascript:;" class="">
						<i class="icon-credit-card"></i> <span>提成设置</span> <span class="arrow"></span>
					</a>
					<ul class="sub" <?php echo (stripos($base_url,'serviceCommisionList') !== false or stripos($base_url , 'memberCardTypeCommisionList') !== false or stripos($base_url , 'courseCommisionList') !== false) ? 'display: block;' : '' ?> >
						<?php if(stripos($action_list,'ServiceCommission') !== false): ?><li class="<?php echo stripos($base_url ,'serviceCommisionList') !== false ? active: ''; ?>"><a class="" href="<?php echo (C("ACTION_BASE_DIR")); ?>/service/serviceCommisionList">服务项目提成设置</a></li><?php endif; ?>
						<?php if(stripos($action_list,'ChargeCommission') !== false): ?><li class="<?php echo stripos($base_url ,'memberCardTypeCommisionList') !== false ? active: ''; ?>"><a class="" href="<?php echo (C("ACTION_BASE_DIR")); ?>/member/memberCardTypeCommisionList">开卡充值提成设置</a></li><?php endif; ?>
						<?php if(stripos($action_list,'CourseCommission') !== false): ?><li class="<?php echo stripos($base_url ,'courseCommisionList') !== false ? active: ''; ?>"><a class="" href="<?php echo (C("ACTION_BASE_DIR")); ?>/course/courseCommisionList">套餐订购提成设置</a></li><?php endif; ?>
					</ul>
				</li><?php endif; ?>
			<?php if(stripos($action_list,'SystemSetting') !== false): ?><li class="sub-menu <?php echo (stripos($base_url ,'adminList') !== false or stripos($base_url ,'systemLogList') !== false or stripos($base_url,'toAdminUpdate') !== false or stripos($base_url,'toAdminAdd') !== false) ? 'open active' : ''; ?> ">
				<a href="javascript:;" class="">
					<i class="icon-save"></i> <span>系统设置</span> <span class="arrow"></span>
				</a>
				<ul class="sub" <?php echo (stripos($base_url ,'adminList') !== false or stripos($base_url ,'systemLogList') !== false or stripos($base_url,"toAdminUpdate") !== false or stripos($base_url,'toAdminAdd') !== false) ? 'style="display: block;"' : ''; ?> >
					<?php if(stripos($action_list,'AdminSetting') !== false): ?><li class="<?php echo (stripos($base_url ,'adminList') !== false or stripos($base_url,'toAdminUpdate') !== false or stripos($base_url,'toAdminAdd') !== false ) ? active: ''; ?>"><a class="" href="<?php echo (C("ACTION_BASE_DIR")); ?>/admin/adminList">管理员设置</a></li><?php endif; ?>
					<?php if(stripos($action_list,'SystemLog') !== false): ?><li class="<?php echo (stripos($base_url ,'systemLogList') !== false) ? active: ''; ?>"><a class="" href="<?php echo (C("ACTION_BASE_DIR")); ?>/systemLog/systemLogList">系统日志</a></li><?php endif; ?>
				</ul>
			</li><?php endif; ?>
		</ul>
		<!-- END SIDEBAR MENU -->
	</div>
</div>
      </div>
      <!-- END SIDEBAR -->
      <!-- BEGIN PAGE -->
      <div id="main-content">
        <!-- BEGIN PAGE CONTAINER-->
        <div class="container-fluid">
          <!-- BEGIN PAGE HEADER-->
          <div class="row-fluid">
            <div class="span12">
              <!-- BEGIN THEME CUSTOMIZER-->
              <div id="theme-change" class="hidden-phone">
                <i class="icon-cogs"></i>
                <span class="settings"> <span class="text">Theme Color:</span> <span class="colors"> <span class="color-default" data-style="default"></span> <span class="color-green" data-style="green"></span> <span class="color-gray" data-style="gray"></span> <span class="color-purple" data-style="purple"></span> <span class="color-red" data-style="red"></span> </span> </span>
              </div>
              <!-- END THEME CUSTOMIZER-->
              <!-- BEGIN PAGE TITLE & BREADCRUMB-->
              <h3 class="page-title">服务项目提成列表</h3>
              <!-- END PAGE TITLE & BREADCRUMB-->
            </div>
          </div>
          <!-- END PAGE HEADER-->
          <!-- BEGIN ADVANCED TABLE widget-->
          <div class="row-fluid">
            <div class="span12">
              <!-- BEGIN EXAMPLE TABLE widget-->
              <div class="widget">
                <div class="widget-body">
                  <div class="row-fluid">
                    <div class="span12">
                      <!--BEGIN TABS-->
                      <div class="tabbable custom-tab">
                        <ul class="nav nav-tabs">
                          <?php $loop_count = '0'; ?>
                          <?php if(is_array($employeePositionBigList)): $i = 0; $__LIST__ = $employeePositionBigList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$member_position_big_list): $mod = ($i % 2 );++$i; if($loop_count == 0): ?><li class="active">
                                <a href="#tab_1_<?php echo ($loop_count); ?>" data-toggle="tab"><?php echo ($member_position_big_list["employee_position_big_name"]); ?></a>
                              </li>
                            <?php else: ?>
                              <li>
                                <a href="#tab_1_<?php echo ($loop_count); ?>" data-toggle="tab"><?php echo ($member_position_big_list["employee_position_big_name"]); ?></a>
                              </li><?php endif; ?>
                            <?php $loop_count = $loop_count + 1; endforeach; endif; else: echo "" ;endif; ?>
                        </ul>
                        <div class="tab-content">
                          <?php $loop_count = '0'; ?>
                          <?php if(is_array($employeePositionBigList)): $i = 0; $__LIST__ = $employeePositionBigList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$member_position_big_list): $mod = ($i % 2 );++$i; if($loop_count == 0): ?><div class="tab-pane active" id="tab_1_<?php echo ($loop_count); ?>">
                                  <div class="row-fluid">
                                    <div class="span12">
                                      <table class="table table-striped table-bordered">
                                        <thead>
                                          <tr>
                                            <th style="width:5%;">编号</th>
                                            <th style="width:25%;">名称</th>
                                            <th style="width:15%;">类型</th>
                                            <th style="width:40%;">服务项目提成标准</th>
                                            <th style="width:15%;">操作</th>
                                          </tr>
                                        </thead>
                                        <tbody>
                                          <?php $loop_count_type = '0'; ?>
                                          <?php $employee_position_big_id = $member_position_big_list["employee_position_big_id"]; ?>
                                          <?php if(is_array($serviceList)): $i = 0; $__LIST__ = $serviceList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$service): $mod = ($i % 2 );++$i;?><tr class="odd gradeX">
                                              <td><?php echo ($service["service_id"]); ?></td>
                                              <td><?php echo ($service["service_name"]); ?></td>
                                              <td><?php echo ($service["category_name"]); ?></td>
                                              <td>
                                                <?php $service_id = $service["service_id"]; ?>
                                                <?php if(is_array($serviceCommissionList)): $i = 0; $__LIST__ = $serviceCommissionList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$service_commission_list): $mod = ($i % 2 );++$i; $commission_service_id = $service_commission_list["service_id"]; ?>
                                                  <?php $commission_employee_position_big_id = $service_commission_list["employee_position_big_id"]; ?>
                                                  <?php if($service_id == $commission_service_id and $commission_employee_position_big_id == $employee_position_big_id): $personal_commision_type = $service_commission_list["personal_commision_type"]; ?>
                                                    <?php $personal_amount = $service_commission_list["personal_amount"]; ?>
                                                    <?php $personal_discount = $service_commission_list["personal_discount"]; ?>
                                                    <?php $member_commision_type = $service_commission_list["personal_commision_type"]; ?>
                                                    <?php $member_amount = $service_commission_list["personal_amount"]; ?>
                                                    <?php $member_discount = $service_commission_list["personal_discount"]; ?>
                                                    <?php echo ($service_commission_list["employee_position_name"]); ?>
                                                                                                                        散客提成<?php if(($personal_commision_type) == "0"): echo ($personal_amount); ?>￥<?php else: echo ($personal_discount); ?>%<?php endif; ?>
                                                      
                                                                                                                        会员提成<?php if(($member_commision_type) == "0"): echo ($member_amount); ?>￥<?php else: echo ($member_discount); ?>%<?php endif; ?>
                                                   <br><?php endif; endforeach; endif; else: echo "" ;endif; ?>
                                              </td>
                                              <td>
                                                <a class="btn btn-primary fancybox" href="#service_commision<?php echo ($loop_count); echo ($loop_count_type); ?>">修改提成</a>
                                                <a class="btn btn-danger">清空提成</a>
                                                <div class="row-fluid" id="service_commision<?php echo ($loop_count); echo ($loop_count_type); ?>" style="display:none;">
                                                  <div class="span12">
                                                    <form action="<?php echo (C("ACTION_BASE_DIR")); ?>/service/serviceCommisionProcess/" class="form-horizontal" method="post">
                                                      <div class="control-group">
                                                        <label class="control-label" style="width:80px;">已选项目:</label>
                                                        <div class="controls" style="margin-left:80px;">
                                                          <input type="text" class="span12" name="service_name" readonly value="<?php echo ($service["service_name"]); ?>"/>
                                                          <input type="hidden" class="span12" name="service_id" readonly value="<?php echo ($service["service_id"]); ?>"/>
                                                          <input type="hidden" class="span12" name="employee_position_big_id" readonly value="<?php echo ($employee_position_big_id); ?>"/>
                                                        </div>
                                                      </div>
                                                      <?php $loop_count_position = '0'; ?>
                                                      <?php if(is_array($employeePositionList)): $i = 0; $__LIST__ = $employeePositionList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$employee_position_list): $mod = ($i % 2 );++$i; $sub_employee_position_big_id = $employee_position_list["employee_position_big_id"]; ?>
                                                        <?php if($employee_position_big_id == $sub_employee_position_big_id): $personal_commision_type = ''; ?>
                                                          <?php $personal_amount = ''; ?>
                                                          <?php $personal_discount = ''; ?>
                                                          <?php $member_commision_type = ''; ?>
                                                          <?php $member_amount = ''; ?>
                                                          <?php $member_discount = ''; ?>
                                                          <?php if(is_array($serviceCommissionList)): foreach($serviceCommissionList as $key=>$service_commission_list): if($service_commission_list["service_id"] == $service_id and $service_commission_list["employee_position_id"] == $employee_position_list["employee_position_id"] and $service_commission_list["employee_position_big_id"] == $sub_employee_position_big_id): $personal_commision_type = $service_commission_list["personal_commision_type"]; ?>
                                                              <?php $personal_amount = $service_commission_list["personal_amount"]; ?>
                                                              <?php $personal_discount = $service_commission_list["personal_discount"]; ?>
                                                              <?php $member_commision_type = $service_commission_list["personal_commision_type"]; ?>
                                                              <?php $member_amount = $service_commission_list["personal_amount"]; ?>
                                                              <?php $member_discount = $service_commission_list["personal_discount"]; endif; endforeach; endif; ?>
                                                          <div class="row-fluid">
                                                            <div class="span12">
                                                              <div class="widget">
                                                                <div class="widget-title">
                                                                  <h4><i class="icon-reorder"></i><?php echo ($employee_position_list["employee_position_name"]); ?></h4>
                                                                  <span class="tools">
                                                                    <a class="icon-chevron-down" href="javascript:;"></a>
                                                                  </span>
                                                                </div>
                                                                <div class="widget-body">
                                                                  <input type="hidden" class="span12" name="employee_position_id[]" readonly value="<?php echo ($employee_position_list["employee_position_id"]); ?>"/>
                                                                  <div class="control-group">
                                                                    <label class="control-label" style="width:80px;">散客提成:</label>
                                                                    <div class="controls" style="margin-left:80px;">
                                                                      <div class="input-prepend input-append">
                                                                        <span class="add-on">
                                                                          <label class="radio"><input type='radio' name='personal_commision_type<?php echo ($loop_count_position); ?>' value='0' <?php echo ($personal_commision_type == ""? "checked":$personal_commision_type== "0"? "checked": ""); ?>/>金额</label>
                                                                        </span>
                                                                        <input class="span7" type="text" name="personal_amount[]" onfocus="radio_update(this)" value="<?php echo ($personal_amount); ?>">
                                                                        <span class="add-on">￥</span>
                                                                      </div>
                                                                      <div class="input-prepend input-append">
                                                                        <span class="add-on">
                                                                          <label class="radio"><input type='radio' name='personal_commision_type<?php echo ($loop_count_position); ?>' value='1' <?php echo ($personal_commision_type== "1"? "checked": ""); ?>/>比例</label>
                                                                        </span>
                                                                        <input class="span7" type="text" name="personal_discount[]" onfocus="radio_update(this)" value="<?php echo ($personal_discount); ?>">
                                                                        <span class="add-on">%</span>
                                                                      </div>
                                                                    </div>
                                                                  </div>
                                                                  <div class="control-group">
                                                                    <label class="control-label" style="width:80px;">会员提成:</label>
                                                                    <div class="controls" style="margin-left:80px;">
                                                                      <div class="input-prepend input-append">
                                                                        <span class="add-on">
                                                                          <label class="radio"><input type='radio' name='member_commision_type<?php echo ($loop_count_position); ?>' value='0' <?php echo ($member_commision_type == ""? "checked":$member_commision_type== "0"? "checked": ""); ?>/>金额</label>
                                                                        </span>
                                                                        <input class="span7" type="text" name="member_amount[]" onfocus="radio_update(this)" value="<?php echo ($member_amount); ?>">
                                                                        <span class="add-on">￥</span>
                                                                      </div>
                                                                      <div class="input-prepend input-append">
                                                                        <span class="add-on">
                                                                          <label class="radio"><input type='radio' name='member_commision_type<?php echo ($loop_count_position); ?>' value='1' <?php echo ($member_commision_type== "1"? "checked": ""); ?>/>比例</label>
                                                                        </span>
                                                                        <input class="span7" type="text" name="member_discount[]" onfocus="radio_update(this)" value="<?php echo ($member_discount); ?>">
                                                                        <span class="add-on">%</span>
                                                                      </div>
                                                                    </div>
                                                                  </div>
                                                                </div>
                                                              </div>
                                                            </div>
                                                          </div>
                                                          <?php $loop_count_position = $loop_count_position + 1; endif; endforeach; endif; else: echo "" ;endif; ?>
                                                      <div class="row-fluid">
                                                        <div class="span12">
                                                          <center>
                                                            <button class="btn btn-large btn-success" type="button" onClick="form_service_commision_submit(this);">提交</button>
                                                          </center>
                                                        </div>
                                                      </div>
                                                    </form>
                                                  </div>
                                                </div>
                                              </td>
                                            </tr>
                                            <?php $loop_count_type = $loop_count_type + 1; endforeach; endif; else: echo "" ;endif; ?>
                                        </tbody>
                                      </table>
                                    </div>
                                  </div>
                              </div>
                            <?php else: ?>
                              <div class="tab-pane" id="tab_1_<?php echo ($loop_count); ?>">
                                  <div class="row-fluid">
                                    <div class="span12">
                                      <table class="table table-striped table-bordered">
                                        <thead>
                                          <tr>
                                            <th style="width:5%;">编号</th>
                                            <th style="width:25%;">名称</th>
                                            <th style="width:15%;">类型</th>
                                            <th style="width:40%;">服务项目提成标准</th>
                                            <th style="width:15%;">操作</th>
                                          </tr>
                                        </thead>
                                        <tbody>
                                          <?php $loop_count_type = '0'; ?>
                                          <?php $employee_position_big_id = $member_position_big_list["employee_position_big_id"]; ?>
                                          <?php if(is_array($serviceList)): $i = 0; $__LIST__ = $serviceList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$service): $mod = ($i % 2 );++$i;?><tr class="odd gradeX">
                                              <td><?php echo ($service["service_id"]); ?></td>
                                              <td><?php echo ($service["service_name"]); ?></td>
                                              <td><?php echo ($service["category_name"]); ?></td>
                                              <td>
                                                <?php $service_id = $service["service_id"]; ?>
                                                <?php if(is_array($serviceCommissionList)): $i = 0; $__LIST__ = $serviceCommissionList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$service_commission_list): $mod = ($i % 2 );++$i; $commission_service_id = $service_commission_list["service_id"]; ?>
                                                  <?php $commission_employee_position_big_id = $service_commission_list["employee_position_big_id"]; ?>
                                                  <?php if($service_id == $commission_service_id and $commission_employee_position_big_id == $employee_position_big_id): $personal_commision_type = $service_commission_list["personal_commision_type"]; ?>
                                                    <?php $personal_amount = $service_commission_list["personal_amount"]; ?>
                                                    <?php $personal_discount = $service_commission_list["personal_discount"]; ?>
                                                    <?php $member_commision_type = $service_commission_list["personal_commision_type"]; ?>
                                                    <?php $member_amount = $service_commission_list["personal_amount"]; ?>
                                                    <?php $member_discount = $service_commission_list["personal_discount"]; ?>
                                                    <?php echo ($service_commission_list["employee_position_name"]); ?>
                                                                                                                        散客提成<?php if(($personal_commision_type) == "0"): echo ($personal_amount); ?>￥<?php else: echo ($personal_discount); ?>%<?php endif; ?>
                                                      
                                                                                                                        会员提成<?php if(($member_commision_type) == "0"): echo ($member_amount); ?>￥<?php else: echo ($member_discount); ?>%<?php endif; ?>
                                                   <br><?php endif; endforeach; endif; else: echo "" ;endif; ?>
                                              </td>
                                              <td>
                                                <a class="btn btn-primary fancybox" href="#service_commision<?php echo ($loop_count); echo ($loop_count_type); ?>">修改提成</a>
                                                <a class="btn btn-danger">清空</a>
                                                <div class="row-fluid" id="service_commision<?php echo ($loop_count); echo ($loop_count_type); ?>" style="display:none;">
                                                  <div class="span12">
                                                    <form action="<?php echo (C("ACTION_BASE_DIR")); ?>/service/serviceCommisionProcess/" class="form-horizontal" method="post">
                                                      <div class="control-group">
                                                        <label class="control-label" style="width:80px;">已选项目:</label>
                                                        <div class="controls" style="margin-left:80px;">
                                                          <input type="text" class="span12" name="service_name" readonly value="<?php echo ($service["service_name"]); ?>"/>
                                                          <input type="hidden" class="span12" name="service_id" readonly value="<?php echo ($service["service_id"]); ?>"/>
                                                          <input type="hidden" class="span12" name="employee_position_big_id" readonly value="<?php echo ($employee_position_big_id); ?>"/>
                                                        </div>
                                                      </div>
                                                      <?php $loop_count_position = '0'; ?>
                                                      <?php if(is_array($employeePositionList)): $i = 0; $__LIST__ = $employeePositionList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$employee_position_list): $mod = ($i % 2 );++$i; $sub_employee_position_big_id = $employee_position_list["employee_position_big_id"]; ?>
                                                        <?php if($employee_position_big_id == $sub_employee_position_big_id): $personal_commision_type = ''; ?>
                                                          <?php $personal_amount = ''; ?>
                                                          <?php $personal_discount = ''; ?>
                                                          <?php $member_commision_type = ''; ?>
                                                          <?php $member_amount = ''; ?>
                                                          <?php $member_discount = ''; ?>
                                                          <?php if(is_array($serviceCommissionList)): foreach($serviceCommissionList as $key=>$service_commission_list): if($service_commission_list["service_id"] == $service_id and $service_commission_list["employee_position_id"] == $employee_position_list["employee_position_id"] and $service_commission_list["employee_position_big_id"] == $sub_employee_position_big_id): $personal_commision_type = $service_commission_list["personal_commision_type"]; ?>
                                                              <?php $personal_amount = $service_commission_list["personal_amount"]; ?>
                                                              <?php $personal_discount = $service_commission_list["personal_discount"]; ?>
                                                              <?php $member_commision_type = $service_commission_list["personal_commision_type"]; ?>
                                                              <?php $member_amount = $service_commission_list["personal_amount"]; ?>
                                                              <?php $member_discount = $service_commission_list["personal_discount"]; endif; endforeach; endif; ?>
                                                          <div class="row-fluid">
                                                            <div class="span12">
                                                              <div class="widget">
                                                                <div class="widget-title">
                                                                  <h4><i class="icon-reorder"></i><?php echo ($employee_position_list["employee_position_name"]); ?></h4>
                                                                  <span class="tools">
                                                                    <a class="icon-chevron-down" href="javascript:;"></a>
                                                                  </span>
                                                                </div>
                                                                <div class="widget-body">
                                                                  <input type="hidden" class="span12" name="employee_position_id[]" readonly value="<?php echo ($employee_position_list["employee_position_id"]); ?>"/>
                                                                  <div class="control-group">
                                                                    <label class="control-label" style="width:80px;">散客提成:</label>
                                                                    <div class="controls" style="margin-left:80px;">
                                                                      <div class="input-prepend input-append">
                                                                        <span class="add-on">
                                                                          <label class="radio"><input type='radio' name='personal_commision_type<?php echo ($loop_count_position); ?>' value='0' <?php echo ($personal_commision_type == ""? "checked":$personal_commision_type== "0"? "checked": ""); ?>/>金额</label>
                                                                        </span>
                                                                        <input class="span7" type="text" name="personal_amount[]" onfocus="radio_update(this)" value="<?php echo ($personal_amount); ?>">
                                                                        <span class="add-on">￥</span>
                                                                      </div>
                                                                      <div class="input-prepend input-append">
                                                                        <span class="add-on">
                                                                          <label class="radio"><input type='radio' name='personal_commision_type<?php echo ($loop_count_position); ?>' value='1' <?php echo ($personal_commision_type== "1"? "checked": ""); ?>/>比例</label>
                                                                        </span>
                                                                        <input class="span7" type="text" name="personal_discount[]" onfocus="radio_update(this)" value="<?php echo ($personal_discount); ?>">
                                                                        <span class="add-on">%</span>
                                                                      </div>
                                                                    </div>
                                                                  </div>
                                                                  <div class="control-group">
                                                                    <label class="control-label" style="width:80px;">会员提成:</label>
                                                                    <div class="controls" style="margin-left:80px;">
                                                                      <div class="input-prepend input-append">
                                                                        <span class="add-on">
                                                                          <label class="radio"><input type='radio' name='member_commision_type<?php echo ($loop_count_position); ?>' value='0' <?php echo ($member_commision_type == ""? "checked":$member_commision_type== "0"? "checked": ""); ?>/>金额</label>
                                                                        </span>
                                                                        <input class="span7" type="text" name="member_amount[]" onfocus="radio_update(this)" value="<?php echo ($member_amount); ?>">
                                                                        <span class="add-on">￥</span>
                                                                      </div>
                                                                      <div class="input-prepend input-append">
                                                                        <span class="add-on">
                                                                          <label class="radio"><input type='radio' name='member_commision_type<?php echo ($loop_count_position); ?>' value='1' <?php echo ($member_commision_type== "1"? "checked": ""); ?>/>比例</label>
                                                                        </span>
                                                                        <input class="span7" type="text" name="member_discount[]" onfocus="radio_update(this)" value="<?php echo ($member_discount); ?>">
                                                                        <span class="add-on">%</span>
                                                                      </div>
                                                                    </div>
                                                                  </div>
                                                                </div>
                                                              </div>
                                                            </div>
                                                          </div>
                                                          <?php $loop_count_position = $loop_count_position + 1; endif; endforeach; endif; else: echo "" ;endif; ?>
                                                      <div class="row-fluid">
                                                        <div class="span12">
                                                          <center>
                                                            <button class="btn btn-large btn-success" type="button" onClick="form_service_commision_submit(this);">提交</button>
                                                          </center>
                                                        </div>
                                                      </div>
                                                    </form>
                                                  </div>
                                                </div>
                                              </td>
                                            </tr>
                                            <?php $loop_count_type = $loop_count_type + 1; endforeach; endif; else: echo "" ;endif; ?>
                                        </tbody>
                                      </table>
                                    </div>
                                  </div>
                              </div><?php endif; ?>
                            <?php $loop_count = $loop_count + 1; endforeach; endif; else: echo "" ;endif; ?>
                        </div>
                      </div>
                      <!--END TABS-->
                    </div>
                  </div>
                </div>
              </div>
              <!-- END EXAMPLE TABLE widget-->
            </div>
          </div>

          <!-- END ADVANCED TABLE widget-->
        </div>
        <!-- END PAGE CONTAINER-->
      </div>
      <!-- END PAGE -->
    </div>
    <!-- END CONTAINER -->

    <!-- BEGIN FOOTER -->
    <div id="footer">
</div>
<div class="body_overlay">
  <table>
    <tr>
      <td>
        <img src="<?php echo (C("WEB_RES_ROOT")); ?>/img/loading_yellow.gif">
      </td>
    </tr>
  </table>
</div>
    <!-- END FOOTER -->

    <!-- BEGIN JAVASCRIPTS -->
    <!-- Load javascripts at bottom, this will reduce page load time -->
    <script src="<?php echo (C("WEB_RES_ROOT")); ?>/js/jquery-1.8.3.min.js"></script>
    <script src="<?php echo (C("WEB_RES_ROOT")); ?>/js/jquery.nicescroll.js" type="text/javascript"></script>
    <script src="<?php echo (C("WEB_RES_ROOT")); ?>/assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="<?php echo (C("WEB_RES_ROOT")); ?>/js/jquery.blockui.js"></script>
    <script type="text/javascript" src="<?php echo (C("WEB_RES_ROOT")); ?>/assets/jquery-slimscroll/jquery.slimscroll.min.js"></script>
    <!-- ie8 fixes -->
    <!--[if lt IE 9]>
    <script src="<?php echo (C("WEB_RES_ROOT")); ?>/js/excanvas.js"></script>
    <script src="<?php echo (C("WEB_RES_ROOT")); ?>/js/respond.js"></script>
    <![endif]-->
    <script type="text/javascript" src="<?php echo (C("WEB_RES_ROOT")); ?>/assets/bootstrap-toggle-buttons/static/js/jquery.toggle.buttons.js"></script>
    <script type="text/javascript" src="<?php echo (C("WEB_RES_ROOT")); ?>/assets/chosen-bootstrap/chosen/chosen.jquery.min.js"></script>
    <script type="text/javascript" src="<?php echo (C("WEB_RES_ROOT")); ?>/assets/uniform/jquery.uniform.min.js"></script>
    <script type="text/javascript" src="<?php echo (C("WEB_RES_ROOT")); ?>/assets/data-tables/jquery.dataTables.js"></script>
    <script type="text/javascript" src="<?php echo (C("WEB_RES_ROOT")); ?>/assets/data-tables/DT_bootstrap.js"></script>
    <script type="text/javascript" src="<?php echo (C("WEB_RES_ROOT")); ?>/assets/bootstrap-wysihtml5/wysihtml5-0.3.0.js"></script>
    <script type="text/javascript" src="<?php echo (C("WEB_RES_ROOT")); ?>/assets/bootstrap-wysihtml5/bootstrap-wysihtml5.js"></script>
    <script type="text/javascript" src="<?php echo (C("WEB_RES_ROOT")); ?>/assets/clockface/js/clockface.js"></script>
    <script type="text/javascript" src="<?php echo (C("WEB_RES_ROOT")); ?>/assets/jquery-tags-input/jquery.tagsinput.min.js"></script>
    <script type="text/javascript" src="<?php echo (C("WEB_RES_ROOT")); ?>/assets/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
    <script type="text/javascript" src="<?php echo (C("WEB_RES_ROOT")); ?>/assets/bootstrap-daterangepicker/date.js"></script>
    <script type="text/javascript" src="<?php echo (C("WEB_RES_ROOT")); ?>/assets/bootstrap-daterangepicker/daterangepicker.js"></script>
    <script type="text/javascript" src="<?php echo (C("WEB_RES_ROOT")); ?>/assets/bootstrap-colorpicker/js/bootstrap-colorpicker.js"></script>
    <script type="text/javascript" src="<?php echo (C("WEB_RES_ROOT")); ?>/assets/bootstrap-timepicker/js/bootstrap-timepicker.js"></script>
    <script type="text/javascript" src="<?php echo (C("WEB_RES_ROOT")); ?>/assets/bootstrap-inputmask/bootstrap-inputmask.min.js"></script>
    <script src="<?php echo (C("WEB_RES_ROOT")); ?>/assets/fancybox/source/jquery.fancybox.pack.js"></script>
    <script src="<?php echo (C("WEB_RES_ROOT")); ?>/js/jquery.scrollTo.min.js"></script>
    <!--common script for all pages-->
    <script src="<?php echo (C("WEB_RES_ROOT")); ?>/js/common-scripts.js"></script>
    <!--script for this page-->
    <script src="<?php echo (C("WEB_RES_ROOT")); ?>/js/form-component.js"></script>

    <!--script for this page only-->
    <script type="text/javascript" charset="utf-8">
      var action_base_dir =   "<?php echo (C("ACTION_BASE_DIR")); ?>";
    </script>
    <script src="<?php echo (C("WEB_RES_ROOT")); ?>/js/jquery.validate.min.js"></script>
    <script src="<?php echo (C("WEB_RES_ROOT")); ?>/js/jquery.form.min.js"></script>
    <script src="<?php echo (C("WEB_RES_ROOT")); ?>/js/layer/layer.js"></script>
    <script src="<?php echo (C("WEB_RES_ROOT")); ?>/js/customer/common.js"></script>
    <script src="<?php echo (C("WEB_RES_ROOT")); ?>/js/customer/service.js"></script>
    <!-- END JAVASCRIPTS -->
  </body>
  <!-- END BODY -->
</html>