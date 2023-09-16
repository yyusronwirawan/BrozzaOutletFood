<div>
    {{-- If you look to others for fulfillment, you will never truly be fulfilled. --}}
    <div class="container">
        <div class="tb_pemesanan ">
            <h3 class="text-center bord">PEMESANAN</h3>
            <div class="row rounded ">
                <div class="col ">
                    <p>Cari Data Barang:</p>
                    <input type="search" wire:model="search" id="search" class="form-control"
                        placeholder="Masukkan Nama Barang" required>
                </div>
                <div class="col table-responsive rounded  " style="background-color:rgba(64, 123, 255, 0.1);">
                    <table class="table rounded">
                        <thead>
                            <tr>
                                <th scope="col">Nama Barang</th>
                                <th scope="col">stok</th>
                                <th scope="col">Harga</th>
                                <th scope="col">Opsi</th>
                            </tr>
                        </thead>
                        <tbody class="table-group-divider">
                            @foreach ($orders as $order)
                                <tr>
                                    <td>{{ $order->nama_barang }}</td>
                                    <td>{{ $order->stok_akhir }}</td>
                                    <td>
                                        {{ $order->harga }}
                                    </td>
                                    <td>
                                        <button type="button" class="btn btn-sm btn-primary"
                                            wire:click="addOrder({{ $order->id }})">
                                            <i class="bi bi-cart4"></i>
                                        </button>
                                    </td>
                                </tr>
                            @endforeach
                            @if (count($orders) == 0)
                                <tr>
                                    <td colspan="6" class="text-center">Tidak ada data</td>
                                </tr>
                            @endif
                        </tbody>
                    </table>
                    <div style="margin-top: -40px;">{{ $orders->links() }}</div>
                </div>
            </div>

            <div class="col border rounded p-2 m-2" style="background-color: rgba(238, 238, 238, 0.2);">
                <h3 class="my-3 text-center ">DATA PEMESANAN</h3>
                <div class="m-3">
                    <Label class="ml-4">
                        Kode Pemesanan :
                    </Label>
                    @include('kebutuhan.alert')
                    <input type="hidden" id="user" value="{{ Auth::user()->id }}">
                    <Label id="kode-pemesanan"
                        class="border px-3 py-2 border-primary border-opacity-25 rounded text-body-tertiary">
                        {{ $kodePemesanan }}
                    </Label>
                </div>
                <input value="{{ Auth::user()->id }}" type="hidden" name="id">
                <div class="table-responsive rounded">
                    <table class="table rounded">
                        <thead class="table-primary">
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Nama Barang</th>
                                <th scope="col">Harga</th>
                                <th scope="col">Jumlah Barang</th>
                                <th scope="col">Total Harga</th>
                                <th scope="col">Opsi</th>
                            </tr>
                        </thead>
                        <tbody id="tabel-body">
                            @forelse ($keranjang as $index => $data)
                                <tr>
                                    <th scope="row">{{ $loop->index + 1 }}</th>
                                    <td>{{ $data['nama_barang'] }}</td>
                                    <td>
                                        {{ $data['harga'] }}
                                    </td>
                                    <td>
                                        <input type="number"
                                            class="border px-1 py-1 border-primary border-opacity-25 rounded"
                                            wire:change="updateTotal({{ $index }}, $event.target.value)"
                                            value="{{ $data['jumlah_barang'] }}" id="first_product">
                                    </td>
                                    <td> {{ $data['total'] }}</td>
                                    <td>
                                        <button type="button" class="btn btn-outline-danger"
                                            wire:click="removeOrder({{ $data['id'] }})">
                                            <i class="bi bi-trash"></i>
                                        </button>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" class="text-center">Tidak ada data</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
                <div class="d-flex justify-content-end">
                    <button type="button" class="btn btn-outline-success my-4 mx-3 " wire:click="createOrder">
                        Prose Pesanan
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
