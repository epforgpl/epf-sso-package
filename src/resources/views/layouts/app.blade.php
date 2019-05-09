<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title')</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <div class="menu-main">
            <a href="https://epf.org.pl" class="navbar-brand">
                <img src="{{ asset('images/logo-epanstwo.svgz') }}" class="svg" width="187" height="63" alt="Fundacja ePanstwo">
            </a>
            <h4 class="mt-4">Logowanie do serwisów Fundacji ePaństwo</h4>
            {{-- Icons defined as section because we want to override them in some sub-templates. --}}
            @section('header-links')
                <ul class="services mt-3">
                    <li><a target="_blank" href="https://rejestr.io"><img src="{{ asset('images/services/rejestrio.svg') }}"></a></li>
                    <li><a target="_blank" href="https://mojeprawo.io"><img src="{{ asset('images/services/mojeprawo.svg') }}"></a></li>
                    <li><a target="_blank" href="https://sejmometr.pl"><img src="{{ asset('images/services/sejmometr.svg') }}"></a></li>
                    {{-- TODO: Uncomment when we want to show archiwum.io
                    <li><a target="_blank" href="https://archiwum.io"><img src="{{ asset('images/services/archiwum.svg') }}"></a></li>
                    --}}
                </ul>
            @endsection
            @yield('header-links')
        </div>

        @yield('content')

        {{-- The 'push' element below is part of 'sticky footer' solution. https://stackoverflow.com/a/12239188 --}}
        <div class="push"></div>
    </div>
    <footer id="footer">
        TODO: Footer content
    </footer>
</body>
</html>
