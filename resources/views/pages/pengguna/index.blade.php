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
                    <button class="px-7 py-3 text-white rounded-lg bg-theme-border-sidebar">Tambah Pengguna <span class="ml-4 mt-4"><iconify-icon icon="octicon:plus-16" class="text-sm"></iconify-icon></span></button>
                </div>
            </div>
            <div class="tables-responsive overflow-y-auto mt-10">
                <table class="tables">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Nama Pengguna</th>
                            <th>Jabatan</th>
                            <th>Username</th>
                            <th>Password</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>Noga Muktiwati</td>
                            <td>Dokter</td>
                            <td>Noga</td>
                            <td>******</td>
                            <td class="flex gap-1 justify-center">
                                <button class="px-4 py-3  rounded-lg bg-theme-border-sidebar/20 text-theme-border-sidebar">Edit</button>
                                <button class="px-4 py-3 text-white rounded-lg bg-theme-border-sidebar">Hapus</button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
