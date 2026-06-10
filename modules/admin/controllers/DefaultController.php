<?php

namespace app\modules\admin\controllers;

use app\controllers\AppController;
use app\models\Post;
use yii\filters\AccessControl;


class DefaultController extends AppController
{
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::class,
                'only' => ['index'],
                'rules' => [
                    [
                        'actions' => ['index'],
                        'allow' => true,
                        'roles' => ['@'], // Доступ только для аутентифицированных пользователей
                    ],
                ],
            ],
        ];
    }

    public function actionIndex()

    {
        $posts = Post::find()->all();
        return $this->render('index', compact('posts'));
    }
}

