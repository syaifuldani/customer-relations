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
                    <a class="dropdown-item" href="{{ url('/home/?kategori_barang=mie-gacoan') }}">Mie Gacoan</a>
                    <a class="dropdown-item" href="{{ url('/home/?kategori_barang=mie-hompimpa') }}">Mie Hompimpa</a>
                    <a class="dropdown-item" href="{{ url('/home/?kategori_barang=dimsum') }}">Dimsum</a>
                    <a class="dropdown-item" href="{{ url('/home/?kategori_barang=minuman') }}">Minuman</a>
                </div>
            </li>
            <li class="nav-item">
                <button type="button" class="btn btn-primarys" data-toggle="modal"
                    data-target="#modal_edit">Pesan</button>
            </li>
        </ul>
        <ul class="navbar-nav ml-auto">
            <li class="nav-item mr-2">
                <div class="shopping" id="shopping">
                    <img src="{{ asset('dist/img/shopping.svg') }}" alt="Logo" width="25px" height="25px">
                    <span class="quantity">0</span>
                </div>
            </li>
            <li class="nav-item mr-2">
                <div class="tagnama" id="tagnama">
                    <span>budi</span>
                </div>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="{{ route('logout') }}">Logout</a>
            </li>
        </ul>
    </div>
</nav>

<!-- Modal Edit Product -->
<!-- Modal Edit Product -->
<div class="modal fade" id="modal_edit">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="{{ route('permintaan.store') }}" method="POST">
                @csrf
                <div class="modal-header">
                    <h4 class="modal-title">Form Pesanan</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <input type="hidden" class="form-control" name="id" value="">
                    <div class="mb-3">
                        <label for="nama_barang" class="form-label">Nama Barang</label>
                        <input type="text" id="nama_barang" class="form-control" name="nama_barang" value=""
                            required>
                    </div>
                    <div class="mb-3">
                        <label for="kuantitas" class="form-label">Kuantitas</label>
                        <input type="text" id="kuantitas" class="form-control" name="kuantitas" value=""
                            required>
                    </div>
                    <div class="mb-3">
                        <label for="alamat" class="form-label">Alamat</label>
                        <input type="text" id="alamat" class="form-control" name="alamat" value=""
                            required>
                    </div>
                    <div class="mb-3">
                        <label for="jenis_pembayaran" class="form-label">Metode Pembayaran</label>
                        <select id="jenis_pembayaran" class="form-control" name="jenis_pembayaran" required>
                            <option value="Tunai">Tunai</option>
                            <option value="QR">QR</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="submit" class="btn btn-primary">Pesan</button>
                </div>
            </form>
        </div>
    </div>
</div>





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
