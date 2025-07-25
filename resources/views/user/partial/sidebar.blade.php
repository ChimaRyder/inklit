<div class="">
    <div class="drawer drawer-open">
        <input id="sidebar" type="checkbox" class="drawer-toggle" />
        <div class="drawer-content flex flex-col">

            <div class="flex flex-col px-60 py-8">
                @yield('dashboard-main')
            </div>

        </div>
        <div class="min-h-screen">
            <ul class="menu bg-base-200 text-base-content min-h-full w-80 p-4 *:text-lg gap-4 ">

                <li><a href="{{ route('write') }}" class="btn btn-lg bg-amber-700 text-white">Write A Blog</a></li>
                <li></li>
                <li><a href="{{ route('profile') }}"><x-fas-user class="w-6 h-6"/>Profile</a></li>
                <li><a href="{{ route('posts') }}"><x-fas-note-sticky class="w-6 h-6"/>My Posts</a></li>
                <li><a href="{{ route('settings') }}"><x-fas-gear class="w-6 h-6"/>Settings</a></li>

            </ul>
        </div>
    </div>
</div>

