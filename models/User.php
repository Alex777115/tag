<?php

namespace app\models;

use yii\db\ActiveRecord;
use yii\web\IdentityInterface;

class User extends ActiveRecord implements IdentityInterface
{
    // Добавим свойство для нового поля
    public $can_view_tags_cloud;

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%user}}'; // Убедитесь, что таблица называется user
    }

    /**
     * {@inheritdoc}
     */
    public static function findIdentity($id)
    {
        return static::findOne([$id]);
    }

    /**
     * {@inheritdoc}
     */
    public static function findIdentityByAccessToken($token, $type = null)
    {
        // Ваш код для поиска по токену, если необходимо
    }

    /**
     * Finds user by username
     *
     * @param string $username
     * @return static|null
     */
    public static function findByUsername($username)
    {
        return static::findOne(['username' => $username]);
    }

    /**
     * {@inheritdoc}
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * {@inheritdoc}
     */
    public function getAuthKey()
    {
        // Верните authKey, если он есть
    }

    /**
     * {@inheritdoc}
     */
    public function validateAuthKey($authKey)
    {
        // Проверка authKey, если необходимо
    }

    /**
     * Validates password
     *
     * @param string $password password to validate
     * @return bool if password provided is valid for current user
     */
    public function validatePassword($password)
    {
        return \Yii::$app->security->validatePassword($password, $this->password);
    }

    /**
     * Возвращает правило для валидации поля can_view_tags_cloud
     *
     * @return array
     */
    public function rules()
    {
        return [
            [['can_view_tags_cloud'], 'boolean'],
        ];
    }
}
