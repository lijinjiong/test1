<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/4/30/030
 * Time: 10:59
 */

namespace api\controllers;
use api\models\Doctor;
use Yii;

class DoctorController extends ControllerBase
{

    public function actionIndex(){

        $search_name=Yii::$app->request->get("search_name","");
        $filter=Doctor::dealSearch($search_name);
        $data=Doctor::findIndexDoctor($filter);
        return [
            "code"=>1,
            "message"=>"",
            "data"=>$data
        ];
    }
}