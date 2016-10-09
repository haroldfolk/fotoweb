<?php
/**
 * Created by PhpStorm.
 * User: harold
 * Date: 01-10-16
 * Time: 12:11 PM
 *
 */
use yii\helpers\Html;
use yii\helpers\Url;


?>
<h1>Este es su codigo QR</h1>
<p><img src="http://chart.apis.google.com/chart?cht=qr&amp;chs=300x300&amp;chl=Ingrese a www.harold-sw1.cf ,el codigo del evento es : <?=$id?>&amp;chld=H|0"></p>
<?= Html::a("Ir a Inicio",[Url::to('/site')],['class'=>'btn btn-success'])?>


<?
