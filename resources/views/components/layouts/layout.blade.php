<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ config('app.name', 'Instituto') }}</title>
    @vite(["resources/css/app.css", "resources/js/app.js"])
</head>
<body class="min-h-screen flex flex-col bg-zinc-950">

    <x-layouts.header />
    <x-layouts.nav />

    <main class="flex-1 bg-gradient-to-br from-zinc-900 via-zinc-800 to-zinc-900 p-6">
        <div class="max-w-7xl mx-auto">
            {{ $slot }}
        </div>
    </main>

    <x-layouts.footer />

</body>
</html>
