
<nav class="border-b shadow-md">
    <div class="container mx-auto px-4 py-4 flex justify-between items-center">
        <div class="brand">
            <span class="text-xl font-bold text-blue-500">Brand</span>
        </div>
        <ul class="flex gap-4">
            <li><a href="{{route('dashboard')}}" class="hover:text-blue-500 transition active:text-blue-500">Home</a></li>
            @if (auth()->check() && auth()->user()->role === 'admin')
                <li><a href="{{route('admin.dashboard')}}" class="hover:text-blue-500 transition active:text-blue-500">Dashboard</a></li>
                <li><a href="{{route('admin.produk')}}" class="hover:text-blue-500 transition active:text-blue-500">Produk</a></li>
            @endif
        </ul>
        <div>
            @if (Route::has('login'))
                <nav class="-mx-3 flex gap-2">
                    @auth
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <a href="{{route('logout')}}" onclick="event.preventDefault();
                                this.closest('form').submit();"
                                class="bg-blue-500 px-2 py-1 rounded-lg text-white">Log Out</a>

                        </form>
                    @else
                        <a
                            href="{{ route('login') }}"
                            class="bg-blue-500 px-2 py-1 rounded-lg text-white"
                        >
                            Log in
                        </a>

                        @if (Route::has('register'))
                            <a
                                href="{{ route('register') }}"
                                class="bg-blue-500 px-2 py-1 rounded-lg text-white"   >
                                Register
                            </a>
                        @endif
                    @endauth
                </nav>
            @endif
        </div>
    </div>
</nav>