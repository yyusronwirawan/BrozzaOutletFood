<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Home</title>
    @include('kebutuhan.link')
</head>

<body>
    {{-- sidebar --}}
    <div class="container-fluid  sidebar " style="background-color: rgba(238, 238, 238, 0.2);">
        <div class="row flex-nowrap ">
            <div class=" col-auto col-md-4 col-lg-3 min-vh-100 d-flex flex-column justify-content-between ">
                <div class=" p-2 mb-5 ml-3 flex-1 m-auto mt-0">
                    <a class="d-flex text-decoration-none m-1 align-items-center " href="#">
                        <img src="{{ asset('assets/Gudang-2.png') }}" alt="LogoGudang" width="190px">
                    </a>
                    <ul class="nav nav-pills flex-column mt-5">
                        <li class="nav-item py-2 py-sm-0  ">
                            <a href="/admin/dashboard" class="nav-link text-white" style="background-color: #407bff;">
                                <i class="fa-solid fa-house fa-bounce"></i>
                                <span class="fs-6 ms-3 d-none d-sm-inline ">
                                    Dashboard
                                </span>
                            </a>
                        </li>
                        <li class="nav-item py-2 py-sm-0 ">
                            <a href="/admin/gudang" class="nav-link ">
                                <i class="fa-solid fa-shop fa-beat"></i>
                                <span class="fs-6 ms-3 d-none d-sm-inline">
                                    Gudang
                                </span>
                            </a>
                        </li>
                        {{-- Pengguna start --}}
                        <li class="nav-item py-2 py-sm-0 ">
                            <a href="#" class="nav-link  dropdown-toggle" ole="button" data-bs-toggle="dropdown"
                                aria-expanded="true">
                                <i class="fa-solid fa-user fa-beat"></i>
                                <span class="fs-6 ms-3 d-none d-sm-inline">
                                    Pengguna
                                </span>
                            </a>
                            <ul class="dropdown-menu">
                                <li class="px-2 py-1">
                                    <a class="dropdown-item rounded " href="/admin/pegawai">
                                        <i class="fa-solid fa-user fa-beat"></i>
                                        <span class="fs-6 ms-3 d-none d-sm-inline">
                                            Data Pegawai
                                        </span>
                                    </a>
                                </li>
                                <li class="px-2 py-1">
                                    <a class="dropdown-item rounded" href="/admin/outlet">
                                        <i class="fa-sharp fa-solid fa-store fa-beat-fade"></i>
                                        <span>
                                            Data Outlet
                                        </span>
                                    </a>
                                </li>
                                <li class="px-2 py-1">
                                    <a class="dropdown-item rounded" href="/admin/supir">
                                        <i class="fa-solid fa-user-nurse fa-beat"></i>
                                        <span class="fs-6 ms-3 d-none d-sm-inline">
                                            Data Supir
                                        </span>
                                    </a>
                                </li>
                                <li class="px-2 py-1">
                                    <a class="dropdown-item rounded" href="/admin/pengguna">
                                        <i class="bi bi-people-fill"></i>
                                        <span class="fs-6 ms-3 d-none d-sm-inline">
                                            Data Pengguna
                                        </span>
                                    </a>
                                </li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li class="px-2 py-1">
                                    <a class="dropdown-item rounded" href="/admin/hakAkses">
                                        <i class="bi bi-person-bounding-box"></i>
                                        <span class="fs-6 ms-3 d-none d-sm-inline">
                                            Hak Akses
                                        </span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        {{-- pengguna end --}}
                        <li class="nav-item py-2 py-sm-0 ">
                            <a href="#" class="nav-link  dropdown-toggle" ole="button" data-bs-toggle="dropdown"
                                aria-expanded="true">
                                <i class="fa-brands fa-dropbox fa-bounce"></i>
                                <span class="fs-6 ms-3 d-none d-sm-inline">
                                    Laporan Barang
                                </span>
                            </a>
                            <ul class="dropdown-menu">
                                <li class="px-2 py-1">
                                    <a class="dropdown-item rounded " href="/admin/Databarang">
                                        <i class="bi bi-journal-bookmark-fill"></i>
                                        <span>
                                            Data Barang
                                        </span>
                                    </a>
                                </li>
                                <li class="px-2 py-1 ">
                                    <a class="dropdown-item rounded" href="/admin/barangMasuk">
                                        <i class="bi bi-journal-plus"></i>
                                        <span>
                                            Barang Masuk
                                        </span>
                                    </a>
                                </li>
                                <li class="px-2 py-1">
                                    <a class="dropdown-item rounded" href="/admin/barangKeluar">
                                        <i class="bi bi-journal-minus"></i>
                                        <span>
                                            Barang Keluar
                                        </span>
                                    </a>
                                </li>
                                <li class="px-2 py-1">
                                    <hr class="dropdown-divider">
                                </li>
                                <li class="px-2 py-1">
                                    <a class="dropdown-item rounded" href="/admin/kategori">
                                        <i class="bi bi-journal-text"></i>
                                        Tambah Kategori
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item py-2 py-sm-0 ">
                            <a href="/admin/pemesanan" class="nav-link ">
                                <i class="fa-solid fa-cart-shopping fa-beat-fade"></i>
                                <span class="fs-6 ms-3 d-none d-sm-inline">
                                    Data Pemesanan
                                </span>
                            </a>
                        </li>
                        {{-- <li class="nav-item py-2 py-sm-0 ">
                            <a href="/admin/penerimaanbarang" class="nav-link ">
                                <i class="fa-solid fa-handshake fa-bounce"></i>
                                <span class="fs-6 ms-3 d-none d-sm-inline">
                                    Penerima Barang
                                </span>
                            </a>
                        </li> --}}
                        <li class="nav-item py-2 py-sm-0 ">
                            <a href="/admin/pengiriman" class="nav-link ">
                                <i class="fa-solid fa-share-from-square fa-beat-fade"></i>
                                <span class="fs-6 ms-3 d-none d-sm-inline">
                                    Pengirim
                                </span>
                            </a>
                        </li>
                        <li class="nav-item py-2 py-sm-0 ">
                            <a href="/admin/jadwalpengiriman" class="nav-link ">
                                <i class="fa-solid fa-calendar-days fa-beat-fade"></i>
                                <span class="fs-6 ms-3 d-none d-sm-inline">
                                    Jadwal Pengirim
                                </span>
                            </a>
                        </li>
                        <li class="nav-item py-2 py-sm-0 ">
                            <a href="/admin/truk" class="nav-link ">
                                <i class="fa-solid fa-truck fa-bounce"></i>
                                <span class="fs-6 ms-3 d-none d-sm-inline">
                                    Truk
                                </span>
                            </a>
                        </li>
                        <li class="nav-item py-2 py-sm-0 ">
                            <a href="/admin/rute" class="nav-link ">
                                <i class="fa-solid fa-location-dot fa-bounce"></i>
                                <span class="fs-6 ms-3 d-none d-sm-inline">
                                    Rute
                                </span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    {{-- navbar --}}
    @include('kebutuhan.nav')
    {{-- konten --}}
    <div class="content">
        @yield('content')
    </div>


    @include('kebutuhan.script')
</body>

</html>
