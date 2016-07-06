<?php
namespace Home\Controller;

use Home\Controller\BaseAction;

use Think\Model;

class ReportController extends BaseAction
{
    public function serviceReport(){
        
        $model = new Model();
        $sql = '';
        $sql =  $sql . ' SELECT';
        $sql =  $sql . '	`order_item_service`.CATEGORY_NAME AS CATEGORY_NAME,';
        $sql =  $sql . '    `order_item_service`.SERVICE_NAME AS SERVICE_NAME,';
        $sql =  $sql . '    SUM(`order`.REAL_RESULT) AS REAL_RESULT,';
        $sql =  $sql . '    SUM(';
        $sql =  $sql . '		CASE WHEN `order`.MEMBER_CARD_ID = "" THEN 1 ELSE 0 END';
        $sql =  $sql . '    ) AS PERSONAL_COUNT,';
        $sql =  $sql . '    SUM(';
        $sql =  $sql . '		CASE WHEN `order`.MEMBER_CARD_ID = "" THEN 0 ELSE 1 END';
        $sql =  $sql . '    ) AS MEMBER_COUNT,';
        $sql =  $sql . '    SUM(`order`.ORDER_ID) AS TOTAL_CUSTOMER,';
        $sql =  $sql . '    `order_item_service`.SERVICE_SELL_PRICE';
        $sql =  $sql . ' FROM `order` ';
        $sql =  $sql . ' INNER JOIN order_item_service ';
        $sql =  $sql . ' ON `order`.ORDER_ID = order_item_service.ORDER_ID ';
        $sql =  $sql . ' AND order_item_service.DEL_FLG = "0"';
        $sql =  $sql . ' GROUP BY order_item_service.SERVICE_ID';
        
        $report_data = $model->query($sql);
        
        $this->assign('report_data',$report_data);
        
        $this->display('report:reportServiceList');
    }
    
    public function serviceReportData() {
        $model = new Model();
        
        $sql = '';
        $sql =  $sql . ' SELECT';
        $sql =  $sql . '    `order_item_service`.SERVICE_NAME AS SERVICE_NAME,';
        $sql =  $sql . '    SUM(`order`.REAL_RESULT) AS REAL_RESULT';
        $sql =  $sql . ' FROM `order` ';
        $sql =  $sql . ' INNER JOIN order_item_service ';
        $sql =  $sql . ' ON `order`.ORDER_ID = order_item_service.ORDER_ID ';
        $sql =  $sql . ' AND order_item_service.DEL_FLG = "0"';
        $sql =  $sql . ' GROUP BY order_item_service.SERVICE_ID';
        
        $report_data = $model->query($sql);
        
        return $this->ajaxReturn($report_data,'JSON');
        
    }
    
    public function courseReport(){
    
        $model = new Model();
        $sql = '';
        $sql =  $sql . ' SELECT	';
        $sql =  $sql . '	`order_item_course`.COURSE_NAME AS COURSE_NAME,   ';
        $sql =  $sql . '    SUM(`order_item_course`.ORDER_ITEM_COURSE_ID) AS TOTAL_SELL_COUNT,  ';
        $sql =  $sql . '    SUM(`order_item_course`.ORDER_ITEM_COURSE_ID) AS TOTAL_CUSTOMER,    ';
        $sql =  $sql . '    `order_item_course`.COURSE_RESULT ';
        $sql =  $sql . ' FROM `order`  ';
        $sql =  $sql . ' INNER JOIN `order_item_course`  ';
        $sql =  $sql . ' ON `order`.ORDER_ID = `order_item_course`.ORDER_ID  AND `order_item_course`.DEL_FLG = "0" ';
        $sql =  $sql . ' GROUP BY `order_item_course`.COURSE_ID;';
        
        $report_data = $model->query($sql);
    
        $this->assign('report_data',$report_data);
    
        $this->display('report:reportCourseList');
    }
    
