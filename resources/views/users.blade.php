@extends('layouts.app')

@section('content')
    
   <div class="container">
    <div class="row">
        <div class="col-12">
            <div class="card shadow border-0 p-4">
                <div class="">
                    <div class="d-flex justify-content-between align-items-center">
                        <h1>Users</h1>
                        {{-- <div class="">
                            <a href="{{route('user.create')}}" class="btn btn-outline-dark">
                                <i class="bi bi-plus-circle"></i>
                                Create
                            </a>
                        </div> --}}
                    </div>
                </div>
                <div class="card-body">
            
                    <table class=" table">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Information</th>
                                <th>
                                    Article Count
                                </th>
                                <th>
                                    Role
                                </th>

                                <th>
                                    Cateogry Count
                                </th>
                                <th>Control</th>
                                <th>Updated At</th> 
                                <th>Created At</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($users as $user)
                                <tr>
                                    <td>{{ $user->id }}</td>
                                    <td>
                                        {{ $user->name }}
                                        <br>
                                        <span class="small text-black-50">
                                            {{$user->email}}
                                        </span>
                                    </td>

                                    <td>
                                        {{$user->articles->count()}}
                                    </td>

                                   <td>
                                    {{$user->role}}
                                   </td>

                                    <td>
                                        {{$user->categories->count()}}
                                    </td>
        
                                    <td>
                                        <a class=" btn btn-sm btn-outline-dark" href="{{ route('user.detail', $user->url_name) }}">
                                            <i class="bi bi-eye-fill"></i>
                                        </a>
                                        {{-- <a href="{{ route('user.edit', $user->id) }}" class="btn btn-sm btn-outline-dark">  <i class="bi bi-pencil"></i></a>
                                        <form class=" d-inline-block" action="{{ route('user.destroy', $user->id) }}" method="post">
                                            @method('delete')
                                            @csrf
                                            <button class=" btn btn-sm btn-outline-dark">  <i class="bi bi-trash3"></i></button>
                                        </form> --}}
                                    </td>  

                                    <td>
                                        <p class="small mb-0">
                                            <i class="bi bi-clock"></i>
                                            {{$user->updated_at->format("h:i a")}}
                                        </p>
                                        <p class="small mb-0">
                                            <i class="bi bi-clock"></i>
                                            {{$user->updated_at->format("d M Y")}}
                                        </p>
                                    </td>

                                    <td>
                                        <p class="small mb-0">
                                            <i class="bi bi-clock"></i>
                                            {{$user->created_at->format("h:i a")}}
                                        </p>
                                        <p class="small mb-0">
                                            <i class="bi bi-clock"></i>
                                            {{$user->created_at->format("d M Y")}}
                                        </p>
                                    </td>

                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class=" text-center">
                                        <p>
                                            There is no record
                                        </p>
                                        <a class=" btn btn-sm btn-dark" href="{{ route('user.create') }}">Create Item</a>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                    <div class="">
                        {{$users->links()}}
                    </div>
                </div>
            </div>
        </div>
    </div>
   </div>
@endsection