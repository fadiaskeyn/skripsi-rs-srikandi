@extends('layouts.app')
@section('content')
    <div class="w-full">
        <div class="w-full bg-white">
            <div class="space-y-8 pb-8">
                <div class="head">
                    <h2 class="text-3xl font-bold">Data Pasien</h2>
                </div>
                <div class="line h-2 rounded-full w-full bg-theme-border-sidebar/20">
                    <div class="line h-2 rounded-full w-2/4 bg-theme-border-sidebar"></div>
                </div>
            </div>
            {{-- form start --}}
            <form action="{{ route('registration.histori.store') }}" method="POST" autocomplete="off">
                @csrf
                <div class="lg:flex gap-5 w-2/3">
                    <div class="p-5 lg:w-[50%] w-1/2">
                        <div class="md:flex md:items-center mb-6 gap-2">
                            <x-forms.input id="rm" type="text" name="rm" label="No. RM" />
                        </div>
                        <div class="md:flex md:items-center mb-6 gap-2">
                            <x-forms.input id="fullname" type="text" name="fullname" label="Nama Pasien" />
                        </div>
                        <div class="md:flex md:items-center mb-6 gap-2">
                            <x-forms.input id="birthdate" type="date" name="birthdate" label="Tgl. Lahir" />
                        </div>
                        <div class="md:flex md:items-center mb-6 gap-2">
                            <x-forms.select id="gender" type="text" name="gender" label="Jenis Kelamin" placeholder="Pilih Jenis Kelamin" :options="['P' => 'P', 'L' => 'L']" />
                        </div>
                        <div class="md:flex md:items-center mb-6 gap-2">
                            <x-forms.input id="address" type="text" name="address" label="Alamat" />
                        </div>
                        <div class="md:flex md:items-center mb-6 gap-2">
                            <x-forms.select name="new_patient" id="new_patient" label="Status Pasien" placeholder="Pilih Status Pasien" :options="['Lama', 'Baru']" />
                        </div>
                    </div>
                    <div class="p-5 lg:w-[50%] w-1/2">
                        {{-- <div class="md:flex md:items-center mb-6 gap-2"> --}}
                            {{-- <x-forms.select name="diagnose_id" id="diagnose_id" label="Diagnosa" placeholder="Pilih Status Pasien" :options="$diagnoses" /> --}}
                        {{-- </div> --}}
                        <div class="md:flex md:items-center mb-6 gap-2">
                            <x-forms.input id="date" type="date" name="date" label="Tanggal Masuk" />
                        </div>
                        <div class="md:flex md:items-center mb-6 gap-2">
                            <x-forms.select name="service_id" id="service_id" label="Jenis Pelayanan" placeholder="Pilih Jenis Pelayanan" :options="$services" selected="OBGYN" />
                        </div>
                        <div class="md:flex md:items-center mb-6 gap-2">
                            <x-forms.select name="nursing_class" id="nursing_class" label="Kelas Rawat" placeholder="Pilih Kelas Rawat" :options="[1 => '1', '2', '3']" selected="1" />
                        </div>
                        <div class="md:flex md:items-center mb-6 gap-2">
                            <x-forms.select name="payment_id" id="payment_id" label="Pembayaran" placeholder="Pilih Pembayaran" :options="$payments" selected="1" />
                        </div>
                        <div class="md:flex md:items-center mb-6 gap-2">
                            <x-forms.select name="room_id" id="room_id" label="Ruang Perawatan" placeholder="Pilih Ruang Perawatan" :options="$rooms" />
                        </div>
                    </div>
                </div>
                <div class="bg-white flex lg:justify-start justify-center gap-5 pb-20                                                                                           ">
                    <button type="submit" class="inline-flex items-center px-4 py-2 bg-theme-border-sidebar hover:bg-gray-700 text-white text-sm md:text-left font-medium ">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 8h14M5 8a2 2 0 110-4h14a2 2 0 110 4M5 8v10a2 2 0 002 2h10a2 2 0 002-2V8m-9 4h4" />
                        </svg>
                        Tambah
                    </button>
                    <a href="{{ route('registration.histori.index') }}" class="inline-flex items-center px-4 py-2 bg-theme-border-sidebar hover:bg-gray-700 text-white text-sm md:text-left font-medium">
                        {{-- <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                        </svg> --}}
                        Kembali
                    </a>
                </div>

            </form>
            {{-- form end --}}
        </div>
    </div>
@endsection
