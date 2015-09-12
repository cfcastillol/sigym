<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Personamembresia */

$this->title = 'Asociar Membresía';
$this->params['breadcrumbs'][] = ['label' => 'Membresías asociadas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="personamembresia-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
