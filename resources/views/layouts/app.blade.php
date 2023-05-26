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
        <base href="../">
        <meta charset="utf-8">
        <meta name="author" content="Softnio">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="A powerful and conceptual apps base dashboard template that especially build for developers and programmers.">
        <!-- Fav Icon  -->
        <link rel="shortcut icon" href="{{ asset('assets/auth/images/DMS-favico.png') }}">
        <title>Apalit PDMS </title>
        <!-- StyleSheets  -->
        <link rel="stylesheet" href="{{ asset('assets/auth/css/dashlite.css') }}">
        <link id="skin-default" rel="stylesheet" href="{{ asset('assets/auth/css/theme.css') }}">
        <!-- FontAwesome Icons -->
        <link rel="stylesheet" type="text/css" href="{{ asset('assets/auth/css/libs/bootstrap-icons.css') }}">

        <!-- Themify Icons -->
        <link rel="stylesheet" type="text/css" href="{{ asset('assets/auth/css/libs/themify-icons.css') }}">

        <!-- Bootstrap Icons -->
        <link rel="stylesheet" type="text/css" href="{{ asset('assets/auth/css/libs/fontawesome-icons.css') }}">
        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="nk-body bg-lighter npc-default has-sidebar">
        <div class="nk-app-root">
            <!-- main @s -->
            <div class="nk-main ">
                <!-- sidebar @s -->
               @include('layouts.partials.sidebar')
                <!-- sidebar @e -->
                <!-- wrap @s -->
                <div class="nk-wrap ">
                    <!-- main header @s -->
                    @include('layouts.partials.header')

                    <!-- main header @e -->
                    <!-- content @s -->
                   <!-- Page Content -->
                    <main>
                        {{ $slot }}
                    </main>
                    <!-- content @e -->
                    <!-- footer @s -->
                    @include('layouts.partials.footer')
                    <!-- footer @e -->
                </div>
                <!-- wrap @e -->
            </div>
            <!-- main @e -->
        </div>
        <!-- app-root @e -->
        <!-- JavaScript -->
        <script src="{{ asset('assets/auth/js/bundle.js') }}"></script>
        <script src="{{ asset('assets/auth/js/scripts.js') }}"></script>
        <script src="{{ asset('assets/auth/js/charts/chart-ecommerce.js') }}"></script>
    </body>
</html>
