<?php
// app/models/PublicationsInProject.php
namespace app\models;

use yii\db\ActiveRecord;

class PublicationsInProject extends ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'publications_in_project';  // Название таблицы в базе данных
    }

    /**
     * Связь с таблицей Publication
     */
    public function getPublication()
    {
        return $this->hasOne(Publication::class, ['publication_id' => 'publications_id']);
    }

    /**
     * Связь с таблицей Tag
     */
    public function getTags()
    {
        return $this->hasMany(Tag::class, ['project_id' => 'project_id']);
    }
}



