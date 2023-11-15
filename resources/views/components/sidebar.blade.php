<div class="layout-sidebar ">
    <div class="sidebar  bg-[#423D37] max-w-[280px] h-screen lg:block hidden overflow-y-auto">
        <div class="logo-brand p-5 bg-theme-sidebar">
            <img src="{{ asset('images/logo') }}/logo-horizontal.png" class="w-" alt="">
        </div>
        <div class="sidebar-menu w-auto">
            <ul class="divide-y divide-theme-border-sidebar">
                <li class="menu-item">
                    <a href="{{ route('admin.dashboard') }}" class="" >
                        <button class="item w-full border-l-8 px-8 py-5 text-left text-white {{ request()->is('/', 'dashboard') ? 'active-menu' : 'border-transparent' }}">
                            Dashboard
                        </button>
                    </a>
                </li>
                <li class="menu-item dropdown-toggle">
                    <a href="#" class="">
                        <button class="item w-full border-l-8  px-8 py-5 text-left text-white flex @active('registrasi', 'active-menu') ">
                            <span>Register</span>
                            <span class="dropdown-arrow flex justify-end w-full mt-0"><iconify-icon icon="iconamoon:arrow-down-2-duotone" class="text-2xl"></iconify-icon></span>
                        </button>
                    </a>
                </li>
                <div class="dropdown-menu-link {{ request()->is('registrasi', 'registrasi/pasien-masuk',  'registrasi/pasien-masuk/*', 'registrasi/pasien-keluar', 'registrasi/pasien-keluar/*' ) ? 'show' : 'hidden' }}">
                    <ul class="menu-dropdown">
                        <li><a href="" class="text-white"><button class="item-link">Registrasi Pasien Masuk</button></a></li>
                        <li><a href="" class="text-white"><button class="item-link">Registrasi Pasien Keluar</button></a></li>
                        <li><a href="{{ route('registration.histori.index') }}" class="text-white"><button class="item-link">Histori Pasien</button></a></li>
                    </ul>
                </div>
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
                        <button class="item w-full border-l-8 border-l-transparent px-8 py-5 text-left text-white flex ">
                            <span>Grafik</span>
                            <span class="flex justify-end w-full mt-0"><iconify-icon icon="iconamoon:arrow-down-2-duotone" class="text-2xl"></iconify-icon></span>
                        </button>
                    </a>
                </li>
                <li class="menu-item dropdown-toggle">
                    <a href="#" class="">
                        <button class="item w-full border-l-8 border-l-transparent px-8 py-5 text-left text-white flex">
                            <span>Admin</span>
                        </button>
                    </a>
                </li>
                <div class="dropdown-menu-link {{ request()->is('admin', 'admin/pengguna',  'admin/pengguna/*') ? 'show' : 'hidden' }}">
                    <ul class="menu-dropdown">
                        <li><a href="{{ route('admin.pengguna.index') }}" class="text-white"><button class="item-link">Registrasi Pasien Masuk</button></a></li>
                        <li><a href="#" class="text-white"><button class="item-link">Histori Pasien</button></a></li>
                    </ul>
                </div>
            </ul>
        </div>
    </div>
</div>
