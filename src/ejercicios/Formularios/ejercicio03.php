<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Area de triangulo</title>
</head>
<body>
    <?php
        $resultado = 'Introduce los valores';

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $base = $_POST['base'];
            $altura = $_POST['altura'];

            $resultado = $base * $altura / 2 ;
        }

    ?>
    <form method="post" action="">
        <input type="text" id="base" name="base" placeholder="Base">
        m^2 *
        <input type="text" id="altura" name="altura" placeholder="Altura">
        m^2 / 2
        =
        <output>
            <?php
                echo($resultado);
            ?>
            m^2
        </output>

        <br>
        <br>
        <button>Calcular Area</button>

    </form>
</body>
</html>