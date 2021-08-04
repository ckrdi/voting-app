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
                            <p class="text-xs mt-4">Let us know what you would like and we'll take a look over!</p>
                        </div>

                        <form action="" method="POST" class="space-y-4 px-4 py-6">
                            <div>
                                <input type="text" class="text-sm w-full bg-gray-100 border-none rounded-xl placeholder-gray-900 px-4 py-2" placeholder="Your idea">
                            </div>
                            <div>
                                <select name="category_add" id="category_add" class="text-sm bg-gray-100 w-full rounded-xl px-4 py-2 border-none">
                                    <option value="Category one">Category one</option>
                                    <option value="Category two">Category two</option>
                                    <option value="Category three">Category three</option>
                                    <option value="Category four">Category four</option>
                                </select>
                            </div>
                            <div>
                                <textarea name="idea" id="idea" cols="30" rows="4" class="text-sm bg-gray-100 w-full rounded-xl px-4 py-2 border-none placeholder-gray-900" placeholder="Describe your idea"></textarea>
                            </div>
                            <div class="flex items-center space-x-3">
                                <button type="button" class="flex items-center justify-center w-1/2 h-11 text-xs bg-gray-200 font-semibold rounded-xl border border-gray-200 hover:border-gray-400 transition duration-150 ease-in px-6 py-3">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 transform -rotate-45" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.172 7l-6.586 6.586a2 2 0 102.828 2.828l6.414-6.586a4 4 0 00-5.656-5.656l-6.415 6.585a6 6 0 108.486 8.486L20.5 13" />
                                    </svg>
                                    <span class="ml-1">Attach</span>
                                </button>
                                <button type="submit" class="flex items-center justify-center w-1/2 h-11 text-white text-xs bg-blue font-semibold rounded-xl border border-blue hover:border-blue-hover transition duration-150 ease-in px-6 py-3">
                                    <span>Submit</span>
                                </button>
                            </div>
                        </form>
                    </div> <!-- end idea form -->
                </div>
                <div class="lg:w-175">
                    <nav class="hidden lg:flex items-center justify-between text-xs">
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
