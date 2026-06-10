<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%menu}}`.
 */
class m260610_075309_create_menu_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
{
    $this->createTable('menu', [
        'id' => $this->primaryKey(),
        'label' => $this->string(255)->notNull(),
        'url' => $this->string(255)->notNull(),
    ]);

    $this->batchInsert('menu',
        ['label', 'url'],
        [
            ['Все проекты', '/site/index'],
            ['Облако тегов', '/publication/index'],
            ['Аналитика', '/project/index'],
            ['Анализ ChatGPT', '/tag/index'],
            ['Соцрейтинг', '/user/index'],
            ['Медиарейтинг', '/admin/menu/edit-menu'],
        ]
    );
}

public function safeDown()
{
    $this->dropTable('menu');
}
}
