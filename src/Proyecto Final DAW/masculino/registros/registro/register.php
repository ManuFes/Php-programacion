<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrarse - F&F</title>
    <link rel="stylesheet" href="./css/style.css"> <!-- Ruta ajustada para el CSS -->
</head>
<body>
    <div class="container">
        <section class="form_area">
            <h2 class="title">Registrarse</h2>
            <form action="register_action.php" method="POST">
                <div class="form_group">
                    <label for="username" class="sub_title">Nombre de Usuario:</label>
                    <input type="text" name="username" required class="form_style">
                </div>
                <div class="form_group">
                    <label for="email" class="sub_title">Correo Electrónico:</label>
                    <input type="email" name="email" required class="form_style">
                </div>
                <div class="form_group">
                    <label for="password" class="sub_title">Contraseña:</label>
                    <input type="password" name="password" required class="form_style">
                </div>
                <button type="submit" class="btn">Registrarse</button>
            </form>
        </section>
    </div>
</body>
</html>
