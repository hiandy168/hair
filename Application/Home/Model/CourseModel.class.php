<?php
namespace Home\Model;

use Home\Model\BaseModel;

class CourseModel extends BaseModel
{
    public function courseAdd($data){
        return $this->add($data);
    }
    
    public function courseList() {
        return $this->where('course.DEL_FLG = "0"')
        ->join(array(
            'LEFT JOIN course_category ON course_category.CATEGORY_ID = course.CATEGORY_ID AND course_category.DEL_FLG = "0"'
        ))
        ->field(array(
            'course.COURSE_ID' => 'COURSE_ID',
            'course.COURSE_NAME' => 'COURSE_NAME',
            'course_category.CATEGORY_ID' => 'CATEGORY_ID',
            'course_category.CATEGORY_NAME' => 'CATEGORY_NAME',
            'course.COURSE_PRICE' => 'COURSE_PRICE',
            'course.COURSE_VALUE' => 'COURSE_VALUE',
            'course.COURSE_STATUS' => 'COURSE_STATUS'
        ))
        ->select();
    }
    
    public function courseUpdate($where,$data) {
        return $this->where($where)->save($data);
    }
    
    public function courseDelete($where) {
        return $this ->where($where)->delete();
    }
    
    public function courseFind($where){
        return $this->where($where)
        ->join(array(
            'LEFT JOIN course_category ON course_category.CATEGORY_ID = course.CATEGORY_ID AND course_category.DEL_FLG = "0"'
        ))
        ->field(array(
            'course.COURSE_ID' => 'COURSE_ID',
            'course.COURSE_NAME' => 'COURSE_NAME',
            'course.COURSE_NO' => 'COURSE_NO',
            'course.SELL_PRICE' => 'SELL_PRICE',
            'course.MARKET_PRICE' => 'MARKET_PRICE',
            'course.RESULT_DISCOUNT_SETTING' => 'RESULT_DISCOUNT_SETTING',
            'course.RESULT_AMOUNG_SETTING' => 'RESULT_AMOUNG_SETTING',
            'course_category.CATEGORY_ID' => 'CATEGORY_ID',
            'course_category.CATEGORY_NAME' => 'CATEGORY_NAME'
        ))
        ->find();
    }
    
    public function courseSelect($where){
        return $this->where($where)
        ->join(array(
            'LEFT JOIN course_category ON course_category.CATEGORY_ID = course.CATEGORY_ID AND course_category.DEL_FLG = "0"'
        ))
        ->field(array(
            'course.COURSE_ID' => 'COURSE_ID',
            'course.COURSE_NAME' => 'COURSE_NAME',
            'course.COURSE_NO' => 'COURSE_NO',
            'course.SELL_PRICE' => 'SELL_PRICE',
            'course.MARKET_PRICE' => 'MARKET_PRICE',
            'course.RESULT_DISCOUNT_SETTING' => 'RESULT_DISCOUNT_SETTING',
            'course.RESULT_AMOUNG_SETTING' => 'RESULT_AMOUNG_SETTING',
            'course_category.CATEGORY_ID' => 'CATEGORY_ID',
            'course_category.CATEGORY_NAME' => 'CATEGORY_NAME'
        ))
        ->select();
    }
}

?>