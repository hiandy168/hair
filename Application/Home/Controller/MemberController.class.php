<?php
namespace Home\Controller;

use Home\Controller\BaseAction;
use Home\Model\MemberModel;
use Home\Model\MemberCardTypeModel;
use Home\Model\MemberCardCommissionModel;
use Home\Model\MemberCardModel;
use Home\Model\OrderModel;
use Home\Model\OrderItemChargeModel;
use Home\Model\OrderItemChargeEmplopyee;
use Home\Model\EmployeeModel;
use Home\Model\EmployeePositionBigModel;

use Think\Upload;

class MemberController extends BaseAction
{
    public function memberList(){
        
        $member = new MemberModel('member');
        
        $member_list = $member ->memberList();
        
        $this->assign('memberList',$member_list);
        
        $this->display('member:memberList');
    }
    
    public function toMemberAdd(){
        
        $employee = new EmployeeModel('employee');
        
        $this->assign('data', $employee ->employeeList());
        
        $member_card_type = new MemberCardTypeModel('member_card_type');
        
        $member_card_type_list = $member_card_type ->memberCardTypeList();
        
        $this->assign('memberCardTypeList',$member_card_type_list);
        $this->display('member:memberAdd');
    }
    
    
    public function memberAdd(){
        
        //会员基本信息
        $member_name = '';
        
        $member_tel = '';
        
        $member_birthday = '';
        
        $member_sex = '';
        
        $member_message = '';
        
        $member_point = 0;
        
        $member_blood_type = '';
        
        $member_heigth = 0;
        
        $member_weight = 0;
        
        $member_hobby= '';
        
        $member_home_tel = '';
        
        $member_id_card= '';
        
        $member_address = '';
        
        $member_work = '';
        
        $member_comment = '';
        
        $member_marray = '';
        
        $member_img = '';
        
        $member_skin_comment = '';
        
        $member_effect_comment = '';
        
        $member_other_comment = '';
        
        //会员卡信息
        $member_card_no = get_no();
        
        $member_card_type_id = '';
        
        $member_card_password = '';
        
        $member_balance_money = 0;
        
        $member_arrears_money = 0;
        
        $member_gift_money = 0;
        
        $member_card_discount = 0;
        
        //会员相册基本信息
        $member_photo_path = '';
        
        $member_photo_description = '';
        
        //开卡订单信息
        $order_no = get_no();
        
        $order_type = '3';
        
        $order_result =0;
        
        $order_status = '2';
        
        $cash_pay = 0;
        
        $union_pay= 0;
        
        $arrears_pay =0;
        
        $gift_pay =0;
        
        //开卡员工信息
        $employee_id = '';
        
        $employee_position_id = '';
        
        $order_commision = 0;
        
        $order_result = 0;
        
        //会员信息登录
        if (I('post.member_name')<> ''){
            $member_name = I('post.member_name');
        }
        
        if (I('post.member_tel')<> ''){
            $member_tel = I('post.member_tel');
        }
        
        if (I('post.member_birthday')<> ''){
            $member_birthday = I('post.member_birthday');
        }
        
        if (I('post.member_sex')<> ''){
            $member_sex = I('post.member_sex');
        }
        
        if (I('post.member_message')<> ''){
            $member_message = I('post.member_message');
        }
        
        if (I('post.member_point')<> ''){
            $member_point = I('post.member_point');
        }
        
        if (I('post.member_blood_type')<> ''){
            $member_blood_type = I('post.member_blood_type');
        }
        
        if (I('post.member_heigth')<> ''){
            $member_heigth = I('post.member_heigth');
        }
        
        if (I('post.member_weight')<> ''){
            $member_weight = I('post.member_weight');
        }
        
        if (I('post.member_hobby')<> ''){
            $member_hobby = I('post.member_hobby');
        }
        
        if (I('post.member_home_tel')<> ''){
            $member_home_tel = I('post.member_home_tel');
        }
        
        if (I('post.member_id_card')<> ''){
            $member_id_card = I('post.member_id_card');
        }
        
        if (I('post.member_address')<> ''){
            $member_address = I('post.member_address');
        }
        
        if (I('post.member_work')<> ''){
            $member_name = I('post.member_work');
        }
        
        if (I('post.member_comment')<> ''){
            $member_comment = I('post.member_comment');
        }
        
        if (I('post.member_marray')<> ''){
            $member_marray = I('post.member_marray');
        }
        
        if (I('post.member_skin_comment')<> ''){
            $member_skin_comment = I('post.member_skin_comment');
        }
        
        if (I('post.member_effect_comment')<> ''){
            $member_effect_comment = I('post.member_effect_comment');
        }
        
        if (I('post.member_other_comment')<> ''){
            $member_name = I('post.member_other_comment');
        }
        
        //会员卡基本信息
        if (I('post.member_card_type_id')<> ''){
            $member_card_type_id = I('post.member_card_type_id');
        }
        
        if (I('post.member_card_password')<> ''){
            $member_card_password = I('post.member_card_password');
        }
        
        if (I('post.member_card_discount')<> ''){
            $member_card_discount = I('post.member_card_discount');
        }
        
        //开卡订单信息
        if (I('post.cash_pay')<> ''){
            $cash_pay = I('post.cash_pay');
        }
        
        if (I('post.union_pay')<> ''){
            $union_pay = I('post.union_pay');
        }
        
        if (I('post.arrears_pay')<> ''){
            $arrears_pay = I('post.arrears_pay');
        }
        
        if (I('post.gift_pay')<> ''){
            $gift_pay = I('post.gift_pay');
        }
        
        $member_gift_money = $gift_pay;
        
        $member_arrears_money = $arrears_pay;
        
        $member_balance_money = $cash_pay + $union_pay;
        
        //开卡员工信息
        if (I('post.employee_id')<> ''){
            $employee_id = I('post.employee_id');
        }
        
        if (I('post.employee_position_id')<> ''){
            $employee_position_id = I('post.employee_position_id');
        }
        
        if (I('post.order_commision')<> ''){
            $order_commision = I('post.order_commision');
        }
        
        if (I('post.order_result')<> ''){
            $order_result = I('post.order_result');
        }
        
        //会员相册信息
        if (I('post.member_photo_path')){
            $member_photo_path = I('post.member_photo_path');
        }
        
        if (I('post.member_photo_description')){
            $member_photo_description = I('post.member_photo_description');
        }
        
        //会员头像上传
        if ($_FILES['member_img'] <> ''){
            import('ORG.Net.UploadFile');
            
            $upload = new Upload();
            
            $upload->savePath =  C('UPLOAD_BASE_DIR');
            
            $file_infor = $upload->upload();
            if (!$file_infor) {
                $this->error('文件上传失败');
                exit();
            }else{
                $member_img = $file_infor['savename'];
            }
        }
        
        //会员基本信息登录
        $member_data = array(
            'MEMBER_NAME' => $member_name,
            'MEMBER_TEL' => $member_tel,
            'MEMBER_BIRTHDAY' =>$member_birthday,
            'MEMBER_SEX' => $member_sex,
            'MEMBER_MESSAGE' => $member_message,
            'MEMBER_POINT' => $member_point,
            'MEMBER_BLOOD_TYPE' => $member_blood_type,
            'MEMBER_HEIGHT' => $member_heigth,
            'MEMBER_WEIGHT' => $member_weight,
            'MEMBER_HOBBY' => $member_hobby,
            'MEMBER_HOME_TEL' =>$member_home_tel,
            'MEMBER_ID_CARD' => $member_id_card,
            'MEMBER_ADDRESS' => $member_address,
            'MEMBER_WORK' => $member_work,
            'MEMBER_COMMENT' => $member_comment,
            'MEMBER_MARRAY' => $member_marray,
            'MEMBER_IMG' => $member_img,
            'MEMBER_SKIN_COMMENT' => $member_skin_comment,
            'MEMBER_EFFECT_COMMENT' => $member_effect_comment,
            'MEMBER_OTHER_COMMENT' => $member_other_comment,
            'INS_DATE' => get_system_time(),
            'INS_USER' => I('session.admin')['admin_id'],
            'UPD_DATE' => get_system_time(),
            'UPD_USER' => I('session.admin')['admin_id'],
            'DEL_FLG' => '0'
        );
        
        $member = new MemberModel('member');
        
        $result = $member ->memberAdd($member_data);
        
        if ($result <> false){
            //会员卡信息登录
            $member_card_data = array(
                'MEMBER_ID' => $result,
                'MEMBER_CARD_NO' => $member_card_no,
                'MEMBER_CARD_TYPE_ID' => $member_card_type_id,
                'MEMBER_CARD_PASSWORD' => $member_card_password,
                'BALANCE_MONEY' => $member_balance_money,
                'ARREARS_MONEY' => $member_arrears_money,
                'GIFT_MONEY' => $member_gift_money,
                'MEMBER_CARD_DISCOUNT' => $member_card_discount,
                'INS_DATE' => get_system_time(),
                'INS_USER' => I('session.admin')['admin_id'],
                'UPD_DATE' => get_system_time(),
                'UPD_USER' => I('session.admin')['admin_id'],
                'DEL_FLG' => '0'
            );
            
            $member_card = new MemberCardModel('member_card');
            
            $member_card_id = $member_card -> memberCardAdd($member_card_data);
            
            if ($$member_card_id <> false){
                
                //开卡账单登录
                $order_data = array(
                    'ORDER_NO' => $order_no,
                    'ORDER_TYPE' => $order_type,
                    'MEMBER_CARD_ID' => $member_card_id,
                    'MEMBER_CARD_NO' => $member_card_no,
                    'MEMBER_CARD_TYPE_ID' => $member_card_type_id,
                    'MEMBER_NAME' => $member_name,
                    'CASH_PAY' => $cash_pay,
                    'UNION_PAY' => $union_pay,
                    'GIFT_PAY' => $gift_pay,
                    'ARREARS_PAY' => $arrears_pay,
                    'ORDER_STATUS' => $order_status,
                    'INS_DATE' => get_system_time(),
                    'INS_USER' => I('session.admin')['admin_id'],
                    'UPD_DATE' => get_system_time(),
                    'UPD_USER' => I('session.admin')['admin_id'],
                    'DEL_FLG' => '0'
                );
                
                $order = new OrderModel('order');
                
                $order_id = $order ->orderAdd($order_data);
                
                if ($order_id){
                    
                    //开卡账单项目添加
                    $order_charge_item_data = array(
                        'ORDER_ID' => $order_id,
                        'MEMBER_CARD_TYPE_ID' => $member_card_type_id,
                        'MEMBER_CARD_DISCOUNT' => $member_card_discount,
                        'CHARGE_AMOUNG' => $cash_pay + $union_pay,
                        'GIFT_AMOUNG' => $gift_pay,
                        'INS_DATE' => get_system_time(),
                        'INS_USER' => I('session.admin')['admin_id'],
                        'UPD_DATE' => get_system_time(),
                        'UPD_USER' => I('session.admin')['admin_id'],
                        'DEL_FLG' => '0'
                    );
                    
                    $order_item = new OrderItemChargeModel('order_item_charge');
                    
                    $order_item_charge_id = $order_item ->orderItemChargeAdd($order_charge_item_data);
                    
                    if ($result <> false){
                        
                        //开卡员工信息追加
                        $order_item_charge_employee = new OrderItemChargeEmplopyee('order_item_charge_employee');
                        
                        for ($i = 0 ; $i<count($employee_id);$i++){
                            $order_item_charge_employee_data = array(
                                'ORDER_ID' => $order_id,
                                'ORDER_ITEM_CHARGE_ID' => $order_item_charge_id,
                                'EMPLOYEE_ID' => $employee_id[$i],
                                'EMPLOYEE_POSITION_ID' => $employee_position_id[$i],
                                'ORDER_ITEM_CHARGE_RESULT' => $order_result[$i],
                                'ORDER_ITEM_CHARGE_COMMISION' => $order_commision[$i],
                                'INS_DATE' => get_system_time(),
                                'INS_USER' => I('session.admin')['admin_id'],
                                'UPD_DATE' => get_system_time(),
                                'UPD_USER' => I('session.admin')['admin_id'],
                                'DEL_FLG' => '0'
                            );
                            
                            $result = $order_item_charge_employee ->orderItemChargeEmplopyeeAdd($order_item_charge_employee_data);
                            
                            if ($result == false){
                                break;
                            }
                        }
                        
                        if ($result !== false){
                            return $this->ajaxReturn(array('result' =>true,'message'=>'添加成功!'),'JSON');
                        }else{
                            return $this->ajaxReturn(array('result' =>false,'message'=>'添加失败!'),'JSON');
                        }
                        
                    }
                    
                }else{
                    return $this->ajaxReturn(array('result' =>false,'message'=>'添加失败!'),'JSON');
                }
            }else {
                return $this->ajaxReturn(array('result' =>false,'message'=>'添加失败!'),'JSON');
            }
        }else{
            return $this->ajaxReturn(array('result' =>false,'message'=>'添加失败!'),'JSON');
        }
    }
    
