<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

       <title>Learn-Lara-Inertia</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
        @routes
        @vite('resources/js/app.js')
        @inertiaHead

        <!-- Scripts
{{--        @routes--}}
{{--        @vite(['resources/js/app.js', "resources/js/Pages/{$page['component']}.vue"])--}}
         -->
    </head>
    <body class="antialiased bg-white dark:bg-gray-900 dark:text-gray-100">
        @inertia
    </body>

</html>
