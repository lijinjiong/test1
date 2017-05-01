<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/5/1/001
 * Time: 17:17
 */

namespace api\controllers;


use common\models\Visit;
use yii\base\UserException;

class VisitController extends ControllerBase
{
    public function actionAdd(){
        $ip=\Yii::$app->request->get("ip");
        $platform=\Yii::$app->request->get("platform");
        if(empty($ip)||empty($platform)){
            throw new UserException("IP或平台不能为空");
        }
        $result=Visit::add($ip,$platform);
        return $result?["code"=>1,"message"=>"统计成功"]:["code"=>0,"message"=>"统计失败"];
    }
}