<!DOCTYPE html>
<html>
<head>
    <title>Data Pemesanan</title>
    @include('Export.styleCetak')
</head>
<body>
    <h2>Data Pemesanan</h2>
    <table>
        <thead>
            <tr>
                <th>#</th>
                <th>Kode Pemesanan</th>
                <th>Nama Outlet</th>
                <th>Nama Barang</th>
                <th>Jumlah</th>
                <th>Total Harga</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($pemesanan as $item)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $item->kode_pesanan }}</td>
                    <td>{{ $item->outlet->user->nama_pengguna }}</td>
                    <td>{{ $item->barangs->nama_barang }}</td>
                    <td>{{ $item->jumlah_barang }}</td>
                    <td>{{ $item->total_harga }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
