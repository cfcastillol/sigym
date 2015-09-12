<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Musculo */

$this->title = 'Crear Músculo';
$this->params['breadcrumbs'][] = ['label' => 'Músculos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="musculo-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
