<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Sexo */

$this->title = $model->sexo;
$this->params['breadcrumbs'][] = ['label' => 'Sexos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="sexo-view">

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
            'sexo',
            'usuariocrea',
            'fechacrea',
            'usuariomodifica',
            'fechamodifica',
        ],
    ]) ?>

</div>
