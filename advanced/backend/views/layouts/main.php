<?php

/* @var $this \yii\web\View */
/* @var $content string */

use backend\assets\AppAsset;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
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
    $menu_left = [
        ['label' => '文章管理', 'url' => ['/article/index'],'items' => 
            [
                ['label' => '<i class="fa fa-sign-out"></i>'.'文章列表','url' => ['/article/index'],'linkOptions' => ['data-method' => 'post']],
                ['label' => '<i class="fa fa-credit-card"></i>'.'文章标签','url' => ['/article-targs/index'],'linkOptions' => ['data-method' => 'post']],
                ['label' => '<i class="fa fa-credit-card"></i>'.'文章分类','url' => ['/cats/index'],'linkOptions' => ['data-method' => 'post']],
            ]
        ],
        ['label' => '权限管理', 'url' => ['/auth/index'],'items' => 
            [
                ['label' => '<i class="fa fa-sign-out"></i>'.'管理员','url' => ['/admin/index'],'linkOptions' => ['data-method' => 'post']],
                ['label' => '<i class="fa fa-sign-out"></i>'.'权限','url' => ['/auth/index'],'linkOptions' => ['data-method' => 'post']],
                ['label' => '<i class="fa fa-credit-card"></i>'.'角色','url' => ['/auth-role/index'],'linkOptions' => ['data-method' => 'post']],
                ['label' => '<i class="fa fa-credit-card"></i>'.'角色权限','url' => ['/auth-role-auth/index'],'linkOptions' => ['data-method' => 'post']],
            ]
        ],
    ];  

    if (!Yii::$app->user->id) {
        $menu_left = [];
    }  

    $menuItems = [
        // ['label' => Yii::t('yii','Home'), 'url' => ['/site/index']],
    ];
    if (Yii::$app->user->isGuest) {
        $menuItems[] = ['label' => Yii::t('common','Login'), 'url' => ['/site/login']];
    } else {
        $menuItems[] = [
            'label' => '退出登录 (' . Yii::$app->user->identity->username . ')',
            'url' => ['/site/logout'],
            'linkOptions' => ['data-method' => 'post']
        ];
    }
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-left'],
        'items' => $menu_left,
        'encodeLabels' => false,
    ]);

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
<?php $this->registerJsFile('@web//static/js/function.js'); ?>
    




