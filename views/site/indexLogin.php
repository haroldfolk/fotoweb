<?php

/* @var $this yii\web\View */

use app\models\Foto;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\Pjax;

$this->title = 'My Yii Application';
?>
<?php
$script = <<< JS
$(document).ready(function() {
    setInterval(function(){ $("#refreshButton").click(); }, 1000);
});
JS;
$this->registerJs($script);
?>

<div class="site-index">
        <?php if (!isset($_GET['idEvento'])) { ?>


        <div class="jumbotron">
            <h1><span class="label label-primary">FotoWeb HD</span></h1>
            <br>

            <p class="alert alert-success">Esta es la aplicacion que le solucionara la vida a los fotografos y cambiara
                el
                formato de recuerdo de tus eventos!</p>
            <?= Html::a("Ingresa el codigo de un evento al que asististe!", [Url::to('site/subcribir')], ['class' => 'btn btn-danger']) ?>
            <!--        <p><a class="btn btn-danger" href="/site/subcribir">Ingresa el codigo de un evento al que asististe!</a></p>-->
        </div>
    <?php }//end if?>


    <div class="body-content">

        <div class="row">
            <div class="col-lg-4">
                <div class="list-group">

                    <?php
//                    Pjax::begin();
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
//                    Pjax::end();
                    ?>
                </div>
                <?= Html::a("Subscribirse a nuevos eventos", [Url::to('/site/subcribir')], ['class' => 'btn alert', 'id' => 'suscriptionButton']) ?>

            </div>

            <div class="col-lg-8">
                <?php
                if (!isset($_GET['idEvento'])) {
                    echo "<h1>Seleccione uno de sus eventos</h1>";
                }else{
                    $idEven=$_GET['idEvento'];
                    $fotosAll=Foto::find()->where(['id_Evento'=>$idEven])->all();
                    foreach ($fotosAll as $foto){
                        echo "<img  class='t' src='data:".$foto->tipoFoto.";base64,".$foto->fotoMuestra."' / width='250' height='200' >";
                        ?>
                       
                        <form action="https://www.sandbox.paypal.com/cgi-bin/webscr" method="post">
                            <input type="hidden" name="cmd" value="_xclick">
                            <input type="hidden" name="business" value="haroldfolk@gmail.com">
                            <input type="hidden" name="item_name" value="Ebook de comercio electronico">
                            <input type="hidden" name="item_number" value="5">
                            <input type="hidden" name="currency_code" value="USD">
                            <input type="hidden" value="1" name="no_note"/>
                            <input type="hidden" value="1" name="no_shipping"/>
                            <input type="hidden" name="amount" value="10.99">
                            <input type="hidden" name="return" value="<?=Url::to('/foto/buy')?>">
                            <input type="hidden" name="cancel_return" value="<?=Url::to('/foto/nobuy')?>">
                            <input type="hidden" name="notify_url" value="<?=Url::to('/foto/qbuy')?>">
                            <input type="image" src="https://www.paypalobjects.com/es_XC/i/btn/btn_paynow_LG.gif" border="0" name="submit"
                                   alt="PayPal, la forma más segura y rápida de pagar en línea.">

                        </form>
                        <?php
                    }
                }


                ?>
            </div>

        </div>

    </div>
</div>
