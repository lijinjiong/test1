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
use common\models\Department;
use common\models\HospitalRegion;
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
        $search=Yii::$app->request->post("search_name","");
        $filter['search_name']=Doctor::dealSearch($search);
        $filter['department_id']=Yii::$app->request->post("department_id","");
        $filter['city']=Yii::$app->request->post("city","");
        $filter['hospital_id']=Yii::$app->request->post("hospital_id","");
        $filter['level']=Yii::$app->request->post("level","");
        $start=Yii::$app->request->post("start",1);
        $limit=Yii::$app->request->post("limit",12);
        $data=Doctor::doctorList($filter,$start,$limit);
        return [
            "code"=>1,
            "message"=>"",
            "data"=>$data["data"],
            "count"=>$data["count"],

        ];
    }
    public function actionDetail(){
        $id=Yii::$app->request->get("id",0);
        $data=Doctor::detail($id);
        $data["code"]=1;
        $data["message"]="";
        $data['recommend']=Doctor::findIndexDoctor(4);
        return $data;
    }
    public function actionFilter(){

        $data["department"]=Department::getFullDepartment();
        $data["areaList"]=HospitalRegion::getFilterRegion();
       return[ "code"=>1,
            "message"=>"",
            "data"=>$data,
        ];
    }
}