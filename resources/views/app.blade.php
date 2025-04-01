<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="color-scheme" content="light only">
    <title inertia>{{ config('app.name', 'Laravel') }}</title>
    @routes
    @viteReactRefresh
    @vite(['resources/js/app.jsx','resources/scss/app.scss', "resources/js/pages/{$page['component']}.jsx"])
    @inertiaHead
</head>
<body class="h-screen" data-theme="custom">
@inertia
</body>
</html>