    public function toMemberCardTypeAdd(){
        $this->display('member:cardTypeAdd');
    }
    
    public function memberCardTypeAdd() {
        
        $membar_card_type_name = '';
        
        $is_lock = '';
        
        $service_discount= 0;
        
        $course_discount=0;
        
        $comment = '';
        
        if (I('post.member_card_type_name') <> ''){
            $membar_card_type_name = I('post.member_card_type_name');
        }
        
        if (I('post.is_lock') <> ''){
            $is_lock = I('post.is_lock');
        }
        
        if (I('post.service_discount') <> ''){
            $service_discount = I('post.service_discount');
        }
        
        if (I('post.course_discount') <> ''){
            $course_discount = I('post.course_discount');
        }
        
        if (I('post.comment') <> ''){
            $comment = I('post.comment');
        }
        
        $member_card_type_data = array(
            'MEMBER_CARD_TYPE_NAME'  =>$membar_card_type_name,
            'IS_LOCK' => $is_lock,
            'SERVICE_DISCOUNT' => $service_discount,
            'COURSE_DISCOUNT' =>$course_discount,
            'COMMENT' =>$comment,
            'INS_DATE' => get_system_time(),
            'INS_USER' => I('session.admin')['admin_id'],
            'UPD_DATE' => get_system_time(),
            'UPD_USER' => I('session.admin')['admin_id'],
            'DEL_FLG' => '0'
        );
        
        $member_card_type = new MemberCardTypeModel('member_card_type');
        
        $result = $member_card_type->memberCardTypeAdd($member_card_type_data);
        
        if ($result <> false){
            $this->system_log_write(C('SYSTEM_LOG_TYPE_LIST.MEMBER_TYPE_CARD_ADD') , message_replace(C('SYSTEM_LOG_CONTENT_LIST.MEMBER_TYPE_CARD_ADD'),$membar_card_type_name));
            return $this->ajaxReturn(array('result' => true,'message' => '添加成功!'),'JSON');
        }else{
            return $this->ajaxReturn(array('result' => false,'message' => '添加失败!'),'JSON');
        }
        
    }
    
