<?php
use app\models\Perfil;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
?>

<?php

// Abro el archivo de imagen para cargar sus contenidos

$archivo = $model->foto1;

$fp = fopen ($archivo, 'r');
if ($fp) {
    $datos = fread($fp, filesize($archivo)); // cargo la imagen
    fclose($fp);

// averiguo su tipo mime
    $tipo_mime = 'image/jpeg';
    $isize = getimagesize($archivo);
    if ($isize)
        $tipo_mime = $isize['mime'];

// La guardamos en la BD
    $datos = base64_encode($datos);

    $perfil = new Perfil();
    $model->foto1 = $datos;
    $model->id_Usuario = $id;
    $model->tipoFoto = $tipo_mime;

}
?>


<?= Html::submitButton("Subir", ["class" => "btn btn-primary"]) ?>

<?php $form->end() ?>


