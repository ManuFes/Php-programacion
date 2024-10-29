<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Número al revés</title>
</head>
<body>
    <?php
        $numeroInvertido = '';

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $numero = $_POST['numero'];

            // Verificar que el valor ingresado sea un número
            if (is_numeric($numero)) {
                $numeroInvertido = strrev($numero); // Invertir el número
            } else {
                $numeroInvertido = "Introduce un número válido.";
            }
        }
    ?>

    <form action="" method="post">
        <label for="numero">Introduce un número:</label>
        <input type="text" name="numero" id="numero" placeholder="Introduce un número" required>
        <br><br>
        <button type="submit">Invertir Número</button>
    </form>

    <?php if ($numeroInvertido !== ''): ?>
        <p><strong>Número al revés:</strong> <?php echo $numeroInvertido; ?></p>
    <?php endif; ?>
</body>
</html>
