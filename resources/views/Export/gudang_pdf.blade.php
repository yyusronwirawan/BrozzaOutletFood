<style>

    table {
        width: 100%;
        border-collapse: collapse;
    }

    th,
    td {
        border: 1px solid #ccc;
        padding: 8px;
    }

    th {
        background-color: #f2f2f2;
    }

    tr:nth-child(even) {
        background-color: #f9f9f9;
    }

    tr:hover {
        background-color: #e9e9e9;
    }
</style>

<table>
    <caption>DATA GUDANG</caption>
    <thead>
        <tr>
            <th>No</th>
            <th>Nama Gudang</th>
            <th>Alamat</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($gudangs as $g)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $g->nama_gudang }}</td>
                <td>{{ $g->alamat }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
