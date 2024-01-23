@extends('layouts.app')
@section('content')
    <div class="w-full bg-white">
        <div class="space-y-8">
            <div class="head">
                <h2 class="text-3xl font-bold">Data Pasien Masuk Dan Keluar</h2>
            </div>
            <div class="line h-2 rounded-full w-full bg-theme-border-sidebar/20">
                <div class="line h-2 rounded-full w-2/4 bg-theme-border-sidebar"></div>
            </div>
        </div>
        <div class="shadow border p-5 mt-20 bg-white">
            <div class="p-2 lg:flex grid space-y-5 grid-cols-1 justify-between">
            </div>
            <form action="">
                @csrf
            <div class="flex justify-end">
                <div class="input-box-search flex mt-5 border">
                    <button type="submit" class="px-3 py-2 text-lg"><iconify-icon icon="clarity:search-line"></iconify-icon></button>
                    <input type="search" name="searchInput" placeholder="Search" id="searchInput" class="p-2 outline-none w-full">
                </div>
            </div>
</form>
            {{-- Table --}}
            <x-content.tablesemua :headers="['No','No. RM', 'Nama Pasien', 'Tgl Lahir', 'Jenis Kelamin', 'Ruangan', 'status','Action']" :rows="$patients"/>

        </div>
    </div>


@endsection
