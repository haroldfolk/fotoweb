<?php

namespace app\controllers;

use app\models\UploadForm;
use Yii;
use app\models\Foto;

use yii\base\Request;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;

/**
 * FotoController implements the CRUD actions for Foto model.
 */
class FotoController extends Controller
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
     * Lists all Foto models.
     * @return mixed
     */
    public function actionIndex()
    {
        $param=null;

        return $this->render('index', [
            'param' => $param,
        ]);
    }

    /**
     * Displays a single Foto model.
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
     * Creates a new Foto model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate($idEvento=null)
    {
        $model = new Foto();
$model->id_Evento=$idEvento;
        if ($model->load(Yii::$app->request->post())) {


            return $this->redirect(['create', 'idEvento' => $model->id_Evento]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

public function actionBuy($idFoto)
{
//    if (isset($_GET["idFoto"])){
        $model=Foto::findOne(['idFoto'=>$idFoto]);
       return $this->render('buy',['url'=>$model->enlace]);
//    }
}

    public function actionUpload($idEvento)
    {
        $model = new UploadForm();
        $model->evento=$idEvento;
        if (Yii::$app->request->isPost) {
            $model->imageFiles = UploadedFile::getInstances($model, 'imageFiles');
            if ($model->upload()) {
                Yii::$app->session->setFlash('success',"<script languaje='javascript'>alert('Fotos subidas correctamente ;)')</script>");
                return $this->redirect(['evento/subir']);
            }
        }

        return $this->render('upload', ['model' => $model]);
    }



    /**
     * Updates an existing Foto model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->idFoto]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Foto model.
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
     * Finds the Foto model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Foto the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Foto::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
