@extends('layouts.app')

@section('content')
    
   <div class="container">
    <div class="row">
        <div class="col-12">
            <div class="card p-4 shadow border-0">
                <div class="">
                    <div class="d-flex justify-content-between align-items-center">
                        <h1>Article Detail</h1>
                        <div class="">
                            <a href="{{route('article.index')}}" class="btn btn-outline-dark">
                                <i class="bi bi-list"></i>
                                All Articles
                            </a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
            
                    <h5>{{$article->title}}</h5>
                    <p>{{$article->description}}</p>

                </div>
            </div>
        </div>
    </div>
   </div>
@endsection