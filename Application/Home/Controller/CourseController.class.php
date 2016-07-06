<?php
namespace Home\Controller;

use Home\Controller\BaseAction;
use Home\Model\CourseModel;
use Home\Model\CourseCategoryModel;
use Home\Model\CourseServiceModel;
use Home\Model\ServiceModel;
use Home\Model\CourseCommissionModel;
use Home\Model\EmployeePositionBigModel;

class CourseController extends BaseAction
{
    public function courseList(){
        
        $course = new CourseModel('course');
        
        $course_list = $course ->courseList();
        
        $course_service = new CourseServiceModel('course_service');
        
        $course_service_list = $course_service->courseServiceList();
        
        $this->assign('courseServiceList',$course_service_list);
        
        $this->assign('courseList',$course_list);
        
        $this->display('course:courseList');
    }
    
    public function courseCommisionList(){
        
        //员工职位信息
        $employee_position_big = new EmployeePositionBigModel('employee_position_big');
        
        $employee_position_big_list = $employee_position_big ->employeePositionBigList();
        
        $this->assign('employeePositionBigList',$employee_position_big_list);
        
        //套餐信息
        $course = new CourseModel('course');
        
        $course_list = $course ->courseList();
        
        $this->assign('courseList',$course_list);
        
        //套餐提成信息
        $course_commission = new CourseCommissionModel('course_commission');
        
        $course_commission_list = $course_commission->courseCommissionList();
        
        $this->assign('courseCommissionList',$course_commission_list);
        
        $this->display('course:courseCommisionList');
        
    }
    
    public function courseCommisionProcess(){
        $course_id = '';
        
        $employee_position_big_id = '';
        
        $commission_type = '';
        
        $commission_amount = 0;
        
        $commission_discount = 0;
        
        if (I('post.course_id')<> ''){
            $course_id = I('post.course_id');
        }
        
        if (I('post.employee_position_big_id')<> ''){
            $employee_position_big_id = I('post.employee_position_big_id');
        }
        
        if (I('post.commission_type')<> ''){
            $commission_type = I('post.commission_type');
        }
        
        if (I('post.commission_amount')<> ''){
            $commission_amount = I('post.commission_amount');
        }
        
        if (I('post.commission_discount')<> ''){
            $commission_discount = I('post.commission_discount');
        }
        
        $course_commission = new CourseCommissionModel('course_commission');
        
        $course_commission_where = 'DEL_FLG = "0" AND COURSE_ID = '.$course_id.' AND EMPLOYEE_POSITION_BIG_ID = '.$employee_position_big_id;
        
        $result = false;
        if (count($course_commission -> courseCommissionFind($course_commission_where))> 0){
            $course_commission_data = array(
                'COMMISSION_TYPE' => $commission_type,
                'COMMISSION_AMOUNT' => $commission_amount,
                'COMMISSION_DISCOUNT' => $commission_discount,
                'UPD_DATE' => get_system_time(),
                'UPD_USER' => I('session.admin')['admin_id']
            );
            
            $result = $course_commission->courseCommissionUpdate($course_commission_where, $course_commission_data);
        }else {
            $course_commission_data = array(
                'COURSE_ID' => $course_id,
                'EMPLOYEE_POSITION_BIG_ID' => $employee_position_big_id,
                'COMMISSION_TYPE' => $commission_type,
                'COMMISSION_AMOUNT' => $commission_amount,
                'COMMISSION_DISCOUNT' => $commission_discount,
                'INS_DATE' => get_system_time(),
                'INS_USER' => I('session.admin')['admin_id'],
                'UPD_DATE' => get_system_time(),
                'UPD_USER' => I('session.admin')['admin_id'],
                'DEL_FLG' => '0'
            );
            
            $result = $course_commission->courseCommissionAdd($course_commission_data);
        }
        
        if ($result <> false){
            return $this->ajaxReturn(array('result' => true,'message' => '操作成功!'),'JSON');
        }else{
            return $this->ajaxReturn(array('result' => false,'message' => '操作失败!'),'JSON');
        }
    }
    
    public function toCourseAdd() {
        $course_category = new CourseCategoryModel('course_category');
        
        $course_category_list = $course_category ->courseCategoryList();
        
        $this->assign('courseCategoryList',$course_category_list);
        
        $service = new ServiceModel('service');
        
        $service_list = $service ->serviceList();
        
        $this->assign('serviceList',$service_list);
        
        $this->display('course:courseAdd');
    }
    
