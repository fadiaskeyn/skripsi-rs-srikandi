<div class="layout-sidebar ">
    <div class="sidebar  bg-[#423D37] max-w-[280px] h-screen lg:block hidden overflow-y-auto">
        <div class="logo-brand p-5 bg-theme-sidebar">
            <img src="{{ asset('images/logo') }}/logo-horizontal.png" class="w-" alt="">
        </div>
        <div class="sidebar-menu w-auto">
            <ul class="divide-y divide-theme-border-sidebar">
                <li class="menu-item">
                    <a href="#" class="" >
                        <button class="item w-full border-l-8 px-8 py-5 text-left text-white {{ request()->is('/', 'dashboard') ? 'active-menu' : 'border-transparent' }}">
                            Dashboard
                        </button>
                    </a>
                </li>
                <li class="menu-item dropdown-toggle">
                    <a href="#" class="">
                        <button class="item w-full border-l-8 border-l-transparent px-8 py-5 text-left text-white flex {{ request()->is('register', 'register/pasien-masuk',  'register/pasien-masuk/*', 'register/pasien-keluar', 'register/pasien-keluar/*' ) ? 'active-menu' : '' }}">
                            <span>Register</span>
                            <span class="flex justify-end w-full mt-0"><iconify-icon icon="iconamoon:arrow-down-2-duotone" class="text-2xl"></iconify-icon></span>
                        </button>
                    </a>
                    <div class="dropdown-menu-link {{ request()->is('register', 'register/pasien-masuk',  'register/pasien-masuk/*', 'register/pasien-keluar', 'register/pasien-keluar/*' ) ? '' : 'hidden' }}">
                        <ul class="menu-dropdown">
                        </ul>
                    </div>
                </li>
                <li class="menu-item">
                    <a href="#" class="">
                        <button class="item w-full border-l-8 border-l-transparent px-8 py-5 text-left text-white flex">
                            <span>Tabel</span>
                            <span class="flex justify-end w-full mt-0"><iconify-icon icon="iconamoon:arrow-down-2-duotone" class="text-2xl"></iconify-icon></span>
                        </button>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="#" class="">
                        <button class="item w-full border-l-8 border-l-transparent px-8 py-5 text-left text-white flex">
                            <span>Laporan</span>
                            <span class="flex justify-end w-full mt-0"><iconify-icon icon="iconamoon:arrow-down-2-duotone" class="text-2xl"></iconify-icon></span>
                        </button>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="#" class="">
                        <button class="item w-full border-l-8 border-l-transparent px-8 py-5 text-left text-white flex">
                            <span>Grafik</span>
                            <span class="flex justify-end w-full mt-0"><iconify-icon icon="iconamoon:arrow-down-2-duotone" class="text-2xl"></iconify-icon></span>
                        </button>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="#" class="">
                        <button class="item w-full border-l-8 border-l-transparent px-8 py-5 text-left text-white flex">
                            <span>Admin</span>
                        </button>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>