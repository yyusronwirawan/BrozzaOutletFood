<!DOCTYPE html>
<html>
<head>
    @include('export.styleCetak')
</head>
<body>
    <h2>Data Pengiriman</h2>
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Tanggal</th>
                <th>Jadwal Pengiriman</th>
                <th>Kode Pemesanan</th>
                <th>Nama Supir</th>
                <th>Jenis Truk</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($pengiriman as $item)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $item->jadwal_pengiriman->Tanggal }}</td>
                    <td>{{ $item->jadwal_pengiriman->Tujuan }}</td>
                    <td>{{ $item->pemesanan->kode_pesanan }}</td>
                    <td>{{ $item->supir->user->nama_pengguna }}</td>
                    <td>{{ $item->truk->jenis_truk }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
