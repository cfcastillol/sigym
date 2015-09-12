<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Personamembresia */

$this->title = 'Actualizar membresía: ' . ' ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Membresías asociadas', 'url' => ['index']];
$this->params['breadcrumbs'][] = 'Actualizar';
?>
<div class="personamembresia-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
