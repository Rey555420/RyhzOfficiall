let cart = [];

// Contoh data produk (bisa diambil dari database via API)
const products = [
    { id: 1, name: "Laptop", price: 10000000, image: "laptop.jpg" },
    { id: 2, name: "Smartphone", price: 5000000, image: "phone.jpg" }
];

// Menampilkan produk
function displayProducts() {
    const productList = document.getElementById('product-list');
    productList.innerHTML = products.map(product => `
        <div class="product-card">
            <img src="images/${product.image}" alt="${product.name}">
            <h3>${product.name}</h3>
            <p>Rp ${product.price.toLocaleString()}</p>
            <button onclick="addToCart(${product.id})">Tambah ke Keranjang</button>
        </div>
    `).join('');
}

// Tambah ke keranjang
function addToCart(productId) {
    const product = products.find(p => p.id === productId);
    cart.push(product);
    updateCartCount();
}

// Update jumlah keranjang
function updateCartCount() {
    document.getElementById('cart-count').textContent = cart.length;
}

// Jalankan saat halaman dimuat
window.onload = displayProducts;