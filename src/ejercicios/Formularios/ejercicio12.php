<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fibonacci</title>
</head>
<body>
    <?php
        $fibonacci = 'No has introducido ningún número';

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $numero = $_POST['numero'];

            // Verificar que el valor ingresado sea un número entero positivo
            if (is_numeric($numero) && $numero >= 0 && intval($numero) == $numero) {
                $fibonacciSerie = calcularFibonacci($numero);
                $fibonacci = "La serie de Fibonacci hasta $numero es: " . implode(', ', $fibonacciSerie);
            } else {
                $fibonacci = "Introduce un número entero positivo.";
            }
        }

        // Función para calcular la serie de Fibonacci hasta un número dado
        function calcularFibonacci($n) {
            $serie = [0, 1]; // Inicializamos la serie con los primeros dos valores

            for ($i = 2; $i < $n; $i++) {
                $serie[] = $serie[$i - 1] + $serie[$i - 2]; // Suma de los dos valores anteriores
            }

            return $serie;
        }
    ?>

    <form method="post" action="">
        <input type="text" name="numero" id="numero" placeholder="Introduce un número" required>
        <br><br>
        <button type="submit">Calcular Serie de Fibonacci</button>
    </form>
    <br>
    <output><?php echo $fibonacci; ?></output>
</body>
</html>
