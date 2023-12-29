<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])

    <style>
        .text-light-gray{
            color: #515151;
        }

        .bg-light-gray{
            background-color: #515151;
        }
        .page-link.active, .active > .page-link,.page-link:focus, .page-link:hover{
            /* color: black; */
            background-color: black;
            border-color: black; 
            color: white;
        }
        .page-link{
            color: black;
        }

        /* .page-link:hover{
            color: black;
        } */
    </style>
</head>

<body>
    <div id="app" class="min-vh-100 d-flex flex-column">
        @include('layouts.nav')
     <div class="container">
        <div class="row">
 
            @guest
                
           
            <div class="col-md-12">
              
    
                <main class="py-4">
                    @yield('content')
                </main>
            </div>
            @endguest
           @auth
               
           {{-- <div class="col-md-2">
           <div class="py-4 min-vh-100">
            @include('layouts.sidebar')
           </div>
          </div> --}}
        <div class="col-md-12">
            {{-- @include('layouts.nav') --}}
          

            <main class="py-4">
                @yield('content')
            </main>
        </div>

           @endauth
        </div>
     </div>
   
    <footer class="bg-dark py-2 text-center text-white mt-auto">
        <p class="mb-0">© Copyright Flash Posts 2024.</p>
    </footer> </div>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>
