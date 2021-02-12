<!DOCTYPE html>

<html dir="{{ getCurrentLocaleDirection() }}"
      {{--      lang="{{ str_replace('_', '-', app()->getLocale()) }}"--}}
      lang="{{ str_replace('_', '-', app()->getLocale()) }}"
>
<!-- BEGIN: Head -->
<head>
    <meta charset="utf-8">
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('app-assets/images/ico/favicon.ico') }}">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="robots" content="noindex">

    {{--    todo dynamic from db.otpions_table --}}
    <title>@yield('title')</title>
    <meta name="description" content="zaman.tech">
    <meta name="keywords" content="zaman.tech">
    <meta name="author" content="zaman.tech">
    @yield('head')
<!-- BEGIN: CSS Assets-->
    <link rel="stylesheet" href="{{ mix('dist/css/app.css') }}"/>
    <!-- END: CSS Assets-->
    @stack('styles')
</head>
<!-- END: Head -->

@yield('body')
@include('panel_ui::layout.components.errors')

</html>
