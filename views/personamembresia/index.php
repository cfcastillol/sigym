<?php

use yii\helpers\Html;
use yii\grid\GridView;
use kartik\select2\Select2; 
use kartik\date\DatePicker;
use kartik\alert\AlertBlock;

/* @var $this yii\web\View */
/* @var $searchModel app\models\PersonamembresiaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Membresías asociadas';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="personamembresia-index">

    <h1><?= Html::encode($this->title) ?></h1>
     <?php
        echo AlertBlock::widget([
         'type' => AlertBlock::TYPE_ALERT,
         'useSessionFlash' => true,
         'delay'     => 3000,
     ]);
     ?>

    <p>
        <?= Html::a('Asociar membresía', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            [
             'attribute' => 'documento',
             'value' => 'persona.documento',   
            ],
            [
                'attribute' => 'personaid',
                'value' => 'persona.nombrecompleto',
                'filter' => Select2::widget([
                    'name' => 'personaid',
                    'model' => $searchModel,
                    'attribute' => 'personaid',
                    'data' => yii\helpers\ArrayHelper::map(app\models\Persona::find()->all(), 'id', 'nombrecompleto'),
                    'options' => ['placeholder' => 'Seleccione...'],
                    'pluginOptions' => [
                        'allowClear' => true
                    ],
                ]),
                'options' => ['width' => '200px'],
            ],
            
            [
                'attribute' => 'membresiaid',
                'value' => 'membresia.membresia',
                'filter' => Select2::widget([
                    'name' => 'membresiaid',
                    'model' => $searchModel,
                    'attribute' => 'membresiaid',
                    'data' => yii\helpers\ArrayHelper::map(app\models\Membresia::find()->all(), 'id', 'membresia'),
                    'options' => ['placeholder' => 'Seleccione...'],
                    'pluginOptions' => [
                        'allowClear' => true
                    ],
                ]),
                'options' => ['width' => '200px'],
            ],
            
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
            
            [
                'attribute' => 'fechainicio',
                'value' => 'fechainicio',
                'format' => 'raw',
                'filter' => DatePicker::widget([
                    'attribute' => 'fechainicio',
                    'model' => $searchModel,
                    'language' => 'es CO',
                    'options' => ['placeholder' => 'Seleccione...'],
                    'pluginOptions' => [
                        'format' => 'yyyy-mm-dd',
                        'todayHighlight' => true
                    ]
                ]),
                'options' => ['width' => '200px'],
            ],
            
            [
                'attribute' => 'fechafin',
                'value' => 'fechafin',
                'format' => 'raw',
                'filter' => DatePicker::widget([
                    'attribute' => 'fechafin',
                    'model' => $searchModel,
                    'language' => 'es CO',
                    'options' => ['placeholder' => 'Seleccione...'],
                    'pluginOptions' => [
                        'format' => 'yyyy-mm-dd',
                        'todayHighlight' => true
                    ]
                ]),
                'options' => ['width' => '200px'],
            ],
            
            
            
            // 'usuariocrea',
            // 'fechacrea',
            // 'usuariomodifica',
            // 'fechamodifica',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
