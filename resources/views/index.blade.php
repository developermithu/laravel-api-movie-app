@extends('layouts.app')

@section('title', 'Movie App | Developed By Mithu')
@section('movies-active', 'active')


@section('content')
    <div class="container mx-auto px-4 mt-12 ">
        <section class="popular-movies" id="popularMovies">
            <h2 class=" uppercase text-yellow-500 tracking-wider text-lg font-semibold">Popular Movies</h2>
            <div class=" grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-8">
                <!-- Single Column -->
                @foreach ($popularMovies as $movie)
                <div class="mt-5"> 
                    <a href="{{route('movies.show', $movie['id'])}}">
                        <img src="{{'https://image.tmdb.org/t/p/w500/' .$movie['poster_path']}}" alt="poster_path" class=" hover:opacity-75 transition ease-in-out duration-150">
                    </a>
                    <div class="mt-2">
                        <a  href="{{route('movies.show', $movie['id'])}}" class=" text-lg hover:text-gray-200">{{$movie['title']}}</a>
                        <div class="flex items-center text-gray-400 font-sans text-sm">
                            <ion-icon name="star" class=" text-yellow-500"></ion-icon>
                            <span class="ml-1">Star</span> 
                            <span class="ml-1">{{$movie['vote_average'] *10 }}%</span>
                            <span class="mx-2">|</span>
                            <span>{{ \Carbon\Carbon::parse($movie['release_date'])->format('M d, Y') }}</span>
                        </div>
                        <div class="text-gray-400 text-sm">
                           @foreach ($movie['genre_ids'] as $genre)
                             {{ $genres->get($genre) }}@if (!$loop->last), @endif
                           @endforeach
                        </div>
                    </div>
                   </div>
                @endforeach
            </div> 
        </section>

        <section class="now-playing-movies pt-8 mt-10 border-t border-gray-600" id="nowPlaying">
            <h2 class=" uppercase text-yellow-500 tracking-wider text-lg font-semibold">Now Playing</h2>
            <div class=" grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-8">
                <!-- Single Column -->
                @foreach ($nowPlayingMovies as $movie)
                <div class="mt-5">
                    <a  href="{{route('movies.show', $movie['id'])}}">
                        <img src="{{'https://image.tmdb.org/t/p/w500/' .$movie['poster_path']}}" alt="poster_path" class=" hover:opacity-75 transition ease-in-out duration-150">
                    </a>
                    <div class="mt-2">
                        <a  href="{{route('movies.show', $movie['id'])}}" class=" text-lg hover:text-gray-200">{{$movie['title']}}</a>
                        <div class="flex items-center text-gray-400 font-sans text-sm">
                            <ion-icon name="star" class=" text-yellow-500"></ion-icon>
                            <span class="ml-1">Star</span>
                            <span class="ml-1">{{$movie['vote_average'] * 10}}%</span>
                            <span class="mx-2">|</span>
                            <span>{{ \Carbon\Carbon::parse($movie['release_date'])->format('M d, Y') }}</span>
                        </div>
                        <div class="text-gray-400 text-sm">
                            @foreach ($movie['genre_ids'] as $genre)
                            {{ $genres->get($genre) }}@if (!$loop->last), @endif
                          @endforeach
                        </div>
                    </div>
                   </div>
                @endforeach
            </div> 
        </section>

        <section class="upcoming-movies py-8 mt-10 border-t border-gray-600" id="upcoming">
            <h2 class=" uppercase text-yellow-500 tracking-wider text-lg font-semibold">Upcoming Movies</h2>
            <div class=" grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-8">
                <!-- Single Column -->
                @foreach ($upcomingMovies as $movie)
                @if ($movie['release_date'] > \Carbon\Carbon::now())
                <div class="mt-5">
                    <a  href="{{route('movies.show', $movie['id'])}}">
                        <img src="{{'https://image.tmdb.org/t/p/w500/' .$movie['poster_path']}}" alt="poster_path" class=" hover:opacity-75 transition ease-in-out duration-150">
                    </a>
                    <div class="mt-2">
                        <a  href="{{route('movies.show', $movie['id'])}}" class=" text-lg hover:text-gray-200">{{$movie['title']}}</a>
                        <div class="flex items-center text-gray-400 font-sans text-sm">
                            <ion-icon name="star" class=" text-yellow-500"></ion-icon>
                            <span class="ml-1">Star</span>
                            <span class="ml-1">{{$movie['vote_average'] * 10}}%</span>
                            <span class="mx-2">|</span>
                            <span>{{ \Carbon\Carbon::parse($movie['release_date'])->format('M d, Y') }}</span>
                        </div>
                        <div class="text-gray-400 text-sm">
                            @foreach ($movie['genre_ids'] as $genre)
                            {{ $genres->get($genre) }}@if (!$loop->last), @endif
                          @endforeach
                        </div>
                    </div>
                   </div>
                   @endif
                @endforeach
            </div> 
        </section>

        <section class="topRatedMovies py-8 mt-10 border-b border-t border-gray-600" id="topRatedMovies">
            <h2 class=" uppercase text-yellow-500 tracking-wider text-lg font-semibold">Top Rated Movies</h2>
            <div class=" grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-8">
                <!-- Single Column -->
                @foreach ($topRatedMovies as $movie)
                <div class="mt-5">
                    <a  href="{{route('movies.show', $movie['id'])}}">
                        <img src="{{'https://image.tmdb.org/t/p/w500/' .$movie['poster_path']}}" alt="poster_path" class=" hover:opacity-75 transition ease-in-out duration-150">
                    </a>
                    <div class="mt-2">
                        <a  href="{{route('movies.show', $movie['id'])}}" class=" text-lg hover:text-gray-200">{{$movie['title']}}</a>
                        <div class="flex items-center text-gray-400 font-sans text-sm">
                            <ion-icon name="star" class=" text-yellow-500"></ion-icon>
                            <span class="ml-1">Star</span>
                            <span class="ml-1">{{$movie['vote_average'] * 10}}%</span>
                            <span class="mx-2">|</span>
                            <span>{{ \Carbon\Carbon::parse($movie['release_date'])->format('M d, Y') }}</span>
                        </div>
                        <div class="text-gray-400 text-sm">
                            @foreach ($movie['genre_ids'] as $genre)
                            {{ $genres->get($genre) }}@if (!$loop->last), @endif
                          @endforeach
                        </div>
                    </div>
                   </div>
                @endforeach
            </div> 
        </section>
    </div>
@endsection