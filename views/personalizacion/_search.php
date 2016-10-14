<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\PersonalizacionSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="personalizacion-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'idPersonalizacion') ?>

    <?= $form->field($model, 'Color') ?>

    <?= $form->field($model, 'tamano') ?>

    <?= $form->field($model, 'Fuente') ?>

    <?= $form->field($model, 'id_Usuario') ?>

    <?php // echo $form->field($model, 'id_Empresa') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
