


<nav class="navbar bg-body-tertiary position-fixed " style="background-color: rgba(238, 238, 238, 0.2);">
    <div class="container-fluid">
        <a class="navbar-brand"> </a>
        <div class="dropdown" style="margin-right: 50px;">
            <a class="nav-link dropdown-toggle pr-4" href="#" role="button" data-bs-toggle="dropdown"
                aria-expanded="false">
                {{ Auth::user()->nama_pengguna }}
            </a>
            <ul class="dropdown-menu p-4 ">
                {{-- <li><a class="dropdown-item rounded" href="#"><i class="fa-solid fa-user m-2"></i>
                        Profil</a></li> --}}
                <li><a class="dropdown-item rounded" href="{{route('logout')}}"><i class="fa-solid fa-right-from-bracket"></i> Log
                        out</a></li>
            </ul>
        </div>
    </div>
</nav>
