<?php
namespace Home\Controller;

use Home\Controller\BaseAction;
use Home\Model\ServiceModel;
use Home\Model\ServiceTypeModel;
use Home\Model\ServiceCategoryModel;
use Home\Model\ServiceCommissionModel;
use Home\Model\EmployeePositionBigModel;
use Home\Model\EmployeePositionModel;

class ServiceController extends BaseAction
{
    public function serviceList(){
        $service = new ServiceModel('service');
        
        $service_list = $service ->serviceList();
        
        $this->assign('serviceList',$service_list);
        
        $this->display('service:serviceList');
    }
    
    public function serviceCommisionList(){
        
        //员工职位信息
        $employee_position_big = new EmployeePositionBigModel('employee_position_big');
        
        $employee_position_big_list = $employee_position_big ->employeePositionBigList();
        
        $this->assign('employeePositionBigList',$employee_position_big_list);
        
        //员工二级职位
        $employee_position = new EmployeePositionModel('employee_position');
        
        $employee_position_list = $employee_position ->employeePositionList();
        
        $this->assign('employeePositionList',$employee_position_list);
        
        //服务项目信息
        $service = new ServiceModel('service');
        
        $service_list = $service ->serviceList();
        
        $this->assign('serviceList',$service_list);
        
        //服务项目提成信息
        $service_commission = new ServiceCommissionModel('service_commission');
        
        $service_commission_list = $service_commission -> serviceCommissionList();
        
        $this->assign('serviceCommissionList',$service_commission_list);
        
        $this->assign('form_serviceCommissionList',$service_commission_list);
        
        $this->display('service:serviceCommisionList');
    }
    
    public function serviceCommisionProcess(){
        
        $service_id = '';
        
        $employee_position_big_id = '';
        
        $employee_position_id = '';
        
        $member_commision_type = '';
        
        $member_discount = 0;
        
        $member_amount = 0;
        
        $personal_commision_type = '';
        
        $personal_discount = 0;
        
        $personal_amount = 0;
        
        if (I('post.service_id')<> ''){
            $service_id = I('post.service_id');
        }
        
        if (I('post.employee_position_big_id')<> ''){
            $employee_position_big_id = I('post.employee_position_big_id');
        }
        
        if (I('post.employee_position_id')<> ''){
            $employee_position_id = I('post.employee_position_id');
        }
        
        if (I('post.member_commision_type')<> ''){
            $member_commision_type = I('post.member_commision_type');
        }
        
        if (I('post.member_discount')<> ''){
            $member_discount = I('post.member_discount');
        }
        
        if (I('post.member_amount')<> ''){
            $member_amount = I('post.member_amount');
        }
        
        if (I('post.personal_commision_type')<> ''){
            $personal_commision_type = I('post.personal_commision_type');
        }
        
        if (I('post.personal_discount')<> ''){
            $personal_discount = I('post.personal_discount');
        }
        
        if (I('post.personal_amount')<> ''){
            $personal_amount = I('post.personal_amount');
        }
        
        $service_commision = new ServiceCommissionModel('service_commission');
        
        $result = false;
        
        for($i = 0; $i<count($employee_position_id);$i++){
            
            if (I('post.member_commision_type'.$i)<> ''){
                $member_commision_type = I('post.member_commision_type'.$i);
            }
            
            if (I('post.personal_commision_type'.$i)<> ''){
                $personal_commision_type = I('post.personal_commision_type'.$i);
            }
            
            $service_commision_where  = 'service_commission.DEL_FLG = "0" AND service_commission.EMPLOYEE_POSITION_BIG_ID = '.$employee_position_big_id.' AND service_commission.EMPLOYEE_POSITION_ID = '.$employee_position_id[$i];
            
            if (count($service_commision->serviceCommissionFind($service_commision_where)) > 0){
                $service_commision_data = array(
                    'MEMBER_COMMISION_TYPE' => $member_commision_type,
                    'MEMBER_DISCOUNT' => $member_discount[$i],
                    'MEMBER_AMOUNT' => $member_amount[$i],
                    'PERSONAL_COMMISION_TYPE' => $personal_commision_type,
                    'PERSONAL_DISCOUNT' => $personal_discount[$i],
                    'PERSONAL_AMOUNT' => $personal_amount[$i],
                    'UPD_DATE' => get_system_time(),
                    'UPD_USER' => I('session.admin')['admin_id'],
                );
                
                $result = $service_commision -> serviceCommissionUpdate($service_commision_where, $service_commision_data);
                
                if ($result == false){
                    break;
                }
            }else {
                $service_commision_data = array(
                    'SERVICE_ID' => $service_id,
                    'EMPLOYEE_POSITION_BIG_ID' => $employee_position_big_id,
                    'EMPLOYEE_POSITION_ID' => $employee_position_id[$i],
                    'MEMBER_COMMISION_TYPE' => $member_commision_type,
                    'MEMBER_DISCOUNT' => $member_discount[$i],
                    'MEMBER_AMOUNT' => $member_amount[$i],
                    'PERSONAL_COMMISION_TYPE' => $personal_commision_type,
                    'PERSONAL_DISCOUNT' => $personal_discount[$i],
                    'PERSONAL_AMOUNT' => $personal_amount[$i],
                    'INS_DATE' => get_system_time(),
                    'INS_USER' => I('session.admin')['admin_id'],
                    'UPD_DATE' => get_system_time(),
                    'UPD_USER' => I('session.admin')['admin_id'],
                    'DEL_FLG' => '0'
                );
                
                $result = $service_commision -> serviceCommissionAdd($service_commision_data);
                
                if ($result == false){
                    break;
                }
                
            }
        }
        
        if ($result <> false){
            return $this->ajaxReturn(array('result' => true,'message' => '操作成功!'),'JSON');
        }else{
            return $this->ajaxReturn(array('result' => false,'message' => '操作失败!'),'JSON');
        }
    }
    
    
    
