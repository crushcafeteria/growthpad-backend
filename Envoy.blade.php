@servers(['local'=>'127.0.0.1', 'production'=>'root@barua.irenkenya.com'])

@story('deploy')
    push-to-git
    pull-to-live
    build-complete
@endstory

@task('pull-to-live', ['on'=>'production'])
    cd /var/www/IREN/growthpad.irenkenya.com
    git fetch --all
    git reset --hard origin/master
@endtask

@task('push-to-git', ['on'=>'local'])
    git add .
    git commit -m "This is an automated deployment"
    git push -u origin master
@endtask

@task('build-complete', ['on'=>'local'])
    echo 'The Growthpad backend has been successfully deployed' | terminal-notifier -sound default
@endtask
