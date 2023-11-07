<?php

namespace App\Livewire;

use Illuminate\Support\Facades\Http;
use Livewire\Component;

class SearchDropDown extends Component
{
    public $search = '';
    public $searchResults = [];
    public function render()
    {
        $tempSelectedMoviesArray = Http::withToken(config('services.tmdb.tmdb-token'))
        ->get(config('services.tmdb.base_url') . '/search/movie?query=' . $this->search)
        ->json()['results'];
        $this->searchResults = collect($tempSelectedMoviesArray)->map(function ($movie) {
            $results =  [
                            'id' => $movie['id'],
                            'title' => $movie['title']
                        ];
            if(isset($movie['poster_path']) && $movie['poster_path'] !== null) {
                $results['poster_path'] = config('services.tmdb.poster_url') . $movie['poster_path'];
            }
            return $results;
        })->take(5)->toArray();

        return view('livewire.search-drop-down');
    }
}
