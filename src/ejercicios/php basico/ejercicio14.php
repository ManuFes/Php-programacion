<?php
    # Cambia el nombre del primer curso a Fisica en el array $clases
    $clases = array(
        "profesores" => array("Pedro Perez", "Gema Gomez"),
        "cursos" => array("Biología", "Química")
    );

    $clases['cursos'][0] = "Física";
    
    echo "<p><strong>Profesores:</strong></p>";
        echo "<ul>";
        echo "<li>" . $clases['profesores'][0] . "</li>";
        echo "<li>" . $clases['profesores'][1] . "</li>";
        echo "</ul>";

        echo "<p><strong>Cursos:</strong></p>";
        echo "<ul>";
        echo "<li>" . $clases['cursos'][0] . "</li>";
        echo "<li>" . $clases['cursos'][1] . "</li>";
        echo "</ul>";