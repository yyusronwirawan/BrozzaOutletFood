<!DOCTYPE html>
<html>
<head>
    <title>Data Penerima Barang</title>
    @include('Export.styleCetak')
</head>
<body>
    <h2>Data Penerima Barang</h2>
    <table >
        <thead >
            <tr>
                <th >#</th>
                <th >Kode Pemesanan</th>
                <th >Nama Outlet</th>
                <th >Nama Barang</th>
                <th >Jumlah Stok</th>
                <th >Tanggal</th>
                <th >Status </th>
            </tr>
        </thead>
        <tbody>
            @foreach ($penerimaBarangs as $penerimaan)
                <tr>
                    <th >{{ $loop->iteration }}</th>
                    <td>{{ $penerimaan->pengiriman->pemesanan->kode_pesanan }}</td>
                    <td>{{ $penerimaan->pengiriman->pemesanan->outlet->user->nama_pengguna}}</td>
                    <td>{{ $penerimaan->pengiriman->pemesanan->barangs->nama_barang }}</td>
                    <td>{{ $penerimaan->pengiriman->pemesanan->jumlah_barang }}</td>
                    <td>{{ $penerimaan->Tanggal}}</td>
                    <td>{{$penerimaan->status}}</td>
            @endforeach
            </tr>
        </tbody>
    </table>
</body>
</html>
