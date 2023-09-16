@extends('outlet.master')
@section('content')
    <div class="container">
        <div class="tb_pemesanan ">
            <div class=" "
                style="border-style: dashed; border-color:#537fe7; padding:4px 20px 230px;overflow:hidden; max-height: 700px;">
                <div class="col border rounded p-3 my-2 "
                    style="background-color: rgba(238, 238, 238, 0.2); margin-bottom :-220px;">
                    <h3 class="mb-2 text-center ">DATA PEMESANAN</h3>
                    <div class="mx-3">
                        <p>Cari Kode Pemesanan</p>
                        <form class="d-flex" action="{{ route('dataPemesanan.search.outlet') }}" method="get">
                            <input class=" form-control" type="text" name="search" placeholder="Cari Barang .."
                                value="{{ old('search') }}">
                            <input type="submit" value="search" class="btn btn-outline-primary mx-2">
                        </form>
                        <a href="{{ route('exportpemesanan') }}">
                            <button type="button" class="btn btn-outline-danger my-2">
                                <i class="bi bi-filetype-pdf"></i>
                                Export PDF
                            </button>
                        </a>
                    </div>
                    <input value="{{ Auth::user()->id }}" type="hidden" name="id">
                    <div class="table-responsive rounded mx-2" style="overflow:auto; max-height: 500px;">
                        <table class="table rounded ">
                            <thead class="table-primary ">
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Kode Pemesanan</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Nama Barang</th>
                                    <th scope="col">Jumlah </th>
                                    <th scope="col">Total Harga</th>
                                    {{-- <th scope="col">Opsi</th> --}}
                                </tr>
                            </thead>
                            <tbody id="tabel-body">
                                @if ($pemesanan->isEmpty())
                                    <tr>
                                        <td colspan="7" class="text-center">Data tidak ditemukan.</td>
                                    </tr>
                                @endif
                                @foreach ($pemesanan as $item)
                                    <tr>
                                        <th scope="row">{{ $loop->iteration }}</th>
                                        <td>{{ $item->kode_pesanan }}</td>
                                        <td>{{ $item->status }}</td>
                                        <td>{{ $item->barangs->nama_barang }}</td>
                                        <td>{{ $item->jumlah_barang }}</td>
                                        <td>{{ $item->total_harga }}</td>
                                        {{-- <td>
                                            <button type="button" class="btn btn-outline-danger" >
                                                <a class=" text-decoration-none text-black" href="{{ route('pemesanan.delete', ['id' => $item->id]) }}">
                                                    <i class="bi bi-trash"></i>
                                                </a>
                                            </button>
                                        </td> --}}
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div class="d-flex justify-content-center"style="margin-top: -40px;">
                            {{ $pemesanan->links('pagination::bootstrap-5') }}

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
