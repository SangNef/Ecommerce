<link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
<header class="w-full text-white bg-gray-900 shadow-sm body-font">
    <div class="container flex flex-col items-center p-4 mx-auto md:flex-row">
        <a class="flex items-center text-3xl font-medium text-white title-font md:mb-0">
            E-commerce
        </a>
        <nav class="flex items-center justify-center text-base md:ml-auto">
            <a href="#_" class="mr-5 font-medium hover:text-gray-900">Home</a>
            <a href="#_" class="mr-5 font-medium hover:text-gray-900">About</a>
            <a href="#_" class="font-medium hover:text-gray-900">Contact</a>
        </nav>
        <div class="items-center h-full pl-6 ml-6 border-l border-gray-200 relative">
            @if (Auth::user())
                <div class="relative">
                    <span class="font-medium hover:text-gray-900 cursor-pointer" id="userDropdown">
                        {{ Auth::user()->name }}
                    </span>
                    <div id="dropdownMenu" class="hidden absolute right-0 mt-2 w-48 bg-white rounded-md shadow-lg">
                        <a href="#_" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Profile</a>
                        <a href={{ route('logout') }} class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Logout</a>
                    </div>
                </div>
            @else
                <a href="#_" class="mr-5 font-medium hover:text-gray-900">Login</a>
                <a href="#_"
                    class="px-4 py-2 text-xs font-bold text-white uppercase transition-all duration-150 bg-blue-500 rounded shadow outline-none hover:bg-blue-600 hover:shadow-md focus:outline-none ease">
                    Sign Up
                </a>
            @endif
        </div>
    </div>
</header>

<script>
    const dropdownMenu = document.getElementById('dropdownMenu');
    const userDropdown = document.getElementById('userDropdown');
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
</script>
