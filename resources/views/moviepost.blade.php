@extends('layouts.main')

@section('title')
    <title>India</title>
@endsection

@section('content')
    <section id="moviePost" class="paddingSection">
        <div class="flex" x-data="{ isOpen: false }" x-on:click.stop="open = true">
            <div id="vidModel" x-show="isOpen" x-transition>
                <div class="flex"><i class="fa-solid fa-xmark" @click="isOpen=false"></i></div>
                <div id="iframes">
                    <iframe width="560" height="315"
                        src={{ 'https://www.youtube.com/embed/' . $searchMovies['videos']['results'][0]['key'] }}
                        title="YouTube video player" frameborder="0"
                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                        allowfullscreen=""></iframe>
                </div>
            </div>
            <div>
                <img src="{{ 'http://image.tmdb.org/t/p/w500' . $searchMovies['poster_path'] }}" alt="">
            </div>
            <div id="movieInfo" class="flex">
                <div>
                    <h2>{{ $searchMovies['original_title'] }}</h2>
                    <div>
                        <span class="rating-date"><i class="fa-solid fa-star"></i> {{ $searchMovies['vote_average'] }}
                            <em>|</em> {{ $searchMovies['release_date'] }}</span>
                        <span class="genre">
                            @foreach ($searchMovies['genres'] as $genre)
                                {{ $genre['name'] }}@if (!$loop->last)
                                    ,
                                @endif
                            @endforeach
                        </span>
                    </div>
                </div>
                <div class="desc">{{ $searchMovies['overview'] }}</div>
                <div>
                    <div class="featuredCast flex">
                        @foreach ($searchMovies['credits']['cast'] as $crew)
                            @if ($loop->index < 2)
                                <span>
                                    <h3>
                                        <div><a href="#">{{ $crew['name'] }}</a></div>
                                    </h3>
                                    <div>{{ $crew['known_for_department'] }}</div>
                                </span>
                            @endif
                        @endforeach
                    </div>
                    <div class="featuredCrew flex">
                        @foreach ($searchMovies['credits']['crew'] as $crew)
                            @if ($loop->index < 2)
                                <span>
                                    <h3>
                                        <div><a href="#">{{ $crew['name'] }}</a></div>
                                    </h3>
                                    <div>{{ $crew['known_for_department'] }}</div>
                                </span>
                            @endif
                        @endforeach
                    </div>
                </div>
                {{--  href={{ 'https://www.youtube.com/watch?v=' . $searchMovies['videos']['results'][0]['key'] }}
                    target="_blank" --}}
                <a><button @click="isOpen=true"><i class="fa-regular fa-circle-play"></i> Play Trailer</button></a>
            </div>
        </div>

        <div id="cast">
            <h2>Cast</h2>
            <div class="flex">
                @foreach ($searchMovies['credits']['cast'] as $crew)
                    @if ($loop->index < 5)
                        <div class="castActor">
                            <img src="{{ 'http://image.tmdb.org/t/p/w500' . $crew['profile_path'] }}" alt="">
                            <p class="actorname">
                            <h3><a href={{ url('/actor' . '/' . $crew['id']) }}>{{ $crew['name'] }}</a></h3>
                            </p>
                            <span class="actorRole">{{ $crew['character'] }}</span>
                        </div>
                    @endif
                @endforeach
            </div>
        </div>

        <hr>
        <div id="imagesMovie">
            <h2>Images</h2>
            <div class="flex" x-data="{ isOpen: false, img: '' }">
                <div id="imgModel" x-show="isOpen" x-transition>
                    <div class="flex"><i class="fa-solid fa-xmark" @click="isOpen=false"></i></div>
                    <div id="iframes">
                        <img :src="img" alt="">
                    </div>
                </div>
                @foreach ($movieImages['backdrops'] as $movie)
                    @if ($loop->index < 6)
                        <div class="card"><img src={{ 'http://image.tmdb.org/t/p/w500' . $movie['file_path'] }}
                                alt=""
                                @click="
                                        isOpen=true 
                                        img='{{ 'http://image.tmdb.org/t/p/original' . $movie['file_path'] }}'
                                    ">
                        </div>
                    @else
                    @break
                @endif
            @endforeach
        </div>
    </div>
</section>
@endsection
