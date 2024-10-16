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

        do {
            echo $numeros."<br>";
            $numeros = $numeros + 1;
        } while ($numeros <= 10);
    ?>
</body>
</html>