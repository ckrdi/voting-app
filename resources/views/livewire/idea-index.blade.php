<div class="idea-container mx-3 lg:mx-0 bg-white rounded-xl flex hover:shadow-md transition duration-150 ease-in">
    <div class="hidden lg:block border-r border-gray-100 px-5 py-8">
        <div class="text-center">
            {{--  change text color to blue if voted  --}}
            <div class="font-semibold text-2xl">{{ $votesCount }}</div>
            <div class="text-gray-500">Votes</div>
        </div>
        <div class="mt-8">
            {{--  change button to blue if voted  --}}
            <button class="w-20 bg-gray-200 font-bold text-xs uppercase rounded-xl px-4 py-3 border border-gray-200 hover:border-gray-400 transition duration-150 ease-in">Vote</button>
        </div>
    </div>
    <div class="flex flex-1 lg:px-3 py-6">
        <div class="mx-4 w-full flex flex-col justify-between">
            <div>
                <div class="flex">
                    <a href="#" class="block flex-shrink-0 mr-3">
                        <img src="{{ $idea->user->avatar() }}" alt="avatar" class="w-14 h-14 rounded-xl">
                    </a>
                    <h4 class="text-xl font-semibold">
                        <a href="{{ route('show', $idea) }}" class="hover:underline">{{ $idea->title }}</a>
                    </h4>
                </div>
                <p class="text-gray-600 mt-3 line-clamp-3">
                    {{ $idea->body }}
                </p>
            </div>
            <div class="lg:flex items-center justify-between space-y-3 lg:space-y-0 mt-6">
                <div class="flex items-center text-xs  text-gray-400 font-semibold space-x-1 lg:space-x-2">
                    <div>{{ $idea->created_at->diffForHumans() }}</div>
                    <div>&bull;</div>
                    <div>{{ $idea->category->name }}</div>
                    <div>&bull;</div>
                    <div class="text-gray-900">3 Comments</div>
                </div>
                <div x-data="{ isOpen: false }" class="lg:flex items-center justify-between space-y-2 lg:space-y-0 space-x-2">
                    <div class="flex items-center justify-between lg:justify-start space-x-2">
                        <div class="{{ $idea->status->statusClass() }} text-xs font-bold uppercase leading-none rounded-full text-center lg:w-28 h-7 py-2 px-3">{{ $idea->status->name }}</div>
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
                            <div class="text-xl leading-snug">{{ $votesCount }}</div>
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
