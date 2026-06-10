<?php
use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;
use app\models\Menu;
use app\models\User;


$this->registerCssFile('https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css');
$this->registerJsFile('https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js', ['depends' => [yii\web\JqueryAsset::class]]);
$userList = ArrayHelper::map($users, 'id', 'username');
?>
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2>Управление привелегиями</h2>
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="<?= yii\helpers\Url::to(['default/index']); ?>">Дом</a>
            </li>
            <li class="breadcrumb-item active">
                <strong>Управление</strong>
            </li>
        </ol>
    </div>
</div>

<div class="wrapper wrapper-content animated fadeInUp" >
    <div class="menu-settings-form d-flex">
        <!-- Список пользователей -->
        <div class="users-list">
            <div class="table-container">
                <h3 class="text-center mb-4">Список пользователей</h3>
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                        <tr>

                            <th scope="col">№</th>
                            <th scope="col">Имя пользователя</th>
                            <th scope="col">
                                <input type="checkbox" id="selectAllCheckbox"> <!-- Чекбокс для выбора всех пользователей -->
                            </th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php $counter = 1; ?>
                        <?php foreach ($users as $user): ?>
                            <tr>
                                <td style="vertical-align: middle; text-align: center;"><?= $counter++ ?></td>
                                <td style="vertical-align: middle; text-align: left">
                                    <a href="javascript:void(0)" class="user-select" data-id="<?= $user->id ?>" style="text-decoration: none; color: black">
                                        <?= Html::encode($user->username) ?>
                                    </a>
                                </td>
                                <td style="vertical-align: middle; text-align: center;">
                                    <input type="checkbox" class="user-checkbox" data-id="<?= $user->id ?>"> <!-- Чекбокс для каждого пользователя -->
                                </td>
                            </tr>
                        <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- Форма с настройками меню (справа) -->
        <div class="menu-settings">
            <div class="table-container">
                <h3 class="text-center mb-4">Настройки меню</h3>
                <?php $form = ActiveForm::begin(); ?>

                <!-- Таблица с пунктами меню -->
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th style="width: 15%" scope="col">№</th>
                            <th style="width: 60%" scope="col">Вкладки меню</th>
                            <th style="width: 25%" scope="col">Состояние</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php $counter = 1; ?>
                        <?php foreach ($menuItems as $menuItem): ?>
                            <tr>
                                <td style="vertical-align: middle; text-align: center;"><?= $counter++ ?></td>
                                <td style="vertical-align: middle; text-align: left"><?= $menuItem->label ?></td>
                                <td style="vertical-align: middle; text-align: center;">
                                    <label class="checkbox-ios">
                                        <input
                                                type="checkbox"
                                                id="menu_item_<?= $menuItem->id ?>"
                                                name="menu_item_<?= $menuItem->id ?>"
                                            <?= isset($settingsMap[$menuItem->id]) && $settingsMap[$menuItem->id] ? 'checked' : '' ?>>
                                        <span class="checkbox-ios-switch" for="menu_item_<?= $menuItem->id ?>"></span>
                                    </label>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                        </tbody>
                    </table>
                    <div class="form-group mt-4" style="text-align: center;">
                        <?= Html::button('Сохранить изменения', [
                            'class' => 'btn btn-success btn-sm shadow-lg save-btn',
                            'id' => 'saveChangesButton'
                        ]) ?>
                    </div>
                </div>

                <?php ActiveForm::end(); ?>
            </div>
        </div>
    </div>
</div>

<!-- Модальное окно для уведомления -->
<div class="modal fade" id="messageModal" tabindex="-1" aria-labelledby="messageModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="messageModalLabel">Уведомление</h5>
            </div>
            <div class="modal-body" id="messageBox"></div>
        </div>
    </div>
</div>

