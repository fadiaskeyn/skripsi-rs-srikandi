<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>{{ config('app.name', 'Laravel') }}</title>
        {{-- stylessheet for icon and fonts --}}
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@200;300;400;500;600;700;800&display=swap" rel="stylesheet">
        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        {{-- css injection --}}
        @stack('style-injection')
    </head>
    {{-- default font set globally to plus jakarta sans --}}
    <body class="font-plus-jakarta-sans antialiased">
            <div class="layout">
                {{-- sidebar--}}
                @if(Route::current()->getName() !== 'reports.preview')
                    @include('components.sidebar')
                @endif
                <div class="w-full overflow-y-auto">
                    {{-- header --}}
                    @if(Route::current()->getName() !== 'reports.preview')
                        @include('components.header')
                    @endif
                    {{-- content section --}}
                    <div class="p-5 h-screen">
                        @yield('content')
                    </div>
                </div>
            </div>
        </div>
    </body>
    {{-- require plugins for javascript --}}
    <script src="{{ asset('plugins/js/jquery.min.js') }}"></script>
    <script src="{{ asset('plugins/js/apexcharts.js') }}"></script>
    <script src="{{ asset('plugins/js/select2.min.js') }}"></script>
    <script src="{{ asset('plugins/js/sweetalert2.js') }}"></script>
    <script src="https://code.iconify.design/iconify-icon/1.0.7/iconify-icon.min.js"></script>
    {{-- default app js --}}
    <script src="{{ asset('js/app.js') }}"></script>
    {{-- javascript injection --}}
    @stack('script-injection')
</html>
