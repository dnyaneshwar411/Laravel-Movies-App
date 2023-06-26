<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Http;
use Livewire\Component;

class SearchDropDown extends Component
{
    public $search = '';
    public function render()
    {
        // $popularMovies = [];
        // if (strlen($this->search) >= 2) {
        //     $data = compact('popularMovies');
        // }
        $popularMovies = Http::withOptions(['verify' => false])->get('https://api.themoviedb.org/3/search/movie?api_key=eba403b3f3b2a1d950361f32bb287161&query=' . $this->search . '&include_adult=false&language=en-US&page=1')->json()['results'];
        // dump($popularMovies);
        return view('livewire.search-drop-down')->with(compact('popularMovies'));
    }
}
