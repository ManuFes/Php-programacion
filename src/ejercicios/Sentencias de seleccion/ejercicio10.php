<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP Document</title>
</head>
<body>
<?php
        for ($numeroPrimo = 2; $numeroPrimo <= 100; $numeroPrimo++) {
            $esPrimo = true; 

            for ($divisor = 2; $divisor <= sqrt($numeroPrimo); $divisor++) {
                if ($numeroPrimo % $divisor == 0) {
                    $esPrimo = false; 
                }
            }

            if ($esPrimo) {
                echo "$numeroPrimo ";
            }
        }
    ?>
</body>
</html>