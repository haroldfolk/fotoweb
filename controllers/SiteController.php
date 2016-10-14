<?php

namespace app\controllers;

use app\models\Evento;
use app\models\EventoUsuario;
use app\models\Foto;
use app\models\FotoUsuario;
use app\models\Perfil;
use app\models\Usuario;
use Yii;
use yii\filters\AccessControl;
use yii\httpclient\Client;
use yii\web\Controller;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;

class SiteController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    public function actionPrueba()
    {
        return $this->render('prueba');
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        if (!Yii::$app->user->isGuest) {

            $eventUser = EventoUsuario::find()->where(['id_Usuario' => Yii::$app->user->getId()])->all();
            $ev[] = null;
            $i = 0;
            foreach ($eventUser as $event) {
                $ev[$i] = Evento::find()->where(['idEvento' => $event->id_Evento])->one();
                $i++;
            }
            return $this->render('indexLogin', ['eventos' => $ev]);
        }
        return $this->render('index');
    }

    /**
     * Login action.
     *
     * @return string
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        }
        return $this->render('login', [
            'model' => $model,
        ]);
    }

    /**
     * Logout action.
     *
     * @return string
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    /**
     * Displays contact page.
     *
     * @return string
     */
    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
            Yii::$app->session->setFlash('contactFormSubmitted');

            return $this->refresh();
        }
        return $this->render('contact', [
            'model' => $model,
        ]);
    }

    /**
     * Displays about page.
     *
     * @return string
     */
    public function actionAbout()
    {
        return $this->render('about');
    }


    public function actionSubcribir()
    {
        $model = new EventoUsuario();

        if ($model->load(Yii::$app->request->post())) {
            if ($model->validate()) {
                $model->save();
                $this->encontrarFotos(Yii::$app->user->getId(), $model->idEvento);
                return $this->goBack();

            }
        }
        $model->id_Usuario = Yii::$app->user->getId();
        return $this->render('subcribir', [
            'model' => $model,
        ]);
    }

    public function encontrarFotos($getId, $idEvento)
    {
        $userFaceId = Perfil::findOne(['id_Usuario' => $getId]);
        $fotosDelEvento = Foto::find()->where(['id_Evento' => $idEvento])->all();
        if ($userFaceId->faceId != "NULL") {
            foreach ($fotosDelEvento as $foto) {
                $faceIdsDeFoto = $foto->faceIds;
                if ($faceIdsDeFoto != "NULL") {
                    $Jsons = json_decode($faceIdsDeFoto, true);
                    $faces = '';
                    foreach ($Jsons as $json) {
                        $faceId = $json["faceId"];
                        $faces = $faces . '"' . $faceId . '",';
                    }
                    $jsonAEnviar = '{"faceIds":[' . $faces . '"' . $userFaceId["faceId"] . '"' . ']}';
                    $jsonConGrupos = $this->encontrarGruposMicrosoft($jsonAEnviar);
                    $arrayConGrupos = json_decode($jsonConGrupos, true);
                    if (isset($arrayConGrupos["messyGroup"])) {
                        if (!$this->estaEnEsteGrupo($userFaceId["faceId"], $arrayConGrupos["messyGroup"])) {
                            $fotoUser = new FotoUsuario();
                            $fotoUser->id_Foto = $foto->idFoto;
                            $fotoUser->id_Usuario = $getId;
                            $fotoUser->save();
                        }
                    }
                }
            }
        } else {
            echo "suba una foto de perfil para encontrar sus fotos en el evento";
            return;
        }


    }

    public function encontrarGruposMicrosoft($jsonAMandar)
    {
        $client = new Client();
        $response = $client->createRequest()
            ->setMethod('post')
            ->setUrl('https://api.projectoxford.ai/face/v1.0/group?subscription-key=58f5d9bbbc2c4e15be44f5d4ce29c0d0')
            ->addHeaders(['content-type' => 'application/json'])
            ->setContent($jsonAMandar)
            ->send();
        if ($response->isOk) {
            return $response->content;
        }
        return null;
    }

    private function estaEnEsteGrupo($faceId, $messyGroup)
    {
        if (in_array($faceId, $messyGroup)) {
            return true;
        }
        return false;
    }
}
