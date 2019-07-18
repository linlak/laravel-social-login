<?php

namespace Linlak\LinSocial\Providers;

use Illuminate\Support\ServiceProvider;
use Linlak\LinSocial\Services\OAuthService;

class LinSocialProvider extends ServiceProvider
{
    public function boot()
    {
        $this->publishes([
            __DIR__ . '/../config/lin_social.php' => config_path('lin_social.php'),
        ]);
        $this->registerCommands();
        $this->loadLinMigrations();
    }
    public function register()
    {
        $this->mergeConfigFrom(
            __DIR__ . '/../config/linjwt.php',
            'lin_social'
        );
        $this->app->alias('linsocial', OAuthService::class);
        $this->registerBootstraper();
    }
    protected function registerBootstraper()
    {
        $this->app->singleton('linsocial', function ($app) {
            return new OAuthService();
        });
    }
    public function provides()

    {
        return ['linsocial', OAuthService::class];
    }
    protected function loadLinMigrations()
    {
        $this->loadMigrationsFrom(__DIR__ . '/../database/migrations');
    }
    protected function registerCommands()
    {
        if ($this->app->runningInConsole()) {
            $this->commands([]);
        }
    }
}
