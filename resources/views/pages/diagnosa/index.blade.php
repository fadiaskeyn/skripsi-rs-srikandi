@extends('layouts.app')
@section('content')
    <div class="w-full bg-white">
        <div class="space-y-8">
            <div class="head">
                <h2 class="text-3xl font-bold">Data Diagnosa</h2>
            </div>
            <div class="line h-2 rounded-full w-full bg-theme-border-sidebar/20">
                <div class="line h-2 rounded-full w-2/4 bg-theme-border-sidebar"></div>
            </div>
        </div>
        <div class="mt-5 max-w-2xl space-y-5">
            <x-forms.input name="kode-diagnosa" type="text" id="kode-diagnosa" label="Kode Diagnosa" />
            <x-forms.input name="diagnosa" type="text"  id="diagnosa" label="Diagnosa" />
        </div>
        <div class="shadow border p-5 mt-20 bg-white">
            <div class="p-2 lg:flex grid space-y-5 grid-cols-1 justify-between">
                <div class="mt-3 w-full">
                    <h2 class="text-2xl font-bold">Table Diagnosa</h2>
                </div>
                <div class="w-full flex justify-end gap-5">
                    <a href="#" class="px-7 py-3 text-white rounded-lg bg-theme-border-sidebar">Simpan<span class="ml-4 mt-4"><iconify-icon icon="octicon:plus-16" class="text-sm"></iconify-icon></span></a>
                    <a href="#" class="px-7 py-3 text-white rounded-lg bg-theme-border-sidebar">Batal<span class="ml-4 mt-4"></span></a>
                    <a href="#" class="px-7 py-3 text-white rounded-lg bg-theme-border-sidebar">Insert File<span class="ml-4 mt-4"></span></a>
                </div>
            </div>
            <div class="flex justify-end">
                <div class="input-box-search flex mt-5 border">
                    <button class="px-3 py-2 text-lg"><iconify-icon icon="clarity:search-line"></iconify-icon></button>
                    <input type="search" placeholder="Search" class="p-2 outline-none w-full">
                </div>
            </div>
            {{-- Table --}}
            <x-content.table :headers="['No.','Kode Diagnosa','Diagnosa','Action']" :rows="[]" edit="admin.diagnosa.edit" delete="admin.diagnosa.destroy" />
        </div>
    </div>
@endsection
