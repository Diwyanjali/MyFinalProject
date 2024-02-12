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
                    <div class="col-md-8 col-xl-6 mx-auto">
                        <div class="card">
                            <div class="row">
                                <div class="col-md-4 pe-md-0">
                                    <div class="authlogin-side-wrapper">

                                    </div>
                                </div>
                                <div class="col-md-8 ps-md-0">
                                    <div class="auth-form-wrapper px-4 py-5">
                                        <a href="#" class="noble-ui-logo logo-light d-block mb-2">
                                            Arogya Hela <span>Management</span>
                                        </a>

                                        <h5 class="text-muted fw-normal mb-4">
                                            Welcome back! Log in to your account.
                                        </h5>

                                        <form class="forms-sample" method="post" action="{{ route('login') }}">
                                            @csrf

                                            <!--email-->
                                            <div class="mb-3">
                                                <label for="userEmail" class="form-label">
                                                    Email address <span class="text-danger">*</span>
                                                </label>
                                                <input type="email"
                                                    class="form-control  @error('email') is-invalid @enderror "
                                                    id="email" placeholder="Email" name="email">
                                                @error('email')
                                                    <span class="text-danger">{{ $message }} </span>
                                                @enderror
                                            </div>

                                            <!--password-->
                                            <div class="mb-3">
                                                <label for="userPassword" class="form-label">
                                                    Password <span class="text-danger">*</span>
                                                </label>
                                                <input type="password"
                                                    class="form-control  @error('password') is-invalid @enderror"
                                                    id="password" autocomplete="current-password" placeholder="Password"
                                                    name="password">
                                                @error('password')
                                                    <span class="text-danger">{{ $message }} </span>
                                                @enderror
                                            </div>

                                            <!--remember me-->
                                            <div class="form-check mb-3">
                                                <input type="checkbox" class="form-check-input" id="authCheck">
                                                <label class="form-check-label" for="authCheck">
                                                    Remember me
                                                </label>
                                            </div>


                                            <div>
                                                <button type="submit"
                                                    class="btn btn-outline-primary btn-icon-text mb-2 mb-md-0">
                                                    Log In
                                                </button>
                                            </div>


                                            <p class="d-block mt-3">
                                                Not a user? <a href="{{ route('register') }}">
                                                    Sign up
                                                </a>
                                            </p>

                                            <p class="mt-3">
                                                Forgot Your Password? <a href="{{ route('password.request') }}">Reset
                                                    here</a>
                                            </p>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
