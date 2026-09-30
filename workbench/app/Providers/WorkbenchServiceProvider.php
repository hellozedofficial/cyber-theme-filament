<?php

namespace Workbench\App\Providers;

use Illuminate\Support\ServiceProvider;

class WorkbenchServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $dbPath = realpath(__DIR__ . '/../../database') . '/database.sqlite';
        if (! file_exists($dbPath)) {
            @touch($dbPath);
        }

        config()->set('database.default', 'sqlite');
        config()->set('database.connections.sqlite.database', $dbPath);
        config()->set('session.driver', 'file');
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
