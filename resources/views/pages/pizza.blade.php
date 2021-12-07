@extends('layouts.dashboard')

@section('content')
    <div class="flex flex-col w-full">
        <div class="w-full">
            <img src="" alt="">
        </div>
        <div class="w-full flex justify-center">
            <div class="w-3/4">
                <h2 class="text-center font-bold text-2xl text-gray-500 my-12">
                    @if (!isset($pizza))
                        Name your new pizza to start adding your own toppings
                    @else
                        Here's your pizza!
                    @endif
                </h2>
                <pizza-name pizza-name="{{ $pizza->name ?? '' }}" pizza-id="{{ $pizza->id ?? '' }}"></pizza-name>
                @if (isset($pizza->id))
                    <toppings-grid pizza-id="{{ $pizza->id }}" />
                @endif
            </div>
        </div>
    </div>
@endsection