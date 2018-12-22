<?php

namespace Modules\Core\Console;

use Illuminate\Console\Command;

class PlatformInstall extends Command
{
    protected $signature = 'core:platform-install';

    public function handle()
    {
        $this->info('=== Beginning Platform Installation ===');

        if ($this->confirm('Reset .env?')) {
            $this->env();
        }

        if ($this->confirm('Install Dependencies?')) {
            $this->dependencies();
        }

        if ($this->confirm('Reset Database?')) {
            $this->database();
        }

        $this->info('=== Platform Installation Complete ===');
    }

    private function env(): void
    {
        if (file_exists(app_path('.env'))) {
            $this->info(' - removing env file');
            exec('rm .env');
        }

        $this->info(' - generating env file');
        exec('cp .env.example .env');

        $this->info(' - generating application key');
        exec('php artisan key:generate');
    }

    private function dependencies(): void
    {
        $this->info(' - running composer');
        exec('composer install');

        $this->info(' - running global npm');
        exec('npm install');

        $this->info(' - running module npm');
        exec('./modules.sh "npm install"');
    }

    private function database(): void
    {
        $this->info(' - rolling back migrations');
        exec('php artisan module:migrate-rollback ');

        $this->info(' - running migrations');
        exec('php artisan module:migrate');

        $this->info(' - seeding database');
        exec('php artisan module:seed');
    }
}
