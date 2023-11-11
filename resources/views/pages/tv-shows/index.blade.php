@extends('layouts.app')
@section('content')
    <div class="container mx-auto px-4 pt-16">
        <!-- start top-rated-tvshow -->
        <x-elements-container title="Top Rated Tv Shows">
            @foreach ($topRatedTvShows as $tvshow)
                <x-tvshow-card :tvshow="$tvshow" />
            @endforeach
        </x-elements-container>
        <!-- end top-rated-tvshow -->
        <!-- start pouplar-tvshow -->
        <x-elements-container title="Popular Tv Shows">
            @foreach ($popularTvShows as $tvshow)
                <x-tvshow-card :tvshow="$tvshow" />
            @endforeach
        </x-elements-container>
        <!-- end pouplar-tvshow -->
    </div>
@endsection
