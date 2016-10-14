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
<div align="center">
<p><H1>Haga click sobre el codigo QR para descargar la imagen</H1></p>
<h2> Gracias por utilizar nuestro servicio :)</h2>
    <a href="http://chart.apis.google.com/chart?cht=qr&amp;chs=300x300&amp;chl=Ingrese a www.harold-sw1.cf ,el codigo del evento es : <?=$id?>&amp;chld=H|0" download="Descarga">
        <img src="http://chart.apis.google.com/chart?cht=qr&amp;chs=300x300&amp;chl=Ingrese a www.harold-sw1.cf ,el codigo del evento es : <?=$id?>&amp;chld=H|0" alt="Este codigo contiene el id del evento creado">
    </a>

<p><?= Html::a("Ir a Inicio",[Url::to('/site')],['class'=>'btn btn-success'])?></p>
</div>
