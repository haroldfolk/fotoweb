<?php

use app\models\Usuario;
use bizley\quill\Quill;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\color\ColorInput;
use dosamigos\tinymce\TinyMce;

    /* @var $this yii\web\View */
/* @var $model app\models\Personalizacion */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="personalizacion-form">

    <?php $form = ActiveForm::begin(); ?>

   <?="Selecionar color de fondo de pagina"?>
    <?= $form->field($model, 'color', [
        'template' => "{input}"
    ])->input('color',['class'=>"input_class"]) ?>

    <?= $form->field($model, 'fuente')->dropDownList(
        ['Arial'=>'Arial','Times New Roman'=>'Times New Roman','Arial Black'=>'Arial Black','Impact'=>'Impact'],           // Flat array ('id'=>'label')
        ['prompt'=>'Seleccione tipo de letra']    // options
    ); ?>
    <?= $form->field($model, 'tamano')->dropDownList(
        ['small'=>'pequeño','medium'=>'mediana','x-medium'=>'normal','large'=>'grande'],           // Flat array ('id'=>'label')
        ['prompt'=>'Seleccione el tamaño de la letra']    // options
    ); ?>
   <?php $iduser = Yii::$app->user->getId();

    ?>

    <?=$form->field($model, 'id_Usuario')->hiddenInput(['value'=> $iduser])->label(false); ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Guardar/Restaurar') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
