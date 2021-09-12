<div class="text-gray-600 body-font relative">
    <div class="container px-5 py-24 mx-auto">
        <div class="lg:w-1/2 md:w-2/3 mx-auto">
            <form wire:submit.prevent="save" class="flex flex-wrap -m-2">
                <div class="p-2 w-full">
                    <x-input label="Name" placeholder="Event Name" wire:model="name" />
                </div>
                <div class="p-2 w-full">
                    <x-textarea label="Description" placeholder="Event Description" />
                </div>
                <div class="p-2 w-full">
                    <x-select label="Venu" placeholder="Select a Venu" wire:model="selectedCharacterId">
                        @foreach ($venus as $venu)
                            <x-select.option label="{{ $venu->name }}" value="{{ $venu->id }}" />
                        @endforeach
                    </x-select>
                </div>
                <div class="p-2 w-1/2">
                    <x-datetime-picker label="Start Date" placeholder="DD/MM/YYYY" wire:model="startDate"
                        without-time />
                </div>
                <div class="p-2 w-1/2">
                    <x-datetime-picker label="End Date" placeholder="DD/MM/YYYY" wire:model="endDate" without-time />
                </div>
                <div class="p-2 w-full">
                    <x-checkbox label="Is a Recurring Event" wire:model="isRecurring" />
                </div>
                @if ($isRecurring)
                    <div class="p-2 w-full">
                        <x-select label="Recurring Type" placeholder="Select Recurring Type"
                            wire:model="selectedRecurringType">
                            @foreach ($recurringTypes as $key => $type)
                                <x-select.option label="{{ Str::ucfirst(Str::lower($type)) }}" value="{{ $type }}" />
                            @endforeach
                        </x-select>
                    </div>
                    <div class="p-2 w-1/2">
                        <x-input label="Interval Between Events" wire:model="repeatInterval"/>
                    </div>
                    <div class="p-2 w-1/2">
                        <x-input label="Maximum Total Occurrences of Event" wire:model="maxOccurances"/>
                    </div>
                @endif
                <div class="p-2 w-full">
                    <button type="submit"
                        class="flex mx-auto text-white bg-indigo-500 border-0 py-2 px-8 focus:outline-none hover:bg-indigo-600 rounded text-lg">Create</button>
                </div>
            </form>
        </div>
    </div>
</div>
