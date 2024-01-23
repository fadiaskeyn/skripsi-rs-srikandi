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
        <form>
            @csrf
        <div class="mt-5 max-w-2xl space-y-5">
            <x-forms.select name="ruangan" :options="$rooms" id="ruangan" label="Ruangan" placeholder="Semua Ruangan" />
            <div class="flex gap-5 max-w-lg">
                <x-forms.input name="start_date" type="date"  id="start_date" label="Tanggal" />
              <x-forms.input name="end_date" type="date" id="end_date" label="" />

            </div>
            <button id="filterBtn" class="bg-orange-950 text-white px-4 py-2 rounded-md" type="submit">Filter</button>
        </div>
    </form>
        <div class="shadow border p-5 mt-20 bg-white">
            <div class="p-2 lg:flex grid space-y-5 grid-cols-1 justify-between">
                <div class="mt-3 w-full">
                    <h2 class="text-2xl font-bold">Table Rekapitulasi Sensus Harian</h2>
                </div>
                <div class="w-full flex justify-end gap-5">
                    <button name="downloadbtn" id="downloadbtn" class="px-7 py-3 text-white rounded-lg bg-theme-border-sidebar">
                        Download PDF<span class="ml-4 mt-2"><iconify-icon icon="octicon:plus-16" class="text-sm"></iconify-icon></span>
                    </button>
                    <a href="#" class="px-7 py-3 text-white rounded-lg bg-theme-border-sidebar" style="display: none">Download Excel<span class="ml-4 mt-8 mb-8"></span></a>
                    <a href="#" class="px-7 py-3 text-white rounded-lg bg-theme-border-sidebar" style="display: none">Print<span class="ml-4 mt-4"></span></a>
                </div>
            </div>
            </div>
            {{-- Table --}}
            <table class=" tables table-cencus w-full" id="table-cencus">
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

@endsection
@push('script-injection')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf-autotable/3.8.1/jspdf.plugin.autotable.min.js"></script>
<script>
    document.getElementById('downloadbtn').addEventListener('click', function() {
        generate();
    });
    function generate() {
        var doc = new jspdf.jsPDF('p', 'pt', 'letter');
        var htmlstring = '';
        var tempVarToCheckPageHeight = 0;
        var pageHeight = 0;
        pageHeight = doc.internal.pageSize.height;
        specialElementHandler = {

            '#bypassme': function (element, renderer) {
                return true;
            }
        };
        margin = {
            top: 20,
            bottom: 60,
            left: 40,
            right: 40,
            width: 600
        };
        var y = 20;
        doc.setLineWidth(2);
        doc.text(15, y = y + 30, "Cencus Harian");
        doc.autoTable({
            html: '#table-cencus',
            startY: 70,
            theme: 'grid',
            ColumnStyle: {
                0: {
                    cellwidth: 100,
                },
                1: {
                    cellwidth: 100,
                },
                2: {
                    cellwidth: 100,
                }
            },
            styles: {
                minCellHeight: 35
            }
        });
        doc.save('Cencus_Harian.pdf');
    }
</script>
    @endpush
