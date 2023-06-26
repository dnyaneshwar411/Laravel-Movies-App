@extends('layouts.main');

@section('title')
    <title>Cinemadness</title>
@endsection

@section('content')
    <!-- popular movies -->

    <section id="popMovies" class="paddingSection">
        <h2>POPULAR MOVIES</h2>
        <div class="flex">
            @foreach ($popularMovies as $movie)
                    <x-movie-card :movie="$movie" :genres="$genres" />
            @endforeach
    </section>

    <!-- Now Playing -->
    <section id="nowPlaying" class="paddingSection">
        <h2>NOW PLAYING</h2>
        <div class="flex">
            @foreach ($nowPlaying as $movie)
                    <x-movie-card :movie="$movie" :genres="$genres" />
            @endforeach
        </div>
    </section>
@endsection
