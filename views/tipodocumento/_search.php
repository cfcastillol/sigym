<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\TipodocumentoSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tipodocumento-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'tipodocumento') ?>

    <?= $form->field($model, 'usuariocrea') ?>

    <?= $form->field($model, 'fechacrea') ?>

    <?= $form->field($model, 'usuariomodifica') ?>

    <?php // echo $form->field($model, 'fechamodifica') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
