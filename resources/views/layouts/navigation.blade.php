
<header class=" inset-x-0 top-0 z-50">
    <nav class="flex items-center justify-between p-6 lg:px-8" aria-label="Global">

        <div class="flex lg:flex-1">
            <a href="#" class="-m-1.5 p-1.5">
                <img src="{{ asset('assets/images/brand/logo-3.png') }}" class="h-8 w-auto" alt="logo">
            </a>
        </div>

        <form action="{{ route('logout') }}" method="post" class="flex lg:hidden">
            @csrf
            <button type="submit" class="text-sm font-semibold leading-6 text-gray-900">Logout
                <span aria-hidden="true">&rarr;</span>
            </button>
        </form>

        <form action="{{ route('logout') }}" method="post" class="hidden lg:flex lg:flex-1 lg:justify-end">
            @csrf
            <button type="submit" class="text-sm font-semibold leading-6 text-gray-900">Logout
                <span aria-hidden="true">&rarr;</span>
            </button>
        </form>
    </nav>
</header>