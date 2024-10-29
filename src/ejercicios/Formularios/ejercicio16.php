<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Primer número de cinco cifras</title>
</head>
<body>
    <?php
        $numero = '';
        $primerNumero = 'Introduce un número de cinco cifras';

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $numero = $_POST['numero'];

            // Verificar que el número es numérico y tiene exactamente 5 cifras
            if (is_numeric($numero) && strlen($numero) == 5) {
                $primerNumero = substr($numero, 0, 1); // Obtener el primer dígito
            } else {
                $primerNumero = "Introduce un número válido de cinco cifras.";
            }
        }
    ?>

    <form action="" method="post">
        <input type="text" name="numero" id="numero" placeholder="Introduce un número de cinco cifras">
        <br><br>
        <output>
            <?php
                echo "El primer número es: $primerNumero";
            ?>
        </output>
        <br><br>
        <button type="submit">Obtener Primer Número</button>
    </form>
    
</body>
</html>
