<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Array en Tabla</title>
    <style>
        table {
            width: 50%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        table, th, td {
            border: 1px solid black;
            text-align: center;
            padding: 8px;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <h2>Introduce 10 números</h2>
    <form action="" method="post">
        <?php
            for ($i = 0; $i < 10; $i++) {
                echo "<input type='number' name='numeros[]' placeholder='Número $i' required> ";
            }
        ?>
        <br><br>
        <button type="submit">Mostrar Tabla</button>
    </form>

    <?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $numeros = $_POST['numeros'];
        
        echo "<h2>Contenido del Array</h2>";
        echo "<table>";
        echo "<tr><th>Índice</th>";

        // Mostrar los índices de 0 a 9
        foreach (array_keys($numeros) as $indice) {
            echo "<th>$indice</th>";
        }

        echo "</tr><tr><th>Valor</th>";

        // Mostrar los valores del array
        foreach ($numeros as $valor) {
            echo "<td>$valor</td>";
        }

        echo "</tr></table>";
    }
    ?>
</body>
</html>
