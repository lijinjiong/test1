<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/4/30/030
 * Time: 10:30
 */

namespace api\models;


use common\models\Department;

class Doctor extends \common\models\Doctor
{

    /*首页医生信息*/
    public static function findIndexDoctor($filter,$limit=5){
        $query=self::find()->select("id,head_img,username,hospital,skill_disease")
            ->where(["status"=>1])
            ->orFilterWhere(["username"=>$filter["username"]])
            ->orFilterWhere(['in',"department_id",$filter["department_ids"]])
            ->limit($limit)
            ->asArray()->all();
        if(!empty($query)){
            foreach($query as $k=>$v){
                $query[$k]["head_img"]=\Yii::$app->params["XINLIAN_BACK"].$v["head_img"];
            }
        }
       return $query;
    }
    /*处理首页search_name*/
    public  static function dealSearch($search_name){
        $filter["username"]="";
        $filter["department_ids"]="";
        if(!empty($search_name)){
            $search_name=trim($search_name);
            $filter["username"]=$search_name;
            $filter["department_ids"]=array_keys(Department::find()->select("id")->indexBy("id")->asArray()->all());
        }
        return $filter;
    }
}