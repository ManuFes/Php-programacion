<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP Document</title>
</head>
<body>
    <?php
        $resultado = 'todavia no hay na pa mostrar';

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $numero = $_POST['numero'];

            if (is_numeric($numero)) {
                $resultado = ""; // Reiniciar la variable para almacenar la tabla
                for ($i = 1; $i <= 10; $i++) {
                    $resultado .= "$numero * $i = " . ($numero * $i) . "<br>";
                }
            } else {
                $resultado = "Introduce valores validos";
            }
        }
    ?>

    <form action="" method="post">
        <input type="text" name="numero" id="numero" placeholder="Introduzca un numero">
        <br><br>
        <output>
            <?php
                echo $resultado
            ?>
        </output>
        <br><br>
        <button type="submit">Calcular</button>
    </form>
</body>
</html>