<x-app-layout>
    <a href="/" class="flex items-center font-semibold ml-2">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
        </svg>
        <span class="ml-1">All Ideas</span>
    </a>
    @livewire('idea-show', [ 'idea' => $idea, 'votesCount' => $votesCount ])
    <div class="comments-container relative space-y-3 mb-20">
        <div class="comment-container relative mx-3 lg:mx-0 lg:ml-22 bg-white rounded-xl flex hover:shadow-md transition duration-150 ease-in cursor-pointer">
            <div class="flex flex-1 px-4 py-4">
                <div class="flex-none">
                    <a href="#" >
                        <img src="https://source.unsplash.com/200*200/?face&crop=face&v=1" alt="avatar" class="w-14 h-14 rounded-xl">
                    </a>
                </div>
                <div class="mx-4 w-full flex flex-col justify-between">
                    <div>
                        {{-- <h4 class="text-xl font-semibold">
                            <a href="#" class="hover:underline">A random title</a>
                        </h4> --}}
                        <p class="text-gray-600">
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Doloribus nemo repellat eaque perferendis aspernatur, modi et consequuntur dolorem, autem ut nostrum eos voluptate consequatur quidem quos assumenda earum quibusdam porro?
                        </p>
                    </div>
                    <div class="flex items-center justify-between mt-6">
                        <div class="flex flex-col lg:flex-row items-start lg:items-center text-xs  text-gray-400 font-semibold space-x-0 lg:space-x-2">
                            <div class="font-bold text-gray-900 mb-2 lg:mb-0">John Doe</div>
                            <div class="hidden lg:block">&bull;</div>                            
                            <div>10 hours ago</div>
                        </div>
                        <div x-data="{isOpen:false}" class="flex items-center">
                            <button @click="isOpen=!isOpen" class="relative bg-gray-100 hover:bg-gray-200 h-7 py-2 px-3 rounded-full flex items-center transition duration-150 ease-in">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 12h.01M12 12h.01M19 12h.01M6 12a1 1 0 11-2 0 1 1 0 012 0zm7 0a1 1 0 11-2 0 1 1 0 012 0zm7 0a1 1 0 11-2 0 1 1 0 012 0z" />
                                </svg>
                                <ul style="display: none;" x-show.transition.origin.top.left.duration.150ms="isOpen" class="absolute z-10 w-44 font-semibold bg-white shadow-md rounded-xl text-left top-6 right-0 xl:left-0">
                                    <li><a href="#" class="hover:bg-gray-100 block transition duration-150 ease-in px-5 py-3 rounded-t-xl">Mark as Spam</a></li>
                                    <li><a href="#" class="hover:bg-gray-100 block transition duration-150 ease-in px-5 py-3 rounded-b-xl">Delete Post</a></li>
                                </ul>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div> <!-- end comment container -->
        <div class="comment-container mx-3 lg:mx-0 is-admin border-blue border-2 relative lg:ml-22 bg-white rounded-xl flex hover:shadow-md transition duration-150 ease-in cursor-pointer">
            <div class="flex flex-1 px-4 py-4">
                <div class="flex-none">
                    <a href="#" >
                        <img src="https://source.unsplash.com/200*200/?face&crop=face&v=1" alt="avatar" class="w-14 h-14 rounded-xl">
                    </a>
                    <div class="text-blue uppercase text-center text-xs font-semibold mt-2">Admin</div>
                </div>
                <div class="mx-4 w-full flex flex-col justify-between">
                    <div>
                        <h4 class="text-xl font-semibold">
                            <a href="#" class="hover:underline">A random title under "Considering"</a>
                        </h4>
                        <p class="text-gray-600 mt-3">
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Doloribus nemo repellat eaque perferendis aspernatur, modi et consequuntur dolorem, autem ut nostrum eos voluptate consequatur quidem quos assumenda earum quibusdam porro?
                        </p>
                    </div>
                    <div class="flex items-center justify-between mt-6">
                        <div class="flex flex-col lg:flex-row items-start lg:items-center text-xs  text-gray-400 font-semibold space-x-0 lg:space-x-2">
                            <div class="font-bold text-blue mb-2 lg:mb-0">John Doe</div>
                            <div class="hidden lg:block">&bull;</div>                            
                            <div>10 hours ago</div>
                        </div>
                        <div x-data="{isOpen:false}" class="flex items-center">
                            <button @click="isOpen=!isOpen" class="relative bg-gray-100 hover:bg-gray-200 h-7 py-2 px-3 rounded-full flex items-center transition duration-150 ease-in">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 12h.01M12 12h.01M19 12h.01M6 12a1 1 0 11-2 0 1 1 0 012 0zm7 0a1 1 0 11-2 0 1 1 0 012 0zm7 0a1 1 0 11-2 0 1 1 0 012 0z" />
                                </svg>
                                <ul style="display: none;" x-show.transition.origin.top.left.duration.150ms="isOpen" class="absolute z-10 w-44 font-semibold bg-white shadow-md rounded-xl text-left top-6 right-0 xl:left-0">
                                    <li><a href="#" class="hover:bg-gray-100 block transition duration-150 ease-in px-5 py-3 rounded-t-xl">Mark as Spam</a></li>
                                    <li><a href="#" class="hover:bg-gray-100 block transition duration-150 ease-in px-5 py-3 rounded-b-xl">Delete Post</a></li>
                                </ul>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div> <!-- end comment container -->
        <div class="comment-container relative mx-3 lg:mx-0 lg:ml-22 bg-white rounded-xl flex hover:shadow-md transition duration-150 ease-in cursor-pointer">
            <div class="flex flex-1 px-4 py-4">
                <div class="flex-none">
                    <a href="#" >
                        <img src="https://source.unsplash.com/200*200/?face&crop=face&v=1" alt="avatar" class="w-14 h-14 rounded-xl">
                    </a>
                </div>
                <div class="mx-4 w-full flex flex-col justify-between">
                    <div>
                        {{-- <h4 class="text-xl font-semibold">
                            <a href="#" class="hover:underline">A random title</a>
                        </h4> --}}
                        <p class="text-gray-600">
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Doloribus nemo repellat eaque perferendis aspernatur, modi et consequuntur dolorem, autem ut nostrum eos voluptate consequatur quidem quos assumenda earum quibusdam porro?
                        </p>
                    </div>
                    <div class="flex items-center justify-between mt-6">
                        <div class="flex flex-col lg:flex-row items-start lg:items-center text-xs  text-gray-400 font-semibold space-x-0 lg:space-x-2">
                            <div class="font-bold text-gray-900 mb-2 lg:mb-0">John Doe</div>
                            <div class="hidden lg:block">&bull;</div>                            
                            <div>10 hours ago</div>
                        </div>
                        <div x-data="{isOpen:false}" class="flex items-center">
                            <button @click="isOpen=!isOpen" class="relative bg-gray-100 hover:bg-gray-200 h-7 py-2 px-3 rounded-full flex items-center transition duration-150 ease-in">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 12h.01M12 12h.01M19 12h.01M6 12a1 1 0 11-2 0 1 1 0 012 0zm7 0a1 1 0 11-2 0 1 1 0 012 0zm7 0a1 1 0 11-2 0 1 1 0 012 0z" />
                                </svg>
                                <ul style="display: none;" x-show.transition.origin.top.left.duration.150ms="isOpen" class="absolute z-10 w-44 font-semibold bg-white shadow-md rounded-xl text-left top-6 right-0 xl:left-0">
                                    <li><a href="#" class="hover:bg-gray-100 block transition duration-150 ease-in px-5 py-3 rounded-t-xl">Mark as Spam</a></li>
                                    <li><a href="#" class="hover:bg-gray-100 block transition duration-150 ease-in px-5 py-3 rounded-b-xl">Delete Post</a></li>
                                </ul>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div> <!-- end comment container -->                
    </div> <!-- end comments container -->
</x-app-layout>
