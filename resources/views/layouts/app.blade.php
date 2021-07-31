<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>Voting App</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600;700&display=swap">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">

        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>
    </head>
    <body class="font-sans text-gray-900 text-sm">
        <div class="min-h-screen bg-gray-background">
            {{-- @include('layouts.navigation') --}}

            <!-- Page Heading -->
            <header class="flex items-center justify-between px-8 py-4">
                <a href="#">Voting App</a>
                <div class="flex items-center">
                    @if (Route::has('login'))
                        <div class="px-6 py-4">
                            @auth
                                <!-- Authentication -->
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf

                                    <a 
                                        class="text-sm text-gray-700" 
                                        href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                        this.closest('form').submit();">
                                        {{ __('Log Out') }}
                                    </a>
                                </form>
                            @else
                                <a href="{{ route('login') }}" class="text-sm text-gray-700">Log in</a>
        
                                @if (Route::has('register'))
                                    <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700">Register</a>
                                @endif
                            @endauth
                        </div>
                    @endif
                    <a href="#">
                        <img src="https://www.gravatar.com/avatar/000000000000000000000000000000000?d=mp" alt="avatar" class="w-10 h-10 rounded-full">
                    </a>
                </div>
            </header>
            
            <main class="flex container mx-auto max-w-custom">
                <div class="w-70 mr-5">Lorem ipsum dolor sit amet consectetur adipisicing elit. Libero optio enim sint iste saepe ipsum obcaecati aliquam voluptatum natus nisi id, pariatur, doloribus ab non suscipit ipsa aut. Laborum, ullam hic a non maiores eligendi cupiditate iure repellendus totam pariatur saepe quis? Dignissimos unde sint, minima optio aliquid obcaecati harum!</div>
                <div class="w-175">
                    <nav class="flex items-center justify-between text-xs">
                        <ul class="flex uppercase font-semibold border-b-4 pb-3 space-x-10">
                            <li><a href="#" class="border-b-4 pb-3 border-blue">All Ideas (87)</a></li>
                            <li><a href="#" class="text-gray-400 transition duration-150 ease-in border-b-4 pb-3 hover:border-blue">Considering (6)</a></li>
                            <li><a href="#" class="text-gray-400 transition duration-150 ease-in border-b-4 pb-3 hover:border-blue">In Progress (1)</a></li>
                        </ul>
                        <ul class="flex uppercase font-semibold border-b-4 pb-3 space-x-10">
                            <li><a href="#" class="text-gray-400 transition duration-150 ease-in border-b-4 pb-3 hover:border-blue">Implemented (10)</a></li>
                            <li><a href="#" class="text-gray-400 transition duration-150 ease-in border-b-4 pb-3 hover:border-blue">Closed (55)</a></li>
                        </ul>
                    </nav>
                    <!-- Page Content -->
                    <div class="mt-8">
                        {{ $slot }}
                    </div>
                </div>
            </main>
        </div>
    </body>
</html>
