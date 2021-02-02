<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Telefone */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="telefone-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'prefixo')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'numero')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'titular')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'zap')->textInput() ?>

    <?= $form->field($model, 'obs')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
