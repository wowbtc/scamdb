<?php
namespace app\modules\user\models;

use Yii;
use yii\base\Model;

/**
 * Class LoginForm
 * @package app\modules\user\models
 */
class LoginForm extends Model
{
    public $username;
    public $password;
    public $rememberMe = true;

    private $_user = false;

    /**
     * @return array
     */
    public function rules()
    {
        return [
            [['username', 'password'], 'required'], //имя пользователя и пароль - обязательны
            ['rememberMe', 'boolean'], //запомнить меня - булевый тип!
            ['password', 'validatePassword'], //пароль должен быть валидным!
        ];
    }

    public function attributeLabels()
    {
        return [
            'username' => Yii::t('moduleUser', 'LOGIN_FORM_USERNAME'),
            'password' => Yii::t('moduleUser', 'LOGIN_FORM_PASSWORD'),
            'rememberMe' => Yii::t('moduleUser', 'LOGIN_FORM_RememberMe'),
        ];
    }

    public function validatePassword($attribute, $params)
    {
        if (!$this->hasErrors()) {
            $user = $this->getUser();

            if (!$user || !$user->validatePassword($this->password)) {
                $this->addError($attribute, Yii::t('moduleUser', 'LOGIN_FORM_USERNAME_OR_PASSWORD_INCORRECT'));
            }
        }
    }

    public function login()
    {
        if ($this->validate()) {
            return Yii::$app->user->login($this->getUser(), $this->rememberMe ? 3600*24*30 : 0);
        } else {
            return false;
        }
    }


    public function getUser()
    {
        if ($this->_user === false) {
            $this->_user = User::findByUsername($this->username);
        }

        return $this->_user;
    }
}