<?php
$this->title = Yii::t('moduleMain', 'CONTACT_VIEW_TITLE');
$this->params['breadcrumbs'][] = $this->title;
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\captcha\Captcha;
?>
<div class="main-contact-index">
    <?php if(Yii::$app->session->hasFlash('contactFormSubmit')):?>
        <div class="alert alert-success">
            <?= Html::encode(Yii::t('moduleMain', 'CONTACT_CONTROLLER_FORM_SUBMIT_SUCCESS'))?>
        </div>
    <?php else: ?>
        <p><?= Html::encode(Yii::t('moduleMain', 'CONTACT_VIEW_FORM_ATTR'))?></p>
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <?php $form = ActiveForm::begin(['id' => 'contact-form']); ?>
                    <div class="panel-body">
                        <div class="form-group">
                            <?= $form->field($model, 'name')->textInput(['class' => 'form-control']) ?>
                        </div>
                        <div class="form-group">
                            <?= $form->field($model, 'email')->textInput(['class' => 'form-control']) ?>
                        </div>
                        <div class="form-group">
                            <?= $form->field($model, 'subject')->textInput(['class' => 'form-control']) ?>
                        </div>
                        <div class="form-group">
                            <?= $form->field($model, 'body')->textArea(['rows' => 6, 'class' => 'form-control']) ?>
                        </div>
                        <div class="form-group">
                            <?= $form->field($model, 'verifyCode')->widget(Captcha::className(), [
                                'captchaAction' => '/main/contact/captcha',
                                'template' => '<div class="row"><div class="col-lg-3">{image}</div><div class="col-lg-6">{input}</div></div>',
                            ]) ?>
                        </div>
                        <div class="form-group">
                            <?= Html::submitButton(Yii::t('moduleMain', 'CONTACT_VIEW_BUTTON_SUBMIT'),
                                ['class' => 'btn btn-success'])?>
                        </div>
                    </div>
                    <?php ActiveForm::end(); ?>
                </div>
            </div>
        </div>
    <?php endif; ?>
</div>