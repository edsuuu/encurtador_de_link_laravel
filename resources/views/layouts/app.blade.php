<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-behavior: smooth">
<head>
    <meta charset="utf-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ config('app.name', 'Laravel') }}</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles
</head>
<body>

<nav class="bg-blue-600 p-4 shadow-md fixed w-full">
    <ul class="flex space-x-6 justify-center text-white font-semibold">
        <li>
            <a href="{{ route('generate') }}" class="hover:text-gray-300 transition">Encurtar Link</a>
        </li>
        <li>
            <a href="{{ route('dashboard') }}" class="hover:text-gray-300 transition">Dashboard</a>
        </li>
    </ul>
</nav>


<main>
    {{$slot}}
</main>

@livewireScripts
</body>
</html>
