<?php
namespace app\models;

use yii\db\ActiveRecord;

class Menu extends ActiveRecord
{
    /**
     * Возвращает имя таблицы в базе данных.
     *
     * @return string
     */
    public static function tableName()
    {
        return 'menu';
    }

    /**
     * Правила валидации для модели.
     *
     * @return array
     */
    public function rules()
    {
        return [
            [['label', 'url'], 'required'],
            ['label', 'string', 'max' => 255],
            ['url', 'string', 'max' => 255],
        ];
    }

    /**
     * Атрибуты модели.
     *
     * @return array
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'label' => 'Название пункта меню',
            'url' => 'URL',
        ];
    }
}
