@extends('pegawai.master')
@section('content')
    <div class="container">
        <div class="tb-gudang  ">
            <div style="border-style: dashed; border-color:#537fe7; padding:4px 20px 230px;overflow:auto; max-height: 700px;">
                <div class="col border rounded p-2 mt-2 ">
                    <h3 class="my-3 text-center ">DATA OUTLET</h3>
                    <p>Cari Data Outlet:</p>
                    <form class="d-flex" action="{{ route('outlet.search.pegawai') }}" method="GET">
                        <input class=" form-control" type="text" name="search" placeholder="Cari Outlet .."
                            value="{{ old('search') }}">
                        <input type="submit" value="search" class="btn btn-outline-primary mx-2">
                    </form>
                    <button type="button" class="btn btn-outline-primary my-4 mx-3 "data-bs-toggle="modal"
                        data-bs-target="#exampleModal">
                        <i class="bi bi-person-add"></i> Tambah Outlet</a>
                    </button>
                    <a href="{{route('exportoutlet')}}">
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
                                    <th scope="col">Username</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Nama </th>
                                    <th scope="col">Alamat </th>
                                    <th scope="col">Telepon </th>
                                    <th scope="col">Opsi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($outlet as $index => $data)
                                    @if ($outlet->isEmpty())
                                        <tr>
                                            <td colspan="7" class="text-center">Data tidak ditemukan.</td>
                                        </tr>
                                    @endif
                                    <tr>
                                        <th scope="row">{{ $index + 1 }}</th>
                                        <td>{{ $data->user->username }}</td>
                                        <td>{{ $data->user->email }}</td>
                                        <td>{{ $data->user->nama_pengguna }}</td>
                                        <td>{{ $data->user->alamat }}</td>
                                        <td>{{ $data->user->tlp }}</td>
                                        <td>
                                            <button type="button" class="btn btn-outline-warning" data-bs-toggle="modal"
                                                data-bs-target="#exampleModalEdit{{ $data->id }}">
                                                <a class="text-decoration-none text-black" href="#">
                                                    <i class="bi bi-pencil-square"></i>
                                                </a>
                                            </button>
                                            <!-- Modal Edit start-->
                                            <div class="modal fade" id="exampleModalEdit{{ $data->id }}" tabindex="-1"
                                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h1 class="modal-title fs-5" id="exampleModalLabel">Edit User</h1>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                                aria-label="Close"></button>
                                                        </div>
                                                        <form action="{{ route('outlet.update.pegawai') }}" method="POST">
                                                            @csrf
                                                            <input type="hidden" name="id_pengguna" value="{{ $data->user->id }}">
                                                            <div class="modal-body">
                                                                <div class="mb-3">
                                                                    <label for="nama_pengguna" class="form-label">Masukkan
                                                                        Pengguna</label>
                                                                    <input type="text" name="nama_pengguna"
                                                                        class="form-control" id="nama_pengguna"
                                                                        value="{{ $data->user->nama_pengguna }}">
                                                                </div>
                                                                <div class="mb-3">
                                                                    <label for="alamat" class="form-label">Masukkan
                                                                        alamat</label>
                                                                    <input type="text" name="alamat" class="form-control"
                                                                        id="alamat" value="{{ $data->user->alamat }}">
                                                                </div>
                                                                <div class="mb-3">
                                                                    <label for="username" class="form-label">Masukkan
                                                                        Username</label>
                                                                    <input type="text" name="username" class="form-control"
                                                                        id="username" value="{{ $data->user->username }}">
                                                                </div>
                                                                <div class="mb-3">
                                                                    <label for="tlp" class="form-label">Masukkan Nomor
                                                                        Hp</label>
                                                                    <input type="text" name="tlp" class="form-control"
                                                                        id="tlp" value="{{ $data->user->tlp }}">
                                                                </div>
                                                                <div class="mb-3">
                                                                    <label for="email" class="form-label">Email</label>
                                                                    <input type="Email" name="email" class="form-control"
                                                                        id="email" value="{{ $data->user->email }}">
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
                                                    href="{{ route('outlet.delete', ['id_pengguna' => $data->id_pengguna]) }}">
                                                    <i class="bi bi-trash"></i>
                                                </a>
                                            </button>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    {{ $outlet->links('pagination::bootstrap-5') }}
                </div>
            </div>
        </div>
    </div>
    <!-- Modal tambah oulet start -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Outlet</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('outlet.create.pegawai') }}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="id_pengguna" class="form-label">Konfirmasi Outlet</label>
                            <select name="id_pengguna" id="id_pengguna" class="form-control">
                                <option> Pilih Outlet</option>
                                @foreach ($hakAkses as $pengguna)
                                    <option value="{{ $pengguna->id }}">{{ $pengguna->nama_pengguna }}</option>
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
    <!-- Modal tambah outlet end -->
@endsection
