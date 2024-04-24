@extends('user.layout')

@section('content')
    <div class="max-w-7xl mx-auto mt-8">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <div class="flex flex-col justify-center">
                <img id="mainImage" src="{{ $product->images[0]->image_path }}" alt="{{ $product->name }}"
                    class="w-full h-96 object-cover">
                <div class="flex w-[120px] overflow-auto gap-3 mt-3">
                    @foreach ($product->images as $item)
                        <img src="{{ $item->image_path }}" alt="{{ $product->name }}" class="w-24 h-24 object-cover"
                            onclick="changeImage('{{ $item->image_path }}')">
                    @endforeach
                </div>
            </div>
            <div>
                <h3 class="font-semibold text-3xl">{{ $product->name }}</h3>
                <p class="py-3 text-xl">{{ number_format($product->price, 0, ',', '.') }} VNĐ</p>
                <div class="flex gap-3">
                    <label for="">Quantity: </label>
                    <button class="px-2 rounded-full bg-gray-200" onclick="decreaseValue()">-</button>
                    <input id="quantityInput" type="number" class="rounded border border-gray-200 px-3 w-12"
                        value="1">
                    <button class="px-2 rounded-full bg-gray-200" onclick="increaseValue()">+</button>
                </div>
                <div class="flex gap-3 mt-2 py-3">
                    <button class="px-4 py-2 text-xs transition-all duration-150 rounded shadow ease border border-blue-500 hover:text-blue-500">Add to cart <i class="fa-solid fa-cart-shopping"></i></button>
                    <button class="px-4 py-2 text-xs font-bold text-white transition-all duration-150 bg-blue-500 rounded shadow outline-none hover:bg-blue-600 hover:shadow-md focus:outline-none ease">Buy now</button>
                </div>
            </div>
        </div>
        <div class="mt-4">
            <h3 class="font-semibold text-3xl py-2">Orther products</h3>
            <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
                {{-- @dd($products) --}}
                @foreach ($recomment as $product)
                    <a href="{{ route('product.detail', ['id'=> $product->id]) }}" class="bg-white shadow-md rounded-lg max-w-sm dark:bg-gray-800 dark:border-gray-700">
                        <img class="h-56 w-full object-cover rounded-t-lg" loading="lazy"
                            src="{{ $product->images[0]->image_path }}" alt="{{ $product->name }}">
                        <div class="px-5 pb-5">
                            <h3 class="py-3 font-semibold">{{ $product->name }}</h3>
                            <div class="flex items-center mt-2.5 mb-5">
                                <svg class="w-5 h-5 text-yellow-300" fill="currentColor" viewBox="0 0 20 20"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z">
                                    </path>
                                </svg>
                                <svg class="w-5 h-5 text-yellow-300" fill="currentColor" viewBox="0 0 20 20"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z">
                                    </path>
                                </svg>
                                <svg class="w-5 h-5 text-yellow-300" fill="currentColor" viewBox="0 0 20 20"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z">
                                    </path>
                                </svg>
                                <svg class="w-5 h-5 text-yellow-300" fill="currentColor" viewBox="0 0 20 20"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z">
                                    </path>
                                </svg>
                                <svg class="w-5 h-5 text-yellow-300" fill="currentColor" viewBox="0 0 20 20"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z">
                                    </path>
                                </svg>
                                <span
                                    class="bg-blue-100 text-blue-800 text-xs font-semibold mr-2 px-2.5 py-0.5 rounded dark:bg-blue-200 dark:text-blue-800 ml-3">5.0</span>
                            </div>
                            <p class="">{{ number_format($product->price, 0, ',', '.') }} VNĐ</p>
                            <div class="flex justify-between mt-2">
                                <button class="px-4 py-2 text-xs transition-all duration-150 rounded shadow ease border border-blue-500 hover:text-blue-500">Add to cart <i class="fa-solid fa-cart-shopping"></i></button>
                                <button class="px-4 py-2 text-xs font-bold text-white transition-all duration-150 bg-blue-500 rounded shadow outline-none hover:bg-blue-600 hover:shadow-md focus:outline-none ease">Buy now</button>
                            </div>
                        </div>
                    </a>
                @endforeach
            </div>
        </div>
    </div>

    <script>
        function changeImage(newSrc) {
            document.getElementById('mainImage').src = newSrc;
        }

        function increaseValue() {
            let input = document.getElementById('quantityInput');
            let value = parseInt(input.value, 10);
            input.value = isNaN(value) ? 1 : value + 1;
        }

        function decreaseValue() {
            let input = document.getElementById('quantityInput');
            let value = parseInt(input.value, 10);
            input.value = isNaN(value) ? 1 : value - 1;
            if (input.value < 1) {
                input.value = 1;
            }
        }
    </script>
@endsection
