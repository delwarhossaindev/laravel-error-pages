<?php

namespace Delwarhossaindev\ErrorPages;

class Illustration
{
    /**
     * Resolve an illustration to something usable inside a CSS url().
     *
     * The published copy in public/svg wins when it is there, so anyone who
     * ran vendor:publish keeps editing their own file. Otherwise the packaged
     * SVG is inlined as a data URI, which is what makes the pages look right
     * straight after composer require, with nothing published.
     *
     * @param  string  $name
     * @return string
     */
    public static function url($name)
    {
        if (function_exists('public_path') && is_file(public_path('svg/' . $name . '.svg'))) {
            return asset('svg/' . $name . '.svg');
        }

        $packaged = __DIR__ . '/../resources/svg/' . $name . '.svg';

        if (! is_file($packaged)) {
            return '';
        }

        return 'data:image/svg+xml;base64,' . base64_encode(file_get_contents($packaged));
    }
}
