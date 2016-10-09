<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Foto */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Foto',
]) . $model->idFoto;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Fotos'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idFoto, 'url' => ['view', 'id' => $model->idFoto]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="foto-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
