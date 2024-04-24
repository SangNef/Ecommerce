<link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
<header class="w-full text-white bg-gray-900 shadow-sm body-font sticky top-0">
    <div class="container flex flex-col items-center p-4 mx-auto md:flex-row">
        <a class="flex items-center text-3xl font-medium text-white title-font md:mb-0">
            E-commerce
        </a>
        <nav class="flex items-center justify-center text-base md:ml-auto">
            <a href="#_" class="mr-5 font-medium hover:text-blue-500 duration-150">Home</a>
            <a href="#_" class="mr-5 font-medium hover:text-blue-500 duration-150">About</a>
            <a href="#_" class="font-medium hover:text-blue-500 duration-150">Contact</a>
        </nav>
        <div class="items-center h-full pl-6 ml-6 border-l border-gray-200 relative">
            @if (Auth::user())
                <div class="relative">
                    <span class="font-medium hover:text-blue-500 duration-150 cursor-pointer" id="userDropdown">
                        {{ Auth::user()->name }}
                    </span>
                    <button class="relative" id="open-cart"><i class="fa-solid fa-cart-shopping"></i><span
                            class="absolute -top-2">0</span></button>
                    <div id="dropdownMenu" class="hidden absolute right-0 mt-2 w-48 bg-white rounded-md shadow-lg">
                        <a href="#_"
                            class="block px-4 py-2 text-sm font-medium text-gray-700 hover:bg-gray-100 duration-150">Profile</a>
                        <a href={{ route('logout') }}
                            class="block px-4 py-2 text-sm font-medium text-gray-700 hover:bg-gray-100 duration-150">Logout</a>
                    </div>
                </div>
            @else
                <a href="./login" class="mr-5 font-medium hover:text-blue-500 duration-150">Login</a>
                <a href="#_"
                    class="px-4 py-2 text-xs font-bold text-white uppercase transition-all duration-150 bg-blue-500 rounded shadow outline-none hover:bg-blue-600 hover:shadow-md focus:outline-none ease">
                    Sign Up
                </a>
            @endif
        </div>
    </div>
</header>
<div class="absolute h-screen w-96 bg-white z-10 top-0 p-4 duration-300 -right-96" id="cart">
    <div class="flex justify-between items-center">
        <p class="text-xl font-semibold">Shopping cart</p>
        <button id="close-cart">
            <i class="fa-solid fa-xmark"></i>
        </button>
    </div>
    <div>
        @if (session('cart'))
            @foreach ($cart as $item)
                <div class="flex items-center justify-between my-4">
                    <img src="{{ $item->product->images[0]->image_path }}" alt="{{ $item->product->name }}"
                        class="w-16 h-16 object-cover rounded">
                    <div class="flex flex-col items-start">
                        <p class="font-semibold">{{ $item->product->name }}</p>
                        <p class="text-sm">{{ number_format($item->product->price, 0, ',', '.') }} VNĐ</p>
                    </div>
                    <div class="flex items-center">
                        <button class="px-2 py-1 bg-red-500 text-white rounded">-</button>
                        <span class="px-2 py-1">{{ $item->quantity }}</span>
                        <button class="px-2 py-1 bg-green-500 text-white rounded">+</button>
                    </div>
                </div>
            @endforeach
        @endif
    </div>
</div>

<script>
    const dropdownMenu = document.getElementById('dropdownMenu');
    const userDropdown = document.getElementById('userDropdown');
    const openCartButton = document.getElementById('open-cart');
    const closeCartButton = document.getElementById('close-cart');
    const cart = document.getElementById('cart');
    let timeoutId;

    userDropdown.addEventListener('mouseover', () => {
        clearTimeout(timeoutId);
        dropdownMenu.classList.remove('hidden');
    });

    userDropdown.addEventListener('mouseout', () => {
        timeoutId = setTimeout(() => {
            dropdownMenu.classList.add('hidden');
        }, 100);
    });

    dropdownMenu.addEventListener('mouseover', () => {
        clearTimeout(timeoutId);
    });

    dropdownMenu.addEventListener('mouseout', () => {
        timeoutId = setTimeout(() => {
            dropdownMenu.classList.add('hidden');
        }, 100);
    });
    closeCartButton.addEventListener('click', () => {
        cart.classList.remove('right-0');
        cart.classList.add('-right-96');
    });
    openCartButton.addEventListener('click', () => {
        cart.classList.remove('-right-96');
        cart.classList.add('right-0');
    });
</script>
