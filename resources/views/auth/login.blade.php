@extends('layouts.app')

@section('content')
<!-- <Login /> -->
<div class="min-h-full flex items-center justify-center py-12">
    <div class="max-w-md w-full">
      <div>
        <img
          class="mx-auto h-60 w-auto"
          src="https://pizza-project.s3.us-west-1.amazonaws.com/assets/pizza-icon.png"
          alt=""
          srcset=""
        />
        <h4 class="mt-2 mb-4 text-center text-lg text-gray-700">
          Log into your account to browse and create pizzas
        </h4>
      </div>
      <form method="POST" action="{{ route('login') }}">
        @csrf
        <div class="rounded-md shadow-md">
          <div>
            <label for="email-input" class="sr-only">Email</label>
            <input
              type="email"
              class="
                appearance-none
                rounded-none
                shadow-none
                outline-none
                focus:border-yellow-500
                relative
                block
                w-full
                px-4
                py-2
                border
                rounded-t-md
              "
              name="email"
              id="email-input"
              placeholder="User email"
            />
          </div>
          <div>
            <label for="password-input" class="sr-only">password</label>
            <input
              type="password"
              class="
                appearance-none
                rounded-none
                outline-none
                focus:border-yellow-500
                relative
                block
                shadow
                w-full
                px-4
                py-2
                border
                rounded-b-md
              "
              name="password"
              id="password-input"
              placeholder="Password"
            />
          </div>
        </div>
        @error('email')
            <span class="text-red-400 mt-4 font-thin block" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
        @error('password')
            <span class="text-red-400 mt-4 font-thin block" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
        <div>
          <button
            type="submit"
            class="
              bg-yellow-400
              transition-all
              hover:bg-yellow-600
              text-white
              shadow-md
              mt-8
              p-2
              w-full
              flex
              justify-center
              rounded
            "
          >
            Log in
          </button>
          <span class="block my-2"><a class="decoration-none  hover:underline text-yellow-600" href="{{ route('register') }}">Not a member yet? Create an account...</a> </span>
        </div>
      </form>
    </div>
  </div>
<!-- <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Login') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div> -->
@endsection
