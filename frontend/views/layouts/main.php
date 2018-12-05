<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use frontend\assets\AppAsset;
use common\widgets\Alert;


Yii::$app->view->registerJsFile('/assets/js/jquery.min.js');
Yii::$app->view->registerJsFile('/assets/js/popper.js');
Yii::$app->view->registerJsFile('/assets/js/bootstrap.min.js');
Yii::$app->view->registerJsFile('/assets/js/waypoints.min.js');
Yii::$app->view->registerJsFile('/assets/js/slick.min.js');
Yii::$app->view->registerJsFile('/assets/js/imgloaded.js'); //нужна
Yii::$app->view->registerJsFile('/assets/js/isotope.js');//нужна, собирает в кучу
Yii::$app->view->registerJsFile('/assets/js/jquery.magnific-popup.min.js');//нужна
Yii::$app->view->registerJsFile('/assets/js/jquery.counterup.min.js');
Yii::$app->view->registerJsFile('/assets/js/wow.min.js');//нужна
Yii::$app->view->registerJsFile('/assets/js/main.js');//нужна

//Yii::$app->view->registerCssFile('/assets/css/bootstrap.min.css');
Yii::$app->view->registerCssFile('/assets/css/font-awesome.min.css');
Yii::$app->view->registerCssFile('/assets/css/et-line.css');
Yii::$app->view->registerCssFile('/assets/css/ionicons.min.css');
Yii::$app->view->registerCssFile('/assets/css/slick.css');
Yii::$app->view->registerCssFile('/assets/css/magnific-popup.css');
Yii::$app->view->registerCssFile('/assets/css/animate.min.css');
Yii::$app->view->registerCssFile('/assets/css/main.css');

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
      <link href="/frontend/web/logo.jpg" rel="icon" type="image" />
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title>Волжский историко-краеведческий музей</title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<div class="wrap">
    <?php
    NavBar::begin([
        'brandLabel' => Главная,
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar-inverse navbar-fixed-top',
        ],
    ]);
    $menuItems = [
        ['label' => 'Контакты', 'url' => ['/site/about']],
        ['label' => 'Галерея', 'url' => ['/site/gallery']],
    ];
    if (Yii::$app->user->isGuest) {
        $menuItems[] = ['label' => 'Регистрация', 'url' => ['/site/signup']];
        $menuItems[] = ['label' => 'Войти', 'url' => ['/site/login']];
    } else {
        $menuItems[] = ['label' => 'Отправить свои ценности', 'url' => ['/site/contact']];
        $menuItems[] = '<li>'
            . Html::beginForm(['/site/logout'], 'post')
            . Html::submitButton(
                'Выйти (' . Yii::$app->user->identity->username . ')',
                ['class' => 'btn btn-link logout']
            )
            . Html::endForm()
            . '</li>';
    }
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-right'],
        'items' => $menuItems,
    ]);
    NavBar::end();
    ?>

    <div class="container">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= Alert::widget() ?>
        <?= $content ?>
    </div>
</div>



<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
