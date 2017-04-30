<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/4/30/030
 * Time: 10:30
 */

namespace api\models;


use common\models\Department;
use yii\base\UserException;

class Doctor extends \common\models\Doctor
{

    /*首页医生信息*/
    public static function findIndexDoctor($limit = 5)
    {
        $query = self::find()->select("id,head_img,username,hospital,skill_disease")
            ->where(["status" => 1, "show_index" => 1])
            ->limit($limit)
            ->asArray()->all();
        if (!empty($query)) {
            foreach ($query as $k => $v) {
                $query[$k]["head_img"] = $v["head_img"] ? \Yii::$app->params["XINLIAN_BACK"] . $v["head_img"] : "";
            }
        }
        return $query;
    }

    /*医生列表*/
    public static function doctorList($filter, $start, $limit)
    {
        $query = self::find()->select("id,head_img,username,hospital,skill_disease")
            ->where(["status" => 1])
            ->orFilterWhere(["username" => $filter["search_name"]["username"]])
            ->orFilterWhere(['in', "department_id", $filter["search_name"]["department_ids"]])
            ->andFilterWhere(["city" => $filter["city"]])
            ->andFilterWhere(["hospital_id" => $filter["hospital_id"]])
            ->andFilterWhere(["department_id" => $filter["department_id"]])
            ->andFilterWhere(["level" => $filter["level"]]);
        $count = $query->count();
        $data = $query->limit($limit)
            ->offset(($start - 1) * $limit)
            ->asArray()->all();
        if (!empty($data)) {
            foreach ($data as $k => $v) {
                $data[$k]["head_img"] = $v["head_img"] ? \Yii::$app->params["XINLIAN_BACK"] . $v["head_img"] : "";
            }
        }
        return [
            "data" => $data,
            "count" => $count
        ];
    }

    /*处理搜索search_name*/
    public static function dealSearch($search_name)
    {
        $filter["username"] = "";
        $filter["department_ids"] = "";
        if (!empty($search_name)) {
            $search_name = trim($search_name);
            $filter["username"] = $search_name;
            $filter["department_ids"] = array_keys(Department::find()->select("id")->indexBy("id")->asArray()->all());
        }
        return $filter;
    }
    /*医生详情*/
    public static function detail($id){
        $doctor=self::find()
            ->with(["department","city"])
            ->select("id,head_img,username,department_id,hospital,level,city,skill_disease,practice_experience,academic_post")
            ->where(["id"=>$id,"status"=>1])
            ->asArray()
            ->one();
    if(empty($doctor)){
        throw new UserException("医生不存在");
    }
        $doctor["head_img"]=empty($doctor["head_img"])?"":\Yii::$app->params["XINLIAN_BACK"].$doctor["head_img"];
        $doctor["department"]=$doctor["department"]["dep_name"];
        $doctor["level"]=\Yii::$app->params["DOCTOR_LEVEL"][$doctor["level"]];
        $doctor["city"]=$doctor["city"]["name"];
        return $doctor;
    }


}