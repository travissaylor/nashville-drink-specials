<section class="text-gray-600 body-font">
    <div class="w-full xl:h-96 h-auto">
        <img alt="content" class="object-cover object-center h-full w-full" src="https://dummyimage.com/1200x500">
    </div>
    <div class="container px-5 py-10 mx-auto flex flex-col">
        <div class="lg:w-4/6 mx-auto">
            <div class="flex space-x-4 items-center">
                <div class="flex flex-col sm:items-start items-center w-1/4">
                    <div class="text-center">
                        <h2 class="font-serif sm:text-6xl text-5xl font-black">
                            {{ $occurrence->carbon_start_date->format('d') }}</h2>
                        <h3 class="font-serif sm:text-xl text-lg font-thin">
                            {{ $occurrence->carbon_start_date->localeMonth }}</h3>
                    </div>
                </div>
                <div class="flex flex-col w-3/4">
                    <h1 class="font-serif sm:text-2xl text-xl font-bold">{{ $occurrence->event->name }}</h1>
                    <h3 class="font-serif sm:text-xl text-md">{{ $occurrence->event->venue->name }}</h3>
                </div>
            </div>
            <div class="flex sm:flex-row flex-col space-x-4 my-8 items-start">
                <div class="flex flex-col py-4 space-y-4 items-start sm:w-1/4 sm:border-0 border-t-2 border-b-2">
                    <div class="flex w-full items-center sm:space-x-0 space-x-4">
                        <div class="sm:hidden flex justify-center w-1/4">
                            <x-icon name="calendar" class="w-10 h-10" />
                        </div>
                        <div class="flex flex-col w-3/4">
                            <h4 class="font-serif sm:flex hidden sm:text-lg text-xl font-bold">Date &amp; Time</h4>
                            <p class="text-lg font-thin">{{ $occurrence->carbon_start_date->format('l,') }}
                            </p>
                            <p class="text-lg font-thin">
                                {{ $occurrence->carbon_start_date->format('F j, Y') }}
                            </p>
                            <p class="text-lg font-thin">
                                {{ $occurrence->carbon_start_time->format('g:i A') }}
                                -
                                {{ $occurrence->carbon_end_time->format('g:i A') }}</p>
                        </div>
                    </div>
                    <div class="flex w-full items-center sm:space-x-0 space-x-4">
                        <div class="sm:hidden flex justify-center w-1/4">
                            <x-icon name="location-marker" class="w-10 h-10" />
                        </div>
                        <div class="flex flex-col w-3/4">
                            <h4 class="font-serif sm:flex hidden sm:text-lg text-xl font-bold">Location</h4>
                            <p class="text-lg font-thin">{{ $occurrence->event->venue->address }}</p>
                        </div>
                    </div>
                    <div class="flex w-full items-center sm:space-x-0 space-x-4">
                        <div class="sm:hidden flex justify-center w-1/4">
                            <x-icon name="home" class="w-10 h-10" />
                        </div>
                        <div class="flex flex-col w-3/4">
                            <h4 class="font-serif sm:flex hidden sm:text-lg text-xl font-bold">Neighborhood</h4>
                            <p class="text-lg font-thin">{{ $occurrence->event->venue->neighborhood->name }}
                            </p>
                        </div>
                    </div>
                </div>
                <div class="flex flex-col sm:w-3/4 sm:py-4 py-8">
                    <p class="sm:text-xl text-xl">{!! nl2br(e($occurrence->event->description)) !!}</p>
                </div>
            </div>
        </div>
    </div>
</section>
