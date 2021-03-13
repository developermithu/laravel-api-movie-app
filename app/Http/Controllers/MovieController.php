<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class MovieController extends Controller
{

    public function index()
    {
        // $popularMovies = Http ::withToken(config('services.tmdb.token'))
        //     ->get('https://api.themoviedb.org/3/movie/popular')
        //     ->json()['results'];

        $popularMovies = Http::get('https://api.themoviedb.org/3/movie/popular?api_key=61274af004d09cfcf8bce39a08dd8f1b')->json()['results'];

        $nowPlayingMovies = Http::get('https://api.themoviedb.org/3/movie/now_playing?api_key=61274af004d09cfcf8bce39a08dd8f1b')->json()['results'];

        $upcomingMovies = Http::get('https://api.themoviedb.org/3/movie/upcoming?api_key=61274af004d09cfcf8bce39a08dd8f1b')->json()['results'];

        $topRatedMovies = Http::get('https://api.themoviedb.org/3/movie/top_rated?api_key=61274af004d09cfcf8bce39a08dd8f1b')->json()['results'];

        $genresArr = Http::get('https://api.themoviedb.org/3/genre/movie/list?api_key=61274af004d09cfcf8bce39a08dd8f1b')->json()['genres'];

        $genres = collect($genresArr)->mapWithKeys(function ($genre) {
            return [$genre['id'] => $genre['name']];
        });

        // dump($topRatedMovies);

        return view('index', [
            'popularMovies' => $popularMovies,
            'nowPlayingMovies' => $nowPlayingMovies,
            'upcomingMovies' => $upcomingMovies,
            'topRatedMovies' => $topRatedMovies,
            'genres' => $genres,
        ]);
    }

    public function show($id)
    {
        $movie = Http::get('https://api.themoviedb.org/3/movie/' . $id . '?api_key=61274af004d09cfcf8bce39a08dd8f1b&append_to_response=credits,videos,images')->json();

        // dump($movie);

        return view('show', [
            'movie' => $movie,
        ]);
    }
}
