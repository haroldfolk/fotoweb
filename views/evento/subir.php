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
<?php if(Yii::$app->session->hasFlash('success')):?>
    <div class="grabado_ok">
        <?php echo Yii::$app->session->getFlash('success'); ?>
    </div>
<?php endif; ?>
<?php $form = ActiveForm::begin(); ?>

<?= $form->field($model,'idEvento')->textInput() ?>

<input>   Key Evento</<input type="hidden"><br>
<div class="form-group">
    <?="<br>". Html::submitButton( Yii::t('app', 'Upload'), ['class' =>  'btn btn-success' ]) ?>
</div>

<?php ActiveForm::end(); ?>