    public function memberCardTypeList() {
        
        $member_card_type = new MemberCardTypeModel('member_card_type');
        
        $page_count = 20;
        $page = '';
        
        $member_card_type_count = $member_card_type->get_member_card_type_count();
        
        if (I('get.page')<> ''){
            $this->page_init($member_card_type_count,$page_count,I('get.page'));
            $page = I('get.page').','.$page_count;
        }else{
            $this->page_init($member_card_type_count,$page_count,1);
            $page = '1,'.$page_count;
        }
        
        $page_content = $this->page_display();
        
        $member_card_type_list = $member_card_type->memberCardTypeList($page);
        
        $this ->assign('page_content',$page_content);
        $this ->assign('memberCardTypeCount',$member_card_type_count);
        $this ->assign('memberCardTypeList',$member_card_type_list);
        
        $this->display('member:cardTypeList');
    }
    
    public function toMemberCardTypeUpdate(){
        
        $member_card_type_id = '';
        
        if (I('get.member_card_type_id')<> ''){
            $member_card_type_id = I('get.member_card_type_id');
        }
        
        $member_card_type_where = 'MEMBER_CARD_TYPE_ID = '.$member_card_type_id;
        
        $member_card_type = new MemberCardTypeModel('member_card_type');
        
        $obj_member_card_type = $member_card_type ->memberCardTypeFind($member_card_type_where);
        
        $this->assign('objMemberCardType',$obj_member_card_type);
        
        $this->display('member:cardTypeUpdate');
    }
    
