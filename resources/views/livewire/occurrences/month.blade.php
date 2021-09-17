<section class="text-gray-600 body-font overflow-hidden">
    <div class="container px-5 py-24 mx-auto">
        <div class="-my-8 divide-y-2 divide-gray-100">
            <div class="flex justify-around text-center w-full mb-20">
                <div class="flex items-center">
                    <?php $prevMonth = $date->copy()->subMonth(); ?>
                    <a
                        href="{{ route('occurrences.month', ['year' => $prevMonth->year, 'month' => $prevMonth->month]) }}"><span class="text-xl">&larr;</span> {{ $prevMonth->localeMonth }}</a>
                </div>
                <div class="flex flex-col text-center items-center">
                    <h2 class="text-xs text-indigo-500 tracking-widest font-medium title-font mb-1">
                        {{ $date->localeMonth }}</h2>
                    <h1 class="sm:text-3xl text-2xl font-medium title-font mb-4 text-gray-900">Events</h1>
                </div>
                <div class="flex items-center">
                    <?php $nextMonth = $date->copy()->addMonth(); ?>
                    <a
                        href="{{ route('occurrences.month', ['year' => $nextMonth->year, 'month' => $nextMonth->month]) }}">{{ $nextMonth->localeMonth }} <span class="text-xl">&rarr;</span></a>
                </div>
            </div>
            @foreach ($occurrences as $occurrence)
                <div class="py-8 flex flex-wrap md:flex-nowrap">
                    <div class="md:w-64 md:mb-0 mb-6 flex-shrink-0 flex flex-col justify-center">
                        <span class="font-semibold title-font text-gray-700">Start Time</span>
                        <span class="mt-1 text-gray-500 text-sm">{{ $occurrence->start_time ?? 'TBA' }}</span>

                        <span class="font-semibold title-font text-gray-700 mt-4">End Time</span>
                        <span class="mt-1 text-gray-500 text-sm">{{ $occurrence->end_time ?? 'TBA' }}</span>
                    </div>
                    <div class="md:flex-grow">
                        <h2 class="text-2xl font-medium text-gray-900 title-font">{{ $occurrence->event->name }}
                        </h2>
                        <p class="leading-relaxed text-lg mb-1">{{ $occurrence->event->venu->name }}</p>
                        @if (!empty($occurrence->event->description))
                            <p class="leading-relaxed">{{ $occurrence->event->description }}</p>
                        @endif
                        <a class="text-indigo-500 inline-flex items-center mt-4">Learn More
                            <svg class="w-4 h-4 ml-2" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"
                                fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M5 12h14"></path>
                                <path d="M12 5l7 7-7 7"></path>
                            </svg>
                        </a>
                    </div>
                </div>
            @endforeach
            {{ $occurrences->links() }}
        </div>
    </div>
</section>
