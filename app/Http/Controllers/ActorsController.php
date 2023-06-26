<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ActorsController extends Controller
{
    public function actors()
    {

        $popActors = Http::withOptions(['verify' => false])->get('https://api.themoviedb.org/3/trending/person/week?api_key=eba403b3f3b2a1d950361f32bb287161&language=en-US')->json();
        // $popActor = Http::withOptions(['verify' => false])->get('https://api.themoviedb.org/3/person/500?api_key=eba403b3f3b2a1d950361f32bb287161&language=en-US')->json();
        //  'popActor'
        // dump($popActors);
        return view('actors')->with(compact('popActors',));
    }

    public function actor(Request $req)
    {
        $popActor = Http::withOptions(['verify' => false])->get('https://api.themoviedb.org/3/person/' . $req['actor'] . '?api_key=eba403b3f3b2a1d950361f32bb287161&language=en-US')->json();
        $actorMovies = Http::withOptions(['verify' => false])->get('https://api.themoviedb.org/3/discover/movie?api_key=eba403b3f3b2a1d950361f32bb287161&&with_people=' . $req['actor'])->json();
        return view('actor')->with(compact('popActor', 'actorMovies'));
    }
}
