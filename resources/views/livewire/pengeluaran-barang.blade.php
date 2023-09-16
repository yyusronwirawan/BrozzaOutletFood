<div>
    {{-- Care about people's approval and you will be their prisoner. --}}
    <div class="container">
        <div class="tb-gudang  ">
            <div
                style="border-style: dashed; border-color:#537fe7; padding:4px 20px 230px;overflow:auto; max-height: 700px;">
                <div class="col border rounded p-2 mt-2">
                    <h3 class="my-3 text-center ">DATA BARANG KELUAR</h3>
                    <p>Cari Data Barang:</p>
                    <input class="form-control" type="search" wire:model="search" placeholder="Cari Barang .." required>
                    <button type="button" class="btn btn-outline-primary my-4" data-bs-toggle="modal"
                        data-bs-target="#exampleModal">
                        <i class="bi bi-bag-plus-fill"></i> Tambah Stok Barang
                    </button>
                    <a href="{{ route('exportbarangkeluar') }}">
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
                                    <th scope="col">Nama Pegawai</th>
                                    <th scope="col">Jumlah Stok Keluar</th>
                                    <th scope="col">Tanggal</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if ($BarangKeluar->isEmpty())
                                    <tr>
                                        <td colspan="6" class="text-center">Data tidak ditemukan.</td>
                                    </tr>
                                @endif
                                @foreach ($BarangKeluar as $index => $item)
                                    <tr>
                                        <th scope="row">{{ $index + 1 }}</th>
                                        <td>{{ $item->barangs->nama_barang }}</td>
                                        <td>{{ $item->users->nama_pengguna }}</td>
                                        <td>{{ $item->jumlah }}</td>
                                        <td>{{ $item->tanggal }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    {{-- Pagination --}}
                    {{ $BarangKeluar->links() }}
                </div>
            </div>
        </div>
    </div>

    <!-- Modal start-->
    <div wire:ignore.self class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Data Barang Keluar</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="kode_pesanan" class="form-label">Pilih Kode Pemesanan</label>
                        <select name="kodePesanan" id="kode_pesanan" class="form-control"
                            wire:model="selectedPemesanan" wire:change="addpengeluaran($event.target.value)">
                            <option value="">Pilih Kode Pemesanan</option>
                            @foreach ($pemesanans as $pemesanan)
                                @if ($pemesanan->status == 'Belum Diproses')
                                    <option value="{{ $pemesanan->id }}">{{ $pemesanan->kode_pesanan }}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>

                    @if ($pemesananBarang)
                        <input type="hidden" name="id_barang" class="form-control" id="id_barang"
                            value="{{ $pemesananBarang['id_barang'] ?? '' }}">

                        <div class="mb-3">
                            <label for="nama_barang" class="form-label">Nama Barang</label>
                            <input type="text" name="nama_barang" class="form-control" id="nama_barang"
                                value="{{ $pemesananBarang['nama_barang'] ?? '' }}" readonly>
                        </div>
                        <div class="mb-3">
                            <label for="jumlah" class="form-label">Jumlah Barang</label>
                            <input type="number" class="form-control" id="jumlah" name="jumlah"
                                value="{{ $pemesananBarang['jumlah_barang'] ?? '' }}" readonly>
                        </div>
                    @else
                        <div class="mb-3">
                            <label for="harga"
                                class="form-label rounded bg-danger p2 form-control text-white text-center">Tidak Ada
                                Pemesanan</label>
                        </div>
                    @endif

                    <div class="mb-3">
                        <label for="tanggal" class="form-label">Masukkan Tanggal</label>
                        <input type="date" class="form-control" id="tanggal" name="tanggal"
                            wire:model.defer="pemesananBarang.tanggal">
                        @error('pemesananBarang.tanggal')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <input type="hidden" class="form-control" id="id_pengguna" name="id_pengguna"
                        value="{{ Auth::user()->id }}">
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary" wire:click="create">Save changes</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal end-->

</div>
