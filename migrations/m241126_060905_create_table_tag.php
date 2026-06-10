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
            'tags_id' => $this->bigPrimaryKey(),

            'project_id' => $this->bigInteger()->notNull(),

            'tag' => $this->string(64)->notNull(),

            'count' => $this->integer()->notNull(),

            'publication_id' => $this->json()->null(),
        ]);

        $this->createIndex('idx-tags-project_id', 'tags', 'project_id');
        $this->createIndex('idx-tags-tag', 'tags', 'tag');
        $this->batchInsert('tags',
            ['tags_id', 'project_id', 'tag', 'count', 'publication_id'],
            [
                [4990, 1, 'редкий', 2, 1],
                [4991, 1, 'зеркальный', 2, 1],
                [4992, 1, 'солнечник', 2, 1],
                [4993, 1, 'случай', 2, 1],
                [4994, 2, 'вид', 2, 2],
                [4995, 2, 'ннцмба', 2, 2],
                [4996, 2, 'дво', 2, 2],
                [4997, 2, 'райна', 1, 2],
                [4998, 3, 'акватория', 1, 2],
                [4999, 3, 'приморье', 1, 2],
                [5000, 3, 'теплолюбивый', 1, 3],
                [5001, 3, 'тропический', 1, 3],
                [5002, 4, 'рыба', 1, 3],
                [5003, 4, 'обнаружить', 1, 3],
                [5004, 4, 'бухта', 1, 3],
                [5005, 4, 'валентин', 1, 4],
                [5006, 5, 'юговосток', 1, 4],
                [5007, 5, 'край', 1, 4],
                [5008, 5, 'первый', 1, 5],
                [5009, 5, 'фиксация', 1, 5],
                [5010, 2, 'данный', 1, 5],
                [5011, 2, 'район', 1, 5],
                [5012, 2, 'сообщать', 1, 5],
                [5013, 2, 'национальный', 1, 5],
                [5014, 2, 'научный', 1, 5],
            ]
        );
    }

    public function safeDown()
    {
        $this->dropTable('tags');
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
