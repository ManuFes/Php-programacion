<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>F&F - Moda para Todos</title>
    <link rel="icon" href="img/favicon.png" type="image/x-icon">
    <link rel="stylesheet" href="css/styles.css">
</head>
<body class="bebe-theme"> <!-- Clase inicial para el tipo de ropa (bebé) -->
    <header>
        <div class="header-container">
            <h1>F&F - Moda para Todos</h1>
            <nav>
                <button onclick="toggleTheme()" class="btn-theme">Cambiar Tema</button>
                <select id="category-select" onchange="changeCategory()">
                    <option value="bebe">Bebé</option>
                    <option value="niño">Niño</option>
                    <option value="adulto">Adulto</option>
                </select>
                <div class="dropdown">
                    <button class="dropdown-toggle">Cuenta</button>
                    <div class="dropdown-menu">
                        <a href="registro.html">Registrarse</a>
                        <a href="login.html">Iniciar Sesión</a>
                    </div>
                </div>
            </nav>
        </div>
    </header>

    <section class="welcome-banner">
        <h2>Encuentra la mejor moda para todas las edades</h2>
        <p>Explora nuestra colección de prendas con estilo para bebés, niños y adultos.</p>
    </section>

    <main>
        <!-- Catálogo de Productos -->
        <section class="product-catalog" id="product-list">
            <!-- Productos generados dinámicamente con JavaScript -->
        </section>

        <!-- Carrito de Compras -->
        <section class="shopping-cart" id="cart">
            <h2>Carrito de Compras</h2>
            <div id="cart-items"></div>
            <button onclick="checkout()" class="btn-checkout">Pagar</button>
        </section>
    </main>

    <footer>
        <p>&copy; 2023 F&F - Moda para Todos</p>
    </footer>

    <script src="js/script.js"></script>
</body>
</html>
