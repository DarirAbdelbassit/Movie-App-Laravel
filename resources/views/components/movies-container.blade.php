    <div class="movies px-4 py-20">
        <h2 class="uppercase tracking-wider text-orange-500 text-lg font-semibold">{{ $attributes['title'] }} </h2>
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-8 mx-auto">
            {{ $slot }}
        </div>
    </div>
