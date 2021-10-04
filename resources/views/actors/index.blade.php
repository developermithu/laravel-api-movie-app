@extends('layouts.app')

@section('title', 'Popular Actors')
@section('actor-active', 'active')


@section('content')
    <div class="container mx-auto px-4 my-12">
        <section class="popularActors" id="popularActors">
            <h2 class=" uppercase text-yellow-500 tracking-wider text-lg font-semibold">Popular Actors</h2>
            <div class=" grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-8">

                <!-- Single Column -->
                @foreach ($popularActors as $actor)
                <div class="mt-5"> 
                    <a href="{{route('actor.show', $actor['id'])}}">
                        <img src="{{'https://image.tmdb.org/t/p/w500/' .$actor['profile_path']}}" alt="profile_path" class=" hover:opacity-75 transition ease-in-out duration-150">
                    </a>
                    <div class="mt-2">
                        <a  href="{{route('actor.show', $actor['id'])}}" class=" text-lg hover:text-gray-200">{{$actor['name']}}</a>
                        <div class="flex items-center text-gray-400 font-sans text-sm">
                            <span><x-star-icon></x-star-icon></span>
                            <span class="ml-1">Star</span> 
                            <span class="ml-1">{{ $actor['popularity']  }}%</span>
                        </div>
                        <div class="text-gray-400 text-sm truncate">
                            {{-- @foreach ($actor['known_for'] as $job)
                            {{print_r($job)}}
                            @endforeach --}}
                        </div>
                    </div>
                   </div>
                @endforeach
            </div> 
        </section>

{{-- <div class="mt-12 justify-between flex">
@if ($page)
<a href="actors/page/{{$page}}">Prev</a>
@endif

@if ($next)
<a href="actors/page/{{$next}}">next</a>
@endif
</div> --}}

    </div>
@endsection