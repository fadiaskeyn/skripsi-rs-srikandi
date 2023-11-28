@extends('layouts.app')
@section('content')

   <div class="space-y-8">
        <div class="border rounded-md p-10 shadow-sm">
            <h2 class="text-2xl font-bold">Grafik Barber Jhonson</h2>
            <div class="lg:flex justify-between">
                <div class="w-full">
                    <div class="mt-8 grid grid-cols-1 gap-5 lg:max-w-lg max-w-full">
                        <div class="flex gap-5">
                            <label for="" class="mt-3">Periode</label>
                            <select name="" class="bg-gray-100 rounded-full p-3 w-full" id="">
                                <option value="">-- Pilih Periode --</option>
                            </select>
                        </div>
                        <div class="flex gap-5">
                            <label for="" class="mt-3">Tanggal</label>
                            <div class="lg:flex lg:space-y-0 space-y-5 gap-5 w-full">
                                <input class="bg-gray-100 rounded-full p-3 w-full" type="date" name="" id="">
                                <input class="bg-gray-100 rounded-full p-3 w-full" type="date" name="" id="">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="mt-8 flex justify-center">
                    <div>
                        <button class="bg-theme-secondary px-8 rounded-md py-2 font-bold text-white">Filter</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="border p-10 rounded-md shadow-sm">
            <div class="lg:flex justify-center w-full">
                <div class="w-full text-center lg:text-left p-5 space-y-8">
                    <h2 class="font-bold text-2xl">Grafik Barber Jhonson</h2>
                    <div id="chart"></div>
                </div>
                <div class="lg:w-2/4 w-full">
                    <x-content.table-chart/>
                </div>
            </div>
        </div>
    </div>

   
@endsection

@push('script-injection')
<script>

var options = {
  series: [{
    name: "BOR",
    data: [
      [0.0, 35.48],
      [0.0, 64.52],
      [0.0, 35.48],
      [0.0, 46.52]
    ]
  }, {
    name: "LOS",
    data: [
      [0.0, 3.05],
      [5.85, 5.85]
    ]
  }, {
    name: "TOI",
    data: [
      [3.05, 3.05],
      [0.0, 5.85]
    ]
  }, {
    name: "BTO",
    data: [
      [8.58, 0.0],
      [0.0, 8.58]
    ]
  }, {
    name: "TITIK",
    data: [
      [3.0, 5.85],
      [3.0, 0.0]
    ]
  }],
  chart: {
    height: 350,
    type: 'scatter',
    zoom: {
      enabled: true,
      type: 'xy'
    }
  },
  xaxis: {
    tickAmount: 10,
    labels: {
      formatter: function(val) {
        return parseFloat(val).toFixed(1);
      }
    },
    categories: [0, 35.48, 64.52, 46.52]
  },
  yaxis: {
    tickAmount: 7,
    categories: [0, 35.48, 64.52, 46.52]
  }
};  
    var chart = new ApexCharts(document.querySelector("#chart"), options);
    chart.render();

</script>


@endpush
