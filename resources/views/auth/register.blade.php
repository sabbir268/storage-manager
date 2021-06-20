@extends('layouts.app')

@push('styles')
<link rel="stylesheet" type="text/css" href="{{asset('theme/css/core/menu/menu-types/horizontal-menu.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('theme/css/css/plugins/forms/form-validation.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('theme/css/pages/page-auth.css')}}">
@section('content')
<!-- BEGIN: Content-->
<div class="app-content content">
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <div class="content-wrapper">
        <div class="content-header row"></div>
        <div class="content-body">
            <div class="auth-wrapper auth-v1 px-2">
                <div class="auth-inner py-2">
                    <!-- Login v1 -->
                    <div class="card mb-0">
                        <div class="card-body">
                            <a href="javascript:void(0);" class="brand-logo">
                                <h2 class="brand-text text-primary ml-1">File archiving System</h2>
                            </a>

                            <h4 class="card-title mb-1">Welcome to FAS! 👋</h4>
                            <p class="card-text mb-2">
                                Please create account to get access on file archive system
                            </p>

                            <form class="auth-login-form mt-2" action="{{url('register')}}" method="POST">
                                @csrf

                                <div class="form-group">
                                    <label for="name" class="form-label">Name</label>
                                    <input type="text" class="form-control" id="name" name="name" placeholder="Jhon Doe"
                                        value="{{old('name')}}" aria-describedby="name" tabindex="1" autofocus />

                                    @error('name')
                                    <span class="text-warning">{{$message}}</span>
                                    @enderror

                                </div>

                                <div class="form-group">
                                    <label for="login-email" class="form-label">Email</label>
                                    <input type="text" class="form-control" id="login-email" name="email"
                                        placeholder="john@example.com" value="{{old('email')}}"
                                        aria-describedby="login-email" tabindex="1" autofocus />

                                    @error('email')
                                    <span class="text-warning">{{$message}}</span>
                                    @enderror

                                </div>

                                <div class="form-group">
                                    <div class="d-flex justify-content-between">
                                        <label for="login-password">Password</label>
                                    </div>
                                    <div class="input-group input-group-merge form-password-toggle">
                                        <input type="password" class="form-control form-control-merge"
                                            id="login-password" name="password" tabindex="2"
                                            placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                                            aria-describedby="login-password" />
                                        <div class="input-group-append">
                                            <span class="input-group-text cursor-pointer"><i
                                                    data-feather="eye"></i></span>
                                        </div>

                                        @error('password')
                                        <span class="text-warning">{{$message}}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="d-flex justify-content-between">
                                        <label for="login-confirm-password">Confirm Password</label>
                                    </div>
                                    <div class="input-group input-group-merge form-password-toggle">
                                        <input type="password" class="form-control form-control-merge"
                                            id="login-confirm-password" name="password_confirmation" tabindex="2"
                                            placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                                            aria-describedby="login-password" />
                                        <div class="input-group-append">
                                            <span class="input-group-text cursor-pointer"><i
                                                    data-feather="eye"></i></span>
                                        </div>

                                        @error('password_confirmation')
                                        <span class="text-warning">{{$message}}</span>
                                        @enderror
                                    </div>
                                </div>

                                <button class="btn btn-primary btn-block" tabindex="4">
                                    Register
                                </button>
                            </form>

                            <p class="text-center mt-2">
                                <span>Already have an account?</span>
                                <a href="{{url('/')}}">
                                    <span>Login your account</span>
                                </a>
                            </p>

                            <div class="divider my-2">
                                <div class="divider-text">or</div>
                            </div>

                            <div class="auth-footer-btn d-flex justify-content-center">
                                <a href="{{route('google.auth')}}" class="btn btn-google btn-block">
                                    <i class="fab fa-google"></i> Sgin in with google
                                </a>
                            </div>
                        </div>
                    </div>
                    <!-- /Login v1 -->
                </div>
            </div>
        </div>
    </div>
</div>
<!-- END: Content-->
@endsection

@push('scripts')
<script src="{{asset('theme/js/scripts/pages/page-auth-login.js')}}"></script>
@endpush