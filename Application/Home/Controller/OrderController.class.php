<?php
namespace Home\Controller;

use Home\Controller\BaseAction;

use Home\Model\OrderModel;
use Home\Model\OrderItemChargeModel;
use Home\Model\OrderItemChargeEmplopyee;
use Home\Model\OrderItemServiceModel;
use Home\Model\OrderItemServiceEmployeeModel;
use Home\Model\OrderItemCourseModel;
use Home\Model\OrderItemCourseEmployeeModel;

class OrderController extends BaseAction
{
    public function orderServiceAdd(){
        
        //订单基本信息
        $order_no = get_no();
        
        $order_type = '1';
        
        $member_card_id = '';
        
        $member_card_no = '';
        
        $member_name = '';
        
        $pay_amoung = 0;
        
        $card_pay = 0;
        
        $cash_pay = 0;
        
        $union_pay = 0;
        
        $gift_pay = 0;
        
        $vouchers_pay = 0;
        
        $free_pay = 0;
        
        $arrears_pay = 0;
        
        $real_result = 0;
        
        $vouchers_id = '';
        
        $member_tel = '';
        
        $member_sex = '';
        
        $real_pay_amount = 0;
        
        $change_pay_amount = 0;
        
        $order_comment = '';
        
        $order_status = '';
        
        //订单服务项目信息
        $category_id = '';
        
        $category_name = '';
        
        $service_id = '';
        
        $service_name = '';
        
        $service_price = 0;
        
        $service_result = 0;
        
        //值取得
        if (I('post.order_type') <> ''){
            $order_type = I('post.order_type');
        }
        
        if (I('post.member_card_id')<> ''){
            $member_card_id = I('post.member_card_id');
        }
        
        if (I('post.member_card_no')<> ''){
            $member_card_no = I('post.member_card_no');
        }
        
        if (I('post.member_name')<> ''){
            $member_name = I('post.member_name');
        }
        
        if ($member_name == ''){
            $member_name = I('post.guest_name');
        }
        
        if (I('post.pay_amoung')<> ''){
            $pay_amoung = I('post.pay_amoung');
        }
        
        if (I('post.card_pay')<> ''){
            $card_pay = I('post.card_pay');
        }
        
        if (I('post.cash_pay')<> ''){
            $cash_pay = I('post.cash_pay');
        }
        
        if (I('post.union_pay')<> ''){
            $union_pay = I('post.union_pay');
        }
        
        if (I('post.gift_pay')<> ''){
            $gift_pay = I('post.gift_pay');
        }
        
        if (I('post.vouchers_pay')<> ''){
            $vouchers_pay = I('post.vouchers_pay');
        }
        
        if (I('post.free_pay')<> ''){
            $free_pay = I('post.free_pay');
        }
        
        if (I('post.arrears_pay')<> ''){
            $arrears_pay = I('post.arrears_pay');
        }
        
        if (I('post.real_result')<> ''){
            $real_result = I('post.real_result');
        }
        
        if (I('post.vochers_id')<> ''){
            $vouchers_id = I('post.vochers_id');
        }
        
        if (I('post.guest_tel')<> ''){
            $member_tel = I('post.guest_tel');
        }
        
        if (I('post.guest_sex')<> ''){
            $member_sex = I('post.guest_sex');
        }
        
        if (I('post.real_pay_amount')<> ''){
            $real_pay_amount = I('post.real_pay_amount');
        }
        
        if (I('post.change_pay_amount')<> ''){
            $change_pay_amount = I('post.change_pay_amount');
        }
        
        if (I('post.order_comment')<> ''){
            $order_comment = I('post.order_comment');
        }
        
        if (I('post.order_status')<> ''){
            $order_status = I('post.order_status');
        }
        
        if (I('post.category_id')<> ''){
            $category_id = I('post.category_id');
        }
        
        if (I('post.category_name')<> ''){
            $category_name = I('post.category_name');
        }
        
        if (I('post.service_id')<> ''){
            $service_id = I('post.service_id');
        }
        
        if (I('post.service_name')<> ''){
            $service_name = I('post.service_name');
        }
        
        if (I('post.service_price')<> ''){
            $service_price = I('post.service_price');
        }
        
        if (I('post.service_result')<> ''){
            $service_result = I('post.service_result');
        }
        
        //服务订单处理
        $order = new OrderModel('order');
        
        $order_data = array(
            'ORDER_NO' => $order_no,
            'ORDER_TYPE' => $order_type,
            'MEMBER_CARD_ID' => $member_card_id,
            'MEMBER_CARD_NO' => $member_card_no,
            'MEMBER_NAME' => $member_name,
            'PAY_AMOUNG' => $pay_amoung,
            'CARD_PAY' => $card_pay,
            'CASH_PAY' => $cash_pay,
            'UNION_PAY' => $union_pay,
            'GIFT_PAY' => $gift_pay,
            'VOUCHERS_PAY' => $vouchers_pay,
            'FREE_PAY' => $free_pay,
            'ARREARS_PAY' => $arrears_pay,
            'REAL_RESULT' => $real_result,
            'VOUCHERS_ID' => $vouchers_id,
            'REAL_PAY_AMOUNT' => $real_pay_amount,
            'CHANGE_PAY_AMOUNT' => $change_pay_amount,
            'ORDER_COMMENT' => $order_comment,
            'MEMBER_SEX' => $member_sex,
            'MEMBER_TEL' => $member_tel,
            'ORDER_STATUS' => $order_status,
            'INS_DATE' => get_system_time(),
            'INS_USER' => I('session.admin')['admin_id'],
            'UPD_DATE' => get_system_time(),
            'UPD_USER' => I('session.admin')['admin_id'],
            'DEL_FLG' => '0'
        );
        
        $order_id = $order ->orderAdd($order_data);
        
        if ($order_id <> false){
            //服务订单项目处理
            
            $service_item = new OrderItemServiceModel('order_item_service');
            
            for ($i = 0; $i<count($service_id);$i++){
                
                $service_item_data = array(
                    'ORDER_ID' => $order_id,
                    'CATEGORY_ID' => $category_id[$i],
                    'CATEGORY_NAME' => $category_name[$i],
                    'SERVICE_ID' => $service_id[$i],
                    'SERVICE_NAME' => $service_name[$i],
                    'SERVICE_SELL_PRICE' => $service_price[$i],
                    'SERVICE_RESULT' => $service_result[$i],
                    'INS_DATE' => get_system_time(),
                    'INS_USER' => I('session.admin')['admin_id'],
                    'UPD_DATE' => get_system_time(),
                    'UPD_USER' => I('session.admin')['admin_id'],
                    'DEL_FLG' => '0'
                );
                
                $order_service_id = $service_item ->orderItemServiceAdd($service_item_data);
                
                if ($order_service_id<>false){
                    
                    //订单服务项目员工信息
                    $employee_id_service = '';
                    
                    $employee_position_id_service = '';
                    
                    $order_result_service = 0;
                    
                    if (I('post.employee_id_service'.$i) <> ''){
                        $employee_id_service = I('post.employee_id_service'.$i);
                    }
                    
                    if (I('post.employee_position_id_service'.$i) <> ''){
                        $employee_position_id_service = I('post.employee_position_id_service'.$i);
                    }
                    
                    if (I('post.order_result_service'.$i) <> ''){
                        $order_result_service = I('post.order_result_service'.$i);
                    }
                    
                    $ary_employee_id_service = explode(',', $employee_id_service);
                    
                    $ary_employee_position_id_service = explode(',', $employee_position_id_service);
                    
                    $ary_order_result_service = explode(',', $order_result_service);
                    
                    $employee_service = new OrderItemServiceEmployeeModel('order_item_service_employee');
                    
                    for ($j = 0;$j<count($ary_employee_id_service);$j++){
                        
                        $employee_service_data = array(
                            'ORDER_ID' => $order_id,
                            'ORDER_ITEM_SERVICE_ID' => $order_service_id,
                            'EMPLOYEE_ID' => $ary_employee_id_service[$j],
                            'EMPLOYEE_POSITION_ID' => $ary_employee_position_id_service[$j],
                            'ORDER_ITEM_SERVICE_RESULT' => $ary_order_result_service[$j],
                            'INS_DATE' => get_system_time(),
                            'INS_USER' => I('session.admin')['admin_id'],
                            'UPD_DATE' => get_system_time(),
                            'UPD_USER' => I('session.admin')['admin_id'],
                            'DEL_FLG' => '0'
                        );
                        
                        $result = $employee_service->orderItemServiceEmployeeAdd($employee_service_data);
                        
                        if ($result == false){
                            break;
                        }
                    }
                    
                }
                
                if ($result == false){
                    break;
                }
            }
            
            if ($result <> false){
                return $this->ajaxReturn(array('result'=>true,'message' => '结算成功'),'JSON');
            }else{
                return $this->ajaxReturn(array('result'=>false,'message' => '结算失败'),'JSON');
            }
        }else {
            return $this->ajaxReturn(array('result'=>false,'message' => '结算失败'),'JSON');
        }
    }

