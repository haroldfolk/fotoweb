<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Perfil */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Perfil',
]) . $model->idPerfil;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Perfils'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idPerfil, 'url' => ['view', 'id' => $model->idPerfil]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="perfil-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
