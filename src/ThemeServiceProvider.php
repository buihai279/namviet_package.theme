<?php

namespace Namviet\Theme;

use Illuminate\Support\ServiceProvider;

class ThemeServiceProvider extends ServiceProvider
{
    public function register()
    {
        //
    }

    public function boot()
    {
        $this->loadViewsFrom(__DIR__ . '/../resources/views/layouts', 'layouts');
        if ($this->app->runningInConsole()) {
            // Publish views
            $this->publishes([
                __DIR__ . '/../resources/views/layouts' => resource_path('views/vendor/layouts'),
            ], 'nv-theme-views-layouts');
            // Publish assets
            $this->publishes([
                __DIR__ . '/../resources/assets' => public_path('vendor/theme'),
            ], 'nv-theme-assets');
        }
    }
}
