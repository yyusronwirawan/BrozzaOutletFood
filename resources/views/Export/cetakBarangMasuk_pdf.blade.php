<!DOCTYPE html>
<html>
<head>
    <title>Data Barang Masuk</title>
    @include('Export.styleCetak')
</head>
<body>
    <h2>Data Barang Masuk</h2>
    <table>
        <thead>
            <tr>
                <th>#</th>
                <th>Nama Barang</th>
                <th>Nama Pegawai</th>
                <th>Jumlah Stok Masuk</th>
                <th>Tanggal</th>
            </tr>
        </thead>
        <tbody>
            @foreach($BarangMasuk as $index => $data)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $data->barangs->nama_barang }}</td>
                    <td>{{ $data->users->nama_pengguna }}</td>
                    <td>{{ $data->jumlah }}</td>
                    <td>{{ $data->tanggal }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
