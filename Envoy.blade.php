@servers(['local'=>'127.0.0.1', 'production'=>'root@stats.iomsomaliadtm.org'])

{{--Deploy application--}}
@story('deploy')
push-to-git
rebuild-local
pull-to-live
rebuild-production
build-complete
@endstory

{{--Rebuild app on my laptop--}}
@task('rebuild-local', ['on'=>'local'])
cd /var/www/html/iomsomaliadtm.dev

{{-- Rebuild application --}}
php artisan migrate:refresh --seed
php artisan config:clear
php artisan cache:clear
php artisan route:clear

{{-- Rebuild autoload --}}
composer dump-autoload

{{-- Remove uploaded files --}}
{{-- sudo rm -rf storage/app/repository --}}

{{-- Truncate app log --}}
rm storage/logs/laravel.log
touch storage/logs/laravel.log
chmod 0777 storage/logs/laravel.log

{{-- Restart queue workers --}}
php artisan queue:restart

notify-send 'Reset Complete!' 'The IOMSOMALIADTM app has been successfully reset'
@endtask

{{--Pull new changes from remote repo to VPS --}}
@task('pull-to-live', ['on'=>'production'])
cd /var/www
git fetch --all
git reset --hard origin/master
@endtask

{{--Push local changes to remote Git repo--}}
@task('push-to-git', ['on'=>'local'])
cd /var/www/html/iomsomaliadtm.dev
git add .
git commit -m "This is an automated deployment"
git push -u origin master
@endtask


@task('rebuild-production', ['on'=>'production'])
cd /var/www

{{-- composer install --}}

{{-- Rebuild application --}}
php artisan migrate:refresh --seed
php artisan config:clear
php artisan cache:clear
php artisan route:clear

{{-- Fix permissions --}}
chmod -R 0777 storage

{{-- Rebuild autoload --}}
composer dump-autoload

{{-- Remove uploaded files --}}
sudo rm -rf storage/app/repository

{{-- Truncate app log --}}
rm storage/logs/laravel.log
touch storage/logs/laravel.log
chmod 0777 storage/logs/laravel.log

{{-- Restart queue workers --}}
php artisan queue:restart
@endtask

@task('build-complete', ['on'=>'local'])
notify-send 'Devops Complete' 'The staging server has been successfully updated'
@endtask
