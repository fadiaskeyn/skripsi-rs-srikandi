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
                <!-- Remove date input fields -->
                <select name="selected_date" class="bg-gray-100 rounded-full p-3 w-full" id="selected_date">
                    @forelse ($periods as $period)
                    <option value="{{ "{$period->month}-{$period->year}" }}">{{ "{$period->month}-{$period->year}" }}</option>
                    @empty
                    <option value="">--Pilih Bulan--</option>
                    @endforelse
                </select>
            </div>
            <button id="filterBtn" class="bg-orange-950 text-white px-4 py-2 rounded-md" type="submit">Filter</button>
        </div>
    </form>
    {{-- <select name="" class="bg-gray-100 rounded-full p-3 w-full" id="date">
        @forelse ($indicators as $indicator)
        <option value="{{ "{$indicator->month}-{$indicator->year}" }}">{{ "{$indicator->month}-{$indicator->year}" }}</option>
        @empty
        <option value="">--Pilih Bulan--</option>
        @endforelse
    </select> --}}
        {{-- Table --}}
        <div class="tables-responsive overflow-y-auto mt-10">
            <div class="w-full flex justify-end gap-5">
                <button name="downloadbtn" id="downloadbtn" class="px-7 py-3 mt-2 mb-8 text-white rounded-lg bg-theme-border-sidebar">
                    Download PDF<span class="ml-4 mt-4">
                        <iconify-icon icon="octicon:plus-16" class="text-sm"></iconify-icon>
                    </span>
                </button>
            </div>
        </div>
            <table class="tables table-cencus w-full" id="table-cencus">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Tanggal</th>
                        <th>Jumlah Tempat Tidur</th>
                        <th>BOR %</th>
                        <th>LOS(HARI)</th>
                        <th>TOI(HARI)</th>
                        <th>BTO(KALI)</th>
                        <th>GDR(PERMILL)</th>
                        <th>NDR(PERMILL)</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($indicators as $indicator)
                        <tr>
                            <td name="no">{{ $loop->iteration }}</td>
                            <td name="tanggal">{{ $indicator->date }}</td>
                            <td name="jumlahtd">{{ $indicator->beds_total }}</td>
                            <td name="bor">{{ $indicator->bor }}</td>
                            <td name="los">{{ $indicator->alos }}</td>
                            <td name="toi">{{ $indicator->toi }}</td>
                            <td name="bto">{{ $indicator->bto }}</td>
                            <td name ="gdr">{{ $indicator->gdr }}</td>
                            <td name="ndr">{{ $indicator->ndr }}</td>
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
                    cellwidth: 120,
                },
                1: {
                    cellwidth: 120,
                },
                2: {
                    cellwidth: 120,
                }
            },
            styles: {
                minCellHeight: 50
            }
        });
        doc.save('Cencus_Harian.pdf');
    }
</script>
    @endpush
