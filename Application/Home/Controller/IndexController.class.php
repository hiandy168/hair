<?php

namespace Home\Controller;

use Home\Controller\BaseAction;

use Home\Model\MemberModel;
use Home\Model\ServiceModel;
use Home\Model\ServiceCategoryModel;
use Home\Model\EmployeeModel;
use Home\Model\CourseModel;
use Home\Model\CourseCategoryModel;
use Home\Model\MemberCardTypeModel;

class IndexController extends BaseAction {
    
    public function index() {
        
        //会员信息
        $member = new MemberModel('member');
        
        $member_list = $member ->memberList();
        
        $this->assign('memberList',$member_list);
        
        //服务项目分类信息
        $service_category = new ServiceCategoryModel('service_category');
        
        $service_category_list = $service_category->serviceCategoryList();
        
        $this->assign('serviceCategoryList',$service_category_list);
        
        //服务项目信息
        $service = new ServiceModel('service');
        
        $service_list = $service ->serviceList();
        
        $this->assign('serviceList',$service_list);
        
        //员工信息
        $employee = new EmployeeModel('employee');
        
        $this->assign('employeeList', $employee ->employeeList());
        
        //套餐分类信息
        $course_category = new CourseCategoryModel('course_category');
        
        $course_category_list = $course_category -> courseCategoryList();
        
        $this->assign('courseCategoryList',$course_category_list);
        
        //套餐信息
        $course = new CourseModel('course');
        
        $course_list = $course ->courseList();
        
        $this->assign('courseList',$course_list);
        
        //会员类型
        $member_card_type = new MemberCardTypeModel('member_card_type');
        
        $member_card_type_list = $member_card_type->memberCardTypeList();
        
        $this ->assign('memberCardTypeList',$member_card_type_list);
        
        $this->display('index:index');
    }
}