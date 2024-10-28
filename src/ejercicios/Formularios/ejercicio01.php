<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Multiplicación de dos numeros</title>
</head>

<body>
    <?php
    $resultado = 'Introduce los valores';

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $base = $_POST['base'];
        $altura = $_POST['altura'];

        $resultado = $base * $altura / 2;
    }
    ?>


    <form method="post" action="">
        <input type="text" id="numero1" name="numero1" placeholder="Número 1" required>
        x
        <input type="text" id="numero2" name="numero2" placeholder="Número 2" required>
        =
        <!-- Mostrar el resultado en el campo output -->
        <output><?php echo $resultado; ?></output>
        <br><br>
        <button type="submit" name="calcular">Multiplicar</button>
    </form>
</body>

</html>