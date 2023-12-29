@extends('layouts.app')

@section('content')
    
   <div class="container">
    <div class="row">
        <div class="col-12">
            <div class="card  border-0 shadow p-4">
                <div class="">
                    <div class="d-flex justify-content-between align-items-center">
                        <h1>Create New Category</h1>
                        <div class="">
                            <a href="{{route('category.index')}}" class="btn btn-outline-dark">
                                <i class="bi bi-list"></i>
                                All Categories
                            </a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
            
                    <form action="{{route('category.store')}}" method="post">
                    
                        @csrf
                
                        <div class="mb-3">
                            <label class=" form-label" for="">Title</label>
                            <input type="text" class=" form-control @error('title') is-invalid @enderror" name="title">
                            @error('title')
                                <div class=" invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                
                
                        <button class="btn btn-dark">Save Category</button>
                
                    </form>
                </div>
            </div>
        </div>
    </div>
   </div>
@endsection