<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>

    <script>
        // On page load or when changing themes, best to add inline in `head` to avoid FOUC
        if (localStorage.getItem('color-theme') === 'dark' || (!('color-theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
            document.documentElement.classList.add('dark');
        } else {
            document.documentElement.classList.remove('dark')
        }
    </script>

    <script>
        if(localStorage.getItem('darkMode') === 'enabled' || !(localStorage.getItem('darkMode') in localStorage))
        {
            var x = document.documentElement.classList.add('dark-section');
            console.log(x);
        } else {
            document.documentElement.classList.remove('dark-section');
        }

    </script>

    <script type="text/javascript" src="https://cdn.weglot.com/weglot.min.js"></script>
    <script>
        Weglot.initialize({
            api_key: 'wg_85836cc7902dfd7bbb46ecbb6a19bac07'
        });
    </script>
    @if(isset($seo->title))
        <title>{{ $seo->title }}</title>
    @else
        <title>{{ setting('site.title', 'Laravel Wave') . ' - ' . setting('site.description', 'The Software as a Service Starter Kit built on Laravel & Voyager') }}</title>
    @endif

    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge"> <!-- † -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="url" content="{{ url('/') }}">

    <link rel="icon" href="{{ setting('site.favicon', '/wave/favicon.png') }}" type="image/x-icon">

    {{-- Social Share Open Graph Meta Tags --}}
    @if(isset($seo->title) && isset($seo->description) && isset($seo->image))
        <meta property="og:title" content="{{ $seo->title }}">
        <meta property="og:url" content="{{ Request::url() }}">
        <meta property="og:image" content="{{ $seo->image }}">
        <meta property="og:type" content="@if(isset($seo->type)){{ $seo->type }}@else{{ 'article' }}@endif">
        <meta property="og:description" content="{{ $seo->description }}">
        <meta property="og:site_name" content="{{ setting('site.title') }}">

        <meta itemprop="name" content="{{ $seo->title }}">
        <meta itemprop="description" content="{{ $seo->description }}">
        <meta itemprop="image" content="{{ $seo->image }}">

        @if(isset($seo->image_w) && isset($seo->image_h))
            <meta property="og:image:width" content="{{ $seo->image_w }}">
            <meta property="og:image:height" content="{{ $seo->image_h }}">
        @endif
    @endif

    <meta name="robots" content="index,follow">
    <meta name="googlebot" content="index,follow">

    @if(isset($seo->description))
        <meta name="description" content="{{ $seo->description }}">
    @endif

    <!-- Styles -->
    <link href="{{ asset('themes/' . $theme->folder . '/css/app.css?1') }}" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.8.0/flowbite.min.js"></script>

{{--    @vite(['resources/css/app.css','resources/js/app.js'])--}}

    <style>
        main, header, footer, .dark-section,  .input-field-dark {
            transition: 0.5s background ease;
        }
        .dark {
            background: #151521;
            border-color: #2b2b40;
        }
        .semi-dark{
            background: #1e1e2d;
            border-color: #2b2b40;
        }

        /*Light Content*/
        .text-light {
            color: #9ca3af;
        }
        .border-color-light {
            /*border-color: #9ca3af;*/
            border-color: #2b2b40;
        }

        .input-field-dark {
            background-color: #151521;
            color: #9ca3af;
        }

        /*Notification Menu Border Dark*/
        .notification-menu-border-dark {
            border: 0;
            background-color: #151521;
        }

        /*User Menus Border Color*/
        .border-color-dark {
            border-color: #151521;
        }


        /* Custom Dark Theme CSS Styles */
        /* Header section */
        header#nav-header {
            background: #1e1e2d;
            border-color: #2b2b40;
        }
        header#nav-header a {
            color: #9ca3af;
        }
        /* Header section ends */

        /* Main section */
        main#main-section {
            background: #151521;
            border-color: #2b2b40;
        }
        /* Main section ends */

        /* Footer section */
        footer#footer-section {
            background: #1e1e2d;
            border-color: #2b2b40;
        }
        footer#footer-section div.border-color {
            border-color: #2b2b40;
        }
        ul.footer-links > li.text{
            color: #9ca3af !important;
        }
        ul.footer-links > li.text > a{
            color: #9ca3af !important;
        }
        /* Footer section ends */

        /* Right and left panel common css classes */
        div.dark-section {
            background: #151521;
            border-color: #2b2b40;
        }
        .text, div > i.fa-color, span.g-text {
            color: #9ca3af !important;
        }
        input[type='text'] {
            background: #151521;
            color: #9ca3af;
        }
        .hover\:text-gray-900:hover {
            --tw-text-opacity: 1;
            color: rgb(17 24 39/var(--tw-text-opacity)) !important;
        }
        .hover\:text-gray-900:active {
            --tw-text-opacity: 1;
            color: rgb(17 24 39/var(--tw-text-opacity)) !important;
        }

        /* Transaction view section */
        hr.field-underline {
            width: 95%;
            margin-left: 1.5rem;
            height: 2px;
            border-radius: 50px;
            border-color: #2b2b40;
        }

        /* Create support ticket */
        input[type='file'] {
            background: #151521;
            color: #9ca3af;
        }
        textarea[id='message'] {
            background: #151521;
            color: #9ca3af;
        }

        /* Profile Textarea */
        textarea[name='about'] {
            background: #151521;
            color: #9ca3af;
        }

        /* Security Input Fields */
        input[type='password'] {
            background: #151521;
            color: #9ca3af;
        }

        /* Email Input Fields */
        input[type='email'] {
            background: #151521;
            color: #9ca3af;
        }

        /* User Dropdown Menu */
        div#user-menu {
            border-color: #151521;
        }
        .border-t {
        border-top-width: 1px;
        border-color: #2b2b40 !important;
        }

        /* Notification Menu */
        div.notification-menu {
            border-color: #151521 !important;
            background-color: #151521 !important;
        }

        /* Custom Dark Theme CSS Styles Ends */

        a.menu:hover, a.menu:focus {
            /* background: #2b2b40; */
            background: #9ca3af;
            color: #000 !important;
        }
        a.menu:hover svg{
            color: #000 !important;
        }
        a.menu:hover span.left-0 {
            background: #2b2b40;
         background: #0069ff

        }


    </style>
