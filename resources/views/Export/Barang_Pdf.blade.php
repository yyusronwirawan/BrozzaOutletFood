<style>

    h2 {
        text-align: center;
    }

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

<body>
    <h2>Data STOK Barang</h2>
    <table>
        <thead>
            <tr>
                <th>No.</th>
                <th>Nama Barang</th>
                <th>Harga</th>
                <th>Satuan</th>
                <th>Kategori</th>
                <th>Gudang</th>
                <th>Jumlah Stok</th>
            </tr>
        </thead>
        <tbody>
            @foreach($barangs as $barang)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $barang->nama_barang }}</td>
                <td>{{ $barang->harga }}</td>
                <td>{{ $barang->satuan }}</td>
                <td>{{ $barang->kategoris->nama_kategori }}</td>
                <td>{{ $barang->gudangs->nama_gudang }}</td>
                <td>{{ $barang->stok_akhir }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
