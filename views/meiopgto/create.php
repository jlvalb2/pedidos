<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Meiopgto */

$this->title = 'Create Meiopgto';
$this->params['breadcrumbs'][] = ['label' => 'Meiopgtos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="meiopgto-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
