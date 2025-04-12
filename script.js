// script.js
let carrito = JSON.parse(localStorage.getItem('carrito')) || [];
let contadorCarrito = document.getElementById('contador-carrito');

// Función para actualizar el contador del carrito
function actualizarContadorCarrito() {
    const totalItems = carrito.reduce((total, producto) => total + producto.cantidad, 0);
    if (contadorCarrito) {
        contadorCarrito.textContent = totalItems;
        contadorCarrito.style.display = totalItems > 0 ? 'block' : 'none';
    }
}

// Función para guardar el carrito en localStorage
function guardarCarrito() {
    localStorage.setItem('carrito', JSON.stringify(carrito));
    actualizarContadorCarrito();
}

// Función para agregar productos al carrito
function agregarAlCarrito(nombre, precio, imagen) {
    const productoExistente = carrito.find(item => item.nombre === nombre);
    
    if (productoExistente) {
        productoExistente.cantidad += 1;
    } else {
        carrito.push({
            nombre,
            precio,
            imagen,
            cantidad: 1
        });
    }
    
    guardarCarrito();
    alert(`${nombre} ha sido agregado al carrito`);
}

// Función para eliminar producto del carrito
function eliminarDelCarrito(nombre) {
    carrito = carrito.filter(item => item.nombre !== nombre);
    guardarCarrito();
    mostrarProductosCarrito();
}

// Función para aumentar cantidad de un producto
function aumentarCantidad(nombre) {
    const producto = carrito.find(item => item.nombre === nombre);
    if (producto) {
        producto.cantidad += 1;
        guardarCarrito();
        mostrarProductosCarrito();
    }
}

// Función para disminuir cantidad de un producto
function disminuirCantidad(nombre) {
    const producto = carrito.find(item => item.nombre === nombre);
    if (producto && producto.cantidad > 1) {
        producto.cantidad -= 1;
        guardarCarrito();
        mostrarProductosCarrito();
    } else if (producto && producto.cantidad === 1) {
        eliminarDelCarrito(nombre);
    }
}

// Función para mostrar productos en el carrito
function mostrarProductosCarrito() {
    const contenedor = document.getElementById('productosCarrito');
    const contenedorCheckout = document.getElementById('carritoCheckout');
    const totalElemento = document.getElementById('totalPrecio');
    const totalPago = document.getElementById('totalPago');
    
    let total = 0;
    let html = '';
    
    carrito.forEach(producto => {
        const subtotal = producto.precio * producto.cantidad;
        total += subtotal;
        
        html += `
            <div class="producto-carrito">
                <img src="${producto.imagen}" alt="${producto.nombre}">
                <div class="info-producto">
                    <h3>${producto.nombre}</h3>
                    <p>Precio unitario: $${producto.precio.toFixed(2)}</p>
                    <p>Subtotal: $${subtotal.toFixed(2)}</p>
                </div>
                <div class="controles-cantidad">
                    <button onclick="disminuirCantidad('${producto.nombre}')">-</button>
                    <span>${producto.cantidad}</span>
                    <button onclick="aumentarCantidad('${producto.nombre}')">+</button>
                    <button onclick="eliminarDelCarrito('${producto.nombre}')">Eliminar</button>
                </div>
            </div>
        `;
    });
    
    if (contenedor) {
        contenedor.innerHTML = html || '<p>No hay productos en el carrito</p>';
    }
    
    if (contenedorCheckout) {
        contenedorCheckout.innerHTML = html || '<p>No hay productos en el carrito</p>';
    }
    
    if (totalElemento) {
        totalElemento.textContent = total.toFixed(2);
    }
    
    if (totalPago) {
        totalPago.textContent = total.toFixed(2);
    }
}

// Función para procesar el pago
function procesarPago(event) {
    event.preventDefault();
    
    // Validar formulario
    const nombre = document.getElementById('nombre').value;
    const email = document.getElementById('email').value;
    const direccion = document.getElementById('direccion').value;
    const tarjeta = document.getElementById('tarjeta').value;
    
    if (!nombre || !email || !direccion || !tarjeta) {
        alert('Por favor complete todos los campos del formulario');
        return;
    }
    
    // Simular procesamiento de pago
    setTimeout(() => {
        // Limpiar carrito
        carrito = [];
        guardarCarrito();
        
        // Mostrar mensaje de confirmación
        document.getElementById('formulario-pago').style.display = 'none';
        document.getElementById('confirmacion-pago').style.display = 'block';
    }, 2000);
}

// Inicializar
document.addEventListener('DOMContentLoaded', () => {
    actualizarContadorCarrito();
    mostrarProductosCarrito();
    
    // Configurar formulario de pago si existe
    const formularioPago = document.getElementById('formulario-pago');
    if (formularioPago) {
        formularioPago.addEventListener('submit', procesarPago);
    }
});

// Verificar el estado de inicio de sesión al cargar la página
document.addEventListener("DOMContentLoaded", function () {
    const isLoggedIn = localStorage.getItem("isLoggedIn");

    if (isLoggedIn === "true") {
        document.getElementById("login-link").style.display = "none"; // Ocultar "Iniciar Sesión"
        document.getElementById("logout-btn").style.display = "inline-block"; // Mostrar "Cerrar Sesión"
        document.getElementById("user-greeting").textContent = "¡Bienvenido!";
    } else {
        document.getElementById("login-link").style.display = "inline-block"; // Mostrar "Iniciar Sesión"
        document.getElementById("logout-btn").style.display = "none"; // Ocultar "Cerrar Sesión"
        document.getElementById("user-greeting").textContent = ""; // Limpiar saludo
    }
});

// Manejar el botón de "Cerrar Sesión"
document.getElementById("logout-btn").addEventListener("click", function () {
    localStorage.setItem("isLoggedIn", "false"); // Cambiar estado de sesión
    window.location.reload(); // Recargar la página
});

document.addEventListener('DOMContentLoaded', function () {
    const checkoutButton = document.getElementById('checkout-button');
    checkoutButton.addEventListener('click', function () {
        window.location.href = 'checkout.html';
    });
});