<div class="drawer lg:drawer-open">
  <input id="my-drawer-2" type="checkbox" class="drawer-toggle" />
  <div class="drawer-content flex flex-col items-center">
    <!-- Page content here -->
      <div class="flex flex-col w-full p-5">
          <div class="">
              <label for="my-drawer-2" class="btn btn-ghost drawer-button lg:hidden">
                  <x-fas-bars class="w-6 h-6"/>
              </label>
          </div>

         @yield('dashboard-main')

      </div>

  </div>
  <div class="drawer-side">
    <label for="my-drawer-2" aria-label="close sidebar" class="drawer-overlay"></label>
    <ul class="menu bg-base-200 text-base-content min-h-full w-80 p-4">
        <li><p class="text-2xl font-bold">Admin Dashboard</p></li>
        <li></li>
        <li><a href="{{ route('admin-users') }}"><x-fas-user class="w-6 h-6"/>Users</a></li>
        <li><a href="{{ route('admin-posts') }}"><x-fas-note-sticky class="w-6 h-6"/>Blogs</a></li>
        <li><a href="{{ route('admin-comments') }}"><x-fas-comment class="w-6 h-6"/>Comments</a></li>
    </ul>
  </div>
</div>
