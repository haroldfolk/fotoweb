<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\EventoUsuario */
/* @var $form ActiveForm */
?>
<div class="site-subcribir">
<div class="jumbotron ">
    <?php $form = ActiveForm::begin(); ?>
<h2>Ingrese el ID del evento al que asistio</h2>
        <?= $form->field($model, 'id_Evento') ?>
        <?= $form->field($model, 'id_Usuario')->hiddenInput(['value'=> $model->id_Usuario])->label(false) ?>

        <div class="form-group">
            <?= Html::submitButton(Yii::t('app', 'Subcribe'), ['class' => 'btn btn-primary']) ?>
        </div>
    <?php ActiveForm::end(); ?>
</div>
</div><!-- site-subcribir -->
