<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Personalizacion */

$this->title = Yii::t('app', 'Personalizar');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Personalizacions'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="personalizacion-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
