<?php

namespace app\controllers;

use app\models\User;
use Yii;
use yii\filters\AccessControl;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\Post;
use app\models\MenuSettings;
use app\models\Menu;
use app\models\SignupForm;

class SiteController extends AppController
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::class,
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::class,
                'actions' => [
                    'logout' => ['post', 'get'],
                ],
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * Страница логина
     */
    public function actionLogin()
    {
        // Если пользователь уже авторизован, перенаправляем на главную
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();

        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            // Проверка роли пользователя
            if (Yii::$app->user->identity->role === 'admin') {
                return $this->redirect(['/admin/default/index']);
            } else {
                return $this->goBack();
            }
        }

        // Устанавливаем лейаут для гостей
        $this->layout = 'guest';
        $model->password = '';  // Очистка пароля после неудачного логина
        return $this->render('login', ['model' => $model]);
    }

    /**
     * Страница регистрации
     */
//    public function actionSignup()
//    {
//        // Если пользователь уже авторизован, перенаправляем на главную
//        if (!Yii::$app->user->isGuest) {
//            return $this->goHome();
//        }
//
//        $model = new SignupForm();
//
//        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
//            // Проверка существования пользователя с таким же именем
//            if (User::find()->where(['username' => $model->username])->exists()) {
//                Yii::$app->session->setFlash('error', 'Пользователь с таким именем уже существует.');
//                return $this->refresh();
//            }
//
//            $user = new User();
//            $user->username = $model->username;
//            $user->password = Yii::$app->security->generatePasswordHash($model->password);
//
//            if ($user->save()) {
//                Yii::$app->user->login($user);
//                return $this->goHome();
//            }
//        }
//
//        // Устанавливаем лейаут для гостей
//        $this->layout = 'guest';
//        return $this->render('signup', ['model' => $model]);
//    }

    public function actionSignup()
    {
        // Если пользователь уже авторизован, перенаправляем на главную
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new SignupForm();

        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            // Проверка существования пользователя с таким же именем
            if (User::find()->where(['username' => $model->username])->exists()) {
                Yii::$app->session->setFlash('error', 'Пользователь с таким именем уже существует.');
                return $this->refresh();
            }

            $user = new User();
            $user->username = $model->username;
            $user->password = Yii::$app->security->generatePasswordHash($model->password);

            if ($user->save()) {
                // Создаем записи для этого пользователя в таблице menu_settings
                $this->createMenuSettingsForNewUser($user->id);

                // Входим в систему после регистрации
                Yii::$app->user->login($user);
                return $this->goHome();
            }
        }

        // Устанавливаем лейаут для гостей
        $this->layout = 'guest';
        return $this->render('signup', ['model' => $model]);
    }

    /**
     * Создание записей меню для нового пользователя
     * @param int $userId ID нового пользователя
     */
    private function createMenuSettingsForNewUser($userId)
    {
        $menuItems = Menu::find()->all();

        foreach ($menuItems as $menuItem) {
            // Создаем запись в таблице menu_settings для каждого пункта меню
            $menuSetting = new MenuSettings();
            $menuSetting->user_id = $userId;
            $menuSetting->menu_item_id = $menuItem->id;
            $menuSetting->is_visible = 0;  // Например, показываем все меню по умолчанию
            $menuSetting->save();
        }
    }


    /**
     * Главная страница
     */
//    public function actionIndex()
//    {
//        // Если пользователь не авторизован, перенаправляем на страницу логина
//        if (Yii::$app->user->isGuest) {
//            return $this->redirect(['site/login']);
//        }
//
//        // Устанавливаем лейаут для авторизованных пользователей
//        $this->layout = 'main';
//        $posts = Post::find()->all();
//        return $this->render('index', compact('posts'));
//    }

    public function actionIndex()
    {
        // Если пользователь не авторизован, перенаправляем на страницу логина
        if (Yii::$app->user->isGuest) {
            return $this->redirect(['site/login']);
        }

        // Устанавливаем лейаут для авторизованных пользователей
        $this->layout = 'main';

        // Получаем все пункты меню
        $menuItems = Menu::find()->all();

        // Получаем настройки видимости для текущего пользователя
        $userId = Yii::$app->user->id;
        $menuSettings = MenuSettings::find()->where(['user_id' => $userId])->all();

        // Преобразуем настройки видимости в массив видимых пунктов меню
        $visibleMenuItems = [];
        foreach ($menuSettings as $setting) {
            if ($setting->is_visible) {
                $visibleMenuItems[] = $setting->menu_item_id;
            }
        }

        // Фильтруем пункты меню, показывая только те, которые разрешены для отображения
        $filteredMenuItems = array_filter($menuItems, function ($menuItem) use ($visibleMenuItems) {
            return in_array($menuItem->id, $visibleMenuItems);
        });

        // Получаем посты для отображения на главной странице
        $posts = Post::find()->all();

        // Отправляем отфильтрованные пункты меню и посты в представление
        return $this->render('index', [
            'posts' => $posts,
            'menuItems' => $filteredMenuItems, // передаем отфильтрованные пункты меню
        ]);
    }


    /**
     * Выход из системы
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();
        return $this->redirect(['site/login']);
    }
}
