<?php
namespace Ourgold\Furniture;

use Illuminate\Support\ServiceProvider;

class FurnitureServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->aliasMiddleware();

        $this->publishes([
            __DIR__ . '/../config/furniture.php' => config_path('furniture.php')
        ], 'furniture_config');

        //
        $this->loadFrom();

        // >=5.1
        $this->loadTranslationsFrom($path = __DIR__ . '/../resources/lang', 'furniture');

        if (method_exists($translator = $this->app['translator'], 'addJsonPath')) {
            $translator->addJsonPath($path);
        }

        $this->publishes([
            __DIR__ . '/../resources/lang' => $this->app->langPath() . '/vendor/furniture'
        ]);

        $this->loadViewsFrom(__DIR__ . '/../resources/views', 'furniture');

        $this->publishes([
            __DIR__ . '/../resources/views' => dirname($this->app->langPath()) . '/views/vendor/furniture'
        ]);

        $this->publishes([
            __DIR__ . '/../public' => $this->app->publicPath('vendor/furniture')
        ], 'furniture_assets');

        if ($this->app->runningInConsole()) {
            $this->commands([
                Commands\FurnitureSeedCommand::class
            ]);
        }
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->make(\Illuminate\Database\Eloquent\Factory::class)->load(__DIR__ . '/../database/factories');

        $this->mergeConfigFrom(
            __DIR__ . '/../config/furniture.php', 'furniture'
        );
    }

    /**
     * @return void
     */
    public function loadFrom()
    {
        $apiRoutes = __DIR__ . '/../routes/api.php';
        $webRoutes = __DIR__ . '/../routes/web.php';
        $migration = __DIR__ . '/../database/migrations';

        if (method_exists($this, 'loadRoutesFrom')) {
            // >=5.3
            $this->loadRoutesFrom($apiRoutes);

            $this->loadRoutesFrom($webRoutes);

            $this->loadMigrationsFrom($migration);
        } else {
            $this->loadRoutes($apiRoutes);

            $this->loadRoutes($webRoutes);

            $this->loadMigrations($migration);
        }
    }

    /**
     * @return void
     */
    protected function aliasMiddleware()
    {
        // >=5.4
        !method_exists($this->app['router'], __FUNCTION__) ?: $this->app['router']->aliasMiddleware(
            'furniture', \Ourgold\Furniture\Middleware\FurnitureMiddleware::class
        );
    }

    /**
     * Load the given routes file if routes are not already cached.
     *
     * @param  string  $path
     * @return void
     */
    protected function loadRoutes($path)
    {
        if (!$this->app->routesAreCached()) {
            require $path;
        }
    }

    /**
     * Register a database migration path.
     *
     * @param  array|string  $paths
     * @return void
     */
    protected function loadMigrations($paths)
    {
        $this->app->afterResolving('migrator', function ($migrator) use ($paths) {
            foreach ((array) $paths as $path) {
                $migrator->path($path);
            }
        });
    }
}
