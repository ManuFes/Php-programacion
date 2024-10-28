<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dinero por horas trabajadas</title>
</head>
<body>
    <?php
        $resultado = 'Introduce las horas trabajadas';

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $horas = $_POST['horas'];

            if (is_numeric($horas)) {
                $resultado = $horas * 12;
            } else {
                $resultado = "Introduce datos validos";
            }
        }
    ?>

    <form action="" method="post">
        <input type="text" id="horas" name="horas" placeholder="Horas trabajadas"> 
        * 12 $ =
        <output>
            <?php
                echo $resultado;
            ?>
        </output>
        <br>
        <br>
        <button>Calcular</button>
    </form>

</body>
</html>