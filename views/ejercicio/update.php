<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Ejercicio */

$this->title = 'Actualizar Ejercicio: ' . ' ' . $model->ejercicio;
$this->params['breadcrumbs'][] = ['label' => 'Ejercicios', 'url' => ['index']];
$this->params['breadcrumbs'][] = 'Actualizar';
?>
<div class="ejercicio-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
