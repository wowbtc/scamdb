<?php
namespace app\modules\main\models;

use Yii;
use yii\base\Model;

/**
 * Class ContactForm
 * @package app\modules\main\models
 */
class ContactForm extends Model
{
    public $name;
    public $email;
    public $subject;
    public $body;
    public $verifyCode;

    /**
     * @return array
     */
    public function rules()
    {
        return [
            [['name', 'email', 'subject', 'body'], 'required'], //обязательные поля
            ['email', 'email'], // поле с email'ом - валидное!
            ['verifyCode', 'captcha', 'captchaAction' => '/main/contact/captcha'], //капча верная!
        ];
    }

    /**
     * @return array
     */
    public function attributeLabels()
    {
        return [
            'name' => Yii::t('moduleMain', 'CONTACT_FORM_NAME'),
            'email' => Yii::t('moduleMain', 'CONTACT_FORM_EMAIL'),
            'subject' => Yii::t('moduleMain', 'CONTACT_FORM_SUBJECT'),
            'body' => Yii::t('moduleMain', 'CONTACT_FORM_BODY'),
            'verifyCode' => Yii::t('moduleMain', 'CONTACT_FORM_VerifyCode'),
        ];
    }

    /**
     * @param $email
     * @return bool
     */
    public function contact($email)
    {
        if ($this->validate()) {
            Yii::$app->mailer->compose()
                ->setTo($email)
                ->setFrom([Yii::$app->params['supportEmail'] => Yii::$app->name])
                ->setReplyTo([$this->email => $this->name])
                ->setSubject($this->subject)
                ->setTextBody($this->body)
                ->send();

            return true;
        } else {
            return false;
        }
    }
}