<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%publications_in_project}}`.
 */
class m260610_081054_create_publications_in_project_table extends Migration
{
    /**
     * {@inheritdoc}
     */
   public function safeUp()
    {
        $this->createTable('publications_in_project', [

            'project_id' => $this->integer()->notNull(),
            'publications_id' => $this->integer()->notNull(),
        ]);

        $this->batchInsert(
            'publications_in_project',
            ['project_id', 'publications_id'],
            [
                [1, 1],
                [1, 2],
                [3, 3],
                [4, 4],
                [5, 5],
                [1, 6],
                [1, 7],
            ]
        );

    }

    public function safeDown()
    {
        $this->dropTable('publications_in_project');
    }
}
