<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gudang Handphone</title>
    <!-- feather icons -->
    <script src="https://unpkg.com/feather-icons"></script>
    <!-- icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    <!-- fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,300;0,400;0,700;1,700&display=swap"
        rel="stylesheet" />
    <!-- my style -->
    <link rel="stylesheet" href="../css/welcome.css">
</head>

<body>
    <!-- Navbar start -->
    <nav class="navbar">
        <img src="{{ asset('assets/Gudang-2.png') }}" alt="ini gambar" style="width: 180px;">
        <div class="navbar-nav">
            <a href="#hero">Home</a>
            <a href="#about">Tentang Kami</a>
            <a href="#menu">Category</a>
            <a href="{{route('login')}}">Login</a>
        </div>
        <div class="navbar-extra">
            <a href="#" id="humburger-menu"><i data-feather="menu"></i></a>
        </div>
    </nav>
    <!-- Navbar end -->

    <!-- section hero start -->
    <section class="hero" id="hero">
        <main class="content">
            <h1>Gudang Berteknologi Online <br> Dengan <span>Biaya Murah</span></h1>
            <p>Selamat datang di gudang kami! Kami siap melayani kebutuhan Anda <br> dengan cepat dan efisien.</p>
            <a href="/register" class="daftar">Daftar</a>
        </main>
    </section>
    <!-- section hero end -->

    <!-- Section about start -->
    <section id="about" class="about">
        <h2><span>Tentang</span> Kami</h2>
        <div class="row">
            <div class="about-img">
                <img src="{{ asset('assets/gudang2.png') }}" alt="Tentang Kami" />
            </div>
            <div class="content">
                <h3>Mengapa memilih Gudang kami ?</h3>
                <p>
                    Lorem, ipsum dolor sit amet consectetur adipisicing elit. Corrupti
                    dolore debitis quae perferendis officiis veniam!
                </p>
                <p>
                    Lorem ipsum dolor, sit amet consectetur adipisicing elit. Accusamus
                    impedit quam repudiandae, perspiciatis repellat sed reiciendis nihil
                    quisquam unde totam.
                </p>
            </div>
        </div>
    </section>
    <!-- Section about end -->

    <!-- menu section star -->
    <section id="menu" class="menu">
        <h2><span>Menu</span> Kami</h2>
        <p>
            Lorem ipsum dolor sit, amet consectetur adipisicing elit. Rem ab amet
            laboriosam corporis deserunt quia.
        </p>
        <div class="row">
            <div class="menu-cart">
                <img src="{{ asset('assets/huawai.png') }}" alt="Espreso" class="menu-cart-img" />
                <h3 class="menu-cart-title">- Samsung -</h3>
            </div>
            <div class="menu-cart">
                <img src="{{ asset('assets/huawai.png') }}" alt="Espreso" class="menu-cart-img" />
                <h3 class="menu-cart-title">- Huawai -</h3>
            </div>
            <div class="menu-cart">
                <img src="{{ asset('assets/huawai.png') }}" alt="Espreso" class="menu-cart-img" />
                <h3 class="menu-cart-title">- Oppo -</h3>
            </div>
            <div class="menu-cart">
                <img src="{{ asset('assets/huawai.png') }}" alt="Espreso" class="menu-cart-img" />
                <h3 class="menu-cart-title">- Apple -</h3>
            </div>
            <div class="menu-cart">
                <img src="{{ asset('assets/huawai.png') }}" alt="Espreso" class="menu-cart-img" />
                <h3 class="menu-cart-title">- Xiomi -</h3>
            </div>
        </div>
    </section>
    <!-- menu section end -->
    <!-- Footer start -->
    <footer>
        <div class="social">
            <a href="#">
                <i data-feather="instagram"> </i>
            </a>
            <a href="#">
                <i data-feather="twitter"> </i>
            </a>
            <a href="#">
                <i data-feather="facebook"> </i>
            </a>
        </div>
        <div class="links">
            <a href="#hero">Home</a>
            <a href="#about">Tentang kami</a>
            <a href="#menu">Category</a>
        </div>
        <div class="credit">
            <p>Created by <a href="">Mohammad Harifin</a>. | &copy 2023</p>
        </div>
    </footer>
    <!-- Footer end -->

    <script>
        feather.replace();
    </script>
    <script>
        // toggle class active
        const navbarNav = document.querySelector(".navbar-nav");
        // ketika humberger menu di klik
        document.querySelector("#humburger-menu").addEventListener("click", function() {
            navbarNav.classList.toggle("active");
        });
        // klik di luar sidebar maka sidebar akan hilang
        const humberger = document.querySelector("#humburger-menu");
        /*
        jika selama yang di klik bukan navbar dan humberger maka active akan remove
        */
        document.addEventListener("click", function(e) {
            if (!humberger.contains(e.target) && !navbarNav.contains(e.target)) {
                navbarNav.classList.remove("active");
            }
        });
    </script>
</body>

</html>
