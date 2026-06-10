<?php
namespace app\models;

use yii\db\ActiveRecord;

class MenuSettings extends ActiveRecord
{
    public static function tableName()
    {
        return 'menu_settings';
    }

    public function rules()
    {
        return [
            [['user_id', 'menu_item_id'], 'required'],
            [['user_id', 'menu_item_id'], 'integer'],
            ['is_visible', 'boolean'],
        ];
    }
}
