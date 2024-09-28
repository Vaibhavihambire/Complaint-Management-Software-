<?php

/** @var yii\web\View $this */
/** @var string $content */

use app\assets\AppAsset;
use app\widgets\Alert;
use yii\bootstrap5\Breadcrumbs;
use yii\bootstrap5\Html;
use yii\bootstrap5\Nav;
use yii\bootstrap5\NavBar;

AppAsset::register($this);

$this->registerCsrfMetaTags();
$this->registerMetaTag(['charset' => Yii::$app->charset], 'charset');
$this->registerMetaTag(['name' => 'viewport', 'content' => 'width=device-width, initial-scale=1, shrink-to-fit=no']);
$this->registerMetaTag(['name' => 'description', 'content' => $this->params['meta_description'] ?? '']);
$this->registerMetaTag(['name' => 'keywords', 'content' => $this->params['meta_keywords'] ?? '']);
$this->registerLinkTag(['rel' => 'icon', 'type' => 'image/x-icon', 'href' => Yii::getAlias('@web/favicon.ico')]);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>" class="h-100">
<head>
    <title><?= Html::encode("CMS | Complaint Management System") ?></title>
    <?php $this->head() ?>
</head>
<body class="d-flex flex-column h-100">
<?php $this->beginBody() ?>

<header id="header">

<?php
$canCreateUser = Yii::$app->user->can('create-user');
Yii::info('Can create user: ' . ($canCreateUser ? 'Yes' : 'No'), 'permissions');
 // Output the result
?>


    <?php
    NavBar::begin([
        'brandLabel' => 'CMS',
        'brandUrl' => Yii::$app->homeUrl,
        'options' => ['class' => 'navbar-expand-md navbar-dark bg-dark fixed-top']
    ]);
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav'],
        'items' => [
            ['label' => 'Home', 'url' => ['/site/index']],
            ['label' => 'Complaints', 'url' => ['/user-complaint'],'visible' => !Yii::$app->user->isGuest],
            ['label' => 'Manage Users', 'url' => ['/users'],
            'items' => [
                ['label' => 'View All Users', 'url' => ['/user'],'visible' => Yii::$app->user->can('create-user') ],
                ['label' => 'Add New User', 'url' => ['/user/create'],'visible' => Yii::$app->user->can('create-user') ],
                ['label' => 'Edit permissions of existing users', 'url' => ['/user/edit'],'visible' => Yii::$app->user->can('create-user')],
                
                // ['label' => 'TE', 'url' => '#', 'visible' => !Yii::$app->user->isGuest]
            ],
            'visible' => Yii::$app->user->can('create-user')],
            ['label' => 'Create Engineer', 'url' => ['/eng'],
            'visible' => Yii::$app->user->can('create-user')],
            [
                'label' => 'logs',
                'url' => ['/misc'],
                'items' => [
                    ['label' => 'View audit logs', 'url' => ['/logs/index'] ,'visible' => Yii::$app->user->can('admin')],
                    ['label' => 'Change Password', 'url' => ['/user/change','id' => Yii::$app->user->id]],
                ],
                'visible' => !Yii::$app->user->isGuest
            ],
            Yii::$app->user->isGuest
                ? ['label' => 'Login', 'url' => ['/site/login']]
                : '<li class="nav-item">'
                    . Html::beginForm(['/site/logout'])
                    . Html::submitButton(
                        'Logout (' . Yii::$app->user->identity->username . ')',
                        ['class' => 'nav-link btn btn-link logout']
                    )
                    . Html::endForm()
                    . '</li>'
        ]
    ]);
    NavBar::end();
    ?>
</header>

<main id="main" class="flex-shrink-0" role="main">
    <div class="container">
        <?php if (!empty($this->params['breadcrumbs'])): ?>
            <?= Breadcrumbs::widget(['links' => $this->params['breadcrumbs']]) ?>
        <?php endif ?>
        <?= Alert::widget() ?>
        <?= $content ?>
    </div>
</main>



<footer id="footer" class="mt-auto py-3 bg-light">
    <div class="container">
        <div class="row text-muted">
            <div class="col-md-6 text-center text-md-start">&copy; cms <?= date('Y') ?></div>
            <!-- <div class="col-md-6 text-center text-md-end"><?= Yii::powered() ?></div> -->
        </div>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
