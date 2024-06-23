<!-- Navbar -->
<nav class="navbar navbar-expand-sm navbar-light fixed-top">
    <a class="navbar-brand" href="{{ route('home') }}">
        <img src="{{ asset('dist/img/gacoan_icon.png') }}" alt="Logo" width="70px" height="50px"
            style="border-radius: 10px;">
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
        aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <form class="form-inline my-2 my-lg-0">
            <input id="searchInput" class="form-control" type="search" placeholder="Cari Produk" aria-label="Search">
        </form>
        <ul class="navbar-nav mr-auto">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Kategori
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="#" onclick="showCategory('gacoan', 'Mie Gacoan', event)">Mie
                        Gacoan</a>
                    <a class="dropdown-item" href="#"
                        onclick="showCategory('hompimpa', 'Mie Hompimpa', event)">Mie
                        Hompimpa</a>
                    <a class="dropdown-item" href="#" onclick="showCategory('dimsum', 'Dimsum', event)">Dimsum</a>
                    <a class="dropdown-item" href="#"
                        onclick="showCategory('minuman', 'Minuman', event)">Minuman</a>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Pesanan Saya</a>
            </li>
        </ul>
        <ul class="navbar-nav ml-auto">
            <li class="nav-item mr-2">
                <div class="shopping" id="shopping">
                    <img src="{{ asset('dist/img/shopping.svg') }}" alt="Logo" width="25px" height="25px">
                    <span class="quantity">0</span>
                </div>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="{{ route('logout') }}">Logout</a>
            </li>
        </ul>
    </div>
</nav>




<script src="{{ asset('dist/js/showproduct.js') }}"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const cartOverlay = document.getElementById('cartOverlay');
        const closeCart = document.getElementById('closeCart');
        const cartIcon = document.getElementById('shopping');


        cartIcon.addEventListener('click', function() {
            if (cartOverlay.style.right === '0px') {
                cartOverlay.style.right = '-100%';
            } else {
                cartOverlay.style.right = '0px';
            }
        });

        closeCart.addEventListener('click', function() {
            cartOverlay.style.right = '-100%';
        });
    });
</script>
