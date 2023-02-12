@extends('layouts.app')

@section('content')
    <div class="container-fluid" id="register">

        <div class="card">
            <div class="card-header">Hello Cooking {{ __('Register') }}</div>

            <div class="card-body">
                <form method="POST" action="{{ route('register') }}">
                    @csrf

                    <div class="row mb-3 m-0 p-0">
                        <label for="name" class="form-label p-0">{{ __('Name') }}</label>

                        <div class="p-0">
                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror"
                                name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-3 m-0 p-0">
                        <label for="email" class="form-label p-0">{{ __('Email Address') }}</label>

                        <div class="p-0">
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                name="email" value="{{ old('email') }}" required autocomplete="email">

                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-3 m-0 p-0">
                        <label for="password" class="form-label p-0">{{ __('Password') }}</label>

                        <div class="p-0">
                            <input id="password" type="password"
                                class="form-control @error('password') is-invalid @enderror" name="password" required
                                autocomplete="new-password">

                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-3 m-0 p-0">
                        <label for="password-confirm" class="form-label p-0">{{ __('Confirm Password') }}</label>

                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation"
                            required autocomplete="new-password">
                    </div>

                    <div class="row mb-0 m-0 p-0">
                        <button type="submit" class="btn btn-primary w-100">
                            {{ __('Register') }}
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
