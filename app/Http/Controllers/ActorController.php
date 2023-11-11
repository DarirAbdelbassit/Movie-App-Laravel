<?php

namespace App\Http\Controllers;

use App\Services\TmdbService;
use Illuminate\Http\Request;

class ActorController extends Controller
{
    // variables declaration
    protected $tmdb;
    public $has_previous = false;
    public $has_next = true;
    public $current_page = 1;
    // constructor
    public function __construct()
    {
        $this->tmdb = new TmdbService('movie');
    }
    // methods
    public function index(Request $request)
    {
        // get the page number
        $page = $request->input('page', 1);
        // get the popular actors
        $popularActors = $this->tmdb->fetchActorsList("/person/popular?page=$page");
        $this->current_page = $popularActors["page"];
        // check if can switch to the page
        if($popularActors["total_pages"] <= $page) {
            $this->has_next = true;
        }
        if($page > 1) {
            $this->has_previous = true;
        }
        // return view with data
        return view('pages.actors.index', [
            'popularActors' => $popularActors,
            'has_previous' => $this->has_previous,
            'has_next' => $this->has_next,
            'current_page' => $this->current_page,
        ]);
    }
    public function show($id)
    {
        abort_if(!is_numeric($id), 404);
        // get the movie details
        $actor = $this->tmdb->fetchActor("/person/$id");
        // return view with data
        return view('pages.actors.show', compact('actor'));
    }
}
