@extends('admin.layouts.auth-app')

@section('content')
    <div class="login-logo">
        <a>
            <b>{{ __('MyBlog') }}</b>{{ __('Admin') }}
        </a>
    </div>
    <!-- /.login-logo -->
    <div class="card">
        <div class="card-body login-card-body">
            <p class="login-box-msg">
                {{ trans('Sign in to start your session') }}
            </p>

            <form method="POST" action="{{ route('admin.login') }}">
                @csrf

                <div class="input-group mb-3">
                    <input id="username" name="username" type="text" class="form-control @error('username') is-invalid @enderror" placeholder="Username" required autofocus>
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-user"></span>
                        </div>
                    </div>

                    @error('username')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <div class="input-group mb-3">
                    <input id="password" name="password" type="password" class="form-control @error('password') is-invalid @enderror" placeholder="Password" required>
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-lock"></span>
                        </div>
                    </div>

                    @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <div class="row">
                    <div class="col-8">
                        <div class="icheck-primary">
                            <input type="checkbox" id="remember">
                            <label for="remember">
                                {{ trans('auth.remember_me') }}
                            </label>
                        </div>
                    </div>

                    <!-- /.col -->
                    <div class="col-4">
                        <button type="submit" class="btn btn-primary btn-block">
                            {{ trans('auth.sign_in') }}
                        </button>
                    </div>
                    <!-- /.col -->
                </div>
            </form>

            <p class="mb-1">
                <a href={{ route('admin.password.request') }}>
                    {{ trans('auth.forgot_password') }}
                </a>
            </p>
        </div>
        <!-- /.login-card-body -->
    </div>
@endsection
