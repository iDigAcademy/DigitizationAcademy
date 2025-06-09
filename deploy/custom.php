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

/**
 * Custom Deployer tasks for the Digitization Academy application
 * This file contains custom deployment tasks specific to the application's needs
 * including database updates, file deployments, permission settings, and supervisor management.
 */

namespace Deployer;

/**
 * Execute database update queries for the application
 * Changes to the release or current path and runs the update-queries artisan command
 */
desc('Running update queries...');
task('artisan:app:update-queries', function () {
    cd('{{release_or_current_path}}');
    run('php artisan app:update-queries');
});

/**
 * Deploy application files
 * Executes the deploy-files artisan command in the current release path
 */
desc('Deploying files...');
task('artisan:app:deploy-files', function () {
    cd('{{release_or_current_path}}');
    run('php artisan app:deploy-files');
});

/**
 * Set proper file permissions for the application
 * Sets ownership to ubuntu:www-data and clears the Laravel log file
 */
desc('Setting permissions...');
task('set:permissions', function () {
    run('sudo chown -R ubuntu.www-data {{deploy_path}}');
    run('sudo truncate -s 0 {{release_or_current_path}}/storage/logs/laravel.log');
});

/**
 * Install Yarn dependencies
 * Runs yarn install in the release path, ignoring engine requirements
 */
desc('Install project dependencies');
task('yarn:run-install', function () {
    cd('{{release_path}}');
    run('yarn install --ignore-engines');
});

/**
 * Build production assets using NPM
 * Executes npm run prod in the release path
 */
desc('Build project');
task('npm:run-build', function () {
    cd('{{release_path}}');
    run('npm run prod');
});

/**
 * Upload environment file based on deployment target
 * Selects the appropriate .env file based on the host alias (production/development)
 */
desc('Upload env file depending on the host');
task('upload:env', function () {
    $alias = currentHost()->get('alias');
    $file = match ($alias) {
        'production' => '.env.aws.prod',
        'development' => '.env.aws.dev'
    };
    upload($file, '{{deploy_path}}/shared/.env');
});

/**
 * Publish Sweet Alert 2 assets
 * Executes the sweetalert:publish artisan command
 */
desc('Publish all Sweet Alert 2 assets');
task('artisan:sweetalert:publish', artisan('sweetalert:publish'));

/**
 * Reload Supervisor configuration
 * Executes reread and update commands for Supervisor
 */
desc('Supervisor reread and update');
task('supervisor:reread-update', function () {
    cd('{{release_path}}');
    run('sudo supervisorctl reread');
    run('sudo supervisorctl update');
});
