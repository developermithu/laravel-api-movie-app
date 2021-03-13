<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title') </title>

    <script src="https://unpkg.com/ionicons@5.4.0/dist/ionicons.js"></script>
    {{-- Tailwind CSS --}}
    <link rel="stylesheet" href="/css/app.css">
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.8.1/dist/alpine.min.js" defer></script>
    @livewireStyles
    <style>
        html{
            scroll-behavior: smooth;
        }
        .active{
            color: rgba(245, 158, 11);
        }
    </style>
</head>
<body class=" font-sans bg-gray-800 text-gray-300">
    
<!-- Navabar -->
<nav class=" border-b border-gray-600">
    <div class=" container mx-auto flex flex-col md:flex-row items-center justify-between p-4 ">
       <ul class="flex flex-col md:flex-row items-center">
           <li class=" hover:text-gray-200">
               <a href="/">
                   <ion-icon name="film-outline" size="large"></ion-icon> 
                   <div style="margin-top: -34px; margin-left:38px">MovieApp</div>
               </a>
           </li>
           <li class=" md:ml-16 mt-2 md:mt-0">
               <a href="/" class=" hover:text-gray-200 @yield('movies-active')">Movies</a>
           </li>
           <li class=" md:ml-5 mt-2 md:mt-0">
               <a href="{{route('tv.index')}}" class=" hover:text-gray-200 @yield('tv-active')">TV Shows</a>
           </li>
           <li class=" md:ml-5 mt-2 md:mt-0">
               <a href="{{route('actors.index')}}" class=" hover:text-gray-200 @yield('actor-active')">Actors</a>
           </li>
           <li class=" md:ml-5 mt-2 md:mt-0">
               <a href="{{url('about-project')}}" class=" hover:text-gray-200 @yield('about-active')">About</a>
           </li>
       </ul>

       @livewire('search-dropdown')

    </div>
</nav>
<!-- Navabar -->


<main>
    @yield('content')
</main>

<footer class="footer justify-between flex my-3 mx-2 md:mx-16">
    <p>
        Developed by : <a href="http://mithu.epizy.com" target="_blank" class=" text-yellow-500">Mithu</a>
    </p>
    <p>
        Powered by : <a href="https://www.themoviedb.org/documentation/api" target="_blank" class=" text-yellow-500">TMDB</a>
    </p>
</footer>
@livewireScripts
</body>
</html>