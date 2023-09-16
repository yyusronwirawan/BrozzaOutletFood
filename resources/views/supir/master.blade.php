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
                            <a href="/supir/dashboard" class="nav-link text-white" style="background-color: #407bff;">
                                <i class="fa-solid fa-house fa-bounce"></i>
                                <span class="fs-6 ms-3 d-none d-sm-inline ">
                                    Dashboard
                                </span>
                            </a>
                        </li>
                        <li class="nav-item py-2 py-sm-0 ">
                            <a href="/supir/pengiriman" class="nav-link ">
                                <i class="fa-solid fa-share-from-square fa-beat-fade"></i>
                                <span class="fs-6 ms-3 d-none d-sm-inline">
                                    Pengiriman
                                </span>
                            </a>
                        </li>
                        <li class="nav-item py-2 py-sm-0 ">
                            <a href="/supir/jadwalPengiriman" class="nav-link ">
                                <i class="fa-solid fa-calendar-days fa-beat-fade" style="padding-right: 12px;"></i>
                                Jadwal Pengiriman
                            </a>
                        </li>
                        <li class="nav-item py-2 py-sm-0 ">
                            <a href="/supir/truk" class="nav-link ">
                                <i class="fa-solid fa-truck fa-bounce"></i>
                                <span class="fs-6 ms-3 d-none d-sm-inline">
                                    Truk
                                </span>
                            </a>
                        </li>
                        <li class="nav-item py-2 py-sm-0 ">
                            <a href="/supir/rute" class="nav-link ">
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

    {{-- script js --}}
    @include('kebutuhan.script')
</body>

</html>
