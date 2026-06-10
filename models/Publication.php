<?php
// app/models/Publication.php
namespace app\models;

use yii\db\ActiveRecord;

class Publication extends ActiveRecord
{
    public static function tableName()
    {
        return 'publication';  // Имя таблицы для модели Publication
    }

    // Связь с промежуточной таблицей publications_in_project
    public function getPublicationsInProject()
    {
        return $this->hasMany(PublicationsInProject::class, ['publications_id' => 'publication_id']);
    }

    // Связь с Tag через publications_in_project
    public function getTags()
    {
        return $this->hasMany(Tag::class, ['project_id' => 'project_id'])
            ->via('publicationsInProject');  // Связь через publications_in_project
    }
}



