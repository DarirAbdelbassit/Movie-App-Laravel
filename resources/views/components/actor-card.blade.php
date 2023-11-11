<div class="mt-8">
    <a href="{{route('actors.show',['id'=>$cast['id']])}}">
        <img src="{{ $cast['profile_path'] }}" alt="poster" class="hover:opacity-75 transition ease-in-out duration-150">
    </a>
    <div class="mt-2">
        <a href="#" class="text-lg mt-2 hover:text-gray-300">{{ $cast['original_name'] }}</a>
        <div class="text-gray-400 text-sm">{{ $cast['character'] }}</div>
    </div>
</div>
