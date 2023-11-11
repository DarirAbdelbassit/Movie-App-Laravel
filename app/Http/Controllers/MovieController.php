<?php

namespace App\Http\Controllers;

use App\Services\TmdbService;

class MovieController extends Controller
{
    // variables declaration
    protected $tmdb;
    // constructor
    public function __construct()
    {
        $this->tmdb = new TmdbService('movie');
    }
    // methods
    public function index()
    {
        // get the popular movies
        $popularMovies = $this->tmdb->fetchMoviesList('popular');
        $nowPlayingMovies = $this->tmdb->fetchMoviesList('now_playing');
        // return view with data
        return view('pages.movies.index', compact('popularMovies', 'nowPlayingMovies'));
    }
    public function show($id)
    {
        abort_if(!is_numeric($id), 404);
        // get the movie details
        $movie = $this->tmdb->fetchMovie("/$id?append_to_response=credits,videos,images");
        // return view with data
        return view('pages.movies.show',compact('movie'));
    }
}
