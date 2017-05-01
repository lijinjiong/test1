<?php
namespace api\controllers;



use common\models\Banner;
use common\models\Department;

class SiteController extends ControllerBase {

/*首页接口*/

    public function actionIndex(){
        $banner_type=\Yii::$app->request->post("banner_type",1);
        $banner_list=Banner::getIndexBanner();

        return [
            "carouselList"=>$banner_list,
        ];
    }
}