<?php namespace Dowilcox\JsVar;

use Illuminate\Support\ServiceProvider;

class JsVarServiceProvider extends ServiceProvider
{

    /**
     * Bootstrap services.
     */
    public function boot()
    {
        $this->publishes([
            __DIR__ . '/../config/jsvar.php' => config_path('jsvar.php')
        ]);
    }

    /**
     * Register application services.
     */
    public function register()
    {
        $this->app->singleton('jsvar', function ($app) {
            $namespace = $app['config']['jsvar.namespace'];

            return new JsVar($namespace);
        });

        $this->app->bind('Dowilcox\JsVar\JsVar', function ($app) {
            return $app['jsvar'];
        });
    }

}