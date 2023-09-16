@extends('admin.master')
@section('content')
    <div class="container">
        <div class="tb-gudang  ">
            <div style="border-style: dashed; border-color:#537fe7; padding:4px 20px 230px;overflow:auto; max-height: 700px;">
                <div class="col border rounded p-2 mt-2 ">
                    <h3 class="my-3 text-center ">DATA PENGGUNA</h3>
                    <p>Cari Data Pengguna:</p>
                    <form class="d-flex" action="{{ route('pengguna.search') }}" method="GET">
                        <input class=" form-control" type="text" name="search" placeholder="Cari Pengguna .."
                            value="{{ old('search') }}">
                        <input type="submit" value="search" class="btn btn-outline-primary mx-2">
                    </form>
                    <button type="button" class="btn btn-outline-primary my-4 mx-3 "data-bs-toggle="modal"
                        data-bs-target="#exampleModal">
                        <i class="bi bi-person-add"></i> Tambah User</a>
                    </button>
                    {{-- <button type="button" class="btn btn-outline-danger">
                        <i class="bi bi-filetype-pdf"></i>
                        Export PDF
                    </button> --}}
                    @include('kebutuhan.alert')
                    <div class="table-responsive">
                        <table class="table ">
                            <thead class="table-primary">
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Nama Pengguna</th>
                                    {{-- <th scope="col">Username</th> --}}
                                    <th scope="col">Email </th>
                                    <th scope="col">Alamat </th>
                                    <th scope="col">Telepon </th>
                                    <th scope="col">Status </th>
                                    <th scope="col">Opsi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($pengguna as $item)
                                    <tr>
                                        <th scope="row">{{ $loop->iteration }}</th>
                                        <td>{{ $item->nama_pengguna }}</td>
                                        {{-- <td> {{ $item->username }}</td> --}}
                                        <td>{{ $item->email }}</td>
                                        <td>{{ $item->alamat }}</td>
                                        <td>{{ $item->tlp }}</td>
                                        <td>{{ $item->status }}</td>
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
                                                            <h1 class="modal-title fs-5" id="exampleModalLabel">Edit User</h1>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                                aria-label="Close"></button>
                                                        </div>
                                                        <form action="{{ route('pengguna.update') }}" method="POST">
                                                            @csrf
                                                            <input type="hidden" name="id" value="{{ $item->id }}">
                                                            <div class="modal-body">
                                                                <div class="mb-3">
                                                                    <label for="nama_pengguna" class="form-label">Masukkan
                                                                        Pengguna</label>
                                                                    <input type="text" name="nama_pengguna"
                                                                        class="form-control" id="nama_pengguna"
                                                                        value="{{ $item->nama_pengguna }}">
                                                                </div>
                                                                <div class="mb-3">
                                                                    <label for="alamat" class="form-label">Masukkan
                                                                        alamat</label>
                                                                    <input type="text" name="alamat" class="form-control"
                                                                        id="alamat" value="{{ $item->alamat }}">
                                                                </div>
                                                                <div class="mb-3">
                                                                    <label for="username" class="form-label">Masukkan
                                                                        Username</label>
                                                                    <input type="text" name="username" class="form-control"
                                                                        id="username" value="{{ $item->username }}">
                                                                </div>
                                                                <div class="mb-3">
                                                                    <label for="tlp" class="form-label">Masukkan Nomor
                                                                        Hp</label>
                                                                    <input type="text" name="tlp" class="form-control"
                                                                        id="tlp" value="{{ $item->tlp }}">
                                                                </div>
                                                                <div class="mb-3">
                                                                    <label for="email" class="form-label">Email</label>
                                                                    <input type="Email" name="email" class="form-control"
                                                                        id="email" value="{{ $item->email }}">
                                                                </div>
                                                                <div class="mb-3">
                                                                    <label for="pegawai_id" class="form-label">Masukkan
                                                                        Hak Akses</label>
                                                                    <select name="pegawai_id" id="pegawai_id"
                                                                        class="form-control">
                                                                        <option value="{{ $item->pegawai_id }}">
                                                                            {{ $item->pegawai->hakakses }}</option>
                                                                        <option> Pilih Hak Akses</option>
                                                                        @foreach ($hakAkses as $k)
                                                                            <option value="{{ $k->id }}">
                                                                                {{ $k->hakakses }}</option>
                                                                        @endforeach
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-outline-secondary"
                                                                    data-bs-dismiss="modal">Close</button>
                                                                <button type="submit" class="btn btn-outline-primary"
                                                                    value="simpan data">Save changes</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Modal Edit end -->
                                            <button type="button" class="btn btn-outline-danger">
                                                <a class="text-decoration-none text-black"
                                                    href="{{ route('pengguna.delete', ['id' => $item->id]) }}">
                                                    <i class="bi bi-trash"></i>
                                                </a>
                                            </button>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    {{ $pengguna->links('pagination::bootstrap-5') }}
                </div>
            </div>
        </div>
    </div>
    <!-- Modal tambah start-->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah User</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('pengguna.create') }}" method="POST">
                    {{ csrf_field() }}
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="nama_pengguna" class="form-label">Masukkan Pengguna</label>
                            <input type="text" name="nama_pengguna" class="form-control" id="nama_pengguna">
                        </div>
                        <div class="mb-3">
                            <label for="alamat" class="form-label">Masukkan alamat</label>
                            <input type="text" name="alamat" class="form-control" id="alamat">
                        </div>
                        <div class="mb-3">
                            <label for="username" class="form-label">Masukkan Username</label>
                            <input type="text" name="username" class="form-control" id="username">
                        </div>
                        <div class="mb-3">
                            <label for="tlp" class="form-label">Masukkan Nomor Hp</label>
                            <input type="text" name="tlp" class="form-control" id="tlp">
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="Email" name="email" class="form-control" id="email">
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="text" name="password" class="form-control" id="password">
                        </div>
                        <div class="mb-3">
                            <label for="pegawai_id" class="form-label">Masukkan
                                Hak Akses</label>
                            <select name="pegawai_id" id="pegawai_id" class="form-control">
                                <option> Pilih Hak Akses</option>
                                @foreach ($hakAkses as $k)
                                    <option value="{{ $k->id }}">
                                        {{ $k->hakakses }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-outline-primary" value="simpan data">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Modal tambah end -->
@endsection
