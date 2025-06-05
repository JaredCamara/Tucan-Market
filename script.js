// Inicializar carrito
let carrito = JSON.parse(localStorage.getItem("carrito")) || [];

// Función para agregar productos al carrito
function agregarAlCarrito(nombre, precio, imagen) {
  let carrito = JSON.parse(localStorage.getItem('carrito')) || [];
  carrito.push({ nombre, precio, imagen });
  localStorage.setItem('carrito', JSON.stringify(carrito));
  actualizarContadorCarrito();
  alert(`Agregado: ${nombre} - $${precio}`);
}

// Mostrar productos en la página del carrito (carrito.html)
if (document.getElementById("productosCarrito")) {
    const productosCarritoDiv = document.getElementById("productosCarrito");
    let total = 0;
    productosCarritoDiv.innerHTML = ""; // Limpiar el div antes de agregar los productos
    carrito.forEach(producto => {
        productosCarritoDiv.innerHTML += `
            <div class="producto">
                <img src="${producto.imagen}" alt="${producto.nombre}">
                <p>${producto.nombre}</p>
                <p>$${producto.precio}</p>
            </div>
        `;
        total += producto.precio;
    });
    document.getElementById("totalPrecio").textContent = total.toFixed(2);
}

// Mostrar productos en el checkout (checkout.html)
if (document.getElementById("carritoCheckout")) {
    const carritoCheckoutDiv = document.getElementById("carritoCheckout");
    let total = 0;
    carritoCheckoutDiv.innerHTML = ""; // Limpiar el div antes de agregar los productos
    carrito.forEach(producto => {
        carritoCheckoutDiv.innerHTML += `
            <div class="producto">
                <img src="${producto.imagen}" alt="${producto.nombre}">
                <p>${producto.nombre}</p>
                <p>$${producto.precio}</p>
            </div>
        `;
        total += producto.precio;
    });
    document.getElementById("totalPago").textContent = total.toFixed(2);
}

// Función para eliminar productos del carrito
function eliminarDelCarrito(index) {
    carrito.splice(index, 1);
    localStorage.setItem("carrito", JSON.stringify(carrito));
    location.reload(); // Recargar para mostrar los cambios
}
