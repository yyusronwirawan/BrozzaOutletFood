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
                                            $item->status == 'Produk Diterima') completed @endif">
                                        <div class="step-icon-wrap">
                                            <div class="step-icon"><i class="fas fa-check"></i></div>
                                        </div>
                                        <h4 class="step-title">Dikonfirmasi</h4>
                                    </div>
                                    <div class="step @if (
                                        $item->status == 'Dalam Pengiriman' ||
                                            $item->status == 'Dalam Perjalanan menuju tujuan' ||
                                            $item->status == 'Produk Diterima') completed @endif">
                                        <div class="step-icon-wrap">
                                            <div class="step-icon"><i class="fa-solid fa-truck-fast"></i></div>
                                        </div>
                                        <h4 class="step-title">Dalam Pengiriman</h4>
                                    </div>
                                    <div class="step @if ($item->status == 'Dalam Perjalanan menuju tujuan' || $item->status == 'Produk Diterima') completed @endif">
                                        <div class="step-icon-wrap">
                                            <div class="step-icon"><i class="bi bi-house-door-fill"></i></div>
                                        </div>
                                        <h4 class="step-title">Dalam perjalanan menuju tujuan</h4>
                                    </div>
                                    <div class="step @if ($item->status == 'Produk Diterima') completed @endif">
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
