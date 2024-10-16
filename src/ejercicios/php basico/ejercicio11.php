<?php 
    # Modifica el segundo elemento del array $colores para que sea morado en lugar de verde

    $colores = ["rojo", "verde", "azul"];

    $colores[] = "amarillo";

    $colores[1] = "morado";

    print_r($colores);