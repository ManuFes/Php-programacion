<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Posición de un dígito</title>
</head>
<body>
    <?php
        $posicion = '';

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $numero = $_POST['numero'];
            $digito = $_POST['digito'];

            if (is_numeric($numero) && is_numeric($digito) && strlen($digito) == 1) {
                $posiciones = localizarDigito($numero, $digito);

                if (!empty($posiciones)) {
                    $posicion = "El dígito $digito aparece en las posiciones: " . implode(', ', $posiciones);
                } else {
                    $posicion = "El dígito $digito no se encuentra en el número $numero.";
                }
            } else {
                $posicion = "Introduce un número y un solo dígito válido.";
            }
        }

        function localizarDigito($numero, $digito) {
            $posiciones = [];
            $numeroStr = (string)$numero; 
        
            for ($i = 0; $i < strlen($numeroStr); $i++) {
                if ($numeroStr[$i] == $digito) {
                    $posiciones[] = $i;
                }
            }
        
            return $posiciones;
        }
    ?>

    <form action="" method="post">
        <input type="text" name="numero" id="numero" placeholder="Introduce un número largo" required>
        <br><br>
        <input type="text" name="digito" id="digito" placeholder="Introduce un dígito del número" required>
        <br><br>
        <button type="submit">Localizar Dígito</button>
    </form>

    <div>
        <strong><?php echo $posicion; ?></strong>
    </div>
</body>
</html>
