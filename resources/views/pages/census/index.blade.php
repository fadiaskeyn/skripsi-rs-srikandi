@extends('layouts.app')
@section('content')
    <div class="w-full bg-white">
        <div class="space-y-8">
            <div class="head">
                <h2 class="text-3xl font-bold">Data Rekapitulasi Sensus Harian</h2>
            </div>
            <div class="line h-2 rounded-full w-full bg-theme-border-sidebar/20">
                <div class="line h-2 rounded-full w-2/4 bg-theme-border-sidebar"></div>
            </div>
        </div>
        <div class="mt-5 max-w-2xl space-y-5">
            <x-forms.select name="ruangan" :options="$rooms" id="ruangan" label="Ruangan" placeholder="Semua Ruangan" />
            <div class="flex gap-5 max-w-lg">
                <x-forms.input name="tanggal" type="date"  id="tanggal" label="Tanggal" />
                <x-forms.input name="tanggal" type="date"  id="tanggal" label="" />
            </div>
        </div>
        <div class="shadow border p-5 mt-20 bg-white">
            <div class="p-2 lg:flex grid space-y-5 grid-cols-1 justify-between">
                <div class="mt-3 w-full">
                    <h2 class="text-2xl font-bold">Table Rekapitulasi Sensus Harian</h2>
                </div>
                <div class="w-full flex justify-end gap-5">
                    <button id="download-pdf-button" class="px-7 py-3 text-white rounded-lg bg-theme-border-sidebar">Download PDF<span class="ml-4 mt-4"><iconify-icon icon="octicon:plus-16" class="text-sm"></iconify-icon></span></button>
                    <a href="#" class="px-7 py-3 text-white rounded-lg bg-theme-border-sidebar">Download Excel<span class="ml-4 mt-4"></span></a>
                    <a href="#" class="px-7 py-3 text-white rounded-lg bg-theme-border-sidebar">Print<span class="ml-4 mt-4"></span></a>
                </div>
            </div>
            </div>
            {{-- Table --}}
            <table class="tables w-full" id="table-cencus">
                <thead>
                    <tr>
                        <th rowspan="3">No.</th>
                        <th rowspan="3">Tanggal</th>
                        <th rowspan="3">Pasien Masuk</th>
                        <th rowspan="3">Pasien Pindah</th>
                        <th rowspan="3">Jumlah</th>
                        <th colspan="5">Pasien Keluar</th>
                        <th rowspan="3">Total Pasien Keluar</th>
                        <th rowspan="3">Hari Perawatan</th>
                        <th rowspan="3">Lama Rawat</th>
                        <th colspan="3">Cara bayar</th>
                        <th colspan="4">Kelas</th>
                    </tr>
                    <tr>
                        <th colspan="3">Pasien Keluar Hidup</th>
                        <th colspan="2">Pasien Keluar Mati</th>
                        @foreach ($payments as $payment)
                            <th rowspan="2">{{ $payment }}</th>
                        @endforeach
                        <th rowspan="2">VIP</th>
                        <th rowspan="2">I</th>
                        <th rowspan="2">II</th>
                        <th rowspan="2">III</th>
                    </tr>
                    <tr>
                        <th class="">Pulang Paksa</th>
                        <th class="">Atas Perintah Dokter</th>
                        <th class="">Dirujuk</th>
                        <th class="">Mati < 48 Jam</th>
                        <th class="">Mati > 48 Jam</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $recap)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $recap->date }}</td>
                        <td>{{ $recap->entries->total_entries }}</td>
                        <td>{{ $recap->entries->total_moves }}</td>
                        <td>{{ $recap->entries->total }}</td>
                        <td>{{ $recap->exits->self }}</td>
                        <td>{{ $recap->exits->doctor }}</td>
                        <td>{{ $recap->exits->referred }}</td>
                        <td>{{ $recap->exits->diedLess }}</td>
                        <td>{{ $recap->exits->diedMore }}</td>
                        <td>{{ $recap->exits->total }}</td>
                        <td>{{ $recap->entries->total_entries }}</td>
                        <td>{{ $recap->long_cares }}</td>
                        @foreach ($payments as $payment)
                            <td>{{ $recap->payments[$payment] }}</td>
                        @endforeach
                        <td></td>
                        <td>{{ $recap->nursing_class[1] }}</td>
                        <td>{{ $recap->nursing_class[2] }}</td>
                        <td>{{ $recap->nursing_class[3] }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    @push('script-injection')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js" defer></script>
    <script>

        //udah didefine padahal bjir
        document.addEventListener('DOMContentLoaded', function () {
    function exportToPDF() {
        console.log("Exporting to PDF...");
        const doc = new jsPDF();
        const table = document.getElementById('table-cencus');
        doc.autoTable({ html: table });
        doc.save('table-export.pdf');
    }

    // Mendapatkan tombol
    const downloadButton = document.getElementById('download-pdf-button');

    // Menambahkan event listener pada tombol
    downloadButton.addEventListener('click', exportToPDF);
});

    </script>
    @endpush
@endsection
