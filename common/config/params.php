<?php
return [
    'adminEmail' => 'admin@example.com',
    'supportEmail' => 'support@example.com',
    'user.passwordResetTokenExpire' => 3600,
    "BANNER_TYPE"=>[
        1=>"电脑端",
        2=>"手机端",
    ],
    "RESERVATION_STATUS"=>[
        1=>"已处理",
        2=>"未处理",
    ],
//    预约状态
    "reservation_status"=>[
        1=>"已处理",
        2=>"未处理",
    ],
    "HOSPITAL_TYPE"=>[
        0=>"不详",
        1=>"一级",
        2=>"二级",
        3=>"三级",
    ],
    'SEX'=>[
        '1'=>'男',
        '2'=>'女',
    ],
    
//    医生申请加盟处理状态
    "DOCTOR_STATUS"=>[
        '0'=>'待审核',
        '1'=>'审核通过',
        '2'=>'不通过',
    ],
    
    //医生是否展示在首页
    "show_index"=>[
        '1'=>'显示',
        '0'=>'不显示',
    ],
    "DEPARTMENT_TYPE"=>[
        1=>"顶级",
        2=>"二级",
       // 3=>"三级",
    ],
    /*医生级别*/
    'DOCTOR_LEVEL'=>[
        1=>'主任医生',
        2=>'副主任医生',
        3=>"主治医生",
    ],
    //心联后台地址
    "XINLIAN_BACK"=>"http://xinlian.com/",
];
