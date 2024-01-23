@extends('layouts.app')

@section('content')
<div class="w-full bg-white">
    <div class="space-y-8">
        <div class="head">
            <h2 class="text-3xl font-bold">Laporan Indikator Pelayanan Rumah Sakit</h2>
        </div>
        <div class="line h-2 rounded-full w-full bg-theme-border-sidebar/20">
            <div class="line h-2 rounded-full w-2/4 bg-theme-border-sidebar"></div>
        </div>
    </div>
    <form action="">
        @csrf
    <div class="mt-5 max-w-2xl space-y-5">
        <x-forms.select name="ruangan" :options="$rooms" id="ruangan" label="Ruangan" placeholder="Semua Ruangan" values="$rooms" />
        <div class="flex gap-5 max-w-lg">
            <x-forms.input name="tanggal_start" type="date" id="tanggal_start" label="Tanggal Awal" />
            <x-forms.input name="tanggal_end" type="date" id="tanggal_end" label="Tanggal Akhir" />
        </div>
        <button id="filterBtn" class="bg-orange-950 text-white px-4 py-2 rounded-md" type="submit">Filter</button>
    </div>
    <div class="shadow border p-5 mt-20 bg-white">
                    {!! $chart->container() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('script-injection')
    {!! $chart->script() !!}
@endpush
