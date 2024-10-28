<!DOCTYPE html> 
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Media</title>
</head>
<body>
    <?php
        $media = 'Todavía no se han introducido los números';

        // Verificar si el formulario ha sido enviado
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $input = $_POST['numeros'];

            // Dividir la cadena en un array usando la coma como separador
            $numerosArray = explode(',', $input);

            // Filtrar solo los valores numéricos
            $numerosArray = array_filter($numerosArray, 'is_numeric');

            // Comprobar que hay al menos un número
            if (count($numerosArray) > 0) {
                // Calcular la media
                $suma = array_sum($numerosArray);
                $cantidad = count($numerosArray);
                $media = $suma / $cantidad;
                $media = "La media es: " . number_format($media, 2);
            } else {
                $media = "Introduce solo números separados por comas.";
            }
        }
    ?>
    <form action="" method="post">
        <input type="text" name="numeros" id="numeros" placeholder="Introduce los números separados por comas">
        <br><br>
        <output>
            <?php
                echo $media;
            ?>
        </output>
        <br><br>
        <button type="submit">Calcular Media</button>
    </form>
</body>
</html>
