<?php
session_start();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>F&F - Moda para Todos (Femenino)</title>
    <link rel="icon" href="../img/favicon.png" type="image/x-icon">
    <link rel="stylesheet" href="../femenino/css/title.css">
    <link rel="stylesheet" href="../femenino/css/navbar.css">
    <link rel="stylesheet" href="../femenino/css/body.css">
    <link rel="stylesheet" href="../femenino/css/footer.css">
</head>
<body>
    <header>
        <h1>F&F - Moda para Todos y Más</h1>
        <nav>
            <a href="./registros/registro/register.php">Registrarse</a>
            <a href="./registros/login/login.php">Iniciar Sesión</a>
            <button onclick="window.location.href='../masculino/paginaprincipal.php'" class="btn">Cambiar a Tema Masculino</button>
        </nav>
    </header>

    <section class="message">
        <?php if (isset($_GET['login']) && $_GET['login'] == 'success'): ?>
            <p>Inicio de sesión exitoso. Bienvenido, <?= htmlspecialchars($_SESSION['username']); ?>!</p>
        <?php elseif (isset($_GET['register']) && $_GET['register'] == 'success'): ?>
            <p>Registro exitoso. Ahora puedes iniciar sesión.</p>
        <?php elseif (isset($_GET['error'])): ?>
            <p>Error: <?= htmlspecialchars($_GET['error']); ?></p>
        <?php endif; ?>
    </section>

    <main class="container">
        <section class="banner">
            <h2>Encuentra la mejor moda para bebés, adolescentes y adultos</h2>
            <p>Explora nuestra colección de prendas con estilo, comenzando con la ropa más adorable para los más pequeños.</p>
        </section>

        <section class="products" id="product-list">
            <!-- Productos generados dinámicamente con JavaScript -->
        </section>

        <section class="cart" id="cart">
            <h2>Carrito de Compras</h2>
            <div id="cart-items"></div>
            <button onclick="checkout()">Pagar</button>
        </section>
    </main>

    <script src="./js/script.js"></script>
</body>
</html>
