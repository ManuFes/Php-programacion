<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP Document</title>
</head>
<body>
    <?php
        $nota = 50;
        $aprobado = false;

        if ($nota >= 60) {
            $aprobado = true;
        } else if ($nota < 60) {
            $aprobado = false;
        }
        if ($aprobado) {
            echo"Aprobado";
        } else {
            echo "Al palo";
        }
    ?>
</body>
</html>