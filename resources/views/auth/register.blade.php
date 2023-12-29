@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-12 col-md-6">
            <div class="card mb-3 shadow border-0">
                
               <div class="card-body">
                <h4 class=" fw-semibold mb-3 text-center"><span class="fw-light">Register to </span><i class="bi bi-lightning-charge-fill"></i>Flash <span class="text-light-gray">News</span></h4>
                <div class="d-flex justify-content-center align-items-center">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group mb-3 ">
                            <label for="name" class="">{{ __('Name') }}</label>

                            
                                <input id="name" type="text" class=" mt-2 form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                           
                        </div>

                        <div class="form-group mb-3">
                            <label for="email" class="">{{ __('Email Address') }}</label>

                            
                                <input id="email" type="email" class=" mt-2 form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            
                        </div>

                        <div class="form-group mb-3">
                            <label for="password" class="">{{ __('Password') }}</label>

                            
                                <input id="password" type="password" class=" mt-2 form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                           
                        </div>

                        <div class="form-group mb-3">
                            <label for="password-confirm" class="">{{ __('Confirm Password') }}</label>

                            
                                <input id="password-confirm" type="password" class=" mt-2 form-control" name="password_confirmation" required autocomplete="new-password">
                            
                        </div>

                       
                           
                                <button type="submit" class="btn mb-3 mt-2 btn-dark w-100">
                                    <i class="bi bi-door-open"></i>     {{ __('Register') }}
                                </button>
                           
                        
                    </form>
                </div>
               </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
