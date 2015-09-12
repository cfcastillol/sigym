<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<div class="wrap">
    <?php
    NavBar::begin([
        'brandLabel' => 'El Gym',
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar navbar-default navbar-fixed-top',
        ],
    ]);
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-right'],
        'items' => [
            ['label' => 'Inicio', 'url' => ['/site/index']],
            //['label' => 'Contáctenos', 'url' => ['/site/contact']],
            ['label' => 'Asociar Membresías', 'url' => ['/personamembresia/index'], 'visible'=> !Yii::$app->user->isGuest],
             [
                'label' => 'Admin',
                'items' =>[ 
                    ['label' => 'Ejercicios', 'url' => ['/ejercicio/index']],
                    ['label' => 'Estados', 'url' => ['/estado/index']],
                    ['label' => 'Membresías', 'url' => ['/membresia/index']],
                    ['label' => 'Músculos', 'url' => ['/musculo/index']],
                    ['label' => 'Personas', 'url' => ['/persona/index']],
                    ['label' => 'Sexos', 'url' => ['/sexo/index']],
                    ['label' => 'Tipos de documento', 'url' => ['/tipodocumento/index']],
                ],
                'visible'=> !Yii::$app->user->isGuest
            ],
            Yii::$app->user->isGuest ?
                ['label' => 'Login', 'url' => ['/site/login']] :
                [
                    'label' => 'Logout (' . Yii::$app->user->identity->username . ')',
                    'url' => ['/site/logout'],
                    'linkOptions' => ['data-method' => 'post']
                ],
        ],
    ]);
    NavBar::end();
    ?>

    <div class="container">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= $content ?>
    </div>
</div>

<footer class="footer">
    <div class="container">
        <p class="pull-left">&copy; Desarrollado por <a href="http://www.midasingenieria.com" target="_blank">Midas Ingeniería</a> para El Gym <?= date('Y') ?></p>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
