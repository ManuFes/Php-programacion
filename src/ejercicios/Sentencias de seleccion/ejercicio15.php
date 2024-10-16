<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Información de la Persona</title>
</head>
<body>
    <?php
        $persona = [
            'nombre' => 'Juan',
            'edad' => 30,
            'ciudad' => 'Madrid'
        ];

        foreach ($persona as $clave => $valor) {
            echo "$clave: $valor<br>"; 
        }
    ?>
</body>
</html>
