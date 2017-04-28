<?php

namespace backend\controllers;

use chenkby\region\RegionAction;
use common\models\Region;
use Yii;
use common\models\HospitalRegion;
use common\models\search\HospitalRegionSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * HospitalRegionController implements the CRUD actions for HospitalRegion model.
 */
class HospitalRegionController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    public function actions()
    {
        $actions=parent::actions();
        $actions['get-region']=[
            'class'=>RegionAction::className(),
            'model'=>Region::className()
        ];
        return $actions;
    }
    /**
     * Lists all HospitalRegion models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new HospitalRegionSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single HospitalRegion model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new HospitalRegion model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {

        $model = new HospitalRegion();
        if ($model->load(Yii::$app->request->post()) && $model->validate("city,province")) {
            if($model->save(false)){
                Yii::$app->getSession()->setFlash("success","新建成功");
                return $this->redirect(['view', 'id' => $model->id]);
            }else{
                Yii::$app->getSession()->setFlash('error', '创建失败');
                return $this->render('create', [
                    'model' => $model,
                ]);
            }

        } else {
            if(!empty($model->getFirstErrors())){
                Yii::$app->getSession()->setFlash('error', current($model->getFirstErrors()));
            }

            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing HospitalRegion model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing HospitalRegion model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the HospitalRegion model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return HospitalRegion the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = HospitalRegion::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
