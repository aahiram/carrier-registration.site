@servers(['carrier-registration.site' => 'u251417263@45.84.207.217 -p 65002'])

@task('deploy', ['on' => 'carrier-registration.site'])

cd /home/u251417263/domains/carrier-registration.site

set -e

echo "Deploying.."

git pull origin main

php artisan down

php composer.phar update

php artisan migrate --force

php artisan view:clear

php artisan cache:clear

php artisan config:clear

php artisan route:clear

php artisan optimize

php artisan up

echo "Done!"

@endtask
