<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/4/30/030
 * Time: 23:17
 */

namespace api\controllers;


class BannerController extends ControllerBase
{

public function  actionIndexBanner(){
    \Yii::$app->request->get();
}
}