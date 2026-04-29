<?php

namespace Acibd\ErrorPages;

use Illuminate\Support\ServiceProvider;

class ErrorPagesServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        $this->loadViewsFrom(__DIR__ . '/../resources/views', 'error-pages');

        $this->publishes([
            __DIR__ . '/../resources/views/errors' => resource_path('views/errors'),
        ], 'error-pages-views');

        $this->publishes([
            __DIR__ . '/../resources/svg' => public_path('svg'),
        ], 'error-pages-assets');

        $this->publishes([
            __DIR__ . '/../resources/views/errors' => resource_path('views/errors'),
            __DIR__ . '/../resources/svg' => public_path('svg'),
        ], 'error-pages');
    }

    public function register(): void
    {
        //
    }
}
