<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class tvShows extends Controller
{
    public function  tvshows()
    {
        $tvShows = Http::withOptions(['verify' => false])->get('https://api.themoviedb.org/3/tv/airing_today?api_key=eba403b3f3b2a1d950361f32bb287161&language=en-US&page=1')->json();
        $nowPlaying = Http::withOptions(['verify' => false])->get('https://api.themoviedb.org/3/movie/now_playing?api_key=eba403b3f3b2a1d950361f32bb287161&language=en-US&page=1')->json()['results'];

        $genreApi = Http::withOptions(['verify' => false])->get('https://api.themoviedb.org/3/genre/movie/list?api_key=eba403b3f3b2a1d950361f32bb287161&language=en')->json()['genres'];
        $genres = collect($genreApi)->mapWithKeys(function ($genre) {
            return [$genre['id'] => $genre['name']];
        });
        // dd($tvShows);

        return view('tvshows')->with(compact('tvShows', 'genres'));
    }
    public function  tvshow(Request $req)
    {
        $tvshow = Http::withOptions(['verify' => false])->get('https://api.themoviedb.org/3/tv/' . $req['tvshow'] . '?api_key=eba403b3f3b2a1d950361f32bb287161&language=en-US')->json();
        // $nowPlaying = Http::withOptions(['verify' => false])->get('https://api.themoviedb.org/3/movie/now_playing?api_key=eba403b3f3b2a1d950361f32bb287161&language=en-US&page=1')->json()['results'];

        // $genreApi = Http::withOptions(['verify' => false])->get('https://api.themoviedb.org/3/genre/movie/list?api_key=eba403b3f3b2a1d950361f32bb287161&language=en')->json()['genres'];
        // $genres = collect($genreApi)->mapWithKeys(function ($genre) {
        //     return [$genre['id'] => $genre['name']];
        // });
        // dd($tvShow);
        // 
        return view('tvshow')->with(compact('tvshow'));
    }

    public function index(Request $req)
    {
        return view('tvshow');
    }
}
