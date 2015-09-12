<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Membresia */

$this->title = 'Actualizar Membresía: ' . ' ' . $model->membresia;
$this->params['breadcrumbs'][] = ['label' => 'Membresías', 'url' => ['index']];
$this->params['breadcrumbs'][] = 'Actualizar';
?>
<div class="membresia-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
