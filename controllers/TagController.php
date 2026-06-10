<?php

namespace app\controllers;



use app\models\Publication;
use app\models\Tag;
use yii\web\Controller;
use yii\filters\AccessControl;


class TagController extends Controller
{


    public function actionTag()
    {
        $tags = Tag::find()->all();
        return $this->render('tag', compact('tags'));
    }


    public function actionTag_2()
    {

        $tags_2 = Tag::find()->select(['tag', 'count'])->asArray()->all();

        foreach ($tags_2 as &$tag) {
            $tag['url'] = \yii\helpers\Url::to(['tag/tag-posts', 'tag' => $tag['tag']]);
        }


        return $this->render('tag_2', [
            'tags_2' => $tags_2,
        ]);
    }


    public function actionTagPosts($tag)
    {
        // Получаем все публикации для данного тега
        $publications = Publication::find()
            ->innerJoinWith('publicationsInProject')
            ->innerJoinWith('tags')
            ->where(['tags.tag' => $tag])
            ->all();

        if (!$publications) {

            throw new \yii\web\NotFoundHttpException('Публикации не найдены для данного тега.');
        }

        return $this->render('tag-posts', [
            'publications' => $publications,
            'tag' => $tag
        ]);
    }
}