    public function toServiceAdd(){
        $service_type = new ServiceTypeModel('service_type');
        
        $service_type_list = $service_type->serviceTypeList();
        
        $service_category = new ServiceCategoryModel('service_category');
        
        $service_category_list = $service_category->serviceCategoryList();
        
        $this->assign('serviceTypeList',$service_type_list);
        
        $this->assign('serviceCategoryList',$service_category_list);
        
        $this->display('service:serviceAdd');
    }
    
    public function serviceAdd(){
        
        //项目名
        $service_name = '';
        
        //项目类别
        $service_type_id = '';
        
        //项目类型
        $service_category_id = '';
        
        //项目价格
        $service_price = 0.00;
        
        //手工费
        $hand_price = 0.00;
        
        $result = false;
        
        if (I('post.service_name') <> ''){
            $service_name = I('post.service_name');
        }
        
        if (I('post.service_type_id') <> ''){
            $service_type_id = I('post.service_type_id');
        }
        
        if (I('post.service_category_id') <> ''){
            $service_category_id = I('post.service_category_id');
        }
        
        if (I('post.service_price') <> ''){
            $service_price = I('post.service_price');
        }
        
        if (I('post.hand_price') <> ''){
            $hand_price = I('post.hand_price');
        }
        
        $service_data=array(
            'SERVICE_NAME'=> $service_name,
            'TYPE_ID'=> $service_type_id,
            'CATEGORY_ID'=> $service_category_id,
            'SERVICE_PRICE' => $service_price,
            'HAND_PRICE' => $hand_price,
            'INS_DATE' => get_system_time(),
            'INS_USER' => I('session.admin')['admin_id'],
            'UPD_DATE' => get_system_time(),
            'UPD_USER' => I('session.admin')['admin_id'],
            'DEL_FLG' => '0'
        );
        
        $service = new ServiceModel('service');
        
        $result = $service->serviceAdd($service_data);
        
        if ($result <> false) {
            return $this->ajaxReturn(array('result'=>true,'message' => '添加成功!'),'JSON');
        }else{
            return $this->ajaxReturn(array('result'=>false,'message' => '添加失败!'),'JSON');
        }
    }
    
    public function toServiceUpdate() {
        $service_id = '';
        
        if (I('get.service_id')) {
            $service_id = I('get.service_id');
        }
        
        $service_where = 'SERVICE_ID = '.$service_id;
        
        $service = new ServiceModel('service');
        
        $obj_service = $service ->serviceFind($service_where);
        $service_type = new ServiceTypeModel('service_type');
        
        $service_type_list = $service_type->serviceTypeList();
        
        $service_category = new ServiceCategoryModel('service_category');
        
        $service_category_list = $service_category->serviceCategoryList();
        
        $this->assign('serviceTypeList',$service_type_list);
        
        $this->assign('serviceCategoryList',$service_category_list);
        
        $this->assign('objService',$obj_service);
        
        $this->display('service:serviceUpdate');
    }
    
