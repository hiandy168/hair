<?php
namespace Home\Controller;

use Home\Controller\BaseAction;
use Home\Model\ShopModel;
use Home\Model\ProvincesModel;
use Home\Model\CityModel;
use Home\Model\AreaModel;
use Think\Upload;

class ShopController extends BaseAction
{
    public function shopList(){
        
        $shop = new ShopModel('shop');
        
        $shop_list = $shop->shopList();
        
        $this->assign('shopList',$shop_list);
        
        $this ->display('shop:shopList');
    }
    
    public function toShopAdd(){
        
        $provinces = new ProvincesModel('provinces');
        
        $provinces_list = $provinces ->provincesList();
        
        $city = new CityModel('city');
        
        $city_list = $city ->cityList();
        
        $area = new AreaModel('area');
        
        $area_list = $area ->areaList();
        
        
        $this->assign('provincesList',$provinces_list);
        $this->assign('cityList',$city_list);
        $this->assign('areaList',$area_list);
        $this->display('shop:shopAdd');
    }
    
    public function shopAdd() {
        $shop_name = '';
        
        $shop_boss_name = '';
        
        $shop_boss_tel = '';
        
        $province_id = '';
        
        $city_id = '';
        
        $area_id = '';
        
        $contact_adr='';
        
        $shop_description = '';
        
        $shop_img='';
        
        if (I('post.shop_name') <> ''){
            $shop_name = I('post.shop_name');
        }
        
        if (I('post.shop_boss_name') <> ''){
            $shop_boss_name = I('post.shop_boss_name');
        }
        
        if (I('post.shop_boss_tel') <> ''){
            $shop_boss_tel = I('post.$shop_boss_tel');
        }
        
        if (I('post.province_id') <> ''){
            $province_id = I('post.province_id');
        }
        
        if (I('post.city_id') <> ''){
            $city_id = I('post.city_id');
        }
        
        if (I('post.area_id') <> ''){
            $area_id = I('post.area_id');
        }
        
        if (I('post.contact_adr') <> ''){
            $contact_adr = I('post.contact_adr');
        }
        
        if (I('post.shop_description') <> ''){
            $shop_description = I('post.shop_description');
        }
        
        import('ORG.Net.UploadFile');
        
        $upload = new Upload();
        
        $upload->savePath =  C('UPLOAD_BASE_DIR');
        
        $file_infor = $upload->upload();
        if (!$file_infor) {
            $this->error('文件上传失败');
            exit();
        }else{
            $shop_img = $file_infor['savename'];
        }
        
        $shop_data = array(
            'SHOP_NAME' => $shop_name,
            'SHOP_BOSS_NAME' => $shop_boss_name,
            'SHOP_BOSS_TEL' => $shop_boss_tel,
            'PROVINCEID' => $province_id,
            'CITYID' => $city_id,
            'AREAID' => $area_id,
            'CONTACT_ADR' =>$contact_adr,
            'SHOP_DESCRIPTION' =>$shop_description,
            'SHOP_IMG' =>$shop_img,
            'INS_DATE' => get_system_time(),
            'INS_USER' => I('session.admin')['admin_id'],
            'UPD_DATE' => get_system_time(),
            'UPD_USER' => I('session.admin')['admin_id'],
            'DEL_FLG' => '0'
        );
        
        $shop = new ShopModel('shop');
        
        $result = $shop->shopAdd($shop_data);
        
        if ($result <> false){
            return $this->ajaxReturn(array('result' => true,'message' => '添加成功!'),'JSON');
        }else{
            return $this->ajaxReturn(array('result' => false,'message' => '添加失败!'),'JSON');
        }
    }
    
