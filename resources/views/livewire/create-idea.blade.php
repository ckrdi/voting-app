<div>
    <form wire:submit.prevent="createIdea" method="POST" class="space-y-4 px-4 py-6">
        <div>
            <input wire:model.defer="title" type="text" class="text-sm w-full bg-gray-100 border-none rounded-xl placeholder-gray-900 px-4 py-2" placeholder="Your idea">
            @error('title')
                <span class="text-red text-xs mt-2">{{ $message }}</span> 
            @enderror
        </div>
        <div>
            <select wire:model.defer="category" name="category_add" id="category_add" class="text-sm bg-gray-100 w-full rounded-xl px-4 py-2 border-none">
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
            @error('category')
                <span class="text-red text-xs mt-2">{{ $message }}</span> 
            @enderror
        </div>
        <div>
            <textarea wire:model.defer="body" name="idea" id="idea" cols="30" rows="4" class="text-sm bg-gray-100 w-full rounded-xl px-4 py-2 border-none placeholder-gray-900" placeholder="Describe your idea"></textarea>
            @error('body')
                <span class="text-red text-xs mt-2">{{ $message }}</span> 
            @enderror
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
        @if (session('success_message'))
            <div x-data="{ isVisible: true }" x-init="setTimeout(()=> isVisible = false, 2000)" x-show.transition.duration.1000ms="isVisible" class="text-green mt-4">
                {{ session('success_message') }}
            </div>
        @endif
    </form>
</div>
