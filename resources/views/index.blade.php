<x-app-layout>
    <div class="filters lg:flex p-3 lg:p-0 space-y-3 lg:space-y-0 lg:space-x-6 ">
        <div class="lg:w-1/4">
            <select name="category" id="category" class="w-full rounded-xl px-4 py-2 border-none">
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
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
        @foreach ($data as $idea)
            @livewire('idea-index', [ 'idea' => $idea, 'votesCount' => $idea->votes_count ]) 
        @endforeach
    </div> <!-- end ideas container -->
    <div>
        {{-- simple pagination using simplePaginate --}}
        {{ $data->links() }}
    </div>
</x-app-layout>
