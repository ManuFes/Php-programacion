<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CajaFuerte</title>
</head>
<body>
    <?php
        $combinacion = '1234';
        $mensaje = '';

        // Inicializar el número de intentos en la sesión si no está definido
        if (!isset($_SESSION['intentos'])) {
            $_SESSION['intentos'] = 4;
        }

        // Verificar si el formulario ha sido enviado
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $try = $_POST['try'];

            // Si aún quedan intentos
            if ($_SESSION['intentos'] > 0) {
                // Verificar si la combinación es correcta
                if (strlen($try) == 4 && is_numeric($try) && $try === $combinacion) {
                    $mensaje = "Combinación correcta :)";
                    // Reiniciar los intentos después de desbloquear la caja fuerte
                    $_SESSION['intentos'] = 4;
                } elseif (strlen($try) != 4) {
                    $mensaje = "La combinación debe tener exactamente 4 dígitos.";
                } else {
                    $_SESSION['intentos']--;
                    $mensaje = "Combinación incorrecta :( ";
                }
            } else {
                $mensaje = "No te quedan intentos. La caja fuerte está bloqueada.";
            }
        }
    ?>

    <form action="" method="post">
        Tienes <?php echo $_SESSION['intentos']; ?> intentos para descubrir la combinación:<br><br>
        <input type="text" name="try" id="try" placeholder="Introduce la combinación" pattern="\d{4}" required>
        <br><br>
        <?php echo $mensaje; ?>
        <br><br>
        <button type="submit" <?php if ($_SESSION['intentos'] <= 0) echo "disabled"; ?>>Desbloquear</button>
    </form>
</body>
</html>
