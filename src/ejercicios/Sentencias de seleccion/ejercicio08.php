<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP Document</title>
</head>
<body>
    <?php
        $puntuacion = 40;

        $resultado = match (true) {
            $puntuacion < 50 => "illoooo pareze er Juaoce",
            $puntuacion >= 50 && $puntuacion < 69 => "Er arvaro e ma friki k tu ab",
            $puntuacion >= 70 && $puntuacion < 89 => "T falta poko pa ze un makina",
            $puntuacion >= 90 && $puntuacion < 100 => "Ere ma maquina k er pariente",
            default => "",
        };

        echo $resultado;
    ?>
</body>
</html>