<div class="mt-8">
    <a href="{{route('actors.show',['id'=>$actor['id']])}}">
        <img src="{{ $actor['profile_path'] }}" alt="poster" class="hover:opacity-75 transition ease-in-out duration-150">
    </a>
    <div class="mt-2">
        <a href="#" class="text-lg mt-2 hover:text-gray-300">{{ $actor['original_name'] }}</a>
        <div class="text-gray-400 text-sm">{{ $actor['known_for'] }}</div>
    </div>
</div>