</head>
<body class="flex flex-col min-h-screen @if(Request::is('/')){{ 'bg-white' }}@else{{ 'bg-gray-50' }}@endif @if(config('wave.dev_bar')){{ 'pb-10' }}@endif">

    @if(config('wave.demo') && Request::is('/'))
        @include('theme::partials.demo-header')
    @endif

    @include('theme::partials.header')

    <main id="main-section" class="flex-grow overflow-x-hidden bg-white dark:bg-gray-800">
        @yield('content')
    </main>



    @include('theme::partials.footer')

    @if(config('wave.dev_bar'))
        @include('theme::partials.dev_bar')
    @endif

    <!-- Full Screen Loader -->
    <div id="fullscreenLoader" class="fixed inset-0 top-0 left-0 z-50 flex flex-col items-center justify-center hidden w-full h-full bg-gray-900 opacity-50">
        <svg class="w-5 h-5 mr-3 -ml-1 text-white animate-spin" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
          <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
          <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
        </svg>
        <p id="fullscreenLoaderMessage" class="mt-4 text-sm font-medium text-white uppercase"></p>
    </div>
    <!-- End Full Loader -->


    @include('theme::partials.toast')
    @if(session('message'))
        <script>setTimeout(function(){ popToast("{{ session('message_type') }}", "{{ session('message') }}"); }, 10);</script>
    @endif
    @waveCheckout

    <!-- Scripts -->
    <script>
        var themeToggleDarkIcon = document.getElementById('theme-toggle-dark-icon');
        var themeToggleLightIcon = document.getElementById('theme-toggle-light-icon');

        // Change the icons inside the button based on previous settings
        if (localStorage.getItem('color-theme') === 'dark' || (!('color-theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
            themeToggleLightIcon.classList.remove('hidden');
        } else {
            themeToggleDarkIcon.classList.remove('hidden');
        }

        var themeToggleBtn = document.getElementById('theme-toggle');

        themeToggleBtn.addEventListener('click', function() {

            // toggle icons inside button
            themeToggleDarkIcon.classList.toggle('hidden');
            themeToggleLightIcon.classList.toggle('hidden');

            // if set via local storage previously
            if (localStorage.getItem('color-theme')) {
                if (localStorage.getItem('color-theme') === 'light') {
                    document.documentElement.classList.add('dark');
                    localStorage.setItem('color-theme', 'dark');
                } else {
                    document.documentElement.classList.remove('dark');
                    localStorage.setItem('color-theme', 'light');
                }

            // if NOT set via local storage previously
            } else {
                if (document.documentElement.classList.contains('dark')) {
                    document.documentElement.classList.remove('dark');
                    localStorage.setItem('color-theme', 'light');
                } else {
                    document.documentElement.classList.add('dark');
                    localStorage.setItem('color-theme', 'dark');
                }
            }

        });

</script>



    <script>
        let darkMode = localStorage.getItem('darkMode');

        function enableDarkMode() {
            $("main").addClass('dark');
            $("header").addClass('semi-dark');
            $("footer").addClass('semi-dark');

            $(".dark-section").addClass('dark');

            // For text
            $('.text').addClass('text-light');
            $('.border-color').addClass('border-color-light');
            $('span.bigText').removeClass('g-text');
            $('i.fa-solid').removeClass('fa-color');


            // Set Goad Purpose
            $('input#funds_for').addClass('input-field-dark');
            // Refer User Input Field
            $('input.refer-user').addClass('input-field-dark');

            // Create Ticket Subject Input
            $('input#subject').addClass('input-field-dark');
            // Create Ticket Message Textarea
            $('textarea#message').addClass('input-field-dark');
            // Create Ticket file Textarea
            $('input#file').addClass('input-field-dark');

            // Settings Fields
            $('input.settings').addClass('input-field-dark');
            $('textarea[name*=about]').addClass('input-field-dark');
            //Api Key Horizontal Line
            $('hr.hr').addClass('border-color-light');

            // Notification Menu
            $('div.notification-menu').addClass('notification-menu-border-dark');

            // User Menu Border Setting
            $('div#user-menu').addClass('border-color-dark');
            // User Menu Border Setting
            $('div.border-light').addClass('border-color-light');

            localStorage.setItem('darkMode', 'enabled');
        }

        function disableDarkMode() {
            $("main").removeClass('dark');
            $("header").removeClass('semi-dark');
            $("footer").removeClass('semi-dark');

            $(".dark-section").removeClass('dark');
            // For text
            $('.text').removeClass('text-light');
            $('.border-color').removeClass('border-color-light');
            $('span.bigText').addClass('g-text');
            $('i.fa-solid').addClass('fa-color');


            // Set Goal Purpose
            $('input#funds_for').removeClass('input-field-dark');
            // Refer User Input Field
            $('input.refer-user').removeClass('input-field-dark');

            // Create Ticket Subject Input
            $('input#subject').removeClass('input-field-dark');
            // Create Ticket Message Textarea
            $('textarea#message').removeClass('input-field-dark');
            // Create Ticket file Textarea
            $('input#file').removeClass('input-field-dark');

            // Settings Fields
            $('input.settings').removeClass('input-field-dark');
            $('textarea[name*=about]').removeClass('input-field-dark');
            //Api Key Horizontal Line
            $('hr.hr').removeClass('border-color-light');

            // Notification Menu
            $('div.notification-menu').removeClass('notification-menu-border-dark');
            // User Menu Border Setting
            $('div#user-menu').removeClass('border-color-dark');
            // User Menu Border Setting
            $('div.border-light').removeClass('border-color-light');


            localStorage.setItem('darkMode', null);
        }

        // if(darkMode === 'enabled'){
        //     enableDarkMode();
        // }

        // $('#theme-toggle').on("click", () => {
        //     darkMode = localStorage.getItem('darkMode');
        //     if(darkMode !== 'enabled')
        //     {
        //         enableDarkMode();
        //         console.log(darkMode);
        //     } else {
        //         disableDarkMode();
        //         console.log(darkMode);
        //     }

        // });


    </script>
</body>
</html>
