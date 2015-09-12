<?php

use yii\helpers\Html;
use yii\grid\GridView;
use kartik\alert\AlertBlock;
use kartik\select2\Select2;

/* @var $this yii\web\View */
/* @var $searchModel app\models\PersonaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Personas';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="persona-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php
        echo AlertBlock::widget([
         'type' => AlertBlock::TYPE_ALERT,
         'useSessionFlash' => true,
         'delay'     => 3000,
     ]);
     ?>

    <p>
        <?= Html::a('Crear Persona', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            [
                'attribute' => 'tipodocumentoid',
                'value' => 'tipodocumento.tipodocumento',
                'filter' => Select2::widget([
                    'name' => 'tipodocumentoid',
                    'model' => $searchModel,
                    'attribute' => 'tipodocumentoid',
                    'data' => yii\helpers\ArrayHelper::map(app\models\Tipodocumento::find()->all(), 'id', 'tipodocumento'),
                    'options' => ['placeholder' => 'Seleccione...'],
                    'pluginOptions' => [
                        'allowClear' => true
                    ],
                ]),
                'options' => ['width' => '200px'],
            ],
            'documento',
            'primernombre',
            'segundonombre',
            'primerapellido',
            'segundoapellido',
            [
                'attribute' => 'sexoid',
                'value' => 'sexo.sexo',
                'filter' => Select2::widget([
                    'name' => 'sexoid',
                    'model' => $searchModel,
                    'attribute' => 'sexoid',
                    'data' => yii\helpers\ArrayHelper::map(app\models\Sexo::find()->all(), 'id', 'sexo'),
                    'options' => ['placeholder' => 'Seleccione...'],
                    'pluginOptions' => [
                        'allowClear' => true
                    ],
                ]),
                'options' => ['width' => '200px'],
            ],
            //'telefono',
            //'email:email',
            // 'estatura',
            // 'peso',
            // 'edad',
            // 'imc',
            // 'pgc',
            // 'usuariocrea',
            // 'fechacrea',
            // 'usuariomodifica',
            // 'fechamodifica',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
