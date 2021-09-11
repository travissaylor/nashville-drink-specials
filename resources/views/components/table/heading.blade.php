<th {{ $attributes->merge(['class' => 'px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider']) }}
    scope="col">
    @if (isset($sortable))
        <button class="m-0 p-0 hover:underline uppercase">
            @if ($direction)
                @if ($direction === 'ASC')
                    &#8593;
                @else
                    &#8595;
                @endif
            @endif
            {{ $slot }}
        </button>
    @else
        {{ $slot }}
    @endif
</th>
