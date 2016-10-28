<?php

/* @var $this yii\web\View */

use app\models\Foto;
use app\models\FotoUsuario;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\Pjax;

$this->title = 'My Yii Application';
?>
<<<<<<< HEAD
=======

>>>>>>> 227bb924d92b86fb7ec6044f9b614ab36a7c05c8

<div class="site-index">
    <?php if (!isset($_GET['idEvento'])) { ?>


        <div class="jumbotron">
            <h1><span class="label label-primary">FotoWeb HD</span></h1>
            <br>

            <p class="alert alert-success">Esta es la aplicacion que le solucionara la vida a los fotografos y cambiara
                el
                formato de recuerdo de tus eventos!</p>
            <?= Html::a("Ingresa el codigo de un evento al que asististe!", [Url::to('site/subcribir')], ['class' => 'btn btn-danger']) ?>

        </div>
    <?php }?>//end if?>


    <div class="body-content">

        <div class="row">
            <div class="col-lg-4">
                <div class="list-group">

                    <?php
//
                    foreach ($eventos as $ev) {

                        if ($ev != null) {
                            $url = 'site/index?idEvento=' . $ev->idEvento;
                            if (!isset($_GET['idEvento'])) {

                                echo Html::a($ev->Nombre, [Url::to($url)], ['class' => 'list-group-item']);
                            } else {

                                echo Html::a($ev->Nombre, [Url::to($url)], ['class' => $_GET['idEvento'] == $ev->idEvento ? 'list-group-item' : 'list-group-item active']);

                            }

                        }
                    }

                    ?>
                </div>
                <?= Html::a("Subscribirse a nuevos eventos", [Url::to('/site/subcribir')], ['class' => 'btn alert', 'id' => 'suscriptionButton']) ?>
            </div>
            <div class="col-lg-8">
                <?php
                if (!isset($_GET['idEvento'])) {
                    echo "<h1>Seleccione uno de sus eventos</h1>";
                } else {
                    $idEven = $_GET['idEvento'];
                    $fotosEnLaQAparece = FotoUsuario::findAll(['id_Usuario' => Yii::$app->user->getId()]);
                    $msg = "No hay fotos de este evento en las que aparezcas!";
                    foreach ($fotosEnLaQAparece as $fotoUser) {
                        $foto = Foto::findOne(['idFoto' => $fotoUser->id_Foto]);
                        if ($foto->id_Evento == $idEven) {
                            echo "<img  class='t' src='data:" . $foto->tipoFoto . ";base64," . $foto->fotoMuestra . "' / width='250' height='200' >";
                            $msg = "No hay mas fotos de este evento en las que aparezcas!";
                            ?>
                            <form action="https://www.sandbox.paypal.com/cgi-bin/webscr" method="post">
                                <input type="hidden" name="cmd" value="_xclick">
                                <input type="hidden" name="business" value="haroldfolk@gmail.com">
                                <input type="hidden" name="item_name" value="Foto Online">
                                <input type="hidden" name="item_number" value="<?= $foto->idFoto ?>">
                                <input type="hidden" name="currency_code" value="USD">
                                <input type="hidden" value="1" name="no_note"/>
                                <input type="hidden" value="1" name="no_shipping"/>
                                <input type="hidden" name="amount" value="0.1">
                                <input type="hidden" name="return"
                                       value="http://www.harold-sw1.cf/foto/buy?idFoto=<?= $foto->idFoto ?>">
                                <input type="hidden" name="cancel_return" value="http://www.harold-sw1.cf">
                                <!--<input type="hidden" name="notify_url" value="-->
                                <input type="image" src="https://www.paypalobjects.com/es_XC/i/btn/btn_paynow_LG.gif"
                                       name="submit">
                            </form>
                            <?php
                        }
                    }
                  echo  "<h2 class='alert-danger'>".$msg."</h2>";

<<<<<<< HEAD
                }

           ?>
=======

}
                ?>
>>>>>>> 227bb924d92b86fb7ec6044f9b614ab36a7c05c8

            </div>
        </div>
    </div>
</div>
