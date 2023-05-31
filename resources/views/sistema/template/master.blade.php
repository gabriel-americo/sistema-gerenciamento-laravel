<!DOCTYPE html>
<html lang="pt">
    <head>
        <base href="">
        <meta charset="utf-8" />
        <title>Sistema de Gerenciamento | E-commerce</title>
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('/assets/media/logos/apple-touch-icon.png') }}">
        <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('/assets/media/logos/favicon-32x32.png') }}">
        <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('/assets/media/logos/favicon-16x16.png') }}">
        <link rel="manifest" href="{{ asset('/assets/media/logos/site.webmanifest') }}">

        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Inter:300,400,500,600,700" />

        <link href="{{ asset('/assets/plugins/global/plugins.bundle.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('/assets/css/style.bundle.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('/assets/css/main.css') }}" rel="stylesheet" type="text/css" />

        <link href="{{ asset('/assets/plugins/custom/datatables/datatables.bundle.css') }}" rel="stylesheet" type="text/css" />
    </head>

    <body data-kt-app-layout="dark-sidebar" data-kt-app-header-fixed="true" data-kt-app-sidebar-enabled="true" data-kt-app-sidebar-fixed="true" data-kt-app-sidebar-hoverable="true" data-kt-app-sidebar-push-header="true" data-kt-app-sidebar-push-toolbar="true" data-kt-app-sidebar-push-footer="true" data-kt-app-toolbar-enabled="true" class="app-default">
        @include('sistema.template.header')
        @include('flash::message')
        @yield('content')
        @include('sistema.template.footer')

        <script src="{{ asset('/assets/plugins/global/plugins.bundle.js') }}" ></script>
        <script src="{{ asset('/assets/js/scripts.bundle.js') }}" ></script>
        <script src="{{ asset('/assets/js/custom.js') }}" ></script>

        <script src="{{ asset('/assets/plugins/custom/datatables/datatables.bundle.js') }}" ></script>
        <script src="{{ asset('/assets/plugins/custom/ckeditor/ckeditor-classic.bundle.js') }}" ></script>
        
        @yield('ajax-status')
    </body>
</html>