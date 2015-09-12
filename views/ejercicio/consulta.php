<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\alert\AlertBlock;
use kartik\select2\Select2;
use app\models\Helper;

$this->title = 'Consultar ejercicios';
$this->params['breadcrumbs'][] = $this->title;
?>

<?php
echo AlertBlock::widget([
    'type' => AlertBlock::TYPE_ALERT,
    'useSessionFlash' => true,
    'delay' => 3000,
]);
?>


<div class="ejercicio-form">
    
    <h1>Consultar ejercicios</h1>
    
    <?php $form = ActiveForm::begin(); ?>

    <?php
    echo $form->field($model, 'musculoid')->widget(Select2::classname(), [
        'data' => yii\helpers\ArrayHelper::map(app\models\Musculo::find()->all(), 'id', 'musculo'),
        'language' => 'es',
        'options' => ['placeholder' => 'Seleccione un músculo...'],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]);
    ?>

    <div class="form-group">
    <?= Html::submitButton('Consultar', ['class' => 'btn btn-success']) ?>
    </div>
<?php ActiveForm::end(); ?>
</div>


<?php if ($model->musculoid) { ?>

<?php if ($ejercicios) { ?>
    <div class="table-responsive">
        <table class="table table-striped">
            <tr>
                <th>Músculo</th>
                <th>Nombre del ejercicio</th>
                <th>Descripción</th>
                <th></th>
            </tr>
            
            <?php foreach ($ejercicios as $key => $value) { ?>
            
            <tr>
                <td><?= $value->musculo->musculo; ?></td>
                <td><?= $value->ejercicio; ?></td>
                <td><?= Helper::myTruncate($value->descripcion, 500) ?></td>
                <td><?= Html::a('Ver', ['ejercicio/view', 'id' => $value->id], ['class' => 'btn btn-primary']) ?></td>
            </tr>
            
            <?php } ?>
            
        </table>
    </div>
    <?php
}
?>
    <?php
}
?>