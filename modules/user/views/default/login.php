<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = Yii::t('moduleUser', 'LOGIN_VIEW_TITLE');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-default-login">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <?php $form = ActiveForm::begin([
                    'id' => 'login-form',
                ]); ?>
                <div class="panel-body">
                    <div class="form-group">
                        <?= $form->field($model, 'username')->textInput(['class' => 'form-control']) ?>
                    </div>
                    <div class="form-group">
                        <?= $form->field($model, 'password')->passwordInput(['class' => 'form-control']) ?>
                    </div>
                    <div class="form-group">
                        <?= $form->field($model, 'rememberMe', [
                            'template' => "<div class=\"col-lg-offset-1 col-lg-3\">{input}</div>\n<div class=\"col-lg-8\">{error}</div>",
                        ])->checkbox() ?>
                    </div>
                    <div class="form-group">
                        <?= Html::submitButton(Yii::t('moduleUser', 'LOGIN_VIEW_BUTTON_SUBMIT'), ['class' => 'btn btn-primary', 'name' => 'login-button']) ?>
                    </div>
                </div>
                <?php ActiveForm::end(); ?>
            </div>
        </div>
    </div>
</div>