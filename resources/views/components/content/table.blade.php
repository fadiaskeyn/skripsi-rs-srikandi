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
                        <a href="/edit/{{ $row['id'] }}">Edit</a> <!-- Tautan untuk mengedit -->
                        <a href="/delete/{{ $row['id'] }}">Hapus</a> <!-- Tautan untuk menghapus -->
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>