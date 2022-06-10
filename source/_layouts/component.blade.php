<!DOCTYPE html>
<html lang="{{ $page->language ?? 'en' }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="canonical" href="{{ $page->getUrl() }}">
        <meta name="description" content="{{ $page->description }}">

        <!-- Open Graph / Facebook -->
        <meta property="og:type" content="website">
        <meta property="og:url" content="https://www.alpineapple.dev/">
        <meta property="og:title" content="{{ $page->title }} Component | Alpineapple">
        <meta property="og:description" content="{{ $page->description }}">
        <meta property="og:image" content="{{ '../assets/images/social.png' }}">

        <!-- Twitter -->
        <meta property="twitter:card" content="summary_large_image">
        <meta property="twitter:url" content="https://www.alpinetoolbox.com/">
        <meta property="twitter:title" content="{{ $page->title }} Component | Alpineapple">
        <meta property="twitter:description" content="{{ $page->description }}">
        <meta property="twitter:image" content="{{ '../assets/images/pineapple.png' }}">

        <!--BEGIN: Google verification-->
        <meta name="google-site-verification" content="0adrCvwZ3UQ8wJrrJhhdIsu3CZFFBg6Z3yT-p3UFGvc" />
        <!--BEGIN: Google verification-->
        
        <!-- Fathom - beautiful, simple website analytics -->
        <script src="https://cdn.usefathom.com/script.js" data-site="BWTFRLNN" defer></script>
        <!-- / Fathom -->

        <!--BEGIN: Favicon-->
        <link rel="apple-touch-icon" sizes="180x180" href="{{ '../assets/images/favicon/apple-touch-icon.png' }}"/>
        <link rel="icon" type="image/png" sizes="32x32" href="{{ '../assets/images/favicon/favicon-32x32.png' }}"/>
        <link rel="icon" type="image/png" sizes="16x16" href="{{ '../assets/images/favicon/favicon-16x16.png' }}"/>
        <link rel="manifest" href="{{ '../assets/images/favicon/site.webmanifest' }}" />
        <link rel="mask-icon" href="{{ '../assets/images/favicon/safari-pinned-tab.svg' }}" color="#5bbad5"/>
        <meta name="msapplication-TileColor" content="#da532c" />
        <meta name="theme-color" content="#ffffff" />
        <!--END: Favicon-->

        <title>{{ $page->title }} Component | Alpineapple</title>
        
        
        <link rel="stylesheet" href="{{ mix('css/main.css', 'assets/build') }}">
        <script defer src="{{ mix('js/main.js', 'assets/build') }}"></script>
        
    </head>
    <body class="font-Fira-Sans bg-slate-900">
        <!--BEGIN: Header-->
        @include('_partials.header')
        <!--END: Header-->
        
        <main class="mx-2 sm:mx-10 relative">

            <div class="mt-10 grid grid-cols-12 gap-5 md:gap-10">
                <!--BEGIN: Sidebar-->
                <div class="hidden md:block col-span-2">
                    @include('_partials.sidebar')
                </div>
                <!--END: Sidebar-->
                    
                @yield('body')
        
            </div>
    
        </main>
        <!--BEGIN: Footer-->
        @include('_partials.footer')
        <!--END: Footer-->
        
    </body>
</html>