    public function toShopUpdate(){
        
        $shop_id = '';
        
        if (I('get.shop_id') <> '') {
            $shop_id = I('get.shop_id'); 
        }
        
        $shop = new ShopModel('shop');
        
        $shop_where = 'SHOP_ID = '.$shop_id;
        
        $obj_shop = $shop->shopFind($shop_where);
        
        $provinces = new ProvincesModel('provinces');
        
        $provinces_list = $provinces ->provincesList();
        
        $city = new CityModel('city');
        
        $city_list = $city ->cityList();
        
        $area = new AreaModel('area');
        
        $area_list = $area ->areaList();
        
        $this->assign('objShop',$obj_shop);
        $this->assign('provincesList',$provinces_list);
        $this->assign('cityList',$city_list);
        $this->assign('areaList',$area_list);
        $this->display('shop:shopUpdate');
    }
    
    public function shopUpdate(){
        
        $shop_id = '';
        
        $shop_name = '';
        
        $shop_boss_name = '';
        
        $shop_boss_tel = '';
        
        $province_id = '';
        
        $city_id = '';
        
        $area_id = '';
        
        $contact_adr='';
        
        $shop_description = '';
        
        $shop_img='';
        
        if (I('post.shop_id') <> ''){
            $shop_id = I('post.shop_id');
        }
        
        if (I('post.shop_name') <> ''){
            $shop_name = I('post.shop_name');
        }
        
        if (I('post.shop_boss_name') <> ''){
            $shop_boss_name = I('post.shop_boss_name');
        }
        
        if (I('post.shop_boss_tel') <> ''){
            $shop_boss_tel = I('post.$shop_boss_tel');
        }
        
        if (I('post.province_id') <> ''){
            $province_id = I('post.province_id');
        }
        
        if (I('post.city_id') <> ''){
            $city_id = I('post.city_id');
        }
        
        if (I('post.area_id') <> ''){
            $area_id = I('post.area_id');
        }
        
        if (I('post.contact_adr') <> ''){
            $contact_adr = I('post.contact_adr');
        }
        
        if (I('post.shop_description') <> ''){
            $shop_description = I('post.shop_description');
        }
        
        import('ORG.Net.UploadFile');
        
        $upload = new Upload();
        
        $upload->savePath =  C('UPLOAD_BASE_DIR');
        
        $file_infor = $upload->upload();
        if (!$file_infor) {
            $this->error('文件上传失败');
            exit();
        }else{
            $shop_img = $file_infor['savename'];
        }
        
        $shop_data = array(
            'SHOP_NAME' => $shop_name,
            'SHOP_BOSS_NAME' => $shop_boss_name,
            'SHOP_BOSS_TEL' => $shop_boss_tel,
            'PROVINCEID' => $province_id,
            'CITYID' => $city_id,
            'AREAID' => $area_id,
            'CONTACT_ADR' =>$contact_adr,
            'SHOP_DESCRIPTION' =>$shop_description,
            'SHOP_IMG' =>$shop_img,
            'INS_DATE' => get_system_time(),
            'INS_USER' => I('session.admin')['admin_id'],
            'UPD_DATE' => get_system_time(),
            'UPD_USER' => I('session.admin')['admin_id'],
            'DEL_FLG' => '0'
        );
        
        $shop_where = 'SHOP_ID = '.$shop_id;
        
        $shop = new ShopModel('shop');
        
        $result = $shop->shopUpdate($shop_where, $shop_data);
        
        if ($result <> false){
            return $this->ajaxReturn(array('result' => true,'message' => '修改成功!'),'JSON');
        }else{
            return $this->ajaxReturn(array('result' => false,'message' => '修改失败!'),'JSON');
        }
    }
    
    public function shopDelete(){
        $shop_id = '';
        
        if (I('get.shop_id') <> '') {
            $shop_id = I('get.shop_id');
        }
        
        $shop = new ShopModel('shop');
        
        $shop_where = 'SHOP_ID = '.$shop_id;
        
        $shop_data = array(
            'UPD_DATE' => get_system_time(),
            'UPD_USER' => I('session.admin')['admin_id'],
            'DEL_FLG' => '1'
        );
        
        $result = $shop->shopUpdate($shop_where, $shop_data);
        
        if ($result <> false){
            return $this->ajaxReturn(array('result' => true,'message' => '删除成功!'),'JSON');
        }else{
            return $this->ajaxReturn(array('result' => false,'message' => '删除失败!'),'JSON');
        }
        
    }
}

?>