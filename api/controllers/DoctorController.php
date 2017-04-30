<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/4/30/030
 * Time: 10:59
 */

namespace api\controllers;
use api\models\Doctor;
use api\models\DoctorForm;
use Yii;

class DoctorController extends ControllerBase
{

    public function actionIndex(){
        $data=Doctor::findIndexDoctor();
        return [
            "code"=>1,
            "message"=>"",
            "data"=>$data
        ];
    }

    public function actionAddDoctor(){
        $doctor=new DoctorForm();
        $result=$doctor->addDoctor(Yii::$app->request->post(),$_FILES);
        return $result?["code"=>1,"message"=>"加盟成功"]:["code"=>0,"message"=>"加盟失败"];
    }

    public function actionDoctorList(){
        $search=Yii::$app->request->get("search_name","");
        $filter['search_name']=Doctor::dealSearch($search);
        $filter['department_id']=Yii::$app->request->get("department_id","");
        $filter['city']=Yii::$app->request->get("city","");
        $filter['hospital_id']=Yii::$app->request->get("hospital_id","");
        $filter['level']=Yii::$app->request->get("level","");
        $start=Yii::$app->request->get("start",1);
        $limit=Yii::$app->request->get("limit",12);
        $data=Doctor::doctorList($filter,$start,$limit);
        return [
            "code"=>1,
            "message"=>"",
            "data"=>$data["data"],
            "count"=>$data["count"]
        ];
    }
    public function actionDetail(){
        $id=Yii::$app->request->get("id",0);
        $data=Doctor::detail($id);
        $data["code"]=1;
        $data["message"]="";
        return $data;
    }
}