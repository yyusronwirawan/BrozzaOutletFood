@extends('supir.master')
@section('content')
    <div class="container">
        <div class="tb-gudang  ">
            <div style="border-style: dashed; border-color:#537fe7; padding:4px 20px 230px;overflow:auto; max-height: 700px;">
                <div class="col border rounded p-2 mt-2">
                    <h3 class="my-3 text-center ">DATA JADWAL PENGIRIMAN</h3>
                    <p>Cari Data Jadwal pengiriman:</p>
                    <form class="d-flex" action="{{ route('jadwalPengiriman.search.supir') }}" method="GET">
                        <input class=" form-control" type="text" name="search" placeholder="Cari Jadwal Pengiriman .."
                            value="{{ old('search') }}">
                        <input type="submit" value="search" class="btn btn-outline-primary mx-2">
                    </form>
                    @include('kebutuhan.alert')
                    <div class="table-responsive mt-4">
                        <table class="table ">
                            <thead class="table-primary">
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Tanggal</th>
                                    <th scope="col">Tujuan </th>
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
@endsection
