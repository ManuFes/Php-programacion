<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP Document</title>
</head>
<body>
    <?php
        $numerosDivisiblesPor3 = [];

        for ($i = 0; $i < 100; $i++) {
            if ($i % 3 == 0) {
                $numerosDivisiblesPor3[] = $i;
            }
        }

        echo implode(', ', $numerosDivisiblesPor3);
    ?>
</body>
</html>