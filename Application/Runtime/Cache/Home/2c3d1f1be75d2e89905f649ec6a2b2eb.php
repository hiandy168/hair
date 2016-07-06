<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
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
<link
	href="<?php echo (C("WEB_RES_ROOT")); ?>/assets/bootstrap/css/bootstrap.min.css"
	rel="stylesheet" />
<link
	href="<?php echo (C("WEB_RES_ROOT")); ?>/assets/bootstrap/css/bootstrap-responsive.min.css"
	rel="stylesheet" />
<link
	href="<?php echo (C("WEB_RES_ROOT")); ?>/assets/bootstrap/css/bootstrap-fileupload.css"
	rel="stylesheet" />
<link
	href="<?php echo (C("WEB_RES_ROOT")); ?>/assets/font-awesome/css/font-awesome.css"
	rel="stylesheet" />
<link href="<?php echo (C("WEB_RES_ROOT")); ?>/css/style.css" rel="stylesheet" />
<link href="<?php echo (C("WEB_RES_ROOT")); ?>/css/style-responsive.css"
	rel="stylesheet" />
<link href="<?php echo (C("WEB_RES_ROOT")); ?>/css/style-default.css"
	rel="stylesheet" id="style_color" />
<link
	href="<?php echo (C("WEB_RES_ROOT")); ?>/assets/fancybox/source/jquery.fancybox.css"
	rel="stylesheet" />
<link rel="stylesheet" type="text/css"
	href="<?php echo (C("WEB_RES_ROOT")); ?>/assets/uniform/css/uniform.default.css" />
<link rel="stylesheet" type="text/css"
	href="<?php echo (C("WEB_RES_ROOT")); ?>/assets/chosen-bootstrap/chosen/chosen.css" />
<link rel="stylesheet" type="text/css"
	href="<?php echo (C("WEB_RES_ROOT")); ?>/assets/jquery-tags-input/jquery.tagsinput.css" />
<link rel="stylesheet" type="text/css"
	href="<?php echo (C("WEB_RES_ROOT")); ?>/assets/clockface/css/clockface.css" />
<link rel="stylesheet" type="text/css"
	href="<?php echo (C("WEB_RES_ROOT")); ?>/assets/bootstrap-wysihtml5/bootstrap-wysihtml5.css" />
<link rel="stylesheet" type="text/css"
	href="<?php echo (C("WEB_RES_ROOT")); ?>/assets/bootstrap-datepicker/css/datepicker.css" />
<link rel="stylesheet" type="text/css"
	href="<?php echo (C("WEB_RES_ROOT")); ?>/assets/bootstrap-timepicker/compiled/timepicker.css" />
<link rel="stylesheet" type="text/css"
	href="<?php echo (C("WEB_RES_ROOT")); ?>/assets/bootstrap-colorpicker/css/colorpicker.css" />
<link rel="stylesheet"
	href="<?php echo (C("WEB_RES_ROOT")); ?>/assets/bootstrap-toggle-buttons/static/stylesheets/bootstrap-toggle-buttons.css" />
<link rel="stylesheet" type="text/css"
	href="<?php echo (C("WEB_RES_ROOT")); ?>/assets/bootstrap-daterangepicker/daterangepicker.css" />
