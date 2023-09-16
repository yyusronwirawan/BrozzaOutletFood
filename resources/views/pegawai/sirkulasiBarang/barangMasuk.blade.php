@extends('pegawai.master')
@section('content')
    <div class="container">
        <div class="tb-gudang  ">
            <div
                style="border-style: dashed; border-color:#537fe7; padding:4px 20px 230px;overflow:auto; max-height: 700px;">
                <div class="col border rounded p-2 mt-2 ">
                    <h3 class="my-3 text-center ">DATA BARANG MASUK</h3>
                    <p>Cari Data Barang:</p>
                    <form class="d-flex" action="{{ route('barangMasuk.search.pegawai') }}" method="GET">
                        <input class=" form-control" type="text" name="search" placeholder="Cari Barang .."
                            value="{{ old('search') }}">
                        <input type="submit" value="search" class="btn btn-outline-primary mx-2">
                    </form>
                    {{-- <a href="#" class="btn btn-primary  mb-4 mt-4">+ Tambah Data Gudang </a> --}}
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-outline-primary my-4" data-bs-toggle="modal"
                        data-bs-target="#exampleModal">
                        <i class="bi bi-bag-plus-fill"></i> Tambah Stok Barang
                    </button>
                    <a href="{{ route('exportbarangmasuk') }}">
                        <button type="button" class="btn btn-outline-danger">
                            <i class="bi bi-filetype-pdf"></i>
                            Export PDF
                        </button>
                    </a>
                    @include('kebutuhan.alert')
                    <div class="table-responsive">
                        <table class="table ">
                            <thead class="table-primary">
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Nama Barang</th>
                                    <th scope="col">Nama Pegawai</th>
                                    <th scope="col">Jumlah Stok Masuk</th>
                                    <th scope="col">Tanggal</th>
                                    <th scope="col">Opsi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if ($BarangMasuk->isEmpty())
                                    <tr>
                                        <td colspan="6" class="text-center">Data tidak ditemukan.</td>
                                    </tr>
                                @endif
                                @foreach ($BarangMasuk as $index => $item)
                                    <tr>
                                        <th scope="row">{{ $index + 1 }}</th>
                                        <td>{{ $item->barangs->nama_barang }}</td>
                                        <td>{{ $item->users->nama_pengguna }}</td>
                                        <td>{{ $item->jumlah }}</td>
                                        <td>{{ $item->tanggal }}</td>
                                        <td>
                                            <button type="button" class="btn btn-outline-warning">
                                                <a class="text-decoration-none text-black" href="#"
                                                    data-bs-toggle="modal"
                                                    data-bs-target="#exampleModalEdit{{ $item->id }}">
                                                    <i class="bi bi-pencil-square"></i>
                                                </a>
                                            </button>
                                            <!-- Modal Edit start-->
                                            <div class="modal fade" id="exampleModalEdit{{ $item->id }}" tabindex="-1"
                                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Data
                                                                Barang
                                                                Masuk</h1>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                                aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form action="{{ route('barangMasuk.update.pegawai') }}"
                                                                method="POST">
                                                                @method('PUT')
                                                                @csrf
                                                                <input type="hidden" class="form-control" id="id"
                                                                    name="id" value="{{ $item->id }}">
                                                                <div class="mb-3">
                                                                    <label for="id_barang" class="form-label">Nama
                                                                        Barang</label>
                                                                    <select name="id_barang" id="id_barang"
                                                                        class="form-control">
                                                                        <option value="{{ $item->id_barang }}">
                                                                            {{ $item->barangs->nama_barang }}</option>
                                                                        <option value="">Pilih Barang</option>
                                                                        {{-- Menampilkan nama barang sesuai dengan id --}}
                                                                        @foreach ($barangs as $barang)
                                                                            <option value="{{ $barang->id }}">
                                                                                {{ $barang->nama_barang }}</option>
                                                                        @endforeach
                                                                    </select>
                                                                </div>
                                                                <div class="mb-3">
                                                                    <label for="jumlah" class="form-label">Jumlah
                                                                        Barang</label>
                                                                    <input type="number" class="form-control"
                                                                        id="jumlah" name="jumlah"
                                                                        value="{{ $item->jumlah }}">
                                                                </div>
                                                                <div class="mb-3">
                                                                    <label for="tanggal" class="form-label">Tanggal</label>
                                                                    <input type="date" class="form-control"
                                                                        id="tanggal" name="tanggal"
                                                                        value="{{ $item->tanggal }}">
                                                                </div>
                                                                <input type="hidden" class="form-control" id="id_pengguna"
                                                                    name="id_pengguna" value="{{ Auth::user()->id }}">
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary"
                                                                        data-bs-dismiss="modal">Close</button>
                                                                    <button type="submit" class="btn btn-primary">Save
                                                                        changes</button>
                                                                </div>
                                                            </form>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Modal Edit end -->

                                            <button type="button" class="btn btn-outline-danger">
                                                <a class="text-decoration-none text-black" href="#"
                                                    data-bs-toggle="modal"
                                                    data-bs-target="#exampleModalHapus{{ $item->id }}">
                                                    <i class="bi bi-trash"></i>
                                                </a>
                                            </button>
                                            <!-- Modal Delete start-->
                                            <div class="modal fade" id="exampleModalHapus{{ $item->id }}"
                                                tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h1 class="modal-title fs-5" id="exampleModalLabel">Konfirmasi
                                                                Hapus Data Barang
                                                                Masuk</h1>
                                                            <button type="button" class="btn-close"
                                                                data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form action="{{ route('barangMasuk.delete.pegawai') }}"
                                                                method="get">
                                                                {{-- @method('PUT')
                                                                @csrf --}}
                                                                <input type="hidden" class="form-control" id="id"
                                                                    name="id" value="{{ $item->id }}" readonly>
                                                                <div class="mb-3">
                                                                    <label for="id_barang" class="form-label">Nama
                                                                        Barang</label>
                                                                    <input type="text" class="form-control"
                                                                        value="{{ $item->barangs->nama_barang }}"
                                                                        readonly>
                                                                    <input type="hidden" class="form-control"
                                                                        id="id_barang" name="id_barang"
                                                                        value="{{ $item->id_barang }}" readonly>
                                                                </div>
                                                                <div class="mb-3">
                                                                    <label for="jumlah" class="form-label">Jumlah
                                                                        Barang</label>
                                                                    <input type="number" class="form-control"
                                                                        id="jumlah" name="jumlah"
                                                                        value="{{ $item->jumlah }}"readonly>
                                                                </div>
                                                                <div class="mb-3">
                                                                    <label for="tanggal"
                                                                        class="form-label">Tanggal</label>
                                                                    <input type="date" class="form-control"
                                                                        id="tanggal" name="tanggal"
                                                                        value="{{ $item->tanggal }}" readonly>
                                                                </div>
                                                                <input type="hidden" class="form-control"
                                                                    id="id_pengguna" name="id_pengguna"
                                                                    value="{{ Auth::user()->id }}" readonly>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary"
                                                                        data-bs-dismiss="modal">Close</button>
                                                                    <button type="submit"
                                                                        class="btn btn-danger">Hapus</button>
                                                                </div>
                                                            </form>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Modal Delete end -->
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    {{-- Pagination --}}
                    {{ $BarangMasuk->links('pagination::bootstrap-5') }}
                </div>
            </div>
        </div>
    </div>
    <!-- Modal start-->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Data Barang masuk</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('barangMasuk.create.pegawai') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="id_barang" class="form-label">Masukkan Nama Barang</label>
                            <select name="id_barang" id="id_barang" class="form-control">
                                <option value="">Pilih Barang</option>
                                {{-- Menampilkan nama barang sesuai dengan id --}}
                                @foreach ($barangs as $k)
                                    <option value="{{ $k->id }}">{{ $k->nama_barang }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="jumlah" class="form-label">Masukkan Jumlah Barang</label>
                            <input type="number" class="form-control" id="jumlah" name="jumlah">
                        </div>
                        <div class="mb-3">
                            <label for="tanggal" class="form-label">Masukkan Tanggal</label>
                            <input type="date" class="form-control" id="tanggal" name="tanggal">
                        </div>
                        <input type="hidden" class="form-control" id="id_pengguna" name="id_pengguna"
                            value="{{ Auth::user()->id }}">
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save changes</button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
    <!-- Modal end -->
@endsection
