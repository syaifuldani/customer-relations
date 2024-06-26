document.addEventListener('DOMContentLoaded', function () {
    const cartOverlay = document.getElementById('cartOverlay');
    const closeCart = document.getElementById('closeCart');
    const orderCart = document.getElementById('orderCart');
    const cartItems = document.getElementById('cartItems');
    const cartTotal = document.getElementById('cartTotal');
    const cartIcon = document.querySelector('.shopping');
    const quantitySpan = document.querySelector('.quantity');
    const homeContent = document.querySelector('.home-content');
    let total = 0;
    let cart = [];
    let isLoggedIn = false;

    function updateCart() {
        cartItems.innerHTML = '';
        total = 0;
        cart.forEach((item, index) => {
            total += item.price * item.qty;
            const li = document.createElement('li');
            li.innerHTML = `
                <img src="${item.image}" alt="${item.name}">
                <span><b>${item.name}</b> <br> Rp. ${item.price * item.qty}</span>
                <div class="flex-center">
                    <button class="qty-btn" onclick="decreaseQty(${index})">-</button>
                    <span>${item.qty}</span>
                    <button class="qty-btn" onclick="increaseQty(${index})">+</button>
                </div>
            `;
            cartItems.appendChild(li);
        });
        cartTotal.innerText = `Rp. ${total}`;
        quantitySpan.innerText = cart.reduce((sum, item) => sum + item.qty, 0);
    }

    function addToCart(name, price, image) {
        const itemIndex = cart.findIndex(item => item.name === name);
        if (itemIndex > -1) {
            cart[itemIndex].qty++;
        } else {
            cart.push({ name, price, image, qty: 1 });
        }
        updateCart();
        cartOverlay.style.right = '0';
        homeContent.classList.add('with-cart-overlay'); // Tambahkan kelas
    }

    window.decreaseQty = function (index) {
        if (cart[index].qty > 1) {
            cart[index].qty--;
        } else {
            cart.splice(index, 1);
        }
        updateCart();
    }

    window.increaseQty = function (index) {
        cart[index].qty++;
        updateCart();
    }

    document.querySelectorAll('.btn-add').forEach((btn) => {
        btn.addEventListener('click', function () {
            const card = btn.closest('.card');
            const name = card.querySelector('.card-title').innerText;
            const priceText = card.querySelector('.card-text').innerText;
            const price = parseInt(priceText.replace('Rp. ', '').replace(',', ''));
            const image = card.querySelector('.card-img-top').src;

            addToCart(name, price, image);
        });
    });

    cartIcon.addEventListener('click', function () {
        if (cartOverlay.style.right === '0px') {
            cartOverlay.style.right = '-100%';
            homeContent.classList.remove('with-cart-overlay'); // Hapus kelas
        } else {
            cartOverlay.style.right = '0px';
            homeContent.classList.add('with-cart-overlay'); // Tambahkan kelas
        }
    });

    closeCart.addEventListener('click', function () {
        cartOverlay.style.right = '-100%';
        homeContent.classList.remove('with-cart-overlay'); // Hapus kelas
    });

    orderCart.addEventListener('click', function () {
        saveCart();
    });

    function saveCart() {
        fetch('/cart/save', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            },
            body: JSON.stringify({ items: cart })
        })
        .then(response => response.json())
        .then(data => {
            console.log(data.message);
            alert('Pesanan berhasil disimpan');
            cart = [];
            updateCart();
            cartOverlay.style.right = '-100%';
            homeContent.classList.remove('with-cart-overlay');
        })
        .catch(error => {
            console.error('Error:', error);
            alert('Gagal menyimpan pesanan');
        });
    }

    // Kategori dan pencarian
    document.getElementById('searchInput').addEventListener('input', function () {
        const query = this.value.toLowerCase();
        const cards = document.querySelectorAll('.card');

        cards.forEach(function (card) {
            const title = card.querySelector('.card-title').innerText.toLowerCase();
            if (title.includes(query)) {
                card.style.display = 'block';
            } else {
                card.style.display = 'none';
            }
        });
    });
});
