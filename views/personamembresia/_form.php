<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;
use kartik\date\DatePicker;

/* @var $this yii\web\View */
/* @var $model app\models\Personamembresia */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="personamembresia-form">

    <?php $form = ActiveForm::begin(); ?>

    <?php
    echo $form->field($model, 'personaid')->widget(Select2::classname(), [
        'data' => yii\helpers\ArrayHelper::map(app\models\Persona::find()->all(), 'id', 'nombrecedula'),
        'language' => 'es',
        'options' => ['placeholder' => 'Seleccione una persona ...'],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]);
    ?>

    <?php
    echo $form->field($model, 'membresiaid')->widget(Select2::classname(), [
        'data' => yii\helpers\ArrayHelper::map(app\models\Membresia::find()->all(), 'id', 'membresia'),
        'language' => 'es',
        'options' => ['placeholder' => 'Seleccione una membresía ...'],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]);
    ?>


    <?php
    echo $form->field($model, 'fechainicio')->widget(DatePicker::classname(), [
        'options' => ['placeholder' => 'Selecciones ...'],
        'pluginOptions' => [
            'autoclose' => true,
            'format' => 'yyyy-mm-dd'
        ]
    ]);
    ?>

    <div class="form-group">
    <?= Html::submitButton($model->isNewRecord ? 'Crear' : 'Actualizar', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

<?php ActiveForm::end(); ?>

</div>
