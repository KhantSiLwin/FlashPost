@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-md-6 ">
                <div class="card mb-3 shadow border-0 p-4">
                
                  <div class="row align-items-center justify-content-center">
                    <div class="col-12 ">
                        {{-- <div class="">
                        <label for="title">Edit Profile</label>
                         <button class="btn ml-2 b-50 btn-tran btn-sm" onclick="goBack()"><i class="feather-arrow-left"></i></button>
                         <button class="btn ml-2 b-50 btn-tran btn-sm" onclick="goForward()"><i class="feather-arrow-right"></i></button>
                     </div> --}}
                        <div class="text-center">
                            <img src="{{ asset('storage/img/profile/' . Auth::user()->img) }}"
                                style=" width:100px;
                        height:94px;
                        border-radius:50%;" id="blah"
                                alt="" class="shadow">
                            <div> <label for="photo" class="mt-3 btn btn-dark round hidden-upload ">Choose A Photo</label> </div>
                            @error('photo')
                                <small class="alert text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
        
                    <div class="col-12 d-flex justify-content-center my-4 align-items-center">
                        <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <input type="file" name="photo" class="form-control p-1" id="photo"
                                    onchange="document.getElementById('blah').src = window.URL.createObjectURL(this.files[0])"
                                    hidden>
                            </div>
        
                            <div class="form-group mb-3">
                                <label for="name">Name</label>
                                <input type="text" name="name" id="name"
                                    value="{{ Auth::user()->name }}{{ old('name') }}"
                                    class="form-control  @error('name') is-invalid @enderror" required>
                                @error('name')
                                    <small class="font-weight-bold text-danger">{{ $message }}</small>
                                @enderror
                            </div>
        
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="text" name="email" id="email"
                                    value="{{ Auth::user()->email }}{{ old('email') }}"
                                    class="form-control  @error('email') is-invalid @enderror" required>
                                @error('email')
                                    <small class="font-weight-bold text-danger">{{ $message }}</small>
                                @enderror
                            </div>
        
                            <button class="btn btn-dark btn-block mt-4 w-100 mt-3">Update Profile</button>
                        </form>
        
                    </div>
                  </div>

                </div>
            </div>
        </div>
    </div>
@endsection
