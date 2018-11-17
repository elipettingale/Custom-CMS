<?php

namespace Modules\Core\Console;

use Illuminate\Console\Command;

class InstallPlatform extends Command
{
    protected $signature = 'core:install-platform';

    public function handle()
    {
        $this->info('=== Beginning Platform Installation ===');

        $this->info(' - generating env file');
        exec('cp .env.example .env');

        $this->info(' - generating application key');
        exec('php artisan key:generate');

        $this->info(' - running composer');
        exec('composer install');

        $this->info(' - running global npm');
        exec('npm install');

        $this->info(' - running module npm');
        exec('./modules.sh "npm install"');

        $this->info(' - running migrations');
        exec('php artisan module:migrate');

        $this->info(' - seeding database');
        exec('php artisan module:seed');

        $this->info('=== Platform Installation Complete ===');
    }
}
