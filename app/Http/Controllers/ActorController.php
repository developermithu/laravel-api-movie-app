<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ActorController extends Controller
{

    // public $page;

    public function index()
    {

        $popularActors = Http::get('https://api.themoviedb.org/3/person/popular?api_key=61274af004d09cfcf8bce39a08dd8f1b')->json()['results'];

        // dump($popularActors);

        return view('actors.index', [
            'popularActors' => $popularActors,
        ]);
    }

    public function show($person_id)
    {
        $actor = Http::get('https://api.themoviedb.org/3/person/' . $person_id . '?api_key=61274af004d09cfcf8bce39a08dd8f1b')->json();
        
        return view('actors.show', [
            'actor' => $actor,
        ]);
    }


    // public function next()
    // {
    //     return $this->page > 1 ? $this->page - 1 : null;
    // }

    // public function prev()
    // {
    //     return $this->page < 500 ? $this->page + 1 : null;
    // }
}
