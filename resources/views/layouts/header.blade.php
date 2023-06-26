<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
        integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    @yield('title')
    @livewireStyles
</head>

<body>
    <header>
        <nav class="flex">
            <div>
                <ul class="flex">
                    <li>
                        <h4><i class="fa-solid fa-film"></i> Cinemadness </h4>
                    </li>
                    <li>
                        <ul class="flex" id="navigation">
                            <a href="/">
                                <li>Movies</li>
                            </a>
                            <a href={{ url('/actors') }}>
                                <li>Actors</li>
                            </a>
                            <a href={{ url('/tv-shows') }}>
                                <li>TV Shows</li>
                            </a>
                        </ul>
                    </li>
                </ul>

            </div>
            <div class="flex">
                <ul class="flex">
                    <li>
                        <i class="fa-solid fa-magnifying-glass"></i>
                        <livewire:search-drop-down />
                    </li>
                    <li><i class="fa-solid fa-bars"></i></li>
                    <li><img src="{{ asset('images/avatar.jpg') }}" alt=""></li>
                </ul>
            </div>
        </nav>
    </header>
    <hr>