    public function orderCourseAdd() {
        //订单基本信息
        $order_no = get_no();
        
        $order_type = '2';
        
        $member_card_id = '';
        
        $member_card_no = '';
        
        $member_name = '';
        
        $pay_amoung = 0;
        
        $card_pay = 0;
        
        $cash_pay = 0;
        
        $union_pay = 0;
        
        $gift_pay = 0;
        
        $vouchers_pay = 0;
        
        $free_pay = 0;
        
        $arrears_pay = 0;
        
        $real_result = 0;
        
        $vouchers_id = '';
        
        $real_pay_amount = 0;
        
        $change_pay_amount = 0;
        
        $order_comment = '';
        
        $order_status = '';
        
        //套餐项目信息
        $course_id = '';
        
        $course_name = '';
        
        $course_sell_price = 0;
        
        $course_price = 0;
        
        $course_result = 0;
        
        //值取得
        if (I('post.order_type') <> ''){
            $order_type = I('post.order_type');
        }
        
        if (I('post.member_card_id')<> ''){
            $member_card_id = I('post.member_card_id');
        }
        
        if (I('post.member_card_no')<> ''){
            $member_card_no = I('post.member_card_no');
        }
        
        if (I('post.member_name')<> ''){
            $member_name = I('post.member_name');
        }
        
        if (I('post.pay_amoung')<> ''){
            $pay_amoung = I('post.pay_amoung');
        }
        
        if (I('post.card_pay')<> ''){
            $card_pay = I('post.card_pay');
        }
        
        if (I('post.cash_pay')<> ''){
            $cash_pay = I('post.cash_pay');
        }
        
        if (I('post.union_pay')<> ''){
            $union_pay = I('post.union_pay');
        }
        
        if (I('post.gift_pay')<> ''){
            $gift_pay = I('post.gift_pay');
        }
        
        if (I('post.vouchers_pay')<> ''){
            $vouchers_pay = I('post.vouchers_pay');
        }
        
        if (I('post.free_pay')<> ''){
            $free_pay = I('post.free_pay');
        }
        
        if (I('post.arrears_pay')<> ''){
            $arrears_pay = I('post.arrears_pay');
        }
        
        if (I('post.real_result')<> ''){
            $real_result = I('post.real_result');
        }
        
        if (I('post.vouchers_id')<> ''){
            $vouchers_id = I('post.vouchers_id');
        }
        
        if (I('post.real_pay_amount')<> ''){
            $real_pay_amount = I('post.real_pay_amount');
        }
        
        if (I('post.change_pay_amount')<> ''){
            $change_pay_amount = I('post.change_pay_amount');
        }
        
        if (I('post.order_comment')<> ''){
            $order_comment = I('post.order_comment');
        }
        
        if (I('post.order_status')<> ''){
            $order_status = I('post.order_status');
        }
        
        if (I('post.course_id')<> ''){
            $course_id = I('post.course_id');
        }
        
        if (I('post.course_name')<> ''){
            $course_name = I('post.course_name');
        }
        
        if (I('post.sell_price')<> ''){
            $course_sell_price = I('post.sell_price');
        }
        
        if (I('post.course_price')<> ''){
            $course_price = I('post.course_price');
        }
        
        if (I('post.course_result')<> ''){
            $course_result = I('post.course_result');
        }
        
        //套餐订单处理
        $order = new OrderModel('order');
        
        $order_data = array(
            'ORDER_NO' => $order_no,
            'ORDER_TYPE' => $order_type,
            'MEMBER_CARD_ID' => $member_card_id,
            'MEMBER_CARD_NO' => $member_card_no,
            'MEMBER_NAME' => $member_name,
            'PAY_AMOUNG' => $pay_amoung,
            'CARD_PAY' => $card_pay,
            'CASH_PAY' => $cash_pay,
            'UNION_PAY' => $union_pay,
            'GIFT_PAY' => $gift_pay,
            'VOUCHERS_PAY' => $vouchers_pay,
            'FREE_PAY' => $free_pay,
            'ARREARS_PAY' => $arrears_pay,
            'REAL_RESULT' => $real_result,
            'VOUCHERS_ID' => $vouchers_id,
            'REAL_PAY_AMOUNT' => $real_pay_amount,
            'CHANGE_PAY_AMOUNT' => $change_pay_amount,
            'ORDER_COMMENT' => $order_comment,
            'ORDER_STATUS' => $order_status,
            'INS_DATE' => get_system_time(),
            'INS_USER' => I('session.admin')['admin_id'],
            'UPD_DATE' => get_system_time(),
            'UPD_USER' => I('session.admin')['admin_id'],
            'DEL_FLG' => '0'
        );
        
        $order_id = $order ->orderAdd($order_data);
        
        if ($order_id <> false){
            //服务订单项目处理
            
            $course_item = new OrderItemCourseModel('order_item_course');
            
            for ($i = 0; $i<count($course_id);$i++){
                
                $course_item_data = array(
                    'ORDER_ID' => $order_id,
                    'COURSE_ID' => $course_id[$i],
                    'COURSE_NAME' => $course_name[$i],
                    'COURSE_PRICE' => $course_sell_price[$i],
                    'COURSE_SELL_PRICE' => $course_price[$i],
                    'COURSE_RESULT' => $course_result[$i],
                    'INS_DATE' => get_system_time(),
                    'INS_USER' => I('session.admin')['admin_id'],
                    'UPD_DATE' => get_system_time(),
                    'UPD_USER' => I('session.admin')['admin_id'],
                    'DEL_FLG' => '0'
                );
                
                $order_course_id = $course_item ->orderItemCourseAdd($course_item_data);
                
                if ($order_course_id<>false){
                    
                    //套餐员工信息
                    $employee_id_course = '';
                    
                    $employee_position_id_course = '';
                    
                    $order_result_course = 0;
                    
                    $order_commision_course = 0;
                    
                    if (I('post.employee_id_course'.$i) <> ''){
                        $employee_id_course = I('post.employee_id_course'.$i);
                    }
                    
                    if (I('post.employee_position_id_course'.$i) <> ''){
                        $employee_position_id_course = I('post.employee_position_id_course'.$i);
                    }
                    
                    if (I('post.order_result_course'.$i) <> ''){
                        $order_result_course = I('post.order_result_course'.$i);
                    }
                    
                    if (I('post.order_commision_course'.$i) <> ''){
                        $order_commision_course = I('post.order_commision_course'.$i);
                    }
                    
                    $ary_employee_id_course = explode(',', $employee_id_course);
                    
                    $ary_employee_position_id_course = explode(',', $employee_position_id_course);
                    
                    $ary_order_result_course = explode(',', $order_result_course);
                    
                    $ary_order_commision_course = explode(',', $order_commision_course);
                    
                    $employee_course = new OrderItemCourseEmployeeModel('order_item_course_employee');
                    
                    for ($j = 0;$j<count($ary_employee_id_course);$j++){
                        
                        $employee_course_data = array(
                            'ORDER_ID' => $order_id,
                            'ORDER_ITEM_COURSE_ID' => $order_course_id,
                            'EMPLOYEE_ID' => $ary_employee_id_course[$j],
                            'EMPLOYEE_POSITION_ID' => $ary_employee_position_id_course[$j],
                            'ORDER_ITEM_SERVICE_RESULT' => $ary_order_result_course[$j],
                            'ORDER_ITEM_COURSE_COMMISION' => $ary_order_commision_course[$j],
                            'INS_DATE' => get_system_time(),
                            'INS_USER' => I('session.admin')['admin_id'],
                            'UPD_DATE' => get_system_time(),
                            'UPD_USER' => I('session.admin')['admin_id'],
                            'DEL_FLG' => '0'
                        );
                        
                        $result = $employee_course->orderItemCourseEmployeeAdd($employee_course_data);
                        
                        if ($result == false){
                            break;
                        }
                    }
                    
                }
                
                if ($result == false){
                    break;
                }
            }
            
            if ($result <> false){
                return $this->ajaxReturn(array('result'=>true,'message' => '结算成功'),'JSON');
            }else{
                return $this->ajaxReturn(array('result'=>false,'message' => '结算失败'),'JSON');
            }
        }else {
            return $this->ajaxReturn(array('result'=>false,'message' => '结算失败'),'JSON');
        }
        
    }
    
