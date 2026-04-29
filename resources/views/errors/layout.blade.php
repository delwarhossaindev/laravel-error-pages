<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>@yield('code') {{ config('app.name', 'AdminLTE') }}</title>
    <link rel="stylesheet" href="{{ asset('adminlte/css/adminlte.min.css') }}" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css" crossorigin="anonymous" />
</head>
<body class="bg-body-tertiary">
    <div class="d-flex align-items-center justify-content-center min-vh-100">
        <div class="container text-center">
            <div class="row justify-content-center">
                <div class="col-md-8 col-lg-6">
                    <img src="{{ asset('svg/' . trim($__env->yieldContent('code')) . '.svg') }}" alt="@yield('code')" class="img-fluid mb-4" style="max-height: 320px;" />
                    <h1 class="display-4 mb-2">@yield('title')</h1>
                    <p class="lead mb-4">@yield('message')</p>
                    <a href="{{ url('/') }}" class="btn btn-primary">
                        <i class="bi bi-house-door-fill me-2"></i> Back to Home
                    </a>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
