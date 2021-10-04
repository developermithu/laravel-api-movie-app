@extends('layouts.app')

@section('title', $movie['title'])

@section('content')
  <section class="movie-info border-b border-gray-600">
    <div class="container mx-auto px-4 py-16 flex flex-col md:flex-row">
        <img src="{{'https://image.tmdb.org/t/p/w500/' .$movie['poster_path']}} " alt="parasite" class=" md:w-96 w-64">

        <div class="md:ml-24">
            <h2 class=" text-4xl font-semibold">{{$movie['title']}} ({{ \Carbon\Carbon::parse($movie['release_date'])->format('Y') }})</h2>
            <div class="flex flex-wrap items-center text-gray-400 font-sans">
                <span><x-star-icon></x-star-icon></span>
                <span class="ml-1">Star</span>
                <span class="ml-1">{{$movie['vote_average'] * 10}}%</span>
                <span class="mx-2">|</span>
                <span>{{ \Carbon\Carbon::parse($movie['release_date'])->format('M d, Y') }}</span>
                <span class="mx-2">|</span>
                <span>
                    @foreach ($movie['genres'] as $genre)
                    {{ $genre['name']}}@if (!$loop->last), @endif
                  @endforeach
                </span>
            </div>

           <div class="mt-6">
            {{$movie['overview']}}
           </div>

           <div class="mt-8">
               <h4 class=" font-semibold">Feaured Cast</h4>
               <div class="flex mt-4">
                   @foreach ($movie['credits']['crew'] as $crew)
                       @if ($loop->index < 2)
                       <div class="mr-8">
                            <div>{{$crew['name']}}</div>
                            <div class="text-sm text-gray-400">{{$crew['job']}}</div>
                       </div>
                       @endif
                   @endforeach 
               </div>
           </div>

           <div x-data="{ isOpen: false }">

                @if (count($movie['videos']['results']) > 0)
                <div class="mt-12">
                        <button
                        @click="isOpen = true"
                         class="px-5 py-3 rounded bg-yellow-700 hover:bg-yellow-800 transition ease-in-out duration-150 flex items-center space-x-2">
                         <span><x-play-icon></x-play-icon></span>
                            <span class="ml-1 font-semibold">Play Trailer</span>
                        </button>
                </div>
                @endif

                {{-- model --}}
                <div 
                x-show.transition.opacity="isOpen" 
                style="background: rgba(0, 0, 0, 0.5)" class=" fixed top-0 left-0 w-full h-full flex items-center shadow-lg overflow-y-auto">
                    <div class=" container mx-auto lg:px-32 rounded-lg overflow-y-auto">
                        <div class=" bg-gray-900 rounded">
                            <div class="flex justify-end pr-4 pt-2">
                                <button @click="isOpen = false" class=" text-3xl leading-none hover:text-gray-300"> &times;</button>
                            </div>
                            <div class="modal-body px-8 py-8">
                                <div class=" responsive-container overflow-hidden relative" style="padding-top: 56.25%">
                                    <iframe width="560" height="315" src="https://www.youtube.com/embed/{{$movie['videos']['results'][0]['key']}}" frameborder="0" class="responsive-iframe absolute w-full h-full left-0 top-0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- model --}}
        </div>

        </div>
    </div>
  </section>

  <section class="cast border-b border-gray-600">
    <div class="container mx-auto my-16 px-4">
        <h2 class=" uppercase text-yellow-500 tracking-wider text-lg font-semibold">Cast</h2>
            <div class=" grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-8">
                <!-- Single Column -->
               @foreach ($movie['credits']['cast'] as $cast)
                   @if ($loop->index < 5)
                   <div class="mt-5">
                    <a href="{{route('actor.show', $cast['id'])}}"> 
                        <img src="{{'https://image.tmdb.org/t/p/w300/' .$cast['profile_path']}} "alt="profile_path" class=" hover:opacity-75 transition ease-in-out duration-150">
                    </a>
                    <div class="mt-2">
                        <a href="{{route('actor.show', $cast['id'])}}" class=" text-lg hover:text-gray-200">{{$cast['name']}}</a>
                        <div class="flex items-center text-gray-400 font-sans text-sm">
                            {{$cast['character']}}
                        </div>
                    </div>
                   </div>
                   @endif
               @endforeach
            </div> 
    </div>
  </section>

  <section class="images border-b border-gray-600">
    <div class="container mx-auto my-16 px-4">
        <h2 class=" uppercase text-yellow-500 tracking-wider text-lg font-semibold">Images</h2>
            <div class=" grid grid-cols-1 sm:grid-cols-2 md:grid-cols-2 lg:grid-cols-3 gap-8">

                <!-- Single Column -->
                @foreach ($movie['images']['backdrops'] as $image)
                    @if ($loop->index < 9)
                    <div class="mt-5" x-data="{ isOpen:false }">
                        <a href="#" @click.prevent="isOpen = true">
                            <img src="{{'https://image.tmdb.org/t/p/w500/' .$image['file_path']}}" alt="file_path" class=" hover:opacity-75 transition ease-in-out duration-150">
                        </a>

                          {{-- model --}}
                        <div 
                        x-show.transition.opacity="isOpen" 
                        style="background: rgba(0, 0, 0, 0.5)" class=" fixed top-0 left-0 w-full h-full flex items-center shadow-lg overflow-y-auto">
                            <div class=" container mx-auto lg:px-32 rounded-lg overflow-y-auto">
                                <div class=" bg-gray-900 rounded">
                                    <div class="flex justify-end pr-4 pt-2">
                                        <button @click="isOpen = false" @keydown.escape.window="isOpen=false" class="text-lg font-bold text-gray-300 hover:text-gray-600"> 
                                           <x-close-icon></x-close-icon>
                                        </button>
                                    </div>
                                    <div class="modal-body px-8 py-8">
                                        <img src="{{'https://image.tmdb.org/t/p/original/' .$image['file_path']}}" alt="file_path">
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{-- model --}}

                    </div>
                    @else
                        @break
                    @endif
             @endforeach
            </div> 
    </div>
  </section>
@endsection