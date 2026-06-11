<?php

use yii\bootstrap5\ActiveForm;
use yii\bootstrap5\Html;
use app\assets\AppAsset;


AppAsset::register($this);
$this->title = 'Авторизация';
$this->params['breadcrumbs'][] = $this->title;
?>

<body class="gray-bg">
<div class="cont-login">
    <div class="middle-box text-center loginscreen animated fadeInDown">
            <h4>Для авторизации</h4>
            <?php $form = ActiveForm::begin(); ?>
            <form class="m-t" role="form" action="http://webapplayers.com/inspinia_admin-v2.9.4/index.html">
                <div class="form-group">
                    <?= $form->field($model, 'username')->textInput() ?>
                </div>
                <div class="form-group">
                    <?= $form->field($model, 'password')->passwordInput() ?>
                </div><br>
                <div>
                    <?= Html::submitButton('Вход', ['class' => 'btn btn-primary block full-width m-b', 'name' => 'login-button']) ?>
                </div>
            </form>
            <?php ActiveForm::end() ?>
            <a href="<?= yii\helpers\Url::toRoute(['/site/signup']) ?>" class="text-decoration-none">
                    Создать учетную запись
            </a>
    </div>
<div>

</body>







