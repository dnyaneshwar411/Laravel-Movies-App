<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

// require_once('vendor/autoload.php');

class pageRoutes extends Controller
{
    public function index()
    {
        $popularMovies = Http::withOptions(['verify' => false])->get('https://api.themoviedb.org/3/movie/popular?api_key=eba403b3f3b2a1d950361f32bb287161&language=en-US&page=1')->json()['results'];
        $nowPlaying = Http::withOptions(['verify' => false])->get('https://api.themoviedb.org/3/movie/now_playing?api_key=eba403b3f3b2a1d950361f32bb287161&language=en-US&page=1')->json()['results'];

        $genreApi = Http::withOptions(['verify' => false])->get('https://api.themoviedb.org/3/genre/movie/list?api_key=eba403b3f3b2a1d950361f32bb287161&language=en')->json()['genres'];
        $genres = collect($genreApi)->mapWithKeys(function ($genre) {
            return [$genre['id'] => $genre['name']];
        });

        $data = compact('popularMovies', 'genres', 'nowPlaying');
        return view('index')->with($data);
    }

    public function moviepost(Request $req)
    {
        $searchMovies = Http::withOptions(['verify' => false])->get('https://api.themoviedb.org/3/movie/' . $req['movie'] . 'videos?api_key=eba403b3f3b2a1d950361f32bb287161&include_adult=false&language=en-US&page=1&append_to_response=videos,images,credits')->json();
        $genreApi = Http::withOptions(['verify' => false])->get('https://api.themoviedb.org/3/genre/movie/list?api_key=eba403b3f3b2a1d950361f32bb287161&language=en')->json()['genres'];
        $movieImages = Http::withOptions(['verify' => false])->get('https://api.themoviedb.org/3/movie/' . $req['movie'] . '/images?api_key=eba403b3f3b2a1d950361f32bb287161')->json();
        $movieVideos = Http::withOptions(['verify' => false])->get('https://api.themoviedb.org/3/movie/' . $req['movie'] . '/videos?api_key=eba403b3f3b2a1d950361f32bb287161&language=en-US')->json();
        $genres = collect($genreApi)->mapWithKeys(function ($genre) {
            return [$genre['id'] => $genre['name']];
        });

        $data = compact('searchMovies', 'genres', 'movieImages', 'movieVideos');
        return view('moviepost')->with($data);
    }
}
