@extends('user.layout')
@section('content')
<div class="w-full p-20 bg-gray-900 flex">
    <div class="container flex mx-auto justify-between items-center">
        <div class="w-1/2">
            <h1 class="text-5xl text-white font-bold">Welcome to E-commerce</h1>
            <p class="text-white text-lg mt-4">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
        </div>
        <img src="{{ asset('images/mac.png') }}" alt="">
    </div>
</div>
@endsection