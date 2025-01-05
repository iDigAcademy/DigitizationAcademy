<?php

/*
 * Copyright (c) 2022. Digitization Academy
 * idigacademy@gmail.com
 *
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program.  If not, see <https://www.gnu.org/licenses/>.
 */

namespace Deployer;

task('artisan:app:update-queries', function () {
    cd('{{release_or_current_path}}');
    run('php artisan update:queries');
})->desc('Deploying files...');

task('artisan:app:deploy-files', function () {
    cd('{{release_or_current_path}}');
    run('php artisan deploy:files');
})->desc('Running update queries...');

desc('Setting permissions...');
task('set:permissions', function () {
    run('sudo chown -R ubuntu.www-data {{deploy_path}}');
    run('sudo truncate -s 0 {{release_or_current_path}}/storage/logs/laravel.log');
})->desc('Setting permissions...');

desc('Install project dependencies');
task('yarn:install', function () {
    cd('{{release_path}}');
    run('yarn install --prod --ignore-engines');
});

desc('Build project');
task('npm:build', function () {
    cd('{{release_path}}');
    run('npm run build');
});

desc('Upload env file depending on the host');
task('upload:env', function () {
    $alias = currentHost()->get('alias');
    $file = match ($alias) {
        'production' => '.env.aws.prod',
        'development' => '.env.aws.dev'
    };
    upload($file, '{{deploy_path}}/shared/.env');
});
