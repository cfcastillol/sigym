<?php

use yii\helpers\Html;
use yii\grid\GridView;
use kartik\select2\Select2;
use kartik\alert\AlertBlock;

/* @var $this yii\web\View */
/* @var $searchModel app\models\MembresiaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Membresías';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="membresia-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php
    echo AlertBlock::widget([
        'type' => AlertBlock::TYPE_ALERT,
        'useSessionFlash' => true,
        'delay' => 3000,
    ]);
    ?>

    <p>
        <?= Html::a('Crear Membresía', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            [
                'attribute' => 'estadoid',
                'value' => 'estado.estado',
                'filter' => Select2::widget([
                    'name' => 'estadoid',
                    'model' => $searchModel,
                    'attribute' => 'estadoid',
                    'data' => yii\helpers\ArrayHelper::map(app\models\Estado::find()->all(), 'id', 'estado'),
                    'options' => ['placeholder' => 'Seleccione...'],
                    'pluginOptions' => [
                        'allowClear' => true
                    ],
                ]),
                'options' => ['width' => '200px'],
            ],
            
            'membresia',
            'descripcion:ntext',
            [
                'attribute' => 'valor',
                'format'    => ['decimal', 2,],
                //'format'=>['integer'],
            ],
            'cantidadmeses',
            'cantidaddias',
            // 'usuariocrea',
            // 'fechacrea',
            // 'usuariomodifica',
            // 'fechamodifica',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
