<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Personamembresia */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Membresías asociadas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="personamembresia-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Actualizar', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Eliminar', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Está seguro que desea eliminar este item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'personaid',
            'membresiaid',
            'estado.estado',
            'fechainicio',
            'fechafin',
            //'usuariocrea',
            //'fechacrea',
            //'usuariomodifica',
            //'fechamodifica',
        ],
    ]) ?>

</div>
