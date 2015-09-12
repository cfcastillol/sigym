<?php

use yii\helpers\Html;
use yii\grid\GridView;
use kartik\alert\AlertBlock;

/* @var $this yii\web\View */
/* @var $searchModel app\models\EstadoSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Estados';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="estado-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php
    echo AlertBlock::widget([
        'type' => AlertBlock::TYPE_ALERT,
        'useSessionFlash' => true,
        'delay' => 3000,
    ]);
    ?>

    <p>
        <?= Html::a('Crear Estado', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?=
    GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'id',
            'estado',
            'usuariocrea',
            'fechacrea',
            'usuariomodifica',
            'fechamodifica',
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]);
    ?>

</div>
