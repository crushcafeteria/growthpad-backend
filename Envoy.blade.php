@servers(['local'=>'127.0.0.1', 'production'=>'root@barua.irenkenya.com'])

@story('deploy')
    push-to-git
    pull-to-live
    build-complete
@endstory

@task('pull-to-live', ['on'=>'production'])
    cd /var/www/IREN/new.growthpad.irenkenya.com/growthpad-backend
    git fetch --all
    git reset --hard origin/master
@endtask

@task('push-to-git', ['on'=>'local'])
    git add .
    git commit -m "This is an automated deployment"
    git push -u origin master
@endtask

@task('build-complete', ['on'=>'local'])
    notify-send 'Growthpad Deployed' 'The Growthpad backend has been successfully deployed'
@endtask