    public function courseAdd(){
        
        $course_name = '';
        
        $course_category_id = '';
        
        $course_value = '';
        
        $course_price = '';
        
        $service_id = '';
        
        $service_name ='';
        
        $service_price = 0;
        
        $usecount = 0;
        
        $course_service_price = 0;
        
        $signal_price = 0;
        
        $course_service_type = '';
        
        $course_service_days = '';
        
        $course_service_date = '';
        
        if (I('post.course_name') <> ''){
            $course_name = I('post.course_name');
        }
        
        if (I('post.course_category_id') <> ''){
            $course_category_id = I('post.course_category_id');
        }
        
        if (I('post.course_value') <> ''){
            $course_value = I('post.course_value');
        }
        
        if (I('post.course_price') <> ''){
            $course_price = I('post.course_price');
        }
        
        if (I('post.service_id') <> ''){
            $service_id = I('post.service_id');
        }
        
        if (I('post.service_name') <> ''){
            $service_name = I('post.service_name');
        }
        
        if (I('post.service_price') <> ''){
            $service_price = I('post.service_price');
        }
        
        if (I('post.usecount') <> ''){
            $usecount = I('post.usecount');
        }
        
        if (I('post.course_service_price') <> ''){
            $course_service_price = I('post.course_service_price');
        }
        
        if (I('post.signal_price') <> ''){
            $signal_price = I('post.signal_price');
        }
        
        if (I('post.course_service_days') <> ''){
            $course_service_days = I('post.course_service_days');
        }
        
        if (I('post.course_service_date') <> ''){
            $course_service_date = I('post.course_service_date');
        }
        
        $course_data = array(
            'COURSE_NAME' => $course_name,
            'COURSE_PRICE' => $course_price,
            'COURSE_VALUE' => $course_value,
            'CATEGORY_ID' => $course_category_id,
            'COURSE_STATUS' => '0',
            'INS_DATE' => get_system_time(),
            'INS_USER' => I('session.admin')['admin_id'],
            'UPD_DATE' => get_system_time(),
            'UPD_USER' => I('session.admin')['admin_id'],
            'DEL_FLG' => '0'
        );
        
        $course = new CourseModel('course');
        
        $course_id = $course ->courseAdd($course_data);
        
        if ($course_id <> false){
            
            for ($i = 0;$i<count($service_id);$i++){
                if (I('post.course_service_type'.$i) <> ''){
                    $course_service_type = I('post.course_service_type'.$i);
                }
                
                $course_service_data = array(
                    'COURSE_ID' => $course_id,
                    'SERVICE_ID' => $service_id[$i],
                    'SERVICE_NAME' => $service_name[$i],
                    'SERVICE_PRICE' => $service_price[$i],
                    'USECOUNT' => $usecount[$i],
                    'COURSE_SERVICE_PRICE' => $course_service_price[$i],
                    'SIGNAL_PRICE' => $signal_price[$i],
                    'COURSE_SERVICE_TYPE' => $course_service_type,
                    'COURSE_SERVICE_DAYS' => $course_service_days[$i],
                    'COURSE_SERVICE_DATE' => $course_service_date[$i],
                    'INS_DATE' => get_system_time(),
                    'INS_USER' => I('session.admin')['admin_id'],
                    'UPD_DATE' => get_system_time(),
                    'UPD_USER' => I('session.admin')['admin_id'],
                    'DEL_FLG' => '0'
                );
                
                $course_service =new CourseServiceModel('course_service');
                
                $result = $course_service ->courseServiceAdd($course_service_data);
            }
            
            if ($result <>false){
                return $this->ajaxReturn(array('result'=>true,'message' => '添加成功!'),'JSON');
            }else{
                return $this->ajaxReturn(array('result'=>false,'message' => '添加失败!'),'JSON');
            }
        }else{
            return $this->ajaxReturn(array('result'=>false,'message' => '添加失败!'),'JSON');
        }
        
    }
    
    public function toCourseUpdate(){
        
        $course_id = '';
        
        if (I('get.course_id') <> ''){
            $course_id = I('get.course_id');
        }
        
        $course = new CourseModel('course');
        
        $where = 'COURSE_ID = '.$course_id;
        
        $obj_course = $course ->courseFind($where);
        
        $this->assign('objCourse',$obj_course);
        
        $this->display('course:courseUpdate');
        
    }
    
