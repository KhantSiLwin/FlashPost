@extends('layouts.app')

@section('content')
    
   <div class="container">
    <div class="row">
        <div class="col-12">
            <div class="card shadow border-0 p-4">
                <div class="">
                    <div class="d-flex justify-content-between align-items-center">
                        <h1>Category</h1>
                        <div class="">
                            <a href="{{route('category.create')}}" class="btn btn-outline-dark">
                                <i class="bi bi-plus-circle"></i>
                                Create
                            </a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
            
                    <table class=" table">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>title</th>
                                <th>Owner</th>
                                <th>Control</th>
                                <th>Updated At</th> 
                                <th>Created At</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($categories as $category)
                                <tr>
                                    <td>{{ $category->id }}</td>
                                    <td>
                                        {{ $category->title }}
                                        <br>
                                        <span class="small text-black-50">
                                            {{ Str::limit($category->description, 30, '...') }}
                                        </span>
                                    </td>
                                    <td>
                                        {{ $category->user->name }}
                                    </td>
                                    <td>
                                        {{-- <a class=" btn btn-sm btn-outline-dark" href="{{ route('category.show', $category->id) }}">
                                           <i class="bi bi-info"></i>
                                        </a> --}}
                                        <a href="{{ route('category.edit', $category->id) }}" class="btn btn-sm btn-outline-dark">  <i class="bi bi-pencil"></i></a>
                                        <form class=" d-inline-block" action="{{ route('category.destroy', $category->id) }}" method="post">
                                            @method('delete')
                                            @csrf
                                            <button class=" btn btn-sm btn-outline-dark">  <i class="bi bi-trash3"></i></button>
                                        </form>
                                    </td>  

                                    <td>
                                        <p class="small mb-0">
                                            <i class="bi bi-clock"></i>
                                            {{$category->updated_at->format("h:i a")}}
                                        </p>
                                        <p class="small mb-0">
                                            <i class="bi bi-clock"></i>
                                            {{$category->updated_at->format("d M Y")}}
                                        </p>
                                    </td>

                                    <td>
                                        <p class="small mb-0">
                                            <i class="bi bi-clock"></i>
                                            {{$category->created_at->format("h:i a")}}
                                        </p>
                                        <p class="small mb-0">
                                            <i class="bi bi-clock"></i>
                                            {{$category->created_at->format("d M Y")}}
                                        </p>
                                    </td>

                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class=" text-center">
                                        <p>
                                            There is no record
                                        </p>
                                        <a class=" btn btn-sm btn-dark" href="{{ route('category.create') }}">Create Item</a>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                    <div class="">
                        {{$categories->links()}}
                    </div> 
                </div>
            </div>
        </div>
    </div>
   </div>
@endsection