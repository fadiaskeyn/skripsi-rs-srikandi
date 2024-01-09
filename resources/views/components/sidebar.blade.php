<div class="layout-sidebar">
    <div class="sidebar bg-[#423D37] max-w-[280px] h-screen lg:block hidden overflow-y-auto">
        <div class="logo-brand p-5 bg-theme-sidebar">
            <img src="{{ asset('images/logo') }}/logo-horizontal.png"  alt="">
        </div>
        <div class="sidebar-menu w-auto">
            <ul class="divide-y divide-theme-border-sidebar">
                <li class="menu-item">
                    <a href="{{ route('admin.dashboard') }}" class="" >
                        <button class="item w-full border-l-8 px-8 py-5 text-left text-white @active('dashboard')">
                            Dashboard
                        </button>
                    </a>
                </li>
                <li class="menu-item dropdown-toggle">
                    <a href="#" class="">
                        <button class="item w-full border-l-8 px-8 py-5 text-left text-white flex @active('registration.patient*,registration.histori.*')">
                            <span>Register</span>
                            <span class="dropdown-arrow flex justify-end w-full mt-0"><iconify-icon icon="iconamoon:arrow-down-2-duotone" class="text-2xl"></iconify-icon></span>
                        </button>
                    </a>
                </li>
                <div class="dropdown-menu-link @active('registration.patient*,registration.histori.*')">
                    <ul class="menu-dropdown">
                        <li>
                            <a href="{{ route('registration.patient-entry.create') }}" class="text-white"><button class="item-link @active('registration.patient-entry.create')">Pasien Masuk</button></a>
                        </li>
                        <li>
                            <a href="{{ route('registration.patient-exit.create') }}" class="text-white"><button class="item-link @active('registration.patient-exit.create')">Pasien Keluar</button></a>
                        </li>
                        <li>
                            <a href="{{ route('registration.patient-move.create') }}" class="text-white"><button class="item-link @active('registration.patient-move.create')">Pasien Pindah</button></a>
                        </li>
                        <li>
                            <a href="{{ route('registration.registration.data-patient') }}" class="text-white"><button class="item-link @active('registration.registration.data-patient')">DataPasien</button></a>
                        </li>
                        <li>
                            <a href="{{ route('registration.histori.index') }}" class="text-white"><button class="item-link @active('registration.histori.index')">Histori Pasien</button></a>
                        </li>
                    </ul>
                </div>
                <li class="menu-item dropdown-toggle">
                    <a href="#" class="">
                        <button class="item w-full border-l-8 border-l-transparent px-8 py-5 text-left text-white flex @active('admin.reports.*')">
                            <span>Laporan</span>
                            <span class="flex justify-end w-full mt-0"><iconify-icon icon="iconamoon:arrow-down-2-duotone" class="text-2xl"></iconify-icon></span>
                        </button>
                    </a>
                </li>
                <div class="dropdown-menu-link @active('admin.reports.*')">
                    <ul class="menu-dropdown">
                        <li>
                            <a href="{{ route('admin.reports.hospital-service-indicator') }}" class="text-white"><button class="item-link @active('admin.reports.hospital-service-indicator')">Indikator Pelayanan RS</button></a>
                        </li>
                        <li>
                            <a href="{{ route('admin.reports.hospital-visit') }}" class="text-white"><button class="item-link @active('admin.reports.hospital-visit')">Kunjungan RS</button></a>
                        </li>
                        <li>
                            <a href="/admin/census" class="text-white">
                            <button class="item-link @active('admin.reports.census')">Rekapitulasi Sensus Harian</button></a>
                        </li>
                        <!-- <li>
                            <a href="#" class="text-white"><button class="item-link">10 Besar penyakit RI</button></a>
                        </li> -->
                    </ul>
                </div>
                <li class="menu-item dropdown-toggle @active('admin.grafik.*')" >
                    <a href="#" class="">
                        <button class="item w-full border-l-8 border-l-transparent px-8 py-5 text-left text-white flex ">
                            <span>Grafik</span>
                            <span class="flex justify-end w-full mt-0"><iconify-icon icon="iconamoon:arrow-down-2-duotone" class="text-2xl"></iconify-icon></span>
                        </button>
                    </a>
                </li>
                <div class="dropdown-menu-link @active('admin.chart.*')">
                    <ul class="menu-dropdown">
                        <li>
                            <a href="{{ route('admin.chart.visit') }}" class="text-white"><button class="item-link">Grafik Kunjungan</button></a>
                        </li>
                        <li>
                            <a href="{{ route('admin.chart.barber-johnson') }}" class="text-white"><button class="item-link">Grafik Barber Johnson</button></a>
                        </li>
                        {{-- <li>
                            <a href="{{ route('admin.chart.inpatient') }}" class="text-white"><button class="item-link">Grafik Rawat Inap</button></a>
                        </li> --}}
                        <li>
                            <a href="{{ route('admin.chart.top-diagnoses') }}" class="text-white"><button class="item-link">Grafik 10 Besar penyakit RI</button></a>
                        </li>
                    </ul>
                </div>
                <li class="menu-item dropdown-toggle">
                    <a href="#" class="">
                        <button class="item w-full border-l-8 border-l-transparent px-8 py-5 text-left text-white flex">
                            <span>Admin</span>
                            <span class="flex justify-end w-full mt-0"><iconify-icon icon="iconamoon:arrow-down-2-duotone" class="text-2xl"></iconify-icon></span>
                        </button>
                    </a>
                </li>
                <div class="dropdown-menu-link">
                    <ul class="menu-dropdown">
                        <li>
                            <a href="{{ route('admin.user.index') }}" class="text-white"><button class="item-link">Data Pengguna</button></a>
                        </li>
                        <li>
                            <a href="{{ route('admin.room.index') }}" class="text-white"><button class="item-link">Data Ruangan & TT</button></a>
                        </li>
                        <li>
                            <a href="{{ route('admin.service.index') }}" class="text-white"><button class="item-link">Data Jenis Pelayanan</button></a>
                        </li>
                        <li>
                            <a href="{{ route('admin.payment.index') }}" class="text-white"><button class="item-link">Data Jenis Pembayaran</button></a>
                        </li>
                        <li>
                            <a href="{{ route('admin.diagnosis.index') }}" class="text-white"><button class="item-link">Data Diagnosa</button></a>
                        </li>
                    </ul>
                </div>
            </ul>
        </div>
    </div>
</div>
