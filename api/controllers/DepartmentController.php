<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/4/30/030
 * Time: 15:57
 */

namespace api\controllers;


use common\models\Department;

class DepartmentController extends ControllerBase
{
    /*根据parent_id获取科室*/
    public function actionGetDepartment(){
        $parent_id=\Yii::$app->request->get("parent_id",0);
        $data=Department::find()->where(["parent_id"=>$parent_id])
            ->select("id,dep_name")
            ->asArray()
            ->all();
        return [
            "code"=>1,
            "message"=>"",
            "data"=>$data,
        ];
    }
}