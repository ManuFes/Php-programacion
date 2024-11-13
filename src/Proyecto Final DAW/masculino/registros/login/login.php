<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar Sesión - F&F</title>
    <link rel="stylesheet" href="./css/style.css"> <!-- Ruta ajustada para el CSS -->
</head>
<body>
    <div class="container">
        <section class="form_area">
            <h2 class="title">Iniciar Sesión</h2>
            <form action="login_action.php" method="POST">
                <div class="form_group">
                    <label for="username" class="sub_title">Nombre de Usuario:</label>
                    <input type="text" name="username" required class="form_style">
                </div>
                <div class="form_group">
                    <label for="password" class="sub_title">Contraseña:</label>
                    <input type="password" name="password" required class="form_style">
                </div>
                <button type="submit" class="btn">Iniciar Sesión</button>
            </form>
        </section>
    </div>
</body>
</html>
