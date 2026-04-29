<?php

namespace Delwarhossaindev\ErrorPages;

use Illuminate\Support\ServiceProvider;

class ErrorPagesServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->loadViewsFrom(__DIR__ . '/../resources/views', 'error-pages');
        $this->loadViewsFrom(__DIR__ . '/../resources/views/errors', 'errors');
        $this->loadTranslationsFrom(__DIR__ . '/../resources/lang', 'error-pages');

        $this->publishes(array(
            __DIR__ . '/../resources/views/errors' => resource_path('views/errors'),
        ), 'error-pages-views');

        $this->publishes(array(
            __DIR__ . '/../resources/svg' => public_path('svg'),
        ), 'error-pages-assets');

        $this->publishes(array(
            __DIR__ . '/../resources/lang/en/auth.php' => lang_path('en/auth.php'),
        ), 'error-pages-lang');

        $this->publishes(array(
            __DIR__ . '/../resources/views/errors' => resource_path('views/errors'),
            __DIR__ . '/../resources/svg' => public_path('svg'),
            __DIR__ . '/../resources/lang/en/auth.php' => lang_path('en/auth.php'),
        ), 'error-pages');
    }

    public function register()
    {
        //
    }
}
