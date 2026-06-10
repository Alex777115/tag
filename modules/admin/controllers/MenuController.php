<?php
namespace app\modules\admin\controllers;

use Yii;
use yii\web\Controller;
use yii\web\ForbiddenHttpException;
use app\models\Menu;
use app\models\MenuSettings;
use app\models\User;
use yii\helpers\ArrayHelper;

class MenuController extends Controller
{
    public function actionLoadMenuSettings()
    {
        $selectedUserId = Yii::$app->request->get('selected_user_id');
        if (!$selectedUserId) {
            return $this->asJson([
                'status' => 'error',
                'message' => 'Не выбран пользователь.',
            ]);
        }

        $menuSettings = MenuSettings::find()->where(['user_id' => $selectedUserId])->all();

        $settingsMap = [];
        foreach ($menuSettings as $setting) {
            $settingsMap[$setting->menu_item_id] = $setting->is_visible;
        }

        return $this->asJson([
            'status' => 'success',
            'settingsMap' => $settingsMap,
        ]);
    }

    public function actionEditMenu()
    {
        try {
            $currentUserId = Yii::$app->user->id;

            if (!Yii::$app->user->identity || Yii::$app->user->identity->role !== 'admin') {
                throw new ForbiddenHttpException('У вас нет доступа к этой странице.');
            }

            $users = User::find()->where(['!=', 'role', 'admin'])->all();

            $selectedUserIds = Yii::$app->request->post('selected_user_ids');
            $selectedUserIds = explode(',', $selectedUserIds); // Преобразуем строку в массив ID

            if (empty($selectedUserIds)) {
                return $this->asJson([
                    'status' => 'error',
                    'message' => 'Не выбраны пользователи.',
                ]);
            }

            $menuItems = Menu::find()->all();

            $startTime = microtime(true);

            $cache = Yii::$app->cache;
            $settingsMap = [];

            foreach ($selectedUserIds as $selectedUserId) {
                $settingsMap[$selectedUserId] = $cache->get('menu_settings_' . $selectedUserId);

                if ($settingsMap[$selectedUserId] === false) {
                    $menuSettings = MenuSettings::find()->where(['user_id' => $selectedUserId])->all();
                    $settingsMap[$selectedUserId] = [];
                    foreach ($menuSettings as $setting) {
                        $settingsMap[$selectedUserId][$setting->menu_item_id] = $setting->is_visible;
                    }
                    $cache->set('menu_settings_' . $selectedUserId, $settingsMap[$selectedUserId], 86400);
                }
            }

            if (Yii::$app->request->isPost) {
                $menuData = Yii::$app->request->post('menu_data', []);

                if (empty($menuData)) {
                    return $this->asJson([
                        'status' => 'error',
                        'message' => 'Не переданы данные для меню.',
                    ]);
                }

                foreach ($selectedUserIds as $selectedUserId) {
                    foreach ($menuItems as $menuItem) {
                        $isVisible = isset($menuData[$menuItem->id]) ? (bool)$menuData[$menuItem->id] : false;

                        $setting = MenuSettings::findOne(['user_id' => $selectedUserId, 'menu_item_id' => $menuItem->id]);

                        if (!$setting) {
                            $setting = new MenuSettings();
                            $setting->user_id = $selectedUserId;
                            $setting->menu_item_id = $menuItem->id;
                        }

                        $setting->is_visible = $isVisible;

                        if (!$setting->save()) {
                            Yii::error('Ошибка при сохранении настроек меню для пользователя ID: ' . $selectedUserId);
                            Yii::error($setting->errors);
                        }
                    }
                    $cache->set('menu_settings_' . $selectedUserId, $settingsMap[$selectedUserId], 86400);
                }

                return $this->asJson([
                    'status' => 'success',
                    'message' => 'Изменения успешно сохранены',
                    'settingsMap' => $settingsMap,
                ]);
            }

            return $this->render('edit-menu', [
                'menuItems' => $menuItems,
                'settingsMap' => $settingsMap,
                'users' => $users,
                'selectedUserIds' => $selectedUserIds,
            ]);
        } catch (\Exception $e) {
            Yii::error('Ошибка в процессе обработки запроса: ' . $e->getMessage());
            return $this->asJson([
                'status' => 'error',
                'message' => $e->getMessage(),
            ]);
        }
    }

}
