<x-app-layout>
    <div class="filters lg:flex p-3 lg:p-0 space-y-3 lg:space-y-0 lg:space-x-6 ">
        <div class="lg:w-1/4">
            <select name="category" id="category" class="w-full rounded-xl px-4 py-2 border-none">
                <option value="Category one">Category one</option>
                <option value="Category two">Category two</option>
                <option value="Category three">Category three</option>
                <option value="Category four">Category four</option>
            </select>
        </div>
        <div class="lg:w-1/4">
            <select name="other_filters" id="other_filters" class="w-full rounded-xl px-4 py-2 border-none">
                <option value="Filter one">Filter one</option>
                <option value="Filter two">Filter two</option>
                <option value="Filter three">Filter three</option>
                <option value="Filter four">Filter four</option>
            </select>
        </div>
        <div class="lg:w-1/2 relative">
            <div class="absolute top-0 flex items-center h-full ml-2">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gray-700" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                </svg>
            </div>
            <input type="search" placeholder="Find an idea" class="w-full rounded-xl px-4 py-2 pl-8 border-none bg-white placeholder-gray-900">
        </div>
    </div> 
    {{-- end filters --}}
    <div class="ideas-container space-y-3 lg:space-y-6 my-3 lg:my-6">
        <div class="idea-container mx-3 lg:mx-0 bg-white rounded-xl flex hover:shadow-md transition duration-150 ease-in cursor-pointer">
            <div class="hidden lg:block border-r border-gray-100 px-5 py-8">
                <div class="text-center">
                    {{--  change text color to blue if voted  --}}
                    <div class="font-semibold text-2xl">12</div>
                    <div class="text-gray-500">Votes</div>
                </div>
                <div class="mt-8">
                    {{--  change button to blue if voted  --}}
                    <button class="w-20 bg-gray-200 font-bold text-xs uppercase rounded-xl px-4 py-3 border border-gray-200 hover:border-gray-400 transition duration-150 ease-in">Vote</button>
                </div>
            </div>
            <div class="flex flex-1 lg:px-3 py-6">
                <div class="hidden lg:block flex-none">
                    <a href="#" >
                        <img src="https://source.unsplash.com/200*200/?face&crop=face&v=1" alt="avatar" class="w-14 h-14 rounded-xl">
                    </a>
                </div>
                <div class="mx-4 w-full flex flex-col justify-between">
                    <div>
                        <div class="flex lg:block">
                            <a href="#" class="block flex-shrink-0 mr-3 lg:hidden">
                                <img src="https://source.unsplash.com/200*200/?face&crop=face&v=1" alt="avatar" class="w-14 h-14 rounded-xl">
                            </a>
                            <h4 class="text-xl font-semibold">
                                <a href="#" class="hover:underline">A random title</a>
                            </h4>
                        </div>
                        <p class="text-gray-600 mt-3 line-clamp-3">
                            Lorem ipsum dolor sit amet.
                        </p>
                    </div>
                    <div class="lg:flex items-center justify-between space-y-3 lg:space-y-0 mt-6">
                        <div class="flex items-center text-xs  text-gray-400 font-semibold space-x-1 lg:space-x-2">
                            <div>10 hours ago</div>
                            <div>&bull;</div>
                            <div>Category One</div>
                            <div>&bull;</div>
                            <div class="text-gray-900">3 Comments</div>
                        </div>
                        <div x-data="{ isOpen: false }" class="lg:flex items-center justify-between space-y-2 lg:space-y-0 space-x-2">
                            <div class="flex items-center justify-between lg:justify-start space-x-2">
                                <div class="bg-gray-200 text-xs font-bold uppercase leading-none rounded-full text-center lg:w-28 h-7 py-2 px-3">Open</div>
                                <button @click="isOpen=!isOpen" class="relative bg-gray-100 hover:bg-gray-200 h-7 py-2 px-3 rounded-full flex items-center transition duration-150 ease-in">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 12h.01M12 12h.01M19 12h.01M6 12a1 1 0 11-2 0 1 1 0 012 0zm7 0a1 1 0 11-2 0 1 1 0 012 0zm7 0a1 1 0 11-2 0 1 1 0 012 0z" />
                                    </svg>
                                    <ul x-cloak x-show.transition.origin.top.left.duration.150ms="isOpen" class="absolute w-44 font-semibold bg-white shadow-md rounded-xl text-left top-6 right-0 xl:left-0">
                                        <li><a href="#" class="hover:bg-gray-100 block transition duration-150 ease-in px-5 py-3 rounded-t-xl">Mark as Spam</a></li>
                                        <li><a href="#" class="hover:bg-gray-100 block transition duration-150 ease-in px-5 py-3 rounded-b-xl">Delete Post</a></li>
                                    </ul>
                                </button>
                            </div>
                            <div class="flex lg:hidden items-center justify-between lg:justify-start space-x-2">
                                <div class="font-semibold text-center bg-white rounded-full px-3 py-2">
                                    {{--  change text color to blue if voted  --}}
                                    <div class="text-xl leading-snug">12</div>
                                    <div class="text-gray-400 text-xs leading-none">Votes</div>
                                </div>
                                {{--  change button to blue if voted  --}}
                                <button type="button" class="flex items-center justify-center uppercase lg:w-32 lg:h-11 text-xs bg-gray-200 font-semibold rounded-xl border border-gray-200 hover:border-gray-400 transition duration-150 ease-in px-2 py-1 lg:px-6 lg:py-3">
                                    Vote
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> <!-- end idea container -->
        <div class="idea-container mx-3 lg:mx-0 bg-white rounded-xl flex hover:shadow-md transition duration-150 ease-in cursor-pointer">
            <div class="hidden lg:block border-r border-gray-100 px-5 py-8">
                <div class="text-center">
                    {{--  change text color to blue if voted  --}}
                    <div class="font-semibold text-blue text-2xl">12</div>
                    <div class="text-gray-500">Votes</div>
                </div>
                <div class="mt-8">
                    {{--  change button to blue if voted  --}}
                    <button class="w-20 bg-blue text-white font-bold text-xs uppercase rounded-xl px-4 py-3 border border-blue hover:border-blue-hover transition duration-150 ease-in">Voted</button>
                </div>
            </div>
            <div class="flex flex-1 lg:px-3 py-6">
                <div class="hidden lg:block flex-none">
                    <a href="#" >
                        <img src="https://source.unsplash.com/200*200/?face&crop=face&v=1" alt="avatar" class="w-14 h-14 rounded-xl">
                    </a>
                </div>
                <div class="mx-4 w-full flex flex-col justify-between">
                    <div>
                        <div class="flex lg:block">
                            <a href="#" class="block flex-shrink-0 mr-3 lg:hidden">
                                <img src="https://source.unsplash.com/200*200/?face&crop=face&v=1" alt="avatar" class="w-14 h-14 rounded-xl">
                            </a>
                            <h4 class="text-xl font-semibold">
                                <a href="#" class="hover:underline">Second random title and it's a long title so this is a test</a>
                            </h4>
                        </div>
                        <p class="text-gray-600 mt-3 line-clamp-3">
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquam voluptatibus quae magni officia veniam unde iusto sint, dignissimos corporis esse molestias labore asperiores perspiciatis eos, minima quisquam aut reprehenderit. Voluptatibus ea, voluptas perferendis cupiditate delectus nam, aliquid quos non nulla officia quis quam, ratione voluptate deleniti incidunt quae accusantium adipisci?
                        </p>
                    </div>
                    <div class="lg:flex items-center justify-between space-y-3 lg:space-y-0 mt-6">
                        <div class="flex items-center text-xs  text-gray-400 font-semibold space-x-1 lg:space-x-2">
                            <div>10 hours ago</div>
                            <div>&bull;</div>
                            <div>Category One</div>
                            <div>&bull;</div>
                            <div class="text-gray-900">3 Comments</div>
                        </div>
                        <div x-data="{ isOpen: false }" class="lg:flex items-center justify-between space-y-2 lg:space-y-0 space-x-2">
                            <div class="flex items-center justify-between lg:justify-start space-x-2">
                                <div class="bg-yellow text-white text-xs font-bold uppercase leading-none rounded-full text-center lg:w-28 h-7 py-2 px-3">In Progress</div>
                                <button @click="isOpen=!isOpen" class="relative bg-gray-100 hover:bg-gray-200 h-7 py-2 px-3 rounded-full flex items-center transition duration-150 ease-in">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 12h.01M12 12h.01M19 12h.01M6 12a1 1 0 11-2 0 1 1 0 012 0zm7 0a1 1 0 11-2 0 1 1 0 012 0zm7 0a1 1 0 11-2 0 1 1 0 012 0z" />
                                    </svg>
                                    <ul x-cloak x-show.transition.origin.top.left.duration.150ms="isOpen" class="absolute w-44 font-semibold bg-white shadow-md rounded-xl text-left top-6 right-0 xl:left-0">
                                        <li><a href="#" class="hover:bg-gray-100 block transition duration-150 ease-in px-5 py-3 rounded-t-xl">Mark as Spam</a></li>
                                        <li><a href="#" class="hover:bg-gray-100 block transition duration-150 ease-in px-5 py-3 rounded-b-xl">Delete Post</a></li>
                                    </ul>
                                </button>
                            </div>
                            <div class="flex lg:hidden items-center justify-between lg:justify-start space-x-2">
                                <div class="font-semibold text-center bg-white rounded-full px-3 py-2">
                                    {{--  change text color to blue if voted  --}}
                                    <div class="text-xl text-blue leading-snug">12</div>
                                    <div class="text-gray-400 text-xs leading-none">Votes</div>
                                </div>
                                {{--  change button to blue if voted  --}}
                                <button type="button" class="flex items-center justify-center uppercase lg:w-32 lg:h-11 text-xs bg-blue font-semibold rounded-xl border border-blue hover:border-blue-hover text-white transition duration-150 ease-in px-2 py-1 lg:px-6 lg:py-3">
                                    Voted
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> <!-- end idea container -->
    </div> <!-- end ideas container -->
</x-app-layout>
