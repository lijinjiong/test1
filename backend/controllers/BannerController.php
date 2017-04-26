<?php

namespace backend\controllers;

use Yii;
use common\models\Banner;
use common\models\search\BannerSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;

/**
 * BannerController implements the CRUD actions for Banner model.
 */
class BannerController extends Controller
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

    /**
     * Lists all Banner models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new BannerSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Banner model.
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
     * Creates a new Banner model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Banner();
        if ($model->load(Yii::$app->request->post()) ) {
            $model->img = UploadedFile::getInstance($model, 'img');
            $model->img->saveAs($url='img/banner/' . date("YmdHis").$model->img->baseName . '.' . $model->img->extension);
            $model->banner_img = "/".$url;
            if ($model->save(false)) {
                Yii::$app->getSession()->setFlash('success', '创建成功');
                return $this->redirect(['index', 'id' => $model->id]);
            } else {
                Yii::$app->getSession()->setFlash('error', '创建失败');
            }
        }else{
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Banner model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        if ($model->load(Yii::$app->request->post())) {
            $model->img = UploadedFile::getInstance($model, 'img');
            if($model->img){
            $model->img->saveAs($url='img/banner/' . date("YmdHis").$model->img->baseName . '.' . $model->img->extension);
            $model->banner_img = "/".$url;
            }
            if ($model->save(false)) {
                Yii::$app->getSession()->setFlash('success', '修改成功');
                return $this->redirect(['index', 'id' => $model->id]);
            } else {
                Yii::$app->getSession()->setFlash('error', '修改失败');
            }
        }else{
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Banner model.
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
     * Finds the Banner model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Banner the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Banner::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
