<?php
/**
 * Created by PhpStorm.
 * User: harold
 * Date: 08-10-16
 * Time: 07:34 PM
 */
use yii\helpers\Html;
use yii\widgets\ActiveForm;

?>

<?php $form = ActiveForm::begin(); ?>

<?= $form->field($model,'idEvento')->textInput() ?>


<div class="form-group">
    <?= Html::submitButton( Yii::t('app', 'Upload'), ['class' =>  'btn btn-success' ]) ?>
</div>

<?php ActiveForm::end(); ?>
