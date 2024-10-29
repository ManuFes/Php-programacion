<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Juego de la Brisca</title>
</head>
<body>
    <?php
        // Puntos según el juego de la brisca
        $valores = [
            'As' => 11,
            'Tres' => 10,
            'Rey' => 4,
            'Caballo' => 3,
            'Sota' => 2,
            'Dos' => 0,
            'Cuatro' => 0,
            'Cinco' => 0,
            'Seis' => 0,
            'Siete' => 0
        ];

        // Definir los palos y la baraja completa
        $palos = ['Oros', 'Copas', 'Espadas', 'Bastos'];
        $baraja = [];

        // Crear la baraja completa
        foreach ($palos as $palo) {
            foreach ($valores as $carta => $puntos) {
                $baraja[] = ["carta" => $carta, "palo" => $palo, "puntos" => $puntos];
            }
        }

        // Mezclar la baraja y seleccionar 10 cartas sin repetición
        shuffle($baraja);
        $mano = array_slice($baraja, 0, 10);

        // Calcular el puntaje total
        $puntosTotales = 0;
        foreach ($mano as $carta) {
            $puntosTotales += $carta['puntos'];
        }

        // Mostrar las cartas y el puntaje total
        echo "<h2>Cartas seleccionadas:</h2>";
        echo "<ul>";
        foreach ($mano as $carta) {
            echo "<li>{$carta['carta']} de {$carta['palo']} - Puntos: {$carta['puntos']}</li>";
        }
        echo "</ul>";
        echo "<h3>Puntos Totales: $puntosTotales</h3>";
    ?>
</body>
</html>
