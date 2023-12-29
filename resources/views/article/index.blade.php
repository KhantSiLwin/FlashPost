@extends('layouts.app')

@section('content')
    
   <div class="container">
    <div class="row">
        <div class="col-12">
            <div class="card  border-0 shadow p-4">
                <div class="">
                    <div class="d-flex justify-content-between align-items-center">
                        <h1>Article</h1>
                        <div class="">
                            <a href="{{route('article.create')}}" class="btn btn-outline-dark">
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
                                <th>Article</th>
                                <th>Category</th>
                                @can('admin-only')
                                     <th>Owner</th>
                                @endcan
                               
                                <th>Control</th>
                                <th>Updated At</th> 
                                <th>Created At</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($articles as $article)
                                <tr>
                                    <td>{{ $article->id }}</td>
                                 
                                    <td>   {{$article->user->isAdmin()}}
                                        {{ $article->title }}
                                        <br>
                                        <span class="small text-black-50">
                                            {{ Str::limit($article->description, 30, '...') }}
                                        </span>
                                    </td>
                                    <td>
                                        {{ $article->category->title ?? "Unknown" }}
                                    </td>
                                    @can('admin-only')
                                    <td>
                                        {{ $article->user->name }} 
                                    </td>
                                    @endcan
                                    <td>
                                        <a class=" btn btn-sm btn-outline-dark" href="{{ route('article.show', $article->id) }}">
                                           <i class="bi bi-info"></i>
                                        </a>
                                        @can('article-update', $article)
                                             <a href="{{ route('article.edit', $article->id) }}" class="btn btn-sm btn-outline-dark">  <i class="bi bi-pencil"></i></a>
                                        @endcan
                                       @can('article-delete', $article)
                                            <form class=" d-inline-block" action="{{ route('article.destroy', $article->id) }}" method="post">
                                                @method('delete')
                                                @csrf
                                                <button class=" btn btn-sm btn-outline-dark">  <i class="bi bi-trash3"></i></button>
                                            </form>
                                       @endcan
                                    </td>  

                                    <td>
                                        <p class="small mb-0">
                                            <i class="bi bi-clock"></i>
                                            {{$article->updated_at->format("h:i a")}}
                                        </p>
                                        <p class="small mb-0">
                                            <i class="bi bi-clock"></i>
                                            {{$article->updated_at->format("d M Y")}}
                                        </p>
                                    </td>

                                    <td>
                                        <p class="small mb-0">
                                            <i class="bi bi-clock"></i>
                                            {{$article->created_at->format("h:i a")}}
                                        </p>
                                        <p class="small mb-0">
                                            <i class="bi bi-clock"></i>
                                            {{$article->created_at->format("d M Y")}}
                                        </p>
                                    </td>

                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class=" text-center">
                                        <p>
                                            There is no record
                                        </p>
                                        <a class=" btn btn-sm btn-dark" href="{{ route('article.create') }}">Create Item</a>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                    <div class="">
                        {{$articles->links()}}
                    </div> 
                </div>
            </div>
        </div>
    </div>
   </div>
@endsection