<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%menu_settings}}`.
 */
class m260610_075433_create_menu_settings_table extends Migration
{
    /**
     * {@inheritdoc}
     */
public function safeUp()
{
   $this->createTable('menu_settings', [
    'id' => $this->primaryKey(),
    'user_id' => $this->integer()->notNull(),
    'menu_item_id' => $this->integer()->notNull(),
    'is_visible' => $this->boolean()->notNull()->defaultValue(1),
    'created_at' => $this->timestamp()->defaultExpression('CURRENT_TIMESTAMP'),
]);

$this->batchInsert('menu_settings',
    ['user_id', 'menu_item_id', 'is_visible'],
    [
        [1, 1, 1],
        [1, 2, 1],
        [1, 3, 1],
        [1, 4, 1],

        [2, 1, 1],
        [2, 2, 1],
        [2, 3, 0],
        [2, 4, 1],

        [3, 1, 1],
        [3, 2, 0],
        [3, 3, 0],
        [3, 4, 1],

        [4, 1, 1],
        [4, 2, 1],
        [4, 3, 1],
        [4, 4, 1],

        [5, 1, 1],
        [5, 2, 1],
        [5, 3, 1],
        [5, 4, 0],
    ]
);
}

public function safeDown()
{
    $this->dropTable('menu_settings');
}
}
