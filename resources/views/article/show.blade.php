@extends('layouts.app')

@section('content')
    
   <div class="container">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
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
                    <div class="">
                        <span class="badge bg-black">
                            {{$article->category_id}}
                        </span>
                    </div>
                    <p>{{$article->description}}</p>

                </div>
            </div>
        </div>
    </div>
   </div>
@endsection