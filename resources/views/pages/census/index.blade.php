@push('style-injection')
    <style>
table, th, td {
  border:1px solid black;
}
</style>
@endpush

@extends('layouts.app')
@section('content')
    
<table style="width:100%">
    <tr>
        <th rowspan="5">Tanggal</th>
        <th rowspan="5">Pasien Masuk</th>
        <th rowspan="5">Pasien Pindahan</th>
        <th rowspan="5">Jumlah</th>
    </tr>
    <tr>
        <th colspan="5">Pasien Keluar</th>
    </tr>
    <tr>
        <th colspan="3">Pasien Keluar Hidup</th>
        <th colspan="2">Pasien Keluar Mati</th>
    </tr>
    <tr>
        <th colspan="1">Pulang Paksa</th>
        <th colspan="1">Atas Perintah Dokter</th>
        <th colspan="1">Dirujuk</th>
        <th colspan="1">Pasien Mati < 48 Jam</th>
        <th colspan="1">Pasien Mati > 48 Jam</th>
        <th rowspan="5">Total Pasien Keluar</th>
        <th rowspan="5">Hari Perawatan</th>
        <th rowspan="5">Lama Rawat</th>
    </tr>
     {{-- <tr>
        <th rowspan="2">Cara Bayar</th>
        <td>Umum</td>
        <td>BPJS</td>
        <td>ASURANSI</td>
    </tr>    --}}
    {{-- <tr>
        <th rowspan="2">Kelas</th>
        <td>VIP</td>
        <td>1</td>
        <td>2</td>
        <td>3</td>
    </tr> - --}}
    <!-- Menambahkan 12 baris kosong -->
</table>

@endsection