<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Personalizacion */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Personalizacion',
]) . $model->idPersonalizacion;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Personalizacions'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idPersonalizacion, 'url' => ['view', 'id' => $model->idPersonalizacion]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="personalizacion-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
