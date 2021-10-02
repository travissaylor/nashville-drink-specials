<div class="flex justify-between py-4 px-4 bg-white">
    <div class="flex">
        <h2 class="text-2xl"><b>{{ $startsAt->localeMonth }}</b> {{ $startsAt->year }}</h2>
    </div>
    <div class="flex space-x-2">
        <button wire:click="goToPreviousMonth">
            <svg class="h-6 w-6 text-gray-500 inline-flex leading-none" fill="none" viewBox="0 0 24 24"
                stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
            </svg>
        </button>
        <button wire:click="goToNextMonth">
            <svg class="h-6 w-6 text-gray-500 inline-flex leading-none" fill="none" viewBox="0 0 24 24"
                stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
            </svg>
        </button>
    </div>
</div>
