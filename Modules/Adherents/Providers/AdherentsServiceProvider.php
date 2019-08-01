<?php

namespace Modules\Adherents\Providers;

use Illuminate\Database\Eloquent\Factory;
use Modules\Adherents\Policies\AdherentPolicy;
use Modules\Adherents\Entities\Adherent;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AdherentsServiceProvider extends ServiceProvider
{
    protected $policies = [
        //'App\Model' => 'App\Policies\ModelPolicy',
        'Modules\Adherents\Entities\Adherent::class' => 'Modules\Adherents\Policies\AdherentPolicy::class',
    ];

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
        $this->registerFactories();
        $this->loadMigrationsFrom(__DIR__ . '/../Database/Migrations');
        $this->registerPolicies();
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->app->register(RouteServiceProvider::class);
    }

    /**
     * Register config.
     *
     * @return void
     */
    protected function registerConfig()
    {
        $this->publishes([
            __DIR__.'/../Config/config.php' => config_path('adherents.php'),
        ], 'config');
        $this->mergeConfigFrom(
            __DIR__.'/../Config/config.php', 'adherents'
        );
    }

    /**
     * Register views.
     *
     * @return void
     */
    public function registerViews()
    {
        $viewPath = resource_path('views/modules/adherents');

        $sourcePath = __DIR__.'/../Resources/views';

        $this->publishes([
            $sourcePath => $viewPath
        ],'views');

        $this->loadViewsFrom(array_merge(array_map(function ($path) {
            return $path . '/modules/adherents';
        }, \Config::get('view.paths')), [$sourcePath]), 'adherents');
    }

    /**
     * Register translations.
     *
     * @return void
     */
    public function registerTranslations()
    {
        $langPath = resource_path('lang/modules/adherents');

        if (is_dir($langPath)) {
            $this->loadTranslationsFrom($langPath, 'adherents');
        } else {
            $this->loadTranslationsFrom(__DIR__ .'/../Resources/lang', 'adherents');
        }
    }

    /**
     * Register an additional directory of factories.
     *
     * @return void
     */
    public function registerFactories()
    {
        if (! app()->environment('production')) {
            app(Factory::class)->load(__DIR__ . '/../Database/factories');
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
