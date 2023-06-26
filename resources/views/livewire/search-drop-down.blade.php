<div id="search" x-data="{ isOpen: true }" @click.outside="isOpen = false">
    <form action="">
        <input wire:model.debounce.200ms="search" type="text" name="search" id="" placeholder="search"
            autocomplete="off" onfocusout="blur()" @focus.transition.opacity="isOpen = true">
    </form>
    <div id="searchDropDown" x-show="isOpen" @keydown.escape.window="isOpen = false">
        <ul id="searchResults">
            {{-- {{ $search }} --}}
            @foreach ($popularMovies as $movie)
                @if ($loop->index <= 5)
                    <a href={{ url('/movie') . '/' . $movie['id'] }}
                        @if ($loop->last) @keydown.tab.exact="isOpen=false" @endif>
                        <li class="flex">
                            <img src={{ 'http://image.tmdb.org/t/p/w500' . $movie['poster_path'] }} alt="">
                            {{ $movie['original_title'] }}
                        </li>
                    </a>
                    <hr>
                @endif
            @endforeach
        </ul>
    </div>
</div>
