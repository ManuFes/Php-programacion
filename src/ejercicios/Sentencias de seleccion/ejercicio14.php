<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Comprobación de Edad</title>
</head>
<body>
    <?php
        $edad = 20;

        $resultado = ($edad >= 18) ? "Mayor de edad" : "Menor de edad";

        echo $resultado; 
    ?>
</body>
</html>
