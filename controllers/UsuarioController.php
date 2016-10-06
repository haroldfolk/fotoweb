<?php

namespace app\controllers;

use app\models\FormUpload;
use app\models\Perfil;
use Yii;
use app\models\Usuario;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\Response;
use yii\web\UploadedFile;

/**
 * UsuarioController implements the CRUD actions for Usuario model.
 */
class UsuarioController extends Controller
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
     * Lists all Usuario models.
     * @return mixed
     */
    public function actionIndex()
    {

        if (!Yii::$app->user->isGuest){
        $user=$this->findModel(Yii::$app->user->getId());
        $perf=Perfil::find()->where(['id_Usuario'=>Yii::$app->user->getId()])->one();

        return $this->render('perfil', [
            'model' => $user,'perf'=>$perf,
        ]);
            }else{
                user_error("debe loguearse");
            $this->goBack();
        }

    }

    /**
     * Displays a single Usuario model.
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
     * @param $id
     * @return string
     */
    public function actionUpload($id)
    {
        $model=new Perfil();
        $model->id_Usuario=$id;
        $model->tipoFoto=null;
        if ($model->load(Yii::$app->request->post()) && $model->save())
        {
            return $this->goHome();
        }
    return $this->render('upload',['id'=>$id,'model'=>$model]);


//
//        $fp = fopen ($archivo, 'r');
//        if ($fp) {
//            $datos = fread($fp, filesize($archivo)); // cargo la imagen
//            fclose($fp);
//
//// averiguo su tipo mime
//            $tipo_mime = 'image/jpeg';
//            $isize = getimagesize($archivo);
//            if ($isize)
//                $tipo_mime = $isize['mime'];
//
//// La guardamos en la BD
//            $datos = base64_encode($datos);
//
//            $perfil = new Perfil();
//            $perfil->foto1 = $datos;
//            $perfil->id_Usuario = $id;
//            $perfil->tipoFoto = $tipo_mime;
//            $perfil->save();
    }
    /**
     * Creates a new Usuario model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Usuario();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['upload', 'id' => $model->idUsuario]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    public function actionInsertar()
    {

    }
    /**
     * Updates an existing Usuario model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->idUsuario]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Usuario model.
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
     * Finds the Usuario model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Usuario the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Usuario::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
