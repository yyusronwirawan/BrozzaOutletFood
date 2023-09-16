@extends('pegawai.master')
@section('content')
    <div class="container">
        <div class="tb-Truk  ">
            <div
                style="border-style: dashed; border-color:#537fe7; padding:4px 20px 230px;overflow:auto; max-height: 700px;">
                <div class="col border rounded p-2 mt-2">
                    <h3 class="my-3 text-center ">DATA TRUK</h3>
                    <p>Cari Data Truk:</p>
                    <form class="d-flex" action="{{ route('truk.search.pegawai') }}" method="GET">
                        <input class=" form-control" type="text" name="search" placeholder="Cari Truk .."
                            value="{{ old('search') }}">
                        <input type="submit" value="search" class="btn btn-outline-primary mx-2">
                    </form>
                    <button type="button" class="btn btn-outline-primary my-4" data-bs-toggle="modal"
                        data-bs-target="#exampleModal">
                        <i class="bi bi-truck"></i> Tambah Data Truk
                    </button>
                    <a href="{{route('exporttruk')}}">
                        <button type="button" class="btn btn-outline-danger">
                            <i class="bi bi-filetype-pdf"></i>
                            Export PDF
                        </button>
                    </a>
                    <!-- Modal Tambah start-->
                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Data Truk</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form action="{{ route('truk.create.pegawai') }}" method="POST">
                                        {{ csrf_field() }}
                                        <div class="mb-3">
                                            <label for="nama" class="form-label">Masukkan Jenis Truk</label>
                                            <input type="text" class="form-control" id="nama" name="jenis_truk">
                                        </div>
                                        <div class="mb-3">
                                            <label for="plat" class="form-label">Masukkan Plat Truk</label>
                                            <input type="text" class="form-control" id="plat" name="plat_nomor">
                                        </div>
                                        <div class="mb-3">
                                            <label for="kapasitas" class="form-label">Masukkan Kapasitas Truk</label>
                                            <input type="text" class="form-control" id="kapasitas" name="kapasitas">
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-bs-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-primary">Save changes</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Modal Tambah end -->
                    @include('kebutuhan.alert')
                    <div class="table-responsive">
                        <table class="table ">
                            <thead class="table-primary">
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Jenis Truk</th>
                                    <th scope="col">Nomor Plat</th>
                                    <th scope="col">Kapasitas </th>
                                    <th scope="col">Opsi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if ($truk->isEmpty())
                                    <tr>
                                        <td colspan="5" class="text-center">Data tidak ditemukan.</td>
                                    </tr>
                                @endif
                                @foreach ($truk as $item)
                                    <tr>
                                        <th scope="row">{{ $loop->iteration }}</th>
                                        <td>{{ $item->jenis_truk }}</td>
                                        <td>{{ $item->plat_nomor }}</td>
                                        <td>{{ $item->kapasitas }}</td>
                                        <td>
                                            <button type="button" class="btn btn-outline-warning" data-bs-toggle="modal"
                                                data-bs-target="#exampleModalEdit{{ $item->id }}">
                                                <a class="text-decoration-none text-black" href="#">
                                                    <i class="bi bi-pencil-square"></i>
                                                </a>
                                            </button>
                                            <!-- Modal Edit start-->
                                            <div class="modal fade" id="exampleModalEdit{{ $item->id }}" tabindex="-1"
                                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Data
                                                                Truk</h1>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                                aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form action="{{ route('truk.update.pegawai') }}"
                                                                method="POST">
                                                                {{ csrf_field() }}
                                                                {{-- hidden --}}
                                                                <input type="hidden" name="id"
                                                                    value="{{ $item->id }}">
                                                                <div class="mb-3">
                                                                    <label for="nama" class="form-label">Masukkan
                                                                        Jenis
                                                                        Truk</label>
                                                                    <input type="text" class="form-control"
                                                                        id="nama" name="jenis_truk"
                                                                        value="{{ $item->jenis_truk }}">
                                                                </div>
                                                                <div class="mb-3">
                                                                    <label for="plat" class="form-label">Masukkan Plat
                                                                        Truk</label>
                                                                    <input type="text" class="form-control"
                                                                        id="plat" name="plat_nomor"
                                                                        value="{{ $item->plat_nomor }}">
                                                                </div>
                                                                <div class="mb-3">
                                                                    <label for="kapasitas" class="form-label">Masukkan
                                                                        Kapasitas Truk</label>
                                                                    <input type="text" class="form-control"
                                                                        id="kapasitas" name="kapasitas"
                                                                        value="{{ $item->kapasitas }}">
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
                                            <!-- Modal edit end -->
                                            <button type="button" class="btn btn-outline-danger">
                                                <a class="text-decoration-none text-black"
                                                    href="{{ route('truk.delete.pegawai', ['id' => $item->id]) }}">
                                                    <i class="bi bi-trash"></i>
                                                </a>
                                            </button>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div>
                        {{ $truk->links('pagination::bootstrap-5') }}

                    </div>
                </div>
            </div>
        </div>
    @endsection
