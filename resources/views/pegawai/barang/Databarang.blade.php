@extends('pegawai.master')
@section('content')
    <div class="container">
        <div class="tb-gudang  ">
            <div style="border-style: dashed; border-color:#537fe7; padding:4px 20px 230px;overflow:auto; max-height: 700px;">
                <div class="col border rounded p-2 mt-2">
                    <h3 class="my-3 text-center ">DATA BARANG</h3>
                    <p>Cari Data Barang:</p>
                    <form class="d-flex" action="{{ route('barang.search.pegawai') }}" method="get">
                        <input class=" form-control" type="text" name="search" placeholder="Cari Barang .."
                            value="{{ old('search') }}">
                        <input type="submit" value="search" class="btn btn-outline-primary mx-2">
                    </form>
                    <button type="button" class="btn btn-outline-primary my-4" data-bs-toggle="modal"
                        data-bs-target="#exampleModal">
                        <i class="bi bi-bag-plus-fill"></i> Tambah Barang
                    </button>
                    <a href="{{route('exportbarang')}}">
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
                                    <th scope="col">Harga</th>
                                    <th scope="col">Satuan</th>
                                    <th scope="col">Kategori</th>
                                    <th scope="col">Gudang</th>
                                    <th scope="col">Jumlah Stok</th>
                                    <th scope="col">Opsi</th>
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
                                        <td>{{ $b->satuan }}</td>
                                        <td>
                                            {{-- Menampilka nama kategori sesuai  dengan id --}}
                                            {{ $b->kategoris->nama_kategori }}
                                        </td>
                                        <td>
                                            {{-- Menampilka nama gudang sesuai  dengan id --}}
                                            {{ $b->gudangs->nama_gudang }}
                                        </td>
                                        <td>{{ $b->stok_akhir }}</td>
                                        <td>
                                            <button type="button" class="btn btn-outline-warning">
                                                <a class="text-decoration-none text-black" href="#" data-bs-toggle="modal"
                                                    data-bs-target="#exampleModalEdit{{ $b->id }}">
                                                    <i class="bi bi-pencil-square"></i>
                                                </a>
                                            </button>
                                            <!-- Modal Edit barang start-->
                                            <div class="modal fade" id="exampleModalEdit{{ $b->id }}" tabindex="-1"
                                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Data
                                                                Barang</h1>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                                aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form action="{{ route('barang.update.pegawai') }}" method="POST">
                                                                {{-- mengubah method --}}
                                                                @method('put')
                                                                @csrf
                                                                <input type="hidden" name="id"
                                                                    value="{{ $b->id }}">
                                                                <div class="mb-3">
                                                                    <label for="nama" class="form-label">Nama
                                                                        Barang</label>
                                                                    <input type="text" class="form-control" id="nama"
                                                                        name="nama_barang" value="{{ $b->nama_barang }}">
                                                                </div>
                                                                <div class="mb-3">
                                                                    <label for="kategori_id" class="form-label">Masukkan
                                                                        Kategori</label>
                                                                    <select name="kategori_id" id="kategori_id"
                                                                        class="form-control js-example-basic-single">
                                                                        <option value="{{ $b->kategori_id }}">
                                                                            {{ $b->kategoris->nama_kategori }} </option>
                                                                        <option> Pilih Kategori</option>
                                                                        {{-- Menampilkan nama kategori sesuia dengan id --}}
                                                                        @foreach ($kategoris as $k)
                                                                            <option value="{{ $k->id }}">
                                                                                {{ $k->nama_kategori }}</option>
                                                                        @endforeach
                                                                    </select>
                                                                </div>
                                                                <div class="mb-3">
                                                                    <label for="gudang_id" class="form-label">Masukkan
                                                                        Gudang</label>
                                                                    <select name="gudang_id" id="gudang_id"
                                                                        class="form-control js-example-basic-single">
                                                                        <option value="{{ $b->gudang_id }}">
                                                                            {{ $b->gudangs->nama_gudang }} </option>
                                                                        <option> Pilih Gudang</option>
                                                                        {{-- Menampilka nama gudang sesuai  dengan id --}}
                                                                        @foreach ($gudangs as $gudang)
                                                                            <option value="{{ $gudang->id }}">
                                                                                {{ $gudang->nama_gudang }}</option>
                                                                        @endforeach
                                                                    </select>
                                                                </div>
                                                                <div class="mb-3">
                                                                    <label for="harga" class="form-label">Harga</label>
                                                                    <input type="text" class="form-control" id="harga"
                                                                        name="harga" value="{{ $b->harga }}">
                                                                </div>
                                                                <div class="mb-3">
                                                                    <label for="satuan" class="form-label">Satuan</label>
                                                                    <input type="text" class="form-control" id="satuan"
                                                                        name="satuan" value="{{ $b->satuan }}">
                                                                </div>
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
                                            <!-- Modal end -->
                                            <button type="button" class="btn btn-outline-danger">
                                                <a class="text-decoration-none text-black"
                                                    href="{{ route('barang.delete.pegawai', ['id' => $b->id]) }}">
                                                    <i class="bi bi-trash"></i>
                                                </a>
                                            </button>
                                            <button type="button" class="btn btn-outline-primary">
                                                <a class="text-decoration-none text-black" href="#"
                                                    data-bs-toggle="modal"
                                                    data-bs-target="#exampleModalinfo{{ $b->id }}">
                                                    <i class="bi bi-info-lg"></i>
                                                </a>
                                            </button>
                                            <!-- Modal info barang start-->
                                            <div class="modal fade" id="exampleModalinfo{{ $b->id }}" tabindex="-1"
                                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h1 class="modal-title fs-5" id="exampleModalLabel"> Data Barang
                                                            </h1>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                                aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            {{-- menampilkandetail barang --}}
                                                            <form>
                                                                <!-- Form fields for displaying barang information -->
                                                                <div class="mb-3">
                                                                    <label for="nama" class="form-label">Nama
                                                                        Barang</label>
                                                                    <input type="text" class="form-control" id="nama"
                                                                        name="nama_barang" value="{{ $b->nama_barang }}"
                                                                        readonly>
                                                                </div>
                                                                <div class="mb-3">
                                                                    <label for="kategori_id"
                                                                        class="form-label">Kategori</label>
                                                                    <input type="text" class="form-control" id="kategori"
                                                                        name="kategori"
                                                                        value="@php $kategori = DB::table('kategoris')
                                                                        ->where('id', $b->kategori_id)->get();
                                                                        foreach ($kategori as $k) {
                                                                            echo $k->nama_kategori;
                                                                        } @endphp"
                                                                        readonly>
                                                                </div>
                                                                <div class="mb-3">
                                                                    <label for="gudang_id" class="form-label">Gudang</label>
                                                                    <input type="text" class="form-control" id="gudang"
                                                                        name="gudang"
                                                                        value="@php $gudang = DB::table('gudangs')
                                                                            ->where('id', $b->gudang_id)
                                                                            ->get();
                                                                        foreach ($gudang as $g) {
                                                                            echo $g->nama_gudang;
                                                                        } @endphp"
                                                                        readonly>
                                                                </div>
                                                                <div class="mb-3">
                                                                    <label for="harga" class="form-label">Harga</label>
                                                                    <input type="text" class="form-control" id="harga"
                                                                        name="harga" value="{{ $b->harga }}" readonly>
                                                                </div>
                                                                <div class="mb-3">
                                                                    <label for="satuan" class="form-label">Satuan</label>
                                                                    <input type="text" class="form-control" id="satuan"
                                                                        name="satuan" value="{{ $b->satuan }}" readonly>
                                                                </div>
                                                                <div class="mb-3">
                                                                    <label for="stok_awal" class="form-label">Stok
                                                                        awal</label>
                                                                    <input type="text" class="form-control" id="stok_awal"
                                                                        name="stok_awal" value="{{ $b->stok_awal }}"
                                                                        readonly>
                                                                </div>
                                                                <div class="mb-3">
                                                                    <label for="stok_masuk" class="form-label">Stok
                                                                        masuk</label>
                                                                    <input type="text" class="form-control"
                                                                        id="stok_masuk" name="stok_masuk"
                                                                        value="{{ $b->stok_masuk }}" readonly>
                                                                </div>
                                                                <div class="mb-3">
                                                                    <label for="stok_keluar" class="form-label">Stok
                                                                        keluar</label>
                                                                    <input type="text" class="form-control"
                                                                        id="stok_keluar" name="stok_keluar"
                                                                        value="{{ $b->stok_keluar }}" readonly>
                                                                </div>
                                                                <div class="mb-3">
                                                                    <label for="stok_akhir" class="form-label">Stok
                                                                        Akhir</label>
                                                                    <input type="text" class="form-control"
                                                                        id="stok_akhir" name="stok_akhir"
                                                                        value="{{ $b->stok_akhir }}" readonly>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Modal info barang end -->
                                        </td>
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
    <!-- Modal tambah barang start-->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Data Barang</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('barang.create.pegawai') }}" method="POST">
                        {{ csrf_field() }}
                        <div class="mb-3">
                            <label for="nama" class="form-label">Masukkan Nama Barang</label>
                            <input type="text" class="form-control" id="nama" name="nama_barang">
                        </div>
                        <div class="mb-3">
                            <label for="kategori_id" class="form-label">Masukkan Kategori</label>
                            <select name="kategori_id" id="kategori_id" class="form-control js-example-basic-single">
                                <option> Pilih Kategori</option>
                                {{-- Menampilkan nama kategori sesuia dengan id --}}
                                @foreach ($kategoris as $k)
                                    <option value="{{ $k->id }}">{{ $k->nama_kategori }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="gudang_id" class="form-label">Masukkan Gudang</label>
                            <select name="gudang_id" id="gudang_id" class="form-control js-example-basic-single">
                                <option> Pilih Gudang</option>
                                {{-- Menampilka nama gudang sesuai  dengan id --}}

                                @foreach ($gudangs as $gudang)
                                    <option value="{{ $gudang->id }}">{{ $gudang->nama_gudang }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="harga" class="form-label">Masukkan Harga</label>
                            <input type="text" class="form-control" id="harga" name="harga">
                        </div>
                        <div class="mb-3">
                            <label for="satuan" class="form-label">Masukkan Satuan</label>
                            <input type="text" class="form-control" id="satuan" name="satuan">
                        </div>
                        <div class="mb-3">
                            <label for="stok_awal" class="form-label">Masukkan Stok Awal</label>
                            <input type="text" class="form-control" id="stok_awal" name="stok_awal">
                        </div>
                        {{-- hidden --}}
                        <input type="hidden" name="stok_masuk" value="0">
                        <input type="hidden" name="stok_keluar" value="0">
                        {{-- end hidden --}}

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
