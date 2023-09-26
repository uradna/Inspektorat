<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>

    <link rel="shortcut icon" href="{{ asset('img/favicon.png') }}">
    {{-- <script src="{{ asset('js/hyper-config.js') }}"></script> --}}
    <link href="{{ asset('css/app-saas.min.css') }}" rel="stylesheet" type="text/css" id="app-style">
    <link href="{{ asset('css/icons.min.css') }}" rel="stylesheet" type="text/css">
</head>

<body class="authentication-bg pb-0">
    <div class="auth-fluid">
        {{ $slot }}

    </div>
    <script src="{{ asset('js/vendor.min.js') }}"></script>
    <script src="{{ asset('js/app.min.js') }}"></script>
</body>

</html>
