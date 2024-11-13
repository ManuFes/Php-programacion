<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calcular MCD</title>
</head>
<body>
    <h2>Calcular el Mínimo Común Divisor (MCD)</h2>
    <form method="POST" action="">
        <label for="num1">Ingrese el primer número:</label>
        <input type="number" name="num1" id="num1" required>
        <br><br>
        <label for="num2">Ingrese el segundo número:</label>
        <input type="number" name="num2" id="num2" required>
        <br><br>
        <input type="submit" value="Calcular MCD">
    </form>

    <?php
    function calcularMCD($a, $b) {
        if ($b == 0) {
            return $a;
        }
        return calcularMCD($b, $a % $b);
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $num1 = (int)$_POST["num1"];
        $num2 = (int)$_POST["num2"];

        $mcd = calcularMCD($num1, $num2);
        echo "<h3>El MCD de $num1 y $num2 es: $mcd</h3>";
    }
    ?>
</body>
</html>
