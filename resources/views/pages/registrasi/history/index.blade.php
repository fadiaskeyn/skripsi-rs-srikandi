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
            {{-- Table --}}
            <x-content.table-patient :headers="['No', 'No. RM', 'Nama', 'Tgl Lahir', 'Jenis Kelamin', 'Alamat', 'Action']" :rows="$data" />

        </div>
    </div>
@endsection
