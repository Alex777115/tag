<?php
namespace app\modules\admin;

use yii\base\Module as BaseModule;

class Module extends BaseModule
{
    public $controllerNamespace = 'app\modules\admin\controllers';

    public function init()
    {
        parent::init();

        // Можно добавить дополнительную настройку, если нужно
    }
}

