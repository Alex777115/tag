<?php

use yii\db\Migration;

/**
 * Class m241126_054839_create_table_posts
 */
class m241126_054839_create_table_posts extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('posts', [
            'id' => $this->primaryKey(),
            'title' => $this->string()->notNull(),
            'name' => $this->text(),
            'key' => $this->text(),
            'public' => $this->text(),
            'tag' => $this->text(),
        ]);

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('news');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m241126_054839_create_table_posts cannot be reverted.\n";

        return false;
    }
    */
}
