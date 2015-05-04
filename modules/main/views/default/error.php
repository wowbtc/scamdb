<?php
use yii\helpers\Html;
use yii\bootstrap\Collapse;
$this->title = $name;
$this->params['breadcrumbs'][] = '<span class="label label-danger">'.$this->name.'</span>';
?>
<div class="main-default-error">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="alert alert-danger">
                <?= nl2br(Html::encode($message))?>
            </div>
            <p>
                <?= Html::encode(Yii::t('moduleMain', 'ErrorContactForm'))?>
                <?= Html::encode(Yii::$app->params['adminEmail'])?>
            </p>
            <?= Collapse::widget([
                'items' => [
                    [
                        'label' => Yii::t('moduleMain', 'CollapseError'),
                        'content' => nl2br(Html::encode($exception)),
                        'contentOptions' => [],
                        'options' => [],
                    ],
                ],
            ])?>
        </div>
    </div>
</div>