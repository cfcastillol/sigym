<?php 
    use yii\helpers\Html;
    $this->title = 'Administración';
    $this->params['breadcrumbs'][] = $this->title;
?>

<div class="col-md-12">
    <h2>Panel de Administración de variables</h2>
    <ul>
        <li>
            <?= Html::a('Ejercicios', ['/ejercicio/index']); ?>
        </li>
        <li>
            <?= Html::a('Estados', ['/estado/index']); ?>
        </li>
        <li>
            <?= Html::a('Membresías', ['/membresia/index']); ?>
        </li>
        <li>
            <?= Html::a('Músculos', ['/musculo/index']); ?>
        </li>
        <li>
            <?= Html::a('Personas', ['/persona/index']); ?>
        </li>
        <li>
            <?= Html::a('Sexos', ['/sexo/index']); ?>
        </li>
        <li>
            <?= Html::a('Tipos de documento', ['/tipodocumento/index']); ?>
        </li>
    </ul>
</div>

