<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Tipodocumento */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tipodocumento-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'abreviatura')->textInput(['maxlength' => true]) ?>
    
    <?= $form->field($model, 'tipodocumento')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Crear' : 'Actualizar', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
