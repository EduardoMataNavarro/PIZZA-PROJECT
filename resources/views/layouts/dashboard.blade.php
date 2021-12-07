<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app" class="w-screen flex flex-row">
        <div class="min-h-screen flex flex-row bg-gray-100">
            <div class="flex flex-col w-60 bg-yellow-500 overflow-hidden shadow-inner-lg">
                <div class="w-full">
                    <img src="https://pizza-project.s3.us-west-1.amazonaws.com/assets/pizza-icon.png"
                    class="w-24 h-auto mx-auto mb-1"
                    alt="pizza icon" />
                    <h4 class="text-center text-white font-normal text-xl mb-2">Welcome {{ Auth()->user()->name }}!</h4>
                </div>
                <ul class="flex flex-col py-4">
                    <li class="border-t">
                        <a href="{{ route('create_pizza') }}" class="flex flex-row items-center h-12 transition-all hover:bg-yellow-700 transition-transform ease-in duration-200 text-gray-500 hover:text-gray-800">
                        <span class="inline-flex items-center justify-center h-12 w-12 text-lg text-gray-400"><i class="bx bx-home"></i></span>
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-white mx-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                        </svg>
                        <span class="font-normal text-white">Create pizza</span>
                        </a>
                    </li>
                    <li class="border-t">
                        <a href="{{ route('my_pizzas') }}" class="flex flex-row items-center h-12 transition-all hover:bg-yellow-700 transition-transform ease-in duration-200 text-gray-500 hover:text-gray-800">
                        <span class="inline-flex items-center justify-center h-12 w-12 text-lg text-gray-400"><i class="bx bx-home"></i></span>
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-white mx-2" viewBox="0 0 20 20" fill="currentColor">
                            <path d="M5 3a2 2 0 00-2 2v2a2 2 0 002 2h2a2 2 0 002-2V5a2 2 0 00-2-2H5zM5 11a2 2 0 00-2 2v2a2 2 0 002 2h2a2 2 0 002-2v-2a2 2 0 00-2-2H5zM11 5a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V5zM11 13a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z" />
                        </svg>
                        <span class="font-normal text-white">My pizzas</span>
                        </a>
                    </li>
                    @if (Auth::user()->role_id == 1)
                    <li class="border-t">
                        <a href="/topping/create" class="flex flex-row items-center h-12 transform hover:bg-yellow-700 transition-transform ease-in duration-200 text-gray-500 hover:text-gray-800">
                        <span class="inline-flex items-center justify-center h-12 w-12 text-lg text-gray-400"><i class="bx bx-music"></i></span>
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-white mx-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 15.546c-.523 0-1.046.151-1.5.454a2.704 2.704 0 01-3 0 2.704 2.704 0 00-3 0 2.704 2.704 0 01-3 0 2.704 2.704 0 00-3 0 2.704 2.704 0 01-3 0 2.701 2.701 0 00-1.5-.454M9 6v2m3-2v2m3-2v2M9 3h.01M12 3h.01M15 3h.01M21 21v-7a2 2 0 00-2-2H5a2 2 0 00-2 2v7h18zm-3-9v-2a2 2 0 00-2-2H8a2 2 0 00-2 2v2h12z" />
                        </svg>
                        <span class="font-normal text-white">Toppings</span>
                        </a>
                    </li>
                    @endif
                    <li class="border-t">
                        <a href="/logout" class="flex flex-row items-center h-12 transform hover:bg-yellow-700 transition-transform ease-in duration-200 text-gray-500 hover:text-gray-800">
                        <span class="inline-flex items-center justify-center h-12 w-12 text-lg text-gray-400"><i class="bx bx-music"></i></span>
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-white mx-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7a4 4 0 11-8 0 4 4 0 018 0zM9 14a6 6 0 00-6 6v1h12v-1a6 6 0 00-6-6zM21 12h-6" />
                        </svg>
                        <span class="font-normal text-white">Log out</span>
                        </a>
                    </li>
                </ul>
            
            </div>
        </div>
            <main class="min-h-screen bg-gray-100 p-8 w-full overflow-y-auto">
                @yield('content')
            </main>
        </div>
    </div>
</body>
</html>
