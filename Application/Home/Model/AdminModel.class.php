<?php
namespace Home\Model;

class AdminModel extends BaseModel
{
    public function adminLogin($admin_name ,$admin_password){
        
        $admin = $this->where('ADMIN_NAME = "'.$admin_name . '" and ADMIN_PASSWORD = "'.md5($admin_password).'"') ->find();
        if ($admin){
            
            $_SESSION['admin'] = $admin;
            
            return array(
                'result' => true,
                'message' => '登录成功'
            );
            
            
        }else{
            return array(
                'result' => false,
                'message' => '用户名或者密码错误!'
            );
        }
    }
    
    public function adminAdd($data){
        return $this->add($data);
    }
    
    public function adminList() {
        return $this->where('DEL_FLG = "0"')
        ->select();
    }
    
    public function adminUpdate($where,$data) {
        return $this->where($where)->save($data);
    }
    
    public function adminDelete($where) {
        return $this ->where($where)->delete();
    }
    
    public function adminFind($where){
        return $this->where($where)->find();
    }
    
    public function adminSelect($where){
        return $this->where($where)->select();
    }
}

?>