    public function memberCardTypeUpdate(){
        
        $member_card_type_id = '';
        
        $membar_card_type_name = '';
        
        $is_lock = '';
        
        $service_discount= 0;
        
        $course_discount=0;
        
        $comment = '';
        
        if (I('post.member_card_type_id')<> ''){
            $member_card_type_id = I('post.member_card_type_id');
        }
        
        if (I('post.member_card_type_name') <> ''){
            $membar_card_type_name = I('post.member_card_type_name');
        }
        
        if (I('post.is_lock') <> ''){
            $is_lock = I('post.is_lock');
        }
        
        if (I('post.service_discount') <> ''){
            $service_discount = I('post.service_discount');
        }
        
        if (I('post.course_discount') <> ''){
            $course_discount = I('post.course_discount');
        }
        
        if (I('post.comment') <> ''){
            $comment = I('post.comment');
        }
        
        $member_card_type_data = array(
            'MEMBER_CARD_TYPE_NAME'  =>$membar_card_type_name,
            'IS_LOCK' => $is_lock,
            'SERVICE_DISCOUNT' => $service_discount,
            'COURSE_DISCOUNT' =>$course_discount,
            'COMMENT' =>$comment,
            'INS_DATE' => get_system_time(),
            'INS_USER' => I('session.admin')['admin_id'],
            'UPD_DATE' => get_system_time(),
            'UPD_USER' => I('session.admin')['admin_id'],
            'DEL_FLG' => '0'
        );
        
        $member_card_type_where = 'MEMBER_CARD_TYPE_ID = '.$member_card_type_id;
        
        $member_card_type = new MemberCardTypeModel('member_card_type');
        
        $result = $member_card_type->memberCardTypeUpdate($member_card_type_where,$member_card_type_data);
        
        if ($result <> false){
            
            $this->system_log_write(C('SYSTEM_LOG_TYPE_LIST.MEMBER_TYPE_CARD_UPD') , message_replace(C('SYSTEM_LOG_CONTENT_LIST.MEMBER_TYPE_CARD_UPD'),$membar_card_type_name));
            return $this->ajaxReturn(array('result' => true,'message' => '更新成功!'),'JSON');
        }else{
            return $this->ajaxReturn(array('result' => false,'message' => '更新失败!'),'JSON');
        }
    }
    
