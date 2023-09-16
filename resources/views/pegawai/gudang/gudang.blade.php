@extends('pegawai.master')
@section('content')
    <div class="container">
        <div class="tb-gudang  ">
            <div style="border-style: dashed; border-color:#537fe7; padding:4px 20px 230px;overflow:auto; max-height: 700px;">
                <div class="col border rounded p-3 mt-3 ">
                    <h3 class="my-3 text-center ">DATA GUDANG</h3>
                    <p>Cari Data Gudang:</p>
                    <form class="d-flex" action="{{ route('gudang.cari') }}" method="GET">
                        <input class=" form-control" type="text" name="search" placeholder="Cari Gudang .."
                            value="{{ old('search') }}">
                        <input type="submit" value="search" class="btn btn-outline-primary mx-2">
                    </form>
                    <button type="button" class="btn btn-outline-primary my-4" data-bs-toggle="modal"
                        data-bs-target="#exampleModal">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                            class="bi bi-person-add" viewBox="0 0 16 16">
                            <path
                                d="M12.5 16a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7Zm.5-5v1h1a.5.5 0 0 1 0 1h-1v1a.5.5 0 0 1-1 0v-1h-1a.5.5 0 0 1 0-1h1v-1a.5.5 0 0 1 1 0Zm-2-6a3 3 0 1 1-6 0 3 3 0 0 1 6 0ZM8 7a2 2 0 1 0 0-4 2 2 0 0 0 0 4Z">
                            </path>
                            <path
                                d="M8.256 14a4.474 4.474 0 0 1-.229-1.004H3c.001-.246.154-.986.832-1.664C4.484 10.68 5.711 10 8 10c.26 0 .507.009.74.025.226-.341.496-.65.804-.918C9.077 9.038 8.564 9 8 9c-5 0-6 3-6 4s1 1 1 1h5.256Z">
                            </path>
                        </svg>
                        Tambah Data
                    </button>
                    <a href="{{route('exportgudang')}}">
                        <button type="button" class="btn btn-outline-danger">
                            <i class="bi bi-filetype-pdf"></i>
                            Export PDF
                        </button>
                    </a>
                    @include('kebutuhan.alert')
                    <div class="table-responsive rounded">
                        <table class="table ">
                            <thead class="table-primary">
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Nama Gudang</th>
                                    <th scope="col">Alamat</th>
                                    <th scope="col" style="width: 300px;">Opsi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if ($gudangs->isEmpty())
                                    <tr>
                                        <td colspan="4" class="text-center">Data tidak ditemukan.</td>
                                    </tr>
                                @endif
                                @foreach ($gudangs as $g)
                                    <tr>
                                        <th scope="row">{{ $loop->index + 1 }}</th>
                                        <td>{{ $g->nama_gudang }}</td>
                                        <td>{{ $g->alamat }}</td>
                                        <td>
                                            {{-- button edit --}}
                                            <button type="button" class="btn btn-outline-warning" data-bs-toggle="modal"
                                                data-bs-target="#exampleModalEdit{{ $g->id }}">
                                                <i class="bi bi-pencil-square"></i>
                                            </button>
                                            {{-- btn hapus --}}
                                            <button type="button" class="btn btn-outline-danger">
                                                <a class="text-decoration-none text-body"
                                                    href="{{ route('gudang.hapus', ['id' => $g->id]) }}">
                                                    <i class="bi bi-trash"></i>
                                                </a>
                                            </button>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    {{ $gudangs->links('pagination::bootstrap-5') }}
                </div>
            </div>
        </div>
    </div>
    {{-- Kumpulan modal --}}
    <!-- Modal tambah gudang start-->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Data Gudang</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('gudang.tambah') }}" method="POST">
                        {{ csrf_field() }}
                        <div class="mb-3">
                            <label for="nama" class="form-label">Masukkan Nama Gudang</label>
                            <input type="text" class="form-control" id="nama" name="nama_gudang">
                        </div>
                        <div class="mb-3">
                            <label for="alamat" class="form-label">Masukkan Alamat Gudang</label>
                            <input type="text" class="form-control" id="alamat" name="alamat">
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save changes</button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
    <!-- Modal tambah gudang  end -->

    <!-- Modal Edit gudang  start -->
    @foreach ($gudangs as $g)
        <div class="modal fade" id="exampleModalEdit{{ $g->id }}" tabindex="-1" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Data Gudang</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('gudang.perbarui') }}" method="POST">
                            {{-- mengubah method --}}
                            @method('PUT')
                            @csrf
                            <input type="hidden" name="id" value="{{ $g->id }}">
                            <div class="mb-3">
                                <label for="nama" class="form-label"> Nama Gudang</label>
                                <input type="text" class="form-control" id="nama" name="nama_gudang"
                                    value="{{ $g->nama_gudang }}">
                            </div>
                            <div class="mb-3">
                                <label for="alamat" class="form-label"> Alamat Gudang</label>
                                <input type="text" class="form-control" id="alamat" name="alamat"
                                    value="{{ $g->alamat }}">
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Save changes</button>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    @endforeach
    <!-- Modal Edit gudang  end -->
@endsection
