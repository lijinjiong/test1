<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/4/30/030
 * Time: 15:42
 */

namespace api\controllers;


use common\models\Region;

class RegionController extends ControllerBase
{
    /*根据parent_id获取联动地区*/
    public function actionGetRegion(){
        $parent_id=\Yii::$app->request->get("parent_id",0);
        $data=Region::find()->where(["parent_id"=>$parent_id])
            ->select("id,name")
            ->asArray()
            ->all();
        return [
            "code"=>1,
            "message"=>"",
            "data"=>$data,
        ];
    }
}