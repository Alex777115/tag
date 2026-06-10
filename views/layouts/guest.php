
<?php

use app\assets\AppAsset;
use yii\helpers\Html;

AppAsset::register($this);


?>

<?php $this->beginPage() ?>

<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>" class="h-100">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= Html::encode($this->title) ?></title>
    <?= Html::csrfMetaTags() ?>
    <?php $this->head(); ?>
</head>
<?php $this->beginBody() ?>
<div class="container">
    <?= $content ?>
</div>

<?php $this->endBody() ?>
</html>
<?php $this->endPage() ?>





















