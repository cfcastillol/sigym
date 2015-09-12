<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Ejercicio */

$this->title = $model->ejercicio;

if (!Yii::$app->user->isGuest) {
    $this->params['breadcrumbs'][] = ['label' => 'Ejercicios', 'url' => ['index']];
}

$this->params['breadcrumbs'][] = ['label' => 'Consultar ejercicios', 'url' => ['consulta']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ejercicio-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?php if (!Yii::$app->user->isGuest) { ?>
            <?= Html::a('Actualizar', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
            <?=
            Html::a('Eliminar', ['delete', 'id' => $model->id], [
                'class' => 'btn btn-danger',
                'data' => [
                    'confirm' => 'Está seguro que quiere eliminar este registro?',
                    'method' => 'post',
                ],
            ])
            ?>
        <?php } ?>
    </p>


    <div class="row">

        <?= Html::img(Yii::$app->homeUrl . $model->imagen, ['class' => 'thumb pull-left img-thumbnail img-responsive', 'width' => '30%']) ?>

        <p class="text-justify"><?php echo $model->descripcion; ?></p> 

    </div>

    <div class="row">

        <div class="col-md-2 hidden-xs"></div>
        <div class="col-md-8 col-xs-12">
            <div class="video-responsive">
                <?php echo $model->video; ?>
            </div>
        </div>
        <div class="col-md-2 hidden-xs"></div>

    </div>



</div>
