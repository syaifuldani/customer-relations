<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gacoan</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('dist/css/customer_style/index.css') }}">
</head>

<body>
    <!-- NAVBAR -->
    @include('layouts.navbar')

    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img class="d-block w-100"
                    src="https://images.tokopedia.net/img/KRMmCm/2022/9/8/c20472e5-e15e-4f3e-a798-0b90313fc0c2.jpg"
                    alt="First slide">
            </div>
            <div class="carousel-item">
                <img class="d-block w-100"
                    src="https://www.minimeinsights.com/wp-content/uploads/2023/03/mie-gacoan-small-1000x562.jpg"
                    alt="Second slide">
            </div>
            <div class="carousel-item">
                <img class="d-block w-100"
                    src="https://www.minimeinsights.com/wp-content/uploads/2023/03/mie-gacoan-small-1000x562.jpg"
                    alt="Third slide">
            </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>


    <div class="container">
        <!-- Konten -->
        <div id="home-content" class="home-content">
            @if ($category == 'mie-gacoan' || !$category)
                <div class="gacoan" id="gacoanContent" style="display: block;">
                    @include('customers.gacoan', ['barangs' => $barangs])
                </div>
            @elseif ($category == 'mie-hompimpa')
                <div class="hompimpa" id="hompimpaContent" style="display: block;">
                    @include('customers.hompimpa', ['barangs' => $barangs])
                </div>
            @elseif ($category == 'dimsum')
                <div class="dimsum" id="dimsumContent" style="display: block;">
                    @include('customers.dimsum', ['barangs' => $barangs])
                </div>
            @elseif ($category == 'minuman')
                <div class="minuman" id="minumanContent" style="display: block;">
                    @include('customers.minuman', ['barangs' => $barangs])
                </div>
            @endif
        </div>

        <div class="media">
            <img class="align-self-start mr-3" src="../dist/img/gacoan.jpg" alt="Gacoan">
            <div class="media-body">
                <h5 class="mt-0"><b>MIE GACOAN</b></h5>
                <p>Mie Gacoan dikenal dengan cita rasa yang khas dan bumbu yang melimpah. Sebelumnya dikenal dengan nama
                    Mie Iblis, Mie Gacoan menawarkan varian mie dengan berbagai pilihan topping dan kuah yang menggugah
                    selera.</p>
                <p>Mie ini terkenal dengan kepedasan yang menyengat namun seimbang dengan rasa gurih dan manis dari
                    bumbu-bumbu khasnya.</p>
            </div>
        </div>

        <div class="media">
            <div class="media-body">
                <h5 class="mt-0 text-right"><b>MIE HOMPIMPA</b></h5>
                <p class="text-right">Mie Hompimpa, mie ini dikenal dengan tingkat
                    kepedasan yang tinggi. Mie ini menawarkan pengalaman makan yang ekstrem dengan bumbu pedas yang
                    kuat,
                    cocok bagi para pencinta makanan pedas yang mencari tantangan rasa.</p>
            </div>
            <img class="align-self-end ml-3" src="../dist/img/hompimpa.jpg" alt="Generic placeholder image">
        </div>

        <div class="media">
            <img class="align-self-start mr-3" src="../dist/img/dimsum.jpeg" alt="Generic placeholder image">
            <div class="media-body">
                <h5 class="mt-0"><b>DIMSUM</b></h5>
                <p>Dimsum merupakan hidangan pendamping yang populer di sini. Dikenal dengan cita rasa otentiknya,
                    dimsum tersedia dalam berbagai variasi seperti pangsit, siomay, hingga lumpia dengan berbagai
                    pilihan isian yang menggugah selera.</p>
            </div>
        </div>

        <div class="cart-overlay" id="cartOverlay">
            <div class="cart-content">
                <h5>Keranjang</h5>
                <ul id="cartItems"></ul>
                <div class="total">
                    <span>Total Harga :</span>
                    <span id="cartTotal">Rp. 0</span>
                </div>
                <div class="btn-action">
                    <button id="closeCart" class="btn btn-danger">Close</button>
                    <button id="orderCart" class="btn btn-danger">Order</button>
                </div>
            </div>
        </div>

        <!-- Footer -->
        <div class="footer text-center">
            <div class="container">
                <div class="row">
                    <div class="col">
                        <h5>Tentang Mie Gacoan</h5>
                        <p>Mie Gacoan: Nikmati kelezatan mie dengan berbagai varian rasa dan kuah yang menggugah selera.
                            Dikenal dengan cita rasa khas yang seimbang antara pedas dan gurih, Mie Gacoan siap
                            menyajikan pengalaman makan yang tak terlupakan.</p>
                    </div>
                </div>
            </div>
            <p class="mt-3">2024 Mie Gacoan</p>
        </div>

    </div>

    <!-- Bootstrap JS, Popper.js, dan jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="{{ asset('dist/js/showproduct.js') }}"></script>

</body>

</html>
