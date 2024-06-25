<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Pesanan</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('dist/css/customer_style/index.css') }}">
</head>

<body>
    <!-- NAVBAR -->
    @include('layouts.navbarpesan')
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
        <!-- Bootstrap JS, Popper.js, dan jQuery -->
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
        <script src="{{ asset('dist/js/showproduct.js') }}"></script>

</body>

</html>
