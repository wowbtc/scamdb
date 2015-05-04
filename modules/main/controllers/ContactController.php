<?php
namespace app\modules\main\controllers;

use yii\web\Controller;
use Yii;
use app\modules\main\models\ContactForm;

class ContactController extends Controller
{
    public function actions()
    {
        return [
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }
    public function actionIndex()
    {
        $contact_form_model = new ContactForm();
        if($contact_form_model->load(Yii::$app->request->post()) && $contact_form_model->contact(Yii::$app->params['adminEmail']))
        {
            Yii::$app->session->setFlash('contactFormSubmit');
            return $this->refresh();
        } else {
            return $this->render('index', [
                'model' => $contact_form_model,
            ]);
        }
    }
}