<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
        <script src="https://cdn.ckeditor.com/4.20.0/standard/ckeditor.js">
            @yield('scripts')
    CKEDITOR.replace( 'editor1', {
    language: 'fr',
    uiColor: '#9AB8F3'
    CKEDITOR.config.enterMode = CKEDITOR.ENTER_BR;
    config.allowedContent = true;
};


            </script>
        <style>
            /* Dark theme styles */
            body {
                background-color: #1a202c; /* Dark gray/blue background */
                color: #e2e8f0; /* Light gray/white text */
            }

            .bg-gray-900 {
                background-color: #2d3748; /* Darker gray background for main container */
            }

            .bg-white {
                background-color: #2d3748; /* Darker gray background for white components */
                color: #e2e8f0; /* Light gray/white text on white components */
            }

            .bg-white.shadow {
                box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06); /* Subtle dark shadow */
            }

            .font-sans {
                font-family: 'figtree', sans-serif; /* Custom font with backup sans-serif */
            }

            .antialiased {
                -webkit-font-smoothing: antialiased;
                -moz-osx-font-smoothing: grayscale;
            }
            .thick-hr {
    border: 0;
    height: 2px;
    background: #000;
}
.comment-box {
    margin-left: 0;
    padding-left: 0;
}
        </style>
        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-900">
            @include('layouts.navigation')

            <!-- Page Heading -->
            @isset($header)
                <header class="bg-white shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endisset

            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>
        </div>

    </body>
</html>
