<?php
use yii\helpers\Html;
use yii\bootstrap5\ActiveForm;
$this->title='Регистрация пользователя'
?>


<body class="gray-bg">
<div class="middle-box text-center loginscreen animated fadeInDown">
    <div>
        <div>

            <h1 class="logo-name"><?= yii\helpers\Html::img('@web/img/logotip.png', ['style' => ['width' => '100%', 'height' => '100%']]); ?></h1>

        </div>
        <h3>Добро пожаловать в iMAS</h3><br>
        <h4>Для регистрации</h4>
        <?php $form = ActiveForm::begin() ?>
        <form class="m-t" role="form" >
            <div class="form-group">
                <?= $form->field($model, 'username') ?>
            </div>
            <div class="form-group">
                <?= $form->field($model, 'password')->passwordInput() ?>
            </div><br>
            <div>
                <?= Html::submitButton('Регистрация', ['class' => 'btn btn-primary block full-width m-b']) ?>
            </div>
        </form>
        <?php ActiveForm::end() ?>
        <a href="<?= yii\helpers\Url::toRoute(['/site/login']) ?>" class="text-decoration-none">
            Назад для авторизации
        </a>
    </div>
</div>
</body>









