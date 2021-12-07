@extends('layouts.app')

@section('content')
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
          Create a new account to browse and create pizzas
        </h4>
      </div>
      <form method="POST" action="{{ route('register') }}">
        @csrf
        <div class="rounded-md shadow-md">
        <div>
            <label for="email-input" class="sr-only">Name</label>
            <input
              type="text"
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
              required
              name="name"
              id="name-input"
              placeholder="User name"
            />
          </div>
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
              "
              required
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
              "
              required
              name="password"
              id="password-input"
              placeholder="Password"
            />
          </div>
          <div>
            <label for="password-input" class="sr-only">password confirm</label>
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
              required
              name="password_confirmation"
              id="password-confirm-input"
              placeholder="Confirm password"
            />
          </div>
        </div>
        @error('name')
            <span class="text-red-400 mt-4 font-thin block" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
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
            Register
          </button>
        </div>
      </form>
    </div>
  </div>
@endsection
