<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Capicúa</title>
</head>
<body>
    <?php
        $resultado = '';

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $numero = $_POST['numero'];

            // Verificar que el valor ingresado sea un número
            if (is_numeric($numero)) {
                $numeroInvertido = strrev($numero); // Invertir el número

                // Verificar si el número es capicúa
                if ($numero == $numeroInvertido) {
                    $resultado = "El número $numero es capicúa.";
                } else {
                    $resultado = "El número $numero no es capicúa.";
                }
            } else {
                $resultado = "Introduce un número válido.";
            }
        }
    ?>

    <form action="" method="post">
        <label for="numero">Introduce un número:</label>
        <input type="text" name="numero" id="numero" placeholder="Introduce un número" required>
        <br><br>
        <button type="submit">Verificar Capicúa</button>
    </form>

    <?php if ($resultado !== ''): ?>
        <p><strong><?php echo $resultado; ?></strong></p>
    <?php endif; ?>
</body>
</html>
