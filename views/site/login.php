<?php

use yii\bootstrap5\ActiveForm;
use yii\bootstrap5\Html;
use app\assets\AppAsset;


AppAsset::register($this);
$this->title = 'Авторизация';
$this->params['breadcrumbs'][] = $this->title;
?>

<body class="gray-bg">
<div class="middle-box text-center loginscreen animated fadeInDown">
    <div>
        <div>
            <h1 class="logo-name"><?= yii\helpers\Html::img('@web/img/logotip.png', ['style' => ['width' => '100%', 'height' => '100%']]); ?></h1>
        </div>
        <h3>Добро пожаловать в iMAS</h3><br>
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
</div>

</body>







