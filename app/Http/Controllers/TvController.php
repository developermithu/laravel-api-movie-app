<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class TvController extends Controller
{
    public function index()
    {
        $popularTvShows = Http::get('https://api.themoviedb.org/3/tv/popular?api_key=61274af004d09cfcf8bce39a08dd8f1b')->json()['results'];

        $topRatedTvShows = Http::get('https://api.themoviedb.org/3/tv/top_rated?api_key=61274af004d09cfcf8bce39a08dd8f1b')->json()['results'];

        $genresArr = Http::get('https://api.themoviedb.org/3/genre/tv/list?api_key=61274af004d09cfcf8bce39a08dd8f1b')->json()['genres'];

        $genres = collect($genresArr)->mapWithKeys(function ($genre) {
            return [$genre['id'] => $genre['name']];
        });

        // dump($popularTvShows);

        return view('tv.index', [
            'popularTvShows' => $popularTvShows,
            'topRatedTvShows' => $topRatedTvShows,
            'genres' => $genres,
        ]);
    }

    public function show($id)
    {
        $tvShow = Http::get('https://api.themoviedb.org/3/tv/' . $id . '?api_key=61274af004d09cfcf8bce39a08dd8f1b&append_to_response=credits,videos,images')->json();

        // dump($tvShow);

        return view('tv.show', [
            'tvShow' => $tvShow,
        ]);
    }
}
