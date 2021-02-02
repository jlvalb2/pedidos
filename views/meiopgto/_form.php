<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Meiopgto */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="meiopgto-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'meio')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