    public function courseUpdate(){
        
        $course_id = '';
        
        $course_no = '';
        
        $course_name = '';
        
        $course_category_id = '';
        
        $market_price = 0;
        
        $sell_price = 0;
        
        if (I('post.course_id') <> ''){
            $course_id = I('post.course_id');
        }
        
        if (I('post.course_no') <> ''){
            $course_no = I('post.course_no');
        }
        
        if (I('post.course_name') <> ''){
            $course_name = I('post.course_name');
        }
        
        if (I('post.course_category_id') <> ''){
            $course_category_id = I('post.course_category_id');
        }
        
        if (I('post.market_price') <> ''){
            $market_price = I('post.market_price');
        }
        
        if (I('post.sell_price') <> ''){
            $sell_price = I('post.sell_price');
        }
        
        $course_data = array(
            'COURSE_NAME' => $course_name,
            'COURSE_NO' => $course_no,
            'SELL_PRICE' => $sell_price,
            'MARKET_PRICE' => $market_price,
            'INS_DATE' => get_system_time(),
            'INS_USER' => I('session.admin')['admin_id'],
            'UPD_DATE' => get_system_time(),
            'UPD_USER' => I('session.admin')['admin_id'],
            'DEL_FLG' => '0'
        );
        
        $course_where = 'COURSE_ID = '.$course_id;
        
        $course = new CourseModel('course');
        
        $result = $course->courseUpdate($course_where, $course_data);
        
        if ($result <> false){
            return $this->ajaxReturn(array('result'=>true,'message' => '修改成功!'),'JSON');
        }else{
            return $this->ajaxReturn(array('result'=>false,'message' => '修改失败!'),'JSON');
        }
    }
    
    public function courseDelete(){
        $course_id = '';
        
        if (I('get.course_id') <> ''){
            $course_id = I('get.course_id');
        }
        
        $course_data = array(
            'UPD_DATE' => get_system_time(),
            'UPD_USER' => I('session.admin')['admin_id'],
            'DEL_FLG' => '1'
        );
        
        $course_where = 'COURSE_ID = '.$course_id;
        
        $course = new CourseModel('course');
        
        $result = $course->courseUpdate($course_where, $course_data);
        
        if ($result <> false){
            
            $course_service_data = array(
                'UPD_DATE' => get_system_time(),
                'UPD_USER' => I('session.admin')['admin_id'],
                'DEL_FLG' => '1'
            );
            
            $course_service_where = 'COURSE_ID = '.$course_id;
            
            $course_service = new CourseServiceModel('course_service');
            
            $result = $course_service ->courseServiceUpdate($course_service_where, $course_service_data);
            
            if ($result <> false){
                return $this->ajaxReturn(array('result'=>true,'message' => '删除成功!'),'JSON');
            }else{
                return $this->ajaxReturn(array('result'=>false,'message' => '删除失败!'),'JSON');
            }
        }else{
            return $this->ajaxReturn(array('result'=>false,'message' => '删除失败!'),'JSON');
        }
        
    }
    
    public function courseCategoryProcess(){
        $category_id = '';
        
        $category_name = '';
        
        if (I('post.category_id') <> ''){
            $category_id = I('post.category_id');
        }
        
        if (I('post.category_name') <> ''){
            $category_name = I('post.category_name');
        }
        
        $course_category = new CourseCategoryModel('course_category');
        
        $result = '';
        for ($i = 0;$i<count($category_id);$i++){
            if ($category_id[$i] <> ''){
                //更新
                if ($category_name[$i] <> ''){
                    $category_data = array(
                        'CATEGORY_NAME' => $category_name[$i],
                        'UPD_DATE' => get_system_time(),
                        'UPD_USER' => I('session.admin')['admin_id']
                    );
        
                    $category_where  = 'CATEGORY_ID = '.$category_id[$i];
        
                    $result = $course_category ->courseCategoryUpdate($category_where, $category_data);
                }else{
                    $category_data = array(
                        'UPD_DATE' => get_system_time(),
                        'UPD_USER' => I('session.admin')['admin_id'],
                        'DEL_FLG' => '1'
                    );
        
                    $category_where  = 'CATEGORY_ID = '.$category_id[$i];
        
                    $result = $course_category ->courseCategoryUpdate($category_where, $category_data);
                }
            }else{
                //添加
                if ($category_name[$i] <> ''){
                    $category_data = array(
                        'CATEGORY_NAME' => $category_name[$i],
                        'INS_DATE' => get_system_time(),
                        'INS_USER' => I('session.admin')['admin_id'],
                        'UPD_DATE' => get_system_time(),
                        'UPD_USER' => I('session.admin')['admin_id'],
                        'DEL_FLG' => '0'
                    );
                    $result = $course_category ->courseCategoryAdd($category_data);
                }
            }
        }
        
        if ($result <> false){
            return $this->ajaxReturn(array('result'=>true,'message' => '操作成功!'),'JSON');
        }else{
            return $this->ajaxReturn(array('result'=>false,'message' => '操作失败!'),'JSON');
        }
    }
    
    public function toCourseCategoryProcess(){
        
        $course_category = new CourseCategoryModel('course_category');
        
        $course_category_list = $course_category ->courseCategoryList();
        
        $this->assign('dataCount',count($course_category_list));
        $this->assign('courseCategoryList',$course_category_list);
        
        $this->display('course:courseCategoryList');
    }
}

?>