@extends('layouts.print')
@section('print')
    <div class="container-print">
        <div class="flex w-full justify-center">
            <div class="logo-brand w-full">
                <img src="{{ asset('images/logo') }}/logo-white.jpg" class="w-44" alt="">
            </div>
            <div class="content w-full ">
                <div class="text-center mt-14 font-bold text-lg">
                    <h2>Laporan Indikator Pelayanan Rumah Sakit</h2>
                    <h3>Ruang Rawat Inap : Semua Ruangan</h3>
                    <h3>Periode Tahun 2023 </h3>
                </div>
            </div>
            <div class="w-full"></div>
        </div>
        <table class="tables table-print mt-20">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Bulan</th>
                    <th>Jumlah Hari</th>
                    <th>Jumlah Tempat Tidur</th>
                    <th>BOR (%)</th>
                    <th>STANDAR BOR</th>
                    <th>LOS (HARI)</th>
                    <th>STANDAR LOS</th>
                    <th>BTO (KALI)</th>
                    <th>STANDAR (BTO)</th>
                    <th>GDR (PERMILL)</th>
                    <th>NDR (PERMILL)</th>
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
@endsection


@push('style-injection')
<style>
    .container-print{
        max-width: 1480px;
        margin: 0 auto;
    }
    @media print {
        .table-print th {
            background: #785839;
            color: white;
            font-size: 14px !important;
        }
        body{
            -webkit-print-color-adjust:exact !important;
            print-color-adjust:exact !important;
        }
    }
</style>
@endpush