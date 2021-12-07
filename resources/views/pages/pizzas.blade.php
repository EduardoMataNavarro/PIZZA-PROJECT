@extends('layouts.dashboard')

@section('content')
    @if (count($pizzas) > 0)
    <h2 class="font-bold text-xl text-gray-600 mb-2">You're now browsing your pizzas</h2>
    @else
    <h2 class="font-bold text-xl text-gray-600 mb-2">You have no pizzas, lets create a new one!</h2>
    @endif
    <div class="grid gap-12 grid-cols-4 mt-4">
    @foreach ($pizzas as $pizza)
        <div class="shadow-md rounded-lg w-full h-52  p-8 bg-gray-50">
            <h6 class="text-center font-bold"><a href="/pizza/{{$pizza->id}}" class="hover:underline">{{$pizza->name}}</a></h6>
            @foreach ($pizza->toppings as $topping)
                <p>- {{$topping->name}}</p>
            @endforeach
        </div>
    @endforeach
    </div>

@endsection