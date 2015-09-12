<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\alert\AlertBlock;

$this->title = 'Consultar Membresía';
$this->params['breadcrumbs'][] = $this->title;
?>

<?php
echo AlertBlock::widget([
    'type' => AlertBlock::TYPE_ALERT,
    'useSessionFlash' => true,
    'delay' => 3000,
]);
?>

<div class="persona-form">
    
    <h1>Consultar membresía</h1>
    
    <?php $form = ActiveForm::begin(); ?>
    
    <?= $form->field($model, 'documento')->textInput(['maxlength' => true, 'class' => 'form-control', 'placeholder' => 'Digite número de identificación sin puntos...']) ?>

    <div class="form-group">
        <?= Html::submitButton('Consultar', ['class' => 'btn btn-success']) ?>
    </div>
    <?php ActiveForm::end(); ?>
</div>

<?php
if (!$model->isNewRecord) {
    if ($membresia) {
        ?>
        <div class="table-responsive">
            <table class="table table-striped">
            <tr>
                <th>Documento</th>
                <th>Nombre</th>
                <th>Tipo de Membresía</th>
                <th>Estado de Membresía</th>
                <th>Fecha de Inicio Membresía</th>
                <th>Fecha de Fin Membresía</th>
            </tr>
            <tr>
                <td><?= $model->documento; ?></td>
                <td><?= $model->nombrecompleto; ?></td>
                <td><?= $membresia->membresia->membresia ?></td>
                <td><?= $membresia->estado->estado ?></td>
                <td><?= $membresia->fechainicio ?></td>
                <td><?= $membresia->fechafin ?></td>
            </tr>
            </table>
        </div>
<?php
    } else {
        echo'<div><p class= "bg-danger" style= "padding : 15px">No posee membresías activas</p></div>';
    }
}
?>