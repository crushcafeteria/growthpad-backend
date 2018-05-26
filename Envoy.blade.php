@servers(['local'=>'127.0.0.1', 'production'=>'root@growthpad.irenkenya.com'])

{{--Deploy application--}}
@story('deploy')
push-to-git
{{--rebuild-local--}}
pull-to-live
{{--rebuild-production--}}
build-complete
@endstory

{{--Rebuild app on my laptop--}}
@task('rebuild-local', ['on'=>'local'])
cd /var/www/html/shop.dev

{{-- Rebuild application --}}
php artisan migrate:refresh --seed
php artisan config:clear
php artisan cache:clear
php artisan route:clear

{{-- Rebuild autoload --}}
composer dump-autoload

{{-- Truncate app log --}}
rm storage/logs/laravel.log
touch storage/logs/laravel.log
chmod 0777 storage/logs/laravel.log

{{-- Restart queue workers --}}
php artisan queue:restart

notify-send 'Reset Complete!' 'The GROWTHPAD app has been successfully reset'
@endtask

{{--Pull new changes from remote repo to VPS --}}
@task('pull-to-live', ['on'=>'production'])
cd /var/www/IREN/growthpad.irenkenya.com
git fetch --all
git reset --hard origin/master
composer update
@endtask

{{--Push local changes to remote Git repo--}}
@task('push-to-git', ['on'=>'local'])
git add .
git commit -m "This is an automated deployment"
git push -u origin master
@endtask


@task('rebuild-production', ['on'=>'production'])
cd /var/www/html/growthpad
{{--  composer install  --}}

{{-- Rebuild application --}}
php artisan migrate:refresh --seed
php artisan config:clear
php artisan cache:clear
php artisan route:clear

{{-- Fix permissions --}}
chmod -R 0777 storage

{{-- Rebuild autoload --}}
composer dump-autoload

{{-- Truncate app log --}}
rm storage/logs/laravel.log
touch storage/logs/laravel.log
chmod 0777 storage/logs/laravel.log

{{-- Restart queue workers --}}
php artisan queue:restart

{{--  cd public  --}}
{{--  npm install  --}}

@endtask

@task('build-complete', ['on'=>'local'])
notify-send 'Devops Complete' 'The staging server has been successfully updated'
@endtask
