<?php
namespace api\controllers;



use common\models\Department;

class SiteController extends ControllerBase {

/*测试专用*/
    public function actionIndex(){


     return  [0=>"最高级"]+\common\models\Department::find()->where(["parent_id"=>0])->andWhere(["!=","id",3])->indexBy("id")->select("dep_name,id")->column();
    }
}