<!DOCTYPE html>
<html lang="{{  app()->getLocale() }}" data-controller="html-load" dir="{{ \Orchid\Support\Locale::currentDir() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no, user-scalable=no">
    <title>
        @yield('title', config('app.name'))
        @hasSection('title')
            - {{ config('app.name') }}
        @endif
    </title>
    <meta name="csrf_token" content="{{ csrf_token() }}" id="csrf_token">
    <meta name="auth" content="{{ Auth::check() }}" id="auth">
    @if(\Orchid\Support\Locale::currentDir(app()->getLocale()) == "rtl")
        <link rel="stylesheet" type="text/css" href="{{  mix('/css/orchid.rtl.css','vendor/orchid') }}">
    @else
        <link rel="stylesheet" type="text/css" href="{{  mix('/css/orchid.css','vendor/orchid') }}">
    @endif

    @stack('head')

    <meta name="view-transition" content="same-origin">
    <meta name="turbo-root" content="{{  Dashboard::prefix() }}">
    <meta name="turbo-refresh-method" content="{{ config('platform.turbo.refresh-method', 'replace') }}">
    <meta name="turbo-refresh-scroll" content="{{ config('platform.turbo.refresh-scroll', 'reset') }}">
    <meta name="turbo-prefetch" content="{{ var_export(config('platform.turbo.prefetch', true)) }}">
    <meta name="dashboard-prefix" content="{{  Dashboard::prefix() }}">

    @if(!config('platform.turbo.cache', false))
        <meta name="turbo-cache-control" content="no-cache">
    @endif

    <script src="{{ mix('/js/manifest.js','vendor/orchid') }}" type="text/javascript"></script>
    <script src="{{ mix('/js/vendor.js','vendor/orchid') }}" type="text/javascript"></script>
    <script src="{{ mix('/js/orchid.js','vendor/orchid') }}" type="text/javascript"></script>

    @foreach(Dashboard::getResource('stylesheets') as $stylesheet)
        <link rel="stylesheet" href="{{  $stylesheet }}">
    @endforeach

    @stack('stylesheets')

    @foreach(Dashboard::getResource('scripts') as $scripts)
        <script src="{{  $scripts }}" defer type="text/javascript"></script>
    @endforeach

    @if(!empty(config('platform.vite', [])))
        @vite(config('platform.vite'))
    @endif
    <style>
        .rik_login{
            background:url({{asset('web/img/bg_login.jpg')}});
        }
    </style>
</head>

<body class="{{ \Orchid\Support\Names::getPageNameClass() }}" data-controller="pull-to-refresh">

<div class="container-fluid" data-controller="@yield('controller')" @yield('controller-data')>

    <div class="row justify-content-center d-md-flex h-100">
        @yield('aside')

        <div class="col-xxl col-xl-9 col-12 rik_login" >
            <div class="container-md" >
                <div class="form-signin h-full min-vh-100 d-flex flex-column justify-content-center">

                    <a class="d-flex justify-content-center mb-4 p-0 px-sm-5" href="{{Dashboard::prefix()}}">
                        @includeFirst([config('platform.template.header'), 'platform::header'])
                    </a>

                    <div class="row justify-content-center">
                        <div class="col-md-10 col-lg-5 col-xxl-5 px-md-5">
                            <div class="bg-white p-4 p-sm-5 rounded shadow-sm">
                                @yield('content')
                            </div>
                        </div>
                    </div>
                    @includeFirst([config('platform.template.footer'), 'platform::footer'])
                </div>
            </div>
        </div>
    </div>


    @include('platform::partials.toast')
</div>

@stack('scripts')
