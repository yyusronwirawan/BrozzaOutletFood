@extends('outlet.master')
@section('content')
<div class="container">
    <div class="tb-gudang  ">
        <div style="border-style: dashed; border-color:#537fe7; padding:4px 20px 230px;overflow:auto; max-height: 700px;">
            <div class="col border rounded p-2 mt-2">
                <h3 class="my-3 text-center ">DATA BARANG</h3>
                <p>Cari Data Barang:</p>
                <form class="d-flex" action="{{ route('barang.cari') }}" method="get">
                    <input class=" form-control" type="text" name="search" placeholder="Cari Barang .."
                        value="{{ old('search') }}">
                    <input type="submit" value="search" class="btn btn-outline-primary mx-2">
                </form>
                @include('kebutuhan.alert')
                <div class="table-responsive mt-5 ">
                    <table class="table ">
                        <thead class="table-primary">
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Nama Barang</th>
                                <th scope="col">Harga</th>
                                <th scope="col">Satuan</th>
                                <th scope="col">Kategori</th>
                                <th scope="col">Gudang</th>
                                <th scope="col">Jumlah Stok</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if ($barangs->isEmpty())
                                <tr>
                                    <td colspan="8" class="text-center">Data tidak ditemukan.</td>
                                </tr>
                            @endif
                            @foreach ($barangs as $b)
                                <tr>
                                    <th scope="row">{{ $loop->iteration }}</th>
                                    <td>{{ $b->nama_barang }}</td>
                                    <td>{{ $b->harga }}</td>
                                    <td >{{ $b->satuan }}</td>
                                    <td>
                                        {{-- Menampilka nama kategori sesuai  dengan id --}}
                                        {{ $b->kategoris->nama_kategori }}
                                    </td>
                                    <td>
                                        {{-- Menampilka nama gudang sesuai  dengan id --}}
                                        {{ $b->gudangs->nama_gudang }}
                                    </td>
                                    <td class="text-center">{{ $b->stok_akhir }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                {{ $barangs->links('pagination::bootstrap-5') }}
            </div>
        </div>
    </div>
</div>
@endsection
