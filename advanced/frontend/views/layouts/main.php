<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use frontend\assets\AppAsset;
use common\widgets\Alert;

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
        'brandLabel' => Yii::t('common','Blog'),
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar-inverse navbar-fixed-top',
        ],
    ]);
    $menuItems = [
        ['label' => Yii::t('yii','Home'), 'url' => ['/site/index']],
        ['label' => Yii::t('common','About'), 'url' => ['/site/about']],
    ];
    $menu_right = [];
    if (Yii::$app->user->isGuest) {
        $menu_right[] = ['label' => Yii::t('common','Signup'), 'url' => ['/site/signup']];
        $menu_right[] = ['label' => Yii::t('common','Login'), 'url' => ['/site/login']];
    } else {
        $menu_right[] = [
            'label' => '<img src="'.Yii::$app->params['avatar']['small'].'" style="height:20px;margin-right:10px;border-radius:10px;">'.Yii::$app->user->identity->username,
            // 'url' => ['/site/logout'],
            
            'items' => [
                ['label' => '<i class="fa fa-sign-out"></i>'.'退出','url' => ['/site/logout'],'linkOptions' => ['data-method' => 'post']],
                ['label' => '<i class="fa fa-credit-card"></i>'.'个人中心','url' => ['/site/logout'],'linkOptions' => ['data-method' => 'post']],
            ]
        ];
    }
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-left'],
        'items' => $menuItems,
    ]);    

    echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-right'],
        'encodeLabels' => false,
        'items' => $menu_right,
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

<footer class="footer">
    <div class="container">
        <p class="pull-left">&copy; My Company <?= date('Y') ?></p>

        <p class="pull-right"><?= Yii::powered() ?></p>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
