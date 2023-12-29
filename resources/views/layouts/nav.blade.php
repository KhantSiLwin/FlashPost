<nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm sticky-top">
    <div class="container">
        <a class="navbar-brand" href="{{ url('/') }}">
              <h4 class="fw-bolder mb-0 text-dark"> <i class="bi bi-lightning-charge-fill"></i>Flash <span class="text-light-gray">Posts</span></h4>
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Left Side Of Navbar -->
            <ul class="navbar-nav me-auto">

            </ul>

            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ms-auto ">
                <!-- Authentication Links -->
                
                @guest
                    @if (Route::has('login'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                    @endif

                    @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                    @endif
                @else
                    <li class="nav-item dropdown ">
                        
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            
                            <img src="{{ asset('storage/img/profile/'.Auth::user()->img) }}" style="width: 30px;height:30px; border-radius:50%;" alt="">
                            {{ Auth::user()->name }}
                        </a>

                        <div class="dropdown-menu dropdown-menu-end border-0 shadow" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <a href="{{route('profile.edit')}}" class="dropdown-item" >Edit Profile</a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div>
                    </li>

                    @if (request()->route()->getPrefix() == "/dashboard")
                    <li class="nav-item d-flex align-items-center"> <a href="{{route("index")}}" class=" btn btn-outline-dark"><i class="me-2 bi bi-arrow-left-circle-fill"></i> Home</a></li>

                    @else
                    <li class="nav-item d-flex align-items-center"> <a href="{{route("article.create")}}" class=" btn btn-outline-dark"><i class="me-2 bi bi-arrow-right-circle-fill"></i> Dashboard</a></li>

                    @endif
                @endguest
            </ul>
        </div>
    </div>
</nav>