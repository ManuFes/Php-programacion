<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP Document</title>
</head>
<body>
    <?php
        $numeros = 160;

        do {
            echo "$numeros ";
            $numeros = $numeros + 20;
        } while ($numeros <= 320);
    ?>
</body>
</html>