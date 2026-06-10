<?php
namespace app\models;

use Yii;
use yii\db\ActiveRecord;

class Tag extends ActiveRecord
{
    public static function tableName()
    {
        return 'tags'; // Указываем название таблицы
    }

    // Связь с таблицей publications_in_project
    public function getPublicationInProjects()
    {
        return $this->hasMany(PublicationInProject::class, ['project_id' => 'project_id']);
    }

    // Связь с Publication через publications_in_project
    public function getPublications()
    {
        return $this->hasMany(Publication::class, ['project_id' => 'project_id'])
            ->via('publicationsInProject');
    }





}
