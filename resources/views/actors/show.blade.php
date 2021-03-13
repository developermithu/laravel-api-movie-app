@extends('layouts.app')

@section('title',  'Actor | ' .$actor['name'])

@section('content')
  <section class="actor-info">
    <div class="container mx-auto px-4 py-16 flex flex-col md:flex-row">
        <img src="{{'https://image.tmdb.org/t/p/w500/' .$actor['profile_path']}} " alt="profile_path" class=" md:w-96 w-64">

        <div class="mt-2 social">
            {{-- @foreach ($externalID as $item)
            <a href="{{$item['facebook_id']}}">Facebook</a>   
            @endforeach --}}
        </div>

        <div class="md:ml-24">
            <h2 class=" text-4xl font-semibold">
                {{$actor['name']}} 
            </h2>
            <div class="flex flex-wrap items-center text-gray-400 font-sans">
                <span class="ml-1">Birthday</span>
                <span class="mx-2">:</span>
                <span>{{ \Carbon\Carbon::parse($actor['birthday'])->format('M d, Y') }}</span>
                <span class="mx-2">|</span>
                <span>
                    {{$actor['place_of_birth']}}
                </span>
            </div>

           <div class="mt-6">
            {{$actor['biography']}}
           </div>

           {{-- <div class="mt-8">
               <h4 class=" font-semibold">Feaured Cast</h4>
               <div class="flex mt-4">
                   @foreach ($actor['credits']['crew'] as $crew)
                       @if ($loop->index < 2)
                       <div class="mr-8">
                            <div>{{$crew['name']}}</div>
                            <div class="text-sm text-gray-400">{{$crew['job']}}</div>
                       </div>
                       @endif
                   @endforeach 
               </div>
           </div> --}}


        </div>
    </div>
  </section>
@endsection