    public function serviceUpdate(){
        
        //项目编号
        $service_id = '';
        
        //项目名
        $service_name = '';
        
        //项目类别
        $service_type_id = '';
        
        //项目类型
        $service_category_id = '';
        
        //项目价格
        $service_price = 0.00;
        
        //手工费
        $hand_price = 0.00;
        
        $result = false;
        
        if (I('post.service_id') <> ''){
            $service_id = I('post.service_id');
        }
        
    if (I('post.service_name') <> ''){
            $service_name = I('post.service_name');
        }
        
        if (I('post.service_type_id') <> ''){
            $service_type_id = I('post.service_type_id');
        }
        
        if (I('post.service_category_id') <> ''){
            $service_category_id = I('post.service_category_id');
        }
        
        if (I('post.service_price') <> ''){
            $service_price = I('post.service_price');
        }
        
        if (I('post.hand_price') <> ''){
            $hand_price = I('post.hand_price');
        }
        
        $service_data=array(
            'SERVICE_NAME'=> $service_name,
            'TYPE_ID'=> $service_type_id,
            'CATEGORY_ID'=> $service_category_id,
            'SERVICE_PRICE'=> $service_price,
            'HAND_PRICE'=> $hand_price,
            'UPD_DATE' => get_system_time(),
            'UPD_USER' => I('session.admin')['admin_id'],
        );
        
        $service_where = 'SERVICE_ID = '.$service_id;
        
        $service = new ServiceModel('service');
        
        $result = $service->serviceUpdate($service_where, $service_data);
        
        if ($result <> false) {
            return $this->ajaxReturn(array('result'=>true,'message' => '修改成功!'),'JSON');
        }else{
            return $this->ajaxReturn(array('result'=>false,'message' => '修改失败!'),'JSON');
        }
    }
    
    public function serviceDelete(){
        $service_id = '';
        
        $result = false;
        
        if (I('get.service_id') <> ''){
            $service_id = I('get.service_id');
        }
        
        $service_data=array(
            'UPD_DATE' => get_system_time(),
            'UPD_USER' => I('session.admin')['admin_id'],
            'DEL_FLG' => '1'
        );
        
        $service_where = 'SERVICE_ID = '.$service_id;
        
        $service = new ServiceModel('service');
        
        $result = $service->serviceUpdate($service_where, $service_data);
        
        if ($result <> false) {
            return $this->ajaxReturn(array('result'=>true,'message' => '删除成功!'),'JSON');
        }else{
            return $this->ajaxReturn(array('result'=>false,'message' => '删除失败!'),'JSON');
        }
    }
    
    public function serviceCategoryProcess(){
        $category_id = '';
        
        $category_name = '';
        
        if (I('post.category_id') <> ''){
            $category_id = I('post.category_id');
        }
        
        if (I('post.category_name') <> ''){
            $category_name = I('post.category_name');
        }
        
        $service_category = new ServiceCategoryModel('service_category');
        
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
                    
                    $result = $service_category ->serviceCategoryUpdate($category_where, $category_data);
                }else{
                    $category_data = array(
                        'UPD_DATE' => get_system_time(),
                        'UPD_USER' => I('session.admin')['admin_id'],
                        'DEL_FLG' => '1'
                    );
                    
                    $category_where  = 'CATEGORY_ID = '.$category_id[$i];
                    
                    $result = $service_category ->serviceCategoryUpdate($category_where, $category_data);
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
                    $result = $service_category ->serviceCategoryAdd($category_data);
                }
            }
        }
        
        if ($result <> false){
            return $this->ajaxReturn(array('result'=>true,'message' => '操作成功!'),'JSON');
        }else{
            return $this->ajaxReturn(array('result'=>false,'message' => '操作失败!'),'JSON');
        }
        
    
    }
    
    public function toServiceCategoryProcess(){
        
        $service_category =new ServiceCategoryModel('service_category');
        
        $service_category_list = $service_category->serviceCategoryList();
        
        $this->assign('dataCount',count($service_category_list));
        $this->assign('serviceCategoryList',$service_category_list);
        $this->display('service:serviceTypeCategoryProcess');
    }

}

?>