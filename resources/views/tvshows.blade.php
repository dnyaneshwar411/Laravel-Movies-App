@extends('layouts.main')

@section('title')
    <title>Cinemadness</title>
@endsection

@section('content')
    <!-- popular tv shows -->
    <section id="popActors" class="paddingSection">
        <h2>POPULAR TV SHOWS</h2>
        <div class="flex">
            @foreach ($tvShows['results'] as $tvshow)
                <div class="card">
                    <a href="#">
                        {{-- href={{ url('/tv-show') . '/' . $tvshow['id'] }} --}}
                        <img src={{ 'http://image.tmdb.org/t/p/w500' . $tvshow['poster_path'] }} alt="">
                        <div>
                            <a href="#">
                                <h5><a href={{ url('/tv-show') . '/' . $tvshow['id'] }}>{{ $tvshow['original_name'] }}</a>
                                </h5>
                            </a>
                            <span class="rating-date"><i class="fa-solid fa-star"></i> {{ $tvshow['vote_average'] }}
                            </span><br>
                            <hr>
                            {{-- <span class="genre actorMovies">
                                @foreach ($tvshow['genre_ids'] as $genre)
                                    {{ $genres->get($genre) }}@if (!$loop->last)
                                        ,
                                    @endif
                                @endforeach
                            </span> --}}
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
    </section>
@endsection
