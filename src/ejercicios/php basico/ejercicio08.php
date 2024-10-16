<?php
    # Crea un script PHP y define una variable booleana que indique si una persona es mayor de edad (true o false). Define otra variable que contenga el nombre de un pais y, seguidamente, utilizando un operador logico verifica si la persona es mayor de edad y si vive en España. Muestra un mensaje indicando si cumple ambas condiciones
    
    $mayorDeEdad = true;

     echo "<br>Mayor de edad? " . var_export($mayorDeEdad, true);  // true para mostrar la representación

    $pais = "Italia";
    $siono = false;

    if ($pais == "España") {
        $siono = true;
    }

    echo "<br>Es de España? " . var_export($siono, true);  

    if ($mayorDeEdad && $pais === "España") {
        echo "<p>La persona es mayor de edad y vive en España.</p>";
    } else {
        echo "<p>La persona no cumple ambas condiciones.</p>";
    }