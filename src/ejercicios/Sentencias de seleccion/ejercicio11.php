<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP Document</title>
</head>
<body>
    <?php
        $frutas = array("manzana","banana","cereza");

        foreach ($frutas as $fruta) {
            echo "$fruta ";
        }
    ?>
</body>
</html>