    public function orderChargeAdd(){
        //订单基本信息
        $order_no = get_no();
        
        $order_type = '2';
        
        $member_card_id = '';
        
        $member_card_no = '';
        
        $member_name = '';
        
        $pay_amoung = 0;
        
        $card_pay = 0;
        
        $cash_pay = 0;
        
        $union_pay = 0;
        
        $gift_pay = 0;
        
        $vouchers_pay = 0;
        
        $free_pay = 0;
        
        $arrears_pay = 0;
        
        $real_result = 0;
        
        $vouchers_id = '';
        
        $real_pay_amount = 0;
        
        $change_pay_amount = 0;
        
        $order_comment = '';
        
        $order_status = '';
        
        //充值项目信息
        $member_card_type_id = '';
        
        $member_card_type_name = '';
        
        $member_card_discount = 0;
        
        $charge_money = 0;
        
        $gift_money = 0;
        
        //充值员工信息
        $employee_id_charge = '';
        
        $employee_position_id_charge = '';
        
        $order_result_charge = 0;
        
        $order_commision_charge = 0;
        
        
        //值取得
        if (I('post.order_type') <> ''){
            $order_type = I('post.order_type');
        }
        
        if (I('post.member_card_id')<> ''){
            $member_card_id = I('post.member_card_id');
        }
        
        if (I('post.member_card_no')<> ''){
            $member_card_no = I('post.member_card_no');
        }
        
        if (I('post.member_name')<> ''){
            $member_name = I('post.member_name');
        }
        
        if (I('post.pay_amoung')<> ''){
            $pay_amoung = I('post.pay_amoung');
        }
        
        if (I('post.card_pay')<> ''){
            $card_pay = I('post.card_pay');
        }
        
        if (I('post.cash_pay')<> ''){
            $cash_pay = I('post.cash_pay');
        }
        
        if (I('post.union_pay')<> ''){
            $union_pay = I('post.union_pay');
        }
        
        if (I('post.gift_pay')<> ''){
            $gift_pay = I('post.gift_pay');
        }
        
        if (I('post.vouchers_pay')<> ''){
            $vouchers_pay = I('post.vouchers_pay');
        }
        
        if (I('post.free_pay')<> ''){
            $free_pay = I('post.free_pay');
        }
        
        if (I('post.arrears_pay')<> ''){
            $arrears_pay = I('post.arrears_pay');
        }
        
        if (I('post.real_result')<> ''){
            $real_result = I('post.real_result');
        }
        
        if (I('post.vouchers_id')<> ''){
            $vouchers_id = I('post.vouchers_id');
        }
        
        if (I('post.real_pay_amount')<> ''){
            $real_pay_amount = I('post.real_pay_amount');
        }
        
        if (I('post.change_pay_amount')<> ''){
            $change_pay_amount = I('post.change_pay_amount');
        }
        
        if (I('post.order_comment')<> ''){
            $order_comment = I('post.order_comment');
        }
        
        if (I('post.order_status')<> ''){
            $order_status = I('post.order_status');
        }
        
        if (I('post.member_card_type_id')<> ''){
            $member_card_type_id = I('post.member_card_type_id');
        }
        
        if (I('post.member_card_type_name')<> ''){
            $member_card_type_name = I('post.member_card_type_name');
        }
        
        if (I('post.member_card_discount')<> ''){
            $member_card_discount = I('post.member_card_discount');
        }
        
        if (I('post.charge_money')<> ''){
            $charge_money = I('post.charge_money');
        }
        
        if (I('post.gift_money')<> ''){
            $gift_money = I('post.gift_money');
        }
        
        if (I('post.employee_id_charge')<> ''){
            $employee_id_charge = I('post.employee_id_charge');
        }
        
        if (I('post.order_result_charge')<> ''){
            $order_result_charge = I('post.order_result_charge');
        }
        
        if (I('post.order_commision_charge')<> ''){
            $order_commision_charge = I('post.order_commision_charge');
        }
        
        //套餐订单处理
        $order = new OrderModel('order');
        
        $order_data = array(
            'ORDER_NO' => $order_no,
            'ORDER_TYPE' => $order_type,
            'MEMBER_CARD_ID' => $member_card_id,
            'MEMBER_CARD_NO' => $member_card_no,
            'MEMBER_NAME' => $member_name,
            'PAY_AMOUNG' => $pay_amoung,
            'CARD_PAY' => $card_pay,
            'CASH_PAY' => $cash_pay,
            'UNION_PAY' => $union_pay,
            'GIFT_PAY' => $gift_pay,
            'VOUCHERS_PAY' => $vouchers_pay,
            'FREE_PAY' => $free_pay,
            'ARREARS_PAY' => $arrears_pay,
            'REAL_RESULT' => $real_result,
            'VOUCHERS_ID' => $vouchers_id,
            'REAL_PAY_AMOUNT' => $real_pay_amount,
            'CHANGE_PAY_AMOUNT' => $change_pay_amount,
            'ORDER_COMMENT' => $order_comment,
            'ORDER_STATUS' => $order_status,
            'INS_DATE' => get_system_time(),
            'INS_USER' => I('session.admin')['admin_id'],
            'UPD_DATE' => get_system_time(),
            'UPD_USER' => I('session.admin')['admin_id'],
            'DEL_FLG' => '0'
        );
        
        $order_id = $order ->orderAdd($order_data);
        
        if ($order_id <> false){
            //服务订单项目处理
            
            $order_charge_item_data = array(
                'ORDER_ID' => $order_id,
                'MEMBER_CARD_TYPE_ID' => $member_card_type_id,
                'MEMBER_CARD_TYPE_NAME' => $member_card_type_name,
                'MEMBER_CARD_DISCOUNT' => $member_card_discount,
                'CHARGE_AMOUNG' => $charge_money,
                'GIFT_AMOUNG' => $gift_money,
                'INS_DATE' => get_system_time(),
                'INS_USER' => I('session.admin')['admin_id'],
                'UPD_DATE' => get_system_time(),
                'UPD_USER' => I('session.admin')['admin_id'],
                'DEL_FLG' => '0'
            );
            
            $order_item = new OrderItemChargeModel('order_item_charge');
            
            $order_item_charge_id = $order_item ->orderItemChargeAdd($order_charge_item_data);
            
            if ($order_item_charge_id <> false){
                
                $order_item_charge_employee = new OrderItemChargeEmplopyee('order_item_charge_employee');
                
                for ($i = 0; $i<count($employee_id_charge);$i++){
                    $order_item_charge_employee_data = array(
                        'ORDER_ID' => $order_id,
                        'ORDER_ITEM_CHARGE_ID' => $order_item_charge_id,
                        'EMPLOYEE_ID' => $employee_id_charge[$i],
                        'EMPLOYEE_POSITION_ID' => $employee_position_id_charge[$i],
                        'ORDER_ITEM_CHARGE_RESULT' => $order_result_charge[$i],
                        'ORDER_ITEM_CHARGE_COMMISION' => $order_commision_charge[$i],
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
                
                if ($result <> false){
                    return $this->ajaxReturn(array('result'=>true,'message' => '结算成功'),'JSON');
                }else {
                    return $this->ajaxReturn(array('result'=>false,'message' => '结算失败'),'JSON');
                }
            }else{
                return $this->ajaxReturn(array('result'=>false,'message' => '结算失败'),'JSON');
            }
            
            
        }else {
            return $this->ajaxReturn(array('result'=>false,'message' => '结算失败'),'JSON');
        }
        
    }
    
    public function orderPendingList(){
        
        //订单信息
        $order = new OrderModel('order');
        
        $order_where = 'order.ORDER_STATUS = "0"';
        $order_list = $order->orderSelect($order_where);
        
        $this -> assign('orderList',$order_list);
        
        //充值订单明细
        $order_item_charge = new OrderItemChargeModel('order_item_charge');
        
        $order_item_charge_list = $order_item_charge->orderItemChargeList();
        
        $this->assign('orderItemChargeList',$order_item_charge_list);
        
        //充值订单员工明细
        $order_item_charge_employee = new OrderItemChargeEmplopyee('order_item_charge_employee');
        
        $order_item_charge_employee_list = $order_item_charge_employee->orderItemChargeEmplopyeeList();
        
        $this->assign('orderItemChargeEmployeeList',$order_item_charge_employee_list);
        
        //订购套餐明细
        $order_item_course = new OrderItemCourseModel('order_item_course');
        
        $order_item_course_list = $order_item_course->orderItemCourseList();
        
        $this->assign('orderItemCourseList',$order_item_course_list);
        
        //订购套餐员工明细
        $order_item_course_employee = new OrderItemCourseEmployeeModel('order_item_course_employee');
        
        $order_item_course_employee_list = $order_item_charge_employee->orderItemChargeEmplopyeeList();
        
        $this->assign('orderItemCourseEmployeeList',$order_item_course_employee_list);
        
        //服务项目明细
        $order_item_service = new OrderItemServiceModel('order_item_service');
        
        $order_item_service_list = $order_item_service ->orderItemServiceList();
        
        $this->assign('orderItemServiceList',$order_item_service_list);
        
        //服务项目员工明细
        $order_item_service_employee = new OrderItemServiceEmployeeModel('order_item_service_employee');
        
        $order_item_service_employee_list = $order_item_service_employee->orderItemServiceEmployeeList();
        
        $this->assign('orderItemServiceEmployeeList',$order_item_service_employee_list);
        
        $this ->display('order:orderPendingList');
    }

    public function orderServiceList() {
        
        $order = new OrderModel('order');
        
        $order_where = 'order.ORDER_STATUS = "2" AND order.ORDER_TYPE = "1"';
        
        $order_list = $order->orderSelect($order_where);
        
        $this->assign('orderList',$order_list);
        
        $order_item_service = new OrderItemServiceModel('order_item_service');
        
        $order_item_service_list = $order_item_service->orderItemServiceList();
        
        $this->assign('orderItemServiceList',$order_item_service_list);
        
        $order_item_service_employee = new OrderItemServiceEmployeeModel('order_item_service_employee');
        
        $order_item_service_employee_list = $order_item_service_employee->orderItemServiceEmployeeList();
        
        $this->assign('orderItemServiceEmployeeList',$order_item_service_employee_list);
        
        $this->display('order:orderServiceList');
        
    }
    
    public function orderCourseList(){
        $order = new OrderModel('order');
        
        $order_where = 'order.ORDER_STATUS = "2" AND order.ORDER_TYPE = "2"';
        
        $order_list = $order->orderSelect($order_where);
        
        $this->assign('orderList',$order_list);
        
        $order_item_course = new OrderItemCourseModel('order_item_course');
        
        $order_item_course_list = $order_item_course->orderItemCourseList();
        
        $this->assign('orderItemCourseList',$order_item_course_list);
        
        $order_item_course_employee = new OrderItemCourseEmployeeModel('order_item_course_employee');
        
        $order_item_course_employee_list = $order_item_course_employee -> orderItemCourseEmployeeList();
        
        $this->assign('orderItemCourseEmployeeList',$order_item_course_employee_list);
        
        $this->display('order:orderCourseList');
    }
    
    public function orderChargeList(){
        $order = new OrderModel('order');
        
        $order_where = 'order.ORDER_STATUS = "2" AND order.ORDER_TYPE = "3"';
        
        $order_list = $order->orderSelect($order_where);
        
        $this->assign('orderList',$order_list);
        
        $order_item_charge = new OrderItemChargeModel('order_item_charge');
        
        $order_item_charge_list = $order_item_charge->orderItemChargeList();
        
        $this->assign('orderItemChargeList',$order_item_charge_list);
        
        $order_item_charge_employee = new OrderItemChargeEmplopyee('order_item_charge_employee');
        
        $order_item_charge_employee_list = $order_item_charge_employee->orderItemChargeEmplopyeeList();
        
        $this->display('order:orderChargeList');
    }

    public function orderTodayAllList(){
        //订单信息
        $order = new OrderModel('order');
        
        $order_where = 'order.ORDER_STATUS = "2" AND  DATE_FORMAT(order.INS_DATE,"%y-%m-%d") = DATE_FORMAT(now(),"%y-%m-%d")';
        $order_list = $order->orderSelect($order_where);
        
        $this -> assign('orderList',$order_list);
        
        //充值订单明细
        $order_item_charge = new OrderItemChargeModel('order_item_charge');
        
        $order_item_charge_list = $order_item_charge->orderItemChargeList();
        
        $this->assign('orderItemChargeList',$order_item_charge_list);
        
        //充值订单员工明细
        $order_item_charge_employee = new OrderItemChargeEmplopyee('order_item_charge_employee');
        
        $order_item_charge_employee_list = $order_item_charge_employee->orderItemChargeEmplopyeeList();
        
        $this->assign('orderItemChargeEmployeeList',$order_item_charge_employee_list);
        
        //订购套餐明细
        $order_item_course = new OrderItemCourseModel('order_item_course');
        
        $order_item_course_list = $order_item_course->orderItemCourseList();
        
        $this->assign('orderItemCourseList',$order_item_course_list);
        
        //订购套餐员工明细
        $order_item_course_employee = new OrderItemCourseEmployeeModel('order_item_course_employee');
        
        $order_item_course_employee_list = $order_item_charge_employee->orderItemChargeEmplopyeeList();
        
        $this->assign('orderItemCourseEmployeeList',$order_item_course_employee_list);
        
        //服务项目明细
        $order_item_service = new OrderItemServiceModel('order_item_service');
        
        $order_item_service_list = $order_item_service ->orderItemServiceList();
        
        $this->assign('orderItemServiceList',$order_item_service_list);
        
        //服务项目员工明细
        $order_item_service_employee = new OrderItemServiceEmployeeModel('order_item_service_employee');
        
        $order_item_service_employee_list = $order_item_service_employee->orderItemServiceEmployeeList();
        
        $this->assign('orderItemServiceEmployeeList',$order_item_service_employee_list);
        
        $this ->display('order:orderTodayAllList');
    }
}

?>