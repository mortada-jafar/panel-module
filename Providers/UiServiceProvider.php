<?php

namespace Modules\PanelCore\Providers;

use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use Modules\PanelCore\Helper;

class UiServiceProvider extends ServiceProvider
{



    private $validationRules = [
        'persian_alpha' => 'Alpha',
        'persian_num' => 'Num',
        'persian_alpha_num' => 'AlphaNum',
        'iran_mobile' => 'IranMobile',
        'sheba' => 'Sheba',
        'melli_code' => 'MelliCode',
        'is_not_persian' => 'IsNotPersian',
        'limited_array' => 'LimitedArray',
        'unsigned_num' => 'UnSignedNum',
        'alpha_space' => 'AlphaSpace',
        'a_url' => 'Url',
        'a_domain' => 'Domain',
        'more' => 'More',
        'less' => 'Less',
        'iran_phone' => 'IranPhone',
        'iran_phone_with_area_code' => 'IranPhoneWithAreaCode',
        'card_number' => 'CardNumber',
        'address' => 'Address',
        'iran_postal_code' => 'IranPostalCode',
        'package_name' => 'PackageName',
    ];


    /**
     * @var string $moduleName
     */
    protected $moduleName = 'PanelCore';

    /**
     * @var string $moduleNameLower
     */
    protected $moduleNameLower = 'panel_ui';

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
//        $this->registerFactories();
        $this->loadMigrationsFrom(module_path($this->moduleName, 'Database/Migrations'));

        foreach ($this->validationRules as $name => $method) {
            Validator::extend($name, 'Modules\PanelCore\Validators\ValidationRules@' . $method);

//            Validator::replacer($name, 'ValidationMessages@Msg');
        }
        $this->composeView();


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
            module_path($this->moduleName, 'Config/config.php') => config_path($this->moduleNameLower . '.php'),
        ], 'config');
        $this->mergeConfigFrom(
            module_path($this->moduleName, 'Config/config.php'), $this->moduleNameLower
        );
    }

    /**
     * Register views.
     *
     * @return void
     */
    public function registerViews()
    {
        $viewPath = resource_path('views/modules/' . $this->moduleNameLower);

        $sourcePath = module_path($this->moduleName, 'Resources/views');

        $this->publishes([
            $sourcePath => $viewPath
        ], ['views', $this->moduleNameLower . '-module-views']);

        $this->loadViewsFrom(array_merge($this->getPublishableViewPaths(), [$sourcePath]), $this->moduleNameLower);
    }

    /**
     * Register translations.
     *
     * @return void
     */
    public function registerTranslations()
    {
        $langPath = resource_path('lang/modules/' . $this->moduleNameLower);

        if (is_dir($langPath)) {
            $this->loadTranslationsFrom($langPath, $this->moduleNameLower);
        } else {
            $this->loadTranslationsFrom(module_path($this->moduleName, 'Resources/lang'), $this->moduleNameLower);
        }
    }

    /**
     * Register an additional directory of factories.
     *
     * @return void
     */
    public function registerFactories()
    {
        if (!app()->environment('production') && $this->app->runningInConsole()) {
            app(Factory::class)->load(module_path($this->moduleName, 'Database/factories'));
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

    private function getPublishableViewPaths(): array
    {
        $paths = [];
        foreach (\Config::get('view.paths') as $path) {
            if (is_dir($path . '/modules/' . $this->moduleNameLower)) {
                $paths[] = $path . '/modules/' . $this->moduleNameLower;
            }
        }
        return $paths;
    }

    private function composeView()
    {
        view()->composer(['panel_ui::layout.side-menu'], function ($view) {
            // TODO: rules admin
            $view->with('side_menu', config('panel_ui.menu'));
        });
        view()->composer('*', function ($view) {
            $view->with('layout', 'side-menu');
        });


    }
}
