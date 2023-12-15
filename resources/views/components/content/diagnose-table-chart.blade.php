<table class="tables mt-8">
    <thead>
        <tr>
            <th class="bg-theme-secondary text-white">No</th>
            <th class="bg-theme-secondary text-white">Kode ICD-10</th>
            <th class="bg-theme-secondary text-white">Diagnosa</th>
            <th class="bg-theme-secondary text-white">Total Pasien</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($diagnoses->diagnoses as $diagnose)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $diagnose->diagnose->code_diagnosis }}</td>
            <td>{{ $diagnose->diagnose->name }}</td>
            <td>{{ $diagnose->total }}</td>
        </tr>
        @endforeach
    </tbody>
</table>
