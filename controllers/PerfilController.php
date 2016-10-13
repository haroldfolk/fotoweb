<?php

namespace app\controllers;

use Yii;
use app\models\Perfil;
use yii\data\ActiveDataProvider;
use yii\helpers\Json;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;
use yii\httpclient\Client;

/**
 * PerfilController implements the CRUD actions for Perfil model.
 */
class PerfilController extends Controller
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
     * Lists all Perfil models.
     * @return mixed
     */
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => Perfil::find(),
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Perfil model.
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
     * Creates a new Perfil model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate($id)
    {


        $model = new Perfil();
        $model->id_Usuario = $id;
        $model->tipoFoto = "image/jgp";
        if ($model->load(Yii::$app->request->post())) {
            $storage = Yii::$app->storage;
            $image = UploadedFile::getInstance($model, 'foto1');
            $imageName = $image->baseName . "." . $image->extension;
            $path = 'imagenes/' . $imageName;
            $image->saveAs($path);
            $archivo = $path;
            $fp = fopen($archivo, 'r');
            if ($fp) {
                $datos = fread($fp, filesize($archivo)); // cargo la imagen
                fclose($fp);
// averiguo su tipo mime
                $tipo_mime = 'image/jpeg';
                $isize = getimagesize($archivo);
                if ($isize)
                    $tipo_mime = $isize['mime'];
//reconocimientofacial
                $url = $storage->uploadFile($path, "" . $id . $imageName . $id . "");
                $resultApiFace = $this->identificarMicrosoft($url);
                unlink($path);
                if ($this->devolverSiHayCara($resultApiFace)) {
                    // La guardamos en la BD
                    $datos = base64_encode($datos);
                    $model->foto1 = $datos;
                    $model->tipoFoto = $tipo_mime;
                    $model->faceId = $this->devolverCara($resultApiFace);
                    $model->enlace = $url;
                    if ($model->save()) {
                        return $this->redirect(['/site']);
                    }
                } else {
                    return $this->redirect(['/perfil/create', 'id' => $id]);
                }
            }
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->idPerfil]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    protected function findModel($id)
    {
        if (($model = Perfil::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    public function identificarMicrosoft($urlToMicrosoft)
    {
        $client = new Client();
        $response = $client->createRequest()
            ->setMethod('post')
            ->setUrl('https://api.projectoxford.ai/face/v1.0/detect?returnFaceId=true&subscription-key=58f5d9bbbc2c4e15be44f5d4ce29c0d0')
            ->addHeaders(['content-type' => 'application/json'])
            ->setContent('{url:"' . $urlToMicrosoft . '"}')
            ->send();
        if ($response->isOk) {
            return $response->content;
        }
        return null;
    }

//    public function unaSolaCara($Jsos)
//    {
//        $i = 0;
//        foreach ($Jsos as $js) {
//            $i++;
//            if ($i > 1) {
//                return false;
//            }
//            if (!isset($js["faceId"])) {
//                return false;
//            }
//        }
//        return true;
//    }
    public function devolverSiHayCara($json)
    {
        return $this->unaSolaCara(json_decode($json, true));
    }

    public function devolverCara($json)
    {
        $decode = json_decode($json, true);
        if ($decode != null) {
            foreach ($decode as $js) {
                if (!isset($js["faceId"])) {
                    echo "Error";
                    return null;
                }
                return $js["faceId"];
            }
        } else {
            return null;
        }
    }

    public function unaSolaCara($Jsos)
    {
        if ($Jsos == null) {
            echo "No hay Caras";
            return false;
        }
        $i = 0;
        foreach ($Jsos as $js) {
            $i++;
            if ($i > 1) {
                echo "Tiene mas de una cara";
                return false;
            }
            if (!isset($js["faceId"])) {
                echo "Error";
                return false;
            }
        }
        echo "Cara registrada";
        return true;
    }
}



