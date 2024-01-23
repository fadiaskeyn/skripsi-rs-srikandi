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
    <form>
        @csrf
    <div class="mt-5 max-w-2xl space-y-5">
            <x-forms.select name="ruangan" :options="$rooms" id="ruangan" label="Ruangan" placeholder="Semua Ruangan" />
            <div class="flex gap-5 max-w-lg">
                <x-forms.input name="tanggal_start" type="date"  id="tanggal" label="Tanggal" />
                <x-forms.input name="tanggal_end" type="date"  id="tanggal" label="" />
            </div>
            <button id="filterBtn" class="bg-orange-950 text-white px-4 py-2 rounded-md" type="submit">Filter</button>
        </div>
    <div class="shadow border p-5 mt-20 bg-white">
            <button name="downloadbtn" id="downloadbtn" class="px-7 py-3 text-white rounded-lg bg-theme-border-sidebar ml-px">
                Download PDF<span class="ml-4 mt-2"><iconify-icon icon="octicon:plus-16" class="text-sm"></iconify-icon></span>
            </button>
        <div class="tables-responsive overflow-y-auto mt-10">
            <table class="tables table-cencus" id="table-cencus">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Tanggal</th>
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
