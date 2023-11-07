<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class TmdbService
{
    public $genres;
    public function __construct()
    {
        // get the genres
        $this->genres = $this->fetchGenres()->toArray();
    }

    private function getTmdbData($endpoint) // Ex:'/genre/movie/list'
    {
        // get the data from the tmdb api
        return Http::withToken(config('services.tmdb.tmdb-token'))
            ->get(config('services.tmdb.base_url') . $endpoint)
            ->json();
    }

    public function fetchMoviesList($type): \Illuminate\Support\Collection
    {
        // get the movies data
        $movies = $this->getTmdbData("/movie/$type")['results'];
        // return the movies as a collection
        return collect($movies)->map(fn($movie) => [
            'id' => $movie['id'],
            'original_title' => $movie['original_title'],
            'poster_path' => $this->getImagePath($movie['poster_path']),
            'vote_average' => floor($movie['vote_average']),
            'release_date' => $movie['release_date'],
            'genres' => $this->getMoviesGenres($movie['genre_ids'], $this->genres)
        ]);
    }

    public function fetchMovie($type): array
    {
        // get the movie data
        $movie = $this->getTmdbData("/movie/$type");
        // filter the cast
        $cleanCast =  $this->filterTheCast(array_slice($movie['credits']["cast"], 0, 5));
        // filter the images
        $images = collect($movie['images']['backdrops'])
        ->map(fn($image) => $image['file_path'])
        ->unique()
        ->map(fn($filePath) => ['file_path' => $this->getImagePath($filePath)])
        ->toArray();
        // return the data of the movie
        return [
            'original_title' => $movie['original_title'],
            'poster_path' => $this->getImagePath($movie['poster_path']),
            'vote_average' => floor($movie['vote_average']),
            'release_date' => $movie['release_date'],
            'overview' => $movie['overview'],
            'genres' => $this->getMovieGenres($movie['genres']),
            'videos' =>  $movie['videos']['results'] ?  $movie['videos']['results'][0]['key'] : null,
            'crew' => array_slice($movie['credits']["crew"], 0, 3),
            'cast' => $cleanCast,
            'images' => array_slice($images,0,6),
        ];
    }

    private function fetchGenres(): \Illuminate\Support\Collection
    {
        // get the genres
        $genresArray = $this->getTmdbData('/genre/movie/list')['genres'];
        // return the genres as a collection
        return collect($genresArray)->mapWithKeys(fn($genre) => [
            $genre["id"] => $genre["name"]
        ]);
    }

    private function getMoviesGenres($genreIds, $genres): string
    {
        // return the genres of the movie as a string
        return implode(', ', array_map(function ($id) use ($genres) {
            return $genres[$id];
        }, $genreIds));
    }

    private function getMovieGenres($genreIds): string
    {
        // return the genres of the movie as a string
        return implode(', ', collect($genreIds)->pluck("name")->toArray());
    }

    private function getImagePath($posterPath): string
    {
        // return the full path of the image
        return config('services.tmdb.poster_url') . $posterPath;
    }

    private function filterTheCast($firstFiveCast): array
    {
        // return the cast of the movie
        return collect($firstFiveCast)->map(fn($cast) => [
            'id' => $cast["id"],
            'original_name' => $cast["name"],
            'character' => $cast["character"],
            'profile_path' => $this->getImagePath($cast["profile_path"]),
        ])->toArray();
    }
}
