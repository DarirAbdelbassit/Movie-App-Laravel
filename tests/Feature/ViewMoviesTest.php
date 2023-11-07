<?php

namespace Tests\Feature;

use Illuminate\Support\Facades\Http;
use Tests\TestCase;

class ViewMoviesTest extends TestCase
{
    // test the index view if it's show the right data
    public function test_index_view_showing_all_the_correct_data()
    {
        Http::fake([
            'https://api.themoviedb.org/3/movie/popular' => Http::response($this->setPopularMovies(), 200),
            'https://api.themoviedb.org/3/movie/now_playing' => Http::response($this->setPlayingMovies(), 200),
            'https://api.themoviedb.org/3/genre/movie/list' => Http::response($this->setGenres(), 200)
        ]);

        $response = $this->get(route('movies.index'));

        $response->assertStatus(200)
        ->assertSee('Popular Movies')
        ->assertSee("Five Nights at Freddy's")
        ->assertSee("Horror, Mystery");
    }

    // test the show view if it's show the right data
    public function test_show_view_showing_all_the_correct_data()
    {
        Http::fake([
            'https://api.themoviedb.org/3/movie/507089?append_to_response=credits,videos,images' => Http::response($this->setPopularMovies(), 200),
        ]);

        $response = $this->get(route('movies.show', 507089));

        $response->assertStatus(200)
        ->assertSee("Five Nights at Freddy's")
        ->assertSee("Horror, Mystery")
        ->assertSee("Images")
        ->assertSee("Pipper Rubio");
    }

    // test the search drop down if it's show the right data
    public function test_search_drop_down_showing_all_the_correct_data()
    {
        Http::fake([
            'https://api.themoviedb.org/3/search/movie?query=Five%20Nights%20at%20Freddy%27s' => Http::response($this->setPopularMovies(), 200),
        ]);

        $response = $this->get(route('movies.index', ['search' => 'Five Nights at Freddy\'s']));

        $response->assertStatus(200)
        ->assertSee("Five Nights at Freddy's")
        ->assertSee("https://image.tmdb.org/t/p/w500/A4j8S6moJS2zNtRR8oWF08gRnL5.jpg");
    }
    // fucntions to set the fake data
    public function setPopularMovies()
    {
        return [
            "results" => [
                [
                    "adult" => false,
                    "backdrop_path" => "/t5zCBSB5xMDKcDqe91qahCOUYVV.jpg",
                    "genre_ids" => [27, 9648],
                    "id" => 507089,
                    "original_language" => "en",
                    "original_title" => "Five Nights at Freddy's",
                    "overview" => "Recently fired and desperate for work, a troubled young man named Mike agrees to take a position as a night security guard at an abandoned theme restaurant: Fre...",
                    "popularity" => 3439.286,
                    "poster_path" => "/A4j8S6moJS2zNtRR8oWF08gRnL5.jpg",
                    "release_date" => "2023-10-25",
                    "title" => "Five Nights at Freddy's",
                    "video" => false,
                    "vote_average" => 8.243,
                    "vote_count" => 1661,
                ],
            ],
        ];
    }
    public function setPlayingMovies()
    {
        return [
            "results" => [
                [
                    "adult" => false,
                    "backdrop_path" => "/t5zCBSB5xMDKcDqe91qahCOUYVV.jpg",
                    "genre_ids" => [27, 9648],
                    "id" => 507089,
                    "original_language" => "en",
                    "original_title" => "Five Nights at Freddy's",
                    "overview" => "Recently fired and desperate for work, a troubled young man named Mike agrees to take a position as a night security guard at an abandoned theme restaurant: Fre...",
                    "popularity" => 3439.286,
                    "poster_path" => "/A4j8S6moJS2zNtRR8oWF08gRnL5.jpg",
                    "release_date" => "2023-10-25",
                    "title" => "Five Nights at Freddy's",
                    "video" => false,
                    "vote_average" => 8.243,
                    "vote_count" => 1661,
                ],
            ],
        ];
    }
    public function setGenres(): array
    {
        return [
            "genres" => [
            [
                "id" => 27,
                "name" => "Horror"
            ],
            [
                "id" => 9648,
                "name" => "Mystery"
            ],
            ]
    ];
    }
}
