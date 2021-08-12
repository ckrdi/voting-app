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
        @livewireStyles

        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>
    </head>
    <body class="font-sans text-gray-900 text-sm">
        <div class="min-h-screen bg-gray-background pb-10">
            {{-- @include('layouts.navigation') --}}

            <!-- Page Heading -->
            <header class="flex flex-col lg:flex-row items-center justify-between px-8 py-4">
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
            
            <main class="lg:flex container mx-auto lg:max-w-custom">
                <div class="lg:w-70 lg:mr-5">
                    <div class="border-2 lg:sticky top-6 mx-3 lg:mx-0 custom-border rounded-xl mt-16 bg-white">
                        <div class="text-center px-6 py-2 pt-6">
                            <h3 class="font-semibold">Add an Idea</h3>
                            @auth
                                <p class="text-xs mt-4">Let us know what you would like and we'll take a look over!</p>
                            @else
                                <p class="text-xs mt-4">Login or register to add an idea!</p>
                            @endauth
                        </div>
                        @auth
                            @livewire('create-idea')
                        @else
                            <div class="flex items-center px-4 py-6 space-x-3">
                                <a href="{{ route('login') }}" type="button" class="flex items-center justify-center w-1/2 h-11 text-white text-xs bg-blue font-semibold rounded-xl border border-blue hover:border-blue-hover transition duration-150 ease-in px-6 py-3">
                                    <span>Log in</span>
                                </a>
                                <a href="{{ route('register') }}" class="flex items-center justify-center w-1/2 h-11 text-white text-xs bg-blue font-semibold rounded-xl border border-blue hover:border-blue-hover transition duration-150 ease-in px-6 py-3">
                                    <span>Register</span>
                                </a>
                            </div>
                        @endauth
                        
                    </div> <!-- end idea form -->
                </div>
                <div class="lg:w-175">
                    @livewire('status-filters')
                    <!-- Page Content -->
                    <div class="mt-8">
                        {{ $slot }}
                    </div>
                </div>
            </main>
        </div>
        @livewireScripts
    </body>
</html>
