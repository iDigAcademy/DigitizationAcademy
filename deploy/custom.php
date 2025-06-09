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

desc('Running update queries...');
task('artisan:app:update-queries', function () {
    cd('{{release_or_current_path}}');
    run('php artisan app:update-queries');
});

desc('Deploying files...');
task('artisan:app:deploy-files', function () {
    cd('{{release_or_current_path}}');
    run('php artisan app:deploy-files');
});

desc('Setting permissions...');
task('set:permissions', function () {
    run('sudo chown -R ubuntu.www-data {{deploy_path}}');
    run('sudo truncate -s 0 {{release_or_current_path}}/storage/logs/laravel.log');
});

desc('Install project dependencies');
task('yarn:run-install', function () {
    cd('{{release_path}}');
    run('yarn install --ignore-engines');
});

desc('Build project');
task('npm:run-build', function () {
    cd('{{release_path}}');
    run('npm run prod');
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

desc('Publish all Sweet Alert 2 assets');
task('artisan:sweetalert:publish', artisan('sweetalert:publish'));

desc('Reload Supervisor');
task('supervisor:reload', function () {
    cd('{{release_path}}');
    run('sudo supervisorctl reread');
    run('sudo supervisorctl update');
    run('sudo systemctl restart supervisor');
});

desc('Restart Supervisor process containing domain name');
task('supervisor:restart-domain', function () {
    // Extract domain name from deploy path
    $deployPath = get('deploy_path');
    $domainName = get('domain_name');

    writeln("Using domain name: $domainName");

    writeln("Looking for supervisor process containing domain: $domainName");

    // Run the supervisor-manager.sh script and select the option containing the domain name
    writeln('=== Starting supervisor restart process ===');
    $result = runLocally("if [ -f /home/ubuntu/supervisor-manager.sh ]; then
            SCRIPT_PATH=/home/ubuntu/supervisor-manager.sh
            echo \"Using script from /home/ubuntu/supervisor-manager.sh\"
        elif [ -f {{release_or_current_path}}/app/supervisor-manager.sh ]; then
            SCRIPT_PATH={{release_or_current_path}}/app/supervisor-manager.sh
            sudo chmod +x \$SCRIPT_PATH
            echo \"Using script from {{release_or_current_path}}/app/supervisor-manager.sh\"
        else
            echo 'Error: supervisor-manager.sh not found'
            exit 1
        fi

        echo \"Script path: \$SCRIPT_PATH\"

        # Get matching process numbers
        echo \"Running: sudo supervisorctl status | grep -n \\\"$domainName\\\" | cut -d\\\":\\\" -f1\"
        MATCHES=\$(sudo supervisorctl status | grep -n \"$domainName\" | cut -d\":\" -f1)
        echo \"Matching processes: \$MATCHES\"

        if [ -z \"\$MATCHES\" ]; then
            echo 'No supervisor processes found containing the domain name'
            exit 0
        fi

        # Take the first match if multiple are found
        PROCESS_NUM=\$(echo \"\$MATCHES\" | head -n 1)
        echo \"Selecting process number \$PROCESS_NUM\"

        # Display supervisor status before restart
        echo \"=== Supervisor status before restart ===\"
        sudo supervisorctl status | grep \"$domainName\"

        # Send the process number to the script
        echo \"Running: echo -e \\\"\$PROCESS_NUM\\\\n\\\" | sudo \$SCRIPT_PATH\"
        echo -e \"\$PROCESS_NUM\\n\" | sudo \$SCRIPT_PATH

        # Display supervisor status after restart
        echo \"=== Supervisor status after restart ===\"
        sudo supervisorctl status | grep \"$domainName\"

        echo \"=== Supervisor restart process completed ===\"
    ");

    writeln('=== Supervisor restart result ===');
    writeln($result);
    writeln('=== End of supervisor restart result ===');
});
