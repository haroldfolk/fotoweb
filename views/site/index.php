<?php

/* @var $this yii\web\View */

use yii\helpers\Html;
use yii\helpers\Url;

$this->title = 'FotoWEB';
?>
<div class="site-index">

    <div class="jumbotron">
        <h1>FotoWeb HD</h1>
        <img src="portada.jpg" width="300" height="200">
        <p class="lead">Esta es la aplicacion que le solucionara la vida a los fotografos y cambiara el formato de recuerdo de tus eventos!</p>
        <p><a class="btn btn-lg btn-danger" href="evento/create">Inicia y Crea tu evento Ya!</a></p>
    </div>

    <div class="body-content">
        <div class="row">
            <div class="col-lg-4"></div>
            <div class="col-lg-4"></div>
            <div class="col-lg-4"></div>
        </div>
    </div>

</div>
<?php
// echo Html::a("ver imagen",['fotos/logo.png']);
//echo Url::to('fotos/logo.png');
?>