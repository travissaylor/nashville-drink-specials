<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="my-4 flex justify-between space-x-5">
            <div class="flex-1">
                <input wire:model="search" placeholder="Search Quotes"
                    class="focus:ring-indigo-500 focus:border-indigo-500 p-2 lg:w-1/4  block rounded-md sm:text-sm border-gray-300" />
            </div>
            <a class="flex-3" href="{{ route('admin.events.create') }}">
                <svg class="h-10 w-10 text-indigo-500" width="24" height="24" viewBox="0 0 24 24" stroke-width="2"
                    stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" />
                    <rect x="4" y="4" width="16" height="16" rx="2" />
                    <line x1="9" y1="12" x2="15" y2="12" />
                    <line x1="12" y1="9" x2="12" y2="15" />
                </svg>
            </a>
        </div>
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg mb-5" wire:loading.class.delay="opacity-50">
            <x-table>
                <x-slot name="head">
                    <x-table.heading wire:click="sortBy('name')" sortable
                        :direction="$sortField === 'name' ? $sortDirection : ''">Name</x-table.heading>
                    <x-table.heading wire:click="sortBy('start_date')" sortable
                        :direction="$sortField === 'start_date' ? $sortDirection : ''">Start Date</x-table.heading>
                    <x-table.heading wire:click="sortBy('end_date')" sortable
                        :direction="$sortField === 'end_date' ? $sortDirection : ''">End Date</x-table.heading>
                    <x-table.heading wire:click="sortBy('is_recurring')" sortable
                        :direction="$sortField === 'is_recurring' ? $sortDirection : ''">Recurring</x-table.heading>
                    <x-table.heading wire:click="sortBy('updated_at')" sortable
                        :direction="$sortField === 'updated_at' ? $sortDirection : ''">Last Updated</x-table.heading>
                    <x-table.heading class="relative px-6 py-3"><span class="sr-only">Edit</span></x-table.heading>
                </x-slot>

                <x-slot name="body">
                    @forelse ($events as $event)
                        <x-table.row>
                            <x-table.cell>
                                <div class="text-sm font-medium text-gray-900">
                                    {{ $event->name }}
                                </div>
                            </x-table.cell>
                            <x-table.cell class="max-w-md">
                                {{ $event->start_date }}
                            </x-table.cell>
                            <x-table.cell class="max-w-md">
                                {{ $event->end_date }}
                            </x-table.cell>
                            <x-table.cell class="max-w-md">
                                {{ !!$event->is_recurring }}
                            </x-table.cell>
                            <x-table.cell class="max-w-md">
                                {{ $event->updated_at }}
                            </x-table.cell>
                            <x-table.cell class="text-right text-sm font-medium flex space-x-2">
                                {{-- <a href="{{ route('admin.quotes.show', ['id' => $quote->id]) }}" --}}
                                <a href="#"
                                    class="text-indigo-600 hover:text-indigo-900">
                                    <svg class="h-6 w-6 text-indigo-500" width="24" height="24" viewBox="0 0 24 24"
                                        stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round"
                                        stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" />
                                        <circle cx="12" cy="12" r="2" />
                                        <path d="M2 12l1.5 2a11 11 0 0 0 17 0l1.5 -2" />
                                        <path d="M2 12l1.5 -2a11 11 0 0 1 17 0l1.5 2" />
                                    </svg>
                                </a>
                                <a href="{{ route('admin.events.edit', ['id' => $event->id]) }}"
                                    class="text-indigo-600 hover:text-indigo-900">
                                    <svg class="h-6 w-6 text-indigo-500" width="24" height="24" viewBox="0 0 24 24"
                                        xmlns="http://www.w3.org/2000/svg" fill="none" stroke="currentColor"
                                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                        <path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7" />
                                        <path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z" />
                                    </svg>
                                </a>
                            </x-table.cell>
                        </x-table.row>
                    @empty
                        <x-table.row>
                            <x-table.cell colspan="4">
                                <div class="flex justify-center items-center text-lg py-8">No Results Found</div>
                            </x-table.cell>
                        </x-table.row>
                    @endforelse
                </x-slot>
            </x-table>
        </div>
        {{ $events->links() }}
    </div>
</div>
