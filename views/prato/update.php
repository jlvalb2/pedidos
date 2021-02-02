<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Prato */

$this->title = 'Update Prato: ' . $model->idprato;
$this->params['breadcrumbs'][] = ['label' => 'Pratos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idprato, 'url' => ['view', 'id' => $model->idprato]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="prato-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
