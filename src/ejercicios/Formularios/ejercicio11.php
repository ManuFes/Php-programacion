<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Factorial</title>
</head>
<body>
    <?php
        $resultado = 'Introduce un número para calcular el factorial';

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $numero = $_POST['numero'];

            // Verificar que el valor ingresado sea un número entero no negativo
            if (is_numeric($numero) && $numero >= 0 && intval($numero) == $numero) {
                $resultado = "El factorial de $numero es " . factorial($numero);
            } else {
                $resultado = "Introduce un número entero no negativo";
            }
        }

        // Función para calcular el factorial
        function factorial($n) {
            if ($n == 0 || $n == 1) {
                return 1;
            }
            $factorial = 1;
            for ($i = 2; $i <= $n; $i++) {
                $factorial *= $i;
            }
            return $factorial;
        }
    ?>
    <form action="" method="post">
        <label for="numero">Introduce un número:</label>
        <input type="text" name="numero" id="numero" placeholder="Número">
        <br><br>
        <button type="submit">Calcular Factorial</button>
    </form>
    <br>
    <output><?php echo $resultado; ?></output>
</body>
</html>
