@extends('admin.master')
@section('content')
    <div class="container">
        <div class="tb-kategori  ">
            <div style="border-style: dashed; border-color:#537fe7; padding:4px 20px 230px;overflow:auto; max-height: 700px;">
                <div class="col border rounded p-3 mt-2 ">
                    <h3 class="my-3 text-center ">DATA HAK AKSES</h3>
                    <p>Cari Data :</p>
                    <form class="d-flex" action="" method="GET">
                        <input class=" form-control" type="text" name="search" placeholder="Cari Hak Akses .."
                            value="{{ old('search') }}">
                        <input type="submit" value="search" class="btn btn-outline-primary mx-2">
                    </form>
                    <button type="button" class="btn btn-outline-primary my-4" data-bs-toggle="modal"
                        data-bs-target="#exampleModal">
                        <i class="bi bi-person-add"></i> Tambah Hak Akses</a>
                    </button>
                    @include('kebutuhan.alert')
                    <div class="rounded">
                        <table class="table ">
                            <thead class="table-primary">
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Nama Hak Akses</th>
                                    {{-- <th scope="col" style="width: 300px;">Opsi</th> --}}
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($hakakses as $akses)
                                    <tr>
                                        <td scope="row">{{ $loop->index + 1 }}</td>
                                        <td>{{ $akses->hakakses }}</td>
                                        {{-- <td>
                                            <button type="button" class="btn btn-outline-warning">
                                                <a class="text-decoration-none text-black" href="#">
                                                    <i class="bi bi-pencil-square"></i>
                                                </a>
                                            </button>
                                            <button type="button" class="btn btn-outline-danger">
                                                <a class="text-decoration-none text-black" href="#">
                                                    <i class="bi bi-trash"></i>
                                                </a>
                                            </button>
                                        </td> --}}
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal tambah oulet start -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Hak Akses</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('hakAkses.create') }}" method="POST">
                    {{ csrf_field() }}
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="nama" class="form-label">Nama Hak Akses</label>
                            <input type="text" name="hakakses" class="form-control" id="nama">
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
