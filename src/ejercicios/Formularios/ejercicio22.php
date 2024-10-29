<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ordenar Array de Números Pares e Impares</title>
    <style>
        table {
            width: 60%;
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
    <?php
        $arrayInicial = [];
        for ($i = 0; $i < 20; $i++) {
            $arrayInicial[] = rand(0, 100);
        }

        $pares = [];
        $impares = [];
        
        foreach ($arrayInicial as $numero) {
            if ($numero % 2 == 0) {
                $pares[] = $numero;
            } else {
                $impares[] = $numero;
            }
        }

        $arrayFinal = array_merge($pares, $impares);
        
        function mostrarTabla($array, $titulo) {
            echo "<h2>$titulo</h2>";
            echo "<table>";
            echo "<tr><th>Índice</th>";
            for ($i = 0; $i < count($array); $i++) {
                echo "<th>$i</th>";
            }
            echo "</tr><tr><th>Valor</th>";
            foreach ($array as $valor) {
                echo "<td>$valor</td>";
            }
            echo "</tr></table>";
        }

        mostrarTabla($arrayInicial, "Array Inicial");
        mostrarTabla($arrayFinal, "Array Final (Pares al inicio e Impares al final)");
    ?>
</body>
</html>
