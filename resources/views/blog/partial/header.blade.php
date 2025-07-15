<div class="navbar bg-base-100 shadow-sm px-10">
    <div class="navbar-start flex items-center">
        <a href="{{ route('home') }}" class="btn btn-ghost text-xl">
            <x-fas-pen-nib class="w-6 h-6 mr-1"/>Inklit
        </a>
    </div>
    <div class="navbar-end flex gap-2">
        @if(!auth()->user())
            <a href="{{ route('login') }}" class="btn btn-primary bg-amber-700 border-0 shadow-2xl">Login</a>
        @else
            <details class="dropdown dropdown-end">
                <summary class="btn btn-ghost"><x-fas-user class="w-6 h-6"/></summary>
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <ul class="menu dropdown-content bg-base-100 rounded-box z-1 w-52 p-2 shadow-sm gap-2">
                        <li><a href="{{ route('dashboard') }}"><x-gmdi-dashboard-r class="w-6 h-6"/>Dashboard</a></li>
                        <li></li>
                        <li><button class="btn btn-error btn-sm" type="submit">Logout</button></li>
                    </ul>
                </form>
            </details>
        @endif
    </div>
</div>
