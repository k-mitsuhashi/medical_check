## medical_check
使い方
```
cd src
# インストール
composer install

# DB構築
touch database/database.sqlite
chmod 777 bootstrap/cache database/database.sqlite storage
php artisan migrate

# サーバ起動
php artisan serve --host 0.0.0.0

# コンソールコマンド
php artisan user-detail {user_id}
```
