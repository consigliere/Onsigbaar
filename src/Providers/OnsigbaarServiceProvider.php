<?php

namespace App\Components\Onsigbaar\Providers;

use Illuminate\Support\ServiceProvider;

class OnsigbaarServiceProvider extends ServiceProvider
{
    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = false;

    /**
     * Boot the application events.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerTranslations();
        $this->registerConfig();
        $this->registerViews();

        $this->loadMigrationsFrom(__DIR__ . '/../../Database/Migrations');
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->app->register(\App\Components\Signature\Providers\SignatureServiceProvider::class);
        $this->app->register(\App\Components\Passerby\Providers\PasserbyServiceProvider::class);
        $this->app->register(\App\Components\Siegnor\Providers\SiegnorServiceProvider::class);
        $this->app->register(\App\Components\Signal\Providers\SignalServiceProvider::class);
    }

    /**
     * Register config.
     *
     * @return void
     */
    protected function registerConfig()
    {
        $this->publishes([
            __DIR__ . '/../../Config/config.php' => config_path('onsigbaar.php'),
        ], 'config-onsigbaar');
        $this->mergeConfigFrom(
            __DIR__ . '/../../Config/config.php', 'onsigbaar'
        );
    }

    /**
     * Register views.
     *
     * @return void
     */
    public function registerViews()
    {
        $viewPath = base_path('resources/views/components/onsigbaar');

        $sourcePath = __DIR__ . '/../../Resources/views';

        $this->publishes([
            $sourcePath => $viewPath,
        ]);

        $this->loadViewsFrom(array_merge(array_map(function ($path) {
            return $path . '/components/onsigbaar';
        }, \Config::get('view.paths')), [$sourcePath]), 'onsigbaar');
    }

    /**
     * Register translations.
     *
     * @return void
     */
    public function registerTranslations()
    {
        $langPath = base_path('resources/lang/components/onsigbaar');

        if (is_dir($langPath)) {
            $this->loadTranslationsFrom($langPath, 'onsigbaar');
        } else {
            $this->loadTranslationsFrom(__DIR__ . '/../../Resources/lang', 'onsigbaar');
        }
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return [];
    }
}
