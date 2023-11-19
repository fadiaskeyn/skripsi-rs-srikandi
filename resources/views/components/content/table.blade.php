@props([
    'edit' => '',
    'url' => ''
])

<div class="tables-responsive overflow-y-auto mt-10">
    <table class="tables">
        <thead>
            <tr>
                @foreach ($headers as $header)
                    <th>{{ $header }}</th>
                @endforeach
            </tr>
        </thead>
        <tbody>
            @foreach ($rows as $row)
            
                <tr>
                    @foreach ($row as $cell)
                        <td>{{ $cell }}</td>
                    @endforeach
                    <td>
                        <a class="inline-flex  items-center px-4 py-2 rounded-lg bg-theme-border-sidebar/20 text-theme-border-sidebar text-sm md:text-left font-medium" href="{{ route($edit, $row['id']) }}">Edit</a> 
                        <button class="inline-flex items-center px-4 py-2 rounded-lg bg-theme-border-sidebar text-white text-sm md:text-left font-medium" href=""  onclick="confirmDelete({{ $row['id'] }})">Hapus</button>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@push('script-injection')
<script>
    function confirmDelete(id) {
    if (confirm("Apakah anda yakin ingin menghapus data ini?")) {
        $.ajax({
            url: '{{ $url }}' + id,
            type: 'DELETE',
            data: {
                _token: "{{ csrf_token() }}"
            },
            success: function(response) {
                alert(response.success);
                window.location.reload();
            }
        });
    }
}
</script>
@endpush