<aside id="sidebar"
    class="fixed top-0 left-0 z-20 flex flex-col flex-shrink-0 hidden w-64 h-full pt-16 font-normal duration-75 lg:flex transition-width"
    aria-label="Sidebar">
    <div
        class="relative flex flex-col flex-1 min-h-0 pt-0 bg-white border-r border-gray-200 dark:bg-gray-800 dark:border-gray-700">
        <div class="flex flex-col flex-1 pt-5 pb-4 overflow-y-auto">
            <div class="flex-1 px-3 space-y-1 bg-white divide-y divide-gray-200 dark:bg-gray-800 dark:divide-gray-700">
                {{-- Sidebar Header --}}
                <ul class="pb-2 space-y-2">
                    

                    {{-- Dashboard --}}
                    <li>
                        <x-sidebar-link href="{{route('admin.dashboard')}}" :active="request()->is('dashboard')">
                            <x-sidebar-icon>
                                <path d="M13.5 2c-.178 0-.356.013-.492.022l-.074.005a1 1 0 0 0-.934.998V11a1 1 0 0 0 1 1h7.975a1 1 0 0 0 .998-.934l.005-.074A7.04 7.04 0 0 0 22 10.5 8.5 8.5 0 0 0 13.5 2Z" />
                                <path d="M11 6.025a1 1 0 0 0-1.065-.998 8.5 8.5 0 1 0 9.038 9.039A1 1 0 0 0 17.975 13H11V6.025Z" />
                            </x-sidebar-icon>
                            <span class="ml-3" sidebar-toggle-item>Dashboard</span>
                        </x-sidebar-link>
                    </li>

                    {{-- Kelola Akun --}}
                    <li>
                        <x-sidebar-dropdown label="Peminjaman" id="Peminjaman" :active="request()->is('admin/peminjaman*')">
                            <x-sidebar-icon>
                                <path fill-rule="evenodd" d="M4 4a1 1 0 0 1 1-1h14a1 1 0 1 1 0 2v14a1 1 0 1 1 0 2H5a1 1 0 1 1 0-2V5a1 1 0 0 1-1-1Zm5 2a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1h1a1 1 0 0 0 1-1V7a1 1 0 0 0-1-1H9Zm5 0a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1h1a1 1 0 0 0 1-1V7a1 1 0 0 0-1-1h-1Zm-5 4a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1h1a1 1 0 0 0 1-1v-1a1 1 0 0 0-1-1H9Zm5 0a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1h1a1 1 0 0 0 1-1v-1a1 1 0 0 0-1-1h-1Zm-3 4a2 2 0 0 0-2 2v3h2v-3h2v3h2v-3a2 2 0 0 0-2-2h-2Z" clip-rule="evenodd" />
                            </x-sidebar-icon>
                        </x-sidebar-dropdown>
                        <x-sidebar-dropdown-list id="Peminjaman" :active="request()->is('admin/peminjaman*')">
                            {{-- Buat Peminjaman --}}
                            <li>
                                <x-sidebar-dropdown-list-link href="{{ route('admin.buat_peminjaman') }}" :active="request()->is('admin/buat_peminjaman')">
                                    Peminjaman
                                </x-sidebar-dropdown-list-link>
                            </li>
                            {{-- Ajukan Peminjaman --}}
                            <li>
                                <x-sidebar-dropdown-list-link href="{{ route('admin.record') }}" :active="request()->is('admin/record')">
                                    Pencatatan
                                </x-sidebar-dropdown-list-link>
                            </li>
                        </x-sidebar-dropdown-list>
                    </li>

                </ul>

                {{-- Sidebar Footer --}}
                <div class="pt-2 space-y-2">
                    <x-sidebar-link href="{{route('admin.service')}}">
                        <x-sidebar-icon>
                            <path d="M17.133 12.632v-1.8a5.406 5.406 0 0 0-4.154-5.262.955.955 0 0 0 .021-.106V3.1a1 1 0 0 0-2 0v2.364a.955.955 0 0 0 .021.106 5.406 5.406 0 0 0-4.154 5.262v1.8C6.867 15.018 5 15.614 5 16.807 5 17.4 5 18 5.538 18h12.924C19 18 19 17.4 19 16.807c0-1.193-1.867-1.789-1.867-4.175ZM8.823 19a3.453 3.453 0 0 0 6.354 0H8.823Z" />
                        </x-sidebar-icon>
                        <span class="ml-3" sidebar-toggle-item>Service</span>
                    </x-sidebar-link>
                    <x-sidebar-link href="#">
                        <x-sidebar-icon>
                            <path fill-rule="evenodd" d="M3 6a2 2 0 0 1 2-2h5.532a2 2 0 0 1 1.536.72l1.9 2.28H3V6Zm0 3v10a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V9H3Z" clip-rule="evenodd" />
                        </x-sidebar-icon>
                        <span class="ml-3" sidebar-toggle-item>Raport</span>
                    </x-sidebar-link>
                </div>
            </div>
        </div>
    </div>
</aside>