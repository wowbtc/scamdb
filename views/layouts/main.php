<?php
use yii\helpers\Html;
use app\assets\AppAsset;
/* @var $content string */
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
<?= $this->render('../shared/_menu')?>
    <div class="wrap">
        <div class="container">
            <?= $this->render('../shared/_breadcrumb') ?>
            <?= $content ?>
        </div>
    </div>
<?= $this->render('../shared/_footer')?>
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
