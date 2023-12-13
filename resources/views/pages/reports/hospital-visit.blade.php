@extends('layouts.app')
@section('content')
<div class="w-full bg-white">
    <div class="space-y-8">
        <div class="head">
            <h2 class="text-3xl font-bold">Laporan Kunjungan Rumah Sakit</h2>
        </div>
        <div class="line h-2 rounded-full w-full bg-theme-border-sidebar/20">
            <div class="line h-2 rounded-full w-2/4 bg-theme-border-sidebar"></div>
        </div>
    </div>
    <div class="shadow border p-5 mt-20 bg-white">
        <div class="tables-responsive overflow-y-auto mt-10">
            <table class="tables">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Bulan</th>
                        <th>Laki-Laki</th>
                        <th>Perempuan</th>
                        <th>Total</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($visitors as $indicator)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $indicator->date }}</td>
                        <td>{{ $indicator->male }}</td>
                        <td>{{ $indicator->female }}</td>
                        <td>{{ $indicator->total }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
