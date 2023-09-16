@extends('pegawai.master')
@section('content')
    <div class="container">
        <div class="tb-kategori  ">
            <div style="border-style: dashed; border-color:#537fe7; padding:4px 20px 230px;overflow:auto; max-height: 700px;">
                <div class="col border rounded p-2 mt-2 ">
                    <h3 class="my-3 text-center ">DATA Kategori</h3>
                    <p>Cari Data Kategori:</p>
                    <form class="d-flex" action="{{route('kategori.search.pegawai')}}" method="GET">
                        <input class=" form-control" type="text" name="search" placeholder="Cari Kategori .."
                            value="{{ old('search') }}">
                        <input type="submit" value="search" class="btn btn-outline-primary mx-2">
                    </form>
                    <button type="button" class="btn btn-outline-primary my-4" data-bs-toggle="modal"
                        data-bs-target="#exampleModal">
                        <i class="bi bi-bookmark-plus-fill"></i>
                        Tambah Data Kategori
                    </button>
                    @include('kebutuhan.alert')
                    <table class="table ">
                        <thead class="table-primary">
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Nama Kategori</th>
                                <th scope="col" style="width: 300px;">Opsi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if ($kategoris->isEmpty())
                                    <tr>
                                        <td colspan="3" class="text-center">Data tidak ditemukan.</td>
                                    </tr>
                                @endif
                            @foreach ($kategoris as $k)
                                <tr>
                                    <td scope="row">{{ $loop->iteration }}</td>
                                    <td>{{ $k->nama_kategori }}</td>
                                    <td>
                                        <button type="button" class="btn btn-outline-warning" data-bs-toggle="modal"
                                            data-bs-target="#exampleModalEdit{{ $k->id }}">
                                            <a class="text-decoration-none text-black" href="#">
                                                <i class="bi bi-pencil-square"></i>
                                            </a>
                                        </button>
                                        <!-- Modal start untuk edit-->
                                        <div class="modal fade" id="exampleModalEdit{{ $k->id }}" tabindex="-1"
                                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Data Kategori
                                                        </h1>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                    </div>
                                                    <form action="{{ route('kategori.update.pegawai') }}" method="POST">
                                                        {{-- mengubah method --}}
                                                        @method('put')
                                                        @csrf
                                                        <input type="hidden" name="id" value="{{ $k->id }}">
                                                        <div class="modal-body">
                                                            <div class="mb-3">
                                                                <label for="nama" class="form-label">Masukkan Nama
                                                                    Kategori</label>
                                                                <input type="text" name="nama_kategori" class="form-control"
                                                                    id="nama" value="{{ $k->nama_kategori }}">
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary"
                                                                data-bs-dismiss="modal">Close</button>
                                                            <button type="submit" class="btn btn-primary"
                                                                value="simpan data">Save changes</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Modal end untuk edit -->
                                        <button type="button" class="btn btn-outline-danger">
                                            <a class="text-decoration-none text-black"
                                                href="{{ route('kategori.delete.pegawai', ['id' => $k->id]) }}">
                                                <i class="bi bi-trash"></i>
                                            </a>
                                        </button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <br>
                    <br>
                    {{ $kategoris->links('pagination::bootstrap-5') }}
                </div>
            </div>
        </div>
    </div>
    <!-- Modal tambah kategori start-->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Data Kategori</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('kategori.create.pegawai') }}" method="POST">
                    {{ csrf_field() }}
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="nama" class="form-label">Masukkan Nama Kategori</label>
                            <input type="text" name="nama_kategori" class="form-control" id="nama">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary" value="simpan data">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Modal tambah kategori end -->
@endsection
