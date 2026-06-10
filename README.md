Tagcloud (Yii2 Project)

Описание
Проект на Yii2 (PHP 8+), использующий MySQL базу данных и миграции для создания структуры БД.

Требования
PHP 8.1+
Composer
MySQL 5.7+ / MariaDB
Yii2 Framework

Установка проекта

1. Клонирование репозитория
git clone git@github.com:Alex777115/tag.git
cd tagcloud

3. Установка зависимостей
composer install

4. Создание базы данных
Создай базу вручную в MySQL:
CREATE DATABASE tagcloud_db CHARACTER SET utf8 COLLATE utf8_general_ci;

5. Настройка подключения к БД
Файл:
config/db.php

6. Применение миграций
php yii migrate

8. Запуск проекта
php yii serve 
