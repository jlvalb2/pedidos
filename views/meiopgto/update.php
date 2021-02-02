<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Meiopgto */

$this->title = 'Update Meiopgto: ' . $model->idmeiopgto;
$this->params['breadcrumbs'][] = ['label' => 'Meiopgtos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idmeiopgto, 'url' => ['view', 'id' => $model->idmeiopgto]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="meiopgto-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
