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
            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif

            <p class="login-box-msg">
                {{ __('You forgot your password? Here you can easily retrieve a new password.') }}
            </p>

            <form method="POST" action="{{ route('admin.password.email') }}">
                @csrf

                <div class="input-group mb-3">
                    <input id="email" name="email" type="email" class="form-control" placeholder="Email">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-envelope"></span>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-12">
                        <button type="submit" class="btn btn-primary btn-block">
                            {{ __('Request new password') }}
                        </button>
                    </div>
                    <!-- /.col -->
                </div>
            </form>

            <p class="mt-3 mb-1">
                <a href="{{ route('admin.login') }}">
                    {{ __('Login') }}
                </a>
            </p>
        </div>
        <!-- /.login-card-body -->
    </div>
@endsection
