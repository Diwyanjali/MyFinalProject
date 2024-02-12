@extends('layouts.master')

@section('title', 'Login')

@section('styles')
    <style>
        .authlogin-side-wrapper {
            width: 100%;
            height: 100%;
            background-image: url(/upload/login.png);
        }
    </style>
@endsection

@section('content')
    <div class="main-wrapper pb-5">
        <div class="page-wrapper full-page">
            <div class="page-content d-flex align-items-center justify-content-center">
                <div class="row w-100 mx-0 auth-page">
                    <div class="col-md-6 col-xl-6 mx-auto">
                        <div class="card">
                            <div class="card-body">

                                <div class="auth-form-wrapper px-4 py-5">
                                    <form class="forms-sample" method="post" action="{{ route('password.email') }}">
                                        @csrf
    
                                        <div class="row text-center">
                                            <a href="#" class="noble-ui-logo logo-light d-block mb-2">
                                                Arogya Hela <span>Management</span>
                                            </a>
    
                                            <h5 class="text-muted fw-normal mb-4">
                                                Forgot Password ?
                                            </h5>
                                        </div>
    
                                       
                                        <div class="row justify-content-center">
                                            <div class="col-md-8">
                                                <!--Email-->
                                                <div class="mb-3">
                                                    <label for="userEmail" class="form-label">
                                                        Email address <span class="text-danger">*</span>
                                                    </label>
                                                    <input type="email" class="form-control  @error('email') is-invalid @enderror "
                                                        id="email" placeholder="Email" name="email" value="{{ old('email') }}">
                                                    @error('email')
                                                        <span class="text-danger">{{ $message }} </span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
    
                                        <div class="row justify-content-center mt-2">
                                            <div class="col-8">
                                                <button type="submit" class="btn btn-outline-primary btn-icon-text mb-2 mb-md-0">
                                                    Email Password Reset Link
                                                </button>
                                            </div>
                                        </div>

                                        <div class="row text-center mt-2"> 
                                            <p class="d-block mt-3 text-muted">
                                                Already registered? <a href="{{ route('login') }}" >
                                                    Login
                                               </a>
                                            </p>            
                                        </div>

                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
