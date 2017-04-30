<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/4/30/030
 * Time: 15:17
 */

namespace api\controllers;


use api\models\ReservationForm;

class ReservationController extends ControllerBase
{

    /*新增预约*/
    public function actionAddReservation(){
        $reservation=new ReservationForm();
        $res=$reservation->addReservation(\Yii::$app->request->post());
        return $res?["code"=>1,"message"=>"预约成功"]:["code"=>0,"message"=>"预约失败"];
    }
}