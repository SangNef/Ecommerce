@extends('admin.layout')
@section('admin')
    <section class="bg-gray-200 min-h-screen w-full pl-6 sm:pl-[88px] pr-6 overflow-hidden font-inter">
        <div class="h-4 flex items-center gap-1 my-2">
            <a href="/admin/dashboard" class="text-pink-400">
                <svg class="w-4 h-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V9z" />
                    <polyline points="9 22 9 12 15 12 15 22" />
                </svg>
            </a>
            <p class="text-gray-400 mt-3">/ Product manage</p>
        </div>
        <div class="relative flex items-center justify-between w-full">
            <h1 class="font-bold text-2xl leading-7 my-6">Product manage</h1>

            <a href="./product/create"
                class="bg-pink-500 hover:bg-pink-600 duration-150 text-white py-2 px-4 rounded no-underline">Add
                products</a>

        </div>
        @if (session('success'))
            <div class="bg-green-400 border border-green-800 text-white px-4 py-2 mb-4 rounded">
                {{ session('success') }}
            </div>
        @endif
        @if (session('error'))
            <div class="bg-red-500 text-white p-4 mb-4 rounded">
                {{ session('error') }}
            </div>
        @endif
        <div class="w-full bg-white rounded-lg shadow my-4 p-6">
            <h2 class="text-xl leading-7 font-bold">Products list</h2>
            <table class="w-full border-gray-300">
                <thead>
                    <tr class="bg-gray-200 text-xs leading-4 font-medium tracking-wider uppercase text-gray-500">
                        <th class="p-2 border-b text-start max-sm:hidden">STT</th>
                        <th class="p-2 border-b text-start">Name</th>
                        <th class="p-2 border-b text-start">Brand</th>
                        <th class="p-2 border-b text-start">Price</th>
                        <th class="p-2 border-b text-start">QTY</th>
                        <th class="p-2 border-b text-start max-sm:hidden">Created at</th>
                        <th class="p-2 border-b text-start"></th>
                    </tr>
                </thead>
                <tbody>
                    @if (count($products) > 0)
                        @php
                            $stt = 1;
                        @endphp
                        @foreach ($products as $product)
                            <tr
                                class="hover:bg-gray-100 even:bg-gray-200 duration-150 text-sm leading-5 font-normal text-gray-500">
                                <td class="p-2 border-b max-sm:hidden">{{ $stt }}</td>
                                <td class="p-2 border-b">{{ $product->name }}</td>
                                <td class="p-2 border-b">{{ $product->brand->name }}</td>
                                <td class="p-2 border-b">{{ number_format($product->price, 0, ',', '.') }} VNĐ</td>
                                <td class="p-2 border-b">{{ $product->quantity }}</td>
                                <td class="p-2 border-b max-sm:hidden">
                                    {{ $product->created_at }}
                                </td>
                                <td class="p-2 border-b">
                                    <button type="button" class="text-red-500 ml-2 deleteButton"
                                        data="{{ $product->name }}"><i
                                            class="fa-regular fa-trash-can"></i></button>
                                </td>
                            </tr>
                            @php
                                $stt++;
                            @endphp
                        @endforeach
                    @else
                        <tr>
                            <td colspan="6" class="text-center text-sm leading-5 font-normal text-gray-500 pt-2">No data
                            </td>
                        </tr>
                    @endif
                </tbody>
            </table>
            <nav class="mt-4">
                <ul class="pagination justify-content-center">
                    {{ $products->onEachSide(2)->appends(Request::query())->links('pagination::bootstrap-4') }}
                </ul>
            </nav>
        </div>
    </section>
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.7.3/dist/alpine.min.js" defer></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Add this in your HTML file -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!-- Add this script at the end of your view or in your layout file -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var deleteButtons = document.querySelectorAll('.deleteButton');

            deleteButtons.forEach(function(button) {
                button.addEventListener('click', function() {
                    var data = button.getAttribute('data');

                    Swal.fire({
                        title: 'Are you sure?',
                        text: 'Do you want to delete ' + data + '?',
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#d33',
                        cancelButtonColor: '#3085d6',
                        confirmButtonText: 'Yes, delete it!'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            var formId = button.parentElement.id;
                            document.getElementById(formId).submit();
                        }
                    });
                });
            });
        });
    </script>
@endsection
