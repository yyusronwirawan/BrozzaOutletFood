@extends('admin.master')
@section('content')
    <div class="container">
        <div class="tb-gudang  ">
            <div style="border-style: dashed; border-color:#537fe7; padding:4px 20px 230px;overflow:auto; max-height: 700px;">
                <div class="col border rounded p-2 mt-2">
                    <h3 class="my-3 text-center ">DATA JADWAL PENGIRIMAN</h3>
                    <p>Cari Data Jadwal pengiriman:</p>
                    <form class="d-flex" action="{{ route('jadwalpengiriman.search') }}" method="GET">
                        <input class=" form-control" type="text" name="search" placeholder="Cari Jadwal Pengiriman .."
                            value="{{ old('search') }}">
                        <input type="submit" value="search" class="btn btn-outline-primary mx-2">
                    </form>
                    <button type="button" class="btn btn-outline-primary my-4 mx-3 "data-bs-toggle="modal"
                        data-bs-target="#exampleModal">
                        <i class="bi bi-person-add"></i> Tambah Pengiriman</a>
                    </button>
                    <a href="{{route('exportjadwalpengiriman')}}">
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
                                    <th scope="col">Tanggal</th>
                                    <th scope="col">Tujuan </th>
                                    <th scope="col">Opsi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if ($jadwalpengiriman->isEmpty())
                                    <tr>
                                        <td colspan="4" class="text-center">Data tidak ditemukan.</td>
                                    </tr>
                                @endif
                                    @foreach ($jadwalpengiriman as $jp)
                                        <tr>
                                            <th scope="row">{{ $loop->index + 1 }}</th>
                                            <td>{{ $jp->Tanggal }}</td>
                                            <td>{{ $jp->Tujuan }}</td>
                                            <td>
                                                <button type="button" class="btn btn-outline-warning" data-bs-toggle="modal"
                                                    data-bs-target="#exampleModalEdit{{ $jp->id }}">
                                                    <a class="text-decoration-none text-black" href="#">
                                                        <i class="bi bi-pencil-square"></i>
                                                    </a>
                                                </button>
                                                <!-- Modal  Edit start-->
                                                <div class="modal fade" id="exampleModalEdit{{ $jp->id }}" tabindex="-1"
                                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Jadwal
                                                                </h1>
                                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                                    aria-label="Close"></button>
                                                            </div>
                                                            <form action="{{ route('jadwalpengiriman.update') }}"
                                                                method="POST">
                                                                {{ csrf_field() }}
                                                                <input type="hidden" name="id"
                                                                    value="{{ $jp->id }}">
                                                                <div class="modal-body">
                                                                    <div class="mb-3">
                                                                        <label for="Tanggal" class="form-label">Masukkan
                                                                            Tanggal</label>
                                                                        <input type="date" name="Tanggal"
                                                                            class="form-control" id="Tanggal"
                                                                            value="{{ $jp->Tanggal }}">
                                                                    </div>
                                                                    <div class="mb-3">
                                                                        <label for="Tujuan" class="form-label">Masukkan
                                                                            Tujuan</label>
                                                                        <input type="text" name="Tujuan"
                                                                            class="form-control" id="Tujuan"
                                                                            value="{{ $jp->Tujuan }}">
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
                                                        href="{{ route('jadwalpengiriman.delete', ['id' => $jp->id]) }}">
                                                        <i class="bi bi-trash"></i>
                                                    </a>
                                                </button>
                                            </td>
                                        </tr>
                                    @endforeach
                            </tbody>
                        </table>
                    </div>
                    {{ $jadwalpengiriman->links('pagination::bootstrap-5') }}
                </div>
            </div>
        </div>
    </div>
    <!-- Modal  tambah start-->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Jadwal</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('jadwalpengiriman.create') }}" method="POST">
                    {{ csrf_field() }}
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="Tanggal" class="form-label">Masukkan Tanggal</label>
                            <input type="date" name="Tanggal" class="form-control" id="Tanggal">
                            @if ($errors->has('Tanggal'))
                                <span class="text-danger">{{ $errors->first('Tanggal') }}</span>
                            @endif
                        </div>
                        <div class="mb-3">
                            <label for="Tujuan" class="form-label">Masukkan Tujuan</label>
                            <input type="text" name="Tujuan" class="form-control" id="Tujuan">
                            @if ($errors->has('Tujuan'))
                                <span class="text-danger">{{ $errors->first('Tujuan') }}</span>
                            @endif
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
