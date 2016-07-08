<?php
return array(
    'MODULE_ALLOW_LIST' => array (
        'Home'
    ),
    'BIND_MODULE' => 'Home',
    'WEB_RES_ROOT' => '/hair/Public',
    'ACTION_BASE_DIR' => '/hair/index.php/Home',
    'UPLOAD_BASE_DIR' => '/hair/Uploads/',
    'COMMON_INCLUDE_BASE_DIR' => 'Application/Home/View/common',
    'URL_CASE_INSENSITIVE'  => true,
    'DB_TYPE'   => 'mysql', 
    'DB_USER'   => 'root', 
    'DB_PWD'    => 'root', 
    'DB_DSN'    => 'mysql:host=localhost;dbname=hair;charset=UTF8',
    'DATE_DEFAULT_TIMEZONE' => 'Asia/Tokyo',
    'SYSTEM_LOG_TYPE_LIST' => array(
        'LOGIN' => '管理员登录',
        'LOGOUT' => '管理员退出',
        'ADMIN_ADD' => '管理员添加',
        'ADMIN_BASE_UPD' => '管理员基本信息更新',
        'ADMIN_PASSWORD_UPD' => '管理员密码更新',
        'ADMIN_POWER_UPD' => '管理员权限更新',
        'ADMIN_DEL' => '管理员删除',
        'EMPLOYEE_ADD' => '员工信息添加',
        'EMPLOYEE_LIST_ADD' => '员工信息批量添加',
        'EMPLOYEE_UPD' => '员工信息修改',
        'EMPLOYEE_DEL' => '员工信息删除',
        'EMPLOYEE_POSITION_ADD' => '员工职位信息添加',
        'EMPLOYEE_POSITION_UPD' => '员工职位信息修改',
        'EMPLOYEE_POSITION_DEL' => '员工职位信息删除',
    ),
    'SYSTEM_LOG_CONTENT_LIST' => array(
        'LOGIN' => '管理员%1登录',
        'LOGOUT' => '管理员%1退出',
        'ADMIN_ADD' => '管理员%1添加',
        'ADMIN_BASE_UPD' => '管理员%1基本信息更新',
        'ADMIN_PASSWORD_UPD' => '管理员%1密码更新',
        'ADMIN_POWER_UPD' => '管理员%1权限更新',
        'ADMIN_DEL' => '管理员%1删除',
        'EMPLOYEE_ADD' => '员工%1信息添加',
        'EMPLOYEE_LIST_ADD' => '员工信息%1批量添加',
        'EMPLOYEE_UPD' => '员工%1信息修改',
        'EMPLOYEE_DEL' => '员工%1信息删除',
        'EMPLOYEE_POSITION_ADD' => '员工职位%1信息添加',
        'EMPLOYEE_POSITION_UPD' => '员工职位%1信息修改',
        'EMPLOYEE_POSITION_DEL' => '员工职位%1信息删除',
    )
);

?>