    public function courseReportData() {
        $model = new Model();
    
        $sql = '';
        $sql =  $sql . ' SELECT	';
        $sql =  $sql . '	`order_item_course`.COURSE_NAME AS COURSE_NAME,   ';
        $sql =  $sql . '    `order_item_course`.COURSE_RESULT ';
        $sql =  $sql . ' FROM `order`  ';
        $sql =  $sql . ' INNER JOIN `order_item_course`  ';
        $sql =  $sql . ' ON `order`.ORDER_ID = `order_item_course`.ORDER_ID  AND `order_item_course`.DEL_FLG = "0" ';
        $sql =  $sql . ' GROUP BY `order_item_course`.COURSE_ID;';
    
        $report_data = $model->query($sql);
    
        return $this->ajaxReturn($report_data,'JSON');
    
    }
    
    public function chargeReport(){
        
        $sql = '';
        $sql =  $sql . ' SELECT';
        $sql =  $sql . ' `order_item_charge`.MEMBER_CARD_TYPE_NAME AS MEMBER_CARD_TYPE_NAME,';
        $sql =  $sql . ' SUM(`order_item_charge`.CHARGE_AMOUNG) AS CHARGE_AMOUNG,';
        $sql =  $sql . ' SUM(`order_item_charge`.ORDER_ITEM_CHARGE_ID) AS TOTAL_COUNT,';
        $sql =  $sql . ' SUM(CASE WHEN `order_item_charge`.ORDER_ITEM_CHARGE_TYPE = "0" THEN `order_item_charge`.CHARGE_AMOUNG ELSE 0 END) AS TOTAL_OPEN_AMOUNT,';
        $sql =  $sql . ' SUM(CASE WHEN `order_item_charge`.ORDER_ITEM_CHARGE_TYPE = "0" THEN `order_item_charge`.ORDER_ITEM_CHARGE_ID ELSE 0 END) AS TOTAL_OPEN_COUNT,';
        $sql =  $sql . ' SUM(CASE WHEN `order_item_charge`.ORDER_ITEM_CHARGE_TYPE = "1" THEN `order_item_charge`.CHARGE_AMOUNG ELSE 0 END) AS TOTAL_CHARGE_AMOUNT,';
        $sql =  $sql . ' SUM(CASE WHEN `order_item_charge`.ORDER_ITEM_CHARGE_TYPE = "1" THEN `order_item_charge`.ORDER_ITEM_CHARGE_ID ELSE 0 END) AS TOTAL_CHARGE_COUNT';
        $sql =  $sql . ' FROM `order`';
        $sql =  $sql . ' INNER JOIN `order_item_charge`';
        $sql =  $sql . ' ON `order`.ORDER_ID = `order_item_charge`.ORDER_ID  AND `order_item_charge`.DEL_FLG = "0"';
        $sql =  $sql . ' GROUP BY `order_item_charge`.MEMBER_CARD_TYPE_ID';
        
        $model = new Model();
        
        $report_data = $model->query($sql);
        
        $this->assign('report_data',$report_data);
        
        $this->display('report:reportChargeList');
    }
    
    public function chargeReportData(){
    
        $sql = '';
        $sql =  $sql . ' SELECT';
        $sql =  $sql . ' `order_item_charge`.MEMBER_CARD_TYPE_ID AS MEMBER_CARD_TYPE_ID,';
        $sql =  $sql . ' SUM(`order_item_charge`.CHARGE_AMOUNG) AS CHARGE_AMOUNG';
        $sql =  $sql . ' FROM `order`';
        $sql =  $sql . ' INNER JOIN `order_item_charge`';
        $sql =  $sql . ' ON `order`.ORDER_ID = `order_item_charge`.ORDER_ID  AND `order_item_charge`.DEL_FLG = "0"';
        $sql =  $sql . ' GROUP BY `order_item_charge`.MEMBER_CARD_TYPE_ID';
    
        $model = new Model();
    
        $report_data = $model->query($sql);
    
        $this->assign('report_data',$report_data);
    
        return $this->ajaxReturn($report_data,'JSON');
    }
}

?>