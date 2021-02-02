<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\TelefoneSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="telefone-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'idtelefone') ?>

    <?= $form->field($model, 'prefixo') ?>

    <?= $form->field($model, 'numero') ?>

    <?= $form->field($model, 'titular') ?>

    <?= $form->field($model, 'zap') ?>

    <?php // echo $form->field($model, 'obs') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
