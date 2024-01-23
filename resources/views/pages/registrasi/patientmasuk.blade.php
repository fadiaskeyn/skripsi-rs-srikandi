@extends('layouts.app')
@section('content')
    <div class="w-full bg-white">
        <div class="space-y-8">
            <div class="head">
                <h2 class="text-3xl font-bold">Registrasi Pasien Masuk Rawat Inap</h2>
            </div>
            <div class="line h-2 rounded-full w-full bg-theme-border-sidebar/20">
                <div class="line h-2 rounded-full w-2/4 bg-theme-border-sidebar"></div>
            </div>
        </div>
        <div class="shadow border p-5 mt-20 bg-white">
            <div class="p-2 lg:flex grid space-y-5 grid-cols-1 justify-between">
                <div class="w-full flex justify-end">
                    <a href="{{ route('registration.histori.create') }}" class="px-7 py-3 text-white rounded-lg bg-theme-border-sidebar">Tambah Pasien <span class="ml-4 mt-4"><iconify-icon icon="octicon:plus-16" class="text-sm"></iconify-icon></span></a>

                    <a href="{{ route('registration.patient-entry.create') }}" class="px-7 py-3 text-white rounded-lg bg-theme-border-sidebar"> Form Pasien Entry <span class="ml-4 mt-4"><iconify-icon icon="octicon:plus-16" class="text-sm"></iconify-icon></span></a>
                </div>
            </div>
            <form action="{{ route('registration.registration.data-pasien-masuk') }}">
                @csrf
            <div class="flex justify-end">
                <div class="input-box-search flex mt-5 border">
                    <button type="submit" class="px-3 py-2 text-lg"><iconify-icon icon="clarity:search-line"></iconify-icon></button>
                    <input type="search" name="searchInput" placeholder="Search" id="searchInput" class="p-2 outline-none w-full">
                </div>
            </div>
</form>
            {{-- Table --}}
            <x-content.tabel-pasien-masuk :headers="['No','No. RM', 'Nama', 'Tgl Lahir', 'Jenis Kelamin', 'Alamat','Action']" :rows="$data"/>
        </div>
    </div>


@endsection
