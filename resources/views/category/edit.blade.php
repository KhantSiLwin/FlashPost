@extends('layouts.app')

@section('content')
    
   <div class="container">
    <div class="row">
        <div class="col-12">
            <div class="card shadow border-0 p-4">
                <div class="">
                    <div class="d-flex justify-content-between align-items-center">
                        <h1>Edit Category</h1>
                        <div class="">
                            <a href="{{route('category.index')}}" class="btn btn-outline-dark">
                                <i class="bi bi-list"></i>
                                All Categories
                            </a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
            
                    <form action="{{route('category.update',$category->id)}}" method="post">
                    
                        @csrf
                        @method('put')
                        <div class="mb-3">
                            <label class=" form-label" for="">Title</label>
                            <input type="text" value="{{old('title',$category->title)}}" class="form-control @error('title') is-invalid @enderror" name="title">
                            @error('title')
                                <div class=" invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                
                
                        <button class="btn btn-dark">Update category</button>
                
                    </form>
                </div>
            </div>
        </div>
    </div>
   </div>
@endsection