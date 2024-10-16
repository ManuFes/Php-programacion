<?php
    #Escribe un script PHP y crea una variable con un numero flotante, conviertela en un entero y luego a cadena. Muestra el tipo de dato en cada paso utilizando la funcion gettype()

    $variable = 3.1342352456;
    echo "Flotante: ".$variable;
    $variable = (int) 3.1342352456;
    echo "<br>Entero: ".$variable;
    $variable = (string) 3.1342352456;
    echo "<br>Cadena: ".$variable;