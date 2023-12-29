@extends('layouts.master')

@section('content')
    <div class="container"> 
        <div class="row justiry-content-center">
          <div class="col-lg-8">

            @if (request()->has("keyword") &&  $category->title)
                <div class="d-flex justify-content-between">
                    <p class="mb-2 fw-bold">
                        Showing result by '{{request()->keyword}} and {{$category->title}} category'
                    </p>
                    <a href="{{route("index")}}" class="text-dark">
                        See All
                    </a>
                </div>

                    
                @elseif ($category->title)
                <div class="d-flex justify-content-between">
                    <p class="mb-2 fw-bold">
                        Showing result by '{{$category->title}} category '
                    </p>
                    <a href="{{route("index")}}" class="text-dark">
                        See All
                    </a>
                </div>
            @endif

            <div class="d-flex justify-content-between align-items-center mb-3">
                <h4 class=" fw-semibold text-light-gray mb-0">Posts</h4>
    
    
    
              <div class="btn-group">
                <button type="button" class="btn btn-sm bg-light-gray text-white btn-dark dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  Sort News
                </button>
                <div class="dropdown-menu">
                  <a class="dropdown-item" href="{{route('index','orderby=desc')}}">Latest</a>
                  <a class="dropdown-item" href="{{route('index','orderby=asc')}}">Oldest</a>
                 
                </div>
              </div>
             </div>
    
                @if (request()->has("keyword"))
                    <div class="d-flex justify-content-between">
                        <p class="mb-2 fw-bold">
                            Showing result by '{{request()->keyword}}'
                        </p>
                        <a href="{{route("index")}}" class="text-dark">
                            See All
                        </a>
                    </div>
                @endif
    
    
                @forelse ($articles as $article)
                <div class="card mb-3 shadow hover:shadow-lg border-0">
                    <div class="card-body">
    
                        <div class="d-flex justify-content-between">
                            <span class="text-sm fw-light text-light-gray">{{$article->created_at->format('M d , Y') }}</span>
                            <button class="btn btn-sm btn-dark">
                                {{$article->category->title ?? 'Unknown'}}
                            </button>
                        </div>
    
                        <div class="text-header">
    
                            <h4 class="fw-bold">
                                <a href="{{route("detail",$article->slug)}}" class="text-decoration-none text-dark mb-0">
                                {{$article->title}}
                                </a>
                            </h4>
                            <p class="text-light-gray"> {{Str::words($article->description,30,'...')}}</p>
                        </div>
    
                        <div class="d-flex justify-content-between align-items-center">
                            <a href="{{route("detail",$article->slug)}}" class="btn btn-outline-dark">See More <i class="ms-2 bi bi-arrow-right-circle-fill"></i> </a> 
                            <div class="d-flex justify-content-between align-items-center">
                                <img src="{{ asset('storage/img/profile/'.$article->user->img) }}" style="width: 30px;height:30px; border-radius:50%;" alt="">
                                <div class="ms-2">
                                     <h6 class="fw-bold mb-0">
                                         {{$article->user->name}}
                                     </h6>
                            </div>
                        </div>
                        </div>
    
                        {{-- <h3 class="mb-2">
                            
                        </h3>
                        <div class="mb-4">
                            <span class="badge bg-dark"></span>
                            
                            <span class="badge bg-dark">{{$article->user->name}}</span>
                        </div>
                        <div class="mb3">
                            {{Str::words($article->description,30,'...')}}
                        </div>
                        --}}
                    </div>
                </div>
                @empty
                    <div class="card">
                        <div class="card-body text-center">
                            <h3>There is no article.U can create</h3>
                            <a href="{{route("register")}}" class="btn btn-outline-dark">Try Now</a>
                        </div>
                    </div>
                @endforelse
                <div class="">
                    {{$articles->links()}}
                </div> 
            
           </div>

           <div class="col-lg-4">
                @include('layouts.right-side-bar')
            </div>
          
        </div>
       
    </div>
@endsection