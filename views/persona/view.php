<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Persona */

$this->title = $model->primernombre.' '.$model->primerapellido;
$this->params['breadcrumbs'][] = ['label' => 'Personas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="persona-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Actualizar', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Eliminar', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Esta seguro que quiere eliminar este item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'tipodocumentoid',
            'documento',
            'primernombre',
            'segundonombre',
            'primerapellido',
            'segundoapellido',
            'direccion',
            'telefono',
            'email:email',
            'estatura',
            'peso',
            'edad',
            'imc',
            'pgc',
            'usuariocrea',
            'fechacrea',
            'usuariomodifica',
            'fechamodifica',
        ],
    ]) ?>

</div>
