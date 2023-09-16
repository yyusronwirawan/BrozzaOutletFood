@extends('admin.master')
@section('content')
    <div class="container">
        <div class="tb-gudang  ">
            <div class="col border rounded p-2 ">
                <h3 class="my-3 text-center ">DATA PENERIMAAN BARANG</h3>
                <p>Cari Data Penerimaan Barang:</p>
                <form class="d-flex" action="/pegawai/cari" method="GET">
                    <input class=" form-control" type="text" name="cari" placeholder="Cari Penerimaan Barang .."
                        value="{{ old('cari') }}">
                    <input type="submit" value="CARI" class="btn btn-primary">
                </form>
                <button type="button" class="btn btn-outline-danger mx-3 my-3">
                    <i class="bi bi-filetype-pdf"></i>
                    Export PDF
                </button>
                @include('kebutuhan.alert')
                <div class="table-responsive">
                    <table class="table ">
                        <thead class="table-primary">
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Tanggal</th>
                                <th scope="col">ID Sirkulasi</th>
                                <th scope="col">Nama Outlet</th>
                                <th scope="col">ID Pengiriman</th>
                                <th scope="col">Status </th>
                            </tr>
                        </thead>
                        <tbody >
                            <tr>
                                <th scope="row">1</th>
                                <td>13/06/2023</td>
                                <td>3452</td>
                                <td>Elektronik</td>
                                <td>667</td>
                                <td>
                                    <button type="button" class="btn btn-danger"><a class="text-decoration-none text-light"
                                            href="#">Belum Diterima</a></button>
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">2</th>
                                <td>13/07/2023</td>
                                <td>34583</td>
                                <td>Elektronik</td>
                                <td>6688</td>
                                <td>
                                    <button type="button" class="btn btn-success "><a class="text-decoration-none text-light"
                                            href="#">Sudah Diterima</a></button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
