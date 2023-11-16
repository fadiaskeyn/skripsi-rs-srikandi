@extends('layouts.app')
@section('content')
    <div class="w-full bg-white">
        <div class="space-y-8">
            <div class="head">
                <h2 class="text-3xl font-bold">Grafik Rawat Inap</h2>
            </div>
        </div>
        
        {{-- <div class="max-w-sm rounded overflow-hidden shadow-lg">
            <div class="px-6 py-4">
                <div class="font-bold text-xl mb-2">Form Filter</div>
                <p class="text-gray-700 text-base">Gunakan filter untuk melihat grafik</p>
            </div>
            <hr>
            <div class="px-6 py-4">
                <form action="#" autocomplete="off">
                    <div class="md:flex md:items-center mb-6 gap-2">
                        <div class="md:flex md:items-center mb-6 gap-2">
                            <div class="md:w-1/3">
                                <label class="block text-gray-500 font-bold mx-auto md:text-left mb-1 md:mb-0" for="inline-full-name">
                                    Kategori
                                </label>
                            </div>
                            <div class="md:w-2/3 relative">
                                <select name="role" id=""  class="bg-gray-200 appearance-none border-2 border-gray-200 rounded-full w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white">
                                    <option selected disabled value="0">Pilih akses</option>
                                </select>
                                <span class="absolute right-4 top-2"><iconify-icon icon="ep:arrow-down-bold"></iconify-icon></span>
                            </div>
                        </div>
                    </div>
                    <div class="md:flex md:items-center mb-6 gap-2">
                        <div class="md:w-1/3">
                            <label class="block text-gray-500 font-bold mx-auto md:text-left mb-1 md:mb-0" for="inline-full-name">
                                Tanggal
                            </label>
                        </div>
                        <div class="md:w-2/3">
                            <input type="date" class="bg-gray-200 appearance-none border-2 border-gray-200 rounded-full w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white"> - 
                            <input type="date" class="bg-gray-200 appearance-none border-2 border-gray-200 rounded-full w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white">
                        </div>
                    </div>
                </form>
            </div>
        </div> --}}

        <div class="grid grid-cols-2 gap-6">
            <div class="">
                <div class="max-w-sm rounded overflow-hidden shadow-lg px-6 py-4">
                {!! $chart->container() !!}
                </div>
            </div>
            <div class="col-span-6">
                <div class="max-w-sm rounded overflow-hidden shadow-lg px-6 py-4">

                     {{-- Table --}}
                   <x-content.table-chart/>

                </div>
            </div>
        </div>
    </div>
@endsection

@push('script-injection')
    {!! $chart->script() !!}
    
@endpush
