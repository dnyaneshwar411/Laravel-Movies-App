@extends('layouts.main')

@section('title')
    <title>India</title>
@endsection

@section('content')
    <section id="moviePost" class="paddingSection">
        <div class="flex">

            <div>
                <img src="{{ 'http://image.tmdb.org/t/p/w500' . $popActor['profile_path'] }}" alt="">
            </div>
            <div id="movieInfo" class="flex">
                <div>
                    <h2>{{ $popActor['name'] }}</h2>
                    <div>
                        <div>
                            <span class="rating-date"><em>></em> <i class="fa-solid fa-star"></i>
                                {{ $popActor['popularity'] }}
                            </span>
                        </div>
                        <div>
                            <em>></em> <span>Department - {{ $popActor['known_for_department'] }}</span><br>
                            <em>></em> <span>Date Of Birth - {{ $popActor['birthday'] }}</span><br>
                            <em>></em> <span>Birth Place - {{ $popActor['place_of_birth'] }}</span>
                        </div>
                        <span class="genre actorMovies">
                            <p><em>></em> Movies -
                                @foreach ($actorMovies['results'] as $movie)
                                    @if ($loop->index < 5)
                                        <a href={{ url('movie') . '/' . $movie['id'] }}> {{ $movie['original_title'] }}</a>
                                        @if ($loop->index < 4)
                                            ,
                                        @endif
                                    @else
                                    @break
                                @endif
                            @endforeach
                        </p>
                    </span>
                </div>
            </div>
            <div class="desc">
                {{ \Illuminate\Support\Str::limit($popActor['biography'], $limit = 600, '...') }}<a
                    href={{ 'https://www.imdb.com/name' . '/' . $popActor['imdb_id'] }} target="_blank">Read More</a>
            </div>
        </div>
    </div>

    <div id="cast">
        <h2>Movies</h2>
        <div class="flex">
            @foreach ($actorMovies['results'] as $movie)
                @if ($loop->index < 5)
                    <div class="castActor card">
                        <img src="{{ 'http://image.tmdb.org/t/p/w500' . $movie['backdrop_path'] }}" alt="">
                        <p class="actorname">
                        <h3><a href={{ url('/movie' . '/' . $movie['id']) }}>{{ $movie['title'] }}</a></h3>
                        </p>
                        <span class="rating-date"><i class="fa-solid fa-star"></i> {{ $movie['vote_average'] }}
                            <em>|</em>
                            {{ $movie['release_date'] }}</span><br>
                        <span class="genre">
                            {{-- <span class="actorRole">{{ $crew['character'] }}</span> --}}
                    </div>
                @endif
            @endforeach
        </div>
    </div>

    <hr>
    </div>
</section>
@endsection
