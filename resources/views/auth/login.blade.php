@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-12 col-md-6">
            <div class="card card p-3 mb-3 shadow border-0">
                
                <h4 class=" fw-semibold mb-3 text-center"><span class="fw-light">Login to </span><i class="bi bi-lightning-charge-fill"></i>Flash <span class="text-light-gray">News</span></h4>

              
                    <div class="d-flex justify-content-center align-items-center">
                        <form method="POST" action="{{ route('login') }}">
                            @csrf
    
                            <div class="form-group mb-4">
                                <label for="email">Email</label>
    
                            
                                    <input id="email" type="email" class="mt-2 form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
    
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                
                            </div>
    
                            <div class="form-group mb-4">
                                <label for="password">Password</label>
    
                                
                                    <input id="password" type="password" class="mt-2 form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
    
                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                               
                            </div>
    
                            {{-- <div class="row mb-3">
                                <div class="col-md-6 offset-md-4">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
    
                                        <label class="form-check-label" for="remember">
                                            {{ __('Remember Me') }}
                                        </label>
                                    </div>
                                </div>
                            </div> --}}
    
                            {{-- <div class="row mb-0">
                                <div class="col-md-8 offset-md-4"> --}}
                                    <button type="submit" class="btn btn-dark mb-3 mt-3 btn-block w-100">
                                        <i class="bi bi-door-open"></i>   Login
                                    </button>
    
                                    {{-- @if (Route::has('password.request'))
                                        <a class="btn btn-link" href="{{ route('password.request') }}">
                                            {{ __('Forgot Your Password?') }}
                                        </a>
                                    @endif --}}
                                </div>
                            </div>
                        </form>
                    </div>
                
            </div>
        </div>
    </div>
</div>
@endsection
