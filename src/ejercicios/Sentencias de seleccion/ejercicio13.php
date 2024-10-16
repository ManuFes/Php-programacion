<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Multiplicación por 2</title>
</head>
<body>
    <?php
        $numeros = [1, 2, 3, 4, 5];

        foreach ($numeros as $numero) {
            $resultado = $numero * 2;
            echo $resultado . '<br>'; 
        }
    ?>
</body>
</html>
