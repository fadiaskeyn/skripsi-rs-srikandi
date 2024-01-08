@extends('layouts.app')
@section('content')
    <div class="w-full bg-white">
        <div class="space-y-8">
            <div class="head">
                <h2 class="text-3xl font-bold">Riwayat Pasien</h2>
            </div>
            <div class="line h-2 rounded-full w-full bg-theme-border-sidebar/20">
                <div class="line h-2 rounded-full w-2/4 bg-theme-border-sidebar"></div>
            </div>
        </div>
        <div class="shadow border p-5 mt-20 bg-white">
            <div class="p-2 lg:flex grid space-y-5 grid-cols-1 justify-between">
                <div class="w-full flex justify-end">

                </div>
            </div>

            {{-- Table --}}
            <x-content.table-histori :headers="['Nama','Tgl. Masuk', 'Tgl, Keluar', 'Layanan', 'Diagnosa', 'Cara Keluar','DPJB']" :rows="$historiEntries"/>
        </div>
    </div>


@endsection
