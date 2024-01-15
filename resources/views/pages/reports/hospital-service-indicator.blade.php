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
    </form>
        {{-- Table --}}
        <div class="tables-responsive overflow-y-auto mt-10">
            <table class="tables">
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
<script>
   function fetchData() {
    const ruangan = $('#ruangan').val();
    const tanggalStart = $('#tanggal_start').val();
    const tanggalEnd = $('#tanggal_end').val();

    $.ajax({
        url: '{{ route('admin.admin.laporan.indikator.ajax') }}',
        method: 'GET',
        data: {
            ruangan: ruangan,
            tanggal_start: tanggalStart,
            tanggal_end: tanggalEnd,
        },
        success: function(response) {
            // Update table content with the new data
            updateTable(response.data);
        },
        error: function(error) {
            console.error(error);
        }
    });
}

// Set up event listeners
$('#ruangan, #tanggal_start, #tanggal_end').change(function() {
    // Fetch data only if all three elements are selected
    if ($('#ruangan').val() && $('#tanggal_start').val() && $('#tanggal_end').val()) {
        fetchData();
    }
});

// Filter button click event
$('#filterBtn').click(function() {
    fetchData();
});
fetchData();

// Function Untuk merubah tabel
    function updateTable(data) {
    // Reset table body content
    $('tbody').html('');

    // Iterate through each data entry and append it to the table
    data.forEach((entry, index) => {
        $('tbody').append(`
            <tr>
                <td name="no">${index + 1}</td>
                <td name="tanggal">${entry.date}</td>
                <td name="jumlahtd">${entry.beds_total}</td>
                <td name="bor">${entry.bor}</td>
                <td name="los">${entry.alos}</td>
                <td name="toi">${entry.toi}</td>
                <td name="bto">${entry.bto}</td>
                <td name ="gdr">${entry.gdr}</td>
                <td name="ndr">${entry.ndr}</td>
            </tr>
        `);
    });
}

</script>
@endpush

