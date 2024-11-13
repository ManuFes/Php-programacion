// Lista de productos
const products = [
    { id: 1, name: "Sudadera Bebé", price: 19.99, image: "./img/sudadera.jpg" },
    { id: 2, name: "Pijama Bebé", price: 15.99, image: "./img/pijama.jpg" },
    { id: 3, name: "Camisa Bebé", price: 12.99, image: "./img/camisa.png" },
    { id: 4, name: "Jersey Bebé", price: 10.99, image: "./img/jersey.jpg" },
    { id: 5, name: "Chaqueta Bebé", price: 24.99, image: "./img/chaqueta.png" },
];

// Carrito de compras
let cart = [];

// Generar productos en la página
function renderProducts() {
    const productList = document.getElementById("product-list");
    products.forEach(product => {
        const productCard = document.createElement("div");
        productCard.classList.add("product-card");
        productCard.innerHTML = `
            <img src="${product.image}" alt="${product.name}">
            <h3>${product.name}</h3>
            <p>Precio: $${product.price.toFixed(2)}</p>
            <button onclick="addToCart(${product.id})">Añadir al carrito</button>
        `;
        productList.appendChild(productCard);
    });
}

// Añadir producto al carrito
function addToCart(productId) {
    const product = products.find(p => p.id === productId);
    cart.push(product);
    renderCart();
}

// Mostrar carrito
function renderCart() {
    const cartItems = document.getElementById("cart-items");
    cartItems.innerHTML = "";
    cart.forEach(item => {
        const cartItem = document.createElement("div");
        cartItem.textContent = `${item.name} - $${item.price.toFixed(2)}`;
        cartItems.appendChild(cartItem);
    });
}

// Pagar (simulación)
function checkout() {
    if (cart.length > 0) {
        alert("¡Gracias por tu compra!");
        cart = [];
        renderCart();
    } else {
        alert("El carrito está vacío.");
    }
}

// Cambiar categoría (bebé, niño, adulto)
function changeCategory() {
    const selectedCategory = document.getElementById("category-select").value;
    document.body.className = `${selectedCategory}-theme`;
}




// Cargar productos al iniciar la página
document.addEventListener("DOMContentLoaded", renderProducts);
