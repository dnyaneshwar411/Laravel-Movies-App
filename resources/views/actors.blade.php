@extends('layouts.main');

@section('title')
    <title>Cinemadness</title>
@endsection

@section('content')
    <!-- popular movies -->

    <section id="popActors" class="paddingSection">
        <h2>POPULAR ACTORS</h2>
        <div class="flex">
            @foreach ($popActors['results'] as $actor)
                <div class="card">
                    <a href="#">
                        {{--  href={{ url('/movie') . '/' . $actor['id'] }} --}}
                        <img src={{ 'http://image.tmdb.org/t/p/w500' . $actor['profile_path'] }} alt="">
                        <div>
                            <a href="#">
                                <h5><a href={{ url('/actor') . '/' . $actor['id'] }}>{{ $actor['original_name'] }}</a></h5>
                            </a>
                            <span class="rating-date"><i class="fa-solid fa-star"></i> {{ $actor['popularity'] }}
                            </span><br>
                            <hr>
                            {{-- <span class="genre actorMovies">
                                <p>Movies -
                                    @foreach ($actor['known_for'] as $movie)
                                        @if ($loop->index < 2)
                                            <a href={{ url('movie') . '/' . $movie['id'] }}> {{ $movie['media_type'] }}</a>
                                            @if ($loop->index < 1)
                                                ,
                                            @endif
                                        @else
                                        @break
                                    @endif
                                @endforeach
                            </p>
                        </span> --}}
                        </div>
                    </a>
                </div>
            @endforeach
    </section>
@endsection
