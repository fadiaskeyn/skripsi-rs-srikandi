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
    <div class="shadow border p-5 mt-20 bg-white">
        {{-- Table --}}
        <x-content.table :headers="['No','Bulan', 'Jumlah Tempat Tidur', 'BOR %','LOS(HARI)', 'TOI(HARI)', 'BTO(KALI)', 'GDR(PERMILL)', 'NDR(PERMILL)']" :rows="[]" />

    </div>
</div>
@endsection