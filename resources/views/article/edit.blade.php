@extends('layouts.app')

@section('content')
    
   <div class="container">
    <div class="row">
        <div class="col-12">
            <div class="card border-0 shadow p-4">
                <div class="">
                    <div class="d-flex justify-content-between align-items-center">
                        <h1>Edit Article</h1>
                        <div class="">
                            <a href="{{route('article.index')}}" class="btn btn-outline-dark">
                                <i class="bi bi-list"></i>
                                All Articles
                            </a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
            
                    <form action="{{route('article.update',$article->id)}}" method="post">
                    
                        @csrf
                        @method('put')
                        <div class="mb-3">
                            <label class=" form-label" for="">Title</label>
                            <input type="text" value="{{old('title',$article->title)}}" class="form-control @error('title') is-invalid @enderror" name="title">
                            @error('title')
                                <div class=" invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                
                        <div class="mb-3">
                            <label class=" form-label" for="">Description</label>
                            <textarea name="description" class="form-control @error('description') is-invalid @enderror" rows="7" cols="30">
                               {{old('description',$article->description)}}
                            </textarea>
                            @error('description')
                                <div class=" invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label class=" form-label" for="">Select Category</label>
                           <select class=" form-select @error('category') is-invalid @enderror" value="{{old('category')}}" name="category">
                                @foreach (App\Models\Category::all() as $cat)
                                    <option value="{{$cat->id}}" {{old('category',$article->category_id)=== $cat->id ? 'selected' : ''}}>{{$cat->title}}</option>
                                @endforeach
                            </select>
                            @error('category')
                                <div class=" invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                
                        <button class="btn btn-dark">Update Article</button>
                
                    </form>
                </div>
            </div>
        </div>
    </div>
   </div>
@endsection