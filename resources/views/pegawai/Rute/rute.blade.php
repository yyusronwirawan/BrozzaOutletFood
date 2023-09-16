@extends('pegawai.master')
@section('content')
    <div class="container">
        <div class="tb-gudang  ">
            <div class="col border rounded p-2 ">
                <h3 class="my-3 text-center ">DATA RUTE</h3>
                <p>Cari Kode Pengiriman:</p>
                <form class="d-flex" action="{{ route('rute.search.pegawai') }}" method="GET">
                    <input class=" form-control" type="text" name="search" placeholder="Cari Kode Pengiriman .."
                        value="{{ old('search') }}">
                    <input type="submit" value="search" class="btn btn-outline-primary mx-2">
                </form>
                {{-- <button type="button" class="btn btn-outline-danger my-4 mx-3">
                    <i class="bi bi-filetype-pdf"></i>
                    Export PDF
                </button> --}}
                <div class="table-responsive mt-3">
                    <table class="table ">
                        <thead class="table-primary">
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Kode Pengiriman</th>
                                <th scope="col">Status Pengiriman</th>
                                <th scope="col">Opsi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($rute as $group)
                                @php
                                    $item = $group->first();
                                @endphp
                                <tr>
                                    <th scope="row">{{ $loop->iteration }}</th>
                                    <td>{{ $item->pengiriman->pemesanan->kode_pesanan }}</td>
                                    <td>
                                        {{ $item->status }}
                                    </td>
                                    <td>
                                        <!-- Button untuk membuka modal edit status -->
                                        <button type="button" class="btn btn-outline-warning" data-bs-toggle="modal"
                                            data-bs-target="#editModal{{ $item->pengiriman->pemesanan->kode_pesanan }}">
                                            <a class="text-decoration-none text-black" href="#">
                                                <i class="bi bi-pencil-square"></i>
                                            </a>
                                        </button>
                                        @if ($item->pengiriman->pemesanan->kode_pesanan)
                                            <!-- Modal Edit Status -->
                                            <div class="modal fade"
                                                id="editModal{{ $item->pengiriman->pemesanan->kode_pesanan }}"
                                                tabindex="-1"
                                                aria-labelledby="editModalLabel{{ $item->pengiriman->pemesanan->kode_pesanan }}"
                                                aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title"
                                                                id="editModalLabel{{ $item->pengiriman->pemesanan->kode_pesanan }}">
                                                                Edit
                                                                Status Pengiriman</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                                aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <!-- Form edit status -->
                                                            <form action="{{ route('rute.update.pegawai') }}" method="POST">
                                                                @csrf
                                                                <!-- Isi form dengan data status yang ingin diubah -->
                                                                <input type="hidden" name="kode_pesanan"
                                                                    value="{{ $item->pengiriman->pemesanan->kode_pesanan }}">
                                                                <div class="mb-3">
                                                                    <label for="status" class="form-label">Status
                                                                        Pengiriman</label>
                                                                    <select class="form-select" id="status"
                                                                        name="status">
                                                                        <option value="Dalam Perjalanan menuju tujuan"
                                                                            {{ $item->status == 'Dalam Perjalanan menuju tujuan' ? 'selected' : '' }}>
                                                                            Dalam Perjalanan menuju tujuan</option>
                                                                        <option value="Sampai di tujuan"
                                                                            {{ $item->status == 'Sampai di tujuan' ? 'selected' : '' }}>
                                                                            Sampai di tujuan</option>
                                                                        <option value="Batal"
                                                                            {{ $item->status == 'Batal' ? 'selected' : '' }}>
                                                                            Batal</option>
                                                                    </select>
                                                                </div>

                                                                <!-- Tombol Submit -->
                                                                <button type="submit" class="btn btn-primary">Simpan
                                                                    Perubahan</button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endif
                                        <!-- Button untuk menghapus data -->
                                        {{-- <button type="button" class="btn btn-outline-danger">
                                            <a class="text-decoration-none text-black"
                                                href="{{ route('rute.delete.pegawai', ['kode_pesanan' => $item->pengiriman->pemesanan->kode_pesanan]) }}">
                                                <i class="bi bi-trash"></i>
                                            </a>
                                        </button> --}}
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
