<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">


<head>
    

    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

    <!-- Styles -->


    <style>
        body {
            font-family: 'Nunito', sans-serif;
            /* color: white; */
        }
    </style>
</head>

<body class="antialiased">


    <div
        class="relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center py-4 sm:pt-0">
        @if (Route::has('login'))
            <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
                @auth
                    <a href="{{ url('/homepage/products') }}"
                        class="text-sm text-blue-700 dark:text-gray-500 underline mb-2">Dashboards</a> <br>

                @else
                    {{-- <a href="{{ route('login') }}"
                                class="text-sm text-gray-700 dark:text-gray-500 underline">Login</a>

                            @if (Route::has('register'))
                                <a href="{{ route('register') }}"
                                    class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline">Register</a>
                            @endif --}}

                    @include('home')
                    {{-- @include('homepage.layouts.hometamplate') --}}



                @endauth
            </div>
        @endif




    </div>







</body>

</html>