    public function memberCardTypeDelete(){
        $member_card_type_id = '';
        
        $member_card_type_name = '';
        
        if (I('get.member_card_type_id')<> ''){
            $member_card_type_id = I('get.member_card_type_id');
        }
        
        if (I('get.member_card_type_name')<> ''){
            $member_card_type_name = I('get.member_card_type_name');
        }
        
        $member_card_type_data = array(
            'UPD_DATE' => get_system_time(),
            'UPD_USER' => I('session.admin')['admin_id'],
            'DEL_FLG' => '1'
        );
        
        $member_card_type_where = 'MEMBER_CARD_TYPE_ID = '.$member_card_type_id;
        
        $member_card_type = new MemberCardTypeModel('member_card_type');
        
        $result = $member_card_type->memberCardTypeUpdate($member_card_type_where,$member_card_type_data);
        
        if ($result <> false){
            $this->system_log_write(C('SYSTEM_LOG_TYPE_LIST.MEMBER_TYPE_CARD_DEL') , message_replace(C('SYSTEM_LOG_CONTENT_LIST.MEMBER_TYPE_CARD_DEL'),$member_card_type_name));
            return $this->ajaxReturn(array('result' => true,'message' => '删除成功!'),'JSON');
        }else{
            return $this->ajaxReturn(array('result' => false,'message' => '删除失败!'),'JSON');
        }
    }
    
