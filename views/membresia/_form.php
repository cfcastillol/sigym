<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;

/* @var $this yii\web\View */
/* @var $model app\models\Membresia */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="membresia-form">

    <?php $form = ActiveForm::begin(); ?>

    <?php echo $form->field($model, 'estadoid')->widget(Select2::classname(), [
        'data' => yii\helpers\ArrayHelper::map(app\models\Estado::find()->all(), 'id', 'estado'),
        'language' => 'es',
        'options' => ['placeholder' => 'Seleccione un estado ...'],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]); ?>

    <?= $form->field($model, 'membresia')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'descripcion')->textarea(['rows' => 6]) ?>
    
    <?= $form->field($model, 'valor')->textInput() ?>

    <?= $form->field($model, 'cantidadmeses')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Crear' : 'Actualizar', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
