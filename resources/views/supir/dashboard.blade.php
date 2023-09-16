@extends('supir.master')
@section('content')
    <div class="container">
        <div class="dashboard">
            <div class="p-3 bg-info bg-opacity-10 border border-info border-start-0 rounded-end ">
                <h6>
                    Selamat Datang {{ Auth::user()->nama_pengguna }}
                </h6>
            </div>
            <form action="{{ route('dashboard.search.supir') }}" class="d-flex m-2 mt-4 justify-content-end" id="search-form"
                method="POST">
                {{-- Lacak pengiriman --}}
                @csrf
                <div class="d-flex ">
                    <input class=" form-control" type="text" name="search" placeholder="Cari Barang .."
                        value="{{ old('search') }}">
                    <input type="submit" value="search" class="btn btn-outline-primary mx-2" data-bs-toggle="modal"
                        data-bs-target="#exampleModal">
                </div>
            </form>
            <div class="row   flex-wrap mt-4 ">
                <div class="col-md-6 col-lg-3 m-4  ">
                    <div class="border border-primary p-3 bg-primary bg-opacity-10 rounded shadow-lg ">
                        <h3 class="text-primary">
                            Truck
                        </h3>
                        <div class="icon">
                            <p class="fs-1 ">
                                <span class="p-3">{{$jumlahtruk}}</span><i class="fa-solid fa-truck align-self-end "
                                    style="color: #89919f;"></i>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3 m-4  ">
                    <div class="border border-primary p-3 bg-primary bg-opacity-10 rounded shadow-lg ">
                        <h3 class="text-primary">
                            Sudah Sampai
                        </h3>
                        <div class="icon">
                            <p class="fs-1 ">
                                <span class="p-3">{{$jumlahpengirimanST}}</span><i class="bi bi-clipboard2-check-fill align-self-end "
                                    style="color: #89919f;"></i>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3 m-4  ">
                    <div class="border border-primary p-3 bg-primary bg-opacity-10 rounded shadow-lg ">
                        <h3 class="text-primary">
                            Belum Sampai
                        </h3>
                        <div class="icon">
                            <p class="fs-1 ">
                                <span class="p-3">{{$jumlahpengirimanBL}}</span><i class="bi bi-clipboard2-x-fill align-self-end "
                                    style="color: #89919f;"></i>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal -->
    @foreach ($pemesanan as $item)
        <div class="modal fade" id="exampleModal-{{ $item->id }}" tabindex="-1" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            @include('kebutuhan.style_modalLacakPengiriman')
            <div class="modal-dialog modal-dialog-centered modal-xl">
                <div class="modal-content">
                    <div class="modal-header">
                        <div class="row">
                            <div class="col">
                                <h5 class="modal-title" id="exampleModalLabel">Status Pengiriman : {{ $item->kode_pesanan }}
                                </h5>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col">
                                <label class="form-label">Nama Barang : {{ $item->barangs->nama_barang }}</label>
                            </div>
                        </div>
                    </div>
                    <div class="modal-body">
                        <div class="container">
                            <div class="row">
                                <div class="col-12">
                                    <div class="steps">
                                        {{-- <div class="step completed "> --}}
                                        <div class="step @if (
                                            $item->status == 'Sedang Diproses' ||
                                                $item->status == 'Dalam Pengiriman' ||
                                                $item->status == 'Dalam Perjalanan menuju tujuan' ||
                                                $item->status == 'Sampai di tujuan') completed @endif">
                                            <div class="step-icon-wrap">
                                                <div class="step-icon"><i class="fas fa-check"></i></div>
                                            </div>
                                            <h4 class="step-title">Dikonfirmasi</h4>
                                        </div>
                                        <div class="step @if (
                                            $item->status == 'Dalam Pengiriman' ||
                                                $item->status == 'Dalam Perjalanan menuju tujuan' ||
                                                $item->status == 'Sampai di tujuan') completed @endif">
                                            <div class="step-icon-wrap">
                                                <div class="step-icon"><i class="fa-solid fa-truck-fast"></i></div>
                                            </div>
                                            <h4 class="step-title">Dalam Pengiriman</h4>
                                        </div>
                                        <div class="step @if ($item->status == 'Dalam Perjalanan menuju tujuan' || $item->status == 'Sampai di tujuan') completed @endif">
                                            <div class="step-icon-wrap">
                                                <div class="step-icon"><i class="bi bi-house-door-fill"></i></div>
                                            </div>
                                            <h4 class="step-title">Dalam perjalanan menuju tujuan</h4>
                                        </div>
                                        <div class="step @if ($item->status == 'Sampai di tujuan') completed @endif">
                                            <div class="step-icon-wrap">
                                                <div class="step-icon"><i class="fas fa-box"></i></div>
                                            </div>
                                            <h4 class="step-title">Produk Diterima</h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                        {{-- <button type="button" class="btn btn-primary">Simpan</button> --}}
                    </div>
                </div>
            </div>
        </div>
    @endforeach
    @include('kebutuhan.script_modalLacakPengiriman')
@endsection
