<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>{{ config('app.name', 'Laravel') }}</title>
        @vite(['resources/scss/app.scss', 'resources/js/app.js'])
    </head>
    <body class="hold-transition sidebar-mini layout-fixed">
        <div class="wrapper">
            <!-- Preloader -->
            @include('admin.layouts.navbar')
            @include('admin.layouts.sidebar')
            @yield('content')
        </div>
        <footer class="main-footer">
            <strong>Copyright &copy; 2014-2021 
                <a href="https://adminlte.io">AdminLTE.io</a>.
            </strong>
            All rights reserved.
            <div class="float-right d-none d-sm-inline-block">
                <b>Version</b> 3.2.0
            </div>
        </footer>
    </body>
</html>