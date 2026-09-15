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

        $this->registerErrorViewPath();
        $this->registerPublishing();
    }

    public function register()
    {
        //
    }

    /**
     * Laravel rebuilds the "errors" view namespace from config('view.paths')
     * every time it renders an HTTP exception, which throws away whatever
     * loadViewsFrom() registered under that namespace. Appending our own
     * directory to view.paths survives the rebuild, so the pages show up
     * without anything being published. The application's own path stays
     * first in the list, so a published errors/ folder still wins.
     *
     * @return void
     */
    protected function registerErrorViewPath()
    {
        $config = $this->app['config'];
        $paths = $config->get('view.paths');

        if (! is_array($paths)) {
            return;
        }

        $ours = __DIR__ . '/../resources/views';

        if (! in_array($ours, $paths)) {
            $paths[] = $ours;

            $config->set('view.paths', $paths);
        }
    }

    /**
     * @return void
     */
    protected function registerPublishing()
    {
        $views = array(__DIR__ . '/../resources/views/errors' => resource_path('views/errors'));
        $assets = array(__DIR__ . '/../resources/svg' => public_path('svg'));
        $lang = array(__DIR__ . '/../resources/lang/en/auth.php' => $this->langPublishPath());

        $this->publishes($views, 'error-pages-views');
        $this->publishes($assets, 'error-pages-assets');
        $this->publishes($lang, 'error-pages-lang');
        $this->publishes(array_merge($views, $assets, $lang), 'error-pages');
    }

    /**
     * Translations publish into the vendor override folder Laravel already
     * looks in for the "error-pages" namespace, so they never collide with
     * the application's own lang/en/auth.php. lang_path() only exists from
     * Laravel 9 onwards; before that the lang folder lived under resources.
     *
     * @return string
     */
    protected function langPublishPath()
    {
        if (function_exists('lang_path')) {
            return lang_path('vendor/error-pages/en/auth.php');
        }

        return resource_path('lang/vendor/error-pages/en/auth.php');
    }
}
