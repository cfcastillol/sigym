<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Musculo */

$this->title = 'Actualizar Músculo: ' . ' ' . $model->musculo;
$this->params['breadcrumbs'][] = ['label' => 'Músculos', 'url' => ['index']];
$this->params['breadcrumbs'][] = 'Actualizar';
?>
<div class="musculo-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
