@extends('pegawai.master')
@section('content')
    <div class="container">
        <div class="tb-gudang  ">
            <div class="col border rounded p-2 ">
                <h3 class="my-3 text-center ">DATA PENGIRIMAN</h3>
                <p>Cari Data pengiriman:</p>
                <form class="d-flex" action="{{ route('pengiriman.search.pegawai') }}" method="GET">
                    <input class="form-control" type="text" name="search" placeholder="Cari Pengiriman .."
                        value="{{ old('search') }}">
                    <input type="submit" value="search" class="btn btn-outline-primary mx-2">
                </form>
                <button type="button" class="btn btn-outline-primary my-4 mx-3 "data-bs-toggle="modal"
                    data-bs-target="#exampleModal">
                    <i class="bi bi-person-add"></i> Tambah Pengiriman</a>
                </button>
                <a href="{{route('exportpengiriman')}}">
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
                                <th scope="col">Jadwal Pengiriman </th>
                                <th scope="col">Kode Pemesanan </th>
                                <th scope="col"> Nama Supir</th>
                                <th scope="col">Jenis Truk</th>
                                <th scope="col">Opsi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($pengiriman as $group)
                                @php
                                    $item = $group->first();
                                @endphp
                                <tr>
                                    <th scope="row">{{ $loop->index + 1 }}</th>
                                    <td>{{ $item->jadwal_pengiriman->Tujuan }}</td>
                                    <td>{{ $item->jadwal_pengiriman->Tanggal }}</td>
                                    <td>{{ $item->pemesanan->kode_pesanan }}</td>
                                    <td>{{ $item->supir->user->nama_pengguna }}</td>
                                    <td>{{ $item->truk->jenis_truk }}</td>
                                    <td>
                                        <button type="button" class="btn btn-outline-warning" data-bs-toggle="modal"
                                            data-bs-target="#exampleModalEdit{{ $loop->index }}">
                                            <a class="text-decoration-none text-black" href="#">
                                                <i class="bi bi-pencil-square"></i>
                                            </a>
                                        </button>
                                        <!-- Modal edit start-->
                                        <div class="modal fade" id="exampleModalEdit{{ $loop->index }}" tabindex="-1"
                                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Pengiriman
                                                        </h1>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                    </div>
                                                    <form action="{{ route('pengiriman.update.pegawai') }}" method="POST">
                                                        @csrf
                                                        <div class="modal-body">
                                                            <div class="mb-3">
                                                                <label for="id_pemesanan" class="form-label">Kode
                                                                    Pemesanan</label>
                                                                <input type="text" class="pemesanan form-control"
                                                                    name="kode_pesanan"
                                                                    value="{{ $item->pemesanan->kode_pesanan }}" readonly>
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="id_truk" class="form-label">Jenis Truk</label>
                                                                <select class="truk form-control" name="id_truk">
                                                                    <option value="">--Pilih Jenis Truk--</option>
                                                                    @foreach ($truk as $t)
                                                                        <option value="{{ $t->id }}"
                                                                            @if ($item->truk->id == $t->id) selected @endif>
                                                                            {{ $t->jenis_truk }}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="id_supir" class="form-label">Nama
                                                                    Supir</label>
                                                                <select class="supir form-control" name="id_supir">
                                                                    <option value="">--Pilih Nama Supir--</option>
                                                                    @foreach ($supir as $s)
                                                                        <option value="{{ $s->id }}"
                                                                            @if ($item->supir->id == $s->id) selected @endif>
                                                                            {{ $s->user->nama_pengguna }}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="id_jadwal_pengiriman" class="form-label">Jadwal
                                                                    Pengiriman</label>
                                                                <select class="jadwal_pengiriman form-control"
                                                                    name="id_jadwal_pengiriman">
                                                                    <option value="">--Pilih Jadwal Pengiriman--
                                                                    </option>
                                                                    @foreach ($jadwal as $j)
                                                                        <option value="{{ $j->id }}"
                                                                            @if ($item->jadwal_pengiriman->id == $j->id) selected @endif>
                                                                            {{ $j->Tujuan }}</option>
                                                                    @endforeach
                                                                </select>

                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-outline-secondary"
                                                                    data-bs-dismiss="modal">Close</button>
                                                                <button type="submit" class="btn btn-outline-primary"
                                                                    value="simpan data">Save changes</button>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Modal edit end -->
                                        <button type="button" class="btn btn-outline-danger">
                                            <a class="text-decoration-none text-black"
                                                href="{{ route('pengiriman.delete.pegawai', ['kode_pesanan' => $item->pemesanan->kode_pesanan]) }}">
                                                <i class="bi bi-trash"></i>
                                            </a>
                                        </button>

                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal start-->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Pengiriman</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('pengiriman.create.pegawai') }}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="id_pemesanan" class="form-label">Masukkan Kode Pemesanan</label>
                            <select class="pemesanan form-control" name="kode_pesanan">
                                <option value="">--Pilih Kode Pemesanan--</option>
                                @php
                                    $uniquePemesanan = $pemesanan->unique('kode_pesanan');
                                @endphp
                                @foreach ($uniquePemesanan as $p)
                                    @if ($p->status == 'Sedang Diproses')
                                        <option value="{{ $p->kode_pesanan }}">{{ $p->kode_pesanan }}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="id_truk" class="form-label">Masukkan Jenis Truk</label>
                            <select class="truk form-control" name="id_truk">
                                <option value="">--Pilih Jenis Truk--</option>
                                @foreach ($truk as $t)
                                    <option value="{{ $t->id }}">{{ $t->jenis_truk }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="id_jadwal_pengiriman" class="form-label">Masukkan Jadwal Pengiriman</label>
                            <select class="jadwal form-control" name="id_jadwal_pengiriman">
                                <option value="">--Pilih Jadwal Pengiriman--</option>
                                @foreach ($jadwal as $j)
                                    <option value="{{ $j->id }}">{{ $j->Tujuan }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="id_supir" class="form-label">Masukkan Nama Supir</label>
                            <select class="supir form-control" name="id_supir">
                                <option value="">--Pilih Supir--</option>
                                @foreach ($supir as $s)
                                    <option value="{{ $s->id }}">{{ $s->user->nama_pengguna }}</option>
                                @endforeach
                            </select>
                        </div>
                        <input type="hidden" name="status_pengiriman" value="Dalam Pengiriman">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-outline-primary" value="simpan data">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Modal end -->
@endsection
