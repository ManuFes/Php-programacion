<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pirámide de asteriscos</title>
</head>
<body>
    <?php
        $piramide = '';

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $altura = $_POST['altura'];

            if (is_numeric($altura) && $altura > 0) {
                $piramide = Piramide($altura);
            } else {
                $piramide = "Introduce un número entero positivo.";
            }
        }

        function Piramide($altura) {
            $resultado = '';
            for ($i = 1; $i <= $altura; $i++) {
                // Espacios antes de los asteriscos
                for ($j = 1; $j <= $altura - $i; $j++) {
                    $resultado .= "&nbsp; ";
                }
                // Asteriscos
                for ($k = 1; $k <= (2 * $i - 1); $k++) {
                    $resultado .= "*";
                }
                // Nueva línea al final de cada fila
                $resultado .= "<br>";
            }
            return $resultado;
        }
    ?>

    <form action="" method="post">
        <input type="text" name="altura" id="altura" placeholder="Introduce la altura">
        <button type="submit">Generar Pirámide</button>
    </form>

    <div>
        <?php echo $piramide; ?>
    </div>
</body>
</html>
