
php artisan install:api
composer dump-autoload

composer require dedoc/scramble
php artisan vendor:publish --provider="Dedoc\Scramble\ScrambleServiceProvider" --tag="scramble-config"


composer install
php artisan key:generate
cp .env.example .env
