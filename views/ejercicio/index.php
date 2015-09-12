<?php

use yii\helpers\Html;
use yii\grid\GridView;
use kartik\alert\AlertBlock;
use kartik\select2\Select2;

/* @var $this yii\web\View */
/* @var $searchModel app\models\EjercicioSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Ejercicios';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ejercicio-index">

    <h1><?= Html::encode($this->title) ?></h1>
    
    <?php
        echo AlertBlock::widget([
         'type' => AlertBlock::TYPE_ALERT,
         'useSessionFlash' => true,
         'delay'     => 3000,
     ]);
     ?>
    
    <p>
        <?= Html::a('Crear Ejercicio', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <div class="table table-responsive">
        <?=
        GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],
                //'id',
                [
                    'attribute' => 'musculoid',
                    'value' => 'musculo.musculo',
                    'filter' => Select2::widget([
                        'name' => 'musculoid',
                        'model' => $searchModel,
                        'attribute' => 'musculoid',
                        'data' => yii\helpers\ArrayHelper::map(app\models\Musculo::find()->all(), 'id', 'musculo'),
                        'options' => ['placeholder' => 'Seleccione...'],
                        'pluginOptions' => [
                            'allowClear' => true
                        ],
                    ]),
                    'options' => ['width' => '200px'],
                ],
                'ejercicio',
                //'descripcion:ntext',
                //'imagen',
                //'video',
                // 'usuariocrea',
                // 'fechacrea',
                // 'usuariomodifica',
                // 'fechamodifica',
                ['class' => 'yii\grid\ActionColumn'],
            ],
        ]);
        ?>
    </div>
</div>
