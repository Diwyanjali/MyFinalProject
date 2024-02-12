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
                                    <form method="POST" action="{{ route('password.store') }}">
                                        @csrf

                                        <!-- Password Reset Token -->
                                        <input type="hidden" name="token" value="{{ $request->route('token') }}">

                                        <div class="row justify-content-center">
                                            <!--Email-->
                                            <div class="col-md-8">
                                                <div class="mb-3">
                                                    <label for="userEmail" class="form-label">
                                                        Email address <span class="text-danger">*</span>
                                                    </label>
                                                    <input type="email"
                                                        class="form-control  @error('email') is-invalid @enderror "
                                                        id="email" placeholder="Email" name="email"
                                                        value="{{ old('email', $request->email) }}">
                                                    @error('email')
                                                        <span class="text-danger">{{ $message }} </span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <!--password-->
                                            <div class="col-md-8">
                                                <div class="mb-3">
                                                    <label for="userEmail" class="form-label">
                                                        Password <span class="text-danger">*</span>
                                                    </label>
                                                    <input type="password"
                                                        class="form-control  @error('password') is-invalid @enderror "
                                                        id="password" placeholder="Password" name="password">
                                                    @error('password')
                                                        <span class="text-danger">{{ $message }} </span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <!--confirm password-->
                                            <div class="col-md-8">
                                                <div class="mb-3">
                                                    <label for="userEmail" class="form-label">
                                                        Confirm Password <span class="text-danger">*</span>
                                                    </label>
                                                    <input type="password"
                                                        class="form-control  @error('password_confirmation') is-invalid @enderror "
                                                        id="password_confirmation" placeholder="Confirm Password"
                                                        name="password_confirmation">
                                                    @error('password_confirmation')
                                                        <span class="text-danger">{{ $message }} </span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row justify-content-center mt-2">
                                            <div class="col-8">
                                                <button type="submit"
                                                    class="btn btn-outline-primary btn-icon-text mb-2 mb-md-0">
                                                    Reset Password
                                                </button>
                                            </div>
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
