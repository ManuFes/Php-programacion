<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ecuacion de segundo grado</title>
</head>

<body>
<?php
    $resultado = 'No hay resultado';

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $a = $_POST['a'];
        $b = $_POST['b'];
        $c = $_POST['c'];

        if (is_numeric($a) && is_numeric($b) && is_numeric($c)) {
            $discriminante = ($b ** 2) - (4 * $a * $c);

            if ($discriminante > 0) {
                // Dos soluciones reales
                $x1 = (-$b + sqrt($discriminante)) / (2 * $a);
                $x2 = (-$b - sqrt($discriminante)) / (2 * $a);
                $resultado = "<br>x1 = $x1 <br> x2 = $x2";
            } elseif ($discriminante == 0) {
                // Una solución real
                $x = -$b / (2 * $a);
                $resultado = "x = $x";
            } else {
                // Sin soluciones reales
                $resultado = "No hay soluciones reales";
            }
        } else {
            $resultado = "Introduce valores numéricos válidos para a, b y c";
        }
    }
    ?>

    <form action="" method="post">
        <input type="text" name="a" id="a" placeholder="A"> <br><br>
        <input type="text" name="b" id="b" placeholder="B"> <br><br>
        <input type="text" name="c" id="c" placeholder="C"> <br><br>

        <output>
            <?php
            echo "Ecuacion: $resultado"
            ?>
            <br><br>
        </output>

        <button>Calcular valores</button>
    </form>
</body>

</html>