<link rel="stylesheet"
	href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css" />
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
					<ul class="sub" <?php echo stripos($base_url , 'memberList') !== false ? 'style="display: block;"' : ''; ?> >
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
			<?php if(stripos($action_list,'OpenShopSetting') !== false): ?><li class="sub-menu <?php echo (stripos($base_url,'employeeList') !== false or stripos($base_url,'toEmployeePositionList') !== false or stripos($base_url,'toEmployeeAdd') !== false or stripos($base_url,'toEmployeeUpdate') !== false or stripos($base_url , 'memberCardTypeList') !== false or stripos($base_url , 'toMemberCardTypeAdd') !== false or stripos($base_url , 'serviceList') !== false or stripos($base_url , 'courseList') !== false or stripos($base_url , 'shopList') !== false) ? 'open active' : '' ?>">
					<a href="javascript:;" class="">
						<i class="icon-wrench"></i> <span>开店设置</span> <span class="arrow"></span>
					</a>
					<ul class="sub" <?php echo (stripos($base_url,'employeeList') !== false or stripos($base_url,'toEmployeePositionList') !== false or stripos($base_url,'toEmployeeAdd') !== false or stripos($base_url,'toEmployeeUpdate') !== false or stripos($base_url , 'memberCardTypeList') !== false or stripos($base_url , 'toMemberCardTypeAdd') !== false or stripos($base_url , 'serviceList') !== false or stripos($base_url , 'courseList') !== false or stripos($base_url , 'shopList') !== false) ? 'style="display: block;"' : '' ?>>
						<?php if(stripos($action_list,'EmployeeAdd') !== false): ?><li class="<?php echo (stripos($base_url ,'employeeList') !== false or stripos($base_url,'toEmployeePositionList') !== false or stripos($base_url,'toEmployeeAdd') !== false or stripos($base_url,'toEmployeeUpdate') !== false ) ? active: ''; ?>" ><a class="" href="<?php echo (C("ACTION_BASE_DIR")); ?>/employee/employeeList">添加员工</a></li><?php endif; ?>
						<?php if(stripos($action_list,'MemberCardTypeAdd') !== false): ?><li class="<?php echo (stripos($base_url ,'memberCardTypeList') !== false or stripos($base_url , 'toMemberCardTypeAdd') !== false) ? active: ''; ?>" ><a class="" href="<?php echo (C("ACTION_BASE_DIR")); ?>/member/memberCardTypeList">添加会员卡类型</a></li><?php endif; ?>
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
							<i class="icon-cogs"></i> <span class="settings"> <span
								class="text">Theme Color:</span> <span class="colors"> <span
									class="color-default" data-style="default"></span> <span
									class="color-green" data-style="green"></span> <span
									class="color-gray" data-style="gray"></span> <span
									class="color-purple" data-style="purple"></span> <span
									class="color-red" data-style="red"></span>
							</span>
							</span>
						</div>
						<!-- END THEME CUSTOMIZER-->
						<!-- BEGIN PAGE TITLE & BREADCRUMB-->
						<h3 class="page-title">收银</h3>
						<!-- END PAGE TITLE & BREADCRUMB-->
					</div>
				</div>
				<!-- END PAGE HEADER-->
				<!-- BEGIN PAGE CONTENT-->
				<div class="row-fluid">
					<div class="span12">
						<!-- BEGIN INLINE TABS PORTLET-->
						<div class="widget">
							<div class="widget-title">
								<h4>
									<i class="icon-reorder"></i>会员基本信息
								</h4>
								<span class="tools"> <a class="icon-chevron-down"
									href="javascript:;"></a>
								</span>
							</div>
							<div class="widget-body">
								<table
									class="table table-striped table-bordered table-advance table-hover"
									id="order_member_content">
									<thead>
										<tr>
											<th style="width: 100px">会员卡号</th>
											<th style="width: 100px">姓名</th>
											<th style="width: 80px">折扣</th>
											<th style="width: 80px">余额</th>
											<th style="width: 80px">赠送金</th>
											<th style="width: 80px">欠款</th>
											<th style="width: 80px">操作</th>
										</tr>
									</thead>
									<tbody>
										<tr>
											<td><input class='span12' type='text'
												name='member_card_no' readonly value=''> <input
												class='span12' type='hidden' name='member_card_id' readonly
												value=''></td>
											<td><input class='span12 ' type='text'
												name='member_name' readonly value=''></td>
											<td><input class='span12 ' type='text'
												name='member_card_discount' readonly value=''></td>
											<td><input class='span12 ' type='text'
												name='blance_money' readonly value=''></td>
											<td><input class='span12 ' type='text' name='gift_money'
												readonly value=''></td>
											<td><input class='span12 ' type='text'
												name='arrears_money' readonly value=''></td>
											<td><a class="btn btn-danger"
												onClick="order_member_content_clear(this)"><i
													class="icon-trash "></i></a></td>
										</tr>
										<tr>
											<td colspan="7"><a id="member_search"
												class="btn btn-inverse span12 fancybox"
												href="#member_content"><i class="icon-plus"></i></a></td>
										</tr>
									</tbody>
								</table>
							</div>
						</div>
						<!-- END INLINE TABS PORTLET-->
					</div>
				</div>
				<div class="row-fluid">
					<div class="span12">
						<!-- BEGIN INLINE TABS PORTLET-->
						<div class="widget">
							<div class="widget-body">
								<div class="row-fluid">
									<div class="span12">
										<!--BEGIN TABS-->
										<div class="tabbable custom-tab">
											<ul class="nav nav-tabs">
												<li class="active"><a href="#tab_1_1" data-toggle="tab">項目消費</a>
												</li>
												<li><a id="member_charge" href="#tab_1_2"
													data-toggle="tab" style="display: none;">会员充值</a></li>
												<li><a id="order_course" href="#tab_1_3"
													data-toggle="tab" style="display: none;">订购套餐</a></li>
											</ul>
											<div class="tab-content">
												<div class="tab-pane active" id="tab_1_1">
													<form
														action="<?php echo (C("ACTION_BASE_DIR")); ?>/order/orderServiceAdd/"
														class="form-horizontal" id="order_service_form"
														enctype="multipart/form-data" method="post">
														<div class="control-group">
															<label class="control-label" style="width: 80px;">项目内容:</label>
															<div class="controls" style="margin-left: 80px;">
																<table
																	class="table table-striped table-bordered table-advance table-hover"
																	id="order_service_content">
																	<thead>
																		<tr>
																			<th colspan="4">服务项目</th>
																			<th colspan="3">设计师</th>
																			<th colspan="3">中工</th>
																			<th colspan="3">助理</th>
																			<th rowspan="2">操作</th>
																		</tr>
																		<tr>
																			<th style="width: 200px">项目名称</th>
																			<th style="width: 80px">原价</th>
																			<th style="width: 80px">售价</th>
																			<th style="width: 80px">业绩</th>
																			<th style="width: 100px">员工姓名</th>
																			<th style="width: 80px">类型</th>
																			<th style="width: 80px">业绩</th>
																			<th style="width: 100px">员工姓名</th>
																			<th style="width: 80px">类型</th>
																			<th style="width: 80px">业绩</th>
																			<th style="width: 100px">员工姓名</th>
																			<th style="width: 80px">类型</th>
																			<th style="width: 80px">业绩</th>
																		</tr>
																	</thead>
																	<tbody>	
																		<tr>
																			<td colspan="15"><a id="service_search"
																				class="btn btn-inverse span12"
																				href="#service_content"
																				onClick="service_content_add(this)"><i
																					class="icon-plus"></i></a></td>
																		</tr>
																	</tbody>
																</table>
															</div>
														</div>
														<div class="control-group">
															<label class="control-label" style="width: 80px;">消费金额:</label>
															<div class="controls" style="margin-left: 80px;">
																<input type="text" placeholder="消费金额" class="span5"
																	name="pay_amoung" />
															</div>
														</div>
														<div class="control-group">
															<label class="control-label" style="width: 80px;">付款明细:</label>
															<div class="controls" style="margin-left: 80px;">
																<div class="input-prepend input-append span2"
																	style="width: 100px">
																	<span class="add-on"> <label class="radio">会员卡</label>
																	</span> <input class="span7" type="text" name="card_pay">
																	<span class="add-on">￥</span>
																</div>
																<div class="input-prepend input-append span2"
																	style="width: 100px">
																	<span class="add-on"> <label class="radio">现金</label>
																	</span> <input class="span7" type="text" name="cash_pay">
																	<span class="add-on">￥</span>
																</div>
																<div class="input-prepend input-append span2"
																	style="width: 100px">
																	<span class="add-on"> <label class="radio">银联</label>
																	</span> <input class="span7" type="text" name="union_pay">
																	<span class="add-on">￥</span>
																</div>
																<div class="input-prepend input-append span2"
																	style="width: 100px">
																	<span class="add-on"> <label class="radio">代金券</label>
																	</span> <input class="span7" type="text" name="vouchers_pay">
																	<span class="add-on">￥</span>
																</div>
																<div class="input-prepend input-append span2"
																	style="width: 100px">
																	<span class="add-on"> <label class="radio">赠送金</label>
																	</span> <input class="span7" type="text" name="gift_pay">
																	<span class="add-on">￥</span>
																</div>
																<div class="input-prepend input-append span2"
																	style="width: 100px">
																	<span class="add-on"> <label class="radio">免单</label>
																	</span> <input class="span7" type="text" name="free_pay">
																	<span class="add-on">￥</span>
																</div>
																<div class="input-prepend input-append span2"
																	style="width: 100px">
																	<span class="add-on"> <label class="radio">欠款</label>
																	</span> <input class="span7" type="text" name="arrears_pay">
																	<span class="add-on">￥</span>
																</div>
															</div>
														</div>
														<div class="control-group">
															<label class="control-label" style="width: 80px;">实际业绩:</label>
															<div class="controls" style="margin-left: 80px;">
																<input type="text" placeholder="实际业绩" class="span5"
																	name="real_result" />
															</div>
														</div>
														<div class="control-group">
															<label class="control-label" style="width: 80px;">代金券:</label>
															<div class="controls" style="margin-left: 80px;">
																<input type="text" placeholder="代金券" class="span5"
																	name="vochers_id" />
															</div>
														</div>
														<div class="control-group">
															<label class="control-label" style="width: 80px;">客户姓名:</label>
															<div class="controls" style="margin-left: 80px;">
																<input type="text" placeholder="客户姓名" class="span5"
																	name="guest_name" />
															</div>
														</div>
														<div class="control-group">
															<label class="control-label" style="width: 80px;">手机号码:</label>
															<div class="controls" style="margin-left: 80px;">
																<input type="text" placeholder="手机号码" class="span5"
																	name="guest_tel" />
															</div>
														</div>
														<div class="control-group">
															<label class="control-label" style="width: 80px;">客户性别:</label>
															<div class="controls" style="margin-left: 80px;">
																<label class="radio"> <input type="radio"
																	name="guest_sex" value="0" />男
																</label> <label class="radio"> <input type="radio"
																	name="guest_sex" value="1" />女
																</label>
															</div>
														</div>
														<div class="control-group">
															<label class="control-label" style="width: 80px;">备注:</label>
															<div class="controls" style="margin-left: 80px;">
																<textarea class="span5 " rows="3" name="order_comment"></textarea>
															</div>
														</div>
														<div class="form-actions">
															<a class="btn btn-success"
																onClick="check_out_submit(this,'service')">结账</a> <a
																class="btn btn-success"
																onClick="union_order_submit(this,'service')">联单</a> <a
																class="btn btn-success"
																onClick="pending_order_submit(this,'service')">挂单</a>
														</div>
													</form>
												</div>
												<div class="tab-pane" id="tab_1_2">
													<form
														action="<?php echo (C("ACTION_BASE_DIR")); ?>/order/ordeChargeAdd/"
														class="form-horizontal" id="order_charge_form"
														enctype="multipart/form-data" method="post">
														<div class="control-group">
															<label class="control-label" style="width: 80px;">充值内容:</label>
															<div class="controls" style="margin-left: 80px;">
																<table
																	class="table table-striped table-bordered table-advance table-hover"
																	id="order_charge_content">
																	<thead>
																		<tr>
																			<th style="width: 100px">项目编号</th>
																			<th style="width: 100px">卡类型</th>
																			<th style="width: 80px">折扣</th>
																			<th style="width: 80px">充值额度</th>
																			<th style="width: 80px">赠送金</th>
																			<th style="width: 80px">操作</th>
																		</tr>
																	</thead>
																	<tbody>
																		<tr>
																			<td><input class='span12' type='text'
																				name='member_card_type_id' readonly value=''>
																			</td>
																			<td><input class='span12 ' type='text'
																				name='member_card_type_name' readonly value=''>
																			</td>
																			<td><input class='span12 ' type='text'
																				name='member_card_discount' value=''></td>
																			<td><input class='span12 ' type='text'
																				name='charge_money' value=''></td>
																			<td><input class='span12 ' type='text'
																				name='gift_money' value=''></td>
																			<td><a class="btn btn-danger"
																				onClick="order_member_content_clear(this)"><i
																					class="icon-trash "></i></a></td>
																		</tr>
																		<tr>
																			<td colspan="7"><a id="member_card_type_search"
																				class="btn btn-inverse span12 fancybox"
																				href="#member_card_type_content"><i
																					class="icon-plus"></i></a></td>
																		</tr>
																	</tbody>
																</table>
															</div>
														</div>
														<div class="control-group">
															<label class="control-label" style="width: 80px;">员工信息:</label>
															<div class="controls" style="margin-left: 80px;">
																<table
																	class="table table-striped table-bordered table-advance table-hover"
																	id="order_charge_employee_content">
																	<thead>
																		<tr>
																			<th style="width: 100px">员工编号</th>
																			<th style="width: 100px">员工姓名</th>
																			<th style="width: 80px">业绩</th>
																			<th style="width: 80px">提成</th>
																			<th style="width: 80px">操作</th>
																		</tr>
																	</thead>
																	<tbody>
																		<tr>
																			<td colspan="7"><a id="course_employee_search"
																				class="btn btn-inverse span12 fancybox"
																				href="#charge_employee_content"><i
																					class="icon-plus"></i></a></td>
																		</tr>
																	</tbody>
																</table>
															</div>
														</div>
														<div class="control-group">
															<label class="control-label" style="width: 80px;">消费金额:</label>
															<div class="controls" style="margin-left: 80px;">
																<input type="text" placeholder="消费金额" class="span5"
																	name="pay_amoung" />
															</div>
														</div>
														<div class="control-group">
															<label class="control-label" style="width: 80px;">付款明细:</label>
															<div class="controls" style="margin-left: 80px;">
																<div class="input-prepend input-append span2"
																	style="width: 100px">
																	<span class="add-on"> <label class="radio">会员卡</label>
																	</span> <input class="span7" type="text" name="card_pay">
																	<span class="add-on">￥</span>
																</div>
																<div class="input-prepend input-append span2"
																	style="width: 100px">
																	<span class="add-on"> <label class="radio">现金</label>
																	</span> <input class="span7" type="text" name="cash_pay">
																	<span class="add-on">￥</span>
																</div>
																<div class="input-prepend input-append span2"
																	style="width: 100px">
																	<span class="add-on"> <label class="radio">银联</label>
																	</span> <input class="span7" type="text" name="union_pay">
																	<span class="add-on">￥</span>
																</div>
																<div class="input-prepend input-append span2"
																	style="width: 100px">
																	<span class="add-on"> <label class="radio">代金券</label>
																	</span> <input class="span7" type="text" name="vouchers_pay">
																	<span class="add-on">￥</span>
																</div>
																<div class="input-prepend input-append span2"
																	style="width: 100px">
																	<span class="add-on"> <label class="radio">赠送金</label>
																	</span> <input class="span7" type="text" name="gift_pay">
																	<span class="add-on">￥</span>
																</div>
																<div class="input-prepend input-append span2"
																	style="width: 100px">
																	<span class="add-on"> <label class="radio">免单</label>
																	</span> <input class="span7" type="text" name="free_pay">
																	<span class="add-on">￥</span>
																</div>
																<div class="input-prepend input-append span2"
																	style="width: 100px">
																	<span class="add-on"> <label class="radio">欠款</label>
																	</span> <input class="span7" type="text" name="arrears_pay">
																	<span class="add-on">￥</span>
																</div>
															</div>
														</div>
														<div class="control-group">
															<label class="control-label" style="width: 80px;">实际业绩:</label>
															<div class="controls" style="margin-left: 80px;">
																<input type="text" placeholder="实际业绩" class="span5"
																	name="real_result" />
															</div>
														</div>
														<div class="control-group">
															<label class="control-label" style="width: 80px;">代金券:</label>
															<div class="controls" style="margin-left: 80px;">
																<input type="text" placeholder="代金券" class="span5"
																	name="real_result" />
															</div>
														</div>
														<div class="control-group">
															<label class="control-label" style="width: 80px;">客户姓名:</label>
															<div class="controls" style="margin-left: 80px;">
																<input type="text" placeholder="客户姓名" class="span5"
																	name="guest_name" />
															</div>
														</div>
														<div class="control-group">
															<label class="control-label" style="width: 80px;">手机号码:</label>
															<div class="controls" style="margin-left: 80px;">
																<input type="text" placeholder="手机号码" class="span5"
																	name="guest_tel" />
															</div>
														</div>
														<div class="control-group">
															<label class="control-label" style="width: 80px;">客户性别:</label>
															<div class="controls" style="margin-left: 80px;">
																<label class="radio"> <input type="radio"
																	name="guest_sex" value="0" />男
																</label> <label class="radio"> <input type="radio"
																	name="guest_sex" value="1" />女
																</label>
															</div>
														</div>
														<div class="control-group">
															<label class="control-label" style="width: 80px;">备注:</label>
															<div class="controls" style="margin-left: 80px;">
																<textarea class="span5 " rows="3" name="order_comment"></textarea>
															</div>
														</div>
														<div class="form-actions">
															<a class="btn btn-success"
																onClick="check_out_submit(this,'charge')">结账</a> <a
																class="btn btn-success"
																onClick="union_order_submit(this,'charge')">联单</a> <a
																class="btn btn-success"
																onClick="pending_order_submit(this,'charge')">挂单</a>
														</div>
													</form>
												</div>
												<div class="tab-pane" id="tab_1_3">
													<form
														action="<?php echo (C("ACTION_BASE_DIR")); ?>/order/ordeCourseAdd/"
														class="form-horizontal" id="order_course_form"
														enctype="multipart/form-data" method="post">
														<div class="control-group">
															<label class="control-label" style="width: 80px;">套餐内容:</label>
															<div class="controls" style="margin-left: 80px;">
																<table
																	class="table table-striped table-bordered table-advance table-hover"
																	id="order_course_content">
																	<thead>
																		<tr>
																			<th style="width: 100px">套餐名称</th>
																			<th style="width: 80px">原价</th>
																			<th style="width: 80px">售价</th>
																			<th style="width: 80px">业绩</th>
																			<th style="width: 80px">工号</th>
																			<th style="width: 80px">业绩</th>
																			<th style="width: 80px">提成</th>
																			<th style="width: 80px">操作</th>
																		</tr>
																	</thead>
																	<tbody>
																		<tr>
																			<td colspan="8"><a id="course_search"
																				class="btn btn-inverse span12"
																				href="#service_content"
																				onClick="course_content_add(this)"><i
																					class="icon-plus"></i></a></td>
																		</tr>
																	</tbody>
																</table>
															</div>
														</div>
														<div class="control-group">
															<label class="control-label" style="width: 80px;">消费金额:</label>
															<div class="controls" style="margin-left: 80px;">
																<input type="text" placeholder="消费金额" class="span5"
																	name="pay_amoung" />
															</div>
														</div>
														<div class="control-group">
															<label class="control-label" style="width: 80px;">付款明细:</label>
															<div class="controls" style="margin-left: 80px;">
																<div class="input-prepend input-append span2"
																	style="width: 100px">
																	<span class="add-on"> <label class="radio">会员卡</label>
																	</span> <input class="span7" type="text" name="card_pay">
																	<span class="add-on">￥</span>
																</div>
																<div class="input-prepend input-append span2"
																	style="width: 100px">
																	<span class="add-on"> <label class="radio">现金</label>
																	</span> <input class="span7" type="text" name="cash_pay">
																	<span class="add-on">￥</span>
																</div>
																<div class="input-prepend input-append span2"
																	style="width: 100px">
																	<span class="add-on"> <label class="radio">银联</label>
																	</span> <input class="span7" type="text" name="union_pay">
																	<span class="add-on">￥</span>
																</div>
																<div class="input-prepend input-append span2"
																	style="width: 100px">
																	<span class="add-on"> <label class="radio">代金券</label>
																	</span> <input class="span7" type="text" name="vouchers_pay">
																	<span class="add-on">￥</span>
																</div>
																<div class="input-prepend input-append span2"
																	style="width: 100px">
																	<span class="add-on"> <label class="radio">赠送金</label>
																	</span> <input class="span7" type="text" name="gift_pay">
																	<span class="add-on">￥</span>
																</div>
																<div class="input-prepend input-append span2"
																	style="width: 100px">
																	<span class="add-on"> <label class="radio">免单</label>
																	</span> <input class="span7" type="text" name="free_pay">
																	<span class="add-on">￥</span>
																</div>
																<div class="input-prepend input-append span2"
																	style="width: 100px">
																	<span class="add-on"> <label class="radio">欠款</label>
																	</span> <input class="span7" type="text" name="arrears_pay">
																	<span class="add-on">￥</span>
																</div>
															</div>
														</div>
														<div class="control-group">
															<label class="control-label" style="width: 80px;">实际业绩:</label>
															<div class="controls" style="margin-left: 80px;">
																<input type="text" placeholder="实际业绩" class="span5"
																	name="real_result" />
															</div>
														</div>
														<div class="control-group">
															<label class="control-label" style="width: 80px;">代金券:</label>
															<div class="controls" style="margin-left: 80px;">
																<input type="text" placeholder="代金券" class="span5"
																	name="real_result" />
															</div>
														</div>
														<div class="control-group">
															<label class="control-label" style="width: 80px;">客户姓名:</label>
															<div class="controls" style="margin-left: 80px;">
																<input type="text" placeholder="客户姓名" class="span5"
																	name="guest_name" />
															</div>
														</div>
														<div class="control-group">
															<label class="control-label" style="width: 80px;">手机号码:</label>
															<div class="controls" style="margin-left: 80px;">
																<input type="text" placeholder="手机号码" class="span5"
																	name="guest_tel" />
															</div>
														</div>
														<div class="control-group">
															<label class="control-label" style="width: 80px;">客户性别:</label>
															<div class="controls" style="margin-left: 80px;">
																<label class="radio"> <input type="radio"
																	name="guest_sex" value="0" />男
																</label> <label class="radio"> <input type="radio"
																	name="guest_sex" value="1" />女
																</label>
															</div>
														</div>
														<div class="control-group">
															<label class="control-label" style="width: 80px;">备注:</label>
															<div class="controls" style="margin-left: 80px;">
																<textarea class="span5 " rows="3" name="order_comment"></textarea>
															</div>
														</div>
														<div class="form-actions">
															<a class="btn btn-success"
																onClick="check_out_submit(this,'course')">结账</a> <a
																class="btn btn-success"
																onClick="union_order_submit(this,'course')">联单</a> <a
																class="btn btn-success"
																onClick="pending_order_submit(this,'course')">挂单</a>
														</div>
													</form>
												</div>
											</div>
										</div>
										<!--END TABS-->
									</div>
								</div>
							</div>
						</div>
						<!-- END INLINE TABS PORTLET-->
					</div>
				</div>
			</div>
			<!-- END PAGE -->
		</div>
		<!-- END CONTAINER -->
		<!--会员-->
		<div class="row-fluid" id="member_content" style="display: none;">
			<div class="span12">
				<!-- BEGIN EXAMPLE TABLE widget-->
				<div class="widget">
					<div class="widget-body">
						<table class="table table-striped table-bordered table-hover"
							id="data">
							<thead>
								<tr>
									<th>会员卡号</th>
									<th class="hidden-phone">会员名</th>
									<th class="hidden-phone">折扣</th>
									<th class="hidden-phone">余额</th>
									<th class="hidden-phone">赠送金</th>
									<th class="hidden-phone">欠款</th>
									<th class="hidden-phone">操作</th>
								</tr>
							</thead>
							<tbody>
								<?php if(is_array($memberList)): $i = 0; $__LIST__ = $memberList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$member): $mod = ($i % 2 );++$i;?><tr class="odd gradeX">
									<td><?php echo ($member["member_card_no"]); ?></td>
									<td class="hidden-phone"><?php echo ($member["member_name"]); ?></td>
									<td class="hidden-phone"><?php echo ($member["member_card_discount"]); ?></td>
									<td class="hidden-phone"><?php echo ($member["balance_money"]); ?></td>
									<td class="hidden-phone"><?php echo ($member["gift_money"]); ?></td>
									<td class="hidden-phone"><?php echo ($member["arrears_money"]); ?></td>
									<td class="hidden-phone">
										<button class="btn btn-success"
											onClick="select_member_row('<?php echo ($member["member_card_id"]); ?>','<?php echo ($member["member_card_no"]); ?>','<?php echo ($member["member_name"]); ?>','<?php echo ($member["member_card_discount"]); ?>','<?php echo ($member["balance_money"]); ?>','<?php echo ($member["gift_money"]); ?>','<?php echo ($member["arrears_money"]); ?>')">
											<i class="icon-ok"></i>
										</button>
									</td>
								</tr><?php endforeach; endif; else: echo "" ;endif; ?>
							</tbody>
						</table>
					</div>
				</div>
				<!-- END EXAMPLE TABLE widget-->
			</div>
		</div>

		<!--服务项目-->
		<div class="row-fluid" id="service_pull_content"
			style="display: none;">
			<option value=""></option>
			<?php if(is_array($serviceCategoryList)): $i = 0; $__LIST__ = $serviceCategoryList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$service_category_list): $mod = ($i % 2 );++$i;?><optgroup label="<?php echo ($service_category_list["category_name"]); ?>">
				<?php $category_id = $service_category_list["category_id"]; ?>
				<?php if(is_array($serviceList)): $i = 0; $__LIST__ = $serviceList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$service_list): $mod = ($i % 2 );++$i; $service_category_id = $service_list["category_id"]; ?> <?php if($service_category_id == $category_id): ?><option
					value="<?php echo ($service_list["service_id"]); ?>,<?php echo ($service_list["service_no"]); ?>,<?php echo ($service_list["service_name"]); ?>,<?php echo ($service_list["sell_price"]); ?>,<?php echo ($service_list["category_id"]); ?>,<?php echo ($service_list["category_name"]); ?>"><?php echo ($service_list["service_id"]); ?>-<?php echo ($service_list["service_name"]); ?></option><?php endif; endforeach; endif; else: echo "" ;endif; ?>
			</optgroup><?php endforeach; endif; else: echo "" ;endif; ?>
		</div>

		<!--充值项目-->
		<div class="row-fluid" id="member_card_type_content"
			style="display: none;">
			<div class="span12">
				<div class="widget">
					<div class="widget-body">
						<table class="table table-striped table-bordered table-hover"
							id="data">
							<thead>
								<tr>
									<th>编号</th>
									<th class="hidden-phone">类型名称</th>
									<th class="hidden-phone">折扣</th>
									<th class="hidden-phone">操作</th>
								</tr>
							</thead>
							<tbody>
								<?php if(is_array($memberCardTypeList)): $i = 0; $__LIST__ = $memberCardTypeList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$member_type_list): $mod = ($i % 2 );++$i;?><tr class="odd gradeX">
									<td><?php echo ($member_type_list["member_card_type_id"]); ?></td>
									<td class="hidden-phone"><?php echo ($member_type_list["member_card_type_name"]); ?></td>
									<td class="hidden-phone"><?php echo ($member_type_list["service_discount"]); ?></td>
									<td class="hidden-phone">
										<button class="btn btn-success"
											onClick="select_member_card_type_row('<?php echo ($member_type_list["member_card_type_id"]); ?>','<?php echo ($member_type_list["member_card_type_name"]); ?>','<?php echo ($member_type_list["service_discount"]); ?>')">
											<i class="icon-ok"></i>
										</button>
									</td>
								</tr><?php endforeach; endif; else: echo "" ;endif; ?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>

		<!--所有员工-->
		<div class="row-fluid" id="employee_pull_content"
			style="display: none;">
			<option value=""></option>
			<?php if(is_array($employeeList)): $i = 0; $__LIST__ = $employeeList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$employee_list): $mod = ($i % 2 );++$i;?><option
				value="<?php echo ($employee_list["employee_id"]); ?>,<?php echo ($employee_list["employee_position_id"]); ?>,"><?php echo ($employee_list["employee_id"]); ?>-<?php echo ($employee_list["employee_name"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
		</div>

		<!--设计师-->
		<div class="row-fluid" id="employee_desgin_pull_content"
			style="display: none;">
			<option value=""></option>
			<?php if(is_array($employeeList)): $i = 0; $__LIST__ = $employeeList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$employee_list): $mod = ($i % 2 );++$i; if($employee_list["employee_position_big_id"] == 1): ?><option
				value="<?php echo ($employee_list["employee_id"]); ?>,<?php echo ($employee_list["employee_position_id"]); ?>,"><?php echo ($employee_list["employee_id"]); ?>-<?php echo ($employee_list["employee_name"]); ?></option><?php endif; endforeach; endif; else: echo "" ;endif; ?>
		</div>

		<!--中工-->
		<div class="row-fluid" id="employee_middle_desgin_pull_content"
			style="display: none;">
			<option value=""></option>
			<?php if(is_array($employeeList)): $i = 0; $__LIST__ = $employeeList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$employee_list): $mod = ($i % 2 );++$i; if($employee_list["employee_position_big_id"] == 2): ?><option
				value="<?php echo ($employee_list["employee_id"]); ?>,<?php echo ($employee_list["employee_position_id"]); ?>,"><?php echo ($employee_list["employee_id"]); ?>-<?php echo ($employee_list["employee_name"]); ?></option><?php endif; endforeach; endif; else: echo "" ;endif; ?>
		</div>

		<!--助理-->
		<div class="row-fluid" id="employee_assistant_pull_content"
			style="display: none;">
			<option value=""></option>
			<?php if(is_array($employeeList)): $i = 0; $__LIST__ = $employeeList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$employee_list): $mod = ($i % 2 );++$i; if($employee_list["employee_position_big_id"] == 3): ?><option
				value="<?php echo ($employee_list["employee_id"]); ?>,<?php echo ($employee_list["employee_position_id"]); ?>,"><?php echo ($employee_list["employee_id"]); ?>-<?php echo ($employee_list["employee_name"]); ?></option><?php endif; endforeach; endif; else: echo "" ;endif; ?>
		</div>

		<!--充值用所有员工-->
		<div class="row-fluid" id="charge_employee_content"
			style="display: none;">
			<div class="span12">
				<div class="widget">
					<div class="widget-body">
						<table class="table table-striped table-bordered table-hover"
							id="data">
							<thead>
								<tr>
									<th>员工编号</th>
									<th class="hidden-phone">员工姓名</th>
									<th class="hidden-phone">类型</th>
								</tr>
							</thead>
							<tbody>
								<?php if(is_array($employeeList)): $i = 0; $__LIST__ = $employeeList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$employee_deginer): $mod = ($i % 2 );++$i;?><tr class="odd gradeX">
									<td><?php echo ($employee_deginer["employee_no"]); ?></td>
									<td class="hidden-phone"><?php echo ($employee_deginer["employee_name"]); ?></td>
									<td class="hidden-phone"><?php echo ($employee_deginer["employee_position_name"]); ?></td>
									<td class="hidden-phone">
										<button class="btn btn-success"
											onClick="select_employee_charge_row('order_charge_employee_content','<?php echo ($employee_deginer["employee_id"]); ?>','<?php echo ($employee_deginer["employee_no"]); ?>','<?php echo ($employee_deginer["employee_name"]); ?>','<?php echo ($employee_deginer["employee_position_id"]); ?>')">
											<i class="icon-ok"></i>
										</button>
									</td>
								</tr><?php endforeach; endif; else: echo "" ;endif; ?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>

		<!--套餐-->
		<div class="row-fluid" id="course_pull_content" style="display: none;">
			<option value=""></option>
			<?php if(is_array($courseCategoryList)): $i = 0; $__LIST__ = $courseCategoryList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$course_category_list): $mod = ($i % 2 );++$i;?><optgroup label="<?php echo ($course_category_list["category_name"]); ?>">
				<?php $category_id = $course_category_list["category_id"]; ?>
				<?php if(is_array($courseList)): $i = 0; $__LIST__ = $courseList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$course_list): $mod = ($i % 2 );++$i; $course_category_id = $course_list["category_id"]; ?> <?php if($course_category_id == $category_id): ?><option
					value="<?php echo ($course_list["course_id"]); ?>,<?php echo ($course_list["course_no"]); ?>,<?php echo ($course_list["course_name"]); ?>,<?php echo ($course_list["course_price"]); ?>"><?php echo ($course_list["course_id"]); ?>-<?php echo ($course_list["course_name"]); ?></option><?php endif; endforeach; endif; else: echo "" ;endif; ?>
			</optgroup><?php endforeach; endif; else: echo "" ;endif; ?>
		</div>

		<!--服务结账确认画面-->
		<div class="row-fluid" id="service_check_out_content"
			style="display: none;">
			<div class="span12">
				<div class="widget">
					<div class="widget-body">
						<form
							action="<?php echo (C("ACTION_BASE_DIR")); ?>/order/orderServiceAdd/"
							class="form-horizontal" id="service_check_out_form"
							enctype="multipart/form-data" method="post">
							<table class="table table-striped table-bordered table-hover"
								id="service_check_out_detail">
								<thead>
									<tr>
										<th>消费内容</th>
										<th>原价</th>
										<th>实收</th>
									</tr>
								</thead>
								<tbody>
								</tbody>
							</table>
							<h3>
								总消费<span class="pay_amoung"></span>元
							</h3>
							<div class="control-group">
								<div class="controls" style="margin-left: 80px;">
									<div class="input-prepend input-append">
										<span class="add-on"> <label class="radio">现收款</label>
										</span> <input class="" type="text" name="real_pay_amount"
											onchange="change_pay_amount(this)"> <span
											class="add-on">￥</span>
									</div>
									<div class="input-prepend input-append">
										<span class="add-on"> <label class="radio">找零</label>
										</span> <input class="" type="text" name="change_pay_amount">
										<span class="add-on">￥</span>
									</div>
								</div>
							</div>
							<div class="form-actions">
								<button class="btn btn-large btn-primary" type="button"
									onclick="check_out_form_submit('service_check_out_form')">结账</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>

		<!--套餐结账确认画面-->
		<div class="row-fluid" id="course_check_out_content"
			style="display: none;">
			<div class="span12">
				<div class="widget">
					<div class="widget-body">
						<form
							action="<?php echo (C("ACTION_BASE_DIR")); ?>/order/orderCourseAdd/"
							class="form-horizontal" id="course_check_out_form"
							enctype="multipart/form-data" method="post">
							<table class="table table-striped table-bordered table-hover"
								id="course_check_out_detail">
								<thead>
									<tr>
										<th>消费内容</th>
										<th>原价</th>
										<th>实收</th>
									</tr>
								</thead>
								<tbody>
								</tbody>
							</table>
							<h3>
								总消费<span class="pay_amoung"></span>元
							</h3>
							<div class="control-group">
								<div class="controls" style="margin-left: 80px;">
									<div class="input-prepend input-append">
										<span class="add-on"> <label class="radio">现收款</label>
										</span> <input class="" type="text" name="real_pay_amount"
											onchange="change_pay_amount(this)"> <span
											class="add-on">￥</span>
									</div>
									<div class="input-prepend input-append">
										<span class="add-on"> <label class="radio">找零</label>
										</span> <input class="" type="text" name="change_pay_amount">
										<span class="add-on">￥</span>
									</div>
								</div>
							</div>
							<div class="form-actions">
								<button class="btn btn-large btn-primary" type="button"
									onclick="check_out_form_submit('course_check_out_form')">结账</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>

		<!--充值结账确认画面-->
		<div class="row-fluid" id="charge_check_out_content"
			style="display: none;">
			<div class="span12">
				<div class="widget">
					<div class="widget-body">
						<form
							action="<?php echo (C("ACTION_BASE_DIR")); ?>/order/orderChargeAdd/"
							class="form-horizontal" id="charge_check_out_form"
							enctype="multipart/form-data" method="post">
							<table class="table table-striped table-bordered table-hover"
								id="charge_check_out_detail">
								<thead>
									<tr>
										<th>消费内容</th>
										<th>原价</th>
										<th>实收</th>
									</tr>
								</thead>
								<tbody>
								</tbody>
							</table>
							<h3>
								总消费<span class="pay_amoung"></span>元
							</h3>
							<div class="control-group">
								<div class="controls" style="margin-left: 80px;">
									<div class="input-prepend input-append">
										<span class="add-on"> <label class="radio">现收款</label>
										</span> <input class="" type="text" name="real_pay_amount"
											onchange="change_pay_amount(this)"> <span
											class="add-on">￥</span>
									</div>
									<div class="input-prepend input-append">
										<span class="add-on"> <label class="radio">找零</label>
										</span> <input class="" type="text" name="change_pay_amount">
										<span class="add-on">￥</span>
									</div>
								</div>
							</div>
							<div class="form-actions">
								<button class="btn btn-large btn-primary" type="button"
									onclick="check_out_form_submit('charge_check_out_form')">结账</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>

	</div>

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

	<script src="<?php echo (C("WEB_RES_ROOT")); ?>/js/jquery-1.8.2.min.js"></script>
	<script src="<?php echo (C("WEB_RES_ROOT")); ?>/js/jquery.nicescroll.js"
		type="text/javascript"></script>
	<script type="text/javascript"
		src="<?php echo (C("WEB_RES_ROOT")); ?>/assets/ckeditor/ckeditor.js"></script>
	<script
		src="<?php echo (C("WEB_RES_ROOT")); ?>/assets/bootstrap/js/bootstrap.min.js"></script>
	<script type="text/javascript"
		src="<?php echo (C("WEB_RES_ROOT")); ?>/assets/bootstrap/js/bootstrap-fileupload.js"></script>
	<script src="<?php echo (C("WEB_RES_ROOT")); ?>/js/jquery.blockui.js"></script>
	<script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
	<script src="<?php echo (C("WEB_RES_ROOT")); ?>/js/jQuery.dualListBox-1.3.js"
		type="text/javascript"></script>
	<script type="text/javascript"
		src="<?php echo (C("WEB_RES_ROOT")); ?>/assets/jquery-slimscroll/jquery.slimscroll.min.js"></script>

	<!-- ie8 fixes -->
	<!--[if lt IE 9]>
    <script src="<?php echo (C("WEB_RES_ROOT")); ?>/js/excanvas.js"></script>
    <script src="<?php echo (C("WEB_RES_ROOT")); ?>/js/respond.js"></script>
    <![endif]-->
	<script type="text/javascript"
		src="<?php echo (C("WEB_RES_ROOT")); ?>/assets/bootstrap-toggle-buttons/static/js/jquery.toggle.buttons.js"></script>
	<script type="text/javascript"
		src="<?php echo (C("WEB_RES_ROOT")); ?>/assets/chosen-bootstrap/chosen/chosen.jquery.min.js"></script>
	<script type="text/javascript"
		src="<?php echo (C("WEB_RES_ROOT")); ?>/assets/uniform/jquery.uniform.min.js"></script>
	<script type="text/javascript"
		src="<?php echo (C("WEB_RES_ROOT")); ?>/assets/data-tables/jquery.dataTables.js"></script>
	<script type="text/javascript"
		src="<?php echo (C("WEB_RES_ROOT")); ?>/assets/data-tables/DT_bootstrap.js"></script>
	<script type="text/javascript"
		src="<?php echo (C("WEB_RES_ROOT")); ?>/assets/bootstrap-wysihtml5/wysihtml5-0.3.0.js"></script>
	<script type="text/javascript"
		src="<?php echo (C("WEB_RES_ROOT")); ?>/assets/bootstrap-wysihtml5/bootstrap-wysihtml5.js"></script>
	<script type="text/javascript"
		src="<?php echo (C("WEB_RES_ROOT")); ?>/assets/clockface/js/clockface.js"></script>
	<script type="text/javascript"
		src="<?php echo (C("WEB_RES_ROOT")); ?>/assets/jquery-tags-input/jquery.tagsinput.min.js"></script>
	<script type="text/javascript"
		src="<?php echo (C("WEB_RES_ROOT")); ?>/assets/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
	<script type="text/javascript"
		src="<?php echo (C("WEB_RES_ROOT")); ?>/assets/bootstrap-daterangepicker/date.js"></script>
	<script type="text/javascript"
		src="<?php echo (C("WEB_RES_ROOT")); ?>/assets/bootstrap-daterangepicker/daterangepicker.js"></script>
	<script type="text/javascript"
		src="<?php echo (C("WEB_RES_ROOT")); ?>/assets/bootstrap-colorpicker/js/bootstrap-colorpicker.js"></script>
	<script type="text/javascript"
		src="<?php echo (C("WEB_RES_ROOT")); ?>/assets/bootstrap-timepicker/js/bootstrap-timepicker.js"></script>
	<script type="text/javascript"
		src="<?php echo (C("WEB_RES_ROOT")); ?>/assets/bootstrap-inputmask/bootstrap-inputmask.min.js"></script>
	<script
		src="<?php echo (C("WEB_RES_ROOT")); ?>/assets/fancybox/source/jquery.fancybox.pack.js"></script>
	<script src="<?php echo (C("WEB_RES_ROOT")); ?>/js/jquery.scrollTo.min.js"></script>
	<!--common script for all pages-->
	<script src="<?php echo (C("WEB_RES_ROOT")); ?>/js/common-scripts.js"></script>
	<!--script for this page-->
	<script src="<?php echo (C("WEB_RES_ROOT")); ?>/js/form-component.js"></script>
	<script type="text/javascript" charset="utf-8">
			var action_base_dir = "<?php echo (C("ACTION_BASE_DIR")); ?>";
    </script>
	<script src="<?php echo (C("WEB_RES_ROOT")); ?>/js/jquery.validate.min.js"></script>
	<script src="<?php echo (C("WEB_RES_ROOT")); ?>/js/jquery.form.min.js"></script>
	<script src="<?php echo (C("WEB_RES_ROOT")); ?>/js/layer/layer.js"></script>
	<script src="<?php echo (C("WEB_RES_ROOT")); ?>/js/customer/common.js"></script>
	<script src="<?php echo (C("WEB_RES_ROOT")); ?>/js/customer/order.js"></script>
	<!-- END JAVASCRIPTS -->
</body>
<!-- END BODY -->
</html>