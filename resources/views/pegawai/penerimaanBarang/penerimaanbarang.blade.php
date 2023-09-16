@extends('pegawai.master')
@section('content')
    <div class="container">
        <div class="tb-gudang  ">
            <div class="col border rounded p-2 ">
                <h3 class="my-3 text-center ">DATA PENERIMAAN BARANG</h3>
                <p>Cari Data Penerimaan Barang:</p>
                <form class="d-flex" action="{{route('penerimaBarang.search.pegawai')}}" method="GET">
                    <input class=" form-control" type="text" name="search" placeholder="Cari Penerimaan Barang .."
                        value="{{ old('search') }}">
                    <input type="submit" value="search" class="btn btn-outline-primary mx-2">
                </form>
                <a href="{{route('exportpenerimabarang')}}">
                    <button type="button" class="btn btn-outline-danger mx-3 my-3">
                        <i class="bi bi-filetype-pdf"></i>
                        Export PDF
                    </button>
                </a>
                
                <div class="table-responsive">
                    <table class="table ">
                        <thead class="table-primary">
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Kode Pemesanan</th>
                                <th scope="col">Nama Outlet</th>
                                <th scope="col">Nama Barang</th>
                                <th scope="col">Jumlah Stok</th>
                                <th scope="col">Tanggal</th>
                                <th scope="col">Status </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($penerimaBarangs as $penerimaan)
                                <tr>
                                    <th scope="row">{{ $loop->iteration }}</th>
                                    <td>{{ $penerimaan->pengiriman->pemesanan->kode_pesanan }}</td>
                                    <td>{{ $penerimaan->pengiriman->pemesanan->outlet->user->nama_pengguna}}</td>
                                    <td>{{ $penerimaan->pengiriman->pemesanan->barangs->nama_barang }}</td>
                                    <td>{{ $penerimaan->pengiriman->pemesanan->jumlah_barang }}</td>
                                    <td>{{ $penerimaan->Tanggal}}</td>
                                    <td>{{$penerimaan->status}}</td>
                                    {{-- <td>
                                        <form action="{{route('penerimaanBarang.update')}}" method="POST">
                                            @csrf
                                            @method('PUT')
                                            <input type="hidden" name="id" value="{{$penerimaan->id}}" id="">
                                            @if ($penerimaan->status == 'Belum Diterima')
                                            <button type="submit" class="btn btn-danger btn-status-belum-diterima"    >{{$penerimaan->status}}</button>
                                            @else
                                            <button  type="submit" class="btn btn-success btn-status-sudah-diterima" disabled >{{$penerimaan->status}}</button>
                                            @endif
                                        </form>
                                    </td> --}}
                                </tr>
                            @endforeach
                            </tr>
                        </tbody>
                    </table>
                </div>
                {{-- Pagination --}}
                {{ $penerimaBarangs->links('pagination::bootstrap-5') }}
            </div>
        </div>
    </div>
@endsection
