@extends('layouts.app')

@section('title', 'TV Show | Developed By Mithu')
@section('tv-active', 'active')


@section('content')
    <div class="container mx-auto px-4 mt-12 ">

        <section class="popularTvShows" id="popularTvShows">
            <h2 class=" uppercase text-yellow-500 tracking-wider text-lg font-semibold">Popular TV Shows</h2>
            <div class=" grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-8">

                <!-- Single Column -->
                @foreach ($popularTvShows as $tvShow)
                <div class="mt-5"> 
                    <a href="{{route('tv.show', $tvShow['id'])}}">
                        <img src="{{'https://image.tmdb.org/t/p/w500/' .$tvShow['poster_path']}}" alt="poster_path" class=" hover:opacity-75 transition ease-in-out duration-150">
                    </a>
                    <div class="mt-2">
                        <a  href="{{route('tv.show', $tvShow['id'])}}" class=" text-lg hover:text-gray-200">
                            {{$tvShow['name']}}
                        </a>
                        <div class="flex items-center text-gray-400 font-sans text-sm">
                            <span><x-star-icon></x-star-icon></span>
                            <span class="ml-1">Star</span> 
                            <span class="ml-1"> {{$tvShow['vote_average'] *10 }}% </span>
                            <span class="mx-2">|</span>
                            <span>{{ \Carbon\Carbon::parse($tvShow['first_air_date'])->format('M d, Y') }}</span>
                        </div>
                        <div class="text-gray-400 text-sm">
                           @foreach ($tvShow['genre_ids'] as $genre)
                             {{ $genres->get($genre) }}@if (!$loop->last), @endif
                           @endforeach
                        </div>
                    </div>
                   </div>
                @endforeach

            </div> 
        </section>

        <section class="topRatedTvShows py-8 mt-10 border-t border-b border-gray-600" id="topRatedTvShows">
            <h2 class=" uppercase text-yellow-500 tracking-wider text-lg font-semibold">Top Rated TV Shows</h2>
            <div class=" grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-8">

                <!-- Single Column -->
                @foreach ($topRatedTvShows as $tvShow)
                <div class="mt-5">
                    <a  href="{{route('tv.show', $tvShow['id'])}}">
                        <img src="{{'https://image.tmdb.org/t/p/w500/' .$tvShow['poster_path']}}" alt="poster_path" class=" hover:opacity-75 transition ease-in-out duration-150">
                    </a>
                    <div class="mt-2">
                        <a  href="{{route('tv.show', $tvShow['id'])}}" class=" text-lg hover:text-gray-200">
                            {{$tvShow['name']}}
                        </a>
                        <div class="flex items-center text-gray-400 font-sans text-sm">
                            <span><x-star-icon></x-star-icon></span>
                            <span class="ml-1">Star</span>
                            <span class="ml-1">{{$tvShow['vote_average'] * 10}}%</span>
                            <span class="mx-2">|</span>
                            <span>{{ \Carbon\Carbon::parse($tvShow['first_air_date'])->format('M d, Y') }}</span>
                        </div>
                        <div class="text-gray-400 text-sm">
                            @foreach ($tvShow['genre_ids'] as $genre)
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