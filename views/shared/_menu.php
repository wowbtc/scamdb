<?php
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;

NavBar::begin([
    'brandLabel' => Yii::$app->name,
    'brandUrl' => Yii::$app->homeUrl,
    'options' => [
        'class' => 'navbar-inverse navbar-fixed-top',
    ],
]);

$menu = [
    ['label' => Yii::t('menu', 'NAV_HOME'), 'url' => ['/main/default/index']],
    ['label' => Yii::t('menu', 'NAV_CONTACT'), 'url' => ['/main/contact/index']],
];

if(Yii::$app->user->isGuest){
    $menu[] = ['label' => Yii::t('menu', 'NAV_LOGIN'), 'url' => ['/user/default/login']];
} else {
    $menu[] = ['label' => Yii::t('menu', 'NAV_LOGOUT ({username})', ['username' => Yii::$app->user->identity->username]),
        'url' => ['/user/default/logout'], 'linkOptions' => ['data-method' => 'post']];
}
echo Nav::widget([
    'options' => ['class' => 'navbar-nav navbar-right'],
    'items' => $menu,
]);

NavBar::end();