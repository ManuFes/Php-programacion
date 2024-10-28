<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Conversor de euros a pesetas</title>
</head>

<body>

    <?php
        $resultado = 'no hay valor para convertir';

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Obtener los números introducidos
            $pesetas = $_POST['pesetas'];

            if (is_numeric($pesetas)) {
                $resultado = $pesetas / 166;
            } else {
                $resultado = "valor introducido erroneo";
            }
        }

    ?>

    <form method="post" action="">
        <input type="text" id="pesetas" name="pesetas" placeholder="Pesetas" required>
        =
        <output><?php echo $resultado; ?></output>
        <br><br>
        <button type="submit" name="calcular">Convetir</button>
    </form>
</body>

</html>