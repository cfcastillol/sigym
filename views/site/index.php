<?php

/* @var $this yii\web\View */
 use yii\helpers\Html;
$this->title = 'El Gym';
?>
<div class="site-index">

    <div class="jumbotron">
        <h1>Felcitaciones!</h1>

        <p class="lead">Gracias por hacer parte del centro de acondicionamiento físico EL GYM...</p>

        <p><?= Html::a('Consulta tu membresía', ['personamembresia/consulta'],['target'=>'_blank','class'=>'btn btn-lg btn-success']); ?></p>
        
    </div>

    <div class="body-content">

        <div class="row">
            <div class="col-lg-4">
                <h2>Guía de ejercicios</h2>

                <p>Aquí puedes consultar los diferentes ejercicios de acuerdo al músculo que quieras ejercitar en tu rutina</p>

                <?= Html::a('Consultar >>', ['ejercicio/consulta'], ['class' => 'btn btn-info']) ?>
            </div>
<!--            <div class="col-lg-4">
                <h2></h2>

                <p></p>

                <p><a class="btn btn-default" href=""></a></p>
            </div>
            <div class="col-lg-4">
                <h2></h2>

                <p></p>

                <p><a class="btn btn-default" href=""></a></p>
            </div>-->
        </div>

    </div>
</div>
