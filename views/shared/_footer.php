<?php
use yii\helpers\Html;
?>
<footer class="footer">
    <div class="container">
        <p class="pull-left">
            &copy; <?= Html::encode(Yii::$app->name)?>
        </p>
        <p class="pull-right">
            SupportEmail:&nbsp;<?= Html::encode(Yii::$app->params['supportEmail'])?><br/>
            AdminEmail:&nbsp;<?= Html::encode(Yii::$app->params['adminEmail'])?>
        </p>
    </div>
</footer>