<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Conversión de Pesetas y Euros</title>
</head>
<body>
    <?php
        $resultado = 'Introduce un valor para convertir';

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $cantidad = $_POST['cantidad'];
            $conversion = $_POST['conversion'];

            if (is_numeric($cantidad)) {
                // Realizar la conversión según la dirección seleccionada
                if ($conversion == "pesetas_a_euros") {
                    $resultado = $cantidad / 166; // De pesetas a euros
                } else {
                    $resultado = $cantidad * 166; // De euros a pesetas
                }
            } else {
                $resultado = "Introduce un valor numérico válido";
            }
        }
    ?>

    <form method="post" action="">
        <input type="text" name="cantidad" placeholder="Cantidad" required>
        <select name="conversion">
            <option value="pesetas_a_euros">Pesetas a Euros</option>
            <option value="euros_a_pesetas">Euros a Pesetas</option>
        </select>
        =
        <output><?php echo $resultado; ?></output>
        <br><br>
        <button type="submit">Convertir</button>
    </form>
</body>
</html>
