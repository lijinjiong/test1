<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/4/30/030
 * Time: 16:23
 */

namespace api\controllers;


use common\models\Hospital;
use common\models\HospitalRegion;

class HospitalController extends ControllerBase
{

    /*获取筛选的地区*/
    public function actionGetHospitalRegion(){
        $data=HospitalRegion::getCityRegion();
        return [
            "code"=>1,
            "message"=>"",
            "data"=>$data,
        ];
    }

    /*根据city_id获取医院*/
    public function actionGetHospital(){
        $city_id=\Yii::$app->request->get("city_id",0);
        $data=Hospital::find()->where(["region_id"=>$city_id])->select("id,name")->asArray()->all();
        return [
            "code"=>1,
            "message"=>"",
            "data"=>$data,
        ];
    }
}