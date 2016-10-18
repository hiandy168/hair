<?php
namespace Home\Model;

use Home\Model\BaseModel;

class ServiceModel extends BaseModel
{
    public function serviceAdd($data){
        return $this->add($data);
    }
    
    public function serviceList($page = '' , $where = '' , $field = '' , $join = '') {
        
        $where_data = 'service.DEL_FLG = "0"';
        
        if ($where <> ''){
            $where_data = $where_data.' AND '.$where;
        }
        
        $field_data = array(
                        'service.SERVICE_ID' => 'SERVICE_ID',
                        'service.SERVICE_NAME' => 'SERVICE_NAME',
                        'service_category.CATEGORY_ID' => 'CATEGORY_ID',
                        'service_category.CATEGORY_NAME' => 'CATEGORY_NAME',
                        'service_type.TYPE_ID' => 'TYPE_ID',
                        'service_type.TYPE_NAME' => 'TYPE_NAME',
                        'service.SERVICE_PRICE' => 'SERVICE_PRICE',
                        'service.HAND_PRICE' => 'HAND_PRICE'
                    );
        
        if ($field <> ''){
            $field_data = $field;
        }
        
        $join_data = array(
                        'LEFT JOIN service_category ON service_category.CATEGORY_ID = service.CATEGORY_ID AND service_category.DEL_FLG = "0"',
                        'LEFT JOIN service_type ON service_type.TYPE_ID = service.TYPE_ID AND service_type.DEL_FLG = "0"'
                    );
        
        if ($join <> ''){
            $join_data = $join;
        }
        
        return $this->where($where_data)
                    ->join($join_data)
                    ->field($field)
                    ->page($page)
                    ->select();
    }
    
    public function serviceUpdate($where,$data) {
        return $this->where($where)->save($data);
    }
    
    public function serviceDelete($where) {
        return $this ->where($where)->delete();
    }
    
    public function serviceFind($where){
        return $this->where($where)
                    ->join(array(
                        'LEFT JOIN service_category ON service_category.CATEGORY_ID = service.CATEGORY_ID AND service_category.DEL_FLG = "0"',
                        'LEFT JOIN service_type ON service_type.TYPE_ID = service.TYPE_ID AND service_type.DEL_FLG = "0"'
                    ))
                    ->field(array(
                        'service.SERVICE_ID' => 'SERVICE_ID',
                        'service.SERVICE_NAME' => 'SERVICE_NAME',
                        'service_category.CATEGORY_ID' => 'CATEGORY_ID',
                        'service_category.CATEGORY_NAME' => 'CATEGORY_NAME',
                        'service_type.TYPE_ID' => 'TYPE_ID',
                        'service_type.TYPE_NAME' => 'TYPE_NAME',
                        'service.SERVICE_PRICE' => 'SERVICE_PRICE',
                        'service.HAND_PRICE' => 'HAND_PRICE'
                    ))
                    ->find();
    }
    
    public function serviceSelect($where){
        return $this->where($where)
                    ->join(array(
                        'LEFT JOIN service_category ON service_category.CATEGORY_ID = service.CATEGORY_ID AND service_category.DEL_FLG = "0"',
                        'LEFT JOIN service_type ON service_type.TYPE_ID = service.TYPE_ID AND service_type.DEL_FLG = "0"'
                    ))
                    ->field(array(
                        'service.SERVICE_ID' => 'SERVICE_ID',
                        'service.SERVICE_NAME' => 'SERVICE_NAME',
                        'service_category.CATEGORY_ID' => 'CATEGORY_ID',
                        'service_category.CATEGORY_NAME' => 'CATEGORY_NAME',
                        'service_type.TYPE_ID' => 'TYPE_ID',
                        'service_type.TYPE_NAME' => 'TYPE_NAME',
                        'service.SERVICE_PRICE' => 'SERVICE_PRICE',
                        'service.HAND_PRICE' => 'HAND_PRICE'
                    ))
                    ->select();
    }
    
    public function get_service_count(){
        $service_data = $this->where('service.DEL_FLG = "0"')
                    ->join(array(
                        'LEFT JOIN service_category ON service_category.CATEGORY_ID = service.CATEGORY_ID AND service_category.DEL_FLG = "0"',
                        'LEFT JOIN service_type ON service_type.TYPE_ID = service.TYPE_ID AND service_type.DEL_FLG = "0"'
                    ))
                    ->field(array(
                        'service.SERVICE_ID' => 'SERVICE_ID',
                        'service.SERVICE_NAME' => 'SERVICE_NAME',
                        'service_category.CATEGORY_ID' => 'CATEGORY_ID',
                        'service_category.CATEGORY_NAME' => 'CATEGORY_NAME',
                        'service_type.TYPE_ID' => 'TYPE_ID',
                        'service_type.TYPE_NAME' => 'TYPE_NAME',
                        'service.SERVICE_PRICE' => 'SERVICE_PRICE',
                        'service.HAND_PRICE' => 'HAND_PRICE'
                    ))
                    ->select();
        
        return count($service_data);
    }
}

?>