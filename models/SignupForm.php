<?php

namespace app\models;
use yii\base\Model;


class SignupForm extends Model
{
    public $username;
    public $password;

    public function rules()
    {
        return [
           [ ['username','password'],'required','message'=>'Заполните поля'],
           [ 'username','unique','targetClass'=> User::className(),'message'=>'Этот логин уже занят'],

        ];
    }
    public function attributeLabels()
    {
        return [
            'username'=>'Введите имя учетной записи',
            'password'=>'Введите пароль',
        ];
    }


}