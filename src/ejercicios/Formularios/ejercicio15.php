<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pirámide Hueca</title>
</head>
<body>
    <?php
        $piramide = '';
        $simbolo = '';

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $altura = $_POST['altura'];
            $simbolo = $_POST['simbolo'];

            if (is_numeric($altura) && $altura > 0) {
                $piramide = Piramide($altura, $simbolo);
            } else {
                $piramide = "Introduce un número entero positivo.";
            }
        }

        function Piramide($altura, $simbolo) {
            $resultado = '';
            for ($i = 1; $i <= $altura; $i++) {
                // Espacios antes de los símbolos
                for ($j = 1; $j <= $altura - $i; $j++) {
                    $resultado .= "&nbsp; ";
                }

                // Generación de símbolos
                for ($k = 1; $k <= (2 * $i - 1); $k++) {
                    // Condiciones para bordes y vértice de la pirámide
                    if ($i == 1 || $i == $altura || $k == 1 || $k == (2 * $i - 1)) {
                        $resultado .= htmlspecialchars($simbolo);
                    } else {
                        $resultado .= "&nbsp;&nbsp;";
                    }
                }
                // Nueva línea al final de cada fila
                $resultado .= "<br>";
            }
            return $resultado;
        }
    ?>

    <form action="" method="post">
        <input type="text" name="altura" id="altura" placeholder="Introduce la altura" required>
        <input type="text" name="simbolo" id="simbolo" placeholder="Introduce el símbolo" required>
        <button type="submit">Generar Pirámide</button>
    </form>

    <div>
        <?php echo $piramide; ?>
    </div>
</body>
</html>