    public function memberCardTypeCommisionList(){
        
        //员工职位信息
        $employee_position_big = new EmployeePositionBigModel('employee_position_big');
        
        $employee_position_big_list = $employee_position_big ->employeePositionBigList();
        
        $this->assign('employeePositionBigList',$employee_position_big_list);
        
        //员工二级职位
        /*
        $employee_position = new EmployeePositionModel('employee_position');
        
        $employee_position_list = $employee_position ->employeePositionList();
        
        $this->assign('employeePositionList',$employee_position_list);
        */
        
        //会员卡类型信息
        $member_card_type = new MemberCardTypeModel('member_card_type');
    
        $member_card_type_list = $member_card_type->memberCardTypeList();
    
        $this ->assign('memberCardTypeList',$member_card_type_list);
        
        //会员卡类型提成信息
        $member_card_type_commision = new MemberCardCommissionModel('member_card_commission');
        
        $member_card_type_commision_list = $member_card_type_commision ->memberCardCommissionList();
        
        $this->assign('memberCardTypeCommisionList',$member_card_type_commision_list);
    
        $this->display('member:memberCardTypeCommisionList');
    }
    
    public function memberCardTypeCommisionProcess(){
        
        $employee_position_big_id = '';
        
        $member_card_type_id = '';
        
        $open_type = '';
        
        $open_discount = '';
        
        $open_amount = '';
        
        $charge_type = '';
        
        $charge_discount = '';
        
        $charge_amount = '';
        
        if (I('post.employee_position_big_id')<> ''){
            $employee_position_big_id = I('post.employee_position_big_id');
        }
        
        if (I('post.member_card_type_id')<> ''){
            $member_card_type_id = I('post.member_card_type_id');
        }
        
        if (I('post.open_type')<> ''){
            $open_type = I('post.open_type');
        }
        
        if (I('post.open_discount')<> ''){
            $open_discount = I('post.open_discount');
        }
        
        if (I('post.open_amount')<> ''){
            $open_amount = I('post.open_amount');
        }
        
        if (I('post.charge_type')<> ''){
            $charge_type = I('post.charge_type');
        }
        
        if (I('post.charge_discount')<> ''){
            $charge_discount = I('post.charge_discount');
        }
        
        if (I('post.charge_amount')<> ''){
            $charge_amount = I('post.charge_amount');
        }
        
        $member_card_type_commision = new MemberCardCommissionModel('member_card_commission');
        
        $member_card_type_commision_where = 'DEL_FLG = "0" AND MEMBER_CARD_TYPE_ID = '.$member_card_type_id.' AND EMPLOYEE_POSITION_BIG_ID = '.$employee_position_big_id;
        
        $result = false;
        if (count($member_card_type_commision->memberCardCommissionFind($member_card_type_commision_where))>0) {
            $member_card_type_commision_data = array(
                'OPEN_DISCOUNT' => $open_discount,
                'OPEN_AMOUNT' => $open_amount,
                'CHARGE_DISCOUNT' => $charge_discount,
                'CHARGE_AMOUNT' => $charge_amount,
                'OPEN_TYPE' => $open_type,
                'CHARGE_TYPE' => $charge_type,
                'UPD_DATE' => get_system_time(),
                'UPD_USER' => I('session.admin')['admin_id']
            );
            
            $result = $member_card_type_commision->memberCardCommissionUpdate($member_card_type_commision_where, $member_card_type_commision_data);
        }else{
            $member_card_type_commision_data = array(
                'EMPLOYEE_POSITION_BIG_ID' => $employee_position_big_id,
                'MEMBER_CARD_TYPE_ID' => $member_card_type_id,
                'OPEN_DISCOUNT' => $open_discount,
                'OPEN_AMOUNT' => $open_amount,
                'CHARGE_DISCOUNT' => $charge_discount,
                'CHARGE_AMOUNT' => $charge_amount,
                'OPEN_TYPE' => $open_type,
                'CHARGE_TYPE' => $charge_type,
                'INS_DATE' => get_system_time(),
                'INS_USER' => I('session.admin')['admin_id'],
                'UPD_DATE' => get_system_time(),
                'UPD_USER' => I('session.admin')['admin_id'],
                'DEL_FLG' => '0'
            );
            
            $result = $member_card_type_commision->memberCardCommissionAdd($member_card_type_commision_data);
        }
        
        if ($result <> false){
            return $this->ajaxReturn(array('result' => true,'message' => '操作成功!'),'JSON');
        }else{
            return $this->ajaxReturn(array('result' => false,'message' => '操作失败!'),'JSON');
        }
    }
}

?>