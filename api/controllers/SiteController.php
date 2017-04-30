<?php
namespace api\controllers;



use common\models\Department;

class SiteController extends ControllerBase {

/*测试专用*/
    public function actionIndex(){


     return array_keys(Department::find()->select("id")->indexBy("id")->asArray()->all());
    }
}