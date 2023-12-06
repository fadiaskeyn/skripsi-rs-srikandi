@extends('layouts.app')
@section('content')
    <div class="w-full">
        <div class="w-full bg-white rounded">
            <div class="space-y-8 pb-8">
                <div class="head">
                    <h2 class="text-3xl font-bold">Form Register Pasien Pindah</h2>
                </div>
                <div class="line h-2 rounded-full w-full bg-theme-border-sidebar/20">
                    <div class="line h-2 rounded-full w-2/4 bg-theme-border-sidebar"></div>
                </div>
            </div>
                {{-- form start --}}
                <div class="lg:flex grid grid-cols-1 w-full gap-5">
                    <div class="w-full">
                        <form class="mt-5 lg:w-3/4 w-full p-8" action="#" method="POST" autocomplete="off">
                            @csrf
                            <div class="md:flex md:items-center mb-6 gap-2">
                                <input type="hidden" name="medrec_number" id="medrec_number" value="">
                                <x-forms.input id="rm" type="text" name="rm" label="No. RM" />
                                <button type="button" class="bg-theme-border-sidebar text-white px-4 py-2 rounded-full" id="rm-button">
                                    <iconify-icon icon="mingcute:search-line" class="text-lg"></iconify-icon>
                                </button>
                            </div>
                            <div class="md:flex md:items-center mb-6 gap-2">
                                <x-forms.input id="fullname" type="text" name="fullname" label="Nama Pasien" />
                            </div>
                            <div class="md:flex md:items-center mb-6 gap-2">
                                <x-forms.select id="ruang-awal" type="text" name="ruang-awal" label="Ruang Awal" :options="['']"  />
                            </div>
                            <div class="md:flex md:items-center mb-6 gap-2">
                                <x-forms.select id="ruang-tujuan"  name="ruang-tujuan" label="Ruang Tujuan" :options="['']" />
                            </div>
                            <div class="md:flex md:items-center mb-6 gap-2">
                                <x-forms.select id="kelas-rawat" name="kelas-rawat" label="Ruang Tujuan" :options="['']"  />
                            </div>
                            <div class="md:flex md:items-center mb-6 gap-2">
                                <x-forms.select id="jenis-pembayaran" type="text" name="jenis-pembayaran" label="Jenis Pembayaran" :options="['']" />
                            </div>
                            <div class="md:flex md:items-center mb-6 gap-2">
                                <x-forms.input id="fullname" type="date" name="fullname" label="Tgl Pindah"  />
                            </div>
                        </form>
                    </div>
                    <div class="w-full mt-5 pb-20">
                        <table class="table-pasien w-full border-collapse border mt-8">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>No.RM</th>
                                    <th>Nama Pasien</th>
                                    <th>Ruangan Awal</th>
                                    <th>Kelas</th>
                                    <th>Tanggal Masuk</th>
                                    <th>Ruang Tujuan</th>
                                    <th>Tanggal Pindah</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                            </tbody>
                        </table>                                                                                
                    </div>
                </div>
                <div class="flex gap-5 justify-start pb-8">
                    <button class="bg-theme-secondary px-8 py-2 text-white">Simpan</button>
                    <button class="bg-theme-secondary px-8 py-2 text-white">Cancel</button>
                </div>
                {{-- form end --}}
                </div>
            </div>
        </div>
    </div>
@endsection
