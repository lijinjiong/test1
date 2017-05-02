<?php

namespace backend\controllers;

use Yii;
use common\models\Doctor;
use common\models\search\DoctorSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use common\models\Department;
use chenkby\region\RegionAction;
use common\models\Region;
use yii\web\UploadedFile;
/**
 * DoctorController implements the CRUD actions for Doctor model.
 */
class DoctorController extends Controller
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
     * Lists all Doctor models.
     * @return mixed
     */
        public function actions()
    {
        $actions=parent::actions();
        $actions['get-region']=[
            'class'=>RegionAction::className(),
            'model'=>Region::className()
        ];
        return $actions;
    }
    public function actionIndex()
    {
        $searchModel = new DoctorSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Doctor model.
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
     * Creates a new Doctor model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Doctor();
//        查询所有科室
        $department=new Department();
        $departmentList=$department::find()->select('dep_name,id')->indexBy("id")->column();
        $model->add_time= time();
        if ($model->load(Yii::$app->request->post())) {
            $model->id_card_front = UploadedFile::getInstance($model, 'id_card_front');
            $model->id_card_front->saveAs($url='img/doctor/' . date("YmdHis").$model->id_card_front->baseName . '.' . $model->id_card_front->extension);
            $model->id_card_front = "/".$url; 
            $model->id_card_back = UploadedFile::getInstance($model, 'id_card_back');
            $model->id_card_back->saveAs($url='img/doctor/' . date("YmdHis").$model->id_card_back->baseName . '.' . $model->id_card_back->extension);
            $model->id_card_back = "/".$url; 
            $model->doc_certification = UploadedFile::getInstance($model, 'doc_certification');
            $model->doc_certification->saveAs($url='img/doctor/' . date("YmdHis").$model->doc_certification->baseName . '.' . $model->doc_certification->extension);
            $model->doc_certification = "/".$url; 
            $model->practicing_certificate = UploadedFile::getInstance($model, 'practicing_certificate');
            $model->practicing_certificate->saveAs($url='img/doctor/' . date("YmdHis").$model->practicing_certificate->baseName . '.' . $model->practicing_certificate->extension);
            $model->practicing_certificate = "/".$url; 
            $model->highest_professional = UploadedFile::getInstance($model, 'highest_professional');
            $model->highest_professional->saveAs($url='img/doctor/' . date("YmdHis").$model->highest_professional->baseName . '.' . $model->highest_professional->extension);
            $model->highest_professional = "/".$url; 
            if ($model->save(false)){
                 Yii::$app->getSession()->setFlash('success', '创建成功');
                return $this->redirect(['index', 'id' => $model->id]);
            } else {
                 Yii::$app->getSession()->setFlash('error', '创建失败');
            }
            
        } else {
            return $this->render('create', [
                'model' => $model,
                'departmentList'=>$departmentList,
            ]);
        }
    }

    /**
     * Updates an existing Doctor model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $department=new Department();
        $departmentList=$department::find()->select('id,dep_name')->asArray()->all();
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['index', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
                'departmentList'=>$departmentList,
            ]);
        }
    }

      
//    处理
    public function actionHandle($id){
        $model = $this->findModel($id);
        $model->verify_time= time();
        if ($model->load(Yii::$app->request->post()) && $model->save(false)) {
          
            return $this->redirect(['index', 'id' => $model->id]);
        } else {
            return $this->renderAjax('handle', [
                'model' => $model,
            ]);
        }
        
    }
    /**
     * Deletes an existing Doctor model.
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
     * Finds the Doctor model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Doctor the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Doctor::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
