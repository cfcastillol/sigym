<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;

/* @var $this yii\web\View */
/* @var $model app\models\Ejercicio */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="ejercicio-form">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

    <?= $form->field($model, 'ejercicio')->textInput(['maxlength' => true]) ?>
    
    <?php echo $form->field($model, 'musculoid')->widget(Select2::classname(), [
        'data' => yii\helpers\ArrayHelper::map(app\models\Musculo::find()->all(), 'id', 'musculo'),
        'language' => 'es',
        'options' => ['placeholder' => 'Seleccione...'],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]); ?>

    <?= $form->field($model, 'descripcion')->textarea(['rows' => 6]) ?>

    <?php
        if($model->isNewRecord == FALSE and !empty($model->image)){
          echo Html::img('@web/'.$model->imagen, ['alt'=>$model->category,'class'=>'img-responsive imagenes']);
        }
    ?>
    
    <?= $form->field($model, 'archivo')->fileInput() ?>

    <?= $form->field($model, 'video')->textArea() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Crear' : 'Actualizar', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
