<x-app-layout>
    <a href="/" class="flex items-center font-semibold ml-2">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
        </svg>
        <span class="ml-1">All Ideas</span>
    </a>
    <div class="ideas-container space-y-3 my-6">
        <div class="idea-container bg-white rounded-xl flex hover:shadow-md transition duration-150 ease-in cursor-pointer">
            <div class="flex flex-1 px-6 py-6">
                <div class="flex-none">
                    <a href="#" >
                        <img src="https://source.unsplash.com/200*200/?face&crop=face&v=1" alt="avatar" class="w-14 h-14 rounded-xl">
                    </a>
                </div>
                <div class="mx-4 w-full flex flex-col justify-between">
                    <div>
                        <h4 class="text-xl font-semibold">
                            <a href="#" class="hover:underline">A random title</a>
                        </h4>
                        <p class="text-gray-600 mt-3">
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Nulla cupiditate non exercitationem veniam? Quae officia iure aut corporis porro obcaecati aspernatur, ducimus laboriosam in officiis debitis sed illo at sit exercitationem esse facilis cum aperiam repellat ad necessitatibus soluta. Mollitia accusamus cupiditate excepturi delectus, atque ipsam aliquid quaerat. Quisquam quod tempore adipisci, tenetur modi nobis. Enim natus qui labore in repellat. Delectus natus eum sint illo mollitia? Quisquam a ullam repellat dolor fugit repudiandae architecto et cum beatae quam obcaecati dolores, eligendi velit, voluptatem adipisci aut non molestias similique vel culpa vero expedita quos aliquam facilis. Error explicabo maxime similique?
                        </p>
                    </div>
                    <div class="flex items-center justify-between mt-6">
                        <div class="flex items-center text-xs  text-gray-400 font-semibold space-x-2">
                            <div class="font-bold text-gray-900">John Doe</div>
                            <div>&bull;</div>                            
                            <div>10 hours ago</div>
                            <div>&bull;</div>
                            <div>Category One</div>
                            <div>&bull;</div>
                            <div class="text-gray-900">3 Comments</div>
                        </div>
                        <div class="flex items-center space-x-2">
                            <div class="bg-gray-200 text-xs font-bold uppercase leading-none rounded-full text-center w-28 h-7 py-2 px-3">Open</div>
                            <button class="relative bg-gray-100 hover:bg-gray-200 h-7 py-2 px-3 rounded-full flex items-center transition duration-150 ease-in">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 12h.01M12 12h.01M19 12h.01M6 12a1 1 0 11-2 0 1 1 0 012 0zm7 0a1 1 0 11-2 0 1 1 0 012 0zm7 0a1 1 0 11-2 0 1 1 0 012 0z" />
                                </svg>
                                <ul class="hidden absolute w-44 font-semibold bg-white shadow-md rounded-xl text-left top-2">
                                    <li><a href="#" class="hover:bg-gray-100 block transition duration-150 ease-in px-5 py-3 rounded-t-xl">Mark as Spam</a></li>
                                    <li><a href="#" class="hover:bg-gray-100 block transition duration-150 ease-in px-5 py-3 rounded-b-xl">Delete Post</a></li>
                                </ul>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div> <!-- end idea container -->
        <div class="buttons-container ml-3 flex items-center justify-between">
            <div class="flex items-center space-x-3">
                <button type="button" class="flex items-center justify-center w-32 h-11 text-white text-xs bg-blue font-semibold rounded-xl border border-blue hover:border-blue-hover transition duration-150 ease-in px-6 py-3">
                    <span>Reply</span>
                </button>
                <button type="button" class="flex items-center justify-between w-36 h-11 text-xs bg-gray-200 font-semibold rounded-xl border border-gray-200 hover:border-gray-400 transition duration-150 ease-in px-6 py-3">
                    <span class="ml-3">Set Status</span>
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                    </svg>
                </button>
            </div>
            <div class="flex items-center space-x-3">
                <div class="font-semibold text-center bg-white rounded-full px-3 py-2">
                    <div class="text-xl leading-snug">12</div>
                    <div class="text-gray-400 text-xs leading-none">Votes</div>
                </div>
                <button type="button" class="flex items-center justify-center uppercase w-32 h-11 text-xs bg-gray-200 font-semibold rounded-xl border border-gray-200 hover:border-gray-400 transition duration-150 ease-in px-6 py-3">
                    Vote
                </button>
            </div>
        </div> {{-- end buttons container --}}
    </div> <!-- end ideas container -->
    <div class="comments-container relative space-y-3 mb-6">
        <div class="comment-container relative ml-22 bg-white rounded-xl flex hover:shadow-md transition duration-150 ease-in cursor-pointer">
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
                        <p class="text-gray-600 mt-3">
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Doloribus nemo repellat eaque perferendis aspernatur, modi et consequuntur dolorem, autem ut nostrum eos voluptate consequatur quidem quos assumenda earum quibusdam porro?
                        </p>
                    </div>
                    <div class="flex items-center justify-between mt-6">
                        <div class="flex items-center text-xs  text-gray-400 font-semibold space-x-2">
                            <div class="font-bold text-gray-900">John Doe</div>
                            <div>&bull;</div>                            
                            <div>10 hours ago</div>
                        </div>
                        <div class="flex items-center">
                            <button class="relative bg-gray-100 hover:bg-gray-200 h-7 py-2 px-3 rounded-full flex items-center transition duration-150 ease-in">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 12h.01M12 12h.01M19 12h.01M6 12a1 1 0 11-2 0 1 1 0 012 0zm7 0a1 1 0 11-2 0 1 1 0 012 0zm7 0a1 1 0 11-2 0 1 1 0 012 0z" />
                                </svg>
                                <ul class="hidden absolute w-44 font-semibold bg-white shadow-md rounded-xl text-left top-2">
                                    <li><a href="#" class="hover:bg-gray-100 block transition duration-150 ease-in px-5 py-3 rounded-t-xl">Mark as Spam</a></li>
                                    <li><a href="#" class="hover:bg-gray-100 block transition duration-150 ease-in px-5 py-3 rounded-b-xl">Delete Post</a></li>
                                </ul>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div> <!-- end comment container -->
        <div class="comment-container is-admin border-blue border-2 relative ml-22 bg-white rounded-xl flex hover:shadow-md transition duration-150 ease-in cursor-pointer">
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
                        <div class="flex items-center text-xs  text-gray-400 font-semibold space-x-2">
                            <div class="font-bold text-blue">John Doe</div>
                            <div>&bull;</div>                            
                            <div>10 hours ago</div>
                        </div>
                        <div class="flex items-center">
                            <button class="relative bg-gray-100 hover:bg-gray-200 h-7 py-2 px-3 rounded-full flex items-center transition duration-150 ease-in">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 12h.01M12 12h.01M19 12h.01M6 12a1 1 0 11-2 0 1 1 0 012 0zm7 0a1 1 0 11-2 0 1 1 0 012 0zm7 0a1 1 0 11-2 0 1 1 0 012 0z" />
                                </svg>
                                <ul class="hidden absolute w-44 font-semibold bg-white shadow-md rounded-xl text-left top-2">
                                    <li><a href="#" class="hover:bg-gray-100 block transition duration-150 ease-in px-5 py-3 rounded-t-xl">Mark as Spam</a></li>
                                    <li><a href="#" class="hover:bg-gray-100 block transition duration-150 ease-in px-5 py-3 rounded-b-xl">Delete Post</a></li>
                                </ul>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div> <!-- end comment container -->
        <div class="comment-container relative ml-22 bg-white rounded-xl flex hover:shadow-md transition duration-150 ease-in cursor-pointer">
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
                        <p class="text-gray-600 mt-3">
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Doloribus nemo repellat eaque perferendis aspernatur, modi et consequuntur dolorem, autem ut nostrum eos voluptate consequatur quidem quos assumenda earum quibusdam porro?
                        </p>
                    </div>
                    <div class="flex items-center justify-between mt-6">
                        <div class="flex items-center text-xs  text-gray-400 font-semibold space-x-2">
                            <div class="font-bold text-gray-900">John Doe</div>
                            <div>&bull;</div>                            
                            <div>10 hours ago</div>
                        </div>
                        <div class="flex items-center">
                            <button class="relative bg-gray-100 hover:bg-gray-200 h-7 py-2 px-3 rounded-full flex items-center transition duration-150 ease-in">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 12h.01M12 12h.01M19 12h.01M6 12a1 1 0 11-2 0 1 1 0 012 0zm7 0a1 1 0 11-2 0 1 1 0 012 0zm7 0a1 1 0 11-2 0 1 1 0 012 0z" />
                                </svg>
                                <ul class="hidden absolute w-44 font-semibold bg-white shadow-md rounded-xl text-left top-2">
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
