<nav class="flex justify-between items-center py-4 border-b border-white/10">
    <a href="/">Back</a>

    @auth
        <div class="space-x-6 font-bold flex flex-1 justify-end">
            <div class="space-x-6 font-bold">
                {{ $slot }}
            </div>
            <form action="/logout" method="POST">
                @csrf
                @method('DELETE')
                <button>Log Out</button>
            </form>
        </div>
    @endauth

    @guest
        <div class="flex flex-1 justify-end">
            <div class="space-x-6 font-bold">
                <a href="/register">Sign Up</a>
                <a href="/login">Log in</a>
            </div>
        </div>
    @endguest
</nav>
