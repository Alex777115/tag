<?php

use yii\db\Migration;

/**
 * Class m241126_060905_create_table_tag
 */
class m241126_060905_create_table_tag extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('tags', [
            'id' => $this->primaryKey(),
            'name' => $this->text()->notNull(),
            'frequency' => $this->string()->notNull(),

        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m241126_060905_create_table_tag cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m241126_060905_create_table_tag cannot be reverted.\n";

        return false;
    }
    */
}
