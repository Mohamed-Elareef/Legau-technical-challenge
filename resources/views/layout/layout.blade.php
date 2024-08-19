<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title') | {{ config('app.name', 'LEgau') }}</title>
    <meta name="Renato Silva" CONTENT="Legau">
    <link rel="canonical" href="https://legau.pt">
    <meta property="og:url" content="https://legau.pt">
    <meta property="og:site_name" content="Save time. Draft better.">

    @yield('meta')


    <link rel="apple-touch-icon" sizes="144x144" href="{{asset('favicon.png')}}">
    <link rel="shortcut icon" href="{{asset('favicon.ico')}}">
    <meta name="theme-color" content="#3063A0">

    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/toastr.min.css') }}" rel="stylesheet">

    @yield('css')

    <link rel="stylesheet" href="{{asset('css/theme.min.css')}}" data-skin="default">
    <link rel="stylesheet" href="{{asset('css/theme-dark.min.css')}}" data-skin="dark">
    <link rel="stylesheet" href="{{asset('css/custom.css')}}" data-skin="dark">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script>
        var skin = localStorage.getItem('skin') || 'default';
        var isCompact = JSON.parse(localStorage.getItem('hasCompactMenu'));
        var disabledSkinStylesheet = document.querySelector('link[data-skin]:not([data-skin="' + skin + '"])');
        // Disable unused skin immediately
        disabledSkinStylesheet.setAttribute('rel', '');
        disabledSkinStylesheet.setAttribute('disabled', true);
        // add flag class to html immediately
        if (isCompact == true) document.querySelector('html').classList.add('preparing-compact-menu');
        document.querySelector('html').classList.add('loading');
    </script>


</head>

<body>
<div class="app">

@include('layout.header')
@include('layout.sidebar')
@yield('content')

</div>

<script src="{{asset('js/jquery.min.js')}}"></script>
<script src="{{asset('js/popper.min.js')}}"></script>
<script src="{{asset('js/bootstrap.min.js')}}"></script>

<script src="{{asset('js/pace.min.js')}}"></script>
<script src="{{asset('js/stacked-menu.js')}}"></script>
<script src="{{asset('js/perfect-scrollbar.min.js')}}"></script>
<script src="{{asset('js/toastr.min.js')}}"></script>

<script src="{{ asset('js/app.js') }}"></script>
<script src="{{asset('js/theme.min.js')}}"></script>


@toastr_render
@yield('js')


</body>
</html>
