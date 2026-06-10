#!/bin/bash

DB_NAME="tagcloud_db"
DB_USER="root"
DB_PASS="admin"

echo "🔥 Dropping database $DB_NAME..."

mysql -u $DB_USER -p$DB_PASS -e "DROP DATABASE IF EXISTS $DB_NAME;"

echo "🧱 Creating database $DB_NAME..."

mysql -u $DB_USER -p$DB_PASS -e "CREATE DATABASE $DB_NAME CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;"

echo "🚀 Running migrations..."

php yii migrate --interactive=0

echo "✅ DONE: Database reset completed"