# Laravel Error Pages

Pre-styled HTTP error pages (`403`, `404`, `500`, `503`) for Laravel apps with matching SVG illustrations. Designed for AdminLTE / Bootstrap 5 projects.

## Requirements

- PHP `^8.1`
- Laravel `10.x`, `11.x`, or `12.x`
- AdminLTE CSS available at `public/adminlte/css/adminlte.min.css` (or edit the published `layout.blade.php` to point to your own CSS)

## Installation

Add the package to your Laravel project via Composer.

If you have published it on Packagist:

```bash
composer require acibd/laravel-error-pages
```

Source code: <https://github.com/delwarhossaindev/laravel-error-pages>

If you are using it as a local path repository, add this to your project's `composer.json`:

```json
"repositories": [
    {
        "type": "path",
        "url": "../package"
    }
]
```

then:

```bash
composer require acibd/laravel-error-pages:@dev
```

## Publishing assets

Publish both the Blade views and the SVG illustrations:

```bash
php artisan vendor:publish --tag=error-pages
```

Or publish them separately:

```bash
php artisan vendor:publish --tag=error-pages-views
php artisan vendor:publish --tag=error-pages-assets
```

This will copy:

- views → `resources/views/errors/`
- SVGs → `public/svg/`

Laravel automatically picks up the views in `resources/views/errors/` and renders them for the matching HTTP status codes.

## Customization

After publishing, edit the files freely:

- `resources/views/errors/layout.blade.php` — shared layout (CSS, structure)
- `resources/views/errors/{403,404,500,503}.blade.php` — per-status title and message
- `public/svg/*.svg` — replace illustrations with your own

## Folder structure

```
package/
├── composer.json
├── README.md
├── src/
│   └── ErrorPagesServiceProvider.php
└── resources/
    ├── views/
    │   └── errors/
    │       ├── 403.blade.php
    │       ├── 404.blade.php
    │       ├── 500.blade.php
    │       ├── 503.blade.php
    │       └── layout.blade.php
    └── svg/
        ├── 403.svg
        ├── 404.svg
        ├── 500.svg
        ├── 503.svg
        ├── favicon.ico
        └── laravel.svg
```

## License

MIT
