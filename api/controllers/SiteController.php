<?php
namespace api\controllers;



use common\models\Banner;
use common\models\Department;

class SiteController extends ControllerBase {

/*首页接口*/

    public function actionIndex(){
        $banner_type=\Yii::$app->request->post("banner_type",1);
        $banner_list=Banner::getIndexBanner();

<<<<<<< HEAD
     return  [0=>"最高级"]+\common\models\Department::find()->where(["parent_id"=>0])->andWhere(["!=","id",3])->indexBy("id")->select("dep_name,id")->column();
=======
        return [
            "carouselList"=>$banner_list,
        ];
>>>>>>> ljj
    }
}