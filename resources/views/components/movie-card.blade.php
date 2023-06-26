<div class="card">
    <a href={{ url('/movie') . '/' . $movie['id'] }}>
        <img src={{ 'http://image.tmdb.org/t/p/w500' . $movie['poster_path'] }} alt="">
        <div>
            <a href={{ url('/movie') . '/' . $movie['id'] }}>
                <h5>{{ $movie['original_title'] }}</h5>
            </a>
            <span class="rating-date"><i class="fa-solid fa-star"></i> {{ $movie['vote_average'] }} <em>|</em>
                {{ $movie['release_date'] }}</span><br>
            <span class="genre">
                @foreach ($movie['genre_ids'] as $genre)
                    {{ $genres->get($genre) }}@if (!$loop->last)
                        ,
                    @endif
                @endforeach
            </span>
        </div>
    </a>
</div>
