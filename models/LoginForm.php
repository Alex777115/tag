<?php
//
//namespace app\models;
//
//use Yii;
//use yii\base\Model;
//
///**
// * LoginForm is the model behind the login form.
// *
// * @property-read User|null $user
// *
// */
//class LoginForm extends Model
//{
//    public $username;
//    public $password;
//    public $rememberMe = true;
//
//    private $_user = false;
//
//
//    /**
//     * @return array the validation rules.
//     */
//    public function rules()
//    {
//        return [
//            // username and password are both required
//            [['username', 'password'], 'required'],
//            // rememberMe must be a boolean value
//            ['rememberMe', 'boolean'],
//            // password is validated by validatePassword()
//            ['password', 'validatePassword'],
//        ];
//    }
//
//
//    public function validatePassword($attribute, $params)
//    {
//        if (!$this->hasErrors()) {
//            $user = $this->getUser();
//
//            if (!$user || !$user->validatePassword($this->password)) {
//                $this->addError($attribute, 'Incorrect username or password.');
//            }
//        }
//    }
//
//
//    public function login()
//    {
//        if ($this->validate()) {
//            return Yii::$app->user->login($this->getUser(), $this->rememberMe ? 3600*24*30 : 0);
//        }
//        return false;
//    }
//
//
//    public function getUser()
//    {
//        if ($this->_user === false) {
//            $this->_user = User::findByUsername($this->username);
//        }
//
//        return $this->_user;
//    }
//
//    public function attributeLabels()
//    {
//        return [
//            'username'=>'Введите имя учетной записи',
//            'password'=>'Введите пароль',
//            'rememberMe'=>'Запомнть меня'
//        ];
//    }
//}

namespace app\models;

use Yii;
use yii\base\Model;
use app\models\User;

class LoginForm extends Model
{
    public $username;
    public $password;
    public $rememberMe = true;

    private $_user = false;

    /**
     * @return array the validation rules.
     */
    public function rules()
    {
        return [
            [['username', 'password'], 'required'],
            ['rememberMe', 'boolean'],
            ['password', 'validatePassword'],
        ];
    }

    public function validatePassword($attribute, $params)
    {
        if (!$this->hasErrors()) {
            $user = $this->getUser();

            if (!$user || !$user->validatePassword($this->password)) {
                $this->addError($attribute, 'Incorrect username or password.');
            }
        }
    }

    public function login()
    {
        if ($this->validate()) {
            // Получаем пользователя
            $user = $this->getUser();

            // Логиним пользователя
            if (Yii::$app->user->login($user, $this->rememberMe ? 3600 * 24 * 30 : 0)) {
                // Если пользователь админ
                if ($user->role === 'admin') {
                    // Перенаправляем на страницу админ модуля
                    return Yii::$app->response->redirect(['/admin/default/index']);
                }
                // Для обычного пользователя — на домашнюю страницу
                return Yii::$app->response->redirect(['site/index']);
            }
        }
        return false;
    }

    public function getUser()
    {
        if ($this->_user === false) {
            $this->_user = User::findByUsername($this->username);
        }

        return $this->_user;
    }

    public function attributeLabels()
    {
        return [
            'username' => 'Введите имя учетной записи',
            'password' => 'Введите пароль',
            'rememberMe' => 'Запомнить меня'
        ];
    }
}


