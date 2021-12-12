<!DOCTYPE html>
<html class="h-full bg-gray-100" lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

		@livewireStyles
		<link rel="stylesheet" href="https://rsms.me/inter/inter.css">
		<link rel="stylesheet" href="{{ mix('css/app.css') }}">

		@stack('styles')

        <title>Livewire Playground</title>
    </head>

    <body class="h-full">
		<x-notification />

		<x-layout.brand-sidebar-light-header-layout>
			{{ $slot }}
		</x-layout.brand-sidebar-light-header-layout>


		@livewireScripts
			<script src="{{ mix('js/app.js') }}"></script>
		@stack('scripts')
    </body>
</html>