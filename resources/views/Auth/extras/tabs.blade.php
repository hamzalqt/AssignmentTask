<ul class="hidden text-sm font-medium text-center text-gray-500 rounded-lg shadow sm:flex dark:divide-gray-700 dark:text-gray-400">
    <li class="w-full focus-within:z-10">
        <a href="{{ route('admin') }}"
           class="inline-block w-full p-4 text-gray-900 bg-gray-100 border-r border-gray-200 dark:border-gray-700 rounded-lg
                  {{ request()->routeIs('admin') ? 'focus:ring-4 focus:ring-blue-300 active focus:outline-none dark:bg-gray-700 dark:text-white' : '' }}"
           aria-current="{{ request()->routeIs('admin') ? 'page' : '' }}">Admin</a>
    </li>
    <li class="w-full focus-within:z-10">
        <a href="{{ route('super-admin') }}"
           class="inline-block w-full p-4 bg-white border-r border-gray-200 dark:border-gray-700
                  {{ request()->routeIs('super-admin') ? 'hover:text-gray-700 hover:bg-gray-50 focus:ring-4 focus:ring-blue-300 focus:outline-none dark:hover:text-white dark:bg-gray-800 dark:hover:bg-gray-700' : '' }}"
           aria-current="{{ request()->routeIs('super-admin') ? 'page' : '' }}">Super Admin</a>
    </li>
</ul>
