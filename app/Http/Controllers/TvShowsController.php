<?php

namespace App\Http\Controllers;

use App\Services\TmdbService;

class TvShowsController extends Controller
{
    // variables declaration
    protected $tmdb;
    // constructor
    public function __construct()
    {
        $this->tmdb = new TmdbService('tv');
    }
    // methods
    public function index()
    {
        // get the popular movies
        $popularTvShows = $this->tmdb->fetchTvShowsList('popular');
        $topRatedTvShows = $this->tmdb->fetchTvShowsList('top_rated');
        // return view with data
        return view('pages.tv-shows.index',compact('popularTvShows', 'topRatedTvShows'));
    }
    public function show($id)
    {
        abort_if(!is_numeric($id), 404);
        // get the tv show data
        $tvShow = $this->tmdb->fetchTvShow("/$id?append_to_response=credits,videos,images");
        // return view with data
        return view('pages.tv-shows.show', compact('tvShow'));
    }

}
