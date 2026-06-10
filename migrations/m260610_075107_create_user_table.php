<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%user}}`.
 */
class m260610_075107_create_user_table extends Migration
{
    /**
     * {@inheritdoc}
     */
 public function safeUp()
    {
        $this->createTable('user', [
            'id' => $this->primaryKey(),
            'username' => $this->string(250)->notNull()->unique(),
            'password' => $this->string(255)->notNull(),
            'role' => $this->string(255)->notNull()->defaultValue('user'),
        ]);

        // тестовые пользователи
        $this->batchInsert('user',
            ['username', 'password', 'role'],
            [
                [
                    'admin',
                    password_hash('123', PASSWORD_DEFAULT),
                    'admin'
                ],
                [
                    'Gastinha',
                    password_hash('Gastinh@', PASSWORD_DEFAULT),
                    'user'
                ]
            ]
        );
    }

    public function safeDown()
    {
        $this->dropTable('user');
    }
}
