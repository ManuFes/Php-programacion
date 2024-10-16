<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP Document</title>
</head>

<body>
    <?php
    $numeros = 1;

    while ($numeros <= 5) {
        if ($numeros < 5) {
            echo "$numeros ";
        } else if ($numeros = 5) {
            echo $numeros;
        }

        $numeros = $numeros + 1;
    }
    ?>
</body>

</html>