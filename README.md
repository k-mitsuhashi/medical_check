## medical_check
使い方
```
# インストール (/src上で)
composer install

# DB構築 & .env作成
touch database/database.sqlite
chmod 777 bootstrap/cache database/database.sqlite storage
cp .env.example .env
php artisan key:generate
php artisan migrate

# サーバ起動
php artisan serve --host 0.0.0.0

# コンソールコマンド
php artisan user-detail {user_id}
```
