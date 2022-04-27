<!DOCTYPE html>
<html lang="{{ $page->language ?? 'en' }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="canonical" href="{{ $page->getUrl() }}">
        <meta name="description" content="{{ $page->description }}">

        <!--BEGIN: Google verification-->
        <meta name="google-site-verification" content="0adrCvwZ3UQ8wJrrJhhdIsu3CZFFBg6Z3yT-p3UFGvc" />
        <!--BEGIN: Google verification-->
        
        <!--BEGIN: Favicon-->
        <link rel="apple-touch-icon" sizes="180x180" href="{{ '../assets/images/favicon/apple-touch-icon.png' }}"/>
        <link rel="icon" type="image/png" sizes="32x32" href="{{ '../assets/images/favicon/favicon-32x32.png' }}"/>
        <link rel="icon" type="image/png" sizes="16x16" href="{{ '../assets/images/favicon/favicon-16x16.png' }}"/>
        <link rel="manifest" href="{{ '../assets/images/favicon/site.webmanifest' }}" />
        <link rel="mask-icon" href="{{ '../assets/images/favicon/safari-pinned-tab.svg' }}" color="#5bbad5"/>
        <meta name="msapplication-TileColor" content="#da532c" />
        <meta name="theme-color" content="#ffffff" />
        <!--END: Favicon-->

        <title>{{ $page->title }} - Alpineapple</title>
        
        <link rel="stylesheet" href="https://unpkg.com/@highlightjs/cdn-assets@11.5.1/styles/default.min.css">
        
        <link rel="stylesheet" href="{{ mix('css/main.css', 'assets/build') }}">
        <script defer src="{{ mix('js/main.js', 'assets/build') }}"></script>

        
        <script src="https://unpkg.com/@highlightjs/cdn-assets@11.5.1/highlight.min.js"></script>
        <script>hljs.highlightAll();</script>
    </head>
    <body class="font-Fira-Sans bg-slate-900">
        <!--BEGIN: Header-->
        @include('_partials.header')
        <!--END: Header-->
        
        @yield('body')
        
        <!--BEGIN: Footer-->
        @include('_partials.footer')
        <!--END: Footer-->

    </body>
</html>
