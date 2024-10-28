<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Volumen de un cono</title>
</head>
<body>
    <?php
        $resultado = 'No hay todavia';

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $altura = $_POST['altura'];
            $radio = $_POST['radio'];

            if (is_numeric($radio) && is_numeric($altura)) {
                $resultado = (1/3) * 3.1417 * $radio **2 * $altura;
            } else {
                $resultado = "introduce datos validos";
            }
        }
    ?>

    <form action="" method="post">
        V = 1/3 * π *
        <input type="text" name="radio" id="radio" placeholder="Radio">
        ^2 * 
        <input type="text" name="altura" id="altura" placeholder="Altura">
        =
        <output>
            <?php
                echo $resultado
            ?>
        </output>
        <br>
        <br>
        <button>Calcular volumen</button>
    </form>
</body>
</html>