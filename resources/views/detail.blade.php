@extends('layouts.master')

@section('content')
    <div class="container">
        <div class="row justiry-content-center">
         

            <div class="card mb-3 shadow border-0 p-3 mb-3">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-start">
                        <div class="">
                            <h4 class="fw-bold">

                                {{ $article->title }}

                            </h4>
                            <div class="d-flex justify-content-start align-items-center my-2">
                                <img src="{{ asset('storage/img/profile/' . $article->user->img) }}" style="width: 40px;height:40px; border-radius:50%;" alt="">
                                <div class="ms-2">
                                    <h6 class="fw-bold mb-0">
                                        {{ $article->user->name }}
                                    </h6>
                                </div>
                                <span class="badge bg-dark ms-3">{{ $article->created_at->format('d M Y') }}</span>
                            </div>

                        </div>
                        <button class="btn btn-sm btn-dark">
                            {{ $article->category->title ?? 'Unknown' }}
                        </button>
                    </div>

                    <div class="my-3">
                        {{ $article->description }}
                    </div>



                    @vite('resources/js/reply.js')
                    {{-- <a href="{{route("detail",$aritcle->id)}}" class="btn btn-dark">See More</a> --}}
                </div>
            </div>

        </div>
        <div class="row">
            <div class="col-12">
                <div class="comment">

                    <h4 class="fw-semibold text-light-gray mb-3">Comment & Reply</h4>
                    @forelse ($article->comments()->whereNull("parent_id")->latest("id")->get() as $comment)
                        <div class="d-flex align-items-start">
                            <img src="{{ asset('storage/img/profile/' . $comment->user->img) }}" style="width: 40px;height:40px; border-radius:50%;" alt="">
                         <div class="position-relative mb-3">
                                <div class="card shadow border-0 p-2 ms-2">
                                    <div class="">
                                        <div class="d-flex justify-content-start align-items-center">

                                            <i class="bi bi-chat-square-text-fill me-2"></i>
                                            <h6 class="fw-bold mb-0">{{ $comment->user->name }}</h6>
                                            <small class="ms-2 small">
                                                {{ $comment->created_at->diffForHumans() }}
                                            </small>

                                        </div>
                                        <p class="mb-0">
                                            {{ $comment->content }}
                                        </p>

                                    </div>
                                </div>
                           

                            <div class="d-flex align-items-center ms-2 justify-content-">


                                @can('delete', $comment)
                                    <form action="{{ route('comment.destroy', $comment->id) }}" method="post"
                                        class="d-inline-block">
                                        @csrf
                                        @method('delete')
                                        <button class="badge bg-light-gray border-0">
                                            <i class="bi bi-trash3"></i>
                                            Delete
                                        </button>
                                    </form>
                                @endcan

                                @auth

                                    <span role="button" class="user-select-none ms-1 badge bg-light-gray"
                                        onclick="document.getElementById(`reply{{ json_encode($comment->id) }}`).classList.toggle('d-none');">
                                        <i class="bi bi-reply"></i>
                                        Reply
                                    </span>
                                @endauth
                            </div>
                         
                            </div>
                        </div>

              

                <div class="card mb-3 shadow border-0 p-1 d-none ms-4" id="reply{{ $comment->id }}">
                    @auth
                        <form action="{{ route('comment.store') }}" class="ms-4" method="post">
                            @csrf
                            <input type="hidden" name="parent_id" value="{{ $comment->id }}">
                            <input type="hidden" name="user_id" value="{{ Auth::id() }}">
                            <input type="hidden" name="article_id" value="{{ $article->id }}">
                            <textarea name="content" id="" cols="10" placeholder="Reply to {{ $comment->user->name }}`s comment..."
                                class="form-control mt-4" rows="2">
                      
                     </textarea>

                            <div class="d-flex justify-content-between align-items-end">
                                <p>Replying as {{ Auth::user()->name }}</p>
                                <button class="btn btn-sm btn-dark">Comment</button>
                            </div>
                        </form>

                    @endauth
                </div>
                @foreach ($comment->replies as $reply)
                   

                    <div class="d-flex align-items-start ms-5">
                        <img src="{{ asset('storage/img/profile/' . $reply->user->img) }}" style="width: 40px;height:40px; border-radius:50%;" alt="">
                     <div class="position-relative mb-3">
                            <div class="card shadow border-0 p-2 ms-2">
                                <div class="">
                                    <div class="d-flex justify-content-start align-items-center">

                                        <i class="bi bi-reply-fill me-2"></i>
                                        <h6 class="fw-bold mb-0">{{ $reply->user->name }}</h6>
                                        <small class="ms-2 small">
                                            {{ $reply->created_at->diffForHumans() }}
                                        </small>

                                    </div>
                                    <p class="mb-0">
                                        {{ $reply->content }}
                                    </p>

                                </div>
                            </div>
                       

                        <div class="d-flex align-items-center ms-2 justify-content-">


                            @can('delete', $reply)
                                <form action="{{ route('comment.destroy', $comment->id) }}" method="post"
                                    class="d-inline-block">
                                    @csrf
                                    @method('delete')
                                    <button class="badge bg-light-gray border-0">
                                        <i class="bi bi-trash3"></i>
                                        Delete
                                    </button>
                                </form>
                            @endcan

                        </div>
                     
                        </div>
                    </div>
                @endforeach
           
        @empty
            <div class="card mb-3">
                <div class="card-body text-center">
                    <p class="mb-0">
                        There is no comment yet.
                    </p>
                </div>
            </div>
            @endforelse



            @auth

                <form action="{{ route('comment.store') }}" method="post">
                    @csrf

                    <input type="hidden" name="user_id" value="{{ Auth::id() }}">
                    <input type="hidden" name="article_id" value="{{ $article->id }}">
                    <textarea name="content" id="" cols="10" class="form-control mt-4" rows="4"></textarea>

                    <div class="d-flex justify-content-between align-items-end mb-3">
                        <p>Commenting as {{ Auth::user()->name }}</p>
                        <button class="btn btn-sm btn-dark">Comment</button>
                    </div>
                </form>

            @endauth
        </div>  
    </div>
        </div>
    </div>

    </div>



@endsection
