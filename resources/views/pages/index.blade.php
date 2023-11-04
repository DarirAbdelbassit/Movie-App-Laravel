@extends('layouts.app')
@section('content')
    <div class="container mx-auto px-4 pt-16">
        <!-- start pouplar-movies -->
        <x-movies-container title="Popular Movies">
            @foreach ($popularMovies as $movie)
                <x-movie-card :movie="$movie" />
            @endforeach
        </x-movies-container>
        <!-- end pouplar-movies -->
        <!-- start playing-movies -->
        <x-movies-container title="Playing Movies">
            @foreach ($nowPlayingMovies as $movie)
                <x-movie-card :movie="$movie" />
            @endforeach
        </x-movies-container>
        <!-- end now-playing-movies -->
    </div>
@endsection
