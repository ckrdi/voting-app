<nav class="hidden lg:flex items-center justify-between text-xs text-gray-400">
    <ul class="flex uppercase font-semibold border-b-4 pb-3 space-x-10">
        <li><a 
            wire:click="setStatus('All')" 
            href="#" 
            class="@if ($status == 'All') border-blue text-gray-900 @endif 
            transition duration-150 ease-in border-b-4 pb-3 hover:border-blue">All Ideas ({{ $statusCount['all_statuses'] }})</a></li>
        <li><a 
            wire:click="setStatus('Considering')" 
            href="#" 
            class="@if ($status == 'Considering') border-blue text-gray-900 @endif 
            transition duration-150 ease-in border-b-4 pb-3 hover:border-blue">Considering ({{ $statusCount['considering'] }})</a></li>
        <li><a 
            wire:click="setStatus('In Progress')" 
            href="#" 
            class="@if ($status == 'In Progress') border-blue text-gray-900 @endif 
            transition duration-150 ease-in border-b-4 pb-3 hover:border-blue">In Progress ({{ $statusCount['in_progress'] }})</a></li>
    </ul>
    <ul class="flex uppercase font-semibold border-b-4 pb-3 space-x-10">
        <li><a 
            wire:click="setStatus('Implemented')" 
            href="#" 
            class="@if ($status == 'Implemented') border-blue text-gray-900 @endif 
            transition duration-150 ease-in border-b-4 pb-3 hover:border-blue">Implemented ({{ $statusCount['implemented'] }})</a></li>
        <li><a 
            wire:click="setStatus('Closed')" 
            href="#" 
            class="@if ($status == 'Closed') border-blue text-gray-900 @endif 
            transition duration-150 ease-in border-b-4 pb-3 hover:border-blue">Closed ({{ $statusCount['closed'] }})</a></li>
    </ul>
</nav>