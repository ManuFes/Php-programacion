<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Diagrama de Barras de Temperaturas</title>
    <style>
        /* Estilos para las barras de temperatura */
        .barra {
            height: 20px;
            background-color: #4CAF50;
            color: white;
            text-align: right;
            padding-right: 5px;
            margin: 5px 0;
        }
        .mes {
            font-weight: bold;
        }
        .contenedor-barra {
            display: flex;
            align-items: center;
        }
    </style>
</head>
<body>
    <h2>Introduce la temperatura media de cada mes</h2>
    <form action="" method="post">
        <?php
            $meses = ["Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre"];
            foreach ($meses as $mes) {
                echo "<label>$mes:</label>";
                echo "<input type='number' name='temperaturas[]' placeholder='Temperatura en °C' required><br><br>";
            }
        ?>
        <button type="submit">Mostrar Diagrama de Barras</button>
    </form>

    <?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $temperaturas = $_POST['temperaturas'];

        echo "<h2>Diagrama de Barras de Temperaturas</h2>";
        foreach ($temperaturas as $index => $temperatura) {
            $anchoBarra = $temperatura * 10; 
            echo "<div class='contenedor-barra'>";
            echo "<span class='mes'>{$meses[$index]}: </span>";
            echo "<div class='barra' style='width: {$anchoBarra}px;'>$temperatura °C</div>";
            echo "</div>";
        }
    }
    ?>
</body>
</html>
