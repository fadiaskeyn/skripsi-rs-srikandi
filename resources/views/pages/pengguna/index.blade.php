@extends('layouts.app')
@section('content')
    <div class="w-full bg-white">
        <div class="space-y-8">
            <div class="head">
                <h2 class="text-3xl font-bold">Data Pengguna</h2>
            </div>
            <div class="line h-2 rounded-full w-full bg-theme-border-sidebar/20">
                <div class="line h-2 rounded-full w-2/4 bg-theme-border-sidebar"></div>
            </div>
        </div>
        <div class="shadow border p-5 mt-20 bg-white">
            <div class="p-2 lg:flex grid space-y-5 grid-cols-1 justify-between">
                <div class="mt-3">
                    <h2 class="text-2xl font-bold">Table Pengguna</h2>
                </div>
                <div>
                    <a href="{{ route('pengguna.create') }}" class="px-7 py-3 text-white rounded-lg bg-theme-border-sidebar">Tambah Pengguna <span class="ml-4 mt-4"><iconify-icon icon="octicon:plus-16" class="text-sm"></iconify-icon></span></a>
                </div>
            </div>

            @php
                
              $data = [
                ['id' => 1, 'cell1' => 'Row 1, Cell 1', 'cell2' => 'Row 1, Cell 2', 'cell3' => 'Row 1, Cell 3'],
                ['id' => 2, 'cell1' => 'Row 2, Cell 1', 'cell2' => 'Row 2, Cell 2', 'cell3' => 'Row 2, Cell 3'],
                ['id' => 3, 'cell1' => 'Row 3, Cell 1', 'cell2' => 'Row 3, Cell 2', 'cell3' => 'Row 3, Cell 3']
            ];

            @endphp
            {{-- Table --}}
            <x-content.table :headers="['No','Row 1, Cell 1', 'Row 1, Cell 2', 'Row 1, Cell 3', 'Action']" :rows="$data" />

        </div>
    </div>
@endsection
