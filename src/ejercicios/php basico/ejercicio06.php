<?php
    # Crea un script PHP y define una variable con tu nombre. Luego usa el operador de concatenacion (.) y el operador de asignacion (=) para agregar tu apellido a la misma variable. Muestra el resultado final por pantalla. Mezcla de alguna forma las salidas por pantalla, utilizando tanto HTML como PHP
    
    $nombre = "Manuel";

    $nombre .= " Festa";

    echo "<p>El nombre completo es: <strong>" . $nombre . "</strong></p>";