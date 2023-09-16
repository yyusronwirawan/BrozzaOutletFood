@extends('outlet.master')
@section('content')
    <div>
        <livewire:order>
    </div>
    {{-- <div class="container">
        <div class="tb_pemesanan mb-4 ">
            <h3 class="my-3 text-center ">PEMESANAN</h3>
            <div class="row rounded">
                <div class="col mt-3">
                    <p>Cari Data Barang:</p>
                    <input type="text" id="search" class="form-control">
                </div>
                <div class="col table-responsive rounded  " style="background-color:rgba(64, 123, 255, 0.1);">
                    <table class="table rounded">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Nama Barang</th>
                                <th scope="col">Satuan</th>
                                <th scope="col">stok</th>
                                <th scope="col">Harga</th>
                                <th scope="col">Opsi</th>
                            </tr>
                        </thead>
                        <tbody class="table-group-divider">
                            <tr>
                                <th scope="row">1</th>
                                <td>OPPO</td>
                                <td>Pcs</td>
                                <td>10</td>
                                <td>
                                    1000000
                                </td>
                                <td>
                                    <button type="button" class="btn btn-primary">
                                        <i class="bi bi-cart4"></i>
                                    </button>
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">2</th>
                                <td>OPPO</td>
                                <td>Pcs</td>
                                <td>10</td>
                                <td>
                                    1000000
                                </td>
                                <td>
                                    <button type="button" class="btn btn-primary">
                                        <i class="bi bi-cart4"></i>
                                    </button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>


            <div class="col border rounded p-2 mt-5" style="background-color: rgba(238, 238, 238, 0.2);">
                <h3 class="my-3 text-center ">DATA PEMESANAN</h3>
                <div class="m-3">
                    <Label class="ml-4">
                        Kode Pemesanan :
                    </Label>
                    <input type="hidden" id="user" value="{{ Auth::user()->id }}">
                    <Label id="kode-pemesanan"
                        class="border px-3 py-2 border-primary border-opacity-25 rounded text-body-tertiary">
                    </Label>
                </div>
                <input value="{{ Auth::user()->id }}" type="hidden" name="id">
                <div class="table-responsive rounded">
                    <table class="table rounded">
                        <thead class="table-primary">
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Nama Barang</th>
                                <th scope="col">Satuan</th>
                                <th scope="col">Jumlah Barang</th>
                                <th scope="col">Harga</th>
                                <th scope="col">Opsi</th>
                            </tr>
                        </thead>
                        <tbody id="tabel-body">
                            <tr>
                                <th scope="row">1</th>
                                <td>OPPO</td>
                                <td>Pcs</td>
                                <td>
                                    <input type="text" class="border px-1 py-1 border-primary border-opacity-25 rounded"
                                        value="0">
                                </td>
                                <td>
                                    1000000
                                </td>
                                <td>
                                    <button type="button" class="btn btn-outline-danger">
                                        <i class="fa-solid fa-trash "></i>
                                    </button>
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">2</th>
                                <td>OPPO</td>
                                <td>Pcs</td>
                                <td>
                                    <input type="text" class="border px-1 py-1 border-primary border-opacity-25 rounded"
                                        value="0">
                                </td>
                                <td>
                                    1000000
                                </td>
                                <td>
                                    <button type="button" class="btn btn-outline-danger">
                                        <i class="fa-solid fa-trash "></i>
                                    </button>
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">3</th>
                                <td>OPPO</td>
                                <td>Pcs</td>
                                <td>
                                    <input type="text" class="border px-1 py-1 border-primary border-opacity-25 rounded"
                                        value="0">
                                </td>
                                <td>
                                    1000000
                                </td>
                                <td>
                                    <button type="button" class="btn btn-outline-danger">
                                        <i class="fa-solid fa-trash "></i>
                                    </button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="d-flex justify-content-end">
                    <button type="button" class="btn btn-outline-success my-4 mx-3 ">
                        Prose Pesanan
                    </button>
                </div>
            </div>
        </div>
    </div> --}}
@endsection
