<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;

/* @var $this yii\web\View */
/* @var $model app\models\Persona */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="persona-form">

    <?php $form = ActiveForm::begin(); ?>
    
    <?php echo $form->field($model, 'tipodocumentoid')->widget(Select2::classname(), [
        'data' => yii\helpers\ArrayHelper::map(app\models\Tipodocumento::find()->all(), 'id', 'tipodocumento'),
        'language' => 'es',
        'options' => ['placeholder' => 'Seleccione...'],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]); ?>
    
    <?= $form->field($model, 'documento')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'primernombre')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'segundonombre')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'primerapellido')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'segundoapellido')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'direccion')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'telefono')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>
    
    <?php echo $form->field($model, 'sexoid')->widget(Select2::classname(), [
        'data' => yii\helpers\ArrayHelper::map(app\models\Sexo::find()->all(), 'id', 'sexo'),
        'language' => 'es',
        'options' => ['placeholder' => 'Seleccione...'],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]); ?>

    <?= $form->field($model, 'estatura')->textInput() ?>

    <?= $form->field($model, 'peso')->textInput() ?>

    <?= $form->field($model, 'edad')->textInput() ?>

 
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Crear' : 'Actualizar', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