<style>
    /*Привилегии*/

    .menu-settings-form {
        display: flex;
        justify-content: space-between;

    }

    .users-list {
        width: 30%;
        height: 680px;
        display: flex;
        flex-direction: column;
        margin-right: 25px;
    }

    .menu-settings {
        width: 70%;
        height: 680px;
        display: flex;
        flex-direction: column;
    }


    .table-container {
        background-color: white;
        border-radius: 8px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        padding: 20px;
        margin-bottom: 20px;
        flex-grow: 1;

    }


    .table-responsive {
        max-height: 520px;

    }


    .table {
        width: 100%;
    }
    th,td{
        text-align: center;
    }

    /* Стили для кнопки */
    .save-btn {
        font-size: 0.9rem;
        padding: 8px 20px;
    }

    /* Стили для чекбоксов */
    .checkbox-ios {
        display: inline-block;
        height: 28px;
        line-height: 28px;
        margin-right: 10px;
        position: relative;
        vertical-align: middle;
    }

    .checkbox-ios .checkbox-ios-switch {
        position: relative;
        display: inline-block;
        width: 56px;
        height: 28px;
        border: 1px solid rgba(0, 0, 0, .1);
        border-radius: 25%/50%;
        background: #eee;
        transition: .2s;
    }

    .checkbox-ios .checkbox-ios-switch:before {
        content: '';
        position: absolute;
        top: 1px;
        left: 1px;
        width: 24px;
        height: 24px;
        border-radius: 50%;
        background: white;
        box-shadow: 0 3px 5px rgba(0, 0, 0, .3);
        transition: .15s;
    }

    .checkbox-ios input[type=checkbox] {
        display: none;
    }

    .checkbox-ios input[type=checkbox]:checked + .checkbox-ios-switch {
        background: limegreen;
    }

    .checkbox-ios input[type=checkbox]:checked + .checkbox-ios-switch:before {
        transform: translateX(28px);
    }

    input[type="checkbox"] {
        accent-color: #C56FFF;
        width: 20px;
        height: 20px;
    }

    .table-responsive {
        overflow-y: auto;
        scrollbar-width: thin;
        scrollbar-color: rgba(147, 143, 143, 0.7) #f0f0f0;
    }


    .table-responsive::-webkit-scrollbar {
        width: 8px;
        height: 8px;
        opacity: 0;
        transition: opacity 0.3s;
    }

    .table-responsive:hover::-webkit-scrollbar {
        opacity: 1;
    }

    .table-responsive::-webkit-scrollbar-thumb {
        background-color: rgba(147, 143, 143, 0.7);
        border-radius: 10px;
    }

    .table-responsive::-webkit-scrollbar-thumb:hover {
        background-color: rgba(147, 143, 143, 0.7);
    }

    .table-responsive::-webkit-scrollbar-track {
        background-color: #f0f0f0;
        border-radius: 10px;
    }


    @media (max-width: 1300px) {
        .users-list {

            display: flex;
            flex-direction: column;
            margin-right: 25px;
            width: 100%;
            height: 100%;
            overflow-y: auto;

        }

        .menu-settings {
            display: flex;
            flex-direction: column;
            width: 100%;
            height: auto;

            padding: 0;
        }


        .table-container {
            background-color: white;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            padding: 20px;
            margin-bottom: 20px;
            flex-grow: 1;

        }

        .menu-settings-form {
            flex-direction: column;
            padding: 10px;
        }


    }
    @media (max-width: 1024px) {

        .table thead {
            display: revert !important;
        }


        .table th, .table td {
            padding: 10px;
            font-size: 0.875rem;
        }
        .table > thead > tr > th,  .table > thead > tr > td, .table > tbody > tr > td {
            width: 30px;
        }

        .table th {
            display: table-cell !important;
        }
        .table th:last-child {
            text-align: center !important;
        }
        .table td:last-child {
            text-align: center !important;
        }
        .table th, .table td {
            padding: 8px;
            font-size: 1rem;
            text-align: left !important;
        }

        .table td {
            text-align: left;
        }

        .table-responsive {
            height: auto;
            max-height: none;
            overflow-y: auto;
        }


        .table th, .table td {
            font-size: 1rem;
            padding: 8px;
            text-align: center;
        }


        .table td {
            display: table-cell !important;
        }



        .checkbox-ios {
            height: 28px;
            line-height: 28px;
        }

        input[type="checkbox"] {
            width: 20px;
            height: 20px;
        }


        .save-btn {
            font-size: 1rem;
            padding: 12px 30px;
            width: 100%;
        }
        .table th, .table td {
            border: 1px solid #dee2e6 !important; /* Цвет и стиль границы */
        }
    }


    @media (max-width: 480px) {
        .table th, .table td {
            font-size: 0.875rem;
        }
        .table th:first-child {
            display: none !important;
        }
        .table td:first-child {
            display: none !important;
        }


        .save-btn {
            padding: 12px 15px;
            font-size: 0.9rem;
        }
    }
</style>



