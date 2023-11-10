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
            'videos' =>  $movie['videos']['results'] ? $movie['videos']['results'][0]['key'] : null,
            'crew' => array_slice($movie['credits']["crew"], 0, 3),
            'cast' => $cleanCast,
            'images' => array_slice($images, 0, 6),
        ];
    }

    public function fetchActorsList($path)
    {
        // get the actors data
        $actors = $this->getTmdbData("$path");
        // prepare the data
        $temp_data1 = ["data" => collect($actors['results'])->map(fn($actor) => [
            'id' => $actor['id'],
            'original_name' => $actor['name'],
            'profile_path' => $this->getImagePath($actor['profile_path']),
            'known_for' => $this->getActorsKnownFor($actor['known_for']),
            ])->toArray()];

        $temp_data2 = [
            'page' => $actors['page'],
            'total_pages' => $actors['total_pages'],
        ];
        // return the actors as a collection
        return (array_merge($temp_data1, $temp_data2));
    }

    public function fetchActor($path)
    {
        // get the actor data
        $actor = $this->getTmdbData("$path");
        $social = $this->getTmdbData("$path/external_ids");
        $cast  = $this->getTmdbData("$path/combined_credits")['cast'];

        $castMovies = collect($cast)->where('media_type','movie')->sortByDesc('popularity')->take(5)->map(fn($movie) => [
            'id' => $movie['id'],
            'original_title' => $movie['original_title'],
            'poster_path' => $this->getImagePath($movie['poster_path']),
        ])->toArray();
        $credits = collect($cast)->where('media_type','movie')->sortByDesc('release_date')->map(fn($movie) => [
            'id' => $movie['id'],
            'original_title' => $movie['original_title'],
            'release_date' => $movie['release_date']  ,
            'character' => $movie['character']  ,
        ])->toArray();
        // prepare the data
        return  [
            'id' => $actor['id'],
            'name' => $actor['name'],
            'profile_path' => $this->getImagePath($actor['profile_path']),
            'birthday' => $actor['birthday'],
            'biography' => $actor['biography'],
            'place_of_birth' => $actor['place_of_birth'],
            'age' => $actor['birthday'] ? now()->diffInYears($actor['birthday']) : null,
            'facebook' => "https://www.facebook.com/" . $social['facebook_id'],
            'instagram' => "https://www.instagram.com/" . $social['instagram_id'],
            'twitter' => "https://www.twitter.com/" . $social['twitter_id'],
            'tiktok' => "https://www.tiktok.com/@" . $social['tiktok_id'],
            'castMovies' => $castMovies,
            'credits' => $credits,
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

    private function getActorsKnownFor($knownFor): string
    {
        // return the known for of the actor as a string
        return implode(', ', collect($knownFor)->pluck("title")->toArray());
    }
}
