<?php

/* @var $this yii\web\View */

use yii\helpers\Html;
use yii\widgets\Pjax;

$this->title = 'My Yii Application';
?>
<div class="site-index">

    <div class="jumbotron">
        <h1><span class="label label-primary">FotoWeb HD</span></h1>
        <br>
        <p class="alert alert-success">Esta es la aplicacion que le solucionara la vida a los fotografos y cambiara el
            formato de recuerdo de tus eventos!</p>

        <p><a class="btn btn-danger" href="site/subcribir">Ingresa el codigo de un evento al que asististe!</a></p>
    </div>

    <div class="body-content">

        <div class="row">
            <div class="col-lg-4 alert alert-danger">
                <div class="list-group">

                    <?php foreach ($eventos as $ev) { ?>

                        <?php if ($ev != null) { ?>

                            <a href="#" class="list-group-item "><?= $ev->Nombre ?></a>

                        <?php }

                    } ?>

                </div>
                <a href="site/subcribir" class="btn alert">Subscribirse a nuevos eventos</a>
            </div>
            <div class="col-lg-8">
                <?php
                $script = <<< JS
$(document).ready(function() {
    setInterval(function(){ $("#refreshButton").click(); }, 1000);
});
JS;
                $this->registerJs($script);
                ?>

                <?php Pjax::begin(); $time = time();?>
                <?= Html::a("Refresh", ['site/index'], ['class' => 'btn btn-lg btn-primary', 'id' => 'refreshButton']) ?>
                <h1>Current time: <?=date("d-m-Y (H:i:s)", $time); ?></h1>
                <?php Pjax::end(); ?>

            </div>

        </div>

    </div>
</div>
