
@servers(['web' => 'deployer@139.59.115.169'])

<?php
$repo = 'git@github.com:leexikang/MyoYwar.git';
$release_dir = '/var/www/releases';
$app_dir = '/var/www/app';
$release = 'release_' . date('YmdHis');
?>

@macro('deploy', ['on' => 'web'])
    fetch_repo
    run_composer
    update_permissions
    update_symlinks
@endmacro

@task('fetch_repo')
    [ -d {{ $release_dir }} ] || mkdir {{ $release_dir }};
    cd {{ $release_dir }};
    git clone -b master {{ $repo }} {{ $release }};
@endtask

@task('run_composer')
    cd {{ $release_dir }}/{{ $release }};
    composer install --prefer-dist --no-scripts;
@endtask

@task('update_permissions')
    cd {{ $release_dir }};
    chgrp -R www-data {{ $release }};
    chmod -R ug+rwx {{ $release }};
@endtask

@task('update_symlinks')
    cd {{ $release_dir }}/{{ $release }}
    ln -nfs ../../.env .env;
    chgrp -h www-data .env;
    ln -nfs {{ $release_dir }}/{{ $release }} {{ $app_dir }};
    chgrp -h www-data {{ $app_dir }};

    rm -r {{ $release_dir }}/{{ $release }}/storage/logs;
    cd {{ $release_dir }}/{{ $release }}/storage;
    ln -nfs ../../../logs logs;
    chgrp -h www-data logs;
    sudo service php7.0-fpm reload
@endtask

