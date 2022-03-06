<?php

namespace Reinanhs\LaravelManagerBase;

use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;
use Reinanhs\LaravelManagerBase\Commands\FooCommand;
use Reinanhs\LaravelManagerBase\Exceptions\InvalidConfiguration;

class LaravelManagerBaseServiceProvider extends ServiceProvider
{
    /**
     * This will be used to register config & view in your package namespace.
     *
     * @var  string
     */
    protected string $vendorName = 'reinanhs';
    protected string $packageName = 'laravel-manager-base';

    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected bool $defer = false;

    /**
     * A list of artisan commands for your package.
     *
     * @var array
     */
    protected array $commands = [
        FooCommand::class,
    ];

    /**
     * Perform post-registration booting of services.
     */
    public function boot(): void
    {
        // $this->loadTranslationsFrom(__DIR__.'/../resources/lang', $this->vendorName);
        // $this->loadViewsFrom(__DIR__.'/../resources/views', $this->vendorName);
        $this->loadMigrationsFrom(__DIR__.'/../database/migrations');
        $this->registerRoutes();

        // Publishing is only necessary when using the CLI.
        if ($this->app->runningInConsole()) {
            $this->bootForConsole();
        }
    }

    protected function registerRoutes(): void
    {
        Route::group($this->routeConfiguration(), function () {
            $this->loadRoutesFrom(__DIR__.'/../routes/api.php');
        });
    }

    protected function routeConfiguration(): array
    {
        $config = config($this->packageName);

        return [
            'prefix' => $config['route']['prefix'],
            'as' => $config['route']['name'] . '.',
        ];
    }

    /**
     * Register any package services and bindings in the container.
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom(__DIR__.'/../config/'.$this->packageName.'.php', $this->packageName);

        $config = config($this->packageName);

        // Register the service the package provides.
        $this->app->singleton(LaravelManagerBase::class, function ($app) use ($config) {
            // Checks if configuration is valid
            $this->guardAgainstInvalidConfiguration($config);

            return new LaravelManagerBase;
        });

        // Make alias for use with package name
        $this->app->alias(LaravelManagerBase::class, $this->packageName);
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides(): array
    {
        return [$this->packageName];
    }

    /**
     * Console-specific booting.
     *
     * @return void
     */
    protected function bootForConsole(): void
    {
        // Publishing the configuration file
        $this->publishes([
            __DIR__.'/../config/'.$this->packageName.'.php' => config_path($this->packageName.'.php'),
        ], 'config');

        // Publishing the views
        $this->publishes([
            __DIR__.'/../resources/views' => resource_path('views/vendor/'.$this->vendorName.'/'.$this->packageName),
        ], 'views');

        // Publishing assets
        $this->publishes([
            __DIR__.'/../resources/css' => public_path('vendor/'.$this->vendorName.'/'.$this->packageName.'/css'),
        ], 'public');

        $this->publishes([
            __DIR__.'/../resources/js' => public_path('vendor/'.$this->vendorName.'/'.$this->packageName.'/js'),
        ], 'public');

        $this->publishes([
            __DIR__.'/../resources/img' => public_path('vendor/'.$this->vendorName.'/'.$this->packageName.'/img'),
        ], 'public');

        // Publishing the translation files
        $this->publishes([
            __DIR__.'/../resources/lang' => resource_path('lang/vendor/'.$this->vendorName.'/'.$this->packageName),
        ], 'translations');

        // Publishing seed's
        $this->publishes([
            __DIR__.'/../database' => base_path('/database'),
        ], 'seeds');

        // Registering package commands
        $this->commands($this->commands);
    }

    /**
     * Checks if the config is valid.
     *
     * @param  array|null $config the package configuration
     * @throws InvalidConfiguration exception or null
     * @see  \Reinanhs\LaravelManagerBase\Exceptions\InvalidConfiguration
     */
    protected function guardAgainstInvalidConfiguration(array $config = null): void
    {
        // Here you can add as many checks as your package config needed to
        // consider it valid.
        // @see \Me\MyPackage\Exceptions\InvalidConfiguration
        if (empty($config['version'])) {
            throw InvalidConfiguration::versionNotSpecified();
        }
    }

    /**
     * Check if package is running under Lumen app.
     *
     * @return bool
     */
    protected function isLumen(): bool
    {
        return str_contains($this->app->version(), 'Lumen') === true;
    }
}
