<?php

namespace Khokon\Installer\Providers;

use Illuminate\Support\ServiceProvider;

class InstallServiceProvider extends ServiceProvider
{

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->publishFiles();
        $this->loadRoutesFrom(__DIR__ . '/../routes/web.php');
    }

    public function boot()
    {
       // $this->loadRoutesFrom(__DIR__ . '/../routes/web.php');

    }

    public function publishFiles()
    {
        $this->publishes([
            __DIR__.'/../config/installer.php' => config_path('installer.php'),
            __DIR__.'/../resources/views' => resource_path('views/installer'),
        ], 'khokon-installer');
    }

}
