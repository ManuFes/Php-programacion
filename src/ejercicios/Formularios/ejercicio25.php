<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rotación de Matriz 12x12</title>
    <style>
        table {
            border-collapse: collapse;
            margin-top: 20px;
            margin-bottom: 20px;
        }
        td {
            border: 1px solid black;
            padding: 8px;
            text-align: center;
        }
    </style>
</head>
<body>
    <?php
        $matriz = [];
        for ($i = 0; $i < 12; $i++) {
            for ($j = 0; $j < 12; $j++) {
                $matriz[$i][$j] = rand(0, 100);
            }
        }

        function mostrarMatriz($matriz, $titulo) {
            echo "<h2>$titulo</h2>";
            echo "<table>";
            foreach ($matriz as $fila) {
                echo "<tr>";
                foreach ($fila as $valor) {
                    echo "<td>$valor</td>";
                }
                echo "</tr>";
            }
            echo "</table>";
        }

        mostrarMatriz($matriz, "Matriz Original");

        $matrizRotada = [];
        for ($i = 0; $i < 12; $i++) {
            for ($j = 0; $j < 12; $j++) {
                $matrizRotada[$j][11 - $i] = $matriz[$i][$j];
            }
        }

        mostrarMatriz($matrizRotada, "Matriz Rotada en Sentido de las Agujas del Reloj");
    ?>
</body>
</html>
