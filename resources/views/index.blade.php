<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Abadi Jaya</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .navbar {
            background-color: #fff;
            border-bottom: 1px solid #ddd;
        }

        .navbar-brand {
            color: #ff7f00;
            font-weight: bold;
        }

        .card {
            margin: 10px;
            width: 15rem;

            /* Fixed width for cards */
        }

        .card img {
            height: 100px;
            /* Fixed height for images */
            object-fit: cover;
            /* Make images fit the card */
        }

        .footer {
            background-color: #f8f9fa;
            padding: 20px;
            margin-top: 20px;
        }
    </style>
</head>

<body>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light fixed-top">
        <a class="navbar-brand" href="#">Abadi Jaya</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Kategori
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="#">Mie Gacoan</a>
                        <a class="dropdown-item" href="#">Mie Hompimpa</a>
                        <a class="dropdown-item" href="#">Dimsum</a>
                        <a class="dropdown-item" href="#">Minuman</a>
                    </div>
                </li>
            </ul>
            <form class="form-inline my-2 my-lg-0">
                <input class="form-control mr-sm-2" type="search" placeholder="Cari Produk" aria-label="Search">
            </form>
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="#">Pesanan Saya</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Keranjang</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('login') }}">Login</a>
                </li>
            </ul>
        </div>
    </nav>

    <!-- Product Cards -->
    <div class="container mt-4">
        <div class="row">
            <div class="col-md-3">
                <a href="#">
                    <div class="card">
                        <img src="https://vmenu.id/storage/restaurant/logo/167074458163958a059b0f4.jpg">
                        <div class="card-body">
                            <h5 class="card-title">Semen Gresik Semen PCC 40Kg</h5>
                            <p class="card-text">Rp. 55,000</p>
                        </div>
                    </div>
                </a>
            </div>
            <!-- Repeat for other products -->
            <div class="col-md-3">
                <div class="card">
                    <img src="https://vmenu.id/storage/restaurant/logo/167074458163958a059b0f4.jpg">
                    <div class="card-body">
                        <h5 class="card-title">WIPRO Palu Karet Handle Kayu 32 Oz WP 8007</h5>
                        <p class="card-text">Rp. 54,000</p>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card">
                    <img src="https://vmenu.id/storage/restaurant/logo/167074458163958a059b0f4.jpg">
                    <div class="card-body">
                        <h5 class="card-title">WIPRO Palu Karet Handle Kayu 32 Oz WP 8007</h5>
                        <p class="card-text">Rp. 54,000</p>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card">
                    <img src="https://vmenu.id/storage/restaurant/logo/167074458163958a059b0f4.jpg">
                    <div class="card-body">
                        <h5 class="card-title">WIPRO Palu Karet Handle Kayu 32 Oz WP 8007</h5>
                        <p class="card-text">Rp. 54,000</p>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card">
                    <img src="https://vmenu.id/storage/restaurant/logo/167074458163958a059b0f4.jpg">
                    <div class="card-body">
                        <h5 class="card-title">WIPRO Palu Karet Handle Kayu 32 Oz WP 8007</h5>
                        <p class="card-text">Rp. 54,000</p>
                    </div>
                </div>
            </div>
            <!-- Add more product cards as needed -->
        </div>
    </div>

    <!-- Footer -->
    <div class="footer text-center">
        <div class="container">
            <div class="row">
                <div class="col">
                    <h5>About</h5>
                    <p>Abadi Jaya: Keperluan Proyek Bangunan Lebih Mudah. Tidak perlu lagi berkeliling dari toko ke
                        toko, cukup kunjungi Abadi Jaya dan temukan semua yang kamu butuhkan.</p>
                </div>
            </div>
        </div>
        <p class="mt-3">2023 Abadi Jaya</p>
    </div>

    <!-- Bootstrap JS, Popper.js, and jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
