@extends('admin.layout')
@section('admin')
    <section class="bg-gray-100 min-h-screen w-full pl-6 sm:pl-[88px] pr-6 overflow-hidden font-inter">
        <div class="h-4 flex items-center gap-1 my-2">
            <a href="/admin/dashboard" class="text-pink-400">
                <svg class="w-4 h-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V9z" />
                    <polyline points="9 22 9 12 15 12 15 22" />
                </svg>
            </a>
            <a href="/admin/product-manage" class="text-pink-600">/ Product manage</a>
            <p class="text-gray-400">/ Create product</p>
        </div>
        <h1 class="font-bold text-2xl leading-7 my-6">Create product</h1>
        @if (session('success'))
            <div class="bg-green-500 text-white p-4 mb-4 rounded">
                {{ session('success') }}
            </div>
        @endif
        @if ($errors->any())
            <div class="bg-red-500 text-white p-4 mb-4 rounded">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div class="w-full bg-white rounded-lg shadow my-4 p-6">
            <h3 class="text-base leading-6 uppercase text-gray-400">Product infomation</h3>
            <form action="{{ route('product.create') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="pt-4 pb-2 w-full max-w-md">
                    <label for="name" class="inline-block text-sm leading-5 font-medium text-gray-900 mb-1">Product
                        name</label><span class="text-red-500">*</span>
                    <input type="text" id="name" name="name"
                        class="w-full border border-gray-300 rounded-lg py-2 px-3 focus:outline-none text-gray-900">
                </div>
                <div class="pt-4 pb-2 w-full max-w-md">
                    <label for="price" class="inline-block text-sm leading-5 font-medium text-gray-900 mb-1">Product
                        price</label><span class="text-red-500">*</span>
                    <input type="number" id="price" name="price"
                        class="w-full border border-gray-300 rounded-lg py-2 px-3 focus:outline-none text-gray-900">
                </div>
                <div class="pt-4 pb-2 w-full max-w-md">
                    <label for="quantity" class="inline-block text-sm leading-5 font-medium text-gray-900 mb-1">Product
                        quantity</label><span class="text-red-500">*</span>
                    <input type="number" id="quantity" name="quantity"
                        class="w-full border border-gray-300 rounded-lg py-2 px-3 focus:outline-none text-gray-900">
                </div>
                <div class="pt-4 pb-2 w-full max-w-md">
                    <label for="brand" class="inline-block text-sm leading-5 font-medium text-gray-900 mb-1">Product
                        brand</label><span class="text-red-500">*</span>
                    <select name="brand" id="brand"
                        class="w-full border border-gray-300 rounded-lg py-2 px-3 focus:outline-none text-gray-900">
                        <option value="1">Apple</option>
                        <option value="2">Lenovo</option>
                        <option value="3">Acer</option>
                        <option value="4">Dell</option>
                        <option value="5">Hp</option>
                        <option value="6">Asus</option>
                        <option value="7">MSI</option>
                    </select>
                </div>

                <div class="pt-4 pb-2 w-full max-w-md" id="image-zone">
                    <div class="w-full flex justify-between items-center mb-2">
                        <label class="inline-block text-sm leading-5 font-medium text-gray-900 mb-1">Product
                            image<span class="text-red-500">*</span> </label>
                        <div id="add-input"
                            class="cursor-pointer py-1 px-2 text-sm rounded-lg bg-pink-400 hover:bg-pink-500 text-white duration-300">
                            Add image</div>
                    </div>
                    <input type="file" name="image1" accept="image/*" class="w-full text-gray-900">
                </div>

                <button type="submit"
                    class="py-2 px-4 mt-2 rounded-lg bg-pink-400 hover:bg-pink-500 text-white duration-300">Send</button>
            </form>
        </div>
    </section>
    <script>
        let i = 2;
        document.getElementById('add-input').addEventListener('click', function() {
            let imageZone = document.getElementById('image-zone');
            let input = document.createElement('input');
            input.type = 'file';
            input.name = 'image' + i++;
            input.accept = 'image/*';
            input.className = 'w-full text-gray-900 mt-2';
            imageZone.appendChild(input);
        });
    </script>
@endsection
