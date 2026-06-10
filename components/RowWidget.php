<?php

namespace app\components;
use app\models\Post;
use yii\base\Widget;


class RowWidget extends Widget
{
public function run()
{
    $rows = Post::find()->select('title')->all();
    return $this->render('rows', compact('rows'));
}
}