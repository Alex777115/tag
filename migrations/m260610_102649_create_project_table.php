<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%project_descriptions}}`.
 */
class m260610_102649_create_project_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('project', [
            'id' => $this->primaryKey(),
            'project_id' => $this->bigInteger()->notNull(),
            'description' => $this->text()->notNull(),
            'period' => $this->integer()->notNull(),
        ]);

        $this->batchInsert(
            'project',
            ['project_id', 'description', 'period'],
            [
                [1, 'test_project_1 period 1', 1],
                [1, 'test_project_1 period 2', 2],
                [1, 'test_project_1 period 3', 3],
                [1, 'test_project_1 period 4', 4],

                [2, 'test_project_2 period 1', 1],
                [2, 'test_project_2 period 2', 2],
                [2, 'test_project_2 period 3', 3],
                [2, 'test_project_2 period 4', 4],
            ]
        );
    }

    public function safeDown()
    {
        $this->dropTable('project_descriptions');
    }
}
