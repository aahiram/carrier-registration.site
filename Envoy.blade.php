@servers(['kuehne-nagel' => 'u251417263@46.17.175.200 -p 65002'])

@task('deploy', ['on' => 'kuehne-nagel'])

cd /home/u251417263/domains/kuehne-nagel.site

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

php artisan up

echo "Done!"

@endtask
