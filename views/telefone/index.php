<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\TelefoneSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Telefones';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="telefone-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Telefone', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'idtelefone',
            'prefixo',
            'numero',
            'titular',
            'zap',
            //'obs',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
