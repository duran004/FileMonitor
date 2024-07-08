<?php

namespace Dcyilmaz\FileMonitor;

use Illuminate\Support\ServiceProvider;

class FileMonitorServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->commands([
            \Dcyilmaz\FileMonitor\Console\MonitorFilesCommand::class,
        ]);
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        if ($this->app->runningInConsole()) {
            $this->loadMigrationsFrom(__DIR__ . '/../database/migrations');
        }
    }
}