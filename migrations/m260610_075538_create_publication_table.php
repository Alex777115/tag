<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%publication}}`.
 */
class m260610_075538_create_publication_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('publication', [
            'publication_id' => $this->bigPrimaryKey(),

            'title' => $this->string(256)->notNull(),

            'content' => $this->text()->notNull(),

            'data' => $this->date()->notNull(),

            'source' => $this->string(512)->notNull(),
        ]);

        $this->batchInsert('publication',
            ['title', 'content', 'data', 'source'],
            [
                ['Байден призвал "закрыть" Трампа', 'Текст первого поста', '2024-10-23', ''],
                ['В природном парке "Тыва" фотоловушки засняли семью снежных барсов
', 'Описание новостей', '2024-05-11', ''],
                ['Армия Израиля за сутки уничтожила около 70 боевиков "Хезболлы"', 'Стартовый контент', '2024-01-20', ''],
                 ['"Атланта" обыграла "Монреаль" в стыковом матче плей-офф MLS', 'Текст первого поста', '2024-10-23', ''],
                ['Редкую тропическую рыбу заметили в акватории Приморья', 'Описание новостей', '2024-05-11', ''],
                ['В Сочи благоустраивают сквер на улице Лазарева', 'Стартовый контент', '2024-01-20', ''],
            ]
        );
    }

    public function safeDown()
    {
        $this->dropTable('publication');
